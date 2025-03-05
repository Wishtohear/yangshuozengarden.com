<?php
/**
 * Hotel Booking Lite Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Hotel Booking Lite
 */

if ( ! defined( 'HOTEL_BOOKING_LITE_URL' ) ) {
define('HOTEL_BOOKING_LITE_URL',__('https://www.themagnifico.net/products/hotel-booking-wordpress-theme','hotel-booking-lite'));
}
if ( ! defined( 'HOTEL_BOOKING_LITE_BUY_TEXT' ) ) {
    define( 'HOTEL_BOOKING_LITE_BUY_TEXT', __( 'Buy Hotel Booking Pro','hotel-booking-lite' ));
}
use WPTRT\Customize\Section\Hotel_Booking_Lite_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Hotel_Booking_Lite_Button::class );

    $manager->add_section(
        new Hotel_Booking_Lite_Button( $manager, 'hotel_booking_lite_pro', [
            'title'       => __( 'Hotel Booking Pro', 'hotel-booking-lite' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'hotel-booking-lite' ),
            'button_url'  => esc_url( 'https://www.themagnifico.net/products/hotel-booking-wordpress-theme', 'hotel-booking-lite')
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'hotel-booking-lite-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'hotel-booking-lite-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hotel_booking_lite_customize_register($wp_customize){

     // Pro Version
    class Hotel_Booking_Lite_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( HOTEL_BOOKING_LITE_BUY_TEXT,'hotel-booking-lite' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function Hotel_Booking_Lite_sanitize_custom_control( $input ) {
        return $input;
    }

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    //Logo
    $wp_customize->add_setting('hotel_booking_lite_logo_max_height',array(
        'default'   => '24',
        'sanitize_callback' => 'hotel_booking_lite_sanitize_number_absint'
    ));
    $wp_customize->add_control('hotel_booking_lite_logo_max_height',array(
        'label' => esc_html__('Logo Width','hotel-booking-lite'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));

    $wp_customize->add_setting('hotel_booking_lite_logo_title', array(
        'default' => true,
        'sanitize_callback' => 'hotel_booking_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'hotel_booking_lite_logo_title',array(
        'label'          => __( 'Enable Disable Title', 'hotel-booking-lite' ),
        'section'        => 'title_tagline',
        'settings'       => 'hotel_booking_lite_logo_title',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('hotel_booking_lite_theme_description', array(
        'default' => false,
        'sanitize_callback' => 'hotel_booking_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'hotel_booking_lite_theme_description',array(
        'label'          => __( 'Enable Disable Tagline', 'hotel-booking-lite' ),
        'section'        => 'title_tagline',
        'settings'       => 'hotel_booking_lite_theme_description',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('hotel_booking_lite_logo_title_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hotel_booking_lite_logo_title_color', array(
        'label'    => __('Site Title Color', 'hotel-booking-lite'),
        'section'  => 'title_tagline'
    )));

    $wp_customize->add_setting('hotel_booking_lite_logo_tagline_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hotel_booking_lite_logo_tagline_color', array(
        'label'    => __('Site Tagline Color', 'hotel-booking-lite'),
        'section'  => 'title_tagline'
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_logo', array(
        'sanitize_callback' => 'Hotel_Booking_Lite_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Hotel_Booking_Lite_Customize_Pro_Version ( $wp_customize,'pro_version_logo', array(
        'section'     => 'title_tagline',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'hotel-booking-lite' ),
        'description' => esc_url( HOTEL_BOOKING_LITE_URL ),
        'priority'    => 100
    )));

    // General Settings
     $wp_customize->add_section('hotel_booking_lite_general_settings',array(
        'title' => esc_html__('General Settings','hotel-booking-lite'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('hotel_booking_lite_site_width_layout',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'hotel_booking_lite_sanitize_choices'
    ));
    $wp_customize->add_control('hotel_booking_lite_site_width_layout',array(
        'label'       => esc_html__( 'Site Width Layout','hotel-booking-lite' ),
        'type' => 'radio',
        'section' => 'hotel_booking_lite_general_settings',
        'choices' => array(
            'Full Width' => __('Full Width','hotel-booking-lite'),
            'Wide Width' => __('Wide Width','hotel-booking-lite'),
            'Container Width' => __('Container Width','hotel-booking-lite')
        ),
    ) );

    $wp_customize->add_setting('hotel_booking_lite_preloader_hide', array(
        'default' => false,
        'sanitize_callback' => 'hotel_booking_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'hotel_booking_lite_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'hotel-booking-lite' ),
        'section'        => 'hotel_booking_lite_general_settings',
        'settings'       => 'hotel_booking_lite_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting( 'hotel_booking_lite_preloader_bg_color', array(
        'default' => '#000',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hotel_booking_lite_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','hotel-booking-lite'),
        'section' => 'hotel_booking_lite_general_settings',
        'settings' => 'hotel_booking_lite_preloader_bg_color'
    )));

    $wp_customize->add_setting( 'hotel_booking_lite_preloader_dot_1_color', array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hotel_booking_lite_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','hotel-booking-lite'),
        'section' => 'hotel_booking_lite_general_settings',
        'settings' => 'hotel_booking_lite_preloader_dot_1_color'
    )));

    $wp_customize->add_setting( 'hotel_booking_lite_preloader_dot_2_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hotel_booking_lite_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','hotel-booking-lite'),
        'section' => 'hotel_booking_lite_general_settings',
        'settings' => 'hotel_booking_lite_preloader_dot_2_color'
    )));

    $wp_customize->add_setting('hotel_booking_lite_sticky_header', array(
        'default' => false,
        'sanitize_callback' => 'hotel_booking_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'hotel_booking_lite_sticky_header',array(
        'label'          => __( 'Show Sticky Header', 'hotel-booking-lite' ),
        'section'        => 'hotel_booking_lite_general_settings',
        'settings'       => 'hotel_booking_lite_sticky_header',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('hotel_booking_lite_scroll_hide', array(
        'default' => false,
        'sanitize_callback' => 'hotel_booking_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'hotel_booking_lite_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'hotel-booking-lite' ),
        'section'        => 'hotel_booking_lite_general_settings',
        'settings'       => 'hotel_booking_lite_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('hotel_booking_lite_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'hotel_booking_lite_sanitize_choices'
    ));
    $wp_customize->add_control('hotel_booking_lite_scroll_top_position',array(
        'type' => 'radio',
        'label' => esc_html__('Scroll Top Position','hotel-booking-lite'),
        'section' => 'hotel_booking_lite_general_settings',
        'choices' => array(
            'Right' => __('Right','hotel-booking-lite'),
            'Left' => __('Left','hotel-booking-lite'),
            'Center' => __('Center','hotel-booking-lite')
        ),
    ) );

    $wp_customize->add_setting( 'hotel_booking_lite_scroll_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hotel_booking_lite_scroll_bg_color', array(
        'label' => esc_html__('Scroll Top Background Color','hotel-booking-lite'),
        'section' => 'hotel_booking_lite_general_settings',
        'settings' => 'hotel_booking_lite_scroll_bg_color'
    )));

    $wp_customize->add_setting( 'hotel_booking_lite_scroll_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hotel_booking_lite_scroll_color', array(
        'label' => esc_html__('Scroll Top Color','hotel-booking-lite'),
        'section' => 'hotel_booking_lite_general_settings',
        'settings' => 'hotel_booking_lite_scroll_color'
    )));

    $wp_customize->add_setting('hotel_booking_lite_scroll_font_size',array(
        'default'   => '16',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('hotel_booking_lite_scroll_font_size',array(
        'label' => __('Scroll Top Font Size','hotel-booking-lite'),
        'description' => __('Put in px','hotel-booking-lite'),
        'section'   => 'hotel_booking_lite_general_settings',
        'type'      => 'number'
    ));

    $wp_customize->add_setting( 'hotel_booking_lite_scroll_to_top_border_radius', array(
        'default'              => '',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'hotel_booking_lite_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'hotel_booking_lite_scroll_to_top_border_radius', array(
        'label'       => esc_html__( 'Scroll To Top Border Radius','hotel-booking-lite' ),
        'section'     => 'hotel_booking_lite_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    //Woocommerce shop page Sidebar
    $wp_customize->add_setting('hotel_booking_lite_woocommerce_shop_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'hotel_booking_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'hotel_booking_lite_woocommerce_shop_page_sidebar',array(
        'label'          => __( 'Hide Shop Page Sidebar', 'hotel-booking-lite' ),
        'section'        => 'hotel_booking_lite_general_settings',
        'settings'       => 'hotel_booking_lite_woocommerce_shop_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('hotel_booking_lite_shop_page_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'hotel_booking_lite_sanitize_choices'
    ));
    $wp_customize->add_control('hotel_booking_lite_shop_page_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Shop Page Sidebar','hotel-booking-lite'),
        'section' => 'hotel_booking_lite_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','hotel-booking-lite'),
            'Right Sidebar' => __('Right Sidebar','hotel-booking-lite'),
        ),
    ) );

    //Woocommerce Single Product page Sidebar
    $wp_customize->add_setting('hotel_booking_lite_woocommerce_single_product_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'hotel_booking_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'hotel_booking_lite_woocommerce_single_product_page_sidebar',array(
        'label'          => __( 'Hide Single Product Page Sidebar', 'hotel-booking-lite' ),
        'section'        => 'hotel_booking_lite_general_settings',
        'settings'       => 'hotel_booking_lite_woocommerce_single_product_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('hotel_booking_lite_single_product_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'hotel_booking_lite_sanitize_choices'
    ));
    $wp_customize->add_control('hotel_booking_lite_single_product_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Single Product Page Sidebar','hotel-booking-lite'),
        'section' => 'hotel_booking_lite_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','hotel-booking-lite'),
            'Right Sidebar' => __('Right Sidebar','hotel-booking-lite'),
        ),
    ) );

    //Products border radius
    $wp_customize->add_setting( 'hotel_booking_lite_woo_product_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'hotel_booking_lite_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'hotel_booking_lite_woo_product_border_radius', array(
        'label'       => esc_html__( 'Product Border Radius','hotel-booking-lite' ),
        'section'     => 'hotel_booking_lite_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 150,
        ),
    ) );

     // Pro Version
    $wp_customize->add_setting( 'pro_version_general_setting', array(
        'sanitize_callback' => 'Hotel_Booking_Lite_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Hotel_Booking_Lite_Customize_Pro_Version ( $wp_customize,'pro_version_general_setting', array(
        'section'     => 'hotel_booking_lite_general_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'hotel-booking-lite' ),
        'description' => esc_url( HOTEL_BOOKING_LITE_URL ),
        'priority'    => 100
    )));

    // Top Header
    $wp_customize->add_section('hotel_booking_lite_top_header',array(
        'title' => esc_html__('Top Header','hotel-booking-lite'),
    ));

    $wp_customize->add_setting('hotel_booking_lite_phone',array(
        'default' => '',
        'sanitize_callback' => 'hotel_booking_lite_sanitize_phone_number'
    ));
    $wp_customize->add_control('hotel_booking_lite_phone',array(
        'label' => esc_html__('Add Phone Number','hotel-booking-lite'),
        'section' => 'hotel_booking_lite_top_header',
        'setting' => 'hotel_booking_lite_phone',
        'type'  => 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_header_setting', array(
        'sanitize_callback' => 'Hotel_Booking_Lite_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Hotel_Booking_Lite_Customize_Pro_Version ( $wp_customize,'pro_version_header_setting', array(
        'section'     => 'hotel_booking_lite_top_header',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'hotel-booking-lite' ),
        'description' => esc_url( HOTEL_BOOKING_LITE_URL ),
        'priority'    => 100
    )));


    // Social Link
    $wp_customize->add_section('hotel_booking_lite_social_link',array(
        'title' => esc_html__('Social Links','hotel-booking-lite'),
    ));

    $wp_customize->add_setting('hotel_booking_lite_facebook_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('hotel_booking_lite_facebook_url',array(
        'label' => esc_html__('Facebook Link','hotel-booking-lite'),
        'section' => 'hotel_booking_lite_social_link',
        'setting' => 'hotel_booking_lite_facebook_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('hotel_booking_lite_twitter_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('hotel_booking_lite_twitter_url',array(
        'label' => esc_html__('Twitter Link','hotel-booking-lite'),
        'section' => 'hotel_booking_lite_social_link',
        'setting' => 'hotel_booking_lite_twitter_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('hotel_booking_lite_intagram_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('hotel_booking_lite_intagram_url',array(
        'label' => esc_html__('Intagram Link','hotel-booking-lite'),
        'section' => 'hotel_booking_lite_social_link',
        'setting' => 'hotel_booking_lite_intagram_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('hotel_booking_lite_linkedin_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('hotel_booking_lite_linkedin_url',array(
        'label' => esc_html__('Linkedin Link','hotel-booking-lite'),
        'section' => 'hotel_booking_lite_social_link',
        'setting' => 'hotel_booking_lite_linkedin_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('hotel_booking_lite_youtube_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('hotel_booking_lite_youtube_url',array(
        'label' => esc_html__('YouTube Link','hotel-booking-lite'),
        'section' => 'hotel_booking_lite_social_link',
        'setting' => 'hotel_booking_lite_pintrest_url',
        'type'  => 'url'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_social_setting', array(
        'sanitize_callback' => 'Hotel_Booking_Lite_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Hotel_Booking_Lite_Customize_Pro_Version ( $wp_customize,'pro_version_social_setting', array(
        'section'     => 'hotel_booking_lite_social_link',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'hotel-booking-lite' ),
        'description' => esc_url( HOTEL_BOOKING_LITE_URL ),
        'priority'    => 100
    )));

    //Menu Settings
    $wp_customize->add_section('hotel_booking_lite_menu_settings',array(
        'title' => esc_html__('Menus Settings','hotel-booking-lite'),
    ));

    $wp_customize->add_setting('hotel_booking_lite_menu_font_size',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('hotel_booking_lite_menu_font_size',array(
        'label' => esc_html__('Menu Font Size','hotel-booking-lite'),
        'section' => 'hotel_booking_lite_menu_settings',
        'type'  => 'number'
    ));

    $wp_customize->add_setting('hotel_booking_lite_nav_menu_text_transform',array(
        'default'=> 'Capitalize',
        'sanitize_callback' => 'hotel_booking_lite_sanitize_choices'
    ));
    $wp_customize->add_control('hotel_booking_lite_nav_menu_text_transform',array(
        'type' => 'radio',
        'label' => esc_html__('Menu Text Transform','hotel-booking-lite'),
        'choices' => array(
            'Uppercase' => __('Uppercase','hotel-booking-lite'),
            'Capitalize' => __('Capitalize','hotel-booking-lite'),
            'Lowercase' => __('Lowercase','hotel-booking-lite'),
        ),
        'section'=> 'hotel_booking_lite_menu_settings',
    ));

    $wp_customize->add_setting('hotel_booking_lite_nav_menu_font_weight',array(
        'default'=> '600',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('hotel_booking_lite_nav_menu_font_weight',array(
        'type' => 'number',
        'label' => esc_html__('Menu Font Weight','hotel-booking-lite'),
        'input_attrs' => array(
            'step'             => 100,
            'min'              => 100,
            'max'              => 1000,
        ),
        'section'=> 'hotel_booking_lite_menu_settings',
    ));

    //Slider
    $wp_customize->add_section('hotel_booking_lite_top_slider',array(
        'title' => esc_html__('Slider Option','hotel-booking-lite')
    ));

    $wp_customize->add_setting('hotel_booking_lite_slider_setting', array(
        'default' => 0,
        'sanitize_callback' => 'hotel_booking_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'hotel_booking_lite_slider_setting',array(
        'label'          => __( 'Enable Disable Slider', 'hotel-booking-lite' ),
        'section'        => 'hotel_booking_lite_top_slider',
        'settings'       => 'hotel_booking_lite_slider_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('hotel_booking_lite_slider_title_setting', array(
        'default' => 1,
        'sanitize_callback' => 'hotel_booking_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'hotel_booking_lite_slider_title_setting',array(
        'label'          => __( 'Enable Disable Slider Title', 'hotel-booking-lite' ),
        'section'        => 'hotel_booking_lite_top_slider',
        'settings'       => 'hotel_booking_lite_slider_title_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('hotel_booking_lite_slider_button_setting', array(
        'default' => 1,
        'sanitize_callback' => 'hotel_booking_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'hotel_booking_lite_slider_button_setting',array(
        'label'          => __( 'Enable Disable Slider Button', 'hotel-booking-lite' ),
        'section'        => 'hotel_booking_lite_top_slider',
        'settings'       => 'hotel_booking_lite_slider_button_setting',
        'type'           => 'checkbox',
    )));

    for ( $hotel_booking_lite_count = 1; $hotel_booking_lite_count <= 3; $hotel_booking_lite_count++ ) {
        $wp_customize->add_setting( 'hotel_booking_lite_top_slider_page' . $hotel_booking_lite_count, array(
            'default'           => '',
            'sanitize_callback' => 'hotel_booking_lite_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'hotel_booking_lite_top_slider_page' . $hotel_booking_lite_count, array(
            'label'    => __( 'Select Slide Page', 'hotel-booking-lite' ),
            'description' => __('Slider image size (1110 x 400 px)','hotel-booking-lite'),
            'section'  => 'hotel_booking_lite_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    }

    $wp_customize->add_setting('hotel_booking_lite_slider_content_layout',array(
        'default'=> 'Left',
        'sanitize_callback' => 'hotel_booking_lite_sanitize_choices'
    ));
    $wp_customize->add_control('hotel_booking_lite_slider_content_layout',array(
        'type' => 'radio',
        'label' => esc_html__('Slider Content Layout','hotel-booking-lite'),
        'choices' => array(
            'Left' => __('Left','hotel-booking-lite'),
            'Center' => __('Center','hotel-booking-lite'),
            'Right' => __('Right','hotel-booking-lite'),
        ),
        'section'=> 'hotel_booking_lite_top_slider',
    ));

    //Slider button text
    $wp_customize->add_setting('hotel_booking_lite_slider_button_text',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('hotel_booking_lite_slider_button_text',array(
        'label' => __('Slider Button Text','hotel-booking-lite'),
        'section'=> 'hotel_booking_lite_top_slider',
        'type'=> 'text'
    ));

    //Slider Image Opacity
    $wp_customize->add_setting('hotel_booking_lite_slider_opacity_color',array(
      'default' => '',
      'sanitize_callback' => 'hotel_booking_lite_sanitize_choices'
    ));

    $wp_customize->add_control( 'hotel_booking_lite_slider_opacity_color', array(
    'label'       => esc_html__( 'Slider Image Opacity','hotel-booking-lite' ),
    'section'     => 'hotel_booking_lite_top_slider',
    'type'        => 'select',
    'choices' => array(
      '0' =>  esc_attr('0','hotel-booking-lite'),
      '0.1' =>  esc_attr('0.1','hotel-booking-lite'),
      '0.2' =>  esc_attr('0.2','hotel-booking-lite'),
      '0.3' =>  esc_attr('0.3','hotel-booking-lite'),
      '0.4' =>  esc_attr('0.4','hotel-booking-lite'),
      '0.5' =>  esc_attr('0.5','hotel-booking-lite'),
      '0.6' =>  esc_attr('0.6','hotel-booking-lite'),
      '0.7' =>  esc_attr('0.7','hotel-booking-lite'),
      '0.8' =>  esc_attr('0.8','hotel-booking-lite'),
      '0.9' =>  esc_attr('0.9','hotel-booking-lite')
    ),
    ));

    //Slider height
    $wp_customize->add_setting('hotel_booking_lite_slider_img_height',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('hotel_booking_lite_slider_img_height',array(
        'label' => __('Slider Height','hotel-booking-lite'),
        'description'   => __('Add the slider height in px(eg. 500px).','hotel-booking-lite'),
        'input_attrs' => array(
            'placeholder' => __( '500px', 'hotel-booking-lite' ),
        ),
        'section'=> 'hotel_booking_lite_top_slider',
        'type'=> 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_slider_setting', array(
        'sanitize_callback' => 'Hotel_Booking_Lite_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Hotel_Booking_Lite_Customize_Pro_Version ( $wp_customize,'pro_version_slider_setting', array(
        'section'     => 'hotel_booking_lite_top_slider',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'hotel-booking-lite' ),
        'description' => esc_url( HOTEL_BOOKING_LITE_URL ),
        'priority'    => 100
    )));

    // Popular Room Section
    $wp_customize->add_section('hotel_booking_lite_popular_rooms',array(
        'title' => esc_html__('Popular Room Section','hotel-booking-lite')
    ));

    $wp_customize->add_setting('hotel_booking_lite_popular_setting', array(
        'default' => 0,
        'sanitize_callback' => 'hotel_booking_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'hotel_booking_lite_popular_setting',array(
        'label'          => __( 'Enable Disable Popular', 'hotel-booking-lite' ),
        'section'        => 'hotel_booking_lite_popular_rooms',
        'settings'       => 'hotel_booking_lite_popular_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('hotel_booking_lite_popular_room_heading', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hotel_booking_lite_popular_room_heading', array(
        'label' => __('Add Heading', 'hotel-booking-lite'),
        'section' => 'hotel_booking_lite_popular_rooms',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hotel_booking_lite_popular_room_post_loop',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('hotel_booking_lite_popular_room_post_loop',array(
        'label' => esc_html__('No of Popular Rooms to show','hotel-booking-lite'),
        'section'   => 'hotel_booking_lite_popular_rooms',
        'type'      => 'number',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 0,
            'max'              => 12,
        ),
    ));

    $team_post_loop = get_theme_mod('hotel_booking_lite_popular_room_post_loop');

    $hotel_booking_lite_args = array('numberposts' => -1);
    $post_list = get_posts($hotel_booking_lite_args);
    $i = 1;
    $pst_sls[]= __('Select','hotel-booking-lite');
    foreach ($post_list as $key => $p_post) {
        $pst_sls[$p_post->ID]=$p_post->post_title;
    }
    for ( $i = 1; $i <= $team_post_loop; $i++ ) {
        $wp_customize->add_setting('hotel_booking_lite_popular_room_post_section'.$i,array(
            'sanitize_callback' => 'hotel_booking_lite_sanitize_choices',
        ));
        $wp_customize->add_control('hotel_booking_lite_popular_room_post_section'.$i,array(
            'type'    => 'select',
            'choices' => $pst_sls,
            'label' => __('Select Post','hotel-booking-lite'),
            'section' => 'hotel_booking_lite_popular_rooms',
        ));
    }
    wp_reset_postdata();

    // Pro Version
    $wp_customize->add_setting( 'pro_version_popular_setting', array(
        'sanitize_callback' => 'Hotel_Booking_Lite_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Hotel_Booking_Lite_Customize_Pro_Version ( $wp_customize,'pro_version_popular_setting', array(
        'section'     => 'hotel_booking_lite_popular_rooms',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'hotel-booking-lite' ),
        'description' => esc_url( HOTEL_BOOKING_LITE_URL ),
        'priority'    => 100
    )));

    // Footer
    $wp_customize->add_section('hotel_booking_lite_site_footer_section', array(
        'title' => esc_html__('Footer', 'hotel-booking-lite'),
    ));

    $wp_customize->add_setting('hotel_booking_lite_footer_bg_image',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'hotel_booking_lite_footer_bg_image',array(
        'label' => __('Footer Background Image','hotel-booking-lite'),
        'section' => 'hotel_booking_lite_site_footer_section',
        'priority' => 1,
    )));

    $wp_customize->add_setting('hotel_booking_lite_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hotel_booking_lite_footer_text_setting', array(
        'label' => __('Replace the footer text', 'hotel-booking-lite'),
        'section' => 'hotel_booking_lite_site_footer_section',
        'priority' => 1,
        'type' => 'text',
    ));

    $wp_customize->add_setting('hotel_booking_lite_footer_widget_content_alignment',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'hotel_booking_lite_sanitize_choices'
    ));
    $wp_customize->add_control('hotel_booking_lite_footer_widget_content_alignment',array(
        'type' => 'select',
        'label' => __('Footer Widget Content Alignment','hotel-booking-lite'),
        'section' => 'hotel_booking_lite_site_footer_section',
        'choices' => array(
            'Left' => __('Left','hotel-booking-lite'),
            'Center' => __('Center','hotel-booking-lite'),
            'Right' => __('Right','hotel-booking-lite')
        ),
    ) );

    $wp_customize->add_setting('hotel_booking_lite_show_hide_copyright',array(
        'default' => true,
        'sanitize_callback' => 'hotel_booking_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('hotel_booking_lite_show_hide_copyright',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Copyright','hotel-booking-lite'),
        'section' => 'hotel_booking_lite_site_footer_section',
    ));

    $wp_customize->add_setting('hotel_booking_lite_copyright_content_alignment',array(
        'default' => 'Right',
        'transport' => 'refresh',
        'sanitize_callback' => 'hotel_booking_lite_sanitize_choices'
    ));
    $wp_customize->add_control('hotel_booking_lite_copyright_content_alignment',array(
        'type' => 'select',
        'label' => __('Copyright Content Alignment','hotel-booking-lite'),
        'section' => 'hotel_booking_lite_site_footer_section',
        'choices' => array(
            'Left' => __('Left','hotel-booking-lite'),
            'Center' => __('Center','hotel-booking-lite'),
            'Right' => __('Right','hotel-booking-lite')
        ),
    ) );

    $wp_customize->add_setting('hotel_booking_lite_copyright_background_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hotel_booking_lite_copyright_background_color', array(
        'label'    => __('Copyright Background Color', 'hotel-booking-lite'),
        'section'  => 'hotel_booking_lite_site_footer_section',
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_footer_setting', array(
        'sanitize_callback' => 'Hotel_Booking_Lite_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Hotel_Booking_Lite_Customize_Pro_Version ( $wp_customize,'pro_version_footer_setting', array(
        'section'     => 'hotel_booking_lite_site_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'hotel-booking-lite' ),
        'description' => esc_url( HOTEL_BOOKING_LITE_URL ),
        'priority'    => 100
    )));

    // Post Settings
     $wp_customize->add_section('hotel_booking_lite_post_settings',array(
        'title' => esc_html__('Post Settings','hotel-booking-lite'),
        'priority'   =>40,
    ));

    $wp_customize->add_setting('hotel_booking_lite_post_page_title',array(
        'sanitize_callback' => 'hotel_booking_lite_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('hotel_booking_lite_post_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Title', 'hotel-booking-lite'),
        'section'     => 'hotel_booking_lite_post_settings',
        'description' => esc_html__('Check this box to enable title on post page.', 'hotel-booking-lite'),
    ));

    $wp_customize->add_setting('hotel_booking_lite_post_page_thumb',array(
        'sanitize_callback' => 'hotel_booking_lite_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('hotel_booking_lite_post_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Thumbnail', 'hotel-booking-lite'),
        'section'     => 'hotel_booking_lite_post_settings',
        'description' => esc_html__('Check this box to enable thumbnail on post page.', 'hotel-booking-lite'),
    ));

    $wp_customize->add_setting('hotel_booking_lite_post_page_btn',array(
        'sanitize_callback' => 'hotel_booking_lite_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('hotel_booking_lite_post_page_btn',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Button', 'hotel-booking-lite'),
        'section'     => 'hotel_booking_lite_post_settings',
        'description' => esc_html__('Check this box to enable button on post page.', 'hotel-booking-lite'),
    ));

    $wp_customize->add_setting('hotel_booking_lite_post_page_content',array(
        'sanitize_callback' => 'hotel_booking_lite_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('hotel_booking_lite_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Content', 'hotel-booking-lite'),
        'section'     => 'hotel_booking_lite_post_settings',
        'description' => esc_html__('Check this box to enable content on post page.', 'hotel-booking-lite'),
    ));

    $wp_customize->add_setting('hotel_booking_lite_post_page_excerpt_length',array(
        'sanitize_callback' => 'hotel_booking_lite_sanitize_number_range',
        'default'           => 30,
    ));
    $wp_customize->add_control('hotel_booking_lite_post_page_excerpt_length',array(
        'label'       => esc_html__('Post Page Excerpt Length', 'hotel-booking-lite'),
        'section'     => 'hotel_booking_lite_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ));

    $wp_customize->add_setting('hotel_booking_lite_post_page_excerpt_suffix',array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '[...]',
    ));
    $wp_customize->add_control('hotel_booking_lite_post_page_excerpt_suffix',array(
        'type'        => 'text',
        'label'       => esc_html__('Post Page Excerpt Suffix', 'hotel-booking-lite'),
        'section'     => 'hotel_booking_lite_post_settings',
        'description' => esc_html__('For Ex. [...], etc', 'hotel-booking-lite'),
    ));

    $wp_customize->add_setting('hotel_booking_lite_post_page_pagination',array(
        'sanitize_callback' => 'hotel_booking_lite_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('hotel_booking_lite_post_page_pagination',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Pagination', 'hotel-booking-lite'),
        'section'     => 'hotel_booking_lite_post_settings',
        'description' => esc_html__('Check this box to enable pagination on post page.', 'hotel-booking-lite'),
    ));

    $wp_customize->add_setting('hotel_booking_lite_single_post_thumb',array(
        'sanitize_callback' => 'hotel_booking_lite_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('hotel_booking_lite_single_post_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Thumbnail', 'hotel-booking-lite'),
        'section'     => 'hotel_booking_lite_post_settings',
        'description' => esc_html__('Check this box to enable post thumbnail on single post.', 'hotel-booking-lite'),
    ));

    $wp_customize->add_setting('hotel_booking_lite_single_post_title',array(
            'sanitize_callback' => 'hotel_booking_lite_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('hotel_booking_lite_single_post_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Title', 'hotel-booking-lite'),
        'section'     => 'hotel_booking_lite_post_settings',
        'description' => esc_html__('Check this box to enable title on single post.', 'hotel-booking-lite'),
    ));

     $wp_customize->add_setting('hotel_booking_lite_single_post_page_content',array(
        'sanitize_callback' => 'hotel_booking_lite_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('hotel_booking_lite_single_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Page Content', 'hotel-booking-lite'),
        'section'     => 'hotel_booking_lite_post_settings',
        'description' => esc_html__('Check this box to enable content on single post page.', 'hotel-booking-lite'),
    ));

    $wp_customize->add_setting('hotel_booking_lite_single_post_navigation_show_hide',array(
        'default' => true,
        'sanitize_callback' => 'hotel_booking_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('hotel_booking_lite_single_post_navigation_show_hide',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Post Navigation','hotel-booking-lite'),
        'section' => 'hotel_booking_lite_post_settings',
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_post_setting', array(
        'sanitize_callback' => 'Hotel_Booking_Lite_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Hotel_Booking_Lite_Customize_Pro_Version ( $wp_customize,'pro_version_post_setting', array(
        'section'     => 'hotel_booking_lite_post_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'hotel-booking-lite' ),
        'description' => esc_url( HOTEL_BOOKING_LITE_URL ),
        'priority'    => 100
    )));

    // Page Settings
    $wp_customize->add_section('hotel_booking_lite_page_settings',array(
        'title' => esc_html__('Page Settings','hotel-booking-lite'),
        'priority'   =>50,
    ));

    $wp_customize->add_setting('hotel_booking_lite_single_page_title',array(
            'sanitize_callback' => 'hotel_booking_lite_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('hotel_booking_lite_single_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Title', 'hotel-booking-lite'),
        'section'     => 'hotel_booking_lite_page_settings',
        'description' => esc_html__('Check this box to enable title on single page.', 'hotel-booking-lite'),
    ));

    $wp_customize->add_setting('hotel_booking_lite_single_page_thumb',array(
        'sanitize_callback' => 'hotel_booking_lite_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('hotel_booking_lite_single_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Thumbnail', 'hotel-booking-lite'),
        'section'     => 'hotel_booking_lite_page_settings',
        'description' => esc_html__('Check this box to enable page thumbnail on single page.', 'hotel-booking-lite'),
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_single_page_setting', array(
        'sanitize_callback' => 'Hotel_Booking_Lite_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Hotel_Booking_Lite_Customize_Pro_Version ( $wp_customize,'pro_version_single_page_setting', array(
        'section'     => 'hotel_booking_lite_page_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'hotel-booking-lite' ),
        'description' => esc_url( HOTEL_BOOKING_LITE_URL ),
        'priority'    => 100
    )));
    
}
add_action('customize_register', 'hotel_booking_lite_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function hotel_booking_lite_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function hotel_booking_lite_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function hotel_booking_lite_customize_preview_js(){
    wp_enqueue_script('hotel-booking-lite-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'hotel_booking_lite_customize_preview_js');

/*
** Load dynamic logic for the customizer controls area.
*/
function hotel_booking_lite_panels_js() {
    wp_enqueue_style( 'hotel-booking-lite-customizer-layout-css', get_theme_file_uri( '/assets/css/customizer-layout.css' ) );
    wp_enqueue_script( 'hotel-booking-lite-customize-layout', get_theme_file_uri( '/assets/js/customize-layout.js' ), array(), '1.2', true );
}
add_action( 'customize_controls_enqueue_scripts', 'hotel_booking_lite_panels_js' );
