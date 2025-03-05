<?php

    $hotel_booking_lite_theme_css= "";

    /*--------------------------- Scroll To Top Positions -------------------*/

    $hotel_booking_lite_scroll_position = get_theme_mod( 'hotel_booking_lite_scroll_top_position','Right');
    if($hotel_booking_lite_scroll_position == 'Right'){
        $hotel_booking_lite_theme_css .='#button{';
            $hotel_booking_lite_theme_css .='right: 20px;';
        $hotel_booking_lite_theme_css .='}';
    }else if($hotel_booking_lite_scroll_position == 'Left'){
        $hotel_booking_lite_theme_css .='#button{';
            $hotel_booking_lite_theme_css .='left: 20px;right: auto;';
        $hotel_booking_lite_theme_css .='}';
    }else if($hotel_booking_lite_scroll_position == 'Center'){
        $hotel_booking_lite_theme_css .='#button{';
            $hotel_booking_lite_theme_css .='right: auto;left: 50%; transform:translateX(-50%);';
        $hotel_booking_lite_theme_css .='}';
    }

    /*--------------------------- Scroll To Top Border Radius -------------------*/

    $hotel_booking_lite_scroll_to_top_border_radius = get_theme_mod('hotel_booking_lite_scroll_to_top_border_radius');
    $hotel_booking_lite_scroll_bg_color = get_theme_mod('hotel_booking_lite_scroll_bg_color');
    $hotel_booking_lite_scroll_color = get_theme_mod('hotel_booking_lite_scroll_color');
    $hotel_booking_lite_scroll_font_size = get_theme_mod('hotel_booking_lite_scroll_font_size');
    if($hotel_booking_lite_scroll_to_top_border_radius != false || $hotel_booking_lite_scroll_bg_color != false || $hotel_booking_lite_scroll_color != false || $hotel_booking_lite_scroll_font_size != false){
        $hotel_booking_lite_theme_css .='#colophon a#button{';
            $hotel_booking_lite_theme_css .='border-radius: '.esc_attr($hotel_booking_lite_scroll_to_top_border_radius).'px; background-color: '.esc_attr($hotel_booking_lite_scroll_bg_color).'; color: '.esc_attr($hotel_booking_lite_scroll_color).' !important; font-size: '.esc_attr($hotel_booking_lite_scroll_font_size).'px;';
        $hotel_booking_lite_theme_css .='}';
    }

    /*--------------------------- Slider Image Opacity -------------------*/

    $hotel_booking_lite_slider_img_opacity = get_theme_mod( 'hotel_booking_lite_slider_opacity_color','');
    if($hotel_booking_lite_slider_img_opacity == '0'){
        $hotel_booking_lite_theme_css .='.slider-box img{';
            $hotel_booking_lite_theme_css .='opacity:0';
        $hotel_booking_lite_theme_css .='}';
        }else if($hotel_booking_lite_slider_img_opacity == '0.1'){
        $hotel_booking_lite_theme_css .='.slider-box img{';
            $hotel_booking_lite_theme_css .='opacity:0.1';
        $hotel_booking_lite_theme_css .='}';
        }else if($hotel_booking_lite_slider_img_opacity == '0.2'){
        $hotel_booking_lite_theme_css .='.slider-box img{';
            $hotel_booking_lite_theme_css .='opacity:0.2';
        $hotel_booking_lite_theme_css .='}';
        }else if($hotel_booking_lite_slider_img_opacity == '0.3'){
        $hotel_booking_lite_theme_css .='.slider-box img{';
            $hotel_booking_lite_theme_css .='opacity:0.3';
        $hotel_booking_lite_theme_css .='}';
        }else if($hotel_booking_lite_slider_img_opacity == '0.4'){
        $hotel_booking_lite_theme_css .='.slider-box img{';
            $hotel_booking_lite_theme_css .='opacity:0.4';
        $hotel_booking_lite_theme_css .='}';
        }else if($hotel_booking_lite_slider_img_opacity == '0.5'){
        $hotel_booking_lite_theme_css .='.slider-box img{';
            $hotel_booking_lite_theme_css .='opacity:0.5';
        $hotel_booking_lite_theme_css .='}';
        }else if($hotel_booking_lite_slider_img_opacity == '0.6'){
        $hotel_booking_lite_theme_css .='.slider-box img{';
            $hotel_booking_lite_theme_css .='opacity:0.6';
        $hotel_booking_lite_theme_css .='}';
        }else if($hotel_booking_lite_slider_img_opacity == '0.7'){
        $hotel_booking_lite_theme_css .='.slider-box img{';
            $hotel_booking_lite_theme_css .='opacity:0.7';
        $hotel_booking_lite_theme_css .='}';
        }else if($hotel_booking_lite_slider_img_opacity == '0.8'){
        $hotel_booking_lite_theme_css .='.slider-box img{';
            $hotel_booking_lite_theme_css .='opacity:0.8';
        $hotel_booking_lite_theme_css .='}';
        }else if($hotel_booking_lite_slider_img_opacity == '0.9'){
        $hotel_booking_lite_theme_css .='.slider-box img{';
            $hotel_booking_lite_theme_css .='opacity:0.9';
        $hotel_booking_lite_theme_css .='}';
        }

    /*---------------- Single post Settings ------------------*/

    $hotel_booking_lite_single_post_navigation_show_hide = get_theme_mod('hotel_booking_lite_single_post_navigation_show_hide',true);
    if($hotel_booking_lite_single_post_navigation_show_hide != true){
        $hotel_booking_lite_theme_css .='.nav-links{';
            $hotel_booking_lite_theme_css .='display: none;';
        $hotel_booking_lite_theme_css .='}';
    }

     /*---------------------------Slider Height ------------*/

    $hotel_booking_lite_slider_img_height = get_theme_mod('hotel_booking_lite_slider_img_height');
    if($hotel_booking_lite_slider_img_height != false){
        $hotel_booking_lite_theme_css .='#top-slider .owl-carousel .owl-item img{';
            $hotel_booking_lite_theme_css .='height: '.esc_attr($hotel_booking_lite_slider_img_height).';';
        $hotel_booking_lite_theme_css .='}';
    }

    /*--------------------------- Woocommerce Product Border Radius -------------------*/

    $hotel_booking_lite_woo_product_border_radius = get_theme_mod('hotel_booking_lite_woo_product_border_radius', 0);
    if($hotel_booking_lite_woo_product_border_radius != false){
        $hotel_booking_lite_theme_css .='.woocommerce ul.products li.product a img{';
            $hotel_booking_lite_theme_css .='border-radius: '.esc_attr($hotel_booking_lite_woo_product_border_radius).'px;';
        $hotel_booking_lite_theme_css .='}';
    }

    /*--------------------------- Footer background image -------------------*/

    $hotel_booking_lite_footer_bg_image = get_theme_mod('hotel_booking_lite_footer_bg_image');
    if($hotel_booking_lite_footer_bg_image != false){
        $hotel_booking_lite_theme_css .='#colophon{';
            $hotel_booking_lite_theme_css .='background: url('.esc_attr($hotel_booking_lite_footer_bg_image).')!important;';
        $hotel_booking_lite_theme_css .='}';
    }

    /*--------------------------- Copyright Background Color -------------------*/

    $hotel_booking_lite_copyright_background_color = get_theme_mod('hotel_booking_lite_copyright_background_color');
    if($hotel_booking_lite_copyright_background_color != false){
        $hotel_booking_lite_theme_css .='.footer_info{';
            $hotel_booking_lite_theme_css .='background-color: '.esc_attr($hotel_booking_lite_copyright_background_color).' !important;';
        $hotel_booking_lite_theme_css .='}';
    } 

    /*--------------------------- Site Title And Tagline Color -------------------*/

    $hotel_booking_lite_logo_title_color = get_theme_mod('hotel_booking_lite_logo_title_color');
    if($hotel_booking_lite_logo_title_color != false){
        $hotel_booking_lite_theme_css .='p.site-title a, .navbar-brand a{';
            $hotel_booking_lite_theme_css .='color: '.esc_attr($hotel_booking_lite_logo_title_color).' !important;';
        $hotel_booking_lite_theme_css .='}';
    }

    $hotel_booking_lite_logo_tagline_color = get_theme_mod('hotel_booking_lite_logo_tagline_color');
    if($hotel_booking_lite_logo_tagline_color != false){
        $hotel_booking_lite_theme_css .='.logo p.site-description, .navbar-brand p{';
            $hotel_booking_lite_theme_css .='color: '.esc_attr($hotel_booking_lite_logo_tagline_color).'  !important;';
        $hotel_booking_lite_theme_css .='}';
    }

    /*--------------------------- Footer Widget Content Alignment -------------------*/

    $hotel_booking_lite_footer_widget_content_alignment = get_theme_mod( 'hotel_booking_lite_footer_widget_content_alignment','Left');
    if($hotel_booking_lite_footer_widget_content_alignment == 'Left'){
        $hotel_booking_lite_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
        $hotel_booking_lite_theme_css .='text-align: left;';
        $hotel_booking_lite_theme_css .='}';
    }else if($hotel_booking_lite_footer_widget_content_alignment == 'Center'){
        $hotel_booking_lite_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $hotel_booking_lite_theme_css .='text-align: center;';
        $hotel_booking_lite_theme_css .='}';
    }else if($hotel_booking_lite_footer_widget_content_alignment == 'Right'){
        $hotel_booking_lite_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $hotel_booking_lite_theme_css .='text-align: right;';
        $hotel_booking_lite_theme_css .='}';
    }

    /*--------------------------- Copyright Content Alignment -------------------*/

    $hotel_booking_lite_copyright_content_alignment = get_theme_mod( 'hotel_booking_lite_copyright_content_alignment','Right');
    if($hotel_booking_lite_copyright_content_alignment == 'Left'){
        $hotel_booking_lite_theme_css .='.footer-menu-left{';
        $hotel_booking_lite_theme_css .='text-align: left;';
        $hotel_booking_lite_theme_css .='}';
    }else if($hotel_booking_lite_copyright_content_alignment == 'Center'){
        $hotel_booking_lite_theme_css .='.footer-menu-left{';
            $hotel_booking_lite_theme_css .='text-align: center;';
        $hotel_booking_lite_theme_css .='}';
    }else if($hotel_booking_lite_copyright_content_alignment == 'Right'){
        $hotel_booking_lite_theme_css .='.footer-menu-left{';
            $hotel_booking_lite_theme_css .='text-align: right;';
        $hotel_booking_lite_theme_css .='}';
    }

    /*------------------ Nav Menus -------------------*/

    $hotel_booking_lite_nav_menu = get_theme_mod( 'hotel_booking_lite_nav_menu_text_transform','Capitalize');
    if($hotel_booking_lite_nav_menu == 'Capitalize'){
        $hotel_booking_lite_theme_css .='.site-navigation .primary-menu > li > a, .site-navigation .primary-menu .link-icon-wrapper a{';
            $hotel_booking_lite_theme_css .='text-transform:Capitalize;';
        $hotel_booking_lite_theme_css .='}';
    }
    if($hotel_booking_lite_nav_menu == 'Lowercase'){
        $hotel_booking_lite_theme_css .='.site-navigation .primary-menu > li > a, .site-navigation .primary-menu .link-icon-wrapper a{';
            $hotel_booking_lite_theme_css .='text-transform:Lowercase;';
        $hotel_booking_lite_theme_css .='}';
    }
    if($hotel_booking_lite_nav_menu == 'Uppercase'){
        $hotel_booking_lite_theme_css .='.site-navigation .primary-menu > li > a, .site-navigation .primary-menu .link-icon-wrapper a{';
            $hotel_booking_lite_theme_css .='text-transform:Uppercase;';
        $hotel_booking_lite_theme_css .='}';
    }

    $hotel_booking_lite_menu_font_size = get_theme_mod( 'hotel_booking_lite_menu_font_size');
    if($hotel_booking_lite_menu_font_size != ''){
        $hotel_booking_lite_theme_css .='.site-navigation .primary-menu > li > a, .site-navigation .primary-menu .link-icon-wrapper a{';
            $hotel_booking_lite_theme_css .='font-size: '.esc_attr($hotel_booking_lite_menu_font_size).'px;';
        $hotel_booking_lite_theme_css .='}';
    }

    $hotel_booking_lite_nav_menu_font_weight = get_theme_mod( 'hotel_booking_lite_nav_menu_font_weight',600);
    if($hotel_booking_lite_menu_font_size != ''){
        $hotel_booking_lite_theme_css .='.site-navigation .primary-menu > li > a, .site-navigation .primary-menu .link-icon-wrapper a{';
            $hotel_booking_lite_theme_css .='font-weight: '.esc_attr($hotel_booking_lite_nav_menu_font_weight).';';
        $hotel_booking_lite_theme_css .='}';
    }

    /*------------------ Slider CSS -------------------*/

    $hotel_booking_lite_slider_content_layout = get_theme_mod( 'hotel_booking_lite_slider_content_layout','Left');
    if($hotel_booking_lite_slider_content_layout == 'Left'){
        $hotel_booking_lite_theme_css .='.slider-inner-box, #top-slider .slider-inner-box p{';
            $hotel_booking_lite_theme_css .='text-align : left;';
        $hotel_booking_lite_theme_css .='}';
    }
    if($hotel_booking_lite_slider_content_layout == 'Center'){
        $hotel_booking_lite_theme_css .='.slider-inner-box, #top-slider .slider-inner-box p{';
            $hotel_booking_lite_theme_css .='text-align : center;';
        $hotel_booking_lite_theme_css .='}';
    }
    if($hotel_booking_lite_slider_content_layout == 'Right'){
        $hotel_booking_lite_theme_css .='.slider-inner-box, #top-slider .slider-inner-box p{';
            $hotel_booking_lite_theme_css .='text-align : right;';
        $hotel_booking_lite_theme_css .='}';
    }