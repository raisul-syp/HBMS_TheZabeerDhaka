<div class="header-content">
    <nav class="navbar navbar-expand">
        <div class="collapse navbar-collapse justify-content-between">
            <div class="header-left">
                <div class="search_bar dropdown">
                    <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                        <i class="mdi mdi-magnify"></i>
                    </span>
                    <div class="dropdown-menu p-0 m-0">
                        <form>
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        </form>
                    </div>
                </div>
            </div>

            <ul class="navbar-nav header-right">
                <li class="nav-item live_website">
                    <a class="nav-link" href="{{ url('/') }}" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Live Website">
                        <i class="mdi mdi-web"></i>
                        <div class="pulse-css"></div>
                    </a>
                </li>
                {{-- <li class="nav-item dropdown notification_dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                        <i class="mdi mdi-bell"></i>
                        <div class="pulse-css"></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="list-unstyled">
                            <li class="media dropdown-item">
                                <span class="success"><i class="ti-user"></i></span>
                                <div class="media-body">
                                    <a href="#">
                                        <p><strong>Martin</strong> has added a <strong>customer</strong> Successfully
                                        </p>
                                    </a>
                                </div>
                                <span class="notify-time">3:20 am</span>
                            </li>
                            <li class="media dropdown-item">
                                <span class="primary"><i class="ti-shopping-cart"></i></span>
                                <div class="media-body">
                                    <a href="#">
                                        <p><strong>Jennifer</strong> purchased Light Dashboard 2.0.</p>
                                    </a>
                                </div>
                                <span class="notify-time">3:20 am</span>
                            </li>
                            <li class="media dropdown-item">
                                <span class="danger"><i class="ti-bookmark"></i></span>
                                <div class="media-body">
                                    <a href="#">
                                        <p><strong>Robin</strong> marked a <strong>ticket</strong> as unsolved.
                                        </p>
                                    </a>
                                </div>
                                <span class="notify-time">3:20 am</span>
                            </li>
                            <li class="media dropdown-item">
                                <span class="primary"><i class="ti-heart"></i></span>
                                <div class="media-body">
                                    <a href="#">
                                        <p><strong>David</strong> purchased Light Dashboard 1.0.</p>
                                    </a>
                                </div>
                                <span class="notify-time">3:20 am</span>
                            </li>
                            <li class="media dropdown-item">
                                <span class="success"><i class="ti-image"></i></span>
                                <div class="media-body">
                                    <a href="#">
                                        <p><strong> James.</strong> has added a<strong>customer</strong> Successfully
                                        </p>
                                    </a>
                                </div>
                                <span class="notify-time">3:20 am</span>
                            </li>
                        </ul>
                        <a class="all-notification" href="#">See all notifications <i
                                class="ti-arrow-right"></i></a>
                    </div>
                </li> --}}
                <li class="nav-item dropdown header-profile">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                        <i class="mdi mdi-account"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="user-name-role-img">
                            <div class="user-img">
                                <img src="{{ asset('uploads/users/profile_photo/'.Auth::guard('admin')->user()->profile_photo) }}" alt="">
                            </div>
                            <div class="name-role">
                                <h4 class="mb-0">{{ Auth::guard('admin')->user()->first_name.' '.Auth::guard('admin')->user()->last_name }}</h4>
                                <p class="mb-0">
                                    {{-- @if (Auth::guard('admin')->user()->role_as == '0')
                                        Admin
                                    @else
                                        Staff
                                    @endif --}}
                                    @foreach ($roles as $role)
                                    @if ($role->id == Auth::guard('admin')->user()->role_as)
                                    {{ $role->name }}
                                    @endif
                                    @endforeach
                                </p>
                            </div>
                        </div>

                        <a href="{{ url('admin/profile-settings/my-profile') }}" class="dropdown-item">
                            <i class="icon-user"></i>
                            <span class="ml-2">My Profile</span>
                        </a>
                        <a class="dropdown-item" href="{{ route('admin.logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="icon-key"></i>
                            <span class="ml-2">{{ __('Logout') }}</span>
                        </a>

                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
