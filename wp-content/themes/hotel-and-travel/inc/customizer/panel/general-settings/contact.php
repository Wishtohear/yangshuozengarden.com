<?php

/**
 * Contact Page Theme Option.
 * @package Best_Shop
 */
    
function hotel_and_travel_customize_register_contact_details( $wp_customize ) {
    
    
    /** contact Page Settings */
    $wp_customize->add_section( 
        'contact_page_settings',
         array(
            'priority'    => 10,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'Contacts', 'hotel-and-travel' ),
            'description' => __( 'Customize contact section details', 'hotel-and-travel' ),
            'panel'    => 'theme_options',
        ) 
    );
    
    
	$wp_customize->add_setting(
		'address_title',
		array(
			'default'           => hotel_and_travel_default_settings('address_title'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'address_title',
		array(
			'section'           => 'contact_page_settings',
			'label'             => __( 'Address Title', 'hotel-and-travel' ),
			'type'              => 'text',
		)
	);


	$wp_customize->add_setting(
		'address',
		array(
			'default'           => hotel_and_travel_default_settings('address'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'address',
		array(
			'section'           => 'contact_page_settings',
			'label'             => __( 'Address', 'hotel-and-travel' ),
			'type'              => 'text',
		)
	);
    



	$wp_customize->add_setting(
		'mail_title',
		array(
			'default'           =>  hotel_and_travel_default_settings('mail_title'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'mail_title',
		array(
			'section'           => 'contact_page_settings',
			'label'             => __( 'Mail Title', 'hotel-and-travel' ),
			'type'              => 'text',
		)
	);


	$wp_customize->add_setting(
		'mail_description',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'mail_description',
		array(
			'section'           => 'contact_page_settings',
			'label'             => __( 'Email Address(es)', 'hotel-and-travel' ),
			'description'		=> __( 'Add multiple emails by seperating it with comma.', 'hotel-and-travel' ), 
			'type'              => 'text',
		)
	);

       
	$wp_customize->add_setting(
		'phone_title',
		array(
			'default'           =>  hotel_and_travel_default_settings('phone_title'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'phone_title',
		array(
			'section'           => 'contact_page_settings',
			'label'             => __( 'Phone Title', 'hotel-and-travel' ),
			'type'              => 'text',
		)
	);


	$wp_customize->add_setting(
		'phone_number',
		array(
			'default'           => hotel_and_travel_default_settings('phone_number'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'phone_number',
		array(
			'section'           => 'contact_page_settings',
			'label'             => __( 'Phone Number(s)', 'hotel-and-travel' ),
			'description'       => __( 'Add multiple phone number seperating with comma', 'hotel-and-travel' ),
			'type'              => 'text',
		)
	);
    

}

add_action( 'customize_register', 'hotel_and_travel_customize_register_contact_details' );


