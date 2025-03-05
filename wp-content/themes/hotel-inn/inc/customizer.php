<?php
/**
 * Hotel Inn Theme Customizer
 *
 * @package hotel_inn
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hotel_inn_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$hotel_inn_options = hotel_inn_theme_options();

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'hotel_inn_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'hotel_inn_customize_partial_blogdescription',
			)
		);
	}


    $wp_customize->add_panel(
        'theme_options',
        array(
            'title' => esc_html__('Theme Options', 'hotel-inn'),
            'priority' => 2,
        )
    );


    /* Banner Section */

    $wp_customize->add_section(
        'banner_section',
        array(
            'title' => esc_html__( 'Banner Section','hotel-inn' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );




	$wp_customize->add_setting('hotel_inn_theme_options[banner_title]',
	    array(
	        'type' => 'option',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control('banner_title',
	    array(
	        'label' => esc_html__('Title', 'hotel-inn'),
	        'type' => 'text',
	        'section' => 'banner_section',
	        'settings' => 'hotel_inn_theme_options[banner_title]',
	    )
	);




	$wp_customize->add_setting('hotel_inn_theme_options[banner_button_txt]',
	    array(
	        'type' => 'option',
	        'default' => $hotel_inn_options['banner_button_txt'],
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control('hotel_inn_theme_options[banner_button_txt]',
	    array(
	        'label' => esc_html__('Button Text', 'hotel-inn'),
	        'type' => 'text',
	        'section' => 'banner_section',
	        'settings' => 'hotel_inn_theme_options[banner_button_txt]',
	    )
	);
	$wp_customize->add_setting('hotel_inn_theme_options[banner_button_url]',
	    array(
	        'type' => 'option',
	        'default' => $hotel_inn_options['banner_button_url'],
	        'sanitize_callback' => 'hotel_inn_sanitize_url',
	    )
	);
	$wp_customize->add_control('hotel_inn_theme_options[banner_button_url]',
	    array(
	        'label' => esc_html__('Button Link', 'hotel-inn'),
	        'type' => 'text',
	        'section' => 'banner_section',
	        'settings' => 'hotel_inn_theme_options[banner_button_url]',
	    )
	);


	$wp_customize->add_setting('hotel_inn_theme_options[banner_bg_image]',
	    array(
	        'type' => 'option',
	        'sanitize_callback' => 'esc_url_raw',
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'hotel_inn_theme_options[banner_bg_image]',
	        array(
	            'label' => esc_html__('Add Background Image', 'hotel-inn'),
	            'section' => 'banner_section',
	            'settings' => 'hotel_inn_theme_options[banner_bg_image]',
	        ))
	);

	$wp_customize->add_setting('hotel_inn_theme_options[facebook]',
	    array(
	        'type' => 'option',
	        'default' => $hotel_inn_options['facebook'],
	        'sanitize_callback' => 'hotel_inn_sanitize_url',
	    )
	);
	$wp_customize->add_control('hotel_inn_theme_options[facebook]',
	    array(
	        'label' => esc_html__('Facebook Link', 'hotel-inn'),
	        'type' => 'text',
	        'section' => 'banner_section',
	        'settings' => 'hotel_inn_theme_options[facebook]',
	    )
	);


	$wp_customize->add_setting('hotel_inn_theme_options[twitter]',
	    array(
	        'type' => 'option',
	        'default' => $hotel_inn_options['twitter'],
	        'sanitize_callback' => 'hotel_inn_sanitize_url',
	    )
	);
	$wp_customize->add_control('hotel_inn_theme_options[twitter]',
	    array(
	        'label' => esc_html__('Twitter Link', 'hotel-inn'),
	        'type' => 'text',
	        'section' => 'banner_section',
	        'settings' => 'hotel_inn_theme_options[twitter]',
	    )
	);


	$wp_customize->add_setting('hotel_inn_theme_options[instagram]',
	    array(
	        'type' => 'option',
	        'default' => $hotel_inn_options['instagram'],
	        'sanitize_callback' => 'hotel_inn_sanitize_url',
	    )
	);
	$wp_customize->add_control('hotel_inn_theme_options[instagram]',
	    array(
	        'label' => esc_html__('Instagram Link', 'hotel-inn'),
	        'type' => 'text',
	        'section' => 'banner_section',
	        'settings' => 'hotel_inn_theme_options[instagram]',
	    )
	);
	
	$wp_customize->add_setting('hotel_inn_theme_options[youtube]',
	    array(
	        'type' => 'option',
	        'default' => $hotel_inn_options['youtube'],
	        'sanitize_callback' => 'hotel_inn_sanitize_url',
	    )
	);
	$wp_customize->add_control('hotel_inn_theme_options[youtube]',
	    array(
	        'label' => esc_html__('Youtube Link', 'hotel-inn'),
	        'type' => 'text',
	        'section' => 'banner_section',
	        'settings' => 'hotel_inn_theme_options[youtube]',
	    )
	);
	
	$wp_customize->add_setting('hotel_inn_theme_options[pinterest]',
	    array(
	        'type' => 'option',
	        'default' => $hotel_inn_options['pinterest'],
	        'sanitize_callback' => 'hotel_inn_sanitize_url',
	    )
	);
	$wp_customize->add_control('hotel_inn_theme_options[pinterest]',
	    array(
	        'label' => esc_html__('Pinterest Link', 'hotel-inn'),
	        'type' => 'text',
	        'section' => 'banner_section',
	        'settings' => 'hotel_inn_theme_options[pinterest]',
	    )
	);
	
	$wp_customize->add_setting('hotel_inn_theme_options[email]',
	    array(
	        'type' => 'option',
	        'default' => $hotel_inn_options['email'],
	        'sanitize_callback' => 'hotel_inn_sanitize_url',
	    )
	);
	$wp_customize->add_control('hotel_inn_theme_options[email]',
	    array(
	        'label' => esc_html__('Email Link', 'hotel-inn'),
	        'type' => 'text',
	        'section' => 'banner_section',
	        'settings' => 'hotel_inn_theme_options[email]',
	    )
	);

	$wp_customize->add_setting(
	    'hotel_inn_theme_options[header_phone]',
	    array(
	        'default' => $hotel_inn_options['header_phone'],
	        'type' => 'option',
	        'sanitize_callback' => 'sanitize_text_field',
	        'capability' => 'edit_theme_options'
	    )
	);
	$wp_customize->add_control('hotel_inn_theme_options[header_phone]', array(
	    'label' => esc_html__('Phone Number', 'hotel-inn'),
	    'type' => 'text',
	    'section' => 'banner_section',
	    'settings' => 'hotel_inn_theme_options[header_phone]'
	));


	/* About Section*/


    $wp_customize->add_section(
        'about_section',
        array(
            'title' => esc_html__( 'About Options ','hotel-inn' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );

     function hotel_inn_sanitize_checkbox( $input ) {
        if ( true === $input ) {
            return 1;
         } else {
            return 0;
         }
    }
    $wp_customize->add_setting('hotel_inn_theme_options[about_show]',
        array(
            'type' => 'option',
            'default'        => true,
            'default' => $hotel_inn_options['about_show'],
            'sanitize_callback' => 'hotel_inn_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('hotel_inn_theme_options[about_show]',
        array(
            'label' => esc_html__('Show About Section', 'hotel-inn'),
            'type' => 'Checkbox',
            'priority' => 1,
            'section' => 'about_section',

        )
    );
	$wp_customize->add_setting(
	    'hotel_inn_theme_options[choose_about_page]',
	    array(
	        'default' => $hotel_inn_options['choose_about_page'],
	        'type' => 'option',
	        'sanitize_callback' => 'absint',
	        'capability' => 'edit_theme_options'
	    )
	);
	$wp_customize->add_control('choose_about_page', array(
	    'label' => esc_html__('Choose About Page :', 'hotel-inn'),
	    'type' => 'dropdown-pages',
	    'section' => 'about_section',
	    'settings' => 'hotel_inn_theme_options[choose_about_page]'
	));



    /* CTA Section */

    $wp_customize->add_section(
        'cta_section',
        array(
            'title' => esc_html__( 'Call to Action Section','hotel-inn' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );


    $wp_customize->add_setting('hotel_inn_theme_options[cta_show]',
        array(
            'type' => 'option',
            'default'        => true,
            'default' => $hotel_inn_options['cta_show'],
            'sanitize_callback' => 'hotel_inn_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('hotel_inn_theme_options[cta_show]',
        array(
            'label' => esc_html__('Show CTA Section', 'hotel-inn'),
            'type' => 'Checkbox',
            'priority' => 1,
            'section' => 'cta_section',

        )
    );
	$wp_customize->add_setting('hotel_inn_theme_options[cta_title]',
	    array(
	        'type' => 'option',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control('cta_title',
	    array(
	        'label' => esc_html__('Title', 'hotel-inn'),
	        'type' => 'text',
	        'section' => 'cta_section',
	        'settings' => 'hotel_inn_theme_options[cta_title]',
	    )
	);


	$wp_customize->add_setting('hotel_inn_theme_options[cta_button_txt]',
	    array(
	        'type' => 'option',
	        'default' => $hotel_inn_options['cta_button_txt'],
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);
	$wp_customize->add_control('hotel_inn_theme_options[cta_button_txt]',
	    array(
	        'label' => esc_html__('CTA Button Text', 'hotel-inn'),
	        'type' => 'text',
	        'section' => 'cta_section',
	        'settings' => 'hotel_inn_theme_options[cta_button_txt]',
	    )
	);
	$wp_customize->add_setting('hotel_inn_theme_options[cta_button_url]',
	    array(
	        'type' => 'option',
	        'default' => $hotel_inn_options['cta_button_url'],
	        'sanitize_callback' => 'hotel_inn_sanitize_url',
	    )
	);
	$wp_customize->add_control('hotel_inn_theme_options[cta_button_url]',
	    array(
	        'label' => esc_html__('CTA Button Link', 'hotel-inn'),
	        'type' => 'text',
	        'section' => 'cta_section',
	        'settings' => 'hotel_inn_theme_options[cta_button_url]',
	    )
	);


	$wp_customize->add_setting('hotel_inn_theme_options[cta_bg_image]',
	    array(
	        'type' => 'option',
	        'sanitize_callback' => 'esc_url_raw',
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'hotel_inn_theme_options[cta_bg_image]',
	        array(
	            'label' => esc_html__('Add Background Image', 'hotel-inn'),
	            'section' => 'cta_section',
	            'settings' => 'hotel_inn_theme_options[cta_bg_image]',
	        ))
	);




    /* Room Section */

    $wp_customize->add_section(
        'room_section',
        array(
            'title' => esc_html__( 'Room Section','hotel-inn' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );


    $wp_customize->add_setting('hotel_inn_theme_options[room_show]',
        array(
            'type' => 'option',
            'default'        => true,
            'default' => $hotel_inn_options['room_show'],
            'sanitize_callback' => 'hotel_inn_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('hotel_inn_theme_options[room_show]',
        array(
            'label' => esc_html__('Show Room Section', 'hotel-inn'),
            'type' => 'Checkbox',
            'priority' => 1,
            'section' => 'room_section',

        )
    );

	$wp_customize->add_setting('hotel_inn_theme_options[room_title]',
	    array(
	        'capability' => 'edit_theme_options',
	        'default' => $hotel_inn_options['room_title'],
	        'sanitize_callback' => 'sanitize_text_field',
	        'type' => 'option',
	    )
	);
	$wp_customize->add_control('hotel_inn_theme_options[room_title]',
	    array(
	        'label' => esc_html__('Section Title', 'hotel-inn'),
	        'priority' => 1,
	        'section' => 'room_section',
	        'type' => 'text',
	    )
	);

	$wp_customize->add_setting('hotel_inn_theme_options[room_desc]',
	    array(
	        'default' => $hotel_inn_options['room_desc'],
	        'type' => 'option',
	        'sanitize_callback' => 'sanitize_text_field'
	    )
	);

	$wp_customize->add_control('hotel_inn_theme_options[room_desc]',
	    array(
	        'label' => esc_html__('Room Section Description', 'hotel-inn'),
	        'type' => 'text',
	        'section' => 'room_section',
	        'settings' => 'hotel_inn_theme_options[room_desc]',
	    )
	);

	$wp_customize->add_setting('hotel_inn_theme_options[room_category]', array(
	    'default' => $hotel_inn_options['room_category'],
	    'type' => 'option',
	    'sanitize_callback' => 'hotel_inn_sanitize_select',
	    'capability' => 'edit_theme_options',

	));

	$wp_customize->add_control(new hotel_inn_room_Dropdown_Customize_Control(
	    $wp_customize, 'hotel_inn_theme_options[room_category]',
	    array(
	        'label' => esc_html__('Select Room Category', 'hotel-inn'),
	        'section' => 'room_section',
	        'choices' => hotel_inn_get_categories_select(),
	        'settings' => 'hotel_inn_theme_options[room_category]',
	    )
	));



    /* Blog Section */

    $wp_customize->add_section(
        'blog_section',
        array(
            'title' => esc_html__( 'Blog Section','hotel-inn' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );

    $wp_customize->add_setting('hotel_inn_theme_options[blog_show]',
        array(
            'type' => 'option',
            'default'        => true,
            'default' => $hotel_inn_options['blog_show'],
            'sanitize_callback' => 'hotel_inn_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('hotel_inn_theme_options[blog_show]',
        array(
            'label' => esc_html__('Show Blog Section', 'hotel-inn'),
            'type' => 'Checkbox',
            'priority' => 1,
            'section' => 'blog_section',

        )
    );
	$wp_customize->add_setting('hotel_inn_theme_options[blog_title]',
	    array(
	        'capability' => 'edit_theme_options',
	        'default' => $hotel_inn_options['blog_title'],
	        'sanitize_callback' => 'sanitize_text_field',
	        'type' => 'option',
	    )
	);
	$wp_customize->add_control('hotel_inn_theme_options[blog_title]',
	    array(
	        'label' => esc_html__('Section Title', 'hotel-inn'),
	        'priority' => 1,
	        'section' => 'blog_section',
	        'type' => 'text',
	    )
	);

	$wp_customize->add_setting('hotel_inn_theme_options[blog_desc]',
	    array(
	        'default' => $hotel_inn_options['blog_desc'],
	        'type' => 'option',
	        'sanitize_callback' => 'sanitize_text_field'
	    )
	);

	$wp_customize->add_control('hotel_inn_theme_options[blog_desc]',
	    array(
	        'label' => esc_html__('Blog Section Description', 'hotel-inn'),
	        'type' => 'text',
	        'section' => 'blog_section',
	        'settings' => 'hotel_inn_theme_options[blog_desc]',
	    )
	);

	$wp_customize->add_setting('hotel_inn_theme_options[blog_category]', array(
	    'default' => $hotel_inn_options['blog_category'],
	    'type' => 'option',
	    'sanitize_callback' => 'hotel_inn_sanitize_select',
	    'capability' => 'edit_theme_options',

	));

	$wp_customize->add_control(new hotel_inn_Dropdown_Customize_Control(
	    $wp_customize, 'hotel_inn_theme_options[blog_category]',
	    array(
	        'label' => esc_html__('Select Blog Category', 'hotel-inn'),
	        'section' => 'blog_section',
	        'choices' => hotel_inn_get_categories_select(),
	        'settings' => 'hotel_inn_theme_options[blog_category]',
	    )
	));



    /* Blog Section */

    $wp_customize->add_section(
        'prefooter_section',
        array(
            'title' => esc_html__( 'Prefooter Section','hotel-inn' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );

    $wp_customize->add_setting('hotel_inn_theme_options[show_prefooter]',
        array(
            'type' => 'option',
            'default'        => true,
            'default' => $hotel_inn_options['show_prefooter'],
            'sanitize_callback' => 'hotel_inn_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('hotel_inn_theme_options[show_prefooter]',
        array(
            'label' => esc_html__('Show Prefooter Section', 'hotel-inn'),
            'type' => 'Checkbox',
            'priority' => 1,
            'section' => 'prefooter_section',

        )
    );
/* Copyright section */	
	
    $wp_customize->add_section(
        'copyright_section',
        array(
            'title' => esc_html__( 'Copyright Section ','hotel-inn' ),
            'panel'=>'theme_options',
            'capability'=>'edit_theme_options',
        )
    );
	$wp_customize->add_setting('hotel_inn_theme_options[copyright_text]',
	array(
		'type' => 'option',
		'default' => $hotel_inn_options['copyright_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control('hotel_inn_theme_options[copyright_text]',
	array(
		'label' => esc_html__('Copyright Text', 'hotel-inn'),
		'type' => 'text',
		'section' => 'copyright_section',
		'settings' => 'hotel_inn_theme_options[copyright_text]',
	)
);
}
add_action( 'customize_register', 'hotel_inn_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function hotel_inn_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function hotel_inn_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function hotel_inn_customize_preview_js() {
	wp_enqueue_script( 'hotel-inn-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'hotel_inn_customize_preview_js' );
