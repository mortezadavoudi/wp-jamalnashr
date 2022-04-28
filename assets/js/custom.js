jQuery(function($) {
    $('#slider').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        rtl: true,
        autoplay: true,
        autoplayTimeout: 9000,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: false
            },
            1000: {
                items: 1,
                nav: true,
                loop: true
            }
        }
    })
    $('#age-slider').owlCarousel({
        loop: true,
        margin: 20,
        responsiveClass: true,
        rtl: true,
        responsive: {
            0: {
                items: 2.5,
                nav: true
            },
            600: {
                items: 4,
                nav: false
            },
            1000: {
                items: 7,
                nav: true,
                loop: true
            }
        }
    })
    $('.product-slider').owlCarousel({
        loop: true,
        responsiveClass: true,
        rtl: true,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1.3,
                margin: 2,
            },
            600: {
                items: 2.5,
                margin: 2,
            },
            1000: {
                items: 4.2,
            }
        }
    })
    $('.blog-slider').owlCarousel({
        loop: true,
        margin: 20,
        responsiveClass: true,
        rtl: true,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1.3,
            },
            600: {
                items: 2.5,
            },
            1000: {
                items: 4,
            }
        }
    })
    $('.icon-slider').owlCarousel({
        loop: false,
        margin: 20,
        responsiveClass: true,
        rtl: true,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 2,
            },
            600: {
                items: 3.5,
            },
            1000: {
                items: 5,
            }
        }
    })
    $('.sample-slider').owlCarousel({
        loop: false,
        margin: 20,
        responsiveClass: true,
        rtl: true,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 3,
            },
            600: {
                items: 1.5,
            },
            1000: {
                items: 3,
            }
        }
    })
    $('.slide-prodct-single').owlCarousel({
        loop: true,
        margin: 20,
        responsiveClass: true,
        rtl: true,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            }
        }
    })
    //Init the carousel
    initSlider();

    function initSlider() {
        $("#promot-slider").owlCarousel({
            items: 1,
            loop: true,
            responsiveClass: true,
            rtl: true,
            dots: false,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            nav: true,
            autoplayHoverPause: true,
            autoplay: true,
            onInitialized: startProgressBar,
            onTranslate: resetProgressBar,
            onTranslated: startProgressBar
        });
    }

    function startProgressBar() {
        // apply keyframe animation
        $(".slide-progress").css({
            width: "95%",
            transition: "width 5000ms"
        });
    }

    function resetProgressBar() {
        $(".slide-progress").css({
            width: 0,
            transition: "width 0s"
        });
    }
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
});
jQuery(document).ready(function ($) {
    "use strict";

    $('.custom_add_to_cart').click(function (e) {
        e.preventDefault();
        var id = $(this).next().next().attr('value');
        var data = {
            product_id: id,
            quantity: 1
        };
        $(this).parent().addClass('loading');
        $.post(wc_add_to_cart_params.wc_ajax_url.toString().replace('%%endpoint%%', 'add_to_cart'), data, function (response) {

            if (!response) {
                return;
            }
            if (response.error) {
                alert("Custom Massage ");
                $('.custom_add_to_cart').parent().removeClass('loading');
                return;
            }
            if (response) {

                var url = woocommerce_params.wc_ajax_url;
                url = url.replace("%%endpoint%%", "get_refreshed_fragments");
                $.post(url, function (data, status) {
                    $(".woocommerce.widget_shopping_cart").html(data.fragments["div.widget_shopping_cart_content"]);
                    if (data.fragments) {
                        jQuery.each(data.fragments, function (key, value) {

                            jQuery(key).replaceWith(value);
                        });
                    }
                    jQuery("body").trigger("wc_fragments_refreshed");
                });
                $('.custom_add_to_cart').parent().removeClass('loading');

            }

        });

    });
});

jQuery('.wc-tabs li a:first').addClass('active');
jQuery('.woocommerce-Tabs-panel:first').addClass('active');
jQuery('.menu li:first').addClass('active');
jQuery(document).trigger('yith_wcwl_reload_fragments')
