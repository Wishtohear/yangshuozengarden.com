<?php
/**
 * Hotel Booking Lite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Hotel Booking Lite
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/Hotel_Booking_Lite_Loader.php' );

$Hotel_Booking_Lite_Loader = new \WPTRT\Autoload\Hotel_Booking_Lite_Loader();

$Hotel_Booking_Lite_Loader->hotel_booking_lite_add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$Hotel_Booking_Lite_Loader->hotel_booking_lite_register();

if ( ! function_exists( 'hotel_booking_lite_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function hotel_booking_lite_setup() {

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		*/
		add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

		add_theme_support( 'woocommerce' );
		add_theme_support( "responsive-embeds" );
		add_theme_support( "align-wide" );
		add_theme_support( "wp-block-styles" );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

        add_image_size('hotel-booking-lite-featured-header-image', 2000, 660, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary','hotel-booking-lite' ),
	        'footer'=> esc_html__( 'Footer Menu','hotel-booking-lite' ),
        ) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'hotel_booking_lite_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 50,
			'width'       => 50,
			'flex-width'  => true,
		) );

		add_editor_style( array( '/editor-style.css' ) );
		add_action('wp_ajax_hotel_booking_lite_dismissable_notice', 'hotel_booking_lite_dismissable_notice');
	}
endif;
add_action( 'after_setup_theme', 'hotel_booking_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hotel_booking_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hotel_booking_lite_content_width', 1170 );
}
add_action( 'after_setup_theme', 'hotel_booking_lite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hotel_booking_lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'hotel-booking-lite' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'hotel-booking-lite' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Shop Page Sidebar', 'hotel-booking-lite' ),
		'id'            => 'woocommerce-shop-page-sidebar',
		'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Single Product Page Sidebar', 'hotel-booking-lite' ),
		'id'            => 'woocommerce-single-product-page-sidebar',
		'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'hotel-booking-lite' ),
		'id'            => 'hotel-booking-lite-footer1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'hotel-booking-lite' ),
		'id'            => 'hotel-booking-lite-footer2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'hotel-booking-lite' ),
		'id'            => 'hotel-booking-lite-footer3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'hotel_booking_lite_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hotel_booking_lite_scripts() {

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

	wp_enqueue_style(
		'outfit',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap' ),
		array(),
		'1.0'
	);

	wp_enqueue_style( 'hotel-booking-lite-block-editor-style', get_theme_file_uri('/assets/css/block-editor-style.css') );

// load bootstrap css
  	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css');

  	wp_enqueue_style( 'owl.carousel-css',get_template_directory_uri() . '/assets/css/owl.carousel.css');

	wp_enqueue_style( 'hotel-booking-lite-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/custom-option.php' );
	wp_add_inline_style( 'hotel-booking-lite-style',$hotel_booking_lite_theme_css );

	wp_style_add_data('hotel-booking-lite-basic-style', 'rtl', 'replace');
	

	// fontawesome
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri().'/assets/css/fontawesome/css/all.css' );

    wp_enqueue_script('hotel-booking-lite-theme-js', get_template_directory_uri() . '/assets/js/theme-script.js', array('jquery'), '', true );

    wp_enqueue_script('owl.carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hotel_booking_lite_scripts' );

/**
 * Enqueue theme color style.
 */
function hotel_booking_lite_color() {

    $hotel_booking_lite_color_css = '';
    $hotel_booking_lite_preloader_bg_color = get_theme_mod('hotel_booking_lite_preloader_bg_color');
    $hotel_booking_lite_preloader_dot_1_color = get_theme_mod('hotel_booking_lite_preloader_dot_1_color');
    $hotel_booking_lite_preloader_dot_2_color = get_theme_mod('hotel_booking_lite_preloader_dot_2_color');
    $hotel_booking_lite_logo_max_height = get_theme_mod('hotel_booking_lite_logo_max_height');

  	if(get_theme_mod('hotel_booking_lite_logo_max_height') == '') {
		$hotel_booking_lite_logo_max_height = '24';
	}

    if(get_theme_mod('hotel_booking_lite_preloader_bg_color') == '') {
			$hotel_booking_lite_preloader_bg_color = '#000';
	}
	if(get_theme_mod('hotel_booking_lite_preloader_dot_1_color') == '') {
		$hotel_booking_lite_preloader_dot_1_color = '#fff';
	}
	if(get_theme_mod('hotel_booking_lite_preloader_dot_2_color') == '') {
		$hotel_booking_lite_preloader_dot_2_color = '#fd8e35';
	}

	$hotel_booking_lite_color_css = '
		.custom-logo-link img{
			max-height: '.esc_attr($hotel_booking_lite_logo_max_height).'px;
	 	}
		.loading{
			background-color: '.esc_attr($hotel_booking_lite_preloader_bg_color).';
		 }
		 @keyframes loading {
		  0%,
		  100% {
		  	transform: translatey(-2.5rem);
		    background-color: '.esc_attr($hotel_booking_lite_preloader_dot_1_color).';
		  }
		  50% {
		  	transform: translatey(2.5rem);
		    background-color: '.esc_attr($hotel_booking_lite_preloader_dot_2_color).';
		  }
		}
	';
    wp_add_inline_style( 'hotel-booking-lite-style',$hotel_booking_lite_color_css );

}
add_action( 'wp_enqueue_scripts', 'hotel_booking_lite_color' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/*
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Meta Feild
 */
require get_template_directory() . '/inc/popular-room-meta.php';

/*radio button sanitization*/
function hotel_booking_lite_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/*dropdown page sanitization*/
function hotel_booking_lite_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/*checkbox sanitization*/
function hotel_booking_lite_sanitize_checkbox( $input ) {
	// Boolean check
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function hotel_booking_lite_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function hotel_booking_lite_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

//SELECT
function hotel_booking_lite_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function hotel_booking_lite_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

function hotel_booking_lite_sanitize_number_range( $number, $setting ) {
	
	// Ensure input is an absolute integer.
	$number = absint( $number );
	
	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;
	
	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
	
	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
	
	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
	
	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

function hotel_booking_lite_remove_sections( $wp_customize ) {
	$wp_customize->remove_control('display_header_text');
	$wp_customize->remove_setting('display_header_text');
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_setting('header_textcolor');
}
add_action( 'customize_register', 'hotel_booking_lite_remove_sections');

/**
 * Get CSS
 */

function hotel_booking_lite_getpage_css($hook) {
	wp_register_script( 'admin-notice-script', get_template_directory_uri() . '/inc/admin/js/admin-notice-script.js', array( 'jquery' ) );
    wp_localize_script('admin-notice-script','hotel_booking_lite',
		array('admin_ajax'	=>	admin_url('admin-ajax.php'),'wpnonce'  =>	wp_create_nonce('hotel_booking_lite_dismissed_notice_nonce')
		)
	);
	wp_enqueue_script('admin-notice-script');

    wp_localize_script( 'admin-notice-script', 'hotel_booking_lite_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
	if ( 'appearance_page_hotel-booking-lite-info' != $hook ) {
		return;
	}
	wp_enqueue_style( 'hotel-booking-lite-demo-style', get_template_directory_uri() . '/assets/css/demo.css' );
}
add_action( 'admin_enqueue_scripts', 'hotel_booking_lite_getpage_css' );

if ( ! defined( 'HOTEL_BOOKING_LITE_CONTACT_SUPPORT' ) ) {
define('HOTEL_BOOKING_LITE_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/hotel-booking-lite','hotel-booking-lite'));
}
if ( ! defined( 'HOTEL_BOOKING_LITE_REVIEW' ) ) {
define('HOTEL_BOOKING_LITE_REVIEW',__('https://wordpress.org/support/theme/hotel-booking-lite/reviews/#new-post','hotel-booking-lite'));
}
if ( ! defined( 'HOTEL_BOOKING_LITE_LIVE_DEMO' ) ) {
define('HOTEL_BOOKING_LITE_LIVE_DEMO',__('https://demo.themagnifico.net/hotel-booking/','hotel-booking-lite'));
}
if ( ! defined( 'HOTEL_BOOKING_LITE_GET_PREMIUM_PRO' ) ) {
define('HOTEL_BOOKING_LITE_GET_PREMIUM_PRO',__('https://www.themagnifico.net/products/hotel-booking-wordpress-theme','hotel-booking-lite'));
}
if ( ! defined( 'HOTEL_BOOKING_LITE_PRO_DOC' ) ) {
define('HOTEL_BOOKING_LITE_PRO_DOC',__('https://demo.themagnifico.net/eard/wathiqa/hotel-booking-pro-doc/','hotel-booking-lite'));
}
if ( ! defined( 'HOTEL_BOOKING_LITE_FREE_DOC' ) ) {
define('HOTEL_BOOKING_LITE_FREE_DOC',__('https://demo.themagnifico.net/eard/wathiqa/hotel-booking-lite-free-doc/','hotel-booking-lite'));
}

add_action('admin_menu', 'hotel_booking_lite_themepage');
function hotel_booking_lite_themepage(){

	$hotel_booking_lite_theme_test = wp_get_theme();

	$theme_info = add_theme_page( __('Theme Options','hotel-booking-lite'), __('Theme Options','hotel-booking-lite'), 'manage_options', 'hotel-booking-lite-info.php', 'hotel_booking_lite_info_page' );
}

function hotel_booking_lite_info_page() {
	$user = wp_get_current_user();
	$hotel_booking_lite_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap hotel-booking-lite-add-css">
		<div>
			<h1>
				<?php esc_html_e('Welcome To ','hotel-booking-lite'); ?><?php echo esc_html( $hotel_booking_lite_theme ); ?>
			</h1>
			<div class="feature-section three-col">
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Contact Support", "hotel-booking-lite"); ?></h3>
						<p><?php esc_html_e("Thank you for trying Hotel Booking Lite , feel free to contact us for any support regarding our theme.", "hotel-booking-lite"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( HOTEL_BOOKING_LITE_CONTACT_SUPPORT ); ?>" class="button button-primary get">
							<?php esc_html_e("Contact Support", "hotel-booking-lite"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Checkout Premium", "hotel-booking-lite"); ?></h3>
						<p><?php esc_html_e("Our premium theme comes with extended features like demo content import , responsive layouts etc.", "hotel-booking-lite"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( HOTEL_BOOKING_LITE_GET_PREMIUM_PRO ); ?>" class="button button-primary get prem">
							<?php esc_html_e("Get Premium", "hotel-booking-lite"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Review", "hotel-booking-lite"); ?></h3>
						<p><?php esc_html_e("If You love Hotel Booking Lite theme then we would appreciate your review about our theme.", "hotel-booking-lite"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( HOTEL_BOOKING_LITE_REVIEW ); ?>" class="button button-primary get">
							<?php esc_html_e("Review", "hotel-booking-lite"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Free Documentation", "hotel-booking-lite"); ?></h3>
						<p><?php esc_html_e("Our guide is available if you require any help configuring and setting up the theme. Easy and quick way to setup the theme.", "hotel-booking-lite"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( HOTEL_BOOKING_LITE_FREE_DOC ); ?>" class="button button-primary get">
							<?php esc_html_e("Free Documentation", "hotel-booking-lite"); ?>
						</a></p>
					</div>
				</div>
			</div>
		</div>
		<hr>

		<h2><?php esc_html_e("Free Vs Premium","hotel-booking-lite"); ?></h2>
		<div class="hotel-booking-lite-button-container">
			<a target="_blank" href="<?php echo esc_url( HOTEL_BOOKING_LITE_PRO_DOC ); ?>" class="button button-primary get">
				<?php esc_html_e("Checkout Documentation", "hotel-booking-lite"); ?>
			</a>
			<a target="_blank" href="<?php echo esc_url( HOTEL_BOOKING_LITE_LIVE_DEMO ); ?>" class="button button-primary get">
				<?php esc_html_e("View Theme Demo", "hotel-booking-lite"); ?>
			</a>
		</div>

		<table class="wp-list-table widefat">
			<thead class="table-book">
				<tr>
					<th><strong><?php esc_html_e("Theme Feature", "hotel-booking-lite"); ?></strong></th>
					<th><strong><?php esc_html_e("Basic Version", "hotel-booking-lite"); ?></strong></th>
					<th><strong><?php esc_html_e("Premium Version", "hotel-booking-lite"); ?></strong></th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td><?php esc_html_e("Header Background Color", "hotel-booking-lite"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Navigation Logo Or Text", "hotel-booking-lite"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Hide Logo Text", "hotel-booking-lite"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Premium Support", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Fully SEO Optimized", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Recent Posts Widget", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Easy Google Fonts", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Pagespeed Plugin", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Header Image On Front Page", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Show Header Everywhere", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Text On Header Image", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Full Width (Hide Sidebar)", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Upper Widgets On Front Page", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Replace Copyright Text", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Upper Widgets Colors", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Navigation Color", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Post/Page Color", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Blog Feed Color", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Footer Color", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Sidebar Color", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Background Color", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Importable Demo Content	", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
			</tbody>
		</table>
		<div class="hotel-booking-lite-button-container">
			<a target="_blank" href="<?php echo esc_url( HOTEL_BOOKING_LITE_GET_PREMIUM_PRO ); ?>" class="button button-primary get prem">
				<?php esc_html_e("Go Premium", "hotel-booking-lite"); ?>
			</a>
		</div>
	</div>
	<?php
}

//Admin Notice For Getstart
function hotel_booking_lite_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function hotel_booking_lite_deprecated_hook_admin_notice() {

    $dismissed = get_user_meta(get_current_user_id(), 'hotel_booking_lite_dismissable_notice', true);
    if ( !$dismissed) { ?>
        <div class="updated notice notice-success is-dismissible notice-get-started-class" data-notice="get_started" style="background: #f7f9f9; padding: 20px 10px; display: flex;">
	    	<div class="tm-admin-image">
	    		<img style="width: 100%;max-width: 320px;line-height: 40px;display: inline-block;vertical-align: top;border: 2px solid #ddd;border-radius: 4px;" src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
	    	</div>
	    	<div class="tm-admin-content" style="padding-left: 30px; align-self: center">
	    		<h2 style="font-weight: 600;line-height: 1.3; margin: 0px;"><?php esc_html_e('Thank You For Choosing ', 'hotel-booking-lite'); ?><?php echo wp_get_theme(); ?><h2>
	    		<p style="color: #3c434a; font-weight: 400; margin-bottom: 30px;"><?php _e('Get Started With Theme By Clicking On Getting Started.', 'hotel-booking-lite'); ?><p>
	        	<a class="admin-notice-btn button button-primary button-hero" href="<?php echo esc_url( admin_url( 'themes.php?page=hotel-booking-lite-info.php' )); ?>"><?php esc_html_e( 'Get started', 'hotel-booking-lite' ) ?></a>
	        	<a class="admin-notice-btn button button-primary button-hero" target="_blank" href="<?php echo esc_url( HOTEL_BOOKING_LITE_FREE_DOC ); ?>"><?php esc_html_e( 'Documentation', 'hotel-booking-lite' ) ?></a>
	        	<span style="padding-top: 15px; display: inline-block; padding-left: 8px;">
	        	<span class="dashicons dashicons-admin-links"></span>
	        	<a class="admin-notice-btn"	 target="_blank" href="<?php echo esc_url( HOTEL_BOOKING_LITE_LIVE_DEMO ); ?>"><?php esc_html_e( 'View Demo', 'hotel-booking-lite' ) ?></a>
	        	</span>
	    	</div>
        </div>
    <?php }
}

add_action( 'admin_notices', 'hotel_booking_lite_deprecated_hook_admin_notice' );

function hotel_booking_lite_switch_theme() {
    delete_user_meta(get_current_user_id(), 'hotel_booking_lite_dismissable_notice');
}
add_action('after_switch_theme', 'hotel_booking_lite_switch_theme');
function hotel_booking_lite_dismissable_notice() {
    update_user_meta(get_current_user_id(), 'hotel_booking_lite_dismissable_notice', true);
    die();
}