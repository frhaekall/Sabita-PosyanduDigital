<?php

namespace App\Http\Controllers;

use App\Models\PosyanduSchedule;
use Illuminate\Http\Request;

class PosyanduScheduleController extends Controller
{
    private function adminOnly(): void
    {
        abort_unless(auth()->check() && auth()->user()->role === 'admin', 403);
    }

    // Halaman jadwal untuk admin
    public function index()
    {
        $this->adminOnly();

        $schedules = PosyanduSchedule::orderBy('tanggal')
            ->orderBy('jam_mulai')
            ->get();

        return view('schedules.admin-index', compact('schedules'));
    }

    // Halaman jadwal untuk masyarakat
    public function publicIndex()
    {
        $schedules = PosyanduSchedule::whereDate('tanggal', '>=', today())
            ->orderBy('tanggal')
            ->orderBy('jam_mulai')
            ->get();

        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $this->adminOnly();

        return view('schedules.form');
    }

    public function store(Request $request)
    {
        $this->adminOnly();

        $validated = $this->validateSchedule($request);

        PosyanduSchedule::create($validated);

        return redirect()
            ->route('admin.schedules.index')
            ->with('success', 'Jadwal Posyandu berhasil ditambahkan.');
    }

    public function edit(PosyanduSchedule $schedule)
    {
        $this->adminOnly();

        return view('schedules.form', compact('schedule'));
    }

    public function update(Request $request, PosyanduSchedule $schedule)
    {
        $this->adminOnly();

        $validated = $this->validateSchedule($request);

        $schedule->update($validated);

        return redirect()
            ->route('admin.schedules.index')
            ->with('success', 'Jadwal Posyandu berhasil diperbarui.');
    }

    public function destroy(PosyanduSchedule $schedule)
    {
        $this->adminOnly();

        $schedule->delete();

        return redirect()
            ->route('admin.schedules.index')
            ->with('success', 'Jadwal Posyandu berhasil dihapus.');
    }

    private function validateSchedule(Request $request): array
    {
        return $request->validate([
            'nama_kegiatan' => 'required|string|max:150',
            'jenis_layanan' => 'required|string|max:100',
            'tanggal' => 'required|date|after_or_equal:today',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'nullable|date_format:H:i|after:jam_mulai',
            'lokasi' => 'required|string|max:255',
            'kuota' => 'required|integer|min:1|max:10000',
            'deskripsi' => 'nullable|string|max:2000',
        ]);
    }
}
