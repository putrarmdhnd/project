<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/boxicons.min.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}" type="image/png">
    <title>{{ $title }}</title>
</head>
<body class="bg-gray">
    @include('templates/alerts')
    <div class="flex flex-col items-center justify-center px-6 mx-auto min-h-screen py-6">
        <a href="#" class="flex justify-center mb-6 text-2xl font-semibold text-dark">
            <img class="" src="{{ asset('img/desa.png') }}" width="160" alt="logo">
        </a>
        <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
</body>
</html>
