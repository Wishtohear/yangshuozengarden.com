<?php
/*
Template Name: FrontPage
*/

get_header();

if ( ! function_exists( 'is_plugin_active' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

if ( is_plugin_active( 'burger-companion/burger-companion.php' ) ) { 

do_action( 'hotel_galaxy_frontpage_sections', false );

}else{
	do_action( 'hotelgalaxy_frontpage_sections', false );
}	

get_template_part('template-parts/sections/section','blog');

get_footer();