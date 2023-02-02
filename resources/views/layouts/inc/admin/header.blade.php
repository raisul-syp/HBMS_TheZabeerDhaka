<a href="{{ url('/admin/dashboard') }}" class="brand-logo">
    @if (!empty($settings->logo))
    <img class="logo-abbr" src="{{ asset('uploads/site/'.$settings->logo) }}" alt="">
    @else
    <img class="logo-abbr" src="{{ asset('uploads/site/logo-the-zabeer-dhaka.png') }}" alt="">
    @endif
</a>

<div class="nav-control">
    <div class="hamburger">
        <span class="line"></span><span class="line"></span><span class="line"></span>
    </div>
</div>
