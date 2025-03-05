<?php 
if(! function_exists('hotelgalaxy_header_customizer')){

	add_action( 'customize_register', 'hotelgalaxy_header_customizer', 999);

	function hotelgalaxy_header_customizer( $wp_customize ) {		

		$wp_customize->add_section(
			'title_tagline',
			array(
				'priority'      => 1,
				'title' 		=> __('Site Identity','hotel-galaxy'),
				'panel'  		=> 'header_section',
			)
		);
		

		if ( ! $wp_customize->get_panel( 'header_section' ) ) {
			$wp_customize->add_panel( 'header_section', array(
				'priority' => 20,
				'title' => __( 'Header', 'hotel-galaxy'),
			) );
		}		

		//*================= sticky navbar ===========================*//		

		if ( ! $wp_customize->get_section( 'sticky_section' ) ) {

			$wp_customize->add_section('sticky_section',array(
				'title' => __( 'Sticky Header','hotel-galaxy'),
				'panel'=>'header_section',
				'capability'=>'edit_theme_options',
				'priority' => 1,			
			));
		}	

		//sticky  
		$wp_customize->add_setting(
			'sticky_head'
			,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_text',

			)
		);

		$wp_customize->add_control(
			'sticky_head',
			array(
				'type' => 'hidden',
				'label' => __('Sticky Header','hotel-galaxy'),
				'section' => 'sticky_section',
				'priority'  => 1,
			)
		); 

		// 

		$wp_customize->add_setting('sticky_menu',array(
			'default' => false,			
			'sanitize_callback' => 'hotelgalaxy_sanitize_checkbox'
		));

		$wp_customize->add_control('sticky_menu',array(
			'type' => 'checkbox',
			'label' => esc_html__( 'Sticky Navigation', 'hotel-galaxy'),
			'section' => 'sticky_section',				
			'priority' => 1
		));	
		

		/*===================== Header navigation ================================*/

		// nav primary
		$wp_customize->add_section('header_navigation',array(
			'title' => __( 'Header Navigation','hotel-galaxy'),
			'panel'=>'header_section',
			'capability'=>'edit_theme_options',
			'priority' => 4,			
		));

		//Navigation  
		$wp_customize->add_setting(
			'navigation_head'
			,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_text',
				
			)
		);

		$wp_customize->add_control(
			'navigation_head',
			array(
				'type' => 'hidden',
				'label' => __('Search','hotel-galaxy'),
				'section' => 'header_navigation',
				'priority'  => 1,
			)
		); 

		//menubar search
		$wp_customize->add_setting(	's_h_search_icon',array(			
			'default'=> true,
			'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
			'capability'        => 'edit_theme_options',
		));

		$wp_customize->add_control( 's_h_search_icon', array(
			'label'        => __( 'Show/Hide Icon', 'hotel-galaxy'),
			'type'=>'checkbox',
			'section'    => 'header_navigation',
			'priority' => 1,
			
		));


		//cart  
		$wp_customize->add_setting(
			'cart_head'
			,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_text',
				
			)
		);

		$wp_customize->add_control(
			'cart_head',
			array(
				'type' => 'hidden',
				'label' => __('Cart','hotel-galaxy'),
				'section' => 'header_navigation',
				'priority'  => 1,
			)
		); 

		//cart
		$wp_customize->add_setting(	's_h_header_cart',array(			
			'default'=> false,
			'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
			'capability'        => 'edit_theme_options',
		));

		$wp_customize->add_control( 's_h_header_cart', array(
			'label'        => __( 'Show/Hide Icon', 'hotel-galaxy'),
			'type'=>'checkbox',
			'section'    => 'header_navigation',
			'priority' => 1,
			
		));
		
		// menu search icon
		$wp_customize->selective_refresh->add_partial( 's_h_search_icon', array(
			'selector' => 'a.header_search_btn',
			'render_callback' => 'header_navigation',
		) );
	}
}