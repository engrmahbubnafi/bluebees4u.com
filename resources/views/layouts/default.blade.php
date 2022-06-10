<!doctype html>
<html lang="en" class="{{$className ?? 'fixed accounts'}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('app.name', 'Index Agro Group') }}</title>
    
    @include('common_pages.favicon')
    <!--BASIC css-->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/animate.css/animate.css') }}">
    <script>
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>
    </script>
</head>

<body>
    <div class="wrap" id="app">
        @yield('content')
    </div>
    <!--BASIC scripts-->
    <script src="{{ asset('js/app.js') }}"></script>
     <!-- ========================================================= -->
    <script src="{{ asset('vendor/nano-scroller/nano-scroller.js') }}"></script>
    <!--TEMPLATE scripts-->
    <!-- ========================================================= -->
    <script src="{{ asset('js/template-script.min.js') }}"></script>
    <script src="{{ asset('js/template-init.min.js') }}"></script>
    <!-- SECTION script and examples-->
</body>
</html>
