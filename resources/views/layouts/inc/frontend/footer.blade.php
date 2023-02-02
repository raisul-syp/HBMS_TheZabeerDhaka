<div class="footer_section_inner">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    @foreach ($settings as $item)
                    <div class="footer_logo">
                        <img src="{{ asset('uploads/site/'.$item->logo) }}" alt="{{ $item->name }}">
                    </div>
                    @endforeach
                </div>

                <div class="col-lg-7">
                    <div class="footer_links">
                        <h4>
                            <span>Company</span>
                            <div class="decor-1"></div>
                        </h4>
                        <ul>
                            @foreach ($footerItems as $item)
                            <li>
                                <i data-feather="chevron-right"></i>
                                <a href="{{ 'http://localhost:8000/'.$item->slug }}">{{ $item->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="footer_contact">
                        <h4>
                            <span>Contact Us</span>
                            <div class="decor-1"></div>
                        </h4>
                        @foreach ($settings as $item)
                        <ul class="contact">
                            <li>
                                <i data-feather="map-pin"></i>
                                <a href="#">{{ $item->address }}</a>
                            </li>
                            <li>
                                <i data-feather="phone"></i>
                                <a href="#">{{ $item->phone }}</a>
                            </li>
                            <li>
                                <i data-feather="mail"></i>
                                <a href="#">{{ $item->email }}</a>
                            </li>
                        </ul>
                        @endforeach

                        @foreach ($settings as $item)
                        <ul class="social">
                            <li>
                                <a href="{{ $item->social_fb }}" target="_blank">
                                    <i data-feather="facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $item->social_tw }}" target="_blank">
                                    <i data-feather="twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $item->social_insta }}" target="_blank">
                                    <i data-feather="instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $item->social_yt }}" target="_blank">
                                    <i data-feather="youtube"></i>
                                </a>
                            </li>
                        </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer_bottom_inner">
                        @foreach ($settings as $item)
                        <p>{{ $item->name }} © <span class="copyright-year"></span> | Developed By <a href="https://sypsolutions.com.bd/" target="_blank">SYP Solutions Ltd.</a></p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
