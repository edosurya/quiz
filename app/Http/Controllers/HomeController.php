<?php

namespace App\Http\Controllers;

use App\Models\Quiz;

class HomeController extends Controller
{
    public function index()
    {
        $query = Quiz::whereHas('questions')
            ->withCount('questions')
            ->when(auth()->guest() || !auth()->user()->is_admin, function ($query) {
                return $query->where('published', 1);
            })
            ->get();

        $quizzes = $query;

        return view('home', compact('quizzes'));
    }

    public function show(Quiz $quiz)
    {
        return view('front.quizzes.show', compact('quiz'));
    }
}
