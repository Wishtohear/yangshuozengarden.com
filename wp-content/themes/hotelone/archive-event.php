<?php 
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */
 
get_header(); 

$layout = hotelone_get_layout();
$col = (is_active_sidebar( 'sidebar-1' )?'8':'12');
if($layout=='none'){
	$col = '12';
}
?>

<div id="site-content" class="site-content">
	<div class="container">		
		<div class="row">	
			<?php
			if ( have_posts() ) :
				
				/* Start the Loop */
				while ( have_posts() ) : the_post(); ?>
				<?php 
				$meta = get_post_meta( get_the_ID(),'event_meta', true );
				$meta = wp_parse_args($meta, array(
								'start_date' => '',
								'end_date' => '',
							));
				$link = get_post_permalink();
				?>
				<div class="col-lg-4 col-md-6 col-sm-12 animated fadeInUp">
					<div class="card-event">
						<?php 
						if( has_post_thumbnail() ) { ?>
						<div class="event_thumbnial">
							<?php the_post_thumbnail('full'); ?>

							<div class="event_overlay">
								<a href="<?php echo esc_url($link); ?>"><span class="event_icon"><i class="fa fa-chevron-right"></i></span></a>
							</div>

							<span class="event_time"><?php echo $meta['start_date'] .' - '. $meta['end_date']; ?></span>							
						</div>
						<?php } ?>

						<div class="event_contents">
							<?php the_title('<h4 class="event-title"><a href="'.esc_url( $link ).'">','</a></h4>'); ?>
							<?php the_excerpt(); ?>
						</div>												
					</div>
				</div>
				<?php
					
				endwhile;
				
				the_posts_pagination( array(
						'prev_text' => '<i class="fa fa-angle-double-left"></i>',
						'next_text' => '<i class="fa fa-angle-double-right"></i>',
					) );
			
			else :
				
				get_template_part( 'template-parts/post/content', 'none' );
				
			endif;
			?>
		</div>
	</div>
</div><!-- .site-content -->
	
<?php get_footer(); ?>