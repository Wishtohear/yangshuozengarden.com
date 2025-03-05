jQuery(function($) {
    "use strict";

    // Search focus handler
    function searchFocusHandler() {
        const searchFirstTab = $('.inner_searchbox input[type="search"]');
        const searchLastTab = $('button.search-close');

        $(".open-search").click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            $('body').addClass("search-focus");
            searchFirstTab.focus();
        });

        $("button.search-close").click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            $('body').removeClass("search-focus");
            $(".open-search").focus();
        });

        // Redirect last tab to first input
        searchLastTab.on('keydown', function(e) {
            if ($('body').hasClass('search-focus') && e.which === 9 && !e.shiftKey) {
                e.preventDefault();
                searchFirstTab.focus();
            }
        });

        // Redirect first shift+tab to last input
        searchFirstTab.on('keydown', function(e) {
            if ($('body').hasClass('search-focus') && e.which === 9 && e.shiftKey) {
                e.preventDefault();
                searchLastTab.focus();
            }
        });

        // Allow escape key to close menu
        $('.inner_searchbox').on('keyup', function(e) {
            if ($('body').hasClass('search-focus') && e.keyCode === 27) {
                $('body').removeClass('search-focus');
                searchLastTab.focus();
            }
        });
    }

    // Initialize search focus handler
    searchFocusHandler();

    // Scroll to top functionality
    $(window).scroll(function() {
        if ($(this).scrollTop() >= 50) {
            $('#return-to-top').fadeIn(200);
        } else {
            $('#return-to-top').fadeOut(200);
        }
    });

    $('#return-to-top').click(function() {
        $('body,html').animate({ scrollTop: 0 }, 500);
    });

    // Side navigation toggle
    $('.gb_toggle').click(function () {
        adventure_travelling_Keyboard_loop($('.side_gb_nav'));
    });

    // Preloader fade out
    setTimeout(function() {
        $(".loader").fadeOut("slow");
    }, 1000);

    // Sticky menu
    $(window).scroll(function() {
        var data_sticky = $('.menubar').attr('data-sticky');
        if (data_sticky == "true") {
            if ($(this).scrollTop() > 1){
                $('.menubar').addClass("stick_head");
            } else {
                $('.menubar').removeClass("stick_head");
            }
        }
    });
});

// Mobile responsive menu
function adventure_travelling_menu_open_nav() {
    jQuery(".sidenav").addClass('open');
}

function adventure_travelling_menu_close_nav() {
    jQuery(".sidenav").removeClass('open');
}

// sticky
jQuery(window).scroll(function() {
  var data_sticky = jQuery('.menubar').attr('data-sticky');

  if (data_sticky == "true") {
    if (jQuery(this).scrollTop() > 1){
      jQuery('.menubar').addClass("stick_head");
    } else {
      jQuery('.menubar').removeClass("stick_head");
    }
  }
});
