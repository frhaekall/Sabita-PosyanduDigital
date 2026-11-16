<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\PosyanduRegistration;
use App\Models\PosyanduSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class PosyanduRegistrationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Pendaftaran Orang Tua
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        // Hanya orang tua yang boleh melihat pendaftaran miliknya.
        abort_unless(auth()->user()->role === 'user', 403);

        // Nama variabel disamakan dengan Blade registrations.index.
        $registrations = PosyanduRegistration::with([
            'child',
            'schedule',
        ])
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('registrations.index', compact('registrations'));
    }

    public function create()
    {
        // Admin tidak boleh membuat pendaftaran.
        abort_unless(auth()->user()->role === 'user', 403);

        // Hanya tampilkan anak milik akun yang sedang login.
        $anak = Child::where('user_id', auth()->id())
            ->orderBy('nama_anak')
            ->get();

        // Tampilkan jadwal Posyandu yang belum berlalu.
        $jadwal = PosyanduSchedule::whereDate('tanggal', '>=', today())
            ->orderBy('tanggal')
            ->orderBy('jam_mulai')
            ->get();

        return view('registrations.create', compact(
            'anak',
            'jadwal'
        ));
    }

    public function store(Request $request)
    {
        // Hanya orang tua yang boleh mengirim pendaftaran.
        abort_unless(auth()->user()->role === 'user', 403);

        $request->validate([
            'child_id' => [
                'required',
                'integer',
                Rule::exists('children', 'id')
                    ->where('user_id', auth()->id()),
            ],

            'schedule_id' => [
                'required',
                'integer',
                Rule::exists('posyandu_schedules', 'id'),
            ],
        ], [
            'child_id.required' => 'Pilih anak yang akan didaftarkan.',
            'child_id.exists' => 'Anak tidak ditemukan atau bukan milik akun Anda.',
            'schedule_id.required' => 'Pilih jadwal Posyandu.',
            'schedule_id.exists' => 'Jadwal Posyandu tidak ditemukan.',
        ]);

        $jadwal = PosyanduSchedule::findOrFail(
            $request->schedule_id
        );

        if ($jadwal->tanggal->lt(today())) {
            return back()
                ->withInput()
                ->withErrors([
                    'schedule_id' => 'Jadwal Posyandu sudah berlalu.',
                ]);
        }

        $hasil = DB::transaction(function () use ($request, $jadwal) {

            $jadwalTerkunci = PosyanduSchedule::whereKey($jadwal->id)
                ->lockForUpdate()
                ->firstOrFail();

            // Cegah anak yang sama mendaftar dua kali pada jadwal yang sama.
            $sudahTerdaftar = PosyanduRegistration::where(
                'child_id',
                $request->child_id
            )
                ->where('schedule_id', $jadwalTerkunci->id)
                ->exists();

            if ($sudahTerdaftar) {
                return 'duplicate';
            }

            // Hitung pendaftaran yang masih menggunakan kuota.
            $jumlahPendaftaran = PosyanduRegistration::where(
                'schedule_id',
                $jadwalTerkunci->id
            )
                ->whereIn('status', [
                    'menunggu',
                    'disetujui',
                ])
                ->count();

            if ($jumlahPendaftaran >= $jadwalTerkunci->kuota) {
                return 'full';
            }

            PosyanduRegistration::create([
                'user_id' => auth()->id(),
                'child_id' => $request->child_id,
                'schedule_id' => $jadwalTerkunci->id,
                'status' => 'menunggu',
            ]);

            return 'success';
        });

        if ($hasil === 'duplicate') {
            return back()
                ->withInput()
                ->withErrors([
                    'schedule_id' => 'Anak ini sudah terdaftar pada jadwal tersebut.',
                ]);
        }

        if ($hasil === 'full') {
            return back()
                ->withInput()
                ->withErrors([
                    'schedule_id' => 'Maaf, kuota jadwal Posyandu sudah penuh.',
                ]);
        }

        return redirect()
            ->route('registrations.index')
            ->with(
                'success',
                'Pendaftaran berhasil dikirim dan sedang menunggu persetujuan admin.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | Pendaftaran Admin
    |--------------------------------------------------------------------------
    */

    public function adminIndex()
    {
        // Hanya admin yang boleh melihat seluruh pendaftaran.
        abort_unless(auth()->user()->role === 'admin', 403);

        $pendaftaran = PosyanduRegistration::with([
            'user',
            'child',
            'schedule',
        ])
            ->latest()
            ->get();

        return view(
            'registrations.admin-index',
            compact('pendaftaran')
        );
    }

    public function updateStatus(
        Request $request,
        PosyanduRegistration $registration
    ) {
        // Hanya admin yang boleh memproses pendaftaran.
        abort_unless(auth()->user()->role === 'admin', 403);

        $request->validate([
            'status' => [
                'required',
                Rule::in([
                    'disetujui',
                    'ditolak',
                ]),
            ],

            'catatan_admin' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ], [
            'status.required' => 'Pilih status pendaftaran.',
            'status.in' => 'Status pendaftaran tidak valid.',
            'catatan_admin.max' => 'Catatan maksimal 1000 karakter.',
        ]);

        // Pendaftaran yang sudah diproses tidak boleh diproses ulang.
        if ($registration->status !== 'menunggu') {
            return back()->with(
                'error',
                'Pendaftaran ini sudah diproses sebelumnya.'
            );
        }

        if ($request->status === 'disetujui') {

            $hasil = DB::transaction(function () use (
                $registration,
                $request
            ) {
                $jadwal = PosyanduSchedule::whereKey(
                    $registration->schedule_id
                )
                    ->lockForUpdate()
                    ->firstOrFail();

                // Hitung jumlah yang sudah disetujui.
                $jumlahDisetujui = PosyanduRegistration::where(
                    'schedule_id',
                    $jadwal->id
                )
                    ->where('status', 'disetujui')
                    ->count();

                if ($jumlahDisetujui >= $jadwal->kuota) {
                    return false;
                }

                // Periksa ulang status agar tidak diproses dua kali.
                $data = PosyanduRegistration::whereKey(
                    $registration->id
                )
                    ->where('status', 'menunggu')
                    ->first();

                if (!$data) {
                    return 'processed';
                }

                $data->update([
                    'status' => 'disetujui',
                    'catatan_admin' => $request->catatan_admin,
                ]);

                return true;
            });

            if ($hasil === false) {
                return back()->with(
                    'error',
                    'Kuota jadwal sudah penuh. Pendaftaran tidak dapat disetujui.'
                );
            }

            if ($hasil === 'processed') {
                return back()->with(
                    'error',
                    'Pendaftaran ini sudah diproses sebelumnya.'
                );
            }

        } else {

            $registration->update([
                'status' => 'ditolak',
                'catatan_admin' => $request->catatan_admin,
            ]);
        }

        return back()->with(
            'success',
            'Pendaftaran berhasil ' . $request->status . '.'
        );
    }
}
