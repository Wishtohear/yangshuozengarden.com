<?php 
  $expert_hotel_booking_tourist = get_theme_mod('expert_hotel_booking_tourist_setting','0');
  $expert_hotel_booking_tourist_button = get_theme_mod('expert_hotel_booking_tourist_button_setting','1');
  
  if($expert_hotel_booking_tourist == '1') {
?>
	<section id="tourist-section" class="py-5">
		<div class="container"> 
			<div class="tourist-head text-center mb-5">				
				<?php if(get_theme_mod('expert_hotel_booking_section_title') != '') {?>
					<h2><?php echo esc_html(get_theme_mod('expert_hotel_booking_section_title')); ?></h2>
				<?php }?>
				<?php if(get_theme_mod('expert_hotel_booking_section_text') != '') {?>
					<p><?php echo esc_html(get_theme_mod('expert_hotel_booking_section_text')); ?></p>
				<?php }?>
			</div>
			<div class="row m-0">

			<?php
				for ( $s = 1; $s <= 6; $s++ ) {
				$expert_hotel_booking_mod =  get_theme_mod( 'expert_hotel_booking_section_settigs' .$s );
				if ( 'page-none-selected' != $expert_hotel_booking_mod ) {
					$expert_hotel_booking_post[] = $expert_hotel_booking_mod;
				}
				}
				if( !empty($expert_hotel_booking_post) ) :
				$expert_hotel_booking_args = array(
				'post_type' =>array('post','page'),
				'post__in' => $expert_hotel_booking_post
				);
				$expert_hotel_booking_query = new WP_Query( $expert_hotel_booking_args );
				if ( $expert_hotel_booking_query->have_posts() ) :
				$s = 1;
			?>

		      <?php  while ( $expert_hotel_booking_query->have_posts() ) : $expert_hotel_booking_query->the_post(); ?>
		        <div class="col-lg-4 col-md-4 mb-5">
		            <div class="inner-box-image ">
		              <?php if ( has_post_thumbnail() ) : ?>
					    <img src="<?php the_post_thumbnail_url('full'); ?>"/>
					<?php else : ?>
					    <div class="hotel-color"></div>
					<?php endif; ?>
		              <div class="inner-box">
		                <h4 class="p-2"><?php the_title();?></h4>
		                <p class="p-2"><?php echo esc_html(wp_trim_words(get_the_content(),'15') );?></p>
		                <?php if($expert_hotel_booking_tourist_button == '1') { ?>
			                <div class="read-btn mx-2 mt-3">
			                	<a href="<?php the_permalink(); ?>"><?php esc_html_e('More Info','expert-hotel-booking'); ?></a>
			                </div>
		           		<?php } ?>
		              </div>
		            </div>
		        </div>
		      <?php $s++; endwhile; ?>
		    <?php wp_reset_postdata();
		    else : ?>
		    <div class="no-postfound"></div>
		      <?php endif;
		    endif;?>
		  </div>
		</div>
	</section>
<?php }?>