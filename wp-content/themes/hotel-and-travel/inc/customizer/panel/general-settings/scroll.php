<?php
/**
 * SEO Settings
 *
 * @package Best_Shop
 */
if( ! function_exists( 'hotel_and_travel_customize_register_scroll' ) ) :

function hotel_and_travel_customize_register_scroll( $wp_customize ) {
    
    /* NOTE */
     if (!function_exists('hotel_and_travel_pro_textdomain')){
          $wp_customize->add_setting( 
              'header_lbl_5', 
              array(
                  'default'           => '',
                  'sanitize_callback' => 'sanitize_text_field'
              ) 
          );
          $wp_customize->add_control( new hotel_and_travel_Notice_Control( $wp_customize, 'header_lbl_5', array(
              'label'	    => esc_html__( 'More options in Pro version: 1. Sticky menu 2. Pop-up add to cart button', 'hotel-and-travel' ),
              'section' => 'scroll_settings',
              'settings' => 'header_lbl_5',
          )));
     }
    
    /** Scroll Settings */
    $wp_customize->add_section(
        'scroll_settings',
        array(
            'title'    => esc_html__( 'Scroll', 'hotel-and-travel' ),
            'priority' => 60,
            'panel'    => 'theme_options',
        )
    );
    
    $wp_customize->add_setting( 
        'enable_sticky_menu', 
        array(
            'default'           => hotel_and_travel_default_settings('enable_sticky_menu'),
            'sanitize_callback' => 'hotel_and_travel_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new hotel_and_travel_Toggle_Control( 
			$wp_customize,
			'enable_sticky_menu',
			array(
				'section'     => 'scroll_settings',
				'label'	      => esc_html__( 'Enable Sticky Menu', 'hotel-and-travel' ),
                'description' => esc_html__( 'Show Sticky Meny.', 'hotel-and-travel' ),
                'active_callback'   => 'hotel_and_travel_pro',
			)
		)
	);
    
    // Back to top
    $wp_customize->add_setting( 
        'enable_back_to_top', 
        array(
            'default'           => hotel_and_travel_default_settings('enable_back_to_top'),
            'sanitize_callback' => 'hotel_and_travel_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new hotel_and_travel_Toggle_Control( 
			$wp_customize,
			'enable_back_to_top',
			array(
				'section'     => 'scroll_settings',
				'label'	      => esc_html__( 'Enable Back to Top Button', 'hotel-and-travel' ),
                'description' => esc_html__( 'Display back to top button while scroll to bottom.', 'hotel-and-travel' ),
			)
		)
	);
    
    // Popup Cart
    $wp_customize->add_setting( 
        'enable_popup_cart', 
        array(
            'default'           => hotel_and_travel_default_settings('enable_popup_cart'),
            'sanitize_callback' => 'hotel_and_travel_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new hotel_and_travel_Toggle_Control( 
			$wp_customize,
			'enable_popup_cart',
			array(
				'section'     => 'scroll_settings',
				'label'	      => esc_html__( 'Enable Popup Add to cart', 'hotel-and-travel' ),
                'description' => esc_html__( 'Display add to cart button at the end of the product page.', 'hotel-and-travel' ),
                'active_callback'   => 'hotel_and_travel_pro',
			)
		)
	);    
    
    
}
endif;
add_action( 'customize_register', 'hotel_and_travel_customize_register_scroll' );