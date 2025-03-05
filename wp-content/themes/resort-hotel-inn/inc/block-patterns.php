<?php
/**
 * Block Patterns
 *
 * @package resort_hotel_inn
 * @since 1.0
 */

function resort_hotel_inn_register_block_patterns() {
	$resort_hotel_inn_block_pattern_categories = array(
		'resort-hotel-inn' => array( 'label' => esc_html__( 'Resort Hotel Inn', 'resort-hotel-inn' ) ),
		'pages' => array( 'label' => esc_html__( 'Pages', 'resort-hotel-inn' ) ),
	);

	$resort_hotel_inn_block_pattern_categories = apply_filters( 'resort_hotel_inn_resort_hotel_inn_block_pattern_categories', $resort_hotel_inn_block_pattern_categories );

	foreach ( $resort_hotel_inn_block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}
}
add_action( 'init', 'resort_hotel_inn_register_block_patterns', 9 );