<?php
function expert_hotel_booking_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

	// Site Title Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_hotel_booking_site_title_setting' , 
			array(
			'default' => '',
			'sanitize_callback' => 'expert_hotel_booking_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'expert_hotel_booking_site_title_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Site Title', 'expert-hotel-booking' ),
			'section'     => 'title_tagline',
			'settings'    => 'expert_hotel_booking_site_title_setting',
			'type'        => 'checkbox'
		) 
	);

	// Tagline Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_hotel_booking_tagline_setting' , 
			array(
			'default' => '',
			'sanitize_callback' => 'expert_hotel_booking_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'expert_hotel_booking_tagline_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Tagline', 'expert-hotel-booking' ),
			'section'     => 'title_tagline',
			'settings'    => 'expert_hotel_booking_tagline_setting',
			'type'        => 'checkbox'
		) 
	);

	// Add the setting for logo width
	$wp_customize->add_setting(
	    'expert_hotel_booking_logo_width',
	    array(
	        'sanitize_callback' => 'expert_hotel_booking_sanitize_logo_width',
	        'priority'          => 2,
	    )
	);

	// Add control for logo width
	$wp_customize->add_control( 
	    'expert_hotel_booking_logo_width',
	    array(
	        'label'     => __('Logo Width', 'expert-hotel-booking'),
	        'section'   => 'title_tagline',
	        'type'      => 'number',
	        'input_attrs' => array(
	            'min'   => 1,
	            'max'   => 150,
	            'step'  => 1,
	        ),
	        'transport' => $selective_refresh,
	    )  
	);

		$wp_customize->add_setting( 'expert_hotel_booking_upgrade_page_settings_11',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Expert_Hotel_Booking_Control_Upgrade(
        $wp_customize, 'expert_hotel_booking_upgrade_page_settings_11',
            array(
                'priority'      => 200,
                'section'       => 'title_tagline',
                'settings'      => 'expert_hotel_booking_upgrade_page_settings_11',
                'label'         => __( 'Hotel Booking Pro comes with additional features.', 'expert-hotel-booking' ),
                'choices'       => array( __( '12+ Sections', 'expert-hotel-booking' ), __( 'One Click Demo Importer', 'expert-hotel-booking' ), __( 'Section Reordering Facility', 'expert-hotel-booking' ),__( 'Advance Typography', 'expert-hotel-booking' ),__( 'Easy Customization', 'expert-hotel-booking' ),__( '24x7 Support', 'expert-hotel-booking' ), )
            )
        )
    );

	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'expert-hotel-booking'),
		) 
	);

	/*=========================================
	Expert Hotel Booking Site Identity
	=========================================*/
	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','expert-hotel-booking'),
			'panel'  		=> 'header_section',
		)
    );    

	/*=========================================
	Top header
	=========================================*/
	$wp_customize->add_section(
        'top_header',
        array(
        	'priority'      => 2,
            'title' 		=> __('Header','expert-hotel-booking'),
			'panel'  		=> 'header_section',
		)
    );

    // Header Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_hotel_booking_header_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_hotel_booking_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_hotel_booking_header_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'expert-hotel-booking' ),
			'section'     => 'top_header',
			'settings'    => 'expert_hotel_booking_header_setting',
			'type'        => 'checkbox'
		) 
	);

   	$wp_customize->add_setting(
    	'expert_hotel_booking_topheader_email',
    	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_email',
		)
	);	
	$wp_customize->add_control( 
		'expert_hotel_booking_topheader_email',
		array(
		    'label'   		=> __('Email Address','expert-hotel-booking'),
		    'section'		=> 'top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);	

   	$wp_customize->add_setting(
    	'expert_hotel_booking_topheader_phoneno',
    	array(
			'default' => '',
			'sanitize_callback' => 'expert_hotel_booking_sanitize_phone_number',
		)
	);	
	$wp_customize->add_control( 
		'expert_hotel_booking_topheader_phoneno',
		array(
		    'label'   		=> __('Phone Number','expert-hotel-booking'),
		    'section'		=> 'top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);	

   	$wp_customize->add_setting(
    	'expert_hotel_booking_topheader_offer_text',
    	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);	
	$wp_customize->add_control( 
		'expert_hotel_booking_topheader_offer_text',
		array(
		    'label'   		=> __('Offer Text','expert-hotel-booking'),
		    'section'		=> 'top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting( 'expert_hotel_booking_upgrade_page_settings_12',
    array(
        'sanitize_callback' => 'sanitize_text_field'
    )
    );
    $wp_customize->add_control( new Expert_Hotel_Booking_Control_Upgrade(
        $wp_customize, 'expert_hotel_booking_upgrade_page_settings_12',
            array(
                'priority'      => 200,
                'section'       => 'top_header',
                'settings'      => 'expert_hotel_booking_upgrade_page_settings_12',
                'label'         => __( 'Hotel Booking Pro comes with additional features.', 'expert-hotel-booking' ),
                'choices'       => array( __( '12+ Sections', 'expert-hotel-booking' ), __( 'One Click Demo Importer', 'expert-hotel-booking' ), __( 'Section Reordering Facility', 'expert-hotel-booking' ),__( 'Advance Typography', 'expert-hotel-booking' ),__( 'Easy Customization', 'expert-hotel-booking' ),__( '24x7 Support', 'expert-hotel-booking' ), )
            )
        )
    );

	$wp_customize->register_panel_type( 'expert_hotel_booking_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'expert_hotel_booking_WP_Customize_Section' );

}
add_action( 'customize_register', 'expert_hotel_booking_header_settings' );


if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class expert_hotel_booking_WP_Customize_Panel extends WP_Customize_Panel {
	   public $panel;
	   public $type = 'expert_hotel_booking_panel';
	   public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class expert_hotel_booking_WP_Customize_Section extends WP_Customize_Section {
	   public $section;
	   public $type = 'expert_hotel_booking_section';
	   public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}