<!doctype html>
<html lang="en" class="fixed right-sidebar-opened ">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('app.name', 'Index Agro Group') }}</title>

    @include('common_pages.favicon')
    <!--load progress bar-->
    <script src="{{ asset('vendor/pace/pace.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('vendor/pace/pace-theme-minimal.css') }}" />

    <!--BASIC css-->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/animate.css/animate.css') }}">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}">
    <!--Magnific popup-->
    <link rel="stylesheet" href="{{ asset('vendor/magnific-popup/magnific-popup.css') }}">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @stack('css')
    <script>
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>
    </script>
</head>

<body>
    <div class="wrap" id="app">
        <!-- page HEADER -->
        <!-- ========================================================= -->
        @include('common_pages.page_header')
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body">
            <!-- LEFT SIDEBAR -->
            <!-- ========================================================= -->
            @include('common_pages.left_sidebar')
            <!-- CONTENT -->
            <!-- ========================================================= -->
            <div class="content">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if (session('flash_' . $msg))
                        <div class="alert alert-{{ $msg }}" role="alert">
                            <div class="alert-text">{{ session('flash_' . $msg) }}</div>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-close"></i></span>
                                </button>
                            </div>
                        </div>
                    @endif
                @endforeach
                @yield('content')
            </div>
            <!-- RIGHT SIDEBAR -->
            <!-- ========================================================= -->
            {{-- @include('common_pages.right_sidebar') --}}
            <!--scroll to top-->
            <a href="#" class="scroll-to-top"><i class="fa fa-angle-double-up"></i></a>
        </div>
    </div>
    <!--BASIC scripts-->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    // jQuery Repeater
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"
        integrity="sha512-foIijUdV0fR0Zew7vmw98E6mOWd9gkGWQBWaoA1EOFAx+pY+N8FmmtIYAVj64R98KeD2wzZh1aHK0JSpKmRH8w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- ========================================================= -->
    <script src="{{ asset('vendor/nano-scroller/nano-scroller.js') }}"></script>
    <!--TEMPLATE scripts-->
    <!-- ========================================================= -->
    <script src="{{ asset('js/template-script.min.js') }}"></script>
    <script src="{{ asset('js/template-init.min.js') }}"></script>
    <!-- SECTION script and examples-->
    <!-- =========================================================  -->
    <!--Notification msj-->
    <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>
    <!--morris chart-->
    <script src="{{ asset('vendor/chart-js/chart.min.js') }}"></script>
    <!--Gallery with Magnific popup-->
    <script src="{{ asset('vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <!--Examples-->
    @stack('script')
    <script>
        var child_var = $("#main-nav").find('.active-item');
        if (child_var.parent().parent().prop("tagName") == 'LI') {
            child_var.parent().parent().removeClass('close-item');
            child_var.parent().parent().addClass('open-item');
            var parent_var = child_var.parent().parent();
            if (parent_var.parent().parent().prop("tagName") == 'LI') {
                parent_var.parent().parent().removeClass('close-item');
                parent_var.parent().parent().addClass('open-item');
            }
        }
    </script>
</body>

</html>
