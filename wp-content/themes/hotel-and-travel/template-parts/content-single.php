<?php
/**
 * Template part for displaying post content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Best_Shop
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-image">
		<?php 
		/**
		 * Post thumbnail
		 */
		hotel_and_travel_post_thumbnail(); 
		/**
		 * Entry Header
		 */
		do_action( 'hotel_and_travel_post_entry_header' );
		?>		
	</div>
	<div>
		<?php 
		/**
		 * @hooked hotel_and_travel_entry_content - 15
		 * @hooked hotel_and_travel_entry_footer - 20
		 */
		do_action( 'hotel_and_travel_post_entry_content' ) ; 
		?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
