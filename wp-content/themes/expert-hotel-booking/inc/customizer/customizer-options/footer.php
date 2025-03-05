<?php

function expert_hotel_booking_footer( $wp_customize ) {
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Panel // 
	$wp_customize->add_panel( 
		'expert_hotel_booking_footer_section', 
		array(
			'priority'      => 34,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Footer', 'expert-hotel-booking'),
		) 
	);

	// Footer Widgets // 
	$wp_customize->add_section(
        'expert_hotel_booking_footer_top',
        array(
            'title' 		=> __('Footer Widgets','expert-hotel-booking'),
			'panel'  		=> 'expert_hotel_booking_footer_section',
			'priority'      => 3,
		)
    );

    // Footer Widgets Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_hotel_booking_footer_widgets_setting' , 
			array(
			'default'      => 1,
			'sanitize_callback' => 'expert_hotel_booking_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'expert_hotel_booking_footer_widgets_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Footer Widgets', 'expert-hotel-booking' ),
			'section'     => 'expert_hotel_booking_footer_top',
			'settings'    => 'expert_hotel_booking_footer_widgets_setting',
			'type'        => 'checkbox'
		) 
	);

	// Footer Background Image Setting
	$wp_customize->add_setting('expert_hotel_booking_footer_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'expert_hotel_booking_footer_bg_image',array(
	'label' => __('Footer Background Image','expert-hotel-booking'),
	'section' => 'expert_hotel_booking_footer_top'
	)));

	// Footer Background Color Setting
	$wp_customize->add_setting('expert_hotel_booking_footer_bg_color',array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'expert_hotel_booking_footer_bg_color',array(
		'label' => esc_html__('Footer Background Color', 'expert-hotel-booking'),
		'section' => 'expert_hotel_booking_footer_top', // Adjust section if needed
		'settings' => 'expert_hotel_booking_footer_bg_color',
	)));

	$wp_customize->add_setting( 'expert_hotel_booking_upgrade_page_settings_1',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Expert_Hotel_Booking_Control_Upgrade(
        $wp_customize, 'expert_hotel_booking_upgrade_page_settings_1',
            array(
                'priority'      => 200,
                'section'       => 'expert_hotel_booking_footer_top',
                'settings'      => 'expert_hotel_booking_upgrade_page_settings_1',
                'label'         => __( 'Hotel Booking Pro comes with additional features.', 'expert-hotel-booking' ),
                'choices'       => array( __( '12+ Sections', 'expert-hotel-booking' ), __( 'One Click Demo Importer', 'expert-hotel-booking' ), __( 'Section Reordering Facility', 'expert-hotel-booking' ),__( 'Advance Typography', 'expert-hotel-booking' ),__( 'Easy Customization', 'expert-hotel-booking' ),__( '24x7 Support', 'expert-hotel-booking' ), )
            )
        )
    ); 

	// Footer Bottom // 
	$wp_customize->add_section(
        'expert_hotel_booking_footer_bottom',
        array(
            'title' 		=> __('Footer Bottom','expert-hotel-booking'),
			'panel'  		=> 'expert_hotel_booking_footer_section',
			'priority'      => 3,
		)
    );
	
	// Footer Copyright Head
	$wp_customize->add_setting(
		'footer_btm_copy_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'expert_hotel_booking_sanitize_text',
			'priority'  => 3,
		)
	);

	// Site Title Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_hotel_booking_footer_copyright_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_hotel_booking_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'expert_hotel_booking_footer_copyright_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Footer Copyright', 'expert-hotel-booking' ),
			'section'     => 'expert_hotel_booking_footer_bottom',
			'settings'    => 'expert_hotel_booking_footer_copyright_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// Footer Copyright 
	$wp_customize->add_setting(
    	'expert_hotel_booking_footer_copyright',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);

	$wp_customize->add_control( 
		'expert_hotel_booking_footer_copyright',
		array(
		    'label'   		=> __('Copyright','expert-hotel-booking'),
		    'section'		=> 'expert_hotel_booking_footer_bottom',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);
	
	$wp_customize->add_setting( 'expert_hotel_booking_copyright_alignment', array(
        'default'   => 'center',
        'sanitize_callback' => 'expert_hotel_booking_sanitize_copyright_position',
    ));

    $wp_customize->add_control( 'expert_hotel_booking_copyright_alignment', array(
        'label'    => __( 'Copyright Position', 'expert-hotel-booking' ),
        'section'  => 'expert_hotel_booking_footer_bottom',
        'settings' => 'expert_hotel_booking_copyright_alignment',
        'type'     => 'radio',
        'choices'  => array(
            'right' => __( 'Right Align', 'expert-hotel-booking' ),
            'left'  => __( 'Left Align', 'expert-hotel-booking' ),
            'center'  => __( 'Center Align', 'expert-hotel-booking' ),
        ),
    ));

	$wp_customize->add_setting( 'expert_hotel_booking_upgrade_page_settings_2',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Expert_Hotel_Booking_Control_Upgrade(
        $wp_customize, 'expert_hotel_booking_upgrade_page_settings_2',
            array(
                'priority'      => 200,
                'section'       => 'expert_hotel_booking_footer_bottom',
                'settings'      => 'expert_hotel_booking_upgrade_page_settings_2',
                'label'         => __( 'Hotel Booking Pro comes with additional features.', 'expert-hotel-booking' ),
                'choices'       => array( __( '12+ Sections', 'expert-hotel-booking' ), __( 'One Click Demo Importer', 'expert-hotel-booking' ), __( 'Section Reordering Facility', 'expert-hotel-booking' ),__( 'Advance Typography', 'expert-hotel-booking' ),__( 'Easy Customization', 'expert-hotel-booking' ),__( '24x7 Support', 'expert-hotel-booking' ), )
            )
        )
    ); 
}
add_action( 'customize_register', 'expert_hotel_booking_footer' );

// Footer selective refresh
function expert_hotel_booking_footer_partials( $wp_customize ){
	// footer_copyright
	$wp_customize->selective_refresh->add_partial( 'footer_copyright', array(
		'selector'            => '.copy-right .copyright-text',
		'settings'            => 'footer_copyright',
		'render_callback'  => 'expert_hotel_booking_footer_copyright_render_callback',
	) );
}
add_action( 'customize_register', 'expert_hotel_booking_footer_partials' );

// copyright_content
function expert_hotel_booking_footer_copyright_render_callback() {
	return get_theme_mod( 'footer_copyright' );
}