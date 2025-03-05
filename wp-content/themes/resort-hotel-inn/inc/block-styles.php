<?php
/**
 * Block Styles
 *
 * @package resort_hotel_inn
 * @since 1.0
 */

if ( function_exists( 'register_block_style' ) ) {
	function resort_hotel_inn_register_block_styles() {

		//Wp Block Padding Zero
		register_block_style(
			'core/group',
			array(
				'name'  => 'resort-hotel-inn-padding-0',
				'label' => esc_html__( 'No Padding', 'resort-hotel-inn' ),
			)
		);

		//Wp Block Post Author Style
		register_block_style(
			'core/post-author',
			array(
				'name'  => 'resort-hotel-inn-post-author-card',
				'label' => esc_html__( 'Theme Style', 'resort-hotel-inn' ),
			)
		);

		//Wp Block Button Style
		register_block_style(
			'core/button',
			array(
				'name'         => 'resort-hotel-inn-button',
				'label'        => esc_html__( 'Plain', 'resort-hotel-inn' ),
			)
		);

		//Post Comments Style
		register_block_style(
			'core/post-comments',
			array(
				'name'         => 'resort-hotel-inn-post-comments',
				'label'        => esc_html__( 'Theme Style', 'resort-hotel-inn' ),
			)
		);

		//Latest Comments Style
		register_block_style(
			'core/latest-comments',
			array(
				'name'         => 'resort-hotel-inn-latest-comments',
				'label'        => esc_html__( 'Theme Style', 'resort-hotel-inn' ),
			)
		);


		//Wp Block Table Style
		register_block_style(
			'core/table',
			array(
				'name'         => 'resort-hotel-inn-wp-table',
				'label'        => esc_html__( 'Theme Style', 'resort-hotel-inn' ),
			)
		);


		//Wp Block Pre Style
		register_block_style(
			'core/preformatted',
			array(
				'name'         => 'resort-hotel-inn-wp-preformatted',
				'label'        => esc_html__( 'Theme Style', 'resort-hotel-inn' ),
			)
		);

		//Wp Block Verse Style
		register_block_style(
			'core/verse',
			array(
				'name'         => 'resort-hotel-inn-wp-verse',
				'label'        => esc_html__( 'Theme Style', 'resort-hotel-inn' ),
			)
		);
	}
	add_action( 'init', 'resort_hotel_inn_register_block_styles' );
}
