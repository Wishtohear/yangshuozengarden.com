
/* Custom JS
----------------------------------------------------------------*/
jQuery(document).ready(function ($) {

	'use strict';

    function ThemeOwlCaousel($elem) {
        $elem.owlCarousel({
            rtl: $("html").attr("dir") == 'rtl' ? true : false,
            items: $elem.data("collg"),
            margin: $elem.data("itemspace"),
            loop: $elem.data("loop"),
            center: $elem.data("center"),
            thumbs: false,
            thumbImage: false,
            autoplay: $elem.data("autoplay"),
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            smartSpeed: $elem.data("smartspeed"),
            dots: $elem.data("dots"),
            nav: $elem.data("nav"),
            navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
            responsive: {
                0: {
                    items: $elem.data("colxs"),
                },
                768: {
                    items: $elem.data("colsm"),
                },
                992: {
                    items: $elem.data("colmd"),
                },
                1200: {
                    items: $elem.data("collg"),
                }
            },
        });
    }

    if ($('.owl-carousel').length) {
        $('.owl-carousel').each(function() {
            new ThemeOwlCaousel($(this));
        });
    }

	$('.theme_mobile_container nav').meanmenu({
		meanScreenWidth: 990,
        meanMenuContainer: ".theme_mobile_container",
        meanMenuOpen: "<span></span><span></span><span></span>",
        onePage: true,
        meanRevealPosition: "center",
    });

    // Navigation Accessibility
    $(document).on('blur','.mean-nav > ul > li:last-child > a:last-child', function(e){
        e.preventDefault();
        $('.top-nav-area .meanclose').focus();
    });

    $(document).on('blur','.mean-expand', function(e){
        e.preventDefault();
        $(this).prev("ul").find("a:first").focus();
    });
	
	/* Menu dropdown on hover
	----------------------------------------------------------------*/
	$('.nav li.dropdown').hover(function(e) {
    	 e.preventDefault();
		   $(this).addClass('show');
	   }, function() {
		   $(this).removeClass('show');
	});

	$('.navbar .dropdown > a').click(function() {
      location.href = this.href;
    });

	var adminbarheight = function(){
        var height = 0;
        if ( $( '#wpadminbar' ).length ) {
            if ( $( '#wpadminbar' ).css('position') == 'fixed' ) {
                height = $( '#wpadminbar' ).height();
            }
        }
        return height;
    };
	
	function fullscreenSlider( no_trigger ){
        if ( $( '#hero_carousel').length > 0 ) {
            var window_h = $(window).height();
            var top = adminbarheight();
            var $header = $('.header');
            var is_transparent = $header.hasClass('is-t');
            var header_h;
            if ( is_transparent ) {
                header_h = 0;
            } else {
                //header_h = $header.height();
                var headertop_h = $('.header-top').outerHeight();
                var navbar_h = $('.hotelone_nav').outerHeight();
                header_h = headertop_h + navbar_h;
            }
            header_h += top;
            //jQuery('#hero_carousel .slide_image').css({'height':( window_h - header_h + 1) + 'px','width':'100%'});
            if (  typeof  no_trigger === "undefined" || ! no_trigger ) {
                //$document.trigger( 'hero_init' );
            }

        }
    }

    $(window).resize( function (){
        fullscreenSlider();
    });
	
    fullscreenSlider();

    $(document).on( 'header_view_changed', function(){
        fullscreenSlider();
    } );
	
});	

// Wow js init
if( hotelone_settings.disable_animations != true ){
	new WOW().init();
}

jQuery(document).ready(function ($) {
	var h;
	window.current_nav_item = false;
	h = $('.hotelone_nav').height();
	
	var $window     = $(window);
    var $document = $(document);
	var hotelone_js_settings = ['hotelone_disable_sticky_header'];
	
    // Navigation click to section.
    $('.navbar-nav li a[href*="#"]').on('click', function(event){
        event.preventDefault();
        smoothScroll( $( this.hash ) );
    });
	
	function inViewPort( $element, offset_top ){
        if ( ! offset_top ) {
            offset_top = 0
        }
        var view_port_top = jQuery( window ).scrollTop();
        if ( $('#wpadminbar' ).length > 0 ) {
            view_port_top -= $('#wpadminbar' ).outerHeight() - 1;
            offset_top += $('#wpadminbar' ).outerHeight() - 1;
        }
        var view_port_h = $( 'body' ).outerHeight();

        var el_top = $element.offset().top;
        var eh_h = $element.height();
        var el_bot = el_top + eh_h;
        var view_port_bot = view_port_top + view_port_h;

        var all_height = $( 'body' )[0].scrollHeight;
        var max_top = all_height - view_port_h;


        var in_view_port = false;
        // If scroll maximum
        if ( view_port_top >= max_top ) {

            if ( ( el_top < view_port_top &&  el_top > view_port_bot ) || ( el_top > view_port_top && el_bot < view_port_top  ) ) {
                in_view_port = true;
            }

        } else {
            if ( el_top <= view_port_top + offset_top ) {
                //if ( eh_bot > view_port_top &&  eh_bot < view_port_bot ) {
                if ( el_bot > view_port_top  ) {
                    in_view_port = true;
                }
            }
        }
        return in_view_port;
    }
	
	// Add active class to menu when scroll to active section.
    var _scroll_top = $window.scrollTop();
    jQuery( window ).scroll(function() {
        var currentNode = null;

        if ( ! window.current_nav_item ) {
            var current_top = $window.scrollTop();

            if ( hotelone_js_settings.hotelone_disable_sticky_header != '1' ) {
                h = jQuery('#wpadminbar').height() + jQuery('.hotelone_nav').height();
            } else {
                h = jQuery('#wpadminbar').height();
            }
			h = jQuery('.hotelone_nav').height();

            if( _scroll_top < current_top )
            {
                jQuery('.section').each( function ( index ) {
                    var section = jQuery( this );
                    var currentId = section.attr('id') || '';

                    var in_vp = inViewPort( section , h + 10) ;
                    if ( in_vp ) {
                        currentNode = currentId;
                    }
                });

            } else {
                var ns = jQuery('.section').length;
                for ( var i = ns - 1; i >= 0; i-- ) {
                    var section = jQuery('.section').eq( i );
                    var currentId = section.attr('id') || '';
                    var in_vp = inViewPort( section , h + 10) ;
                    if ( in_vp ) {
                        currentNode = currentId;
                    }

                }
            }
            _scroll_top = current_top;

        } else {
            currentNode = window.current_nav_item.replace('#', '');
        }

        setNavActive( currentNode );
    });
	
	function setNavActive( currentNode ){
        if ( currentNode ) {
            currentNode = currentNode.replace('#', '');
			console.log(currentNode)
            if (currentNode)
                jQuery('.navbar-nav li').removeClass('active');
            if (currentNode) {
                jQuery('.navbar-nav li').find('a[href$="#' + currentNode + '"]').parent().addClass('active');
            }
        }
    }
	
	// Move to the right section on page load.
    jQuery(window).load(function(){
        var urlCurrent = location.hash;
        if ( jQuery( urlCurrent ).length > 0 ) {
            smoothScroll( urlCurrent );
        }
    });

    // Smooth scroll animation
    function smoothScroll( element ) {
        if ( element.length <= 0 ) {
            return false;
        }
        $("html, body").animate({
            scrollTop: ( $( element ).offset().top - h) + "px"
        }, {
            duration: 800,
            easing: "swing",
            complete: function(){
                window.current_nav_item = false;
            }
        });
    }

    /* For WordPress Galleries */
    $(".enable-lightbox").lightGallery({
        selector: '.g-item'
    });
    $("[class*='wp-image-']").each(function(){
        var src = $(this).attr('src');
        $(this).attr('data-src', src);
    });
    $(".wp-block-gallery").lightGallery({
        selector: "[class*='wp-image-']",
    });
	
});

(function($){
    $(".section, .subheader").parallaxie({
         speed: 0.55,
         offset: 0,
         size: 'cover',
         pos_x: 'center',
      });
})(jQuery);