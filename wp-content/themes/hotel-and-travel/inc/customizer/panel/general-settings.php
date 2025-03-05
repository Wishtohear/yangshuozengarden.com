<?php
/**
 * General Settings
 * 
 * @package Best_Shop
 */
if( ! function_exists( 'hotel_and_travel_customize_register_theme_options' ) ) :
    
function hotel_and_travel_customize_register_theme_options( $wp_customize ) {
	
    /** General Settings Settings */
    $wp_customize->add_panel( 
        'theme_options',
            array(
            'priority'    => 6,
            'capability'  => 'edit_theme_options',
            'title'       => esc_html__( 'THEME OPTIONS', 'hotel-and-travel' ),
        ) 
    );    
 
}
endif;
add_action( 'customize_register', 'hotel_and_travel_customize_register_theme_options' );