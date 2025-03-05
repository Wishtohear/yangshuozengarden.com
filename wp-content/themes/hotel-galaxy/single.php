<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Hotel Galaxy
 */

get_header();
?>
<div class="container">
	<main class="content-area">
		<div class="row">
			<div class="col-lg-8">
				<?php if (have_posts()){ ?>
					<?php while (have_posts()) : the_post(); ?>	
						<article id="post-<?php the_ID(); ?>" <?php post_class('blog-item entry-content wow fadeInUp'); ?>>
							<figure class="entry-content">								
								<div class="hg-thumbnail">
									<?php if (has_post_thumbnail()) { ?>
										<a href="javascript:void(0);" class="post-hover">
											<?php the_post_thumbnail(); ?>
										</a>										
									<?php } ?>
								</div>											
								<div class="post_date_box">
									<a href="<?php echo esc_url(get_permalink());?>"><span><?php echo esc_html(get_the_date('j')); ?></span> <?php echo esc_html(get_the_date('M'));  echo esc_html(get_the_date(' Y')); ?></a>
								</div>
								<figcaption class="blog-body">
									<?php the_title('<h4 class="post-title">','</h4>');	?>
									<ul class="nav">
										<li class="nav-item">
											<?php  $user = wp_get_current_user(); ?>
											<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>" title="<?php esc_attr(the_author()); ?>" class="author meta-info hide-on-mobile"><span class="author-name"><?php esc_html(the_author()); ?></span></a>
										</li>
										<li class="nav-item">
											<a href="<?php echo esc_url(get_permalink());?>"><?php the_category(', '); ?></a>
										</li>
									</ul>
									<?php the_content(); ?>									
								</figcaption>
							</figure>
						</article>
					<?php endwhile; ?>
				<?php }	?>

				<?php comments_template( '', true ); // comments  ?>
			</div>
			<div class="col-lg-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</main>
</div>
<?php get_footer(); ?>