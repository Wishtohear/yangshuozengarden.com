<?php
/* Notifications in customizer */

require HOTEL_PARENT_INC_DIR . '/customizer/customizer-notify/hotelgalaxy-notify.php';
$hotelgalaxy_config_customizer = array(
	'recommended_plugins'       => array(
		'burger-companion' => array(
			'recommended' => true,
			'description' => sprintf(__('Install and activate <strong>Burger Companion</strong> plugin for taking full advantage of all the features this theme has to offer Hotel Galaxy.', 'hotel-galaxy')),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'hotel-galaxy' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'hotel-galaxy' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'hotel-galaxy' ),
	'activate_button_label'     => esc_html__( 'Activate', 'hotel-galaxy' ),
	'hotelgalaxy_deactivate_button_label'   => esc_html__( 'Deactivate', 'hotel-galaxy' ),
);
Hotelgalaxy_Customizer_Notify::init( apply_filters( 'hotelgalaxy_customizer_notify_array', $hotelgalaxy_config_customizer ) );
