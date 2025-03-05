<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Best_Shop
 */
get_header();
?>
	<div id="primary" class="content-area">
		<div class="container">
            <div class="breadcrumb-wrapper">
				<?php hotel_and_travel_breadcrumb(); ?>
			</div>
			<div class="page-grid">
				<main id="main" class="site-main">
					<?php
						while ( have_posts() ) :
							
							the_post();                    

                            /*
                             * Include the Post Type content-single template
                             */

							get_template_part( 'template-parts/content', 'single' );

						endwhile; // End of the loop.

						hotel_and_travel_author_box(); 
						
						hotel_and_travel_nav(); 
						
						hotel_and_travel_get_related_posts();

						hotel_and_travel_get_comments(); 
					
					?>
				</main><!-- #main -->
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
<?php
get_footer();
