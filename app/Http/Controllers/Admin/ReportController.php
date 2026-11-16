<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pregnancy;
use App\Models\Child;
use App\Models\PosyanduRegistration;
use App\Models\Examination;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReportController extends Controller
{
    private function checkAdmin(): void
    {
        abort_unless(
            auth()->check() && auth()->user()->role === 'admin',
            403
        );
    }

    private function applyDateFilter($query, string $column, ?string $startDate, ?string $endDate)
    {
        if ($startDate) {
            $query->whereDate($column, '>=', $startDate);
        }

        if ($endDate) {
            $query->whereDate($column, '<=', $endDate);
        }

        return $query;
    }

    public function index(Request $request)
    {
        $this->checkAdmin();

        $validated = $request->validate([
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
        ]);

        $startDate = $validated['start_date'] ?? null;
        $endDate = $validated['end_date'] ?? null;

        // DATA IBU HAMIL
        $pregnancyQuery = $this->applyDateFilter(
            Pregnancy::query(),
            'created_at',
            $startDate,
            $endDate
        );

        $totalPregnancies = (clone $pregnancyQuery)->count();

        $pregnancies = (clone $pregnancyQuery)
            ->latest()
            ->limit(10)
            ->get();

        // DATA ANAK
        $childQuery = $this->applyDateFilter(
            Child::query(),
            'created_at',
            $startDate,
            $endDate
        );

        $totalChildren = (clone $childQuery)->count();

        $children = (clone $childQuery)
            ->latest()
            ->limit(10)
            ->get();

        // DATA PENDAFTARAN
        $registrationQuery = $this->applyDateFilter(
            PosyanduRegistration::query(),
            'created_at',
            $startDate,
            $endDate
        );

        $totalRegistrations = (clone $registrationQuery)->count();

        $waitingRegistrations = (clone $registrationQuery)
            ->where('status', 'menunggu')
            ->count();

        $approvedRegistrations = (clone $registrationQuery)
            ->where('status', 'disetujui')
            ->count();

        $rejectedRegistrations = (clone $registrationQuery)
            ->where('status', 'ditolak')
            ->count();

        $registrations = (clone $registrationQuery)
            ->with(['user', 'child', 'schedule'])
            ->latest()
            ->limit(10)
            ->get();

        // DATA PEMERIKSAAN
        $examinationQuery = $this->applyDateFilter(
            Examination::query(),
            'tanggal_pemeriksaan',
            $startDate,
            $endDate
        );

        $totalExaminations = (clone $examinationQuery)->count();

        $averageWeight = (clone $examinationQuery)
            ->whereNotNull('berat_badan')
            ->avg('berat_badan');

        $averageHeight = (clone $examinationQuery)
            ->whereNotNull('tinggi_badan')
            ->avg('tinggi_badan');

        $averageHead = (clone $examinationQuery)
            ->whereNotNull('lingkar_kepala')
            ->avg('lingkar_kepala');

        $examinations = (clone $examinationQuery)
            ->with([
                'registration.child',
                'registration.user',
                'registration.schedule',
            ])
            ->latest('tanggal_pemeriksaan')
            ->limit(10)
            ->get();

        return view('reports.index', compact(
            'startDate',
            'endDate',
            'totalPregnancies',
            'totalChildren',
            'totalRegistrations',
            'waitingRegistrations',
            'approvedRegistrations',
            'rejectedRegistrations',
            'totalExaminations',
            'averageWeight',
            'averageHeight',
            'averageHead',
            'pregnancies',
            'children',
            'registrations',
            'examinations'
        ));
    }

    public function export(Request $request): StreamedResponse
    {
        $this->checkAdmin();

        $validated = $request->validate([
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
        ]);

        $startDate = $validated['start_date'] ?? null;
        $endDate = $validated['end_date'] ?? null;

        $filename = 'laporan-sabita-' . now()->format('Y-m-d-His') . '.csv';

        return response()->streamDownload(function () use ($startDate, $endDate) {
            $file = fopen('php://output', 'w');

            // BOM agar karakter Indonesia terbaca baik di Excel
            fwrite($file, "\xEF\xBB\xBF");

            $write = function (array $row) use ($file) {
                fputcsv($file, $row, ';', '"', '\\');
            };

            $write(['LAPORAN SABITA - POSYANDU DIGITAL']);
            $write(['Tanggal cetak', now()->format('d-m-Y H:i')]);
            $write(['Periode mulai', $startDate ?: 'Semua']);
            $write(['Periode selesai', $endDate ?: 'Semua']);
            $write([]);

            // REKAP IBU HAMIL
            $pregnancies = $this->applyDateFilter(
                Pregnancy::query(),
                'created_at',
                $startDate,
                $endDate
            )->latest()->get();

            $write(['REKAP DATA IBU HAMIL']);
            $write([
                'Nama Ibu',
                'NIK',
                'Tanggal Lahir',
                'Alamat',
                'No. HP',
                'HPHT',
                'HPL',
                'Golongan Darah',
                'Tanggal Terdaftar',
            ]);

            foreach ($pregnancies as $item) {
                $write([
                    $item->nama_ibu,
                    $item->nik,
                    $item->tanggal_lahir,
                    $item->alamat,
                    $item->no_hp,
                    $item->tanggal_hpht,
                    $item->tanggal_hpl,
                    $item->golongan_darah,
                    $item->created_at?->format('Y-m-d'),
                ]);
            }

            $write([]);

            // REKAP ANAK
            $children = $this->applyDateFilter(
                Child::query(),
                'created_at',
                $startDate,
                $endDate
            )->latest()->get();

            $write(['REKAP DATA BAYI DAN ANAK']);
            $write([
                'Nama Anak',
                'NIK',
                'Tanggal Lahir',
                'Jenis Kelamin',
                'Tempat Lahir',
                'Nama Ayah',
                'Nama Ibu',
                'Tanggal Terdaftar',
            ]);

            foreach ($children as $item) {
                $write([
                    $item->nama_anak,
                    $item->nik,
                    $item->tanggal_lahir,
                    $item->jenis_kelamin,
                    $item->tempat_lahir,
                    $item->nama_ayah,
                    $item->nama_ibu,
                    $item->created_at?->format('Y-m-d'),
                ]);
            }

            $write([]);

            // REKAP PENDAFTARAN
            $registrations = $this->applyDateFilter(
                PosyanduRegistration::query(),
                'created_at',
                $startDate,
                $endDate
            )->with(['user', 'child', 'schedule'])->latest()->get();

            $write(['REKAP PENDAFTARAN POSYANDU']);
            $write([
                'Nama Orang Tua',
                'Nama Anak',
                'Kegiatan',
                'Tanggal Kegiatan',
                'Lokasi',
                'Status',
                'Catatan Admin',
                'Tanggal Daftar',
            ]);

            foreach ($registrations as $item) {
                $write([
                    $item->user?->name,
                    $item->child?->nama_anak,
                    $item->schedule?->nama_kegiatan,
                    $item->schedule?->tanggal,
                    $item->schedule?->lokasi,
                    $item->status,
                    $item->catatan_admin,
                    $item->created_at?->format('Y-m-d'),
                ]);
            }

            $write([]);

            // REKAP PEMERIKSAAN
            $examinations = $this->applyDateFilter(
                Examination::query(),
                'tanggal_pemeriksaan',
                $startDate,
                $endDate
            )->with([
                'registration.child',
                'registration.user',
                'registration.schedule',
            ])->latest('tanggal_pemeriksaan')->get();

            $write(['REKAP PEMERIKSAAN']);
            $write([
                'Tanggal Pemeriksaan',
                'Nama Anak',
                'Nama Orang Tua',
                'Kegiatan',
                'Berat Badan (kg)',
                'Tinggi Badan (cm)',
                'Lingkar Kepala (cm)',
                'Catatan',
            ]);

            foreach ($examinations as $item) {
                $write([
                    $item->tanggal_pemeriksaan,
                    $item->registration?->child?->nama_anak,
                    $item->registration?->user?->name,
                    $item->registration?->schedule?->nama_kegiatan,
                    $item->berat_badan,
                    $item->tinggi_badan,
                    $item->lingkar_kepala,
                    $item->catatan,
                ]);
            }

            fclose($file);
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
}
