<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hotel galaxy
 */

get_header();
?>

<div class="container">
	<main class="content-area">	
		<div class="row">
			<?php 
			if ( class_exists( 'woocommerce' ) ){

				if( is_account_page() || is_cart() || is_checkout() ) {
					echo '<div class="col-lg-'.( !is_active_sidebar( "hotelgalaxy-woocommerce-sidebar" ) ?"12" :"8" ).'">'; 
				}
				else{ 
					
					echo '<div class="col-lg-'.( !is_active_sidebar( "hotelgalaxy-sidebar-primary" ) ?"12" :"8" ).'">'; 

				}

			}
			else
			{ 

				echo '<div class="col-lg-'.( !is_active_sidebar( "hotelgalaxy-sidebar-primary" ) ?"12" :"8" ).'">';


			} 
			?>
			<?php 		
			if( have_posts()) : the_post();
				get_template_part( 'template-parts/content/content','page');
			endif;

			if( $post->comment_status == 'open' ) { 
				comments_template( '', true ); 
			}
			?>
		</div>

		<div class="col-lg-4">
			<?php  
			if ( class_exists( 'WooCommerce' ) ) 
				if( is_account_page() || is_cart() || is_checkout() ) {
					get_sidebar('woocommerce');
				}else{

					get_sidebar(); 
				} 
				?>
			</div>
		</div>
	</main>
</div>
<?php get_footer(); ?>