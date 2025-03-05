<?php
	
$adventure_travelling_tp_theme_css = '';

$adventure_travelling_tp_color_option = get_theme_mod('adventure_travelling_tp_color_option');

// 1st color
$adventure_travelling_tp_color_option = get_theme_mod('adventure_travelling_tp_color_option', '#faac24');
if ($adventure_travelling_tp_color_option) {
    $adventure_travelling_tp_theme_css .= ':root {';
    $adventure_travelling_tp_theme_css .= '--color-primary1: ' . esc_attr($adventure_travelling_tp_color_option) . ';';
    $adventure_travelling_tp_theme_css .= '}';
}

//Preloader
$adventure_travelling_tp_preloader_color1_option = get_theme_mod('adventure_travelling_tp_preloader_color1_option');

if($adventure_travelling_tp_preloader_color1_option != false){
$adventure_travelling_tp_theme_css .='.center1{';
	$adventure_travelling_tp_theme_css .='border-color: '.esc_attr($adventure_travelling_tp_preloader_color1_option).' !important;';
$adventure_travelling_tp_theme_css .='}';
}
if($adventure_travelling_tp_preloader_color1_option != false){
$adventure_travelling_tp_theme_css .='.center1 .ring::before{';
	$adventure_travelling_tp_theme_css .='background: '.esc_attr($adventure_travelling_tp_preloader_color1_option).' !important;';
$adventure_travelling_tp_theme_css .='}';
}

$adventure_travelling_tp_preloader_color2_option = get_theme_mod('adventure_travelling_tp_preloader_color2_option');

if($adventure_travelling_tp_preloader_color2_option != false){
$adventure_travelling_tp_theme_css .='.center2{';
	$adventure_travelling_tp_theme_css .='border-color: '.esc_attr($adventure_travelling_tp_preloader_color2_option).' !important;';
$adventure_travelling_tp_theme_css .='}';
}
if($adventure_travelling_tp_preloader_color2_option != false){
$adventure_travelling_tp_theme_css .='.center2 .ring::before{';
	$adventure_travelling_tp_theme_css .='background: '.esc_attr($adventure_travelling_tp_preloader_color2_option).' !important;';
$adventure_travelling_tp_theme_css .='}';
}

//Footer
$adventure_travelling_tp_preloader_bg_color_option = get_theme_mod('adventure_travelling_tp_preloader_bg_color_option');

if($adventure_travelling_tp_preloader_bg_color_option != false){
$adventure_travelling_tp_theme_css .='.loader{';
	$adventure_travelling_tp_theme_css .='background: '.esc_attr($adventure_travelling_tp_preloader_bg_color_option).';';
$adventure_travelling_tp_theme_css .='}';
}

$adventure_travelling_tp_footer_bg_color_option = get_theme_mod('adventure_travelling_tp_footer_bg_color_option');


if($adventure_travelling_tp_footer_bg_color_option != false){
$adventure_travelling_tp_theme_css .='#footer{';
	$adventure_travelling_tp_theme_css .='background: '.esc_attr($adventure_travelling_tp_footer_bg_color_option).';';
$adventure_travelling_tp_theme_css .='}';
}
$adventure_travelling_footer_widget_image = get_theme_mod('adventure_travelling_footer_widget_image');
	if($adventure_travelling_footer_widget_image != false){
		$adventure_travelling_tp_theme_css .='#footer{';
			$adventure_travelling_tp_theme_css .='background: url('.esc_attr($adventure_travelling_footer_widget_image).');';
$adventure_travelling_tp_theme_css .='}';
}


$resort_hotel_booking_slider_text_layout = get_theme_mod('resort_hotel_booking_slider_text_layout', 'CENTER-ALIGN'); 
$adventure_travelling_tp_theme_css .= '#slider .carousel-caption{';
switch ($resort_hotel_booking_slider_text_layout) {
    case 'LEFT-ALIGN':
        $adventure_travelling_tp_theme_css .= 'text-align:left; right: 40%; left: 15%';
        break;
    case 'CENTER-ALIGN':
        $adventure_travelling_tp_theme_css .= 'text-align:center; left: 25%; right: 25%';
        break;
    case 'RIGHT-ALIGN':
    $adventure_travelling_tp_theme_css .= 'text-align:right; left: 40%; right: 15%;';
    break;
    default:
        $adventure_travelling_tp_theme_css .= 'text-align:left; right: 40%; left: 15%';
        break;
}
$adventure_travelling_tp_theme_css .= '}';

//Font Weight
$adventure_travelling_menu_font_weight = get_theme_mod( 'adventure_travelling_menu_font_weight','500');
if($adventure_travelling_menu_font_weight == '100'){
$adventure_travelling_tp_theme_css .='.main-navigation a{';
    $adventure_travelling_tp_theme_css .='font-weight: 100;';
$adventure_travelling_tp_theme_css .='}';
}else if($adventure_travelling_menu_font_weight == '200'){
$adventure_travelling_tp_theme_css .='.main-navigation a{';
    $adventure_travelling_tp_theme_css .='font-weight: 200;';
$adventure_travelling_tp_theme_css .='}';
}else if($adventure_travelling_menu_font_weight == '300'){
$adventure_travelling_tp_theme_css .='.main-navigation a{';
    $adventure_travelling_tp_theme_css .='font-weight: 300;';
$adventure_travelling_tp_theme_css .='}';
}else if($adventure_travelling_menu_font_weight == '400'){
$adventure_travelling_tp_theme_css .='.main-navigation a{';
    $adventure_travelling_tp_theme_css .='font-weight: 400;';
$adventure_travelling_tp_theme_css .='}';
}else if($adventure_travelling_menu_font_weight == '500'){
$adventure_travelling_tp_theme_css .='.main-navigation a{';
    $adventure_travelling_tp_theme_css .='font-weight: 500;';
$adventure_travelling_tp_theme_css .='}';
}else if($adventure_travelling_menu_font_weight == '600'){
$adventure_travelling_tp_theme_css .='.main-navigation a{';
    $adventure_travelling_tp_theme_css .='font-weight: 600;';
$adventure_travelling_tp_theme_css .='}';
}else if($adventure_travelling_menu_font_weight == '700'){
$adventure_travelling_tp_theme_css .='.main-navigation a{';
    $adventure_travelling_tp_theme_css .='font-weight: 700;';
$adventure_travelling_tp_theme_css .='}';
}else if($adventure_travelling_menu_font_weight == '800'){
$adventure_travelling_tp_theme_css .='.main-navigation a{';
    $adventure_travelling_tp_theme_css .='font-weight: 800;';
$adventure_travelling_tp_theme_css .='}';
}else if($adventure_travelling_menu_font_weight == '900'){
$adventure_travelling_tp_theme_css .='.main-navigation a{';
    $adventure_travelling_tp_theme_css .='font-weight: 900;';
$adventure_travelling_tp_theme_css .='}';
}

//header
$adventure_travelling_slider_arrows = get_theme_mod('adventure_travelling_slider_arrows');

if($adventure_travelling_slider_arrows != true){
$adventure_travelling_tp_theme_css .='.page-template-front-page #heade-outer{';
    $adventure_travelling_tp_theme_css .='position:static; background-color: #faac24;';
$adventure_travelling_tp_theme_css .='}';
}