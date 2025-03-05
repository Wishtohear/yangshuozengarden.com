<?php
add_action('wp_enqueue_scripts', 'hotelgalaxy_theme_styles');
function hotelgalaxy_theme_styles(){

	wp_enqueue_script('jquery');

	wp_enqueue_style('font-awesome', get_template_directory_uri().'/assets/css/fonts/font-awesome/css/font-awesome.min.css');

	wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css');

	wp_enqueue_script('bootstrap',get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'), false, true);	

	wp_enqueue_style('hotelgalaxy-main', get_template_directory_uri() . '/assets/css/main.css');
	
	wp_enqueue_style('hotelgalaxy-responsive', get_template_directory_uri() . '/assets/css/responsive.css');
	
	wp_enqueue_style('hg-animate', get_template_directory_uri().'/assets/css/animate.css');	

	wp_enqueue_style('hotelgalaxy-editor-style',get_template_directory_uri().'/assets/css/editor-style.css');

	wp_enqueue_style('hotelgalaxy-menus', get_template_directory_uri() . '/assets/css/classic-menu.css');
	
	wp_enqueue_style('hg-owl-carousel', get_template_directory_uri().'/assets/css/owl.carousel.min.css');	
	wp_enqueue_script('hg-owl-carousel',get_template_directory_uri() .'/assets/js/owl.carousel.min.js', array('jquery'), false, true );	
	
	wp_enqueue_script('hg-wow',get_template_directory_uri() .'/assets/js/wow.min.js', array('jquery'), false, false, true );

	wp_enqueue_style('hotelgalaxy-woo', get_template_directory_uri() . '/assets/css/woo.css');
	
	wp_enqueue_style('hotelgalaxy-style', get_stylesheet_uri() );

	wp_enqueue_script('hotelgalaxy-theme-js', get_template_directory_uri() . '/assets/js/theme.js', array('jquery'), false, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}


add_action('wp_enqueue_scripts', 'hotelgalaxy_theme_styles_on_requirment');
function hotelgalaxy_theme_styles_on_requirment(){	
	
	$sticky_menu = (get_theme_mod('sticky_menu', false ) ? true : false);

	wp_enqueue_script('hg-custom',get_template_directory_uri() .'/assets/js/custom.js', array('jquery'), false,true );	
	wp_localize_script( 'hg-custom', 'hg_vars', array( 'sticky_menu'   => $sticky_menu ) );	
}


//Admin Enqueue for Admin
function hotelgalaxy_admin_enqueue_scripts(){	

	wp_enqueue_style('hotelgalaxy-admin-style', get_template_directory_uri() . '/inc/customizer/assets/css/admin.css');
	wp_enqueue_script( 'hotelgalaxy-admin-script', get_template_directory_uri() . '/inc/customizer/assets/js/hotelgalaxy-admin-script.js', array( 'jquery' ), '', true );
    wp_localize_script( 'hotelgalaxy-admin-script', 'hotelgalaxy_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'admin_enqueue_scripts', 'hotelgalaxy_admin_enqueue_scripts' );