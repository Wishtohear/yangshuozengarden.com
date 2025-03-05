<?php

if( !function_exists('hotelone_reset_data') ){
	function hotelone_reset_data(){
		$default_data = array(

			'switcher_hide' => true,
			'site_title_color' => '',
			'site_tagline_color' => '',
			'theme_color' => '#DAB26C',
			'hotelone_layout' => 'right',
			'hotelone_animation_hide' => false,
			'hotelone_btt_hide' => false,
			'hotelone_hide_g_font' => false,
			'disable_header_tb' => false,
			'hide_facebook_icon' => false,
			'facebook_url' => '#',
			'hide_twitter_icon' => false,
			'twitter_url' => '#',
			'hide_google_plus_icon' => false,
			'google_plus_url' => '#',
			'hide_houzz_icon' => false,
			'houzz_url' => '#',
			'social_target' => true,
			'phone' => '',
			'phone_url' => 'tel:{phone}',
			'email' => '',
			'email_url' => 'mailto:{email}',
			'header_top_bg_color' => '',
			'header_top_text_color' => '',
			'hotelone_header_width' => 'contained',
			'hotelone_header_position' => 'top',
			'hotelone_sticky_header_disable' => false,
			'hotelone_vertical_align_menu' => false,
			'hotelone_header_scroll_logo' => false,
			'hotelone_menu_padding' => 85,
			'navbar_bg_color' => '',
			'navbar_link_color' => '',
			'navbar_link_hover_color' => '',
			'hotelone_page_title_bar_hide' => '',
			'hotelone_page_cover_pd_top' => 100,
			'hotelone_page_cover_pd_bottom' => 100,
			'hotelone_page_cover_align' => 'center',
			'single_thumbnail' => '',
			'single_meta' => false,
			'footer_column_layout' => 4,
			'footer_widget_bg_color' => '',
			'footer_widget_text_color' => '',
			'footer_widget_link_hover_color' => '',
			'footer_widget_title_color' => '',
			'footer_copyright_text' => '',
			'footer_copyright_bg_color' => '',
			'footer_copyright_text_color' => '',
			'footer_copyright_link_color' => '',
			'footer_copyright_link_hover_color' => '',

			'hotelone_slider_disable' => false,
			'hotelone_slider_images' => hotelone_homepage_slider_default_data(),

			'hotelone_services_hide' => false,
			'hotelone_services_title' => __('Our <span>Services</span>','hotelone'),
			'hotelone_services_subtitle' => __('Lorem ipsum dolor sit ame sed do eiusmod tempor incididunt ut labore et dolore','hotelone'),
			'hotelone_service_layout' => 4,
			'service_title_color' => '',
			'service_subtitle_color' => '',
			'hotelone_services' => hotelone_homepage_service_default_data(),
			'hotelone_service_icon_size' => '5x',
			'hotelone_services_mbtn_text' => __('View More Services <i class="fa fa-angle-double-right"></i>', 'hotelone'),
			'hotelone_services_mbtn_url' => '#',

			'hotelone_room_hide' => false,
			'hotelone_room_title' => __('Our <span>Rooms</span>', 'hotelone'),
			'hotelone_room_subtitle' => __('Lorem ipsum dolor sit ame sed do eiusmod tempor incididunt ut labore et dolore.', 'hotelone'),
			'room_overlay_hide' => false,
			'hotelone_room_layout' => 4,
			'room_title_color' => '',
			'room_subtitle_color' => '',
			'hotelone_room' => hotelone_homepage_room_default_data(),

			'hotelone_calltoaction_hide' => false,
			'hotelone_calltoaction_title' => __('WordPress Theme For Hotels', 'hotelone'),
			'hotelone_calltoaction_subtitle' => __('Lorem ipsum dolor sit ame sed do eiusmod tempor incididunt ut labore et dolore.', 'hotelone'),
			'hotelone_calltoaction_btn_text' => esc_html__('Book Now', 'hotelone'),
			'hotelone_calltoaction_btn_URL' => '#',
			'calltoaction_title_color' => '',
			'calltoaction_subtitle_color' => '',
			'hotelone_calltoaction_bgcolor' => '',
			'hotelone_calltoaction_bgimage' => '',

			'hotelone_team_hide' => false,
			'hotelone_team_title' => __('Our <span>Teams</span>', 'hotelone'),
			'hotelone_team_subtitle' => __('Lorem ipsum dolor sit ame sed do eiusmod tempor incididunt ut labore et dolore.', 'hotelone'),
			'team_title_color' => '',
			'team_subtitle_color' => '',
			'hotelone_team_layout' => 4,
			'hotelone_team_members' => hotelone_homepage_team_default_data(),

			'hotelone_testimonial_hide' => false,
			'hotelone_testimonial_title' => __('Customers <span>Revews</span>', 'hotelone'),
			'hotelone_testimonial_subtitle' => __('Lorem ipsum dolor sit ame sed do eiusmod tempor incididunt ut labore et dolore.', 'hotelone'),
			'testimonial_title_color' => '',
			'testimonial_subtitle_color' => '',
			'hotelone_testimonial_items' => hotelone_homepage_testimonial_default_data(),
			'hotelone_team_social_icons_hide' => false,
			'hotelone_testimonial_bgcolor' => '',
			'hotelone_testimonial_bgimage' => get_template_directory_uri().'/images/testimonial.jpg',

			'hotelone_news_hide' => '',			
			'hotelone_news_title' => __('Latest <span>Blogs</span>','hotelone'),			
			'hotelone_news_subtitle' => __('Lorem ipsum dolor sit ame sed do eiusmod tempor incididunt ut labore et dolore','hotelone'),	
			'hotelone_news_layout' => 4,			
			'news_title_color' => '',			
			'news_subtitle_color' => '',			
			'hotelone_news_no' => 3,			
			'hotelone_news_cat' => 0,		
			'hotelone_news_orderby' => 'date',			
			'hotelone_news_order' => 'desc',			
			'hotelone_news_more_link' => '',			
			'hotelone_news_more_text' => __('Read More', 'hotelone'),			

			'button_font_size' => 16,
			'button_bg_color' => '',		
			'button_text_color' => '',
			'button_bg_hover_color' => '',
			'button_text_hover_color' => '',
			'button_border_color' => '',
			'button_border_hover_color' => '',
			'button_bold' => 'bold', // normal
			'button_padding' => '5, 10, 5, 10',
			'button_border_radius' => 2,

			'typo_subset' => 'latin',
			'typo_p_fontfamily' => 'Roboto',
			'typo_p_fontsize' => '',
			'typo_p_fontweight' => '',
			'typo_p_lineheight' => '',
			'typo_p_letterspace' => '',
			'typo_p_textdecoration' => '',
			'typo_p_texttransform' => '',
			'typo_p_color' => '',
			
			'typo_m_fontfamily' => 'Roboto',
			'typo_m_fontsize' => '',
			'typo_m_fontweight' => '',
			'typo_m_lineheight' => '',
			'typo_m_letterspace' => '',
			'typo_m_textdecoration' => '',
			'typo_m_texttransform' => '',
			'typo_m_color' => '',
			
			'typo_h_fontfamily' => 'Roboto',
			'typo_h1_fontsize' => '',
			'typo_h2_fontsize' => '',
			'typo_h3_fontsize' => '',
			'typo_h4_fontsize' => '',
			'typo_h5_fontsize' => '',
			'typo_h6_fontsize' => '',
		);

		$default_data = apply_filters('hotelone_reset_data',$default_data);
		return $default_data;
	}

	$GLOBALS['hotelone_options_default'] = hotelone_reset_data();
}

function hotelone_get_pages(){
	$pages  =  get_pages();
	$hotelone_option_pages = array();
	$hotelone_option_pages[0] = esc_html__('Select Page','hotelone');
	foreach( $pages as $page ){
		$hotelone_option_pages[ $page->ID ] = $page->post_title;
	}

	return $hotelone_option_pages;
}

function hotelone_homepage_slider_default_data(){
	return  array(
	            array(
	            	'image' => array(
                    	'url'=> get_template_directory_uri().'/images/slide1.jpg',
                    ),
	                'large_text' => 'Welcome To Hotelone',
	                'small_text' => 'Lorem ipsum dolor sit ame sed do eiusmod tempor incididunt ut labore et dolore.',
	                'buttontext1' => 'Book Now',
                    'buttonlink1' => '#',
	                'buttontarget1' => false,
	                'buttontext2' => 'Explore Now',
                    'buttonlink2' => '#',
	                'buttontarget2' => false,
	            ),
	    		array(
	            	'image' => array(
                    	'url'=> get_template_directory_uri().'/images/slide1.jpg',
                    ),
	                'large_text' => 'Luxury Hotel',
	                'small_text' => 'Lorem ipsum dolor sit ame sed do eiusmod tempor incididunt ut labore et dolore.',
	                'buttontext1' => 'Book Now',
                    'buttonlink1' => '#',
	                'buttontarget1' => false,
	                'buttontext2' => 'Explore Now',
                    'buttonlink2' => '#',
	                'buttontarget2' => false,
	            ),
	        );
}

function hotelone_homepage_service_default_data(){
	return  array(
	            array(
	            	'content_page' => 0,
	            	'icon_type' => 'icon',
	            	'icon' => 'fa fa fa-glass',
	            	'image' => '',
	                'title' => 'Room Breakfast',
	                'desc' => 'Lorem Ipsum passage, and going through the cites of the word.',
	                'button_text' => 'Learn More',
                    'button_url' => '#',
	                'target' => false,
	            ),
	    		array(
	    			'content_page' => 0,
	    			'icon_type' => 'icon',
	            	'icon' => 'fa fa fa-car',
	            	'image' => '',
	                'title' => 'Parking',
	                'desc' => 'Lorem Ipsum passage, and going through the cites of the word.',
	                'button_text' => 'Learn More',
                    'button_url' => '#',
	                'target' => false,
	            ),
	            array(
	            	'content_page' => 0,
	            	'icon_type' => 'icon',
	            	'icon' => 'fa fa fa-wifi',
	            	'image' => '',
	                'title' => 'WiFi',
	                'desc' => 'Lorem Ipsum passage, and going through the cites of the word.',
	                'button_text' => 'Learn More',
                    'button_url' => '#',
	                'target' => false,
	            ),
	        );
}

function hotelone_homepage_room_default_data(){
	return  array(
	            array(
	            	'content_page' => 0,
	            	'icon_type' => 'image',
	            	'icon' => 'fa fa fa-glass',
	            	'image' => array(
                    	'url'=> get_template_directory_uri().'/images/room-1.jpg',
                    ),
	                'title' => 'Single Room',
	                'desc' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do…',
	                'rating' => 5,
	                'person' => 4,
	                'price' => 100,
	                'enable_link' => true,
	                'button_text' => 'View Details',
                    'button_url' => '#',
	                'target' => false,
	            ),
	    		array(
	    			'content_page' => 0,
	    			'icon_type' => 'image',
	    			'icon' => 'fa fa fa-glass',
	            	'image' => array(
                    	'url'=> get_template_directory_uri().'/images/room-2.jpg',
                    ),
	                'title' => 'Double Room',
	                'desc' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do…',
	                'rating' => 5,
	                'person' => 4,
	                'price' => 180,
	                'enable_link' => true,
	                'button_text' => 'View Details',
                    'button_url' => '#',
	                'target' => false,
	            ),
	            array(
	            	'content_page' => 0,
	            	'icon_type' => 'image',
	            	'icon' => 'fa fa fa-glass',
	            	'image' => array(
                    	'url'=> get_template_directory_uri().'/images/room-3.jpg',
                    ),
	                'title' => 'Family Apartment',
	                'desc' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do…',
	                'rating' => 5,
	                'person' => 4,
	                'price' => 299,
	                'enable_link' => true,
	                'button_text' => 'View Details',
                    'button_url' => '#',
	                'target' => false,
	            ),
	        );
}

function hotelone_homepage_team_default_data(){
	return  array(
	            array(
	            	'image' => array(
                    	'url'=> get_template_directory_uri().'/images/team1.jpg',
                    ),
	                'name' => 'Single Room',
	                'designation' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do…',
	                'facebook_hide' => false,
	                'facebook' => '#',
	                'twitter_hide' => false,
	                'twitter' => '#',
                    'link' => '#',
	            ),
	    		array(
	            	'image' => array(
                    	'url'=> get_template_directory_uri().'/images/team2.jpg',
                    ),
	                'name' => 'Single Room',
	                'designation' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do…',
	                'facebook_hide' => false,
	                'facebook' => '#',
	                'twitter_hide' => false,
	                'twitter' => '#',
                    'link' => '#',
	            ),
	            array(
	            	'image' => array(
                    	'url'=> get_template_directory_uri().'/images/team3.jpg',
                    ),
	                'name' => 'Single Room',
	                'designation' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do…',
	                'facebook_hide' => false,
	                'facebook' => '#',
	                'twitter_hide' => false,
	                'twitter' => '#',
                    'link' => '#',
	            ),
	        );
}

function hotelone_homepage_testimonial_default_data(){
	return  array(
	            array(
	            	'photo' => array(
                    	'url'=> get_template_directory_uri().'/images/testi-1.jpg',
                    ),
	                'name' => 'Kely Wathson',
	                'review' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.',
	                'designation' => 'CEO',
	                'link' => '#',
	            ),
	    		array(
	            	'photo' => array(
                    	'url'=> get_template_directory_uri().'/images/testi-1.jpg',
                    ),
	                'name' => 'Kely Wathson',
	                'review' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.',
	                'designation' => 'CEO',
	                'link' => '#',
	            ),
	        );
}