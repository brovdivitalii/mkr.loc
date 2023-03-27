<?php

namespace App\Http\Controllers;

// фільтрація оцінок за предметом у формі яка у /views/grades/index.blade
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

function index(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
{
    $request->validate([
        'subject' => 'required|string|max:255',
    ]);

    $query = Grade::query;
    $subject = $request->input('subject');
    if ($subject) {
        $query->where('subject_name', 'LIKE', "%$subject%");
    }

    $grades = $query->get();

    return view('grades.index', compact('grades'));
}
