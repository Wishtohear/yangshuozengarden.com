<?php
/**
 * Social Settings
 *
 * @package Best_Shop
 */
if( ! function_exists( 'hotel_and_travel_customize_register_social_links' ) ) :

function hotel_and_travel_customize_register_social_links( $wp_customize ) {
    
    /* NOTE */
     if (!function_exists('hotel_and_travel_pro_textdomain')){
          $wp_customize->add_setting( 
              'header_lbl_2', 
              array(
                  'default'           => '',
                  'sanitize_callback' => 'sanitize_text_field'
              ) 
          );
          $wp_customize->add_control( new hotel_and_travel_Notice_Control( $wp_customize, 'header_lbl_2', array(
              'label'	    => esc_html__( 'More options in Pro version: 1. Edit top bar background/Text color ', 'hotel-and-travel' ),
              'section' => 'header_top',
              'settings' => 'header_lbl_2',
          )));
     }
    
    
    /** Enable top bar */    
    $wp_customize->add_setting( 
        'enable_top_bar', 
        array(
            'default'           => hotel_and_travel_default_settings('enable_top_bar'),
            'sanitize_callback' => 'hotel_and_travel_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new hotel_and_travel_Toggle_Control( 
			$wp_customize,
			'enable_top_bar',
			array(
				'section'     => 'header_top',
				'label'	      => esc_html__( 'Enable Top Bar', 'hotel-and-travel' ),
                'description' => esc_html__( 'Enable to show top bar above header.', 'hotel-and-travel' ),
			)
		)
	);
    
    
    // top bar bgcolor
    $wp_customize->add_setting( 
        'topbar_bg_color', 
        array(
            'default'           => hotel_and_travel_default_settings('topbar_bg_color'),
            'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );
    

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'topbar_bg_color', array(
        'label'	    => esc_html__( 'Top bar Background Color', 'hotel-and-travel' ),
        'section' => 'header_top',
        'settings' => 'topbar_bg_color',
        'active_callback'   => 'hotel_and_travel_pro',
 
    )));
    
    // top bar text color
    $wp_customize->add_setting( 
        'topbar_text_color', 
        array(
            'default'           => hotel_and_travel_default_settings('topbar_text_color'),
            'sanitize_callback' => 'sanitize_hex_color'
        ) 
    );
    

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'topbar_text_color', array(
        'label'	    => esc_html__( 'Top bar Text Color', 'hotel-and-travel' ),
        'section' => 'header_top',
        'settings' => 'topbar_text_color',
        'active_callback'   => 'hotel_and_travel_pro',
 
    )));


    /*--------------------------
     * SOCIAL LINKS SECTION
     --------------------------*/
    
    $wp_customize->add_section(
        'header_top',
        array(
            'panel'     => 'theme_options',
            'title'     => esc_html__( 'Top Bar/Social', 'hotel-and-travel' ),
            'priority'  => 10,
        )
    );
    

    /** 
     * Social Share Repeater 
     * */
    $wp_customize->add_setting( 
        new hotel_and_travel_Repeater_Setting( 
            $wp_customize, 
            'social_links', 
            array(
                'default' => hotel_and_travel_default_settings('social_links'),
                'sanitize_callback' => array( 'hotel_and_travel_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new hotel_and_travel_Control_Repeater(
			$wp_customize,
			'social_links',
			array(
				'section' => 'header_top',
				'label'   => esc_html__( 'Social Links', 'hotel-and-travel' ),
				'fields'  => array(
                    'hotel_and_travel_icon' => array(
                        'type'        => 'select',
                        'label'       => esc_html__( 'Social Media', 'hotel-and-travel' ),
                        'choices'     => hotel_and_travel_get_svg_icons()
                    ),
                    'hotel_and_travel_link' => array(
                        'type'        => 'url',
                        'label'       => esc_html__( 'Link', 'hotel-and-travel' ),
                        'description' => esc_html__( 'Example: https://facebook.com', 'hotel-and-travel' ),
                    ),
                    'hotel_and_travel_checkbox' => array(
                        'type'        => 'checkbox',
                        'label'       => esc_html__( 'Open link in new tab', 'hotel-and-travel' ),
                    )
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => esc_html__( 'links', 'hotel-and-travel' ),
                    'field' => 'link'
                )                        
			)
		)
	);
    
        
    $wp_customize->selective_refresh->add_partial( 'social_links', array(
	'selector' => '#masthead .social-links',
    ) );

    /*--------------------------
     * SOCIAL LINKS SECTION END
     --------------------------*/
    
    
    
    // Left Content
    $wp_customize->add_setting( 'top_bar_left_content', array(
          'capability' => 'edit_theme_options',
          'default' => hotel_and_travel_default_settings('top_bar_left_content'),
          'sanitize_callback' => 'hotel_and_travel_sanitize_radio',
    ) );

    $wp_customize->add_control( 'top_bar_left_content', array(
          'type' => 'radio',
          'section' => 'header_top', // Add a default or your own section
          'label' => esc_html__( 'Top Bar Left' ,'hotel-and-travel' ),
          'description' => esc_html__( 'Select Top Bar Left Content, You can edit menus from customizer menus section or dashboard. ', 'hotel-and-travel' ),
          'choices' => array(
              'none' => esc_html__( 'None' , 'hotel-and-travel'),
              'text' => esc_html__( 'Text' , 'hotel-and-travel'),
              'menu' => esc_html__( 'Menu (edit menus from customizer menus section )' , 'hotel-and-travel'),
              'contacts' => esc_html__( 'Contacts (edit contacts from contacts section )' , 'hotel-and-travel'),            
          ),
        
          'active_callback' => 'hotel_and_travel_is_top_bar_enabled',   
        
    ) );
    
    $wp_customize->selective_refresh->add_partial( 'top_bar_left_content', array(
	'selector' => '#masthead .left-menu',
    ) );
    
    //check whether top bar enabled
    function hotel_and_travel_is_top_bar_enabled( $control ) {
        return ($control->manager->get_setting( 'enable_top_bar' )->value() );
    }     
    
    //check whether the text option active
    function hotel_and_travel_is_top_bar_text_enabled( $control ) {
        return ($control->manager->get_setting( 'top_bar_left_content' )->value() == 'text' && $control->manager->get_setting( 'enable_top_bar' )->value() );
    }    
    
    $wp_customize->add_setting( 'top_bar_left_text', array(
          'capability' => 'edit_theme_options',
          'default' => hotel_and_travel_default_settings('top_bar_left_text'),
          'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'top_bar_left_text', array(
        'type' => 'text',
        'section' => 'header_top', // Add a default or your own section
        'label' => __( 'Top Bar Left Text' ,'hotel-and-travel'),
        'description' => __( 'Add text to display on top bar left.' ,'hotel-and-travel'),
        'active_callback' => 'hotel_and_travel_is_top_bar_text_enabled',
    ) );
    
    
    
    
    /* 
     * Top bar right content 
     */
    
    $wp_customize->add_setting( 'top_bar_right_content', array(
          'capability' => 'edit_theme_options',
          'default' => hotel_and_travel_default_settings('top_bar_right_content'),
          'sanitize_callback' => 'hotel_and_travel_sanitize_radio',
    ) );

    $wp_customize->add_control( 'top_bar_right_content', array(
          'type' => 'radio',
          'section' => 'header_top', // Add a default or your own section
          'label' => __( 'Top Bar Right' ,'hotel-and-travel' ),
          'description' => __( 'Select Top Bar Right Content. You can edit menus from customizer menus section or dashboard.' ,'hotel-and-travel'),
          'choices' => array(
              'none' => __( 'None','hotel-and-travel' ),
              'menu' => __( 'Menu (edit menus from customizer menus section)' ,'hotel-and-travel'),
              'social' => __( 'Social (add / remove social links above)' ,'hotel-and-travel'),
              'menu_social' => __( 'Menu and Social' ,'hotel-and-travel' ),
          ),
        
          'active_callback' => 'hotel_and_travel_is_top_bar_enabled',
    ) ); 

    
}
endif;
add_action( 'customize_register', 'hotel_and_travel_customize_register_social_links' );
