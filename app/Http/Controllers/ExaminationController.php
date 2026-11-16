<?php

namespace App\Http\Controllers;

use App\Models\Examination;
use App\Models\PosyanduRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ExaminationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Pemeriksaan Admin
    |--------------------------------------------------------------------------
    */

    public function adminIndex()
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $pemeriksaan = Examination::with([
            'registration.user',
            'registration.child',
            'registration.schedule',
        ])
            ->latest('tanggal_pemeriksaan')
            ->get();

        $pendaftaranBelumDiperiksa = PosyanduRegistration::with([
            'user',
            'child',
            'schedule',
        ])
            ->where('status', 'disetujui')
            ->whereDoesntHave('examination')
            ->latest()
            ->get();

        return view(
            'examinations.admin-index',
            compact(
                'pemeriksaan',
                'pendaftaranBelumDiperiksa'
            )
        );
    }

    public function create(PosyanduRegistration $registration)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $registration->load([
            'user',
            'child',
            'schedule',
            'examination',
        ]);

        abort_unless($registration->status === 'disetujui', 403);
        abort_if($registration->examination, 409);

        return view(
            'examinations.create',
            compact('registration')
        );
    }

    public function store(Request $request)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $validated = $request->validate([
            'registration_id' => [
                'required',
                'integer',
                Rule::exists('posyandu_registrations', 'id')
                    ->where('status', 'disetujui'),
            ],

            'tanggal_pemeriksaan' => [
                'required',
                'date',
                'before_or_equal:today',
            ],

            'berat_badan' => [
                'required',
                'numeric',
                'min:0.1',
                'max:300',
            ],

            'tinggi_badan' => [
                'required',
                'numeric',
                'min:1',
                'max:250',
            ],

            'lingkar_kepala' => [
                'nullable',
                'numeric',
                'min:1',
                'max:100',
            ],

            'catatan' => [
                'nullable',
                'string',
                'max:2000',
            ],
        ]);

        $hasil = DB::transaction(function () use ($validated) {
            $registration = PosyanduRegistration::whereKey(
                $validated['registration_id']
            )
                ->lockForUpdate()
                ->firstOrFail();

            if ($registration->status !== 'disetujui') {
                return 'not_approved';
            }

            if ($registration->examination()->exists()) {
                return 'already_exists';
            }

            Examination::create($validated);

            return 'success';
        });

        if ($hasil === 'not_approved') {
            return back()->withErrors([
                'registration_id' =>
                    'Pendaftaran belum disetujui admin.',
            ]);
        }

        if ($hasil === 'already_exists') {
            return back()->withErrors([
                'registration_id' =>
                    'Pemeriksaan untuk pendaftaran ini sudah tersedia.',
            ]);
        }

        return redirect()
            ->route('admin.examinations.index')
            ->with('success', 'Hasil pemeriksaan berhasil disimpan.');
    }

    public function show(Examination $examination)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $examination->load([
            'registration.user',
            'registration.child',
            'registration.schedule',
        ]);

        return view(
            'examinations.show',
            compact('examination')
        );
    }

    public function edit(Examination $examination)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $examination->load([
            'registration.child',
            'registration.schedule',
        ]);

        return view(
            'examinations.edit',
            compact('examination')
        );
    }

    public function update(
        Request $request,
        Examination $examination
    ) {
        abort_unless(auth()->user()->role === 'admin', 403);

        $validated = $request->validate([
            'tanggal_pemeriksaan' => [
                'required',
                'date',
                'before_or_equal:today',
            ],

            'berat_badan' => [
                'required',
                'numeric',
                'min:0.1',
                'max:300',
            ],

            'tinggi_badan' => [
                'required',
                'numeric',
                'min:1',
                'max:250',
            ],

            'lingkar_kepala' => [
                'nullable',
                'numeric',
                'min:1',
                'max:100',
            ],

            'catatan' => [
                'nullable',
                'string',
                'max:2000',
            ],
        ]);

        $examination->update($validated);

        return redirect()
            ->route('admin.examinations.index')
            ->with('success', 'Hasil pemeriksaan berhasil diperbarui.');
    }

    public function destroy(Examination $examination)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $examination->delete();

        return redirect()
            ->route('admin.examinations.index')
            ->with('success', 'Hasil pemeriksaan berhasil dihapus.');
    }

    /*
    |--------------------------------------------------------------------------
    | Riwayat Pemeriksaan Orang Tua
    |--------------------------------------------------------------------------
    */

    public function parentIndex()
    {
        abort_unless(auth()->user()->role === 'user', 403);

        $pemeriksaan = Examination::with([
            'registration.child',
            'registration.schedule',
        ])
            ->whereHas('registration', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->latest('tanggal_pemeriksaan')
            ->get();

        return view(
            'examinations.parent-index',
            compact('pemeriksaan')
        );
    }
}
