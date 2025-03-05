<?php
/**
 * Miscellaneous Settings
 *
 * @package Best_Shop
 */
if( ! function_exists( 'hotel_and_travel_customize_register_post_page_settings' ) ) :

function hotel_and_travel_customize_register_post_page_settings( $wp_customize ) {

    /** Miscellaneous Settings */
    $wp_customize->add_section(
        'post_page_settings',
        array(
            'title'    => esc_html__( 'Post Settings', 'hotel-and-travel' ),
            'priority' => 20,
            'panel'    => 'theme_options',
        )
    );

   
    
    /** Hide Author Section */
    $wp_customize->add_setting( 
        'enable_post_author', 
        array(
            'default'           => hotel_and_travel_default_settings('enable_post_author'),
            'sanitize_callback' => 'hotel_and_travel_sanitize_checkbox'
        ) 
    );

    $wp_customize->add_control(
        new hotel_and_travel_Toggle_Control( 
            $wp_customize,
            'enable_post_author',
            array(
                'section'     => 'post_page_settings',
                'label'	      => esc_html__( 'Hide Author', 'hotel-and-travel' ),
                'description' => esc_html__( 'Enable / Disable author below post title.', 'hotel-and-travel' ),
            )
        )
    );

    /** Hide Posted Date */
    $wp_customize->add_setting( 
        'enable_post_date', 
        array(
            'default'           => hotel_and_travel_default_settings('enable_post_date'),
            'sanitize_callback' => 'hotel_and_travel_sanitize_checkbox'
        ) 
    );

    $wp_customize->add_control(
        new hotel_and_travel_Toggle_Control( 
            $wp_customize,
            'enable_post_date',
            array(
                'section'     => 'post_page_settings',
                'label'	      => esc_html__( 'Hide Posted Date', 'hotel-and-travel' ),
                'description' => esc_html__( 'Enable / Disable posted date below post title.', 'hotel-and-travel' ),
            )
        )
    );
    
    /** Hide Comment count in Banner meta */
    $wp_customize->add_setting( 
        'enable_banner_comments', 
        array(
            'default'           => hotel_and_travel_default_settings('enable_banner_comments'),
            'sanitize_callback' => 'hotel_and_travel_sanitize_checkbox'
        ) 
    );

    $wp_customize->add_control(
        new hotel_and_travel_Toggle_Control( 
            $wp_customize,
            'enable_banner_comments',
            array(
                'section'     => 'post_page_settings',
                'label'	      => esc_html__( 'Hide comments', 'hotel-and-travel' ),
                'description' => esc_html__( 'Enable / Disable comment number below post title.', 'hotel-and-travel' ),
            )
        )
    );

    $wp_customize->add_setting( 
        'enable_post_read_calc', 
        array(
            'default'           => hotel_and_travel_default_settings('enable_post_read_calc'),
            'sanitize_callback' => 'hotel_and_travel_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new hotel_and_travel_Toggle_Control( 
            $wp_customize,
            'enable_post_read_calc',
            array(
                'section'     => 'post_page_settings',
                'label'       => esc_html__( 'Hide Post Reading Calculation', 'hotel-and-travel' ),
                'description' => esc_html__( 'Enable / Disable post reading calculation.', 'hotel-and-travel' ),
            )
        )
    );

    $wp_customize->add_setting( 
        'read_words_per_minute', 
        array(
            'default'           => hotel_and_travel_default_settings('read_words_per_minute'),
            'sanitize_callback' => 'hotel_and_travel_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(          
        'read_words_per_minute',
        array(
            'section'     => 'post_page_settings',
            'label'       => esc_html__( 'Read Words Per Minute', 'hotel-and-travel' ),
            'type'        => 'number',
            'input_attrs'     => array(
                'min'   => 100,
                'max'   => 1000,
                'step'  => 10,
            ) ,
            'description'     => esc_html__( 'An estimated reading time encourages users to read through to the end of a post, since they know how much time it will take.', 'hotel-and-travel' ),
        )
    );

    /** Related Posts section title */
    $wp_customize->add_setting(
        'related_post_title',
        array(
            'default'           => hotel_and_travel_default_settings('related_post_title'),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'related_post_title',
        array(
            'type'            => 'text',
            'section'         => 'post_page_settings',
            'label'           => esc_html__( 'Related Posts Section Title', 'hotel-and-travel' ),
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'related_post_title', array(
        'selector'        => '.additional-post h3.post-title',
        'render_callback' => 'hotel_and_travel_related_posts_title',
    ) );

}
endif;
add_action( 'customize_register', 'hotel_and_travel_customize_register_post_page_settings' );