<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>

    @if (isset($title))
        <title>{{ $title }}</title>
    @else
        <title>Quiz System</title>
    @endif

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="_token" content="{{ csrf_token() }}" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Favicon  -->
    <link rel="icon" href="images/favicon.png" />

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic&#038;display=swap&#038;ver=1664182504">

    <!-- Swiper slider -->
    {{-- <link rel="stylesheet" href="https://unpkg.com/swiper@6.8.4/swiper-bundle.min.css"> --}}

    <!-- Tailwind for develop-->
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Scripts -->
    <wireui:scripts />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="min-h-screen " x-data="setup()" x-init="$refs.loading.classList.add('hidden'); setColors(color);">

    @include('shared/nav')

    {{ $slot }}

    @stack('scripts')

    <!-- Swiper slider -->
    {{-- <script src="https://unpkg.com/swiper@6.8.4/swiper-bundle.min.js"></script> --}}
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <!-- Main  -->
    @livewireScripts
    @stack('scripts')

</body>
</html>



