<?php

namespace App\Http\Controllers;

use App\Models\Education;

class EducationController extends Controller
{
    private function checkUser(): void
    {
        abort_unless(auth()->check() && auth()->user()->role === 'user', 403);
    }

    public function index()
    {
        $this->checkUser();

        $educations = Education::where('status', 'published')
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->paginate(9);

        return view('educations.index', compact('educations'));
    }

    public function show(Education $education)
    {
        $this->checkUser();

        abort_unless(
            $education->status === 'published' && $education->published_at !== null,
            404
        );

        return view('educations.show', compact('education'));
    }
}
