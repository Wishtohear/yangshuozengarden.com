<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Best_Shop
 */

$hotel_and_travel_sidebar = hotel_and_travel_sidebar_layout();


if ( $hotel_and_travel_sidebar == 'full-width' || $hotel_and_travel_sidebar == 'no-sidebar'){
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
	<?php dynamic_sidebar( 'woo-sidebar' ); ?>
</aside><!-- #secondary -->