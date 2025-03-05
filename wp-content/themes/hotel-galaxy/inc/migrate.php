<?php 
add_action( 'after_setup_theme', 'Hotelgalaxy_DB_Migrate' );
function Hotelgalaxy_DB_Migrate() {	
	add_option('hotelgalaxy_new_theme','yes');
	$new_data = array();
	$old_data = get_option('hotel_galaxy_option');	
	$save_old_data = add_option('old_hotelgalaxy_data',$old_data);

	if( !empty($old_data) ){

		if(!empty($old_data['sticky_menu'])){
			set_theme_mod( 'sticky_menu',$old_data['sticky_menu']);
		}

		if(!empty($old_data['home_service_section_header'])){
			set_theme_mod( 'service_section_title',$old_data['home_service_section_header']);
		}

		if(!empty($old_data['home_service_section_sub_header'])){
			set_theme_mod( 'service_section_subtitle',$old_data['home_service_section_sub_header']);
		}

		if(!empty($old_data['home_room_section_header'])){
			set_theme_mod( 'room_section_title',$old_data['home_room_section_header']);
		}

		if(!empty($old_data['home_room_section_sub_header'])){
			set_theme_mod( 'room_section_subtitle',$old_data['home_room_section_sub_header']);
		}

		if(!empty($old_data['room_button_text'])){
			set_theme_mod( 'room_button_text',$old_data['room_button_text']);
		}		

		if(!empty($old_data['home_blog_section_header'])){
			set_theme_mod( 'blog_section_title',$old_data['home_blog_section_header']);
		}

		if(!empty($old_data['home_blog_section_sub_header'])){
			set_theme_mod( 'blog_section_subtitle',$old_data['home_blog_section_sub_header']);
		}

		if(!empty($old_data['home_blog_category'])){
			set_theme_mod( 'hotelg_blog_category',$old_data['home_blog_category']);
		}

		// header contact 
		if(!empty($old_data['information_text_1']) || !empty($old_data['information_text_2'])){			

			set_theme_mod( 'header_office_contents',json_encode(array(
				array(					
					'icon_value'      => (!empty($old_data['information_title_1'])) ? esc_html($old_data['information_title_1']) : esc_html__('fa-home','hotel-galaxy'),
					'title'           => (!empty($old_data['information_text_1'])) ? esc_html($old_data['information_text_1']) : esc_html__('California, United States','hotel-galaxy'),		
					'id'              => 'customizer_repeater_office_contact_001',
					
				),
				array(					
					'icon_value'      => (!empty($old_data['information_title_2'])) ? esc_html($old_data['information_title_2']) : esc_html__('fa-phone','hotel-galaxy'),
					'title'           => (!empty($old_data['information_text_2'])) ? esc_html($old_data['information_text_2']) : esc_html__('+00-1234567890','hotel-galaxy'),		
					'id'              => 'customizer_repeater_office_contact_002',
					
				),	
			)));
		}

		// social media
		set_theme_mod( 'socialmedia_contents', json_encode(array(
			array(					
				'icon_value'    =>  (!empty($old_data['socialmedia_icon_1'])) ? esc_html($old_data['socialmedia_icon_1']) : esc_html__('fa-facebook','hotel-galaxy'),					
				'link'	  		=> (!empty($old_data['socialmedia_url_1'])) ? esc_html($old_data['socialmedia_url_1']) : esc_html__('#','hotel-galaxy'),	
				'id'            => 'customizer_repeater_socialmedia_icon_001',					
			),

			array(					
				'icon_value'    =>  (!empty($old_data['socialmedia_icon_2'])) ? esc_html($old_data['socialmedia_icon_2']) : esc_html__('fa-twitter','hotel-galaxy'),					
				'link'	  		=> (!empty($old_data['socialmedia_url_2'])) ? esc_html($old_data['socialmedia_url_2']) : esc_html__('#','hotel-galaxy'),	
				'id'            => 'customizer_repeater_socialmedia_icon_002',					
			),

			array(					
				'icon_value'    =>  (!empty($old_data['socialmedia_icon_3'])) ? esc_html($old_data['socialmedia_icon_3']) : esc_html__('fa-instagram','hotel-galaxy'),					
				'link'	  		=> (!empty($old_data['socialmedia_url_3'])) ? esc_html($old_data['socialmedia_url_3']) : esc_html__('#','hotel-galaxy'),	
				'id'            => 'customizer_repeater_socialmedia_icon_003',					
			),

			array(					
				'icon_value'    =>  (!empty($old_data['socialmedia_icon_4'])) ? esc_html($old_data['socialmedia_icon_4']) : esc_html__('fa-skype','hotel-galaxy'),					
				'link'	  		=> (!empty($old_data['socialmedia_url_4'])) ? esc_html($old_data['socialmedia_url_4']) : esc_html__('#','hotel-galaxy'),	
				'id'            => 'customizer_repeater_socialmedia_icon_004',					
			),

			array(					
				'icon_value'    =>  (!empty($old_data['socialmedia_icon_5'])) ? esc_html($old_data['socialmedia_icon_5']) : esc_html__('fa-youtube','hotel-galaxy'),					
				'link'	  		=> (!empty($old_data['socialmedia_url_5'])) ? esc_html($old_data['socialmedia_url_5']) : esc_html__('#','hotel-galaxy'),	
				'id'            => 'customizer_repeater_socialmedia_icon_005',					
			),

		)));		

		// slider
		set_theme_mod( 'slider_contents', hotelgalaxy_slider_oldTonew( $old_data ) );

		//service
		set_theme_mod('service_contents', hotelgalaxy_service_oldTonew() );

		// now delete old theme option
		if(!empty($save_old_data)){
			delete_option('hotel_galaxy_option');
		}			

	}	
}

// old silder value 
function hotelgalaxy_slider_oldTonew( $old_data ){
	$old_slider_value = array();
	$new_slider_value = array();
	$arg = array('post_type'=>'hg_slider');
	$sliders = new WP_Query($arg);
	if( $sliders->have_posts() ){
		while( $sliders->have_posts() ) : $sliders->the_post();
			$old_slider_value = get_post_meta( get_the_ID(), 'hg_slider_settings_'.get_the_ID() );			
		endwhile;
	}	

	foreach( $old_slider_value as $i => $slider ){
		$id = $i++;
		$new_slider_value[] = array(					
			'title'	  	=>  esc_html($slider['rating'] ),
			'subtitle'	=>  esc_html($slider['title'] ),
			'subtitle2' => esc_html__( 'Incredible Views', 'hotel-galaxy' ),
			'text'	  	=>  esc_html( $slider['description'] ),	
			'text2'	  	=>  (!empty($old_data['slider_button_text'])) ? esc_html($old_data['slider_button_text']) : esc_html__('View All','hotel-galaxy'),				
			'link'	  	=>  $slider['url'],				
			'image_url' => esc_url(get_the_post_thumbnail_url($slider['id'], 'full')),				
			'id'        => 'customizer_repeater_slider_content_00'.$id,					
		);
	}
	return json_encode($new_slider_value);
}


// service
function hotelgalaxy_service_oldTonew(){
	$new_service_value = array();
	$old_service_value = get_option('widget_hotel_galaxy_service_widget');
	foreach( $old_service_value as $i => $service ){
		$id = $i++;
		if (!is_int($id)) {
			continue;
		}
		$hgpluginPath = 'webdzier-companion/webdzier-companion.php';
		if ( is_plugin_active( $hgpluginPath ) ) { 
		$new_service_value[] = array(					
			'icon_value'    =>  esc_html($service['icon']),
			'title'	  		=>  esc_html( $service['title'] ),
			'text'	  		=>  esc_html($service['desc'] ),
			'image_url'     => esc_url(WEBDZIER_COMPANION_PLUGIN_URL . 'inc/hotelgalaxy/images/service/service-4.jpg'),
			'id'            => 'customizer_repeater_service_content_00'.$id,
		);
	}
	}
	return json_encode($new_service_value);	
}
