<?php
/**
 * Newsletter Settings
 * 
 * @package Best_Shop
 */
if( ! function_exists( 'hotel_and_travel_newsletter_frontpage_settings' ) ) :

function hotel_and_travel_newsletter_frontpage_settings( $wp_customize ){
    
	$wp_customize->add_section( 'hotel_and_travel_newsletter', 
	    array(
	        'title'         => esc_html__( 'Newsletter Section', 'hotel-and-travel' ),
	        'priority'      => 30,
	        'panel'         => 'frontpage_settings'
	    ) 
	);

    /** Hide Newsletter Section */
    $wp_customize->add_setting( 
        'enable_newsletter_section', 
        array(
            'default'           => hotel_and_travel_default_settings('enable_newsletter_section'),
            'sanitize_callback' => 'hotel_and_travel_sanitize_checkbox'
        ) 
    );

    $wp_customize->add_control(
        new hotel_and_travel_Toggle_Control( 
            $wp_customize,
            'enable_newsletter_section',
            array(
                'section'     => 'hotel_and_travel_newsletter',
                'label'	      => esc_html__( 'Hide Newsletter Section', 'hotel-and-travel' ),
                'description' => esc_html__( 'Enable to hide newsletter section.', 'hotel-and-travel' ),
            )
        )
    );

    $wp_customize->add_setting(
        'newsletter_shortcode',
        array(
            'default'           => hotel_and_travel_default_settings('newsletter_shortcode'),
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $wp_customize->add_control(
        'newsletter_shortcode',
        array(
            'label'             => esc_html__( 'Newsletter Shortcode', 'hotel-and-travel' ),
            'description'       => esc_html__( 'Please download Blossom Themes Email Newsletter and place the shortcode for newsletter section', 'hotel-and-travel' ),
            'type'              => 'text',
            'section'           => 'hotel_and_travel_newsletter',
        )
    );
}
endif;
add_action( 'customize_register', 'hotel_and_travel_newsletter_frontpage_settings' );