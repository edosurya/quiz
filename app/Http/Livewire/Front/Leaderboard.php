<?php

namespace App\Http\Livewire\Front;

use App\Models\Quiz;
use App\Models\Test;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;
use DB;

class Leaderboard extends Component
{
    public Collection $quizzes;

    public int $quiz_id = 0;

    public function mount()
    {
        $this->quizzes = Quiz::published()->get();
    }

    public function render(): View
    {

        $tests = Test::query()
            ->whereHas('user')
            ->with([
                'user' => function ($query) 
                {
                    $query->select('id', 'name');
                }])
            ->when($this->quiz_id > 0, function ($query) {
                $query->where('quiz_id', $this->quiz_id);
            })
            ->select('user_id', DB::raw('SUM(result) AS result'))
            ->groupBy('user_id')
            ->orderBy('result','DESC')
            ->get();

        return view('livewire.front.leaderboard', compact('tests'));
    }
}
