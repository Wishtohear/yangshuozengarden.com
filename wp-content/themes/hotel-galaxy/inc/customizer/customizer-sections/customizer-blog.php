<?php 
if(! function_exists('hotelgalaxy_blog_customizer')){

	add_action( 'customize_register', 'hotelgalaxy_blog_customizer', 999);

	function hotelgalaxy_blog_customizer( $wp_customize ) {	

	if ( ! $wp_customize->get_panel( 'frontpage_layout' ) ) {
		$wp_customize->add_panel( 'frontpage_layout', array(
			'priority' => 26,
			'title' => __( 'Frontpage Sections', 'hotel-galaxy'),
		) );
	}		

		if(! $wp_customize->get_section('blog_section')){

			$wp_customize->add_section('blog_section',array(
				'title' => __( 'Blog Section','hotel-galaxy' ),
				'description' => '',
				'panel'=>'frontpage_layout',
				'capability'=>'edit_theme_options',
				'priority' => 7,			
			));
		}

		//head  
		$wp_customize->add_setting(
			'blog_head'
			,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_text',
				
			)
		);

		$wp_customize->add_control(
			'blog_head',
			array(
				'type' => 'hidden',
				'label' => __('Header','hotel-galaxy'),
				'section' => 'blog_section',
				'priority'  => 1,
			)
		); 
		

	//section show or hide
		$wp_customize->add_setting(	's_h_blog_section',array(			
			'default'=> true,
			'sanitize_callback'=>'hotelgalaxy_sanitize_checkbox',	
			'capability'        => 'edit_theme_options',
		));

		$wp_customize->add_control( 's_h_blog_section', array(
			'label'        => __( 'Show/Hide Section', 'hotel-galaxy'),
			'type'=>'checkbox',
			'priority'=> 1,
			'section'    => 'blog_section',			
		) );


		//title
		$wp_customize->add_setting('blog_section_title',array(
			'default'=> '<span>Latest</span> News',	
			'sanitize_callback'=>'hotelgalaxy_sanitize_html',
			'capability'        => 'edit_theme_options',
		));
		$wp_customize->add_control( 'blog_section_title', array(
			'label'        => __( 'Title', 'hotel-galaxy'),
			'type'=>'text',
			'priority'=> 2,
			'section'    => 'blog_section',			
		));

		// add_partial
		$wp_customize->selective_refresh->add_partial(
			'blog_section_title', array(
				'selector' => '.blog-area .section-header .site-title-header',
				'container_inclusive' => true,
				'render_callback' => 'blog_section',
				'fallback_refresh' => true,
			)
		);


		//subtitle
		$wp_customize->add_setting(	'blog_section_subtitle',array(			
			'default'=> esc_html__('Excepteur sint occaecat cupidatat', 'hotel-galaxy'),
			'sanitize_callback'=>'hotelgalaxy_sanitize_html',	
			'capability'        => 'edit_theme_options',
		));

		$wp_customize->add_control( 'blog_section_subtitle', array(
			'label'        => __( 'Subtitle', 'hotel-galaxy'),
			'type'=>'text',
			'priority'=> 2,
			'section'    => 'blog_section',			
		) );

		// add_partial
		$wp_customize->selective_refresh->add_partial(
			'blog_section_subtitle', array(
				'selector' => '.blog-area .section-header p',
				'container_inclusive' => true,
				'render_callback' => 'blog_section',
				'fallback_refresh' => true,
			)
		);

		//settings  
		$wp_customize->add_setting(
			'blog_settings'
			,array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'hotelgalaxy_sanitize_text',
				
			)
		);

		$wp_customize->add_control(
			'blog_settings',
			array(
				'type' => 'hidden',
				'label' => __('Settings','hotel-galaxy'),
				'section' => 'blog_section',
				'priority'  => 2,
			)
		); 		
		

		// post per page
		$wp_customize->add_setting('blog_posts_per_page',array(			
			'default'=> 6,
			'sanitize_callback'=>'hotelgalaxy_sanitize_integer',	
			'capability'        => 'edit_theme_options',
		));
		$wp_customize->add_control( 'blog_posts_per_page', array(
			'label'        => __( 'Posts Per Page', 'hotel-galaxy' ),
			'type'=>'select',
			'section'    => 'blog_section',	
			'priority'    => 5,	
			'choices' => array(
				'-1' => esc_html__( 'All', 'hotel-galaxy'),
				'2' => esc_html__( '2', 'hotel-galaxy'),
				'3' => esc_html__( '3', 'hotel-galaxy'),
				'4' => esc_html__( '4', 'hotel-galaxy'),
				'6' => esc_html__( '6', 'hotel-galaxy'),
				'8' => esc_html__( '8', 'hotel-galaxy'),
				'9' => esc_html__( '9', 'hotel-galaxy'),
				'10' => esc_html__( '10', 'hotel-galaxy'),
				'12' => esc_html__( '12', 'hotel-galaxy'),				
			),				
		));
		
	}
}