<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<div class="inside-article wow fadeInUp">
		<div class="entry-content" itemprop="text">
			<?php if ( has_post_thumbnail() ) {	?>
				<div class="single-post-header-image grid-container">
					<?php the_post_thumbnail(
						apply_filters( 'hotelgalaxy_page_header_default_size', 'full' ),
						array('itemprop' => 'image')
					); ?>
				</div>
			<?php } ?>

			<?php
			the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html( 'Pages:', 'hotel-galaxy'),
				'after'  => '</div>',
			) );
			?>			
		</div>
	</div>
</article>