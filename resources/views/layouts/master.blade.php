<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="BlueBees4U">
    <meta name="author" content="BlueBees4U">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Logo Image-->
    <link rel="shortcut icon" href="{{ asset('images/logo.webp') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/logo.webp') }}" type="image/x-icon">
    <!-- Comic Sans MS Font -->
{{--    <link href="{{ asset('webfonts/comic.ttf') }}" rel="stylesheet">--}}
<!-- Google font (font-family: 'Montserrat', sans-serif;) -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">
    <!-- Google font (font-family: 'Open Sans', sans-serif;) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/js_form_031.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jsform.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/testimonial_speech_bubble_carousel.css') }}">
    <!-- Icons CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/themify-icons.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome-all.min.css') }}">
    <!-- OWL Carousel CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.min.css') }}">
    <!-- Slick CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/magnific-popup.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fonts.css') }}">
    <!-- Paradise Slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/full_width_animated_layers_002.css') }}" media="all">
    @stack('css')
</head>

<body>
<header class="main-header">
    <!-- Main Navbar Starting -->
    <div class="main_navbar">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <!-- Main Container Starting -->
            <div class="container">
                <a class="navbar-brand logo-sticky" href="/"><img class="img-fluid"
                                                                  src="{{ asset('images/logo.webp') }}"
                                                                  alt="Bluebees4U Logo"/></a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav"><span
                        class="navbar-toggler-icon"></span></button>
                <!-- Navigation Bar Starting -->
                <x-nav></x-nav>
            </div>
        </nav>
    </div>
</header>
<div>
    @yield('content')
</div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="footer_about">
                    <h3>About Us</h3>
                    <div class="line-title-left"></div>
                    <p class="text-white">Bluebess4U offers a wide range digital service where every individual or
                        business or business entrepreneur will get a dedicated service along with a call center
                        including both inbound and outbound calls. We provide bilingual services in both English and
                        Bangla. We have a dedicated and well trained cadre of customer support specialists who are
                        able to consistently provide excellent services delivered in a timely and cost-effective
                        manner.</p>
                </div>
            </div>

            <div class="col-md-4">
                <iframe title="BlueBees4U Location at Google Map"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.0805898850954!2d90.4235941149819!3d23.78014438457481!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7371d769487%3A0xf2345a284c325164!2sBlueBees%20Limited!5e0!3m2!1sen!2sbd!4v1636435085710!5m2!1sen!2sbd"
                    width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

            <div class="col-md-4">
                <div class="footer_address pt-md-0 pt-3">
                    <h3>Address</h3>
                    <div class="line-title-left"></div>
                    <ul class="address-list">
                        <li>
                            <p><i class="fas fa-map-marker"></i>
                                {{$site_settings->address}}</p>
                        </li>
                        <li>
                            <p><i class="fas fa-mobile-alt"></i>{{$site_settings->phone}}</p>
                        </li>
                        <li>
                            <p><i class="far fa-envelope"></i>{{$site_settings->author_email}}</p>
                        </li>
                        <li>
                            <p><a href="https://www.facebook.com/bluebees4u/"><i
                                        class="fab fa-facebook-f"></i>Connect with Our Facebook</a></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Sub-footer -->
<div class="sub-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="text-center" style='color: white'>
                    Copyright <a href="{{ route('publicHome') }}" style='color: blue'>BlueBees4U.</a> All Rights
                    Reserved.
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Main Wrapper Ended -->

<!-- Jquery-2.2.4 JS -->
<script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
<!-- login JS -->
{{--<script src="{{ asset('js/login.js') }}"></script>--}}
<!-- Bootstrap-4 Beta JS -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- Touch Swipe JS File Version - 1.6.18 -->
<script src="{{ asset('js/jquery.touchSwipe.min.js') }}"></script>
<!-- Paradise Slider Main JS File -->
<script src="{{ asset('js/paradise_slider_min.js') }}"></script>
<!--Jquery Easing Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<!--Slick Js -->
{{--<script src="{{ asset('js/slick.min.js') }}"></script>--}}
<!--Magnific Popup Js -->
{{--<script src="{{ asset('js/magnific-popup.js') }}"></script>--}}
<!--OWL Carousel Js -->
<script src="{{ asset('js/owl-carousel.min.js') }}"></script>
<!-- Custom JS -->
<script src="{{ asset('js/custom.js') }}"></script>
<!-- Messenger Chat Plugin Code -->
<script>
    window.fbAsyncInit = function () {
        FB.init({
            appId: '575721347026139',
            autoLogAppEvents: true,
            xfbml: true,
            version: 'v12.0'
        });

        FB.CustomerChat.show({
            shouldShowDialog: true
        });
        FB.CustomerChat.showDialog();
        FB.CustomerChat.update({
            logged_in_greeting: 'Hi! Welcome to BlueBees4U.',
            logged_out_greeting: 'Log in to Chat with Us',
            ref: 'coupon_15',
        });
        //FB.Event.subscribe('customerchat.load', callback());
        //FB.Event.subscribe('customerchat.show', callback());
        //FB.Event.subscribe('customerchat.dialogShow', callback());
    };
    var chatbox = document.getElementById('fb-customer-chat');
    // chatbox.setAttribute("page_id", "109072494844358");
    // chatbox.setAttribute("attribution", "biz_inbox");
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
@stack('scripts')
</body>

</html>
