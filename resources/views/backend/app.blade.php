<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rupgonj Scientific | @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('/img/logos/rupgonj-fav-icon.svg') }}" alt="rupgonj scientific fav icon" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flickity.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('search/search.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link href="{{ asset('backend/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/summernote.min.css') }}" rel="stylesheet">
    <style type="text/css">
        .form-control {
            line-height: 1.1;
        }

        ::-webkit-scrollbar {
            width: 3px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .btn-close {
            padding: 0px;
            border: 0px solid transparent;
            background: transparent;
        }

        .btn-close i {
            font-size: 1.4rem;
            color: red;
        }

        .img-thumbnail {
            width: 50px;
            height: 50px;
        }

        .about .img-fluid {
            width: 50px;
            height: 50px;
        }

        table th,
        table td {
            vertical-align: middle !important;
        }
    </style>
    @yield('head-styles')
</head>

<body>
    @include('backend.append.sidebar')
    <main class="main">
        @yield('content')
    </main>
    <a href="#!" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const scrollToTopButton = document.querySelector('.scroll-to-top');

            window.addEventListener('scroll', function() {
                if (window.scrollY > 300) {
                    scrollToTopButton.style.display = 'block';
                } else {
                    scrollToTopButton.style.display = 'none';
                }
            });

            scrollToTopButton.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/summernote.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/core.min.js') }}"></script>
    <script src="{{ asset('search/search.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/flickity.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/summernote.min.js') }}"></script>


    </script>
    <script>
        window.addEventListener('DOMContentLoaded', event => {
            const sidebarToggle = document.body.querySelector('#sidebarToggle');
            if (sidebarToggle) {
                if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
                    document.body.classList.toggle('sb-sidenav-toggled');
                }
                sidebarToggle.addEventListener('click', event => {
                    event.preventDefault();
                    document.body.classList.toggle('sb-sidenav-toggled');
                    localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains(
                        'sb-sidenav-toggled'));
                });
            }
        });
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200,
                minHeight: null,
                maxHeight: null,
                focus: true
            });

            $('#productForm').on('submit', function(event) {
                let isValid = true;
                const validImageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

                $('#productForm').find('input[type="file"][accept="image/*"]').each(function() {
                    const file = this.files[0];
                    if (file && !validImageTypes.includes(file.type)) {
                        isValid = false;
                        alert('Please select a valid image file (JPEG, PNG, GIF, or WEBP).');
                        event.preventDefault();
                        return false;
                    }
                });

                if (!isValid) {
                    event.preventDefault();
                }
            });


            $('#productForm').on('reset', function() {
                $(this).find('input[type="file"]').val('');
                $(this).find('textarea').val('');
            });
        });
    </script>
    


    @yield('scripts')
</body>

</html>
