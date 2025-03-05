/*
** Scripts within the customizer controls window.
*/

(function( $ ) {
	wp.customize.bind( 'ready', function() {

	/*
	** Reusable Functions
	*/
		var optPrefix = '#customize-control-hotel_booking_lite_options-';
		
		// Label
		function hotel_booking_lite_customizer_label( id, title ) {

			// Colors

			if ( id === 'hotel_booking_lite_theme_color' || id === 'background_color' || id === 'background_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-hotel_booking_lite_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Site Identity

			if ( id === 'custom_logo' || id === 'site_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-hotel_booking_lite_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Top Header

			if ( id === 'hotel_booking_lite_phone' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-hotel_booking_lite_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// General Setting

			if ( id === 'hotel_booking_lite_preloader_hide' || id === 'hotel_booking_lite_sticky_header' || id === 'hotel_booking_lite_scroll_hide' || id === 'hotel_booking_lite_woocommerce_shop_page_sidebar' || id === 'hotel_booking_lite_woo_product_border_radius') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-hotel_booking_lite_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Social Icon

			if ( id === 'hotel_booking_lite_facebook_url' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-hotel_booking_lite_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Slider

			if ( id === 'hotel_booking_lite_slider_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-hotel_booking_lite_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Header Image

			if ( id === 'header_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-hotel_booking_lite_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
			// Popular Room

			if ( id === 'hotel_booking_lite_popular_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-hotel_booking_lite_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Footer

			if ( id === 'cooking_food_blogger_footer_bg_image' || id === 'hotel_booking_lite_show_hide_copyright') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-hotel_booking_lite_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Setting

			if ( id === 'hotel_booking_lite_single_post_thumb' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-hotel_booking_lite_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Post Setting

			if ( id === 'hotel_booking_lite_post_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-hotel_booking_lite_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Page Setting

			if ( id === 'hotel_booking_lite_single_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-hotel_booking_lite_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
		}


	/*
	** Tabs
	*/

		// Colors
		hotel_booking_lite_customizer_label( 'hotel_booking_lite_theme_color', 'Theme Color' );
		hotel_booking_lite_customizer_label( 'background_color', 'Colors' );
		hotel_booking_lite_customizer_label( 'background_image', 'Image' );

		// Site Identity
		hotel_booking_lite_customizer_label( 'custom_logo', 'Logo Setup' );
		hotel_booking_lite_customizer_label( 'site_icon', 'Favicon' );

		// Top Header
		hotel_booking_lite_customizer_label( 'hotel_booking_lite_phone', 'Phone' );

		// General Setting
		hotel_booking_lite_customizer_label( 'hotel_booking_lite_preloader_hide', 'Preloader' );
		hotel_booking_lite_customizer_label( 'hotel_booking_lite_sticky_header', 'Sticky Header' );
		hotel_booking_lite_customizer_label( 'hotel_booking_lite_scroll_hide', 'Scroll To Top' );
		hotel_booking_lite_customizer_label( 'hotel_booking_lite_woocommerce_shop_page_sidebar', 'Woocommerce Settings' );
		hotel_booking_lite_customizer_label( 'hotel_booking_lite_woo_product_border_radius', 'Woocommerce Product Border Radius' );

		// Social Icon
		hotel_booking_lite_customizer_label( 'hotel_booking_lite_facebook_url', 'Social Links' );

		//Slider
		hotel_booking_lite_customizer_label( 'hotel_booking_lite_slider_setting', 'Slider' );

		//Header Image
		hotel_booking_lite_customizer_label( 'header_image', 'Header Image' );

		//Popular Room
		hotel_booking_lite_customizer_label( 'hotel_booking_lite_popular_setting', 'Popular Room' );

		//Footer
		hotel_booking_lite_customizer_label( 'cooking_food_blogger_footer_bg_image', 'Footer' );
		hotel_booking_lite_customizer_label( 'hotel_booking_lite_show_hide_copyright', 'Copyright' );

		//Single Post Setting
		hotel_booking_lite_customizer_label( 'hotel_booking_lite_single_post_thumb', 'Single Post Setting' );

		// Post Setting
		hotel_booking_lite_customizer_label( 'hotel_booking_lite_post_page_title', 'Post Setting' );

		// Page Setting
		hotel_booking_lite_customizer_label( 'hotel_booking_lite_single_page_title', 'Page Setting' );
	

	}); // wp.customize ready

})( jQuery );
