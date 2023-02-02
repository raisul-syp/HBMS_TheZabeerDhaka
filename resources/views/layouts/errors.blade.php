<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Favicon icon -->
    @if (!empty($settings->icon))
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('uploads/site/'.$settings->icon) }}">
    @else
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('uploads/site/icon-the-zabeer-dhaka.png') }}">
    @endif

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
    @livewireStyles
</head>
<body style="background: var(--siteColor1);">
    <div class="authincation">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center" style="height: 100vh;">
                <div class="col-md-5">
                    <div class="form-input-content text-center error-page">

                        @yield('content')    

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
