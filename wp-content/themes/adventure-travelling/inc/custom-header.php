<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Adventure Travelling
 * @subpackage adventure_travelling
 */

function adventure_travelling_custom_header_setup() {
    add_theme_support( 'custom-header', apply_filters( 'adventure_travelling_custom_header_args', array(
        'default-text-color' => 'fff',
        'header-text'        => false,
        'width'              => 1600,
        'height'             => 350,
        'flex-width'         => true,
        'flex-height'        => true,
        'wp-head-callback'   => 'adventure_travelling_header_style',
        'default-image'      => get_template_directory_uri() . '/assets/images/sliderimage.png',
    ) ) );

    register_default_headers( array(
        'default-image' => array(
            'url'           => get_template_directory_uri() . '/assets/images/sliderimage.png',
            'thumbnail_url' => get_template_directory_uri() . '/assets/images/sliderimage.png',
            'description'   => __( 'Default Header Image', 'adventure-travelling' ),
        ),
    ) );
}
add_action( 'after_setup_theme', 'adventure_travelling_custom_header_setup' );

/**
 * Styles the header image based on Customizer settings.
 */
function adventure_travelling_header_style() {
    $adventure_travelling_header_image = get_header_image() ? get_header_image() : get_template_directory_uri() . '/assets/images/sliderimage.png';

    $adventure_travelling_height     = get_theme_mod( 'adventure_travelling_header_image_height', 350 );
    $adventure_travelling_position   = get_theme_mod( 'adventure_travelling_header_background_position', 'center' );
    $adventure_travelling_attachment = get_theme_mod( 'adventure_travelling_header_background_attachment', 1 ) ? 'fixed' : 'scroll';

    $adventure_travelling_custom_css = "
        .header-img, .single-page-img, .external-div .box-image img, .external-div {
            background-image: url('" . esc_url( $adventure_travelling_header_image ) . "');
            background-size: cover;
            height: " . esc_attr( $adventure_travelling_height ) . "px;
            background-position: " . esc_attr( $adventure_travelling_position ) . ";
            background-attachment: " . esc_attr( $adventure_travelling_attachment ) . ";
        }

        @media (max-width: 1000px) {
            .header-img, .single-page-img, .external-div .box-image img,.external-div {
                height: 200px;
            }
        }
    ";

    wp_add_inline_style( 'adventure-travelling-style', $adventure_travelling_custom_css );
}
add_action( 'wp_enqueue_scripts', 'adventure_travelling_header_style' );

/**
 * Enqueue the main theme stylesheet.
 */
function adventure_travelling_enqueue_styles() {
    wp_enqueue_style( 'adventure-travelling-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'adventure_travelling_enqueue_styles' );