<?php 
if(! function_exists('hotelgalaxy_footer_customizer')){

	add_action( 'customize_register', 'hotelgalaxy_footer_customizer');

	function hotelgalaxy_footer_customizer( $wp_customize ) {

		$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';		

		if( ! $wp_customize->get_panel( 'footer_section' ) ) {
			$wp_customize->add_panel( 'footer_section', array(
				'priority' => 35,
				'title' => __( 'Footer', 'hotel-galaxy'),
			) );
		}


		//*==================== Footer Background ==================================*//

		if(!$wp_customize->get_section('footer_bg_section')){

			$wp_customize->add_section('footer_bg_section',array(
				'title' => __( 'Footer Background','hotel-galaxy'),
				'description' => '',
				'panel'=>'footer_section',
				'capability'=>'edit_theme_options',
				'priority' => 1,			
			));
		}	

			//head 
		$wp_customize->add_setting(
			'footer_bg_head'
			,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_text',
				'priority'  => 1,
			)
		);

		$wp_customize->add_control(
			'footer_bg_head',
			array(
				'type' => 'hidden',
				'label' => __('Background','hotel-galaxy'),
				'section' => 'footer_bg_section',
			)
		); 


			// Background Image // 
		$wp_customize->add_setting( 
			'footer_bg_img' , 
			array(
				'default' 			=> esc_url( get_template_directory_uri().'/assets/images/footer-bg.jpg' ),
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_url',	
				'priority' => 10,
			) 
		);

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'footer_bg_img' ,
			array(
				'label'          => esc_html__( 'Background Image', 'hotel-galaxy'),
				'section'        => 'footer_bg_section',
			) 
		));


			//head 
		$wp_customize->add_setting(
			'footer_bgcolor_head'
			,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_text',
				'priority'  => 1,
			)
		);

		$wp_customize->add_control(
			'footer_bgcolor_head',
			array(
				'type' => 'hidden',
				'label' => __('Color Setting','hotel-galaxy'),
				'section' => 'footer_bg_section',
			)
		); 

			//bg color
		$wp_customize->add_setting('footer_bg_color',array(
			'default' => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color',
			'priority'  => 10,
		));

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'footer_bg_color', 
			array(
				'label'      => __( 'Background Color', 'hotel-galaxy'),
				'section'    => 'footer_bg_section',
			) 
		) 
	);

			//*================== Footer Copyright ===================================*//		
			
			if(!$wp_customize->get_section('footer_copyright')){
				$wp_customize->add_section('footer_copyright',array(
					'title' => __( 'Footer Copyright','hotel-galaxy'),					
					'panel'=>'footer_section',
					'capability'=>'edit_theme_options',
					'priority' => 2,			
				));
			}	


			//head 
			$wp_customize->add_setting(
				'footer_copyright_head'
				,array(
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'hotelgalaxy_sanitize_text',
					
				)
			);

			$wp_customize->add_control(
				'footer_copyright_head',
				array(
					'type' => 'hidden',
					'label' => __('Head','hotel-galaxy'),
					'section' => 'footer_copyright',
					'priority'  => 1,
				)
			); 


			//status
			$wp_customize->add_setting(	's_h_copyright',array(			
				'default'=> true,			
				'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
			));

			$wp_customize->add_control( 's_h_copyright', array(
				'label'        => __( 'Show/Hide Section', 'hotel-galaxy' ),
				'type'=>'checkbox',
				'section'    => 'footer_copyright',	
				'priority'    => 1,					
			));


			//head 
			$wp_customize->add_setting(
				'footer_copyright_content'
				,array(
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'hotelgalaxy_sanitize_text',
					
				)
			);

			$wp_customize->add_control(
				'footer_copyright_content',
				array(
					'type' => 'hidden',
					'label' => __('Content','hotel-galaxy'),
					'section' => 'footer_copyright',
					'priority'  => 1,
				)
			); 


			// Copyright 
			$footer_copyright = esc_html__('Copyright &copy; [current_year] [site_title] | Powered by [theme_author]', 'hotel-galaxy' );
			$wp_customize->add_setting(
				'footer_copyright',
				array(
					'default' => $footer_copyright,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'wp_kses_post',
					'priority'      => 1,
				)
			);	

			$wp_customize->add_control( 
				'footer_copyright',
				array(
					'label'   		=> __('Copytight','hotel-galaxy'),
					'section'		=> 'footer_copyright',
					'type' 			=> 'textarea',
					'transport'         => $wp_customize->selective_refresh,
				)  
			);

			$wp_customize->selective_refresh->add_partial( 'footer_copyright', array(
				'selector' => '.copyright-bar .widget-left',
				'render_callback' => 'footer_bottom_section',
			) );			
			
		}
	}