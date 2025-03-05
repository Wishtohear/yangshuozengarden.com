<?php
/**
 * side bar template
 *
 * @package WordPress
 * @subpackage Hotel Galaxy
 */
?>
<?php if ( ! is_active_sidebar( 'hotelgalaxy-woocommerce-sidebar' ) ) {	return; } ?>

<?php dynamic_sidebar('hotelgalaxy-woocommerce-sidebar'); ?>
