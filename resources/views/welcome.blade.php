<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/corano/corano/product-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:54:00 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Corano - Jewelry Shop eCommerce Bootstrap 5 Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/client/img/favicon.ico ')}}">

    <!-- CSS
	============================================ -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/client/css/vendor/bootstrap.min.css')}}">
    <!-- Pe-icon-7-stroke CSS -->
    <link rel="stylesheet" href="{{asset('assets/client/css/vendor/pe-icon-7-stroke.css')}}">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/client/css/vendor/font-awesome.min.css')}}">
    <!-- Slick slider css -->
    <link rel="stylesheet" href="{{asset('assets/client/css/plugins/slick.min.css')}}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{asset('assets/client/css/plugins/animate.css')}}">
    <!-- Nice Select css -->
    <link rel="stylesheet" href="{{asset('assets/client/css/plugins/nice-select.css')}}">
    <!-- jquery UI css -->
    <link rel="stylesheet" href="{{asset('assets/client/css/plugins/jqueryui.min.css')}}">
    <!-- main style css -->
    <link rel="stylesheet" href="{{asset('assets/client/css/style.css')}}">
    @yield('css')
</head>

<body>

    @include('clients.blocks.headerr')

    <div id="demo" class="carousel slide overflow-hidden" data-bs-ride="carousel" style="height: 480px;">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/banner10.png') }}" alt="" class="d-block w-100 h-100">
            </div>
            <div class="carousel-item">
                <img style="height: 100%;" src="{{ asset('images/banner8.png') }}" alt=""
                    class="d-block w-100 h-100">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banner11.png') }}" alt="" class="d-block w-100 h-100">
            </div>
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    @include('clients.blocks.footer')

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->




    <!-- Quick view modal end -->



    <!-- JS
============================================ -->

    <!-- Modernizer JS -->
    <script src="{{asset('assets/client/js/vendor/modernizr-3.6.0.min.js ')}}"></script>
    <!-- jQuery JS -->
    <script src="{{asset('assets/client/js/vendor/jquery-3.6.0.min.js ')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('assets/client/js/vendor/bootstrap.bundle.min.js ')}}"></script>
    <!-- slick Slider JS -->
    <script src="{{asset('assets/client/js/plugins/slick.min.js ')}}"></script>
    <!-- Countdown JS -->
    <script src="{{asset('assets/client/js/plugins/countdown.min.js ')}}"></script>
    <!-- Nice Select JS -->
    <script src="{{asset('assets/client/js/plugins/nice-select.min.js ')}}"></script>
    <!-- jquery UI JS -->
    <script src="{{asset('assets/client/js/plugins/jqueryui.min.js ')}}"></script>
    <!-- Image zoom JS -->
    <script src="{{asset('assets/client/js/plugins/image-zoom.min.js ')}}"></script>
    <!-- Images loaded JS -->
    <script src="{{asset('assets/client/js/plugins/imagesloaded.pkgd.min.js ')}}"></script>
    <!-- mail-chimp active js -->
    <script src="{{asset('assets/client/js/plugins/ajaxchimp.js ')}}"></script>
    <!-- contact form dynamic js -->
    <script src="{{asset('assets/client/js/plugins/ajax-mail.js ')}}"></script>
    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
    <!-- google map active js -->
    <script src="{{asset('assets/client/js/plugins/google-map.js ')}}"></script>
    <!-- Main JS -->
    <script src="{{asset('assets/client/js/main.js ')}}"></script>
    @yield('js')
</body>


<!-- Mirrored from htmldemo.net/corano/corano/product-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:54:00 GMT -->
</html>