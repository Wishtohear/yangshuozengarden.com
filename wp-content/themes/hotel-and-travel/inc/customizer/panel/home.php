<?php
/**
 * Front Page Settings
 * 
 * @package Best_Shop
 */
if ( ! function_exists( 'hotel_and_travel_customize_register_frontpage' ) ) :

function hotel_and_travel_customize_register_frontpage( $wp_customize ) {
	
    /** Front Page Settings */
    $wp_customize->add_panel( 
        'frontpage_settings',
         array(
            'priority'    => 40,
            'capability'  => 'edit_theme_options',
            'title'       => esc_html__( 'Front Page Settings', 'hotel-and-travel' ),
            'description' => esc_html__( 'Static Home Page settings.', 'hotel-and-travel' ),
        )
    );    
      
}
endif;
add_action( 'customize_register', 'hotel_and_travel_customize_register_frontpage' );