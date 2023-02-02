<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @if (!empty($settings->name))
    <title>@yield('title') - {{ $settings->name }}</title>
    @else
    <title>@yield('title') - {{ config('app.name') }}</title>
    @endif

    <!-- Favicon icon -->
    @if (!empty($settings->icon))
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('uploads/site/'.$settings->icon) }}">
    @else
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('uploads/site/icon-the-zabeer-dhaka.png') }}">
    @endif

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('admin/vendor/pg-calendar/css/pignose.calendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendor/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendor/summernote/summernote.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendor/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    @livewireStyles
</head>
<body>
    <div id="preloader">
        @include('layouts.inc.admin.loader')
    </div>

    <div id="main-wrapper">
        <div class="nav-header">
            @include('layouts.inc.admin.header')
        </div>

        <div class="header">
            @include('layouts.inc.admin.navbar')</div>

        <div class="quixnav">
            @include('layouts.inc.admin.sidebar')
        </div>

        <div class="content-body">
            @yield('content')
        </div>

        <div class="footer">
            @include('layouts.inc.admin.footer')
        </div>

    </div>


    {{-- Scripts --}}
    <script src="{{ asset('admin/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('admin/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('admin/js/custom.min.js') }}"></script>
    <script src="{{ asset('admin/js/site.js') }}"></script>

    <script src="{{ asset('admin/vendor/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/pg-calendar/js/pignose.calendar.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/summernote/js/summernote.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/dropify/dist/js/dropify.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins-init/summernote-init.js') }}"></script>
    <script src="{{ asset('admin/js/plugins-init/dropify-init.js') }}"></script>
    <script src="{{ asset('admin/icons/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('admin/js/dashboard/dashboard-2.js') }}"></script>
    @livewireScripts
    {{-- @stack('script') --}}
    @yield('scripts')
</body>
</html>
