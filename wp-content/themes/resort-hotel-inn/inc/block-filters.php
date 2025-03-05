<?php
/**
 * Block Filters
 *
 * @package resort_hotel_inn
 * @since 1.0
 */

function resort_hotel_inn_block_wrapper( $resort_hotel_inn_block_content, $resort_hotel_inn_block ) {

	if ( 'core/button' === $resort_hotel_inn_block['blockName'] ) {
		
		if( isset( $resort_hotel_inn_block['attrs']['className'] ) && strpos( $resort_hotel_inn_block['attrs']['className'], 'has-arrow' ) ) {
			$resort_hotel_inn_block_content = str_replace( '</a>', resort_hotel_inn_get_svg( array( 'icon' => esc_attr( 'caret-circle-right' ) ) ) . '</a>', $resort_hotel_inn_block_content );
			return $resort_hotel_inn_block_content;
		}
	}

	if( ! is_single() ) {
	
		if ( 'core/post-terms'  === $resort_hotel_inn_block['blockName'] ) {
			if( 'post_tag' === $resort_hotel_inn_block['attrs']['term'] ) {
				$resort_hotel_inn_block_content = str_replace( '<div class="taxonomy-post_tag wp-block-post-terms">', '<div class="taxonomy-post_tag wp-block-post-terms flex">' . resort_hotel_inn_get_svg( array( 'icon' => esc_attr( 'tags' ) ) ), $resort_hotel_inn_block_content );
			}

			if( 'category' ===  $resort_hotel_inn_block['attrs']['term'] ) {
				$resort_hotel_inn_block_content = str_replace( '<div class="taxonomy-category wp-block-post-terms">', '<div class="taxonomy-category wp-block-post-terms flex">' . resort_hotel_inn_get_svg( array( 'icon' => esc_attr( 'category' ) ) ), $resort_hotel_inn_block_content );
			}
			return $resort_hotel_inn_block_content;
		}
		if ( 'core/post-date' === $resort_hotel_inn_block['blockName'] ) {
			$resort_hotel_inn_block_content = str_replace( '<div class="wp-block-post-date">', '<div class="wp-block-post-date flex">' . resort_hotel_inn_get_svg( array( 'icon' => esc_attr( 'calendar' ) ) ), $resort_hotel_inn_block_content );
			return $resort_hotel_inn_block_content;
		}
		if ( 'core/post-author' === $resort_hotel_inn_block['blockName'] ) {
			$resort_hotel_inn_block_content = str_replace( '<div class="wp-block-post-author">', '<div class="wp-block-post-author flex">' . resort_hotel_inn_get_svg( array( 'icon' => esc_attr( 'user' ) ) ), $resort_hotel_inn_block_content );
			return $resort_hotel_inn_block_content;
		}
	}
	if( is_single() ){

		// Add chevron icon to the navigations
		if ( 'core/post-navigation-link' === $resort_hotel_inn_block['blockName'] ) {
			if( isset( $resort_hotel_inn_block['attrs']['type'] ) && 'previous' === $resort_hotel_inn_block['attrs']['type'] ) {
				$resort_hotel_inn_block_content = str_replace( '<span class="post-navigation-link__label">', '<span class="post-navigation-link__label">' . resort_hotel_inn_get_svg( array( 'icon' => esc_attr( 'prev' ) ) ), $resort_hotel_inn_block_content );
			}
			else {
				$resort_hotel_inn_block_content = str_replace( '<span class="post-navigation-link__label">Next Post', '<span class="post-navigation-link__label">Next Post' . resort_hotel_inn_get_svg( array( 'icon' => esc_attr( 'next' ) ) ), $resort_hotel_inn_block_content );
			}
			return $resort_hotel_inn_block_content;
		}
		if ( 'core/post-date' === $resort_hotel_inn_block['blockName'] ) {
            $resort_hotel_inn_block_content = str_replace( '<div class="wp-block-post-date">', '<div class="wp-block-post-date flex">' . resort_hotel_inn_get_svg( array( 'icon' => 'calendar' ) ), $resort_hotel_inn_block_content );
            return $resort_hotel_inn_block_content;
        }
		if ( 'core/post-author' === $resort_hotel_inn_block['blockName'] ) {
            $resort_hotel_inn_block_content = str_replace( '<div class="wp-block-post-author">', '<div class="wp-block-post-author flex">' . resort_hotel_inn_get_svg( array( 'icon' => 'user' ) ), $resort_hotel_inn_block_content );
            return $resort_hotel_inn_block_content;
        }

	}
    return $resort_hotel_inn_block_content;
}
	
add_filter( 'render_block', 'resort_hotel_inn_block_wrapper', 10, 2 );
