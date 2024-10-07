<x-app-layout>
    <div id="quizzes" class="text-base leading-5 px-3 sm:px-0 pb-16">
        <div class="grid grid-cols-12 gap-6 container mx-auto md:px-4 mt-6">

            <div class="col-span-12 lg:col-span-6 ">
                <div class="grid grid-cols-1 gap-x-2.5 gap-y-4 sm:gap-6 2xl:gap-8 grid-cols-1">
                    @forelse($quizzes as $quiz)
                    <div class="w-full">
                        <div class="relative flex sm:items-center group p-2 sm:p-5 2xl:p-5 border border-neutral-200 rounded-lg rounded-3xl h-full">
                            <a href="{{ route('quiz.show', $quiz->slug) }}" class="absolute inset-0"></a>
                            <div class="flex flex-col flex-1">
                                <div class="space-y-2 sm:space-y-3.5 sm:mb-4">
                                    <div class="flow-root">
                                        <div class="flex flex-wrap space-x-2 -my-1">
                                            <span class="transition-colors hover:text-white duration-300 inline-flex px-2.5 py-1 rounded-full font-medium text-xs relative my-1 text-[10px] sm:text-xs ">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z" />
                                                  </svg>
                                                Public Quiz
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        <h3 class="block font-semibold text-neutral-900 dark:text-neutral-100 text-sm sm:text-base lg:text-xl">
                                            <a href="{{ route('quiz.show', $quiz->slug) }}" class="line-clamp-2" title="Ipsa sit dolores dolorum doloremque provident magnam">{{ $quiz->title}}</a>
                                        </h3>
                                        <div class="sm:mt-2">
                                            <span class="text-neutral-500 dark:text-neutral-400 text-base line-clamp-1">
                                                <p>Question: {{ $quiz->questions_count }}</p>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="inline-flex items-center text-neutral-800 dark:text-neutral-200 overflow-hidden text-xs w-full">
                                        <span class="text-neutral-500 dark:text-neutral-400 mx-[6px] font-medium">·</span>
                                        <span class="text-neutral-500 dark:text-neutral-400 font-normal ">
                                            <span class="line-clamp-1">{{  $quiz->created_at->translatedFormat('d M Y')}}</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="mt-2">No quizzes found.</div>
                    @endforelse

                </div>
            </div>

            <div class="col-span-12 lg:col-span-6 relative">
            <livewire:front.leaderboard />
            </div>
        </div>
    </div>
</x-app-layout>

