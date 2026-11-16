<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class EducationController extends Controller
{
    private function checkAdmin(): void
    {
        abort_unless(auth()->check() && auth()->user()->role === 'admin', 403);
    }

    public function index()
    {
        $this->checkAdmin();

        $educations = Education::with('author')
            ->latest()
            ->paginate(10);

        return view('educations.admin-index', compact('educations'));
    }

    public function create()
    {
        $this->checkAdmin();

        return view('educations.create');
    }

    public function store(Request $request)
    {
        $this->checkAdmin();

        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:200'],
            'kategori' => ['required', 'string', 'max:100'],
            'ringkasan' => ['nullable', 'string', 'max:500'],
            'isi' => ['required', 'string'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'status' => ['required', Rule::in(['draft', 'published'])],
        ]);

        $slug = Str::slug($validated['judul']);
        $originalSlug = $slug;
        $counter = 1;

        while (Education::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        $gambar = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')
                ->store('educations', 'public');
        }

        Education::create([
            'user_id' => auth()->id(),
            'judul' => $validated['judul'],
            'slug' => $slug,
            'kategori' => $validated['kategori'],
            'ringkasan' => $validated['ringkasan'] ?? null,
            'isi' => $validated['isi'],
            'gambar' => $gambar,
            'status' => $validated['status'],
            'published_at' => $validated['status'] === 'published'
                ? now()
                : null,
        ]);

        return redirect()
            ->route('admin.educations.index')
            ->with('success', 'Artikel edukasi berhasil ditambahkan.');
    }

    public function edit(Education $education)
    {
        $this->checkAdmin();

        return view('educations.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $this->checkAdmin();

        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:200'],
            'kategori' => ['required', 'string', 'max:100'],
            'ringkasan' => ['nullable', 'string', 'max:500'],
            'isi' => ['required', 'string'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'status' => ['required', Rule::in(['draft', 'published'])],
        ]);

        $slug = Str::slug($validated['judul']);
        $originalSlug = $slug;
        $counter = 1;

        while (
            Education::where('slug', $slug)
                ->where('id', '!=', $education->id)
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter++;
        }

        $gambar = $education->gambar;

        if ($request->hasFile('gambar')) {
            if ($gambar) {
                Storage::disk('public')->delete($gambar);
            }

            $gambar = $request->file('gambar')
                ->store('educations', 'public');
        }

        $publishedAt = $education->published_at;

        if ($validated['status'] === 'published' && !$publishedAt) {
            $publishedAt = now();
        }

        if ($validated['status'] === 'draft') {
            $publishedAt = null;
        }

        $education->update([
            'judul' => $validated['judul'],
            'slug' => $slug,
            'kategori' => $validated['kategori'],
            'ringkasan' => $validated['ringkasan'] ?? null,
            'isi' => $validated['isi'],
            'gambar' => $gambar,
            'status' => $validated['status'],
            'published_at' => $publishedAt,
        ]);

        return redirect()
            ->route('admin.educations.index')
            ->with('success', 'Artikel edukasi berhasil diperbarui.');
    }

    public function destroy(Education $education)
    {
        $this->checkAdmin();

        if ($education->gambar) {
            Storage::disk('public')->delete($education->gambar);
        }

        $education->delete();

        return redirect()
            ->route('admin.educations.index')
            ->with('success', 'Artikel edukasi berhasil dihapus.');
    }
}
