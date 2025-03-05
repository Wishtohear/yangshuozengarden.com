<?php 
function hotel_imperial_section_gallery( $wp_customize ){

	$option = wp_parse_args(  get_option( 'hotelone_option', array() ), hotelone_reset_data() );
		
		$wp_customize->add_section( 'gallery_setting' , array(
			'title'      => __('Section: Gallery', 'hotel-imperial'),
			'panel'  => 'frontpage_panel',
			'priority'       => 18,
		) );

			$wp_customize->add_setting( 'hotelone_option[hotelone_gallery_disable]' , array(
			'default'    => $option['hotelone_gallery_disable'],
			'sanitize_callback' => 'hotelone_sanitize_checkbox',
			'type'=>'option',
			));
			$wp_customize->add_control('hotelone_option[hotelone_gallery_disable]' , array(
			'label' => __('Hide Gallery Section?','hotel-imperial' ),
			'section' => 'gallery_setting',
			'type'=>'checkbox',
			) );

			$wp_customize->add_setting( 'hotelone_option[hotelone_gallerytitle]' , array(
			'default'    => $option['hotelone_gallerytitle'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('hotelone_option[hotelone_gallerytitle]' , array(
			'label' => __('Gallery Title','hotel-imperial' ),
			'section' => 'gallery_setting',
			'type'=>'text',
			) );

			$wp_customize->add_setting( 'hotelone_option[hotelone_gallerysubtitle]' , array(
			'default'    => $option['hotelone_gallerysubtitle'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('hotelone_option[hotelone_gallerysubtitle]' , array(
			'label' => __('Gallery Subtitle','hotel-imperial' ),
			'section' => 'gallery_setting',
			'type'=>'text',
			) );
			
			$wp_customize->add_setting( 'hotelone_option[hotelone_gallery_pageid]' , array(
			'default'    => $option['hotelone_gallery_pageid'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('hotelone_option[hotelone_gallery_pageid]' , array(
			'label' => __('Select A Page To Show Gallery','hotel-imperial' ),
			'section' => 'gallery_setting',
			'type'=>'dropdown-pages',
			) );

			$wp_customize->add_setting( 'hotelone_option[hotelone_gallery_column]' , array(
			'default'    => $option['hotelone_gallery_column'],
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option',
			));
			$wp_customize->add_control('hotelone_option[hotelone_gallery_column]' , array(
			'label' => __('Column Layout','hotel-imperial' ),
			'section' => 'gallery_setting',
			'type'=>'select',
			'choices'=>array(
				1 => 1,
				2 => 2,
				3 => 3,
				4 => 4,
				5 => 5,
				6 => 6,
			),
			) );
			
			$wp_customize->add_setting( 'hotelone_option[hotelone_gallery_bgcolor]', array(
                'sanitize_callback' => 'sanitize_text_field',
                'default' => '#ffffff',
                'transport' => 'postMessage',
				'type'=>'option',
            ) );
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hotelone_option[hotelone_gallery_bgcolor]',
                array(
                    'label'       => esc_html__( 'Background Color', 'hotel-imperial' ),
                    'section'     => 'gallery_setting',
                )
            ));

			$wp_customize->add_setting( 'hotelone_option[hotelone_gallery_bgimage]',
				array(
					'sanitize_callback' => 'esc_url_raw',
					'default'           => '',
					'type'=>'option',
				)
			);
			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,
				'hotelone_option[hotelone_gallery_bgimage]',
				array(
					'label' 		=> esc_html__('Background image', 'hotel-imperial'),
					'section' 		=> 'gallery_setting',
				)
			));
			
}
add_action( 'customize_register', 'hotel_imperial_section_gallery' );