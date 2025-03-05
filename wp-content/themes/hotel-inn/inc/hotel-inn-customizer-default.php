<?php
if (!function_exists('hotel_inn_theme_options')) :
    function hotel_inn_theme_options()
    {
        $defaults = array(

            //banner section
            'facebook' => '',
            'twitter' => '',
            'instagram' => '',
            'pinterest' => '',
            'youtube' => '',
            'email' => '',
          
            'header_phone' => '',
            'banner_title' => '',
            'banner_button_txt' => '',
            'banner_button_url' => '',
            'banner_bg_image' => '',
            'about_show' => 1,
            'choose_about_page' => '',
            'about_title' => '',
            'about_additional_image' => '',
            'explore_show' => 1,
            'explore_title' => '',
            'explore_desc' => '',
            'explore_category' => '',
            'cta_show' => 1,
            'cta_title' => '',
            'cta_button_txt' => '',
            'cta_button_url' => '',
            'cta_bg_image' => '',
            'room_show' => 1,
            'room_title' => '',
            'room_desc' => '',
            'room_category' => '',
            'blog_show' => 1,
            'blog_title' => '',
            'blog_desc' => '',
            'blog_category' => '',
            'show_prefooter' => 1,
            'copyright_text' => '',


        );

        $options = get_option('hotel_inn_theme_options', $defaults);

        //Parse defaults again - see comments
        $options = wp_parse_args($options, $defaults);

        return $options;
    }
endif;
