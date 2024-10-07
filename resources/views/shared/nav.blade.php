<nav {{-- id="navbar_top"  class="navbar transition-all duration-300 bg-white bg-opacity-70 backdrop-blur-2xl border-b border-neutral-200" --}}
        class="nav sticky z-[1] top-0 left-0 right-0 px-4 sm:px-0 transition-all duration-300 bg-white shadow-lg border-b border-neutral-200"
        {{-- :class="{'h-24': !atTop, 'h-16': atTop }"
        @scroll.window="atTop = (window.pageYOffset < 50) ? false: true" --}}
>
    <div class="container sm:px-4 lg:px-8 flex flex-wrap items-center justify-between lg:flex-nowrap text-base font-normal leading-5">
        <div class="flex items-center">
            <a href="{{route('home')}}" class="inline-block mr-4 py-0.5 text-xl whitespace-nowrap hover:no-underline focus:no-underline">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
            </a>
        </div>
        <div class="lg:flex lg:items-center hidden sm:visible">
            <ul class="flex list-none flex-row space-x-10 font-medium text-slate-500">
                <li>
                    <a href="{{route('home')}}" class="{{ Route::is('home') ? 'page-scroll text-blue-500 rounded-xl py-3' : 'page-scroll hover:text-blue-500 rounded-xl py-3 ' }} transition duration-150 ease-in-out">Home <span class="sr-only">(current)</span></a>
                </li>

            </ul>
        </div>

        @guest
            <div class="flex items-center">
                <div class="py-3 hidden sm:flex sm:visible">
                    <a href="{{ route('login') }}" class="ml-5 h-auto inline-flex items-center justify-center text-sm xl:text-base xl:font-medium py-2 px-4 xl:py-3 xl:px-6 text-black hover:text-blue-500" alt="Zajejestruj się">Log In</a>
                    <a href="{{ route('register') }}" class="ml-5 h-auto inline-flex items-center justify-center rounded-full transition-colors text-sm xl:text-base xl:font-medium py-2 px-4 xl:py-3 xl:px-6 bg-blue-500 hover:bg-blue-600 text-neutral-50" alt="Zajejestruj się">Register</a>
                </div>
                <button @click="openMobileMainMenu" type="button" class="py-5 visible sm:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>

        @endguest


    </div>
</nav>
<script>
    // Enable hidden nav bar
    {
    const nav = document.querySelector(".nav");
    let lastScrollY = window.scrollY;

    window.addEventListener("scroll", () => {
        if (lastScrollY < window.scrollY) {
        nav.classList.add("-translate-y-20");
        } else {
        nav.classList.remove("-translate-y-20");
        }

        lastScrollY = window.scrollY;
    });
    }
</script>
