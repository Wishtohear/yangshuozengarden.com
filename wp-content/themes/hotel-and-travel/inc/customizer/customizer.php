<?php
/**
 * Hotel and Travel Theme Customizer
 *
 * @package Best_Shop
 */

if ( ! function_exists( 'hotel_and_travel_customize_register' ) ) :
	/**
	 * Add postMessage support for site title and description for the Theme Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	function hotel_and_travel_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
		$wp_customize->get_setting( 'background_color' )->transport = 'refresh';
		$wp_customize->get_setting( 'background_image' )->transport = 'refresh';
		
		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial(
				'blogname',
				array(
					'selector'        => '.site-title a',
					'render_callback' => 'hotel_and_travel_customize_partial_blogname',
				)
			);
			$wp_customize->selective_refresh->add_partial(
				'blogdescription',
				array(
					'selector'        => '.site-description',
					'render_callback' => 'hotel_and_travel_customize_partial_blogdescription',
				)
			);
		}
	}
endif;
add_action( 'customize_register', 'hotel_and_travel_customize_register' );

if( ! function_exists( 'hotel_and_travel_customize_preview_js' ) ) :
	/**
	 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
	 */
	function hotel_and_travel_customize_preview_js() {
		wp_enqueue_script( 'hotel-and-travel-customizer', get_template_directory_uri() . '/inc/assets/js/customizer.js', array( 'customize-preview' ), hotel_and_travel_VERSION, true );
	}
endif;
add_action( 'customize_preview_init', 'hotel_and_travel_customize_preview_js' );

if( ! function_exists( 'hotel_and_travel_customize_script' ) ) :
	function hotel_and_travel_customize_script(){

		wp_enqueue_style( 'hotel-and-travel-customize', get_template_directory_uri() . '/inc/assets/css/customize.css', array(), hotel_and_travel_VERSION );
		wp_enqueue_script( 'hotel-and-travel-customize', get_template_directory_uri() . '/inc/assets/js/customize.js', array( 'jquery', 'customize-controls' ), hotel_and_travel_VERSION, true );
		
	}
endif;
add_action( 'customize_controls_enqueue_scripts', 'hotel_and_travel_customize_script' );




//Theme Options
require get_template_directory() . '/inc/customizer/panel/general-settings.php';

require get_template_directory() . '/inc/customizer/panel/general-settings/contact.php';
require get_template_directory() . '/inc/customizer/panel/general-settings/header-top.php';
require get_template_directory() . '/inc/customizer/panel/general-settings/header.php';
require get_template_directory() . '/inc/customizer/panel/general-settings/post-page.php';
require get_template_directory() . '/inc/customizer/panel/general-settings/breadcrumb.php';
require get_template_directory() . '/inc/customizer/panel/general-settings/footer.php';
require get_template_directory() . '/inc/customizer/panel/general-settings/layout.php';


require get_template_directory() . '/inc/customizer/panel/general-settings/fonts.php';

//parent panels
require get_template_directory() . '/inc/customizer/panel/home.php';


//sections
require get_template_directory() . '/inc/customizer/sections/theme-info.php';

// color
require get_template_directory() . '/inc/customizer/panel/general-settings/color.php';

// scroll
require get_template_directory() . '/inc/customizer/panel/general-settings/scroll.php';

/**
 * Sanitization functions
 */
require get_template_directory() . '/inc/customizer/sanitization-functions.php';

/**
 *Active callback functions
 */
require get_template_directory() . '/inc/customizer/active-callback.php';

