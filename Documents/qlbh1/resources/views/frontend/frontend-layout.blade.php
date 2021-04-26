<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Bán hàng -@yield('title')</title>

    <link rel="icon" type="image/png" href="images/favicon.png">
    <!-- Web Font -->
   {{--  <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet"> --}}
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- StyleSheet -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}">
    <!-- Magnific Popup -->
    <link rel="stylesheet"
          href="{{asset('frontend/css/magnific-popup.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.css')}}">
    <!-- Fancybox -->
    <link rel="stylesheet"
          href="{{asset('frontend/css/jquery.fancybox.min.css')}}">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="{{asset('frontend/css/themify-icons.css')}}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/niceselect.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/flex-slider.min.css')}}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('frontend/css/owl-carousel.css')}}">
    <!-- Slicknav -->
    <link rel="stylesheet" href="{{asset('frontend/css/slicknav.min.css')}}">
    <!-- Jquery Ui -->
    <link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.css')}}">

    <!-- Eshop StyleSheet -->
    <link rel="stylesheet" href="{{asset('frontend/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
    @stack('stylesheets')
</head>
<body>
@include('frontend.commons.header')
@yield('content')

@include('frontend.commons.newsletter')

@include('frontend.commons.footer')
@include('sweetalert::alert')
<!-- jQuery Plugins -->
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery-migrate-3.0.0.js')}}"></script>
<script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
<!-- Popper JS -->
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<!-- Color JS -->
<!-- Slicknav JS -->
<script src="{{asset('frontend/js/slicknav.min.js')}}"></script>
<!-- Owl Carousel JS -->
<script src="{{asset('frontend/js/owl-carousel.js')}}"></script>
<!-- Magnific Popup JS -->
<script src="{{asset('frontend/js/magnific-popup.js')}}"></script>
<!-- Waypoints JS -->
<script src="{{asset('frontend/js/waypoints.min.js')}}"></script>
<!-- Countdown JS -->
<script src="{{asset('frontend/js/finalcountdown.min.js')}}"></script>
{{--<!-- Nice Select JS -->--}}
{{--<script src="{{asset('frontend/js/nicesellect.js')}}"></script>--}}
<!-- Flex Slider JS -->
<script src="{{asset('frontend/js/flex-slider.js')}}"></script>
<script src="{{asset('frontend/js/nice-select/js/jquery.nice-select.js')}}"></script>
<!-- ScrollUp JS -->
<script src="{{asset('frontend/js/scrollup.js')}}"></script>
<!-- Onepage Nav JS -->
<script src="{{asset('frontend/js/onepage-nav.min.js')}}"></script>
{{-- Isotope --}}
<script src="{{asset('frontend/js/isotope/isotope.pkgd.min.js')}}"></script>
<!-- Easing JS -->
<script src="{{asset('frontend/js/easing.js')}}"></script>
<!-- Active JS -->
<script src="{{asset('backend/js/select2.min.js')}}"></script>

<script src="{{asset('js/shipping_charge.js')}}"></script>
<script>
    $(document).on('change', '.pagination', function () {
        refreshPage();
    });
    $(document).on('change', '.order-type', function () {
        refreshPage();
    });

    function refreshPage() {
        const pagination = $('.pagination').find('option:selected').val();
        const orderBy = $('.order-type').find('option:selected').val();
        let url = $('#currentUrl').val();
        let searchParams = new URLSearchParams(window.location.search)
        if (pagination) {
            searchParams.set('pagination', pagination)
        }
        if (orderBy) {
            searchParams.set('order_type', orderBy);
        }
        window.location.search = searchParams.toString()
    }
</script>
@stack('javascripts')
</body>
</html>


