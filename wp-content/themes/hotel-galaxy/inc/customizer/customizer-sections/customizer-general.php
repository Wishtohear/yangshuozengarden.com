<?php 
if(! function_exists('hotelgalaxy_general_customizer')){

	add_action( 'customize_register', 'hotelgalaxy_general_customizer', 999);

	function hotelgalaxy_general_customizer( $wp_customize ) {		

		if ( ! $wp_customize->get_panel( 'general_section' ) ) {
			$wp_customize->add_panel( 'general_section', array(
				'priority' => 20,
				'title' => __( 'General', 'hotel-galaxy'),
			) );
		}

		/*=================	Breadcrumb =================================*/ 

		if ( ! $wp_customize->get_section( 'breadcrumb_section' ) ) {

			$wp_customize->add_section('breadcrumb_section',array(
				'title' => __( 'Breadcrumb Section','hotel-galaxy'),
				'panel'=>'general_section',
				'capability'=>'edit_theme_options',
				'priority' => 2,			
			));
		}	

		//Breadcrumb  
		$wp_customize->add_setting(
			'breadcrumb_head'
			,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_text',

			)
		);

		$wp_customize->add_control(
			'breadcrumb_head',
			array(
				'type' => 'hidden',
				'label' => __('Setting','hotel-galaxy'),
				'section' => 'breadcrumb_section',
				'priority'  => 1,
			)
		); 

		//section status
		$wp_customize->add_setting(	's_h_breadcrumb',array(					
			'default'=> true,	
			'capability'        => 'edit_theme_options',
			'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
		));
		$wp_customize->add_control( 's_h_breadcrumb', array(
			'label'        => __( 'Show/Hide Section', 'hotel-galaxy' ),
			'type'=>'checkbox',
			'section'    => 'breadcrumb_section',	
			'priority'    => 1,						
		) );				


		//Breadcrumb  
		$wp_customize->add_setting(
			'breadcrumb_bg_head'
			,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_text',

			)
		);

		$wp_customize->add_control(
			'breadcrumb_bg_head',
			array(
				'type' => 'hidden',
				'label' => __('Background Image','hotel-galaxy'),
				'section' => 'breadcrumb_section',
				'priority'  => 1,
			)
		); 

		// breadcrumb image
		$wp_customize->add_setting('breadcrumb_bg_image',array(					
			'default'=> esc_url(get_template_directory_uri().'/assets/images/breadcrumb-bg.jpg'),	
			'sanitize_callback'=>'esc_url_raw',					
		));

		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'breadcrumb_bg_image',array(
			'label'=>__('Breadcrum Image','hotel-galaxy'),
			'section'=>'breadcrumb_section',
			'priority'  => 1,					
		)));			

	}
}