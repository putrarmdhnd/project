<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('img/icon.png') }}" rel="shortcut" type="image/png">
    
    <title>{{ $title }}</title>
</head>
<body class="bg-gray">
    @include('templates/alerts')

    <div class="w-full flex flex-row">
        {{-- Sidebar --}}
        @include('templates/sidebar')

        {{-- Navbar --}}
        <nav class="top-0 w-full fixed inset-x-0 flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg shadow-sm bg-white">
            <div class="w-full flex justify-between items-center px-3">
                <span class="text-2xl text-danger top-5 cursor-pointer flex items-center">
                    <i class="bx bx-menu mr-3" onclick="openSidebar()"></i>
                    <img src="{{ asset('img/desa.png') }}" width="150" alt="Logo!">
                </span>
                <span class="text-dark top-5 items-center">
                    <span class="mr-2 font-medium lg:text-base text-sm capitalize">
                        {{ auth()->user()->nama }}
                    </span>
                    <img class="inline-block h-6 w-6 lg:h-8 lg:w-8 rounded-full ring-2 ring-danger" src="{{ asset('img/profile.png') }}" alt="{{ auth()->user()->nama }}">
                </span>
            </div>
        </nav>
        
        <div class="container w-full mx-auto mt-24 px-10 lg:px-4">
            @yield('content')
        </div>
    </div>

    @include('templates/modal')
    <div id="overlay" class="fixed hidden z-40 w-screen h-screen inset-0 bg-secondary bg-opacity-40"></div>

    <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
</body>
</html>
