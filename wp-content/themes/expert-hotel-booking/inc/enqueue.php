<?php

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'expert-hotel-booking-customize-section-button',
		get_theme_file_uri( 'assets/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);
	wp_localize_script(
		'expert-hotel-booking-customize-section-button',
		'expert_hotel_booking_customizer_params',
		array(
			'ajaxurl' =>	admin_url( 'admin-ajax.php' )
		)
	);

	wp_enqueue_style(
		'expert-hotel-booking-customize-section-button',
		get_theme_file_uri( 'assets/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

 /**
 * Enqueue scripts and styles.
 */
function expert_hotel_booking_scripts() {
	
	// Styles	 

	wp_enqueue_style('all-min',get_template_directory_uri().'/assets/css/all.min.css');

	wp_enqueue_style('bootstrap-min',get_template_directory_uri().'/assets/css/bootstrap.min.css');
	
	wp_enqueue_style('owl-carousel-min',get_template_directory_uri().'/assets/css/owl.carousel.min.css');
	
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/assets/css/fonts/font-awesome/css/font-awesome.min.css');
	
	wp_enqueue_style('expert-hotel-booking-editor-style',get_template_directory_uri().'/assets/css/editor-style.css');

	wp_style_add_data('expert-hotel-booking', 'rtl', 'replace');

	wp_enqueue_style('expert-hotel-booking-main', get_template_directory_uri() . '/assets/css/main.css');

	wp_enqueue_style('expert-hotel-booking-woo', get_template_directory_uri() . '/assets/css/woo.css');
	
	wp_enqueue_style( 'expert-hotel-booking-style', get_stylesheet_uri() );
	
	// Scripts

	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), false, true);

	wp_enqueue_script('expert-hotel-booking-sliderscript', get_template_directory_uri().'/assets/js/sliderscript.js', array('jquery'), '1.1', true);

	wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), false, true);

	wp_enqueue_script('expert-hotel-booking-theme-js', get_template_directory_uri() . '/assets/js/theme.js', array('jquery'), false, true);

	wp_enqueue_script( 'jquery-superfish', get_theme_file_uri( '/assets/js/jquery.superfish.js' ), array( 'jquery' ), '2.1.2', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'expert_hotel_booking_scripts' );


//Admin Enqueue for Admin
function expert_hotel_booking_admin_enqueue_scripts(){
	wp_enqueue_style('expert-hotel-booking-admin-style', esc_url( get_template_directory_uri() ) . '/inc/aboutthemes/admin.css');
	wp_enqueue_script('dismiss-notice-script', get_stylesheet_directory_uri() . '/inc/aboutthemes/theme-admin-notice.js', array('jquery'), null, true);
}
add_action( 'admin_enqueue_scripts', 'expert_hotel_booking_admin_enqueue_scripts' );

// Function to enqueue custom CSS
function expert_hotel_booking_enqueue_custom_css() {
    // Define a unique handle for your inline stylesheet
    $handle = 'expert-hotel-booking-style';
    
    // Get the generated custom CSS
    $expert_hotel_booking_custom_css = "";

    $expert_hotel_booking_blog_layouts = get_theme_mod('expert_hotel_booking_blog_layout_option_setting', 'Default');
    if ($expert_hotel_booking_blog_layouts == 'Default') {
        $expert_hotel_booking_custom_css .= '.blog-item{';
        $expert_hotel_booking_custom_css .= 'text-align:center;';
        $expert_hotel_booking_custom_css .= '}';
    } elseif ($expert_hotel_booking_blog_layouts == 'Left') {
        $expert_hotel_booking_custom_css .= '.blog-item{';
        $expert_hotel_booking_custom_css .= 'text-align:Left;';
        $expert_hotel_booking_custom_css .= '}';
    } elseif ($expert_hotel_booking_blog_layouts == 'Right') {
        $expert_hotel_booking_custom_css .= '.blog-item{';
        $expert_hotel_booking_custom_css .= 'text-align:Right;';
        $expert_hotel_booking_custom_css .= '}';
    }

    // Enqueue the inline stylesheet
    wp_add_inline_style($handle, $expert_hotel_booking_custom_css);

    // Add inline style for Scroll to Top
    $expert_hotel_booking_scroll_top_bg_color = get_theme_mod('expert_hotel_booking_scroll_top_bg_color', '#2677d9');
    $expert_hotel_booking_scroll_top_color = get_theme_mod('expert_hotel_booking_scroll_top_color', '#fff');
    $expert_hotel_booking_scroll_custom_css = "
        #scrolltop {
            background-color: {$expert_hotel_booking_scroll_top_bg_color};
        }
        #scrolltop span {
            color: {$expert_hotel_booking_scroll_top_color};
        }
    ";
    wp_add_inline_style('expert-hotel-booking-style', $expert_hotel_booking_scroll_custom_css);

    // Add inline style for Preloader
    $expert_hotel_booking_preloader_bg_color = get_theme_mod('expert_hotel_booking_preloader_bg_color', '#ffffff');
    $expert_hotel_booking_preloader_color = get_theme_mod('expert_hotel_booking_preloader_color', '#2677d9');
    $expert_hotel_booking_preloader_custom_css = "
        .loading {
            background-color: {$expert_hotel_booking_preloader_bg_color};
        }
        .loader {
            border-color: {$expert_hotel_booking_preloader_color};
            color: {$expert_hotel_booking_preloader_color};
            text-shadow: 0 0 10px {$expert_hotel_booking_preloader_color};
        }
        .loader::before {
            border-top-color: {$expert_hotel_booking_preloader_color};
            border-right-color: {$expert_hotel_booking_preloader_color};
        }
        .loader span::before {
            background: {$expert_hotel_booking_preloader_color};
            box-shadow: 0 0 10px {$expert_hotel_booking_preloader_color};
        }
    ";
    wp_add_inline_style('expert-hotel-booking-style', $expert_hotel_booking_preloader_custom_css);
}

// Hook the function to the 'wp_enqueue_scripts' action
add_action('wp_enqueue_scripts', 'expert_hotel_booking_enqueue_custom_css');