<?php
/**
 *
 * Template Name: Frontpage

 *
 * @package hotel Inn
 */

$hotel_inn_options = hotel_inn_theme_options();
$about_show = $hotel_inn_options['about_show'];
$room_show = $hotel_inn_options['room_show'];
$blog_show = $hotel_inn_options['blog_show'];

get_header();


get_template_part('template-parts/homepage/banner', 'section');
if($about_show == 1)
get_template_part('template-parts/homepage/about', 'section');

if($room_show == 1)
get_template_part('template-parts/homepage/room', 'section');

if($blog_show == 1)
get_template_part('template-parts/homepage/blog', 'section');


get_template_part('template-parts/homepage/cta', 'section');


get_footer();
