<?php

require get_stylesheet_directory() . '/customizer/customizer.php';

add_action( 'after_setup_theme', 'resort_hotel_booking_after_setup_theme' );
function resort_hotel_booking_after_setup_theme() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( "responsive-embeds" );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'resort-hotel-booking-featured-image', 2000, 1200, true );
    add_image_size( 'resort-hotel-booking-thumbnail-avatar', 100, 100, true );

    // Set the default content width.
    $GLOBALS['content_width'] = 525;

    // Add theme support for Custom Logo.
    add_theme_support( 'custom-logo', array(
        'width'       => 250,
        'height'      => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff'
    ) );

    add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

    add_editor_style( array( 'assets/css/editor-style.css') );
}

/**
 * Register widget area.
 */
function resort_hotel_booking_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Blog Sidebar', 'resort-hotel-booking' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'resort-hotel-booking' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Page Sidebar', 'resort-hotel-booking' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'resort-hotel-booking' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Sidebar 3', 'resort-hotel-booking' ),
        'id'            => 'sidebar-3',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'resort-hotel-booking' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 1', 'resort-hotel-booking' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'resort-hotel-booking' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 2', 'resort-hotel-booking' ),
        'id'            => 'footer-2',
        'description'   => __( 'Add widgets here to appear in your footer.', 'resort-hotel-booking' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 3', 'resort-hotel-booking' ),
        'id'            => 'footer-3',
        'description'   => __( 'Add widgets here to appear in your footer.', 'resort-hotel-booking' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 4', 'resort-hotel-booking' ),
        'id'            => 'footer-4',
        'description'   => __( 'Add widgets here to appear in your footer.', 'resort-hotel-booking' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'resort_hotel_booking_widgets_init' );

// enqueue styles for child theme
function resort_hotel_booking_enqueue_styles() {

    // Bootstrap
    wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

    // Theme block stylesheet.
    wp_enqueue_style( 'resort-hotel-booking-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'resort-hotel-booking-child-style' ), '1.0' );

    // enqueue parent styles
    wp_enqueue_style('adventure-travelling-style', get_template_directory_uri() .'/style.css');

    // enqueue child styles
    wp_enqueue_style('adventure-travelling-child-style', get_stylesheet_directory_uri() .'/style.css', array('adventure-travelling-style'));
    
    require get_theme_file_path( '/tp-theme-color.php' );
    wp_add_inline_style( 'adventure-travelling-child-style',$adventure_travelling_tp_theme_css );

    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );

    $adventure_travelling_body_font_family = get_theme_mod('adventure_travelling_body_font_family', '');

    $adventure_travelling_tp_theme_css = '
        body{
            font-family: '.esc_html($adventure_travelling_body_font_family).' !important;
        }
        .more-btn a{
            font-family: '.esc_html($adventure_travelling_body_font_family).'!important;
        }
        p.infotext{
            font-family: '.esc_html($adventure_travelling_body_font_family).'!important;
        }
    ';
    wp_add_inline_style('adventure-travelling-child-style', $adventure_travelling_tp_theme_css);
}
add_action('wp_enqueue_scripts', 'resort_hotel_booking_enqueue_styles');

function resort_hotel_booking_admin_scripts() {
    // Backend CSS
    wp_enqueue_style( 'resort-hotel-booking-backend-css', get_theme_file_uri( '/assets/css/customizer.css' ) );
}
add_action( 'admin_enqueue_scripts', 'resort_hotel_booking_admin_scripts' );

// offer Meta
function resort_hotel_booking_bn_custom_meta_offer() {
    add_meta_box( 'bn_meta', __( 'Trip Offer Meta Feilds', 'resort-hotel-booking' ), 'resort_hotel_booking_meta_callback_trip_offer', 'post', 'normal', 'high' );
}
/* Hook things in for admin*/
if (is_admin()){
  add_action('admin_menu', 'resort_hotel_booking_bn_custom_meta_offer');
}

function resort_hotel_booking_meta_callback_trip_offer( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'resort_hotel_booking_offer_trip_meta_nonce' );
    $adventure_travelling_bn_stored_meta = get_post_meta( $post->ID );
    $adventure_travelling_hotel_amount = get_post_meta( $post->ID, 'resort_hotel_booking_hotel_amount', true );
    $adventure_travelling_hotel_days = get_post_meta( $post->ID, 'resort_hotel_booking_hotel_days', true );
    $adventure_travelling_reviews_count = get_post_meta( $post->ID, 'resort_hotel_booking_reviews_count', true );
    ?>
    <div id="testimonials_custom_stuff">
        <table id="list">
            <tbody id="the-list" data-wp-lists="list:meta">
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Package Amount', 'resort-hotel-booking' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="resort_hotel_booking_hotel_amount" id="resort_hotel_booking_hotel_amount" value="<?php echo esc_attr($adventure_travelling_hotel_amount); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Package Days', 'resort-hotel-booking' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="resort_hotel_booking_hotel_days" id="resort_hotel_booking_hotel_days" value="<?php echo esc_attr($adventure_travelling_hotel_days); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Review', 'resort-hotel-booking' )?>
                    </td>
                    <td class="left">
                        <p><strong><?php esc_html_e( 'Count ( Between 1 and 5 )', 'resort-hotel-booking' )?></strong></p>
                        <input type="number" name="resort_hotel_booking_reviews_count" id="resort_hotel_booking_reviews_count" value="<?php echo esc_attr($adventure_travelling_reviews_count); ?>" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php
}

/* Saves the custom meta input */
function resort_hotel_booking_bn_metadesig_save( $post_id ) {
    if (!isset($_POST['resort_hotel_booking_offer_trip_meta_nonce']) || !wp_verify_nonce( strip_tags( wp_unslash( $_POST['resort_hotel_booking_offer_trip_meta_nonce']) ), basename(__FILE__))) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Save Trip Amount
    if( isset( $_POST[ 'resort_hotel_booking_hotel_amount' ] ) ) {
        update_post_meta( $post_id, 'resort_hotel_booking_hotel_amount', strip_tags( wp_unslash( $_POST[ 'resort_hotel_booking_hotel_amount' ]) ) );
    }
    // Save Trip Days
    if( isset( $_POST[ 'resort_hotel_booking_hotel_days' ] ) ) {
        update_post_meta( $post_id, 'resort_hotel_booking_hotel_days', strip_tags( wp_unslash( $_POST[ 'resort_hotel_booking_hotel_days' ]) ) );
    }
    // Save Review
    if( isset( $_POST[ 'resort_hotel_booking_reviews_count' ] ) ) {
        if ($_POST[ 'resort_hotel_booking_reviews_count' ] >= "1" && $_POST[ 'resort_hotel_booking_reviews_count' ] <= "5") {
            update_post_meta( $post_id, 'resort_hotel_booking_reviews_count', strip_tags( wp_unslash( $_POST[ 'resort_hotel_booking_reviews_count' ]) ) );
        }
    }
}
add_action( 'save_post', 'resort_hotel_booking_bn_metadesig_save' );

require get_theme_file_path( '/customizer/customize-control-toggle.php' );

if ( ! defined( 'ADVENTURE_TRAVELLING_PRO_THEME_NAME' ) ) {
    define( 'ADVENTURE_TRAVELLING_PRO_THEME_NAME', esc_html__( 'Resort Hotel Pro', 'resort-hotel-booking' ));
}
if ( ! defined( 'ADVENTURE_TRAVELLING_PRO_THEME_URL' ) ) {
    define( 'ADVENTURE_TRAVELLING_PRO_THEME_URL', esc_url('https://www.themespride.com/products/resort-wordpress-theme'));
}
if ( ! defined( 'ADVENTURE_TRAVELLING_FREE_THEME_URL' ) ) {
	define( 'ADVENTURE_TRAVELLING_FREE_THEME_URL', 'https://www.themespride.com/products/free-hotel-booking-wordpress-theme' );
}
if ( ! defined( 'ADVENTURE_TRAVELLING_DEMO_THEME_URL' ) ) {
	define( 'ADVENTURE_TRAVELLING_DEMO_THEME_URL', 'https://page.themespride.com/resort-hotel-booking-pro/' );
}
if ( ! defined( 'ADVENTURE_TRAVELLING_DOCS_THEME_URL' ) ) {
    define( 'ADVENTURE_TRAVELLING_DOCS_THEME_URL', 'https://page.themespride.com/demo/docs/resort-hotel-booking/' );
}
if ( ! defined( 'ADVENTURE_TRAVELLING_DOCS_URL' ) ) {
	define( 'ADVENTURE_TRAVELLING_DOCS_URL', esc_url('https://page.themespride.com/demo/docs/resort-hotel-booking/'));
}
if ( ! defined( 'ADVENTURE_TRAVELLING_RATE_THEME_URL' ) ) {
    define( 'ADVENTURE_TRAVELLING_RATE_THEME_URL', 'https://wordpress.org/support/theme/resort-hotel-booking/reviews/#new-post' );
}
if ( ! defined( 'ADVENTURE_TRAVELLING_SUPPORT_THEME_URL' ) ) {
    define( 'ADVENTURE_TRAVELLING_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/resort-hotel-booking' );
}
if ( ! defined( 'ADVENTURE_TRAVELLING_CHANGELOG_THEME_URL' ) ) {
    define( 'ADVENTURE_TRAVELLING_CHANGELOG_THEME_URL', get_stylesheet_directory() . '/readme.txt' );
}


define('RESORT_HOTEL_BOOKING_CREDIT',__('https://www.themespride.com/products/free-hotel-booking-wordpress-theme','resort-hotel-booking') );
if ( ! function_exists( 'resort_hotel_booking_credit' ) ) {
    function resort_hotel_booking_credit(){
        echo "<a href=".esc_url(RESORT_HOTEL_BOOKING_CREDIT)." target='_blank'>".esc_html__(get_theme_mod('adventure_travelling_footer_text',__('Resort Hotel Booking WordPress Theme','resort-hotel-booking')))."</a>";
    }
}
