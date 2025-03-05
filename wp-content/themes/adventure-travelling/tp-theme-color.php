<?php
	
$adventure_travelling_tp_theme_css = '';

$adventure_travelling_tp_color_option = get_theme_mod('adventure_travelling_tp_color_option');

// 1st color
$adventure_travelling_tp_color_option = get_theme_mod('adventure_travelling_tp_color_option', '#ffcc05');
if ($adventure_travelling_tp_color_option) {
	$adventure_travelling_tp_theme_css .= ':root {';
	$adventure_travelling_tp_theme_css .= '--color-primary1: ' . esc_attr($adventure_travelling_tp_color_option) . ';';
	$adventure_travelling_tp_theme_css .= '}';
}

//hover color
$adventure_travelling_tp_color_option_link = get_theme_mod('adventure_travelling_tp_color_option_link');

if($adventure_travelling_tp_color_option_link != false){
$adventure_travelling_tp_theme_css .=' .prev.page-numbers:focus, .prev.page-numbers:hover, .next.page-numbers:focus, .next.page-numbers:hover,span.meta-nav:hover, #comments input[type="submit"]:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, #footer button[type="submit"]:hover, #theme-sidebar button[type="submit"]:hover,.book-tkt-btn a.register-btn:hover,.book-tkt-btn a.bar-btn i:hover,  .read-more-btn a:hover,.more-btn a:hover,.wc-block-cart__submit-container a:hover,.wc-block-grid__product-add-to-cart.wp-block-button .wp-block-button__link:hover  {';
$adventure_travelling_tp_theme_css .='background: '.esc_attr($adventure_travelling_tp_color_option_link).';';
$adventure_travelling_tp_theme_css .='}';
}
if($adventure_travelling_tp_color_option_link != false){
$adventure_travelling_tp_theme_css .='a:hover, #theme-sidebar a:hover,.media-links i:hover , #footer a:hover , p.wp-block-tag-cloud a :hover, .page-box h4 a:hover,.page-box h4 a:hover, .readmore-btn a:hover, .logo h1 a:hover,#theme-sidebar  .product-name a:hover, woocommerce-checkout-review-order:hover ,.woocommerce-form-coupon-toggle a:hover, .woocommerce-MyAccount-content a:hover, .box-content a:hover, .woocommerce-privacy-policy-text a:hover,.post_tag a:hover,#theme-sidebar .tagcloud a:hover, p.wp-block-tag-cloud a:hover, #theme-sidebar .widget_tag_cloud a:hover,#footer .tagcloud a:hover,#footer p.wp-block-tag-cloud a:hover,#footer li a:hover{';
$adventure_travelling_tp_theme_css .='color: '.esc_attr($adventure_travelling_tp_color_option_link).';';
$adventure_travelling_tp_theme_css .='}';
}
if($adventure_travelling_tp_color_option_link != false){
$adventure_travelling_tp_theme_css .='#footer .tagcloud a:hover,#footer a:hover,#theme-sidebar a:hover,#theme-sidebar .tagcloud a:hover,#theme-sidebar .tagcloud a:hover, p.wp-block-tag-cloud a:hover, .read-more-btn a :hover,.post_tag a:hover, #theme-sidebar .widget_tag_cloud a:hover, .readmore-btn a:hover,#footer p.wp-block-tag-cloud a:hover{';
$adventure_travelling_tp_theme_css .='border-color: '.esc_attr($adventure_travelling_tp_color_option_link).';';
$adventure_travelling_tp_theme_css .='}';
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

// logo tagline color
$adventure_travelling_site_title_color = get_theme_mod('adventure_travelling_site_title_color');

if($adventure_travelling_site_title_color != false){
$adventure_travelling_tp_theme_css .='.logo h1 a, .logo p, .logo p.site-title a{';
$adventure_travelling_tp_theme_css .='color: '.esc_attr($adventure_travelling_site_title_color).';';
$adventure_travelling_tp_theme_css .='}';
}

$adventure_travelling_logo_tagline_color = get_theme_mod('adventure_travelling_logo_tagline_color');
if($adventure_travelling_logo_tagline_color != false){
$adventure_travelling_tp_theme_css .='p.site-description{';
$adventure_travelling_tp_theme_css .='color: '.esc_attr($adventure_travelling_logo_tagline_color).';';
$adventure_travelling_tp_theme_css .='}';
}

// footer widget title color
$adventure_travelling_footer_widget_title_color = get_theme_mod('adventure_travelling_footer_widget_title_color');
if($adventure_travelling_footer_widget_title_color != false){
$adventure_travelling_tp_theme_css .='#footer h3, #footer h2.wp-block-heading{';
$adventure_travelling_tp_theme_css .='color: '.esc_attr($adventure_travelling_footer_widget_title_color).';';
$adventure_travelling_tp_theme_css .='}';
}

// copyright text color
$adventure_travelling_footer_copyright_text_color = get_theme_mod('adventure_travelling_footer_copyright_text_color');
if($adventure_travelling_footer_copyright_text_color != false){
$adventure_travelling_tp_theme_css .='#footer .site-info p, #footer .site-info a {';
$adventure_travelling_tp_theme_css .='color: '.esc_attr($adventure_travelling_footer_copyright_text_color).';';
$adventure_travelling_tp_theme_css .='}';
}
