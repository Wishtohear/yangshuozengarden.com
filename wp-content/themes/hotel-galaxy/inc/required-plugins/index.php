<?php
require get_template_directory() . '/inc/required-plugins/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function hotelgalaxy_recommended_plugins() {
	$plugins = array(

		array(
			'name'             => __( 'Burger Companion', 'hotel-galaxy' ),
			'slug'             => 'burger-companion',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Hotel Booking Lite', 'hotel-galaxy' ),
			'slug'             => 'motopress-hotel-booking-lite',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),		
		array(
			'name'             => __( 'WooCommerce', 'hotel-galaxy' ),
			'slug'             => 'woocommerce',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),		
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'hotelgalaxy_recommended_plugins' );