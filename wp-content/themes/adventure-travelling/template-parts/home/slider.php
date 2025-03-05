<?php
/**
 * Template part for displaying slider section
 *
 * @package Adventure Travelling
 * @subpackage adventure_travelling
 */

?>
<?php $adventure_travelling_static_image = get_stylesheet_directory_uri() . '/assets/images/sliderimage.png'; ?>
<?php if( get_theme_mod( 'adventure_travelling_slider_arrows', true) != '') { ?>

<section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <?php $adventure_travelling_slide_pages = array();
      for ( $adventure_travelling_count = 1; $adventure_travelling_count <= 4; $adventure_travelling_count++ ) {
        $adventure_travelling_mod = intval( get_theme_mod( 'adventure_travelling_slider_page' . $adventure_travelling_count ));
        if ( 'page-none-selected' != $adventure_travelling_mod ) {
          $adventure_travelling_slide_pages[] = $adventure_travelling_mod;
        }
      }
      if( !empty($adventure_travelling_slide_pages) ) :
        $adventure_travelling_args = array(
          'post_type' => 'page',
          'post__in' => $adventure_travelling_slide_pages,
          'orderby' => 'post__in'
        );
        $adventure_travelling_query = new WP_Query( $adventure_travelling_args );
        if ( $adventure_travelling_query->have_posts() ) :
          $i = 1;
    ?>
    <div class="carousel-inner" role="listbox">
      <?php  while ( $adventure_travelling_query->have_posts() ) : $adventure_travelling_query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <?php if(has_post_thumbnail()){ ?>
               <img src="<?php the_post_thumbnail_url('full'); ?>"/> <?php }else {echo ('<img src="'.$adventure_travelling_static_image .'">'); } ?>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <p><?php echo wp_trim_words( get_the_content(),15 );?></p>  
              <div class="more-btn">
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','adventure-travelling'); ?></a>
              </div>
            </div>
          </div>
        </div>
      <?php $i++; endwhile;
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
        <div class="no-postfound"></div>
      <?php endif;
    endif;?>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-angle-left"></i></span>
      <span class="screen-reader-text"><?php esc_html_e('Previous','adventure-travelling'); ?></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-angle-right"></i></span>
      <span class="screen-reader-text"><?php esc_html_e('Next','adventure-travelling'); ?></span>
    </a> 
  </div>
  <div class="clearfix"></div>
</section>

<?php } ?>
