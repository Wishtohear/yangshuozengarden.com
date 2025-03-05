<?php
/**
 * Adventure Travelling: Customizer
 *
 * @package Adventure Travelling
 * @subpackage adventure_travelling
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function adventure_travelling_customize_register( $wp_customize ) {

	require get_parent_theme_file_path('/inc/controls/icon-changer.php');
	require get_parent_theme_file_path('/inc/controls/range-slider-control.php');

	// Register the custom control type.
	$wp_customize->register_control_type( 'Adventure_Travelling_Toggle_Control' );

	//Register the sortable control type.
	$wp_customize->register_control_type( 'Adventure_Travelling_Control_Sortable' );	

	//add home page setting pannel
	$wp_customize->add_panel( 'adventure_travelling_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Custom Home page', 'adventure-travelling' ),
	    'description' => __( 'Description of what this panel does.', 'adventure-travelling' ),
	) );

	//TP General Option
	$wp_customize->add_section('adventure_travelling_tp_general_settings',array(
        'title' => __('TP General Option', 'adventure-travelling'),
        'panel' => 'adventure_travelling_panel_id',
        'priority' => 1,
    ) );
    $wp_customize->add_setting('adventure_travelling_tp_body_layout_settings',array(
        'default' => 'Full',
        'sanitize_callback' => 'adventure_travelling_sanitize_choices'
	));
    $wp_customize->add_control('adventure_travelling_tp_body_layout_settings',array(
        'type' => 'radio',
        'label'     => __('Body Layout Setting', 'adventure-travelling'),
        'description'   => __('This option work for complete body, if you want to set the complete website in container.', 'adventure-travelling'),
        'section' => 'adventure_travelling_tp_general_settings',
        'choices' => array(
            'Full' => __('Full','adventure-travelling'),
            'Container' => __('Container','adventure-travelling'),
            'Container Fluid' => __('Container Fluid','adventure-travelling')
        ),
	) );

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('adventure_travelling_sidebar_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'adventure_travelling_sanitize_choices'
	));
	$wp_customize->add_control('adventure_travelling_sidebar_post_layout',array(
        'type' => 'radio',
        'label'     => __('Post Sidebar Position', 'adventure-travelling'),
        'description'   => __('This option work for blog page, archive page and search page..', 'adventure-travelling'),
        'section' => 'adventure_travelling_tp_general_settings',
        'choices' => array(
            'full' => __('Full','adventure-travelling'),
            'left' => __('Left','adventure-travelling'),
            'right' => __('Right','adventure-travelling'),
            'three-column' => __('Three Columns','adventure-travelling'),
            'four-column' => __('Four Columns','adventure-travelling'),
            'grid' => __('Grid Layout','adventure-travelling')
        ),
	) );

    // Add Settings and Controls for Post sidebar Layout
	$wp_customize->add_setting('adventure_travelling_sidebar_single_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'adventure_travelling_sanitize_choices'
	));
	$wp_customize->add_control('adventure_travelling_sidebar_single_post_layout',array(
        'type' => 'radio',
        'label'     => __('Single Post Sidebar Position', 'adventure-travelling'),
        'description'   => __('This option work for single blog page', 'adventure-travelling'),
        'section' => 'adventure_travelling_tp_general_settings',
        'choices' => array(
            'full' => __('Full','adventure-travelling'),
            'left' => __('Left','adventure-travelling'),
            'right' => __('Right','adventure-travelling'),
        ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('adventure_travelling_sidebar_page_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'adventure_travelling_sanitize_choices'
	));
	$wp_customize->add_control('adventure_travelling_sidebar_page_layout',array(
        'type' => 'radio',
        'label'     => __('Page Sidebar Position', 'adventure-travelling'),
        'description'   => __('This option work for pages.', 'adventure-travelling'),
        'section' => 'adventure_travelling_tp_general_settings',
        'choices' => array(
            'full' => __('Full','adventure-travelling'),
            'left' => __('Left','adventure-travelling'),
            'right' => __('Right','adventure-travelling')
        ),
	) );
	
	$wp_customize->add_setting( 'adventure_travelling_sticky', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Adventure_Travelling_Toggle_Control( $wp_customize, 'adventure_travelling_sticky', array(
		'label'       => esc_html__( 'Show Sticky Header', 'adventure-travelling' ),
		'section'     => 'adventure_travelling_tp_general_settings',
		'type'        => 'toggle',
		'settings'    => 'adventure_travelling_sticky',
	) ) );

	//tp typography option
	$adventure_travelling_font_array = array(
		''                       => 'No Fonts',
		'Abril Fatface'          => 'Abril Fatface',
		'Acme'                   => 'Acme',
		'Anton'                  => 'Anton',
		'Architects Daughter'    => 'Architects Daughter',
		'Arimo'                  => 'Arimo',
		'Arsenal'                => 'Arsenal',
		'Arvo'                   => 'Arvo',
		'Alegreya'               => 'Alegreya',
		'Alfa Slab One'          => 'Alfa Slab One',
		'Averia Serif Libre'     => 'Averia Serif Libre',
		'Bangers'                => 'Bangers',
		'Boogaloo'               => 'Boogaloo',
		'Bad Script'             => 'Bad Script',
		'Bitter'                 => 'Bitter',
		'Bree Serif'             => 'Bree Serif',
		'BenchNine'              => 'BenchNine',
		'Cabin'                  => 'Cabin',
		'Cardo'                  => 'Cardo',
		'Courgette'              => 'Courgette',
		'Cherry Swash'           => 'Cherry Swash',
		'Cormorant Garamond'     => 'Cormorant Garamond',
		'Crimson Text'           => 'Crimson Text',
		'Cuprum'                 => 'Cuprum',
		'Cookie'                 => 'Cookie',
		'Chewy'                  => 'Chewy',
		'Days One'               => 'Days One',
		'Dosis'                  => 'Dosis',
		'Droid Sans'             => 'Droid Sans',
		'Economica'              => 'Economica',
		'Fredoka One'            => 'Fredoka One',
		'Fjalla One'             => 'Fjalla One',
		'Francois One'           => 'Francois One',
		'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
		'Gloria Hallelujah'      => 'Gloria Hallelujah',
		'Great Vibes'            => 'Great Vibes',
		'Handlee'                => 'Handlee',
		'Hammersmith One'        => 'Hammersmith One',
		'Inconsolata'            => 'Inconsolata',
		'Indie Flower'           => 'Indie Flower',
		'IM Fell English SC'     => 'IM Fell English SC',
		'Julius Sans One'        => 'Julius Sans One',
		'Josefin Slab'           => 'Josefin Slab',
		'Josefin Sans'           => 'Josefin Sans',
		'Kanit'                  => 'Kanit',
		'Lobster'                => 'Lobster',
		'Lato'                   => 'Lato',
		'Lora'                   => 'Lora',
		'Libre Baskerville'      => 'Libre Baskerville',
		'Lobster Two'            => 'Lobster Two',
		'Merriweather'           => 'Merriweather',
		'Monda'                  => 'Monda',
		'Montserrat'             => 'Montserrat',
		'Muli'                   => 'Muli',
		'Marck Script'           => 'Marck Script',
		'Noto Serif'             => 'Noto Serif',
		'Open Sans'              => 'Open Sans',
		'Overpass'               => 'Overpass',
		'Overpass Mono'          => 'Overpass Mono',
		'Oxygen'                 => 'Oxygen',
		'Orbitron'               => 'Orbitron',
		'Patua One'              => 'Patua One',
		'Pacifico'               => 'Pacifico',
		'Padauk'                 => 'Padauk',
		'Poppins'               =>  'Poppins',
		'Playball'               => 'Playball',
		'Playfair Display'       => 'Playfair Display',
		'PT Sans'                => 'PT Sans',
		'Philosopher'            => 'Philosopher',
		'Permanent Marker'       => 'Permanent Marker',
		'Poiret One'             => 'Poiret One',
		'Quicksand'              => 'Quicksand',
		'Quattrocento Sans'      => 'Quattrocento Sans',
		'Raleway'                => 'Raleway',
		'Rubik'                  => 'Rubik',
		'Rokkitt'                => 'Rokkitt',
		'Russo One'              => 'Russo One',
		'Righteous'              => 'Righteous',
		'Slabo'                  => 'Slabo',
		'Source Sans Pro'        => 'Source Sans Pro',
		'Shadows Into Light Two' => 'Shadows Into Light Two',
		'Shadows Into Light'     => 'Shadows Into Light',
		'Sacramento'             => 'Sacramento',
		'Shrikhand'              => 'Shrikhand',
		'Tangerine'              => 'Tangerine',
		'Ubuntu'                 => 'Ubuntu',
		'VT323'                  => 'VT323',
		'Varela Round'           => 'Varela Round',
		'Vampiro One'            => 'Vampiro One',
		'Vollkorn'               => 'Vollkorn',
		'Volkhov'                => 'Volkhov',
		'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
	);

	$wp_customize->add_section('adventure_travelling_typography_option',array(
		'title'         => __('TP Typography Option', 'adventure-travelling'),
		'priority' => 1,
		'panel' => 'adventure_travelling_panel_id'
   	));

   	$wp_customize->add_setting('adventure_travelling_heading_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'adventure_travelling_sanitize_choices',
	));
	$wp_customize->add_control(	'adventure_travelling_heading_font_family', array(
		'section' => 'adventure_travelling_typography_option',
		'label'   => __('heading Fonts', 'adventure-travelling'),
		'type'    => 'select',
		'choices' => $adventure_travelling_font_array,
	));

	$wp_customize->add_setting('adventure_travelling_body_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'adventure_travelling_sanitize_choices',
	));
	$wp_customize->add_control(	'adventure_travelling_body_font_family', array(
		'section' => 'adventure_travelling_typography_option',
		'label'   => __('Body Fonts', 'adventure-travelling'),
		'type'    => 'select',
		'choices' => $adventure_travelling_font_array,
	));

	//TP Color Option
	$wp_customize->add_section('adventure_travelling_color_option',array(
        'title' => __('TP Color Option', 'adventure-travelling'),
        'panel' => 'adventure_travelling_panel_id',
        'priority' => 1,
    ) );
	$wp_customize->add_setting( 'adventure_travelling_tp_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'adventure_travelling_tp_color_option', array(
  		'label'     => __('Theme First Color', 'adventure-travelling'),
	    'description' => __('It will change the complete theme color in one click.', 'adventure-travelling'),
	    'section' => 'adventure_travelling_color_option',
	    'settings' => 'adventure_travelling_tp_color_option',
	    'priority' => 1,
  	)));
  	$wp_customize->add_setting( 'adventure_travelling_tp_color_option_link', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'adventure_travelling_tp_color_option_link', array(
  		'label'     => __('Theme Second Color', 'adventure-travelling'),
	    'description' => __('It will change the complete theme hover link color in one click.', 'adventure-travelling'),
	    'section' => 'adventure_travelling_color_option',
	    'settings' => 'adventure_travelling_tp_color_option_link',
	    'priority' => 1,
  	)));

  	//TP Preloader Option
	$wp_customize->add_section('adventure_travelling_prealoader_option',array(
		'title' => __('TP Preloader Option', 'adventure-travelling'),
		'panel' => 'adventure_travelling_panel_id',
		'priority' => 1,
 	) );
	$wp_customize->add_setting( 'adventure_travelling_preloader_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Adventure_Travelling_Toggle_Control( $wp_customize, 'adventure_travelling_preloader_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Preloader Option', 'adventure-travelling' ),
		'section'     => 'adventure_travelling_prealoader_option',
		'type'        => 'toggle',
		'settings'    => 'adventure_travelling_preloader_show_hide',
	) ) );
  	$wp_customize->add_setting( 'adventure_travelling_tp_preloader_color1_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'adventure_travelling_tp_preloader_color1_option', array(
	    'description' => __('It will change the complete theme preloader ring 1 color in one click.', 'adventure-travelling'),
	    'section' => 'adventure_travelling_prealoader_option',
	    'settings' => 'adventure_travelling_tp_preloader_color1_option',
  	)));
  	$wp_customize->add_setting( 'adventure_travelling_tp_preloader_color2_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'adventure_travelling_tp_preloader_color2_option', array(
	    'description' => __('It will change the complete theme preloader ring 2 color in one click.', 'adventure-travelling'),
	    'section' => 'adventure_travelling_prealoader_option',
	    'settings' => 'adventure_travelling_tp_preloader_color2_option',
  	)));
  	$wp_customize->add_setting( 'adventure_travelling_tp_preloader_bg_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'adventure_travelling_tp_preloader_bg_color_option', array(
	    'description' => __('It will change the complete theme preloader bg color in one click.', 'adventure-travelling'),
	    'section' => 'adventure_travelling_prealoader_option',
	    'settings' => 'adventure_travelling_tp_preloader_bg_color_option',
  	)));

	//TP Blog Option
	$wp_customize->add_section('adventure_travelling_blog_option',array(
        'title' => __('TP Blog Option', 'adventure-travelling'),
        'panel' => 'adventure_travelling_panel_id',
        'priority' => 1,
    ) );

	/** Meta Order */
    $wp_customize->add_setting('blog_meta_order', array(
        'default' => array('date', 'author', 'comment', 'category'),
        'sanitize_callback' => 'adventure_travelling_sanitize_sortable',
    ));
    $wp_customize->add_control(new Adventure_Travelling_Control_Sortable($wp_customize, 'blog_meta_order', array(
    	'label' => esc_html__('Meta Order', 'adventure-travelling'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'adventure-travelling') ,
        'section' => 'adventure_travelling_blog_option',
        'choices' => array(
            'date' => __('date', 'adventure-travelling') ,
            'author' => __('author', 'adventure-travelling') ,
            'comment' => __('comment', 'adventure-travelling') ,
            'category' => __('category', 'adventure-travelling') ,
        ) ,
    )));
    $wp_customize->add_setting( 'adventure_travelling_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'adventure_travelling_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'adventure_travelling_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','adventure-travelling' ),
		'section'     => 'adventure_travelling_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting('adventure_travelling_read_more_text',array(
		'default'=> __('Read More','adventure-travelling'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_travelling_read_more_text',array(
		'label'	=> __('Edit Button Text','adventure-travelling'),
		'section'=> 'adventure_travelling_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting('adventure_travelling_post_image_round', array(
	  'default' => '0',
      'sanitize_callback' => 'adventure_travelling_sanitize_number_range',
	));
	$wp_customize->add_control(new adventure_travelling_Range_Slider($wp_customize, 'adventure_travelling_post_image_round', array(
       'section' => 'adventure_travelling_blog_option',
      'label' => esc_html__('Edit Post Image Border Radius', 'adventure-travelling'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 180,
        'step' => 1
    )
	)));

	$wp_customize->add_setting('adventure_travelling_post_image_width', array(
	  'default' => '',
      'sanitize_callback' => 'adventure_travelling_sanitize_number_range',
	));
	$wp_customize->add_control(new adventure_travelling_Range_Slider($wp_customize, 'adventure_travelling_post_image_width', array(
       'section' => 'adventure_travelling_blog_option',
      'label' => esc_html__('Edit Post Image Width', 'adventure-travelling'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 367,
        'step' => 1
    )
	)));

	$wp_customize->add_setting('adventure_travelling_post_image_length', array(
	  'default' => '',
      'sanitize_callback' => 'adventure_travelling_sanitize_number_range',
	));
	$wp_customize->add_control(new adventure_travelling_Range_Slider($wp_customize, 'adventure_travelling_post_image_length', array(
       'section' => 'adventure_travelling_blog_option',
      'label' => esc_html__('Edit Post Image height', 'adventure-travelling'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 900,
        'step' => 1
    )
	)));

	$wp_customize->add_setting( 'adventure_travelling_remove_read_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Adventure_Travelling_Toggle_Control( $wp_customize,'adventure_travelling_remove_read_button', array(
		'label'       => esc_html__( 'Show / Hide Read More Button', 'adventure-travelling' ),
		'section'     => 'adventure_travelling_blog_option',
		'type'        => 'toggle',
		'settings'    => 'adventure_travelling_remove_read_button',
	) ) );

	$wp_customize->add_setting( 'adventure_travelling_remove_tags', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Adventure_Travelling_Toggle_Control( $wp_customize, 'adventure_travelling_remove_tags', array(
		'label'       => esc_html__( 'Show / Hide Tags Option', 'adventure-travelling' ),
		'section'     => 'adventure_travelling_blog_option',
		'type'        => 'toggle',
		'settings'    => 'adventure_travelling_remove_tags',
	) ) );

	$wp_customize->add_setting( 'adventure_travelling_remove_category', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Adventure_Travelling_Toggle_Control( $wp_customize, 'adventure_travelling_remove_category', array(
		'label'       => esc_html__( 'Show / Hide Category Option', 'adventure-travelling' ),
		'section'     => 'adventure_travelling_blog_option',
		'type'        => 'toggle',
		'settings'    => 'adventure_travelling_remove_category',
	) ) );

	$wp_customize->add_setting( 'adventure_travelling_remove_comment', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
 	) );
	$wp_customize->add_control( new Adventure_Travelling_Toggle_Control( $wp_customize, 'adventure_travelling_remove_comment', array(
	 'label'       => esc_html__( 'Show / Hide Comment Form', 'adventure-travelling' ),
	 'section'     => 'adventure_travelling_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'adventure_travelling_remove_comment',
	) ) );

	$wp_customize->add_setting( 'adventure_travelling_remove_related_post', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Adventure_Travelling_Toggle_Control( $wp_customize, 'adventure_travelling_remove_related_post', array(
	 'label'       => esc_html__( 'Show / Hide Related Post', 'adventure-travelling' ),
	 'section'     => 'adventure_travelling_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'adventure_travelling_remove_related_post',
	) ) );

	$wp_customize->add_setting('adventure_travelling_related_post_heading',array(
		'default'=> __('Related Posts','adventure-travelling'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_travelling_related_post_heading',array(
		'label'	=> __('Edit Section Title','adventure-travelling'),
		'section'=> 'adventure_travelling_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'adventure_travelling_related_post_per_page', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'adventure_travelling_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'adventure_travelling_related_post_per_page', array(
		'label'       => esc_html__( 'Related Post Per Page','adventure-travelling' ),
		'section'     => 'adventure_travelling_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 3,
			'max'              => 9,
		),
	) );
	$wp_customize->add_setting( 'adventure_travelling_related_post_per_columns', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'adventure_travelling_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'adventure_travelling_related_post_per_columns', array(
		'label'       => esc_html__( 'Related Post Per Row','adventure-travelling' ),
		'section'     => 'adventure_travelling_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	) );
	$wp_customize->add_setting('adventure_travelling_post_layout',array(
        'default' => 'image-content',
        'sanitize_callback' => 'adventure_travelling_sanitize_choices'
	));
	$wp_customize->add_control('adventure_travelling_post_layout',array(
        'type' => 'radio',
        'label'     => __('Post Layout', 'adventure-travelling'),
        'section' => 'adventure_travelling_blog_option',
        'choices' => array(
            'image-content' => __('Media-Content','adventure-travelling'),
            'content-image' => __('Content-Media','adventure-travelling'),
        ),
	) );

	//menu typography
  	$wp_customize->add_section( 'adventure_travelling_menu_typography', array(
    	'title'      => __( 'Menu Typography', 'adventure-travelling' ),
    	'priority' => 2,
		'panel' => 'adventure_travelling_panel_id'
	) );
	$wp_customize->add_setting('adventure_travelling_menu_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'adventure_travelling_sanitize_choices',
	));
	$wp_customize->add_control(	'adventure_travelling_menu_font_family', array(
		'section' => 'adventure_travelling_menu_typography',
		'label'   => __('Menu Fonts', 'adventure-travelling'),
		'type'    => 'select',
		'choices' => $adventure_travelling_font_array,
	));

	$wp_customize->add_setting('adventure_travelling_menu_font_weight',array(
        'default' => '',
        'sanitize_callback' => 'adventure_travelling_sanitize_choices'
	));
	$wp_customize->add_control('adventure_travelling_menu_font_weight',array(
     'type' => 'radio',
     'label'     => __('Font Weight', 'adventure-travelling'),
     'section' => 'adventure_travelling_menu_typography',
     'type' => 'select',
     'choices' => array(
         '100' => __('100','adventure-travelling'),
         '200' => __('200','adventure-travelling'),
         '300' => __('300','adventure-travelling'),
         '400' => __('400','adventure-travelling'),
         '500' => __('500','adventure-travelling'),
         '600' => __('600','adventure-travelling'),
         '700' => __('700','adventure-travelling'),
         '800' => __('800','adventure-travelling'),
         '900' => __('900','adventure-travelling')
     ),
	) );
	
	$wp_customize->add_setting('adventure_travelling_menu_text_tranform',array(
		'default' => '',
		'sanitize_callback' => 'adventure_travelling_sanitize_choices'
 	));
 	$wp_customize->add_control('adventure_travelling_menu_text_tranform',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','adventure-travelling'),
		'section' => 'adventure_travelling_menu_typography',
		'choices' => array(
		   'Uppercase' => __('Uppercase','adventure-travelling'),
		   'Lowercase' => __('Lowercase','adventure-travelling'),
		   'Capitalize' => __('Capitalize','adventure-travelling'),
		),
	) );
	$wp_customize->add_setting('adventure_travelling_menu_font_size', array(
	    'default' => '',
        'sanitize_callback' => 'adventure_travelling_sanitize_number_range',
	));
	$wp_customize->add_control(new Adventure_Travelling_Range_Slider($wp_customize, 'adventure_travelling_menu_font_size', array(
        'section' => 'adventure_travelling_menu_typography',
        'label' => esc_html__('Font Size', 'adventure-travelling'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 15,
            'step' => 1
    )
	)));

	// Top bar Section
	$wp_customize->add_section( 'adventure_travelling_topbar', array(
    	'title'      => __( 'Contact Details', 'adventure-travelling' ),
    	'description' => __( 'Add your contact details', 'adventure-travelling' ),
		'panel' => 'adventure_travelling_panel_id',
      'priority' => 2,
	) );

	$wp_customize->add_setting( 'adventure_travelling_search_icon', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Adventure_Travelling_Toggle_Control( $wp_customize, 'adventure_travelling_search_icon', array(
		'label'       => esc_html__( 'Show / Hide Search Option', 'adventure-travelling' ),
		'section'     => 'adventure_travelling_topbar',
		'type'        => 'toggle',
		'settings'    => 'adventure_travelling_search_icon',
	) ) );

	$wp_customize->add_setting('adventure_travelling_location',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_travelling_location',array(
		'label'	=> __('Add Location Text','adventure-travelling'),
		'section'=> 'adventure_travelling_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('adventure_travelling_location_icon',array(
		'default'	=> 'fas fa-map-marker-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Adventure_Travelling_Icon_Changer(
        $wp_customize,'adventure_travelling_location_icon',array(
		'label'	=> __('Location Icon','adventure-travelling'),
		'transport' => 'refresh',
		'section'	=> 'adventure_travelling_topbar',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('adventure_travelling_timming',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_travelling_timming',array(
		'label'	=> __('Add Timming','adventure-travelling'),
		'section'=> 'adventure_travelling_topbar',
		'type'=> 'text'
	));
	$wp_customize->add_setting('adventure_travelling_timming_icon',array(
		'default'	=> 'far fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Adventure_Travelling_Icon_Changer(
        $wp_customize,'adventure_travelling_timming_icon',array(
		'label'	=> __('Timming Icon','adventure-travelling'),
		'transport' => 'refresh',
		'section'	=> 'adventure_travelling_topbar',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('adventure_travelling_mail_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_travelling_mail_text',array(
		'label'	=> __('Add Mail Text','adventure-travelling'),
		'section'=> 'adventure_travelling_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('adventure_travelling_mail',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('adventure_travelling_mail',array(
		'label'	=> __('Add Mail Address','adventure-travelling'),
		'section'=> 'adventure_travelling_topbar',
		'type'=> 'text'
	));
	$wp_customize->add_setting('adventure_travelling_mail_icon',array(
		'default'	=> 'fas fa-envelope-open',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Adventure_Travelling_Icon_Changer(
        $wp_customize,'adventure_travelling_mail_icon',array(
		'label'	=> __('Mail Contact Icon','adventure-travelling'),
		'transport' => 'refresh',
		'section'	=> 'adventure_travelling_topbar',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('adventure_travelling_call_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_travelling_call_text',array(
		'label'	=> __('Add Text','adventure-travelling'),
		'section'=> 'adventure_travelling_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('adventure_travelling_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'adventure_travelling_sanitize_phone_number'
	));
	$wp_customize->add_control('adventure_travelling_call',array(
		'label'	=> __('Add Phone Number','adventure-travelling'),
		'section'=> 'adventure_travelling_topbar',
		'type'=> 'text'
	));
	$wp_customize->add_setting('adventure_travelling_call_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Adventure_Travelling_Icon_Changer(
        $wp_customize,'adventure_travelling_call_icon',array(
		'label'	=> __('Phone Icon','adventure-travelling'),
		'transport' => 'refresh',
		'section'	=> 'adventure_travelling_topbar',
		'type'		=> 'icon'
	)));

	// Social Link
	$wp_customize->add_section( 'adventure_travelling_social_media', array(
    	'title'      => __( 'Social Media Links', 'adventure-travelling' ),
    	'description' => __( 'Add your Social Links', 'adventure-travelling' ),
		'panel' => 'adventure_travelling_panel_id',
      'priority' => 2,
	) );

	$wp_customize->add_setting( 'adventure_travelling_header_fb_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Adventure_Travelling_Toggle_Control( $wp_customize, 'adventure_travelling_header_fb_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'adventure-travelling' ),
		'section'     => 'adventure_travelling_social_media',
		'type'        => 'toggle',
		'settings'    => 'adventure_travelling_header_fb_new_tab',
	) ) );

	$wp_customize->add_setting('adventure_travelling_facebook_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('adventure_travelling_facebook_url',array(
		'label'	=> __('Facebook Link','adventure-travelling'),
		'section'=> 'adventure_travelling_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('adventure_travelling_facebook_icon',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Adventure_Travelling_Icon_Changer(
        $wp_customize,'adventure_travelling_facebook_icon',array(
		'label'	=> __('Facebook Icon','adventure-travelling'),
		'transport' => 'refresh',
		'section'	=> 'adventure_travelling_social_media',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'adventure_travelling_header_twt_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Adventure_Travelling_Toggle_Control( $wp_customize, 'adventure_travelling_header_twt_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'adventure-travelling' ),
		'section'     => 'adventure_travelling_social_media',
		'type'        => 'toggle',
		'settings'    => 'adventure_travelling_header_twt_new_tab',
	) ) );

	$wp_customize->add_setting('adventure_travelling_twitter_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('adventure_travelling_twitter_url',array(
		'label'	=> __('Twitter Link','adventure-travelling'),
		'section'=> 'adventure_travelling_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('adventure_travelling_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Adventure_Travelling_Icon_Changer(
        $wp_customize,'adventure_travelling_twitter_icon',array(
		'label'	=> __('Twitter Icon','adventure-travelling'),
		'transport' => 'refresh',
		'section'	=> 'adventure_travelling_social_media',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'adventure_travelling_header_ins_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Adventure_Travelling_Toggle_Control( $wp_customize, 'adventure_travelling_header_ins_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'adventure-travelling' ),
		'section'     => 'adventure_travelling_social_media',
		'type'        => 'toggle',
		'settings'    => 'adventure_travelling_header_ins_new_tab',
	) ) );

	$wp_customize->add_setting('adventure_travelling_instagram_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('adventure_travelling_instagram_url',array(
		'label'	=> __('Instagram Link','adventure-travelling'),
		'section'=> 'adventure_travelling_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('adventure_travelling_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Adventure_Travelling_Icon_Changer(
        $wp_customize,'adventure_travelling_instagram_icon',array(
		'label'	=> __('Instagram Icon','adventure-travelling'),
		'transport' => 'refresh',
		'section'	=> 'adventure_travelling_social_media',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'adventure_travelling_header_ut_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Adventure_Travelling_Toggle_Control( $wp_customize, 'adventure_travelling_header_ut_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'adventure-travelling' ),
		'section'     => 'adventure_travelling_social_media',
		'type'        => 'toggle',
		'settings'    => 'adventure_travelling_header_ut_new_tab',
	) ) );

	$wp_customize->add_setting('adventure_travelling_youtube_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('adventure_travelling_youtube_url',array(
		'label'	=> __('YouTube Link','adventure-travelling'),
		'section'=> 'adventure_travelling_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('adventure_travelling_youtube_icon',array(
		'default'	=> 'fab fa-youtube',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Adventure_Travelling_Icon_Changer(
        $wp_customize,'adventure_travelling_youtube_icon',array(
		'label'	=> __('YouTube Icon','adventure-travelling'),
		'transport' => 'refresh',
		'section'	=> 'adventure_travelling_social_media',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'adventure_travelling_header_pint_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Adventure_Travelling_Toggle_Control( $wp_customize, 'adventure_travelling_header_pint_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'adventure-travelling' ),
		'section'     => 'adventure_travelling_social_media',
		'type'        => 'toggle',
		'settings'    => 'adventure_travelling_header_pint_new_tab',
	) ) );

	$wp_customize->add_setting('adventure_travelling_pint_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('adventure_travelling_pint_url',array(
		'label'	=> __('Pinterest Link','adventure-travelling'),
		'section'=> 'adventure_travelling_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('adventure_travelling_pint_icon',array(
		'default'	=> 'fab fa-pinterest',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Adventure_Travelling_Icon_Changer(
        $wp_customize,'adventure_travelling_pint_icon',array(
		'label'	=> __('Pinterest Icon','adventure-travelling'),
		'transport' => 'refresh',
		'section'	=> 'adventure_travelling_social_media',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('adventure_travelling_social_icon_fontsize',array(
		'default'=> '12',
		'sanitize_callback'	=> 'adventure_travelling_sanitize_number_absint'
	));
	$wp_customize->add_control('adventure_travelling_social_icon_fontsize',array(
		'label'	=> __('Social Icons Font Size in PX','adventure-travelling'),
		'type'=> 'number',
		'section'=> 'adventure_travelling_social_media',
		'input_attrs' => array(
      		'step' => 1,
			'min'  => 0,
			'max'  => 30,
        ),
	));

	//home page slider
	$wp_customize->add_section( 'adventure_travelling_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'adventure-travelling' ),
		'panel' => 'adventure_travelling_panel_id',
        'priority' => 3,
	) );
	$wp_customize->add_setting( 'adventure_travelling_slider_arrows', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Adventure_Travelling_Toggle_Control( $wp_customize, 'adventure_travelling_slider_arrows', array(
		'label'       => esc_html__( 'Show / Hide slider', 'adventure-travelling' ),
		'priority'    => 1,
		'section'     => 'adventure_travelling_slider_section',
		'type'        => 'toggle',
		'settings'    => 'adventure_travelling_slider_arrows',
	) ) );

	for ( $adventure_travelling_count = 1; $adventure_travelling_count <= 4; $adventure_travelling_count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'adventure_travelling_slider_page' . $adventure_travelling_count, array(
			'default'           => '',
			'sanitize_callback' => 'adventure_travelling_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'adventure_travelling_slider_page' . $adventure_travelling_count, array(
			'label'    => __( 'Select Slide Image Page', 'adventure-travelling' ),
			'priority' => 2,
			'section'  => 'adventure_travelling_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting( 'adventure_travelling_slider_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Adventure_Travelling_Toggle_Control( $wp_customize, 'adventure_travelling_slider_button', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'adventure-travelling' ),
		'priority'    => 3,
		'section'     => 'adventure_travelling_slider_section',
		'type'        => 'toggle',
		'settings'    => 'adventure_travelling_slider_button',
	) ) );

	$wp_customize->add_setting('adventure_travelling_slider_content_layout',array(
        'default' => 'LEFT-ALIGN',
        'priority'=>4 ,
        'sanitize_callback' => 'adventure_travelling_sanitize_choices'
	));
	$wp_customize->add_control('adventure_travelling_slider_content_layout',array(
        'type' => 'radio',
        'label'     => __('Slider Content Layout', 'adventure-travelling'),
        'section' => 'adventure_travelling_slider_section',
        'choices' => array(
            'LEFT-ALIGN' => __('LEFT-ALIGN','adventure-travelling'),
            'CENTER-ALIGN' => __('CENTER-ALIGN','adventure-travelling'),
            'RIGHT-ALIGN' => __('RIGHT-ALIGN','adventure-travelling'),
        ),
	) );

	// blog sec
	$wp_customize->add_section('adventure_travelling_static_blog_section', array(
        'title' => __('Blog Section', 'adventure-travelling'),
        'panel' => 'adventure_travelling_panel_id',
        'priority' => 4,
    ));

    $wp_customize->add_setting('adventure_travelling_blog_show_hide', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
    ));
    $wp_customize->add_control(new Adventure_Travelling_Toggle_Control($wp_customize, 'adventure_travelling_blog_show_hide', array(
        'label' => esc_html__('Show / Hide Blog Section', 'adventure-travelling'),
        'section' => 'adventure_travelling_static_blog_section',
        'type' => 'toggle',
        'settings' => 'adventure_travelling_blog_show_hide',
    )));

    $wp_customize->add_setting('adventure_travelling_blog_tittle', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('adventure_travelling_blog_tittle', array(
        'label' => __('Blog Title', 'adventure-travelling'),
        'section' => 'adventure_travelling_static_blog_section',
        'type' => 'text'
    ));

    $post_list = get_posts(array('numberposts' => -1));
    $pst = array('' => 'Select');
    foreach($post_list as $post){
        $pst[$post->post_name] = $post->post_title;
    }

    $wp_customize->add_setting('adventure_travelling_static_blog_1', array(
        'sanitize_callback' => 'adventure_travelling_sanitize_choices',
    ));
    $wp_customize->add_control('adventure_travelling_static_blog_1', array(
        'type' => 'select',
        'choices' => $pst,
        'label' => __('Select post', 'adventure-travelling'),
        'section' => 'adventure_travelling_static_blog_section',
    ));

    $wp_customize->add_setting('adventure_travelling_static_blog_2', array(
        'sanitize_callback' => 'adventure_travelling_sanitize_choices',
    ));
    $wp_customize->add_control('adventure_travelling_static_blog_2', array(
        'type' => 'select',
        'choices' => $pst,
        'label' => __('Select post', 'adventure-travelling'),
        'section' => 'adventure_travelling_static_blog_section',
    ));

    $wp_customize->add_setting('adventure_travelling_static_blog_3', array(
        'sanitize_callback' => 'adventure_travelling_sanitize_choices',
    ));
    $wp_customize->add_control('adventure_travelling_static_blog_3', array(
        'type' => 'select',
        'choices' => $pst,
        'label' => __('Select post', 'adventure-travelling'),
        'section' => 'adventure_travelling_static_blog_section',
    ));

    $wp_customize->add_setting('adventure_travelling_remove_date', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
    ));
    $wp_customize->add_control(new Adventure_Travelling_Toggle_Control($wp_customize, 'adventure_travelling_remove_date', array(
        'label' => esc_html__('Show / Hide Date', 'adventure-travelling'),
        'section' => 'adventure_travelling_static_blog_section',
        'type' => 'toggle',
        'settings' => 'adventure_travelling_remove_date',
    )));
    
	//footer
	$wp_customize->add_section('adventure_travelling_footer_section',array(
		'title'	=> __('Footer Text','adventure-travelling'),
		'description'	=> __('Add copyright text.','adventure-travelling'),
		'panel' => 'adventure_travelling_panel_id',
		'priority' => 4,
	));

	$wp_customize->add_setting('adventure_travelling_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_travelling_footer_text',array(
		'label'	=> __('Copyright Text','adventure-travelling'),
		'section'	=> 'adventure_travelling_footer_section',
		'type'		=> 'text'
	));

	//footer widget title font size
	$wp_customize->add_setting('adventure_travelling_footer_copyright_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'adventure_travelling_sanitize_number_absint'
	));
	$wp_customize->add_control('adventure_travelling_footer_copyright_font_size',array(
		'label'	=> __('Change Footer Copyright Font Size in PX','adventure-travelling'),
		'section'	=> 'adventure_travelling_footer_section',
	    'setting'	=> 'adventure_travelling_footer_copyright_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	$wp_customize->add_setting( 'adventure_travelling_footer_copyright_text_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'adventure_travelling_footer_copyright_text_color', array(
			'label'     => __('Change Footer Copyright Text Color', 'adventure-travelling'),
	    'section' => 'adventure_travelling_footer_section',
	    'settings' => 'adventure_travelling_footer_copyright_text_color',
  	)));

  	$wp_customize->add_setting('adventure_travelling_footer_copyright_top_bottom_padding',array(
		'default'	=> '',
		'sanitize_callback'	=> 'adventure_travelling_sanitize_number_absint'
	));
	$wp_customize->add_control('adventure_travelling_footer_copyright_top_bottom_padding',array(
		'label'	=> __('Change Footer Copyright Padding in PX','adventure-travelling'),
		'section'	=> 'adventure_travelling_footer_section',
	    'setting'	=> 'adventure_travelling_footer_copyright_top_bottom_padding',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	// Add Settings and Controls for copyright
	$wp_customize->add_setting('adventure_travelling_copyright_text_position',array(
        'default' => 'Center',
        'sanitize_callback' => 'adventure_travelling_sanitize_choices'
	));
	$wp_customize->add_control('adventure_travelling_copyright_text_position',array(
        'type' => 'radio',
        'label'     => __('Copyright Text Position', 'adventure-travelling'),
        'description'   => __('This option work for Copyright', 'adventure-travelling'),
        'section' => 'adventure_travelling_footer_section',
        'choices' => array(
            'Right' => __('Right','adventure-travelling'),
            'Left' => __('Left','adventure-travelling'),
            'Center' => __('Center','adventure-travelling')
        ),
	) );

	// footer columns
	$wp_customize->add_setting('adventure_travelling_footer_columns',array(
		'default'	=> 4,
		'sanitize_callback'	=> 'adventure_travelling_sanitize_number_absint'
	));
	$wp_customize->add_control('adventure_travelling_footer_columns',array(
		'label'	=> __('Footer Widget Columns','adventure-travelling'),
		'section'	=> 'adventure_travelling_footer_section',
		'setting'	=> 'adventure_travelling_footer_columns',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	));

    $wp_customize->add_setting('adventure_travelling_return_to_header',array(
       'default' => true,
       'sanitize_callback'	=> 'adventure_travelling_sanitize_checkbox'
    ));
    $wp_customize->add_control('adventure_travelling_return_to_header',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Return to header','adventure-travelling'),
       'section' => 'adventure_travelling_footer_section',
    ));

	$wp_customize->add_setting( 'adventure_travelling_tp_footer_bg_color_option', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'adventure_travelling_tp_footer_bg_color_option', array(
		'label'     => __('Footer Widget Background Color', 'adventure-travelling'),
		'description' => __('It will change the complete footer widget backgorund color.', 'adventure-travelling'),
		'section' => 'adventure_travelling_footer_section',
		'settings' => 'adventure_travelling_tp_footer_bg_color_option',
	)));

	$wp_customize->add_setting('adventure_travelling_footer_widget_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'adventure_travelling_footer_widget_image',array(
	   'label' => __('Footer Widget Background Image','adventure-travelling'),
	   'section' => 'adventure_travelling_footer_section'
	)));

	//footer widget title font size
	$wp_customize->add_setting('adventure_travelling_footer_widget_title_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'adventure_travelling_sanitize_number_absint'
	));
	$wp_customize->add_control('adventure_travelling_footer_widget_title_font_size',array(
		'label'	=> __('Change Footer Widget Title Font Size in PX','adventure-travelling'),
		'section'	=> 'adventure_travelling_footer_section',
	    'setting'	=> 'adventure_travelling_footer_widget_title_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	$wp_customize->add_setting( 'adventure_travelling_footer_widget_title_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'adventure_travelling_footer_widget_title_color', array(
			'label'     => __('Change Footer Widget Title Color', 'adventure-travelling'),
	    'section' => 'adventure_travelling_footer_section',
	    'settings' => 'adventure_travelling_footer_widget_title_color',
  	)));
  	
	$wp_customize->add_setting( 'adventure_travelling_return_to_header', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Adventure_Travelling_Toggle_Control( $wp_customize, 'adventure_travelling_return_to_header', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'adventure-travelling' ),
		'section'     => 'adventure_travelling_footer_section',
		'type'        => 'toggle',
		'settings'    => 'adventure_travelling_return_to_header',
	) ) );
	$wp_customize->add_setting('adventure_travelling_return_icon',array(
	    'default'	=> 'fas fa-arrow-up',
	    'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Adventure_Travelling_Icon_Changer(
        $wp_customize,'adventure_travelling_return_icon',array(
		'label'	=> __('Scroll Top Icon','adventure-travelling'),
		'transport' => 'refresh',
		'section'	=> 'adventure_travelling_footer_section',
		'type'		=> 'icon'
	)));

    // Add Settings and Controls for Scroll top
	$wp_customize->add_setting('adventure_travelling_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'adventure_travelling_sanitize_choices'
	));
	$wp_customize->add_control('adventure_travelling_scroll_top_position',array(
        'type' => 'radio',
        'label'     => __('Scroll to top Position', 'adventure-travelling'),
        'description'   => __('This option work for scroll to top', 'adventure-travelling'),
        'section' => 'adventure_travelling_footer_section',
        'choices' => array(
            'Right' => __('Right','adventure-travelling'),
            'Left' => __('Left','adventure-travelling'),
            'Center' => __('Center','adventure-travelling')
        ),
	) );
	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'adventure_travelling_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'adventure_travelling_customize_partial_blogdescription',
	) );
	$wp_customize->add_setting( 'adventure_travelling_site_title_text', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Adventure_Travelling_Toggle_Control( $wp_customize, 'adventure_travelling_site_title_text', array(
		'label'       => esc_html__( 'Show / Hide Site Title', 'adventure-travelling' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'adventure_travelling_site_title_text',
	) ) );

	//Mobile Responsive
	$wp_customize->add_section('adventure_travelling_mobile_media_option',array(
		'title'         => __('Mobile Responsive media', 'adventure-travelling'),
		'description' => __('If the button in the main settings is off, control will not work.', 'adventure-travelling'),
		'priority' => 5,
		'panel' => 'adventure_travelling_panel_id'
	) );
	$wp_customize->add_setting( 'adventure_travelling_return_to_header_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Adventure_Travelling_Toggle_Control( $wp_customize, 'adventure_travelling_return_to_header_mob', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'adventure-travelling' ),
		'section'     => 'adventure_travelling_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'adventure_travelling_return_to_header_mob',
	) ) );
	$wp_customize->add_setting( 'adventure_travelling_slider_buttom_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Adventure_Travelling_Toggle_Control( $wp_customize, 'adventure_travelling_slider_buttom_mob', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'adventure-travelling' ),
		'section'     => 'adventure_travelling_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'adventure_travelling_slider_buttom_mob',
	) ) );
	$wp_customize->add_setting( 'adventure_travelling_related_post_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Adventure_Travelling_Toggle_Control( $wp_customize, 'adventure_travelling_related_post_mob', array(
		'label'       => esc_html__( 'Show / Hide Related Post', 'adventure-travelling' ),
		'section'     => 'adventure_travelling_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'adventure_travelling_related_post_mob',
	) ) );

	// logo site title size
	$wp_customize->add_setting('adventure_travelling_site_title_font_size',array(
		'default'	=> 30,
		'sanitize_callback'	=> 'adventure_travelling_sanitize_number_absint'
	));
	$wp_customize->add_control('adventure_travelling_site_title_font_size',array(
		'label'	=> __('Site Title Font Size in PX','adventure-travelling'),
		'section'	=> 'title_tagline',
		'setting'	=> 'adventure_travelling_site_title_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 30,
		),
	));

	$wp_customize->add_setting( 'adventure_travelling_site_title_color', array(
		    'default' => '',
		    'sanitize_callback' => 'sanitize_hex_color'
	  	));
	  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'adventure_travelling_site_title_color', array(
				'label'     => __('Change Site Title Color', 'adventure-travelling'),
		    'section' => 'title_tagline',
		    'settings' => 'adventure_travelling_site_title_color',
	  	)));
	  	
	$wp_customize->add_setting( 'adventure_travelling_site_tagline_text', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Adventure_Travelling_Toggle_Control( $wp_customize, 'adventure_travelling_site_tagline_text', array(
		'label'       => esc_html__( 'Show / Hide Site Tagline', 'adventure-travelling' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'adventure_travelling_site_tagline_text',
	) ) );

	// logo site tagline size
	$wp_customize->add_setting('adventure_travelling_site_tagline_font_size',array(
		'default'	=> 15,
		'sanitize_callback'	=> 'adventure_travelling_sanitize_number_absint'
	));
	$wp_customize->add_control('adventure_travelling_site_tagline_font_size',array(
		'label'	=> __('Site Tagline Font Size in PX','adventure-travelling'),
		'section'	=> 'title_tagline',
		'setting'	=> 'adventure_travelling_site_tagline_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 30,
		),
	));

	$wp_customize->add_setting( 'adventure_travelling_logo_tagline_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'adventure_travelling_logo_tagline_color', array(
			'label'     => __('Change Site Tagline Color', 'adventure-travelling'),
	    'section' => 'title_tagline',
	    'settings' => 'adventure_travelling_logo_tagline_color',
  	)));

    $wp_customize->add_setting('adventure_travelling_logo_width',array(
		'default' => 150,
		'sanitize_callback'	=> 'adventure_travelling_sanitize_number_absint'
	));
	$wp_customize->add_control('adventure_travelling_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','adventure-travelling'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));
	$wp_customize->add_setting('adventure_travelling_logo_settings',array(
        'default' => 'Different Line',
        'sanitize_callback' => 'adventure_travelling_sanitize_choices'
	));
    $wp_customize->add_control('adventure_travelling_logo_settings',array(
        'type' => 'radio',
        'label'     => __('Logo Layout Settings', 'adventure-travelling'),
        'description'   => __('Here you have two options 1. Logo and Site tite in differnt line. 2. Logo and Site title in same line.', 'adventure-travelling'),
        'section' => 'title_tagline',
        'choices' => array(
            'Different Line' => __('Different Line','adventure-travelling'),
            'Same Line' => __('Same Line','adventure-travelling')
        ),
	) );

	//Woo Commerce
	$wp_customize->add_setting('adventure_travelling_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'adventure_travelling_sanitize_number_absint'
	));
	$wp_customize->add_control('adventure_travelling_per_columns',array(
		'label'	=> __('Product Per Row','adventure-travelling'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));
	$wp_customize->add_setting('adventure_travelling_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'adventure_travelling_sanitize_number_absint'
	));
	$wp_customize->add_control('adventure_travelling_product_per_page',array(
		'label'	=> __('Product Per Page','adventure-travelling'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));
	$wp_customize->add_setting( 'adventure_travelling_product_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Adventure_Travelling_Toggle_Control( $wp_customize, 'adventure_travelling_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Shop page sidebar', 'adventure-travelling' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'adventure_travelling_product_sidebar',
	) ) );

	$wp_customize->add_setting('adventure_travelling_sale_tag_position',array(
        'default' => 'right',
        'sanitize_callback' => 'adventure_travelling_sanitize_choices'
	));
	$wp_customize->add_control('adventure_travelling_sale_tag_position',array(
        'type' => 'radio',
        'label'     => __('Sale Badge Position', 'adventure-travelling'),
        'description'   => __('This option work for Archieve Products', 'adventure-travelling'),
        'section' => 'woocommerce_product_catalog',
        'choices' => array(
            'left' => __('Left','adventure-travelling'),
            'right' => __('Right','adventure-travelling'),
        ),
	) );
	
	$wp_customize->add_setting( 'adventure_travelling_single_product_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Adventure_Travelling_Toggle_Control( $wp_customize, 'adventure_travelling_single_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Product page sidebar', 'adventure-travelling' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'adventure_travelling_single_product_sidebar',
	) ) );
	$wp_customize->add_setting( 'adventure_travelling_related_product', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'adventure_travelling_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Adventure_Travelling_Toggle_Control( $wp_customize,'adventure_travelling_related_product', array(
		'label'       => esc_html__( 'Show / Hide related product', 'adventure-travelling' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'adventure_travelling_related_product',
	) ) );

	//Page template settings
	$wp_customize->add_panel( 'adventure_travelling_page_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Page Template Settings', 'adventure-travelling' ),
	    'description' => __( 'Description of what this panel does.', 'adventure-travelling' ),
	) );

	// 404 PAGE
	$wp_customize->add_section('adventure_travelling_404_page_section',array(
		'title'         => __('404 Page', 'adventure-travelling'),
		'description'   => 'Here you can customize 404 Page content.',
		'panel' => 'adventure_travelling_page_panel_id'
	) );

	$wp_customize->add_setting('adventure_travelling_edit_404_title',array(
		'default'=> __('Oops! That page cant be found.','adventure-travelling'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('adventure_travelling_edit_404_title',array(
		'label'	=> __('Edit Title','adventure-travelling'),
		'section'=> 'adventure_travelling_404_page_section',
		'type'=> 'text',
	));

	$wp_customize->add_setting('adventure_travelling_edit_404_text',array(
		'default'=> __('It looks like nothing was found at this location. Maybe try a search?','adventure-travelling'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_travelling_edit_404_text',array(
		'label'	=> __('Edit Text','adventure-travelling'),
		'section'=> 'adventure_travelling_404_page_section',
		'type'=> 'text'
	));

	// Search Results
	$wp_customize->add_section('adventure_travelling_no_result_section',array(
		'title'         => __('Search Results', 'adventure-travelling'),
		'description'   => 'Here you can customize Search Result content.',
		'panel' => 'adventure_travelling_page_panel_id'
	) );

	$wp_customize->add_setting('adventure_travelling_edit_no_result_title',array(
		'default'=> __('Nothing Found','adventure-travelling'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('adventure_travelling_edit_no_result_title',array(
		'label'	=> __('Edit Title','adventure-travelling'),
		'section'=> 'adventure_travelling_no_result_section',
		'type'=> 'text',
	));

	$wp_customize->add_setting('adventure_travelling_edit_no_result_text',array(
		'default'=> __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','adventure-travelling'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('adventure_travelling_edit_no_result_text',array(
		'label'	=> __('Edit Text','adventure-travelling'),
		'section'=> 'adventure_travelling_no_result_section',
		'type'=> 'text'
	));

	// Header Image Height
    $wp_customize->add_setting(
        'adventure_travelling_header_image_height',
        array(
            'default'           => 350,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'adventure_travelling_header_image_height',
        array(
            'label'       => esc_html__( 'Header Image Height', 'adventure-travelling' ),
            'section'     => 'header_image',
            'type'        => 'number',
            'description' => esc_html__( 'Control the height of the header image. Default is 350px.', 'adventure-travelling' ),
            'input_attrs' => array(
                'min'  => 220,
                'max'  => 1000,
                'step' => 1,
            ),
        )
    );

    // Header Background Position
    $wp_customize->add_setting(
        'adventure_travelling_header_background_position',
        array(
            'default'           => 'center',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'adventure_travelling_header_background_position',
        array(
            'label'       => esc_html__( 'Header Background Position', 'adventure-travelling' ),
            'section'     => 'header_image',
            'type'        => 'select',
            'choices'     => array(
                'top'    => esc_html__( 'Top', 'adventure-travelling' ),
                'center' => esc_html__( 'Center', 'adventure-travelling' ),
                'bottom' => esc_html__( 'Bottom', 'adventure-travelling' ),
            ),
            'description' => esc_html__( 'Choose how you want to position the header image.', 'adventure-travelling' ),
        )
    );

    // Header Image Parallax Effect
    $wp_customize->add_setting(
        'adventure_travelling_header_background_attachment',
        array(
            'default'           => 1,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'adventure_travelling_header_background_attachment',
        array(
            'label'       => esc_html__( 'Header Image Parallax', 'adventure-travelling' ),
            'section'     => 'header_image',
            'type'        => 'checkbox',
            'description' => esc_html__( 'Add a parallax effect on page scroll.', 'adventure-travelling' ),
        )
    );
}
add_action( 'customize_register', 'adventure_travelling_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Adventure Travelling 1.0
 * @see adventure_travelling_customize_register()
 *
 * @return void
 */
function adventure_travelling_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Adventure Travelling 1.0
 * @see adventure_travelling_customize_register()
 *
 * @return void
 */
function adventure_travelling_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'ADVENTURE_TRAVELLING_PRO_THEME_NAME' ) ) {
	define( 'ADVENTURE_TRAVELLING_PRO_THEME_NAME', esc_html__( 'Travelling Pro Theme', 'adventure-travelling' ));
}
if ( ! defined( 'ADVENTURE_TRAVELLING_PRO_THEME_URL' ) ) {
	define( 'ADVENTURE_TRAVELLING_PRO_THEME_URL', esc_url('https://www.themespride.com/products/wordpress-travel-theme'));
}
if ( ! defined( 'ADVENTURE_TRAVELLING_DOCS_URL' ) ) {
	define( 'ADVENTURE_TRAVELLING_DOCS_URL', esc_url('https://page.themespride.com/demo/docs/adventure-traveling-lite/'));
}

if ( ! defined( 'ADVENTURE_TRAVELLING_DEMO_TITLE' ) ) {
	define( 'ADVENTURE_TRAVELLING_DEMO_TITLE', esc_html__( 'Click to View Site', 'adventure-travelling' ));
}
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Adventure_Travelling_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Adventure_Travelling_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Adventure_Travelling_Customize_Section_Pro(
				$manager,
				'adventure_travelling_section_pro',
				array(
					'priority'   => 9,
					'title'    => ADVENTURE_TRAVELLING_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'adventure-travelling' ),
					'pro_url'  => esc_url( ADVENTURE_TRAVELLING_PRO_THEME_URL, 'adventure-travelling' ),
				)
			)
		);

		// Register sections.
		$manager->add_section(
			new Adventure_Travelling_Customize_Section_Pro(
				$manager,
				'adventure_travelling_documentation',
				array(
					'priority'   => 500,
					'title'    => esc_html__( 'Theme Documentation', 'adventure-travelling' ),
					'pro_text' => esc_html__( 'Click Here', 'adventure-travelling' ),
					'pro_url'  => esc_url( ADVENTURE_TRAVELLING_DOCS_URL, 'adventure-travelling'),
				)
			)
		);

		// Register sections.
		$manager->add_section(
			new adventure_travelling_Customize_Section_Pro(
				$manager,
				'adventure_travelling_section_pro_demo',
				array(
					'priority'   => 9,
					'title'    => ADVENTURE_TRAVELLING_DEMO_TITLE,
					'pro_text' => esc_html__( 'View Site', 'adventure-travelling' ),
					'pro_url'  => esc_url( home_url() ),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'adventure-travelling-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'adventure-travelling-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Adventure_Travelling_Customize::get_instance();
