
<div x-data="{ secondsLeft: {{ $time_for_answer }} }" x-init="setInterval(() => {
    if (secondsLeft > 1) { secondsLeft--;} else {
        secondsLeft = {{ $time_for_answer }};
        $wire.nextQuestion();
    }
}, 1000);">

    <div class="mb-2">
        Time left for this question: <span x-text="secondsLeft" class="font-bold"></span> sec.
    </div>

    <span class="text-bold">Question {{ $currentQuestionIndex + 1 }} of {{ $this->questionsCount }}:</span>
    <h2 class="mb-4 text-2xl">{{ $currentQuestion->text }}</h2>

    @if ($currentQuestion->code_snippet)
        <pre class="mb-4 border-2 border-solid bg-gray-50 p-2">{{ $currentQuestion->code_snippet }}</pre>
    @endif

    @foreach ($currentQuestion->options as $option)
        <div>
            <label for="option.{{ $option->id }}">
                <input type="radio" id="option.{{ $option->id }}"
                    wire:model.defer="answersOfQuestions.{{ $currentQuestionIndex }}"
                    name="answersOfQuestions.{{ $currentQuestionIndex }}" value="{{ $option->id }}">
                {{ $option->text }}
            </label>
        </div>
    @endforeach

 
        <div class="mt-4">
            <x-secondary-button
                x-on:click="$wire.nextQuestion(secondsLeft);secondsLeft = {{ $time_for_answer }}; ">
                Next question
            </x-secondary-button>
        </div>

</div>
