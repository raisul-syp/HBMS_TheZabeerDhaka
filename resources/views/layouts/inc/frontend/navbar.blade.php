<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar middle"></span>
            <span class="icon-bar"></span>
        </button>
        @foreach ($settings as $item)
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('uploads/site/'.$item->logo) }}" alt="{{ $item->name }}">
        </a>
        @endforeach

        @if (Auth::user())
        <form method="POST" action="{{ route('logout') }}">
        @csrf
            <a class="mobile-login d-block d-lg-none" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                <i data-feather="power"></i>
            </a>
        </form>
        @else
        <a class="mobile-login d-block d-lg-none " href="{{ route('login') }}">
            <i data-feather="log-in"></i>
        </a>
        @endif

        <div id="navbarSupportedContent" class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav m-auto">
                @foreach ($menuItems as $item)
                @if ($item->name == 'Rooms')
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ $item->name }}</a>
                      <ul class="dropdown-menu fade-down" aria-labelledby="navbarDropdown">
                        @foreach ($rooms as $room)
                        <li><a class="dropdown-item" href="{{ 'http://localhost:8000/rooms/room-details/'.$room->slug }}">{{ $room->name }}</a></li>
                        @endforeach
                      </ul>
                </li>
                @elseif ($item->name == 'Restaurants')
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ $item->name }}</a>
                      <ul class="dropdown-menu fade-down" aria-labelledby="navbarDropdown">
                        @foreach ($restaurents as $restaurent)
                        <li><a class="dropdown-item" href="{{ 'http://localhost:8000/restaurants/restaurant-details/'.$restaurent->slug }}">{{ $restaurent->name }}</a></li>
                        @endforeach
                      </ul>
                </li>
                @elseif ($item->name == 'Halls')
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ $item->name }}</a>
                      <ul class="dropdown-menu fade-down" aria-labelledby="navbarDropdown">
                        @foreach ($halls as $hall)
                        <li><a class="dropdown-item" href="{{ 'http://localhost:8000/halls/hall-details/'.$hall->slug }}">{{ $hall->name }}</a></li>
                        @endforeach
                      </ul>
                </li>
                @elseif ($item->name == 'Wellness')
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ $item->name }}</a>
                      <ul class="dropdown-menu fade-down" aria-labelledby="navbarDropdown">
                        @foreach ($wellnesses as $wellness)
                        <li><a class="dropdown-item" href="{{ 'http://localhost:8000/wellness/wellness-details/'.$wellness->slug }}">{{ $wellness->name }}</a></li>
                        @endforeach
                      </ul>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ 'http://localhost:8000/'.$item->slug }}"><span>{{ $item->name }}</span></a>
                </li>
                @endif
                @endforeach

                @if (Auth::user())
                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link" href="{{ url('/booking') }}">
                        {{ _('Booking') }}
                    </a>
                </li>
                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link" href="{{ url('/guest/profile') }}">
                        {{ _('View Profile') }}
                    </a>
                </li>
                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link" href="{{ url('/guest/booking-history') }}">
                        {{ _('Booking History') }}
                    </a>
                </li>
                @endif
            </ul>

            <ul class="navbar-nav d-none d-lg-block">
                @if (Auth::user())
                <li class="nav-item my-account">
                    <div class="dropdown">
                        <a class="nav-link btn btn-secondary btn-golden dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><span>My Account</span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li class="profile-sec">
                                @if (Auth::user()->profile_photo != null)
                                <div class="profile-img">
                                    <img src="{{ 'uploads/guests/profile_photo/'.Auth::user()->profile_photo }}">
                                </div>
                                @else
                                <div class="profile-img">
                                    <img src="{{ asset('admin/images/no-photo.png') }}">
                                </div>
                                @endif
                                <div class="profile-info">
                                    <h5>{{ Auth::user()->first_name.' '.Auth::user()->last_name }}</h5>
                                    <h6>{{ Auth::user()->email }}</h6>
                                </div>
                            </li>
                            <hr>
                            <li>
                                <a class="dropdown-item" href="{{ url('/guest/profile') }}">
                                    <i data-feather="user"></i>
                                    <span>View Profile</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/guest/change-password') }}">
                                    <i data-feather="key"></i>
                                    <span>Change Password</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/guest/booking-history') }}">
                                    <i data-feather="clock"></i>
                                    <span>Booking History</span>
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                        <i data-feather="power"></i> {{ _('Logout') }}
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link btn btn-primary btn-golden" href="{{ route('login') }}">
                        <i data-feather="log-in"></i> {{ _('Login') }}
                    </a>
                </li>
                @endif

                @if (Auth::user())
                <li class="nav-item booking-link">
                    <a class="nav-link btn btn-primary btn-golden" href="{{ url('/booking') }}">
                        {{ _('Booking') }}
                    </a>
                </li>
                @else
                <li class="nav-item booking-link">
                    <a class="nav-link btn btn-primary btn-golden" href="{{ route('login') }}">
                        {{ _('Booking') }}
                    </a>
                </li>
                @endif
            </ul>
        </div>
        <div class="collapse search-collapse" id="searchSupportedContent">
            <div class="search-box">
                <form role="search">
                    <input class="form-control" type="search" placeholder="Search">
                    <button type="submit" class="btn btn-primary">
                        <i data-feather="search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
