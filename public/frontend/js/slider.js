$(document).ready(function () {
    // Home Slider
    $('.home-slider').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        navText: ["<iconify-icon icon='bytesize:chevron-left' style='color:white;font-size:40px;'></iconify-icon>", "<iconify-icon icon='bytesize:chevron-right' style='color:white;font-size:40px;'></iconify-icon>"],
        items: 1,
        mouseDrag: true,
        // animateOut: 'fadeOut',
        // animateIn: 'flipInX',
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
    })


    // Testimonials Slider
    $('.testimonials-slider').owlCarousel({
        loop: true,
        margin: 50,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:3
            }
        }
    })


    // Page Details Slider
    $('.page-details-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: true,
        items: 1,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
    });


    // Page Details Slider
    $('.room-offer-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: false,
        items: 1,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
    })
});