<?php
$s_h_blog_section        			= get_theme_mod( 's_h_blog_section', true );
if(! $s_h_blog_section){ return; }
$blog_title                  		= get_theme_mod( 'blog_section_title', '<span>Latest</span> News' );
$blog_subtitle               		= get_theme_mod( 'blog_section_subtitle', 'Excepteur sint occaecat cupidatat' );
$blog_post_per_page          		= get_theme_mod( 'blog_posts_per_page', 6 ); 
?>
<section id="main-home-blog" class="blog-area home-section bg-gray">
	<div class="overlay">
		<div class="container">
			<div class="row">
				<div class="entry-header section-header">
					<?php if(!empty($blog_title)){ ?>
						<h2 class="header site-title-header wow" data-wow-duration=".1s" data-wow-delay=".4s"><?php echo wp_kses_post($blog_title) ?></h2>
					<?php } ?>

					<?php if(!empty($blog_subtitle)){ ?>
						<p><?php  echo wp_kses_post( $blog_subtitle ) ?></p>
					<?php } ?>

				</div>
			</div>
			<div class="row">
				<div class="blog-content-area  clearfix ">
					<div class="hg_isotope row">
						<?php if (have_posts()) {
							$args = array('post_type' => 'post','posts_per_page' => absint($blog_post_per_page));
							$posts = new WP_Query($args);
							while ($posts->have_posts()) : $posts->the_post(); ?>

								<div class="element-item col-sm-12 col-md-6 col-lg-4">						
									<article class="blog-item entry-content wow fadeInUp">
										<figure class="entry-content">								
											<div class="hg-thumbnail">
												<?php if (has_post_thumbnail()) { ?>
													<a href="<?php echo esc_url(get_permalink()) ?>">
														<?php the_post_thumbnail(); ?>
													</a>
												<?php } ?>
											</div>											

											<figcaption class="blog-body">
												<ul class="nav">
													<li class="nav-item">
														<i class="fa fa-user"></i>
														<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>" title="<?php esc_attr(the_author()); ?>" class="author meta-info hide-on-mobile"><span class="author-name"><?php esc_html(the_author()); ?></span>
														</a>
													</li>

													<li class="nav-item">
														<i class="fa fa-calendar"></i>
														<a href="<?php echo esc_url(get_permalink());?>"><span><?php echo esc_html(get_the_date('j')); ?></span> <?php echo esc_html(get_the_date('M'));  echo esc_html(get_the_date(' Y')); ?></a>
													</li>
												</ul>
												<?php
												the_title(sprintf('<h4 class="post-title" ><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h4>');
												?>
												<?php the_excerpt(); ?>
											</figcaption>
										</figure>
									</article>									
								</div>
								<?php
							endwhile;
							wp_reset_postdata();
						}
						?>
					</div>
				</div>
			</div>			
		</div>
	</div>
</section>
