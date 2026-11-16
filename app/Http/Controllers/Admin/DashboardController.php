<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pregnancy;
use App\Models\Child;

class DashboardController extends Controller
{
    public function index()
    {
        abort_unless(auth()->check() && auth()->user()->role === 'admin', 403);

        $totalIbu = Pregnancy::count();
        $totalAnak = Child::count();

        // Fitur jadwal dan pendaftaran belum dibuat.
        $totalJadwal = 0;
        $totalPendaftaran = 0;

        // Ambil aktivitas terbaru dari data ibu hamil.
        $aktivitasIbu = Pregnancy::latest()
            ->take(5)
            ->get()
            ->map(function ($item) {
                return [
                    'nama' => $item->nama_ibu,
                    'jenis' => 'Data ibu hamil ditambahkan',
                    'waktu' => $item->created_at,
                ];
            });

        // Ambil aktivitas terbaru dari data anak.
        $aktivitasAnak = Child::latest()
            ->take(5)
            ->get()
            ->map(function ($item) {
                return [
                    'nama' => $item->nama_anak,
                    'jenis' => 'Data bayi dan anak ditambahkan',
                    'waktu' => $item->created_at,
                ];
            });

        // Gabungkan dan urutkan aktivitas berdasarkan waktu.
        $aktivitas = $aktivitasIbu
            ->concat($aktivitasAnak)
            ->sortByDesc('waktu')
            ->take(5)
            ->values();

        return view('dashboard.admin', compact(
            'totalIbu',
            'totalAnak',
            'totalJadwal',
            'totalPendaftaran',
            'aktivitas'
        ));
    }
}
