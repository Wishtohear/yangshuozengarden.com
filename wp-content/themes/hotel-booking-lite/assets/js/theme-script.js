function hotel_booking_lite_openNav() {
  jQuery(".sidenav").addClass('show');
}
function hotel_booking_lite_closeNav() {
  jQuery(".sidenav").removeClass('show');
}

( function( window, document ) {
  function hotel_booking_lite_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const hotel_booking_lite_nav = document.querySelector( '.sidenav' );

      if ( ! hotel_booking_lite_nav || ! hotel_booking_lite_nav.classList.contains( 'show' ) ) {
        return;
      }

      const elements = [...hotel_booking_lite_nav.querySelectorAll( 'input, a, button' )],
        hotel_booking_lite_lastEl = elements[ elements.length - 1 ],
        hotel_booking_lite_firstEl = elements[0],
        hotel_booking_lite_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;

      if ( ! shiftKey && tabKey && hotel_booking_lite_lastEl === hotel_booking_lite_activeEl ) {
        e.preventDefault();
        hotel_booking_lite_firstEl.focus();
      }

      if ( shiftKey && tabKey && hotel_booking_lite_firstEl === hotel_booking_lite_activeEl ) {
        e.preventDefault();
        hotel_booking_lite_lastEl.focus();
      }
    } );
  }
  hotel_booking_lite_keepFocusInMenu();
} )( window, document );

var btn = jQuery('#button');

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});

jQuery(document).ready(function() {
  var owl = jQuery('#top-slider .owl-carousel');
    owl.owlCarousel({
      margin: 0,
      nav: true,
      autoplay:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      loop: true,
      dots:false,
      rtl:true,
      navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        1024: {
          items: 1
      }
    }
  })
})

window.addEventListener('load', (event) => {
  jQuery(".loading").delay(2000).fadeOut("slow");
});

jQuery(window).scroll(function() {
  var data_sticky = jQuery('.top_header').attr('data-sticky');

  if (data_sticky == "true") {
    if (jQuery(this).scrollTop() > 1){
      jQuery('.top_header').addClass("stick_header");
    } else {
      jQuery('.top_header').removeClass("stick_header");
    }
  }
});
