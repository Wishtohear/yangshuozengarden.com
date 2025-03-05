<?php

/**
 * Google Fonts Option.
 * @package Best_Shop
 */
    
function hotel_and_travel_customize_register_font( $wp_customize ) {
    

    
    /** contact Page Settings */
    $wp_customize->add_section( 
        'google_font_settings',
         array(
            'priority'    => 47,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'Fonts', 'hotel-and-travel' ),
            'description' => __( 'Customize contact section details.', 'hotel-and-travel' ),
            'panel'    => 'theme_options',
        ) 
    );
    
    
	$wp_customize->add_setting(
		'heading_font',
		array(
			'default'           => hotel_and_travel_default_settings('heading_font'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'heading_font',
		array(
			'section'           => 'google_font_settings',
			'label'             => __( 'Heading Font Family:', 'hotel-and-travel' ),
			'type'              => 'text',
            'active_callback'   => 'hotel_and_travel_pro',
		)
	);

    //2
	$wp_customize->add_setting(
		'body_font',
		array(
			'default'           => hotel_and_travel_default_settings('body_font'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'body_font',
		array(
			'section'           => 'google_font_settings',
			'label'             => __( 'Body Font Family:', 'hotel-and-travel' ),
			'type'              => 'text',
		)
	);
    
    
    //3
	$wp_customize->add_setting(
		'body_font_size',
		array(
			'default'           => hotel_and_travel_default_settings('body_font_size'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'body_font_size',
		array(
			'section'           => 'google_font_settings',
			'label'             => __( 'Body Font Size:', 'hotel-and-travel' ),
			'type'              => 'number',
		)
	);
    
    /* NOTE */
     if (!function_exists('hotel_and_travel_pro_textdomain')){
          $wp_customize->add_setting( 
              'header_lbl_4', 
              array(
                  'default'           => '',
                  'sanitize_callback' => 'sanitize_text_field'
              ) 
          );
          $wp_customize->add_control( new hotel_and_travel_Notice_Control( $wp_customize, 'header_lbl_4', array(
              'label'	    => esc_html__( 'More options in Pro version: 1. Change header fonts ', 'hotel-and-travel' ),
              'section' => 'google_font_settings',
              'settings' => 'header_lbl_4',
          )));
     }



}

add_action( 'customize_register', 'hotel_and_travel_customize_register_font' );


