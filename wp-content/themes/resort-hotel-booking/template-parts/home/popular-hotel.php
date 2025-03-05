<?php
/**
 * Template part for displaying offer section
 *
 * @package Resort Hotel Booking
 * @subpackage resort_hotel_booking
 */

?>

<?php $adventure_travelling_static_image = get_template_directory_uri() . '/assets/images/sliderimage.png'; ?>
<?php if( get_theme_mod( 'resort_hotel_booking_offer_show_hide', true) != '') { ?>
<section id="travel-offer" class="py-5">
  <div class="container">
    <?php if( get_theme_mod('resort_hotel_booking_offer_section_tittle') != ''){ ?>
      <h2 class="mb-5 text-center"><?php echo esc_html(get_theme_mod('resort_hotel_booking_offer_section_tittle','')); ?></h2>
    <?php }?>
    <div class="row mt-4">
      <?php
        $resort_hotel_booking_post_category = get_theme_mod('resort_hotel_booking_offer_section_category');
        if($resort_hotel_booking_post_category){
          $resort_hotel_booking_page_query = new WP_Query(array( 'category_name' => esc_html( $resort_hotel_booking_post_category ,'resort-hotel-booking')));?>
          <?php while( $resort_hotel_booking_page_query->have_posts() ) : $resort_hotel_booking_page_query->the_post(); ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="cat-inner-box mb-3">
                <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php }else {echo ('<img src="'.$adventure_travelling_static_image .'">'); } ?>
                <?php if( get_post_meta($post->ID, 'resort_hotel_booking_hotel_amount', true) ) {?>
                  <h4><?php echo esc_html(get_post_meta($post->ID,'resort_hotel_booking_hotel_amount',true)); ?></h4>
                <?php }?>
                <div class="offer-box p-3">
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <?php $review = get_post_meta($post->ID,'resort_hotel_booking_reviews_count',5);
                    for ($i=1; $i <= $review; $i++) { ?>
                      <span><i class="fas fa-star"></i></span>
                  <?php } ?>
                  <p><?php echo wp_trim_words( get_the_content(),12 );?></p>   
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 align-self-center">
                      <?php if( get_post_meta($post->ID, 'resort_hotel_booking_hotel_days', true) ) {?>
                        <p class="mb-0"><i class="far fa-clock me-2"></i><?php echo esc_html(get_post_meta($post->ID,'resort_hotel_booking_hotel_days',true)); ?></p>
                      <?php }?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 align-self-center">
                      <div class="my-3 text-start text-md-end serv-btn">
                        <a href="<?php the_permalink(); ?>"><?php esc_html_e('LEARN MORE','resort-hotel-booking'); ?></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile;
          wp_reset_postdata();
        }
      ?>
    </div>
  </div>
</section>
<?php }?>