<?php

namespace App\Http\Livewire\Front\Quizzes;

use App\Models\Question;
use App\Models\Option;
use App\Models\Quiz;
use App\Models\Test;
use App\Models\Answer;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;

class Show extends Component
{
    public Quiz $quiz;

    public Collection $questions;

    public Question $currentQuestion;
    public int $currentQuestionIndex = 0;

    public array $answersOfQuestions = [];

    public int $startTimeInSeconds = 0;
    public int $time_for_answer = 0;
    public array $time_answer = [];


    public function mount()
    {

        $this->startTimeInSeconds = now()->timestamp;
        $this->time_for_answer = $this->quiz->time_for_answer;

        $this->questions = Question::query()
            ->inRandomOrder()
            ->whereRelation('quizzes', 'id', $this->quiz->id)
            ->with('options')
            ->get();

        $this->currentQuestion = $this->questions[$this->currentQuestionIndex];

        for ($questionIndex = 0; $questionIndex < $this->questionsCount; $questionIndex++) {
            $this->answersOfQuestions[$questionIndex] = [];
        }
    }

    public function getQuestionsCountProperty(): int
    {
        return $this->questions->count();
    }

    public function nextQuestion($secondLeft = null)
    {
        $this->currentQuestionIndex++;
        $this->time_answer[$this->currentQuestionIndex] = $secondLeft;

        if ($this->currentQuestionIndex == $this->questionsCount) {
            return $this->submit();
        }

        $this->currentQuestion = $this->questions[$this->currentQuestionIndex];
        
    }

    public function submit()
    {
        $result = 0;

        $test = Test::create([
            'user_id' => auth()->id(),
            'quiz_id' => $this->quiz->id,
            'result' => 0,
            'ip_address' => request()->ip(),
            'time_spent' => now()->timestamp - $this->startTimeInSeconds
        ]);

        foreach ($this->answersOfQuestions as $key => $optionId) {
            if (!empty($optionId) && Option::find($optionId)->correct) {
                $result++;
                $time_spent = $this->time_for_answer - $this->time_answer[$key+1];
                Answer::create([
                    'user_id' => auth()->id(),
                    'test_id' => $test->id,
                    'question_id' => $this->questions[$key]->id,
                    'option_id' => $optionId,
                    'correct' => 1,
                    'time_spent' => $time_spent,
                    'score' => $this->calcScore($time_spent),
                ]);
            } else {
                Answer::create([
                    'user_id' => auth()->id(),
                    'test_id' => $test->id,
                    'question_id' => $this->questions[$key]->id,
                    'score' => 0,
                ]);
            }
        }

        $test->update([
            'result' => $result
        ]);


        return to_route('results.show', ['test' => $test]);
    }

    public function render(): View
    {
        return view('livewire.front.quizzes.show');
    }

    public function calcScore($time_spent){
        switch (true) {
            case ($time_spent <= 5):
                return 5;
                break;
            case ($time_spent == 6):
                return 4;
                break;
            case ($time_spent == 7):
                return 3;
                break;
            case ($time_spent == 8):
                return 2;
                break;
            case ($time_spent == 9):
                return 1;
                break;
            default:
                return 0;
                break;
        }
    }
}
