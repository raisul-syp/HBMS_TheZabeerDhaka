@php
    $usr = Auth::guard('admin')->user();
@endphp

<div class="quixnav-scroll">
    <ul class="metismenu" id="menu">
        @if ($usr->can('Dashboard.Index'))
        <li>
            <a href="{{ url('admin/dashboard') }}">
                <i class="icon icon-home"></i>
                <span class="nav-text">{{ __('Dashboard') }}</span>
            </a>
        </li>
        @endif
        @if ($usr->can('Role.Index') || $usr->can('Role.Create') || $usr->can('Role.Edit') || $usr->can('Role.Delete') || $usr->can('Permission.Index') || $usr->can('Permission.Create') || $usr->can('Permission.Edit') || $usr->can('Permission.Delete'))
        <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="icon icon-bell-53"></i>
                <span class="nav-text">{{ __('Role & Permission') }}</span>
            </a>
            <ul aria-expanded="false">
                @if ($usr->can('Role.Index'))
                <li><a href="{{ url('admin/role-permission/role') }}">{{ __('Manage Role') }}</a></li>
                @endif
                @if ($usr->can('Permission.Index'))
                <li><a href="{{ url('admin/role-permission/permission') }}">{{ __('Manage Permission') }}</a></li>
                @endif
            </ul>
        </li>
        @endif
        @if ($usr->can('RoomType.Index') || $usr->can('RoomType.Create') || $usr->can('RoomType.Edit') || $usr->can('RoomType.Delete'))
        <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="icon icon-single-04"></i>
                <span class="nav-text">{{ __('Room Type') }}</span>
            </a>
            <ul aria-expanded="false">
                @if ($usr->can('RoomType.Create'))
                <li><a href="{{ url('admin/roomtype/create') }}">{{ __('Add Room Type') }}</a></li>
                @endif
                @if ($usr->can('RoomType.Index'))
                <li><a href="{{ url('admin/roomtype') }}">{{ __('All Room Type') }}</a></li>
                @endif
            </ul>
        </li>
        @endif
        @if ($usr->can('Facilities.Index') || $usr->can('Facilities.Create') || $usr->can('Facilities.Edit') || $usr->can('Facilities.Delete'))
        <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="icon icon-single-04"></i>
                <span class="nav-text">{{ __('Facilities') }}</span>
            </a>
            <ul aria-expanded="false">
                @if ($usr->can('Facilities.Create'))
                <li><a href="{{ url('admin/facility/create') }}">{{ __('Add Facility') }}</a></li>
                @endif
                @if ($usr->can('Facilities.Index'))
                <li><a href="{{ url('admin/facility') }}">{{ __('All Facility') }}</a></li>
                @endif
            </ul>
        </li>
        @endif
        @if ($usr->can('Rooms.Index') || $usr->can('Rooms.Create') || $usr->can('Rooms.Edit') || $usr->can('Rooms.Delete'))
        <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="icon icon-single-04"></i>
                <span class="nav-text">{{ __('Rooms') }}</span>
            </a>
            <ul aria-expanded="false">
                @if ($usr->can('Rooms.Create'))
                <li><a href="{{ url('admin/room/create') }}">{{ __('Add Room') }}</a></li>
                @endif
                @if ($usr->can('Rooms.Index'))
                <li><a href="{{ url('admin/room') }}">{{ __('All Room') }}</a></li>
                @endif
            </ul>
        </li>
        @endif
        @if ($usr->can('Restaurants.Index') || $usr->can('Restaurants.Create') || $usr->can('Restaurants.Edit') || $usr->can('Restaurants.Delete'))
        <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="icon icon-coffee"></i>
                <span class="nav-text">{{ __('Restaurants') }}</span>
            </a>
            <ul aria-expanded="false">
                @if ($usr->can('Restaurants.Create'))
                <li><a href="{{ url('admin/restaurent/create') }}">{{ __('Add Restaurant') }}</a></li>
                @endif
                @if ($usr->can('Restaurants.Index'))
                <li><a href="{{ url('admin/restaurent') }}">{{ __('All Restaurant') }}</a></li>
                @endif
            </ul>
        </li>
        @endif
        @if ($usr->can('Halls.Index') || $usr->can('Halls.Create') || $usr->can('Halls.Edit') || $usr->can('Halls.Delete'))
        <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="icon icon-single-04"></i>
                <span class="nav-text">{{ __('Halls') }}</span>
            </a>
            <ul aria-expanded="false">
                @if ($usr->can('Halls.Create'))
                <li><a href="{{ url('admin/hall/create') }}">{{ __('Add Hall') }}</a></li>
                @endif
                @if ($usr->can('Halls.Index'))
                <li><a href="{{ url('admin/hall') }}">{{ __('All Hall') }}</a></li>
                @endif
            </ul>
        </li>
        @endif
        @if ($usr->can('Wellness.Index') || $usr->can('Wellness.Create') || $usr->can('Wellness.Edit') || $usr->can('Wellness.Delete'))
        <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="icon icon-single-04"></i>
                <span class="nav-text">{{ __('Wellness') }}</span>
            </a>
            <ul aria-expanded="false">
                @if ($usr->can('Wellness.Create'))
                <li><a href="{{ url('admin/wellness/create') }}">{{ __('Add Wellness') }}</a></li>
                @endif
                @if ($usr->can('Wellness.Create'))
                <li><a href="{{ url('admin/wellness') }}">{{ __('All Wellness') }}</a></li>
                @endif
            </ul>
        </li>
        @endif
        @if ($usr->can('Offers.Index') || $usr->can('Offers.Create') || $usr->can('Offers.Edit') || $usr->can('Offers.Delete'))
        <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="icon icon-single-04"></i>
                <span class="nav-text">{{ __('Offers') }}</span>
            </a>
            <ul aria-expanded="false">
                @if ($usr->can('Offers.Create'))
                <li><a href="{{ url('admin/offers/create') }}">{{ __('Add Offer') }}</a></li>
                @endif
                @if ($usr->can('Offers.Index'))
                <li><a href="{{ url('admin/offers') }}">{{ __('All Offer') }}</a></li>
                @endif
                @if ($usr->can('Offers.Create') || $usr->can('Offers.Edit'))
                <li><a href="{{ url('admin/offer-category') }}">{{ __('Offer Category') }}</a></li>
                @endif
            </ul>
        </li>
        @endif
        @if ($usr->can('FAQ.Index') || $usr->can('FAQ.Create') || $usr->can('FAQ.Edit') || $usr->can('FAQ.Delete'))
        <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="icon icon-single-04"></i>
                <span class="nav-text">{{ __('FAQ') }}</span>
            </a>
            <ul aria-expanded="false">
                @if ($usr->can('FAQ.Create'))
                <li><a href="{{ url('admin/faq/create') }}">{{ __('Add FAQ') }}</a></li>
                @endif
                @if ($usr->can('FAQ.Index'))
                <li><a href="{{ url('admin/faq') }}">{{ __('All FAQ') }}</a></li>
                @endif
            </ul>
        </li>
        @endif
        @if ($usr->can('Bookings.Index') || $usr->can('Bookings.Create') || $usr->can('Bookings.Edit') || $usr->can('Bookings.Delete'))
        <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="icon icon-single-04"></i>
                <span class="nav-text">{{ __('Bookings') }}</span>
            </a>
            <ul aria-expanded="false">
                @if ($usr->can('Bookings.Create'))
                <li><a href="{{ url('admin/booking/create') }}">{{ __('Add Booking') }}</a></li>
                @endif
                @if ($usr->can('Bookings.Index'))
                <li><a href="{{ url('admin/booking') }}">{{ __('All Booking') }}</a></li>
                @endif
            </ul>
        </li>
        @endif
        @if ($usr->can('Guests.Index') || $usr->can('Guests.Create') || $usr->can('Guests.Edit') || $usr->can('Guests.Delete'))
        <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="icon icon-single-04"></i>
                <span class="nav-text">{{ __('Guests') }}</span>
            </a>
            <ul aria-expanded="false">
                @if ($usr->can('Guests.Create'))
                <li><a href="{{ url('admin/guest/create') }}">{{ __('Add Guest') }}</a></li>
                @endif
                @if ($usr->can('Guests.Index'))
                <li><a href="{{ url('admin/guest') }}">{{ __('All Guest') }}</a></li>
                @endif
            </ul>
        </li>
        @endif
        @if ($usr->can('Users.Index') || $usr->can('Users.Create') || $usr->can('Users.Edit') || $usr->can('Users.Delete'))
        <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="icon icon-single-04"></i>
                <span class="nav-text">{{ __('Users') }}</span>
            </a>
            <ul aria-expanded="false">
                @if ($usr->can('Users.Create'))
                <li><a href="{{ url('admin/user/create') }}">{{ __('Add User') }}</a></li>
                @endif
                @if ($usr->can('Users.Index'))
                <li><a href="{{ url('admin/user') }}">{{ __('All User') }}</a></li>
                @endif
            </ul>
        </li>
        @endif
        @if ($usr->can('Website.Menu.Index') || $usr->can('Website.Menu.Create') || $usr->can('Website.Menu.Edit') || $usr->can('Website.Menu.Delete') || $usr->can('Website.Pages.Index') || $usr->can('Website.Pages.Create') || $usr->can('Website.Pages.Edit') || $usr->can('Website.Pages.Delete') || $usr->can('Website.Sliders.Index') || $usr->can('Website.Sliders.Create') || $usr->can('Website.Sliders.Edit') || $usr->can('Website.Sliders.Delete') || $usr->can('Website.Testimonials.Index') || $usr->can('Website.Testimonials.Create') || $usr->can('Website.Testimonials.Edit') || $usr->can('Website.Testimonials.Delete') || $usr->can('Website.Facilities.Index') || $usr->can('Website.Facilities.Create') || $usr->can('Website.Facilities.Edit') || $usr->can('Website.Facilities.Delete') || $usr->can('Website.ContactInfos.Index') || $usr->can('Website.ContactInfos.Create') || $usr->can('Website.ContactInfos.Edit') || $usr->can('Website.ContactInfos.Delete'))
        <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="icon icon-single-04"></i>
                <span class="nav-text">{{ __('Website') }}</span>
            </a>
            <ul aria-expanded="false">
                @if ($usr->can('Website.Menu.Index') || $usr->can('Website.Menu.Create') || $usr->can('Website.Menu.Edit') || $usr->can('Website.Menu.Delete'))
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">{{ __('Menu') }}</a>
                    <ul aria-expanded="false">
                        @if ($usr->can('Website.Menu.Create'))
                        <li><a href="{{ url('admin/website/menu/create') }}">{{ __('Add Menu') }}</a></li>
                        @endif
                        @if ($usr->can('Website.Menu.Index'))
                        <li><a href="{{ url('admin/website/menu') }}">{{ __('All Menu') }}</a></li>
                        @endif
                    </ul>
                </li>
                @endif
                @if ($usr->can('Website.Pages.Index') || $usr->can('Website.Pages.Create') || $usr->can('Website.Pages.Edit') || $usr->can('Website.Pages.Delete'))
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">{{ __('Pages') }}</a>
                    <ul aria-expanded="false">
                        @if ($usr->can('Website.Pages.Create'))
                        <li><a href="{{ url('admin/website/pages/create') }}">{{ __('Add Page') }}</a></li>
                        @endif
                        @if ($usr->can('Website.Pages.Index'))
                        <li><a href="{{ url('admin/website/pages') }}">{{ __('All Page') }}</a></li>
                        @endif
                    </ul>
                </li>
                @endif
                @if ($usr->can('Website.Sliders.Index') || $usr->can('Website.Sliders.Create') || $usr->can('Website.Sliders.Edit') || $usr->can('Website.Sliders.Delete'))
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">{{ __('Sliders') }}</a>
                    <ul aria-expanded="false">
                        @if ($usr->can('Website.Sliders.Create'))
                        <li><a href="{{ url('admin/website/sliders/create') }}">{{ __('Add Slider') }}</a></li>
                        @endif
                        @if ($usr->can('Website.Sliders.Index'))
                        <li><a href="{{ url('admin/website/sliders') }}">{{ __('All Slider') }}</a></li>
                        @endif
                    </ul>
                </li>
                @endif
                @if ($usr->can('Website.Testimonials.Index') || $usr->can('Website.Testimonials.Create') || $usr->can('Website.Testimonials.Edit') || $usr->can('Website.Testimonials.Delete'))
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">{{ __('Testimonials') }}</a>
                    <ul aria-expanded="false">
                        @if ($usr->can('Website.Testimonials.Create'))
                        <li><a href="{{ url('admin/website/testimonials/create') }}">{{ __('Add Testimonial') }}</a></li>
                        @endif
                        @if ($usr->can('Website.Testimonials.Index'))
                        <li><a href="{{ url('admin/website/testimonials') }}">{{ __('All Testimonials') }}</a></li>
                        @endif
                    </ul>
                </li>
                @endif
                @if ($usr->can('Website.Facilities.Index') || $usr->can('Website.Facilities.Create') || $usr->can('Website.Facilities.Edit') || $usr->can('Website.Facilities.Delete'))
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">{{ __('Facilities') }}</a>
                    <ul aria-expanded="false">
                        @if ($usr->can('Website.Facilities.Create'))
                        <li><a href="{{ url('admin/website/facilities/create') }}">{{ __('Add Facility') }}</a></li>
                        @endif
                        @if ($usr->can('Website.Facilities.Index'))
                        <li><a href="{{ url('admin/website/facilities') }}">{{ __('All Facilities') }}</a></li>
                        @endif
                    </ul>
                </li>
                @endif
                @if ($usr->can('Website.ContactInfos.Index') || $usr->can('Website.ContactInfos.Create') || $usr->can('Website.ContactInfos.Edit') || $usr->can('Website.ContactInfos.Delete'))
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">{{ __('Contact Infos') }}</a>
                    <ul aria-expanded="false">
                        @if ($usr->can('Website.ContactInfos.Create'))
                        <li><a href="{{ url('admin/website/contactinfo/create') }}">{{ __('Add Contact Info') }}</a></li>
                        @endif
                        @if ($usr->can('Website.ContactInfos.Index'))
                        <li><a href="{{ url('admin/website/contactinfo') }}">{{ __('All Contact Infos') }}</a></li>
                        @endif
                    </ul>
                </li>
                @endif
            </ul>
        </li>
        @endif
        <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="icon icon-single-04"></i>
                <span class="nav-text">{{ __('Profile Settings') }}</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ url('admin/profile-settings/my-profile') }}">{{ __('My Profile') }}</a></li>
                <li><a href="{{ url('admin/profile-settings/change-password') }}">{{ __('Change Password') }}</a></li>
            </ul>
        </li>
        @if ($usr->can('Settings.Index') || $usr->can('Settings.Create') || $usr->can('Settings.Edit') || $usr->can('Settings.Delete'))
        <li>
            <a href="{{ url('admin/settings') }}">
                <i class="icon icon-settings-gear-64"></i>
                <span class="nav-text">{{ __('Settings') }}</span>
            </a>
        </li>
        @endif
    </ul>
</div>
