<?php

namespace App\Http\Controllers;

use App\Models\Pregnancy;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PregnancyController extends Controller
{
    /**
     * Menampilkan data ibu hamil.
     * Admin melihat semua data, user hanya melihat datanya sendiri.
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            $pregnancies = Pregnancy::with('user')
                ->latest()
                ->paginate(10);

            return view('pregnancies.admin-index', compact('pregnancies'));
        }

        $pregnancies = $user->pregnancies()
            ->latest()
            ->paginate(10);

        return view('pregnancies.index', compact('pregnancies'));
    }

    /**
     * Menampilkan formulir tambah data kehamilan.
     */
    public function create()
    {
        abort_if(auth()->user()->role !== 'user', 403);

        return view('pregnancies.create');
    }

    /**
     * Menyimpan data kehamilan baru.
     */
    public function store(Request $request)
    {
        abort_if(auth()->user()->role !== 'user', 403);

        $validated = $request->validate([
            'nik' => [
                'required',
                'digits:16',
                Rule::unique('pregnancies', 'nik'),
            ],
            'nama_ibu' => ['required', 'string', 'max:100'],
            'tanggal_lahir' => ['required', 'date', 'before:today'],
            'alamat' => ['required', 'string', 'max:255'],
            'no_hp' => ['nullable', 'string', 'max:20'],
            'tanggal_hpht' => ['nullable', 'date', 'before_or_equal:today'],
            'tanggal_hpl' => ['nullable', 'date', 'after_or_equal:tanggal_hpht'],
            'nama_suami' => ['nullable', 'string', 'max:100'],
            'golongan_darah' => [
                'nullable',
                Rule::in(['A', 'B', 'AB', 'O']),
            ],
        ]);

        auth()->user()->pregnancies()->create($validated);

        return redirect()
            ->route('pregnancies.index')
            ->with('success', 'Data ibu hamil berhasil ditambahkan.');
    }
}
