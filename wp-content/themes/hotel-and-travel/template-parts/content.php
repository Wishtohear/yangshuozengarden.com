<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Best_Shop
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/Blog">
	
	<div class="image">
		<?php hotel_and_travel_post_thumbnail(); ?>
	</div>

	<?php 
		if( ! is_front_page() ) echo '<div class="archive-content-wrapper">'; 
		/* 
		@hooked hotel_and_travel_entry_header 
		*/
		do_action( 'hotel_and_travel_post_entry_header' ); 
		/**
		 * @hooked hotel_and_travel_entry_content - 15
		 * @hooked hotel_and_travel_entry_footer - 20
		 */
		do_action( 'hotel_and_travel_post_entry_content' ); 
		
		if ( ! is_front_page() ) echo '</div>'; 
	?>

</article><!-- #post-<?php the_ID(); ?> -->
