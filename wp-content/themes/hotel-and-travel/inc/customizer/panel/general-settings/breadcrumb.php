<?php
/**
 * SEO Settings
 *
 * @package Best_Shop
 */
if( ! function_exists( 'hotel_and_travel_customize_register_general_seo' ) ) :

function hotel_and_travel_customize_register_general_seo( $wp_customize ) {
    
    /* NOTE */
     if (!function_exists('hotel_and_travel_pro_textdomain')){
          $wp_customize->add_setting( 
              'header_lbl_3', 
              array(
                  'default'           => '',
                  'sanitize_callback' => 'sanitize_text_field'
              ) 
          );
          $wp_customize->add_control( new hotel_and_travel_Notice_Control( $wp_customize, 'header_lbl_3', array(
              'label'	    => esc_html__( 'More options in Pro version: 1. Edit breadcrumb home text ', 'hotel-and-travel' ),
              'section' => 'seo_settings',
              'settings' => 'header_lbl_3',
          )));
     }
    
    
    /** SEO Settings */
    $wp_customize->add_section(
        'seo_settings',
        array(
            'title'    => esc_html__( 'Breadcrumb Settings', 'hotel-and-travel' ),
            'priority' => 40,
            'panel'    => 'theme_options',
        )
    );
    
    $wp_customize->add_setting( 
        'enable_breadcrumb', 
        array(
            'default'           => hotel_and_travel_default_settings('enable_breadcrumb'),
            'sanitize_callback' => 'hotel_and_travel_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new hotel_and_travel_Toggle_Control( 
			$wp_customize,
			'enable_breadcrumb',
			array(
				'section'     => 'seo_settings',
				'label'	      => esc_html__( 'Enable Breadcrumb', 'hotel-and-travel' ),
                'description' => esc_html__( 'Show breadcrumb in inner pages.', 'hotel-and-travel' ),
			)
		)
	);
    
    /** Breadcrumb Home Text */
    $wp_customize->add_setting(
        'home_text',
        array(
            'default'           => hotel_and_travel_default_settings('home_text'),
            'sanitize_callback' => 'sanitize_text_field' 
        )
    );
    
    $wp_customize->add_control(
        'home_text',
        array(
            'type'    => 'text',
            'section' => 'seo_settings',
            'label'   => esc_html__( 'Breadcrumb Home Text', 'hotel-and-travel' ),
            'active_callback'   => 'hotel_and_travel_pro',
        )
    );  
    /** SEO Settings Ends */
    
}
endif;
add_action( 'customize_register', 'hotel_and_travel_customize_register_general_seo' );