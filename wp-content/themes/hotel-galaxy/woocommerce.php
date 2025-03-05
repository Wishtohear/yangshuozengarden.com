<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Hotel galaxy
 */

get_header();
?>
<!-- Product Sidebar Section -->
<section id="product" class="product-section st-py-default">	 
	<div class="container">
		<div class="row gy-lg-0 gy-5 wow fadeInUp">
			<!--Product Detail-->
			<?php if ( ! is_active_sidebar( 'hotelgalaxy-woocommerce-sidebar' ) ) {	?>
				<div id="product-content" class="col-lg-12">
				<?php }else{ ?>
					<div id="product-content" class="col-lg-8">
					<?php } ?>	
					<?php woocommerce_content(); ?>
				</div>
				<!--/End of Blog Detail-->
				<div class="col-lg-4">
					<?php get_sidebar('woocommerce'); ?>
				</div>
			</div>	
		</div>
	</section>
	<!-- End of Blog & Sidebar Section -->
	<?php get_footer(); ?>

