<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QInvest</title>
    @include('components.layout.css')
    @vite(['resources/js/theme.js'])
    <!-- Inclua o arquivo CSS do Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Inclua o arquivo JavaScript do Bootstrap (junto com a biblioteca Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

    @include('components.layout.header')

    @if(Route::currentRouteName() === 'index')
    <div class="page page-home">
        {{ $slot }}

    </div>
    @elseif(Route::currentRouteName() === 'education')
    <div class="page page-education">
        {{ $slot }}
    </div>

    @elseif(Route::currentRouteName() === 'formulary')
    <div class="page  formulary-page">
        {{ $slot }}
    </div>
    @else
    <div class="page">
        {{ $slot }}
    </div>
    @endif


    @include('components.layout.footer')



    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{asset('js/script.js')}}"></script>

</body>

</html>