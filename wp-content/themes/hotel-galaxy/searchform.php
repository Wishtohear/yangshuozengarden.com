 <?php
/**
 * The template for displaying search form.
 *
 * @package  Hotel Galaxy
 *
 */
?>
 <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>"> 
 	<div class="search-form-inner">	
 		<input type="search"  name="s" id="s" title="<?php echo esc_attr( get_search_query() ); ?>" class="search-input" placeholder="<?php echo esc_attr( apply_filters( 'hotelgalaxy_search_placeholder', _x( 'Search &hellip;', 'placeholder', 'hotel-galaxy') ) ); ?>" />
 		<button class="search-button" type="submit"><?php echo esc_html__('Search','hotel-galaxy'); ?></button>
 	</div>
 </form>