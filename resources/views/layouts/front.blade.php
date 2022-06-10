<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- CSRF Token -->

        <title>{{ config('app.name') }} | @yield('title',"Home")</title>

        <!-- mobile responsive meta-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="keywords" content="agro,poultry,fisheries,feed, agro companies, agro industries, cattle feed, cow feed, layer feed, broiler feed, bonoraja, bonoraja feed, fish feed, carp feed,">
        <meta name="description" content="Reliable for Poultry, Fisheries and Feed">
        <meta name="author" content="{{ config('app.name') }}">

        <meta property="og:title" content="{{ config('app.name') }}" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="Reliable for Poultry, Fisheries and Feed" />
        <meta property="og:url" content="{{ URL::to('/'); }}" />
        <meta property="og:image" content="{{ asset('images/img/social-agro-logo.png') }}" />

        <!-- fab icon-->
        @include('common_pages.favicon')

        <!-- main stylesheet-->
        <link rel="stylesheet" href="{{ asset('css/front_app.css') }}">

        @stack('css')
    </head>

    <body>
        <x-top-header></x-top-header>
        <x-nav></x-nav>

        @yield('content')

        <x-support></x-support>
        <x-footer></x-footer>

        <script src="{{ asset('js/front_app.js') }}"></script>

        @stack('scripts')

    </body>
</html>
