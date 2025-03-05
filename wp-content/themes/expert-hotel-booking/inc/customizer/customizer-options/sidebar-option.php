<?php
function expert_hotel_booking_sidebar_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'expert_hotel_booking_sidebar', array(
			'priority' => 31,
			'title' => esc_html__( 'Sidebar Options', 'expert-hotel-booking' ),
		)
	);

	/*=========================================
	Sidebar Options  Section
	=========================================*/
	$wp_customize->add_section(
		'expert_hotel_booking_sidebar_settings', array(
			'title' => esc_html__( 'Sidebar Options', 'expert-hotel-booking' ),
			'priority' => 1,
			'panel' => 'expert_hotel_booking_sidebar',
		)
	);
	
	// Archive Post Settings 
	$wp_customize->add_setting(
		'archive_post_settings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'expert_hotel_booking_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'archive_post_settings',
		array(
			'type' => 'hidden',
			'label' => __('All Sidebar Setting','expert-hotel-booking'),
			'section' => 'expert_hotel_booking_sidebar_settings',
		)
	);
	

	// Archive Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_hotel_booking_archive_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_hotel_booking_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_hotel_booking_archive_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Archive Sidebar', 'expert-hotel-booking' ),
			'section'     => 'expert_hotel_booking_sidebar_settings',
			'settings'    => 'expert_hotel_booking_archive_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Index Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_hotel_booking_index_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_hotel_booking_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_hotel_booking_index_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Index Sidebar', 'expert-hotel-booking' ),
			'section'     => 'expert_hotel_booking_sidebar_settings',
			'settings'    => 'expert_hotel_booking_index_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Pages Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_hotel_booking_paged_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_hotel_booking_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_hotel_booking_paged_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Pages Sidebar', 'expert-hotel-booking' ),
			'section'     => 'expert_hotel_booking_sidebar_settings',
			'settings'    => 'expert_hotel_booking_paged_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Search Result Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_hotel_booking_search_result_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_hotel_booking_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_hotel_booking_search_result_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Search Result Sidebar', 'expert-hotel-booking' ),
			'section'     => 'expert_hotel_booking_sidebar_settings',
			'settings'    => 'expert_hotel_booking_search_result_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Single Post Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_hotel_booking_single_post_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_hotel_booking_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_hotel_booking_single_post_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Single Post Sidebar', 'expert-hotel-booking' ),
			'section'     => 'expert_hotel_booking_sidebar_settings',
			'settings'    => 'expert_hotel_booking_single_post_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Sidebar Page Sidebar Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_hotel_booking_single_page_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_hotel_booking_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_hotel_booking_single_page_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Page Width Sidebar', 'expert-hotel-booking' ),
			'section'     => 'expert_hotel_booking_sidebar_settings',
			'settings'    => 'expert_hotel_booking_single_page_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting( 'expert_hotel_booking_sidebar_position', array(
        'default'   => 'right',
        'sanitize_callback' => 'expert_hotel_booking_sanitize_sidebar_position',
    ));

    $wp_customize->add_control( 'expert_hotel_booking_sidebar_position', array(
        'label'    => __( 'Sidebar Position', 'expert-hotel-booking' ),
        'section'  => 'expert_hotel_booking_sidebar_settings',
        'settings' => 'expert_hotel_booking_sidebar_position',
        'type'     => 'radio',
        'choices'  => array(
            'right' => __( 'Right Sidebar', 'expert-hotel-booking' ),
            'left'  => __( 'Left Sidebar', 'expert-hotel-booking' ),
        ),
    ));

	$wp_customize->add_setting( 'expert_hotel_booking_upgrade_page_settings_15',
    array(
        'sanitize_callback' => 'sanitize_text_field'
    )
    );
    $wp_customize->add_control( new Expert_Hotel_Booking_Control_Upgrade(
        $wp_customize, 'expert_hotel_booking_upgrade_page_settings_15',
            array(
                'priority'      => 200,
                'section'       => 'expert_hotel_booking_sidebar_settings',
                'settings'      => 'expert_hotel_booking_upgrade_page_settings_15',
                'label'         => __( 'Hotel Booking Pro comes with additional features.', 'expert-hotel-booking' ),
                'choices'       => array( __( '12+ Sections', 'expert-hotel-booking' ), __( 'One Click Demo Importer', 'expert-hotel-booking' ), __( 'Section Reordering Facility', 'expert-hotel-booking' ),__( 'Advance Typography', 'expert-hotel-booking' ),__( 'Easy Customization', 'expert-hotel-booking' ),__( '24x7 Support', 'expert-hotel-booking' ), )
            )
        )
    );
}

add_action( 'customize_register', 'expert_hotel_booking_sidebar_setting' );