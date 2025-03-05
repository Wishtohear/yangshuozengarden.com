(function($) {
	"use strict";		

	$(document).on('ready', function() {
		jQuery('li.dropdown, li.dropdown-submenu').find('.caret').each(function() {
			jQuery(this).on('click', function() {
				if (jQuery(window).width() < 1024) {
					jQuery(this).after().next().slideToggle();
				}
				return false;
			});
		});		
	});
	

// scrolling bar
$(document).on("scroll", function(){
	var pixels = $(document).scrollTop();
	var pageHeight = $(document).height() - $(window).height();
	var progress = 100 * pixels / pageHeight;
	
	$(".page-progress").css("width", progress + "%");
});

// sticky header
if( hg_vars.sticky_menu ){	
	if ($(".mastser-header").length > 0) {
		$(window).on('scroll', function() {
			if ($(window).scrollTop() >= 250) {
				$('.mastser-header').addClass('is-sticky-menu');
			}
			else {
				$('.mastser-header').removeClass('is-sticky-menu');
			}
		});
	}
}

// click and scroll 
jQuery(window).scroll(function () {
	if (jQuery(this).scrollTop() > 500) {
		jQuery('.scroll-top').fadeIn();
	} else {
		jQuery('.scroll-top').fadeOut();
	}
});

jQuery('.scroll-top').click(function () {
	jQuery("html, body").animate({
		scrollTop: 100
	}, 600);
	return false;
});

// widget fixed room search
jQuery('.sidebar-widget.widget_mphb_search_availability_widget').parent('.col-md-4').css({'height':'100%','min-height':'200px','overflow':'auto','position':'-webkit-sticky','position':'sticky','top':'8%'});


//main slider	
var mainSlider = jQuery(".hg-home-slider");	
mainSlider.owlCarousel({
	items:1,		
	dots: true,
	loop: true,	
	margin: 0,
	nav: false,
	autoplayHoverPause: false,
	autoplay: true, 
	smartSpeed: 500,
});
mainSlider.on('mouseover',function(e){
	mainSlider.find('.owl-nav').css('opacity','1');
});
mainSlider.on('mouseleave',function(e){
	mainSlider.find('.owl-nav').css('opacity','0');
});

// room carousel 
jQuery('#room-owl').owlCarousel({
	loop:true,
	margin:20,
	nav:false,
	autoplay: true,
	responsive:{
		0:{
				items:1  //Mobile 
			},
			768:{
				items:2
			},
			1000:{
				items:3
			}
		}
	});

// on focus 

$('a').on("focus", function(){
	$(".text-reset").focus()
});

})(jQuery);


jQuery(document).ready(function(){
    jQuery(document)
      .on("mousemove", ".service-widget-item", function (event) {
        var halfW = this.clientWidth / 2;
        var halfH = this.clientHeight / 2;
        var coorX = halfW - (event.pageX - jQuery(this).offset().left);
        var coorY = halfH - (event.pageY - jQuery(this).offset().top);
        var degX1 = (coorY / halfH) * 8 + "deg";
        var degY1 = (coorX / halfW) * -8 + "deg";
        var degX2 = (coorY / halfH) * -50 + "px";
        var degY2 = (coorX / halfW) * 70 + "px";
        var degX3 = (coorY / halfH) * -10 + "px";
        var degY3 = (coorX / halfW) * 10 + "px";
        var degX4 = (coorY / halfH) * 15 + "deg";
        var degY4 = (coorX / halfW) * -15 + "deg";
        var degX5 = (coorY / halfH) * -30 + "px";
        var degY5 = (coorX / halfW) * 60 + "px";

        jQuery(this)
          .find(".service-content")
          .css("transform", function () {
            return (
              "perspective( 800px ) translateX(" +
              degX3 +
              ") translateY(" +
              degY3 +
              ") scale(1.02)"
            );
          });
        jQuery(this)
          .find(".service-hover_layer1")
          .css("transform", function () {
            return (
              "perspective( 800px ) translate3d( 0, 0, 0 ) rotateX(" +
              degX4 +
              ") rotateY(" +
              degY4 +
              ")"
            );
          });
      })
      .on("mouseout", ".service-widget-item", function () {
        jQuery(this).find(".service-content").removeAttr("style");
        jQuery(this).find(".service-hover_layer1").removeAttr("style");
      });
  });