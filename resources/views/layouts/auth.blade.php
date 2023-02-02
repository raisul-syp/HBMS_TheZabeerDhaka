<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @foreach ($settings as $item)
    <title>@yield('title') - {{ $item->name }}</title>
    @endforeach

    <!-- Favicon icon -->
    @foreach ($settings as $item)
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('uploads/site/'.$item->icon) }}">
    @endforeach

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/account.css') }}">
    {{-- @livewireStyles --}}
</head>
<body>
    <div class="authincation">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center" style="height: 100vh;">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">

                                @yield('content')

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Scripts --}}
    <script src="{{ asset('admin/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('admin/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('admin/js/custom.min.js') }}"></script>
    {{-- @livewireScripts --}}
</body>
</html>
