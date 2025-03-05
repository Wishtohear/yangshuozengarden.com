<?php /* Template Name: Page No Sidebar */ ?>
<?php get_header();	?>
<div class="container">
	<main class="content-area">	
		<div class="row">			
			<div class="col-lg-8 m-auto">
				<?php
				while ( have_posts() ): the_post();
					get_template_part( 'template-parts/content/content','page');
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
				endif;
			endwhile;
			?>	
		</div>
		
	</div>
</main>
</div>
<?php get_footer(); ?>