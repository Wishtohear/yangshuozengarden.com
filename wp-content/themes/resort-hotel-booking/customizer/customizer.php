<?php

function resort_hotel_booking_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_section( 'adventure_travelling_social_media' );

    $wp_customize->remove_setting( 'adventure_travelling_location' );
    $wp_customize->remove_control( 'adventure_travelling_location' );

    $wp_customize->remove_setting( 'adventure_travelling_timming' );
    $wp_customize->remove_control( 'adventure_travelling_timming' );

    $wp_customize->remove_setting( 'adventure_travelling_location_icon' );
    $wp_customize->remove_control( 'adventure_travelling_location_icon' );

    $wp_customize->remove_setting( 'adventure_travelling_timming_icon' );
    $wp_customize->remove_control( 'adventure_travelling_timming_icon' );

    $wp_customize->remove_setting( 'adventure_travelling_slider_content_layout' );
    $wp_customize->remove_control( 'adventure_travelling_slider_content_layout' );  
     
    $wp_customize->remove_setting( 'adventure_travelling_tp_color_option_link' );
    $wp_customize->remove_control( 'adventure_travelling_tp_color_option_link' );  
    
}
add_action( 'customize_register', 'resort_hotel_booking_remove_customize_register', 11 );

function resort_hotel_booking_customize_register( $wp_customize ) {


    // Register the custom control type.
    $wp_customize->register_control_type( 'Resort_Hotel_Booking_Toggle_Control' );


    $wp_customize->add_setting('resort_hotel_booking_slider_text_layout',array(
        'default' => 'CENTER-ALIGN',
        'sanitize_callback' => 'adventure_travelling_sanitize_choices'
    ));
    $wp_customize->add_control('resort_hotel_booking_slider_text_layout',array(
        'type' => 'radio',
        'label'     => __('Slider Content Layout', 'resort-hotel-booking'),
        'section' => 'adventure_travelling_slider_section',
        'choices' => array(
            'CENTER-ALIGN' => __('CENTER-ALIGN','resort-hotel-booking'),
            'LEFT-ALIGN' => __('LEFT-ALIGN','resort-hotel-booking'),
            'RIGHT-ALIGN' => __('RIGHT-ALIGN','resort-hotel-booking'),
        ),
    ) );

	$wp_customize->add_section( 'resort_hotel_booking_trip_offer_section' , array(
        'title'      => __( 'Latest Offer Settings', 'resort-hotel-booking' ),
        'panel' => 'adventure_travelling_panel_id',
        'priority' => 4,
    ) );

    $wp_customize->add_setting( 'resort_hotel_booking_offer_show_hide', array(
        'default'           => true,
        'transport'         => 'refresh',
        'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
    ) );
    $wp_customize->add_control( new Resort_Hotel_Booking_Toggle_Control( $wp_customize, 'resort_hotel_booking_offer_show_hide', array(
        'label'       => esc_html__( 'Show / Hide section', 'resort-hotel-booking' ),
        'section'     => 'resort_hotel_booking_trip_offer_section',
        'type'        => 'toggle',
        'settings'    => 'resort_hotel_booking_offer_show_hide',
    ) ) );

    $wp_customize->add_setting('resort_hotel_booking_offer_section_tittle',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('resort_hotel_booking_offer_section_tittle',array(
        'label' => __('Section Title','resort-hotel-booking'),
        'section'   => 'resort_hotel_booking_trip_offer_section',
        'type'      => 'text'
    ));

    $categories = get_categories();
    $cats = array();
    $i = 0;
    $offer_cat[]= 'select';
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $offer_cat[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('resort_hotel_booking_offer_section_category',array(
        'default'   => 'select',
        'sanitize_callback' => 'adventure_travelling_sanitize_choices',
    ));
    $wp_customize->add_control('resort_hotel_booking_offer_section_category',array(
        'type'    => 'select',
        'choices' => $offer_cat,
        'label' => __('Select Category','resort-hotel-booking'),
        'section' => 'resort_hotel_booking_trip_offer_section',
    ));


}
add_action( 'customize_register', 'resort_hotel_booking_customize_register' );
