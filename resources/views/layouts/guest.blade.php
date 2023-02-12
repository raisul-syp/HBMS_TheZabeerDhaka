<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @foreach ($settings as $item)
    <title>@yield('title') - {{ $item->name }}</title>
    @endforeach
    <meta name="description" content="@yield('meta_decription')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="author" content="SYP Solutions Ltd.">

    <!-- Favicon icon -->
    @foreach ($settings as $item)
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('uploads/site/'.$item->icon) }}">
    @endforeach

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontend/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/modules.css') }}">

    <!-- Vendor Stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui-1.13.2.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/animate_css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/bootstrap-5.0.2/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/fontawesome-5.15.4/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/OwlCarousel2-2.3.4/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/OwlCarousel2-2.3.4/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/icon-font-1.0.0/icon-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/daterangepicker/daterangepicker.css') }}">

    @livewireStyles
</head>
<body>
    <div class="wrapper">
        <header id="header_section" class="header_section">
            <div class="header_section_inner">
                <div class="header_top">
                    @include('layouts.inc.frontend.topbar')
                </div>

                <div id="navbar_top" class="header_bottom">
                    @include('layouts.inc.frontend.navbar')
                </div>
            </div>
        </header>

        <div class="main-body">
            @yield('content')
        </div>

        <footer id="footer_section" class="footer_section">
            @include('layouts.inc.frontend.footer')
        </footer>

        <a href="#" class="back-to-top">
            <i data-feather="chevron-up"></i>
        </a>
    </div>


    <!-- Scripts -->
    <script src="{{ asset('frontend/js/jquery-3.6.1.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-ui-1.13.2.js') }}"></script>
    <script src="{{ asset('frontend/js/site.js') }}"></script>
    <script src="{{ asset('frontend/js/default.js') }}"></script>
    <script src="{{ asset('frontend/js/slider.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.js') }}"></script>

    <!-- Vendor Scripts -->
    <script src="{{ asset('frontend/vendors/bootstrap-5.0.2/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/isotope/isotope.pkgd.js') }}"></script>
    <script src="{{ asset('frontend/vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/fontawesome-5.15.4/js/all.min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/OwlCarousel2-2.3.4/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/feathericons-4.29.0/feather.min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/iconify-icon/iconify-icon.min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/dropify/dist/js/dropify.min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/dropify/dist/js/dropify-init.js') }}"></script>
    <script src="{{ asset('frontend/vendors/moment/moment.min.js') }}"></script>
    <script src="{{ asset('frontend/vendors/daterangepicker/daterangepicker.min.js') }}"></script>
    @livewireScripts
    @yield('scripts')
</body>
</html>

