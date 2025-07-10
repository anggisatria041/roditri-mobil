<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('themes/img/fav.png') }}">
    <meta name="author" content="CodePixar">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Roditri - Mobil</title>
    <link rel="stylesheet" href="{{ asset('themes/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/css/ion.rangeSlider.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/css/ion.rangeSlider.skinFlat.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/css/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    @include('page.header')
    @yield('content')
    @include('page.footer')
    <script src="{{ asset('themes/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="{{ asset('themes/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('themes/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('themes/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('themes/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('themes/js/nouislider.min.js') }}"></script>
    {{-- <script src="{{ asset('themes/js/countdown.js') }}"></script> --}}
    <script src="{{ asset('themes/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('themes/js/owl.carousel.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="{{ asset('themes/js/gmaps.min.js') }}"></script>
    <script src="{{ asset('themes/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('js')
</body>

</html>