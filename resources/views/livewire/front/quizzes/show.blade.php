<div x-data="{ secondsLeft: {{ $time_for_answer }} }" x-init="setInterval(() => {
    if (secondsLeft > 1) { secondsLeft--;} else {
        secondsLeft = {{ $time_for_answer }};
        $wire.nextQuestion();
    }
}, 1000);">

<div class="container max-w-3xl py-12 px-4 text-base">
    <div class="flex flex-col justify-center space-y-3">
        <div class="flex justify-between">
            <p class="text-md font-semibold tracking-wider">Question {{ $currentQuestionIndex + 1 }} of {{ $this->questionsCount }}:</p>
            <div>
                Time left for this question: <span x-text="secondsLeft" class="font-bold"></span> sec.
            </div>
        </div>
        <div class="w-full bg-green-100 rounded-full h-2.5">
            <div class="transition-all duration-700 ease-in-out bg-green-500 h-2.5 rounded-full" style="width: {{(($currentQuestionIndex + 1)/$this->questionsCount )*100}}%"></div>
        </div>
        <h3 class="text-center text-neutral-900 font-semibold text-3xl md:text-4xl md:!leading-[120%]">{{ $currentQuestion->text }}</h3>
    </div>
    <ul class="flex flex-col w-full space-y-5 my-10">
        @foreach ($currentQuestion->options as $option)
        <li class="transition-all duration-300 hover:scale-[1.02]">
            <input wire:model.defer="answersOfQuestions.{{ $currentQuestionIndex }}"
                    name="answersOfQuestions.{{ $currentQuestionIndex }}" value="{{ $option->id }}" type="radio" id="option.{{ $option->id }}"class="hidden peer" required="">
            <label for="option.{{ $option->id }}" class="group inline-flex items-center w-full text-gray-500 bg-white rounded-2xl border border-gray-200 cursor-pointer peer-checked:border-green-300 peer-checked:text-green-500 peer-checked:bg-hover:text-gray-600 hover:bg-gray-50 py-3 }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 ml-3 w-8 h-8" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <div class="block ml-5">
                    <div class="w-full text-lg font-medium">{{ $option->text }}</div>
                </div>

            </label>
        </li>
        @endforeach
    </ul>
    <div class="my-5 flex justify-end space-x-2">
        <button  x-on:click="$wire.nextQuestion(secondsLeft);secondsLeft = {{ $time_for_answer }};" class="transition-colors text-white fill-white bg-blue-500 hover:bg-blue-600 font-semibold py-3 px-5 rounded-md inline-flex items-center">
            <span>Next question</span>
            <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                    <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="currentColor"></path>
                    <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="currentColor" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-90.000000) translate(-15.999997, -11.999999)"></path>
                </g>
            </svg>
        </button>
    </div>
</div>

