<?php
define("VIEW_PATH", "views/");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="BlueBees4U">
    <meta name="author" content="BlueBees4U">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Favicon-->
    <link rel="shortcut icon" href="images/Logo.png" type="image/x-icon">
    <link rel="icon" href="images/Logo.png" type="image/x-icon">
    <!-- Google font (font-family: 'Montserrat', sans-serif;) -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">
    <!-- Google font (font-family: 'Open Sans', sans-serif;) -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400,400i,600,700" rel="stylesheet">
    <!-- Bootstrap Css-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <!-- Icons Css-->
    <link rel="stylesheet" type="text/css" href="css/themify-icons.css">
    <!-- Font Awesome Css-->
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <!-- OWL Carousel Css-->
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <!-- Slick Css -->
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <!-- Magnific Popup Css -->
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Paradise Slider Main Style Sheet -->
    <link href="css/full_width_animated_layers_002.css" rel="stylesheet" media="all">
</head>

<body>

    <!-- Messenger Chat plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat" page_id="109072494844358"></div>

    <!-- Preloader -->
    <div id="preloader">
        <div class="ozient-folding-cube">
            <div class="ozient-cube1 ozient-cube"></div>
            <div class="ozient-cube2 ozient-cube"></div>
            <div class="ozient-cube4 ozient-cube"></div>
            <div class="ozient-cube3 ozient-cube"></div>
        </div>
    </div>
    <!-- *****Main Wrapper***** -->
    <div id="home" class="main-wrapper">
        <?php

//include VIEW_PATH . 'sections/sub_navbar.php';

include VIEW_PATH . 'sections/header.php';

if (!empty($_GET['page'])) {
    if (file_exists(VIEW_PATH . $_GET['page'] . '.php')) {
        include VIEW_PATH . $_GET['page'] . '.php';
    } else {
        //header('HTTP/1.1 404 Not Found', true, 404);
        include VIEW_PATH . 'error.php';
        //exit();
    }
} else {
    include VIEW_PATH . "home.php";
}

/* ***** Footer section start **/
include VIEW_PATH . 'sections/footer.php';

include VIEW_PATH . 'sections/sub_footer.php';

?>

    </div>
    <!-- ***** End Main Wrapper ***** -->

    <!-- Jquery-2.2.4 JS -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <!-- login JS -->
    <script src="js/login.js"></script>
    <!-- Bootstrap-4 Beta JS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Touch Swipe JS File Version - 1.6.18 -->
    <script src="js/jquery.touchSwipe.min.js"></script>
    <!-- Paradise Slider Main JS File -->
    <script src="js/paradise_slider_min.js"></script>
    <!--Jquery Easing Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <!--Slick Js -->
    <script src="js/slick.min.js"></script>
    <!--Magnific Popup Js -->
    <script src="js/magnific-popup.js"></script>
    <!--OWL Carousel Js -->
    <script src="js/owl-carousel.min.js"></script>
    <!-- Custom JS -->
    <script src="js/custom.js"></script>
    <!-- Messenger Chat Plugin Code -->
    <script>
    window.fbAsyncInit = function() {
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
            logged_in_greeting: 'Hi! Welcome.',
            logged_out_greeting: 'Log in to Chat with Us',
            ref: 'coupon_15',
        });
        //FB.Event.subscribe('customerchat.load', callback());
        //FB.Event.subscribe('customerchat.show', callback());
        //FB.Event.subscribe('customerchat.dialogShow', callback());
    };
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "109072494844358");
    chatbox.setAttribute("attribution", "biz_inbox");
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
</body>

</html>