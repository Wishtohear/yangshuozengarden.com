<article id="post-<?php the_ID(); ?>" <?php post_class('blog-item entry-content wow fadeInUp'); ?>>
	<figure class="entry-content">	
		<?php if (has_post_thumbnail()) { ?>							
			<div class="hg-thumbnail">				
				<a href="<?php echo esc_url(get_permalink()) ?>" class="post-hover">
					<?php the_post_thumbnail( 'full', array( 'class' => 'attachment-post-thumbnail size-post-thumbnail wp-post-image' ) ); ?>
				</a>
			</div>											
		<?php } ?>
		
		<figcaption class="blog-body">

			<ul class="nav">
				<li class="nav-item">
					<i class="fa fa-user"></i>					
					<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>" title="<?php esc_attr(the_author()); ?>" class="author meta-info hide-on-mobile"><span class="author-name"><?php esc_html(the_author()); ?></span></a>
				</li>

				<li class="nav-item">
					<i class="fa fa-calendar"></i>
					<a href="<?php echo esc_url(get_permalink());?>"><span><?php echo esc_html(get_the_date('j')); ?></span> <?php echo esc_html(get_the_date('M'));  echo esc_html(get_the_date(' Y')); ?></a>
				</li>
				
			</ul>
			<?php the_title(sprintf('<h4 class="post-title" ><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h4>'); the_excerpt(); ?>									
		</figcaption>
	</figure>
</article>