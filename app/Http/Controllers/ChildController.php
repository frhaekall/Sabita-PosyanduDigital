<?php

namespace App\Http\Controllers;

use App\Models\Child;
use Illuminate\Http\Request;

class ChildController extends Controller
{
    /**
     * Orang tua melihat anak sendiri.
     * Admin melihat seluruh data anak.
     */
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            $children = Child::with('user')
                ->latest()
                ->get();

            return view('children.admin-index', compact('children'));
        }

        $children = auth()->user()
            ->children()
            ->latest()
            ->get();

        return view('children.index', compact('children'));
    }

    /**
     * Form tambah anak hanya untuk orang tua.
     */
    public function create()
    {
        abort_unless(auth()->user()->role === 'user', 403);

        return view('children.create');
    }

    /**
     * Simpan data anak ke akun orang tua yang login.
     */
    public function store(Request $request)
    {
        abort_unless(auth()->user()->role === 'user', 403);

        $validated = $request->validate([
            'nik' => 'nullable|digits:16|unique:children,nik',
            'nama_anak' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date|before_or_equal:today',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'nullable|string|max:100',
            'nama_ayah' => 'nullable|string|max:100',
            'nama_ibu' => 'nullable|string|max:100',
        ]);

        auth()->user()->children()->create($validated);

        return redirect()
            ->route('children.index')
            ->with('success', 'Data anak berhasil ditambahkan.');
    }
}
