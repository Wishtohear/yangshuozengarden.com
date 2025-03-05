<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
define( 'HOTEL_PARENT_DIR', get_template_directory() );
define( 'HOTEL_PARENT_URI', get_template_directory_uri() );
define( 'HOTEL_PARENT_INC_DIR', HOTEL_PARENT_DIR . '/inc' );
define( 'HOTEL_PARENT_INC_URI', HOTEL_PARENT_URI . '/inc' );

add_action( 'after_setup_theme', 'hotelgalaxy_theme_support' );     

function hotelgalaxy_theme_support(){

    /*
     * Let WordPress manage the document title.
     */
    add_theme_support( 'title-tag' );

    add_theme_support( 'custom-header' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     */

    add_theme_support( 'post-thumbnails' );

     //Add selective refresh for sidebar widget
    add_theme_support( 'customize-selective-refresh-widgets' );

    add_theme_support( 'automatic-feed-links' );

      /*
     * Make theme available for translation.
     */
    load_theme_textdomain( 'hotel-galaxy');

    // This theme uses wp_nav_menu() in one location.

    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'hotel-galaxy'),
        'footer_menu' => esc_html__( 'Footer Menu', 'hotel-galaxy'),        
    ) );  


     /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );


    add_theme_support('custom-logo');

    /*
     * WooCommerce Plugin Support
     */
    add_theme_support( 'woocommerce' );
    
    // Gutenberg wide images.
    add_theme_support( 'align-wide' );


    /*
     * This theme styles the visual editor to resemble the theme style,
     * specifically font, colors, icons, and column width.
     */

    add_editor_style( array( 'assets/css/editor-style.css', hotelgalaxy_google_font() ) );
   

        //Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'hotelgalaxy_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );

    
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hotelgalaxy_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'hotelgalaxy_content_width', 1170 );
}
add_action( 'after_setup_theme', 'hotelgalaxy_content_width', 0 );


// sidebar
add_action( 'widgets_init', 'hotelgalaxy_widgets_init' );
function hotelgalaxy_widgets_init() {       

    register_sidebar( array(
        'name'          => __( 'Sidebar Widget Area', 'hotel-galaxy'),
        'id'            => 'hotelgalaxy-sidebar-primary',
        'description' => __( 'This Widget area for Right sidebar Widget', 'hotel-galaxy' ),
        'before_widget' => '<aside id="%1$s" class="widget wow fadeInRight sidebar-widget %2$s"><div class="widget-inner">',
        'after_widget'  => '</div></aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    
    register_sidebar( array(
        'name'          => __( 'Footer Widget Area', 'hotel-galaxy'),
        'id'            => 'hotelgalaxy-footer-widget-area',
        'description' => __( 'The Footer Widget Area', 'hotel-galaxy' ),
        'before_widget' => '<aside id="%1$s" class="widget footer-widget wow fadeInUp col-lg-3 col-md-6 %2$s"><div class="widget-inner">',
        'after_widget'  => '</div></aside>',
        'before_title'  =>'<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name' => __( 'WooCommerce Widget Area', 'hotel-galaxy' ),
        'id' => 'hotelgalaxy-woocommerce-sidebar',
        'description' => __( 'This Widget area for WooCommerce Widget', 'hotel-galaxy' ),
        'before_widget' => '<aside id="%1$s" class="widget wow fadeInRight sidebar-widget %2$s"><div class="widget-inner">',
        'after_widget' => '</div></aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}


/**
 * All necessary theme files
 */

$theme_path = get_template_directory();

/**
 * All Styles & Scripts.
 */
require $theme_path . '/inc/enqueue.php';

// old to new
require $theme_path . '/inc/migrate.php';

// Required Plugins
require $theme_path . '/inc/required-plugins/index.php';

 /**
 * Nav Walker fo Bootstrap Dropdown Menu.
 */
 require $theme_path . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Implement the Custom Header feature.
 */
require $theme_path . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require $theme_path . '/inc/template-tag.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require $theme_path . '/inc/extras.php';

/**
 * Customizer additions.
 */
require $theme_path . '/inc/customizer/hotelgalaxy-customizer.php';

