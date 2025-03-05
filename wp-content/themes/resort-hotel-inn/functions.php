<?php
/**
 * Resort Hotel Inn functions and definitions
 *
 * @package resort_hotel_inn
 * @since 1.0
 */

if ( ! function_exists( 'resort_hotel_inn_support' ) ) :
	function resort_hotel_inn_support() {

		load_theme_textdomain( 'resort-hotel-inn', get_template_directory() . '/languages' );

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		add_theme_support('woocommerce');

		// Enqueue editor styles.
		add_editor_style(get_stylesheet_directory_uri() . '/assets/css/editor-style.css');

	}
endif;

add_action( 'after_setup_theme', 'resort_hotel_inn_support' );

if ( ! function_exists( 'resort_hotel_inn_styles' ) ) :
	function resort_hotel_inn_styles() {
		// Register theme stylesheet.
		$resort_hotel_inn_theme_version = wp_get_theme()->get( 'Version' );

		$resort_hotel_inn_version_string = is_string( $resort_hotel_inn_theme_version ) ? $resort_hotel_inn_theme_version : false;
		wp_enqueue_style(
			'resort-hotel-inn-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$resort_hotel_inn_version_string
		);

		wp_enqueue_script( 'resort-hotel-inn-custom-script', get_theme_file_uri( '/assets/custom-script.js' ), array( 'jquery' ), true );

		wp_enqueue_style( 'dashicons' );

		wp_style_add_data( 'resort-hotel-inn-style', 'rtl', 'replace' );
	}
endif;

add_action( 'wp_enqueue_scripts', 'resort_hotel_inn_styles' );

/* Theme Credit link */
define('RESORT_HOTEL_INN_BUY_NOW',__('https://www.cretathemes.com/products/resort-wordpress-theme','resort-hotel-inn'));
define('RESORT_HOTEL_INN_PRO_DEMO',__('https://pattern.cretathemes.com/resort-hotel-inn/','resort-hotel-inn'));
define('RESORT_HOTEL_INN_THEME_DOC',__('https://pattern.cretathemes.com/free-guide/resort-hotel-inn/','resort-hotel-inn'));
define('RESORT_HOTEL_INN_PRO_THEME_DOC',__('https://pattern.cretathemes.com/pro-guide/resort-hotel-inn-pro/','resort-hotel-inn'));
define('RESORT_HOTEL_INN_SUPPORT',__('https://wordpress.org/support/theme/resort-hotel-inn','resort-hotel-inn'));
define('RESORT_HOTEL_INN_REVIEW',__('https://wordpress.org/support/theme/resort-hotel-inn/reviews/#new-post','resort-hotel-inn'));
define('RESORT_HOTEL_INN_PRO_THEME_BUNDLE',__('https://www.cretathemes.com/products/wordpress-theme-bundle','resort-hotel-inn'));


// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';

// Add block styles
require get_template_directory() . '/inc/block-styles.php';

// Block Filters
require get_template_directory() . '/inc/block-filters.php';

// Svg icons
require get_template_directory() . '/inc/icon-function.php';

// Customizer
require get_template_directory() . '/inc/customizer.php';

// Get Started.
require get_template_directory() . '/inc/get-started/get-started.php';

// Add Getstart admin notice
function resort_hotel_inn_admin_notice() { 
    global $pagenow;
    $theme_args      = wp_get_theme();
    $meta            = get_option( 'resort_hotel_inn_admin_notice' );
    $name            = $theme_args->__get( 'Name' );
    $current_screen  = get_current_screen();

    if( !$meta ){
	    if( is_network_admin() ){
	        return;
	    }

	    if( ! current_user_can( 'manage_options' ) ){
	        return;
	    } if($current_screen->base != 'appearance_page_resort-hotel-inn-guide-page' ) { ?>

	    <div class="notice notice-success dash-notice">
	        <h1><?php esc_html_e('Hey, Thank you for installing Resort Hotel Inn Theme!', 'resort-hotel-inn'); ?></h1>
	        <p><a class="button button-primary customize load-customize hide-if-no-customize get-start-btn" href="<?php echo esc_url( admin_url( 'themes.php?page=resort-hotel-inn-guide-page' ) ); ?>"><?php esc_html_e('Navigate Getstart', 'resort-hotel-inn'); ?></a> 
	        	<a class="button button-primary site-edit" href="<?php echo esc_url( admin_url( 'site-editor.php' ) ); ?>"><?php esc_html_e('Site Editor', 'resort-hotel-inn'); ?></a> 
				<a class="button button-primary buy-now-btn" href="<?php echo esc_url( RESORT_HOTEL_INN_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'resort-hotel-inn'); ?></a>
				<a class="button button-primary bundle-btn" href="<?php echo esc_url( RESORT_HOTEL_INN_PRO_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e('Get Bundle', 'resort-hotel-inn'); ?></a>
	        </p>
	        <p class="dismiss-link"><strong><a href="?resort_hotel_inn_admin_notice=1"><?php esc_html_e( 'Dismiss', 'resort-hotel-inn' ); ?></a></strong></p>
	    </div>
	    <?php

	}?>
	    <?php

	}
}

add_action( 'admin_notices', 'resort_hotel_inn_admin_notice' );

if( ! function_exists( 'resort_hotel_inn_update_admin_notice' ) ) :
/**
 * Updating admin notice on dismiss
*/
function resort_hotel_inn_update_admin_notice(){
    if ( isset( $_GET['resort_hotel_inn_admin_notice'] ) && $_GET['resort_hotel_inn_admin_notice'] = '1' ) {
        update_option( 'resort_hotel_inn_admin_notice', true );
    }
}
endif;
add_action( 'admin_init', 'resort_hotel_inn_update_admin_notice' );

//After Switch theme function
add_action('after_switch_theme', 'resort_hotel_inn_getstart_setup_options');
function resort_hotel_inn_getstart_setup_options () {
    update_option('resort_hotel_inn_admin_notice', FALSE );
}