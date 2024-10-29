<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ambalait | @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('img/logos/ambalait-fav-logo.png') }}" alt="Ambala IT Logo" />
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flickity.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('search/search.css') }}">
    <link rel="stylesheet" href="{{ asset('quform/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/app.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/service.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <style type="text/css">
        ul.none {
            padding: 0px !important;
        }

        ul.none li {
            padding: 0px !important;
            list-style: none;
        }
    </style>
    @yield('head-styles')
</head>

<body>
    @include('includes.header')
    <main class="main">
        @yield('content')
    </main>
    @include('includes.footer')
    <a href="#!" class="scroll-to-top">
        <i class="fas fa-angle-up" aria-hidden="true"></i>
    </a>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/core.min.js') }}"></script>
    <script src="{{ asset('search/search.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/flickity.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 1000,
                once: true
            });
        });

        AOS.init({
            duration: 1000,
            once: true,
        });
    </script>

    @yield('scripts')
</body>

</html>
