<?php 
$s_h_breadcrumb                 = get_theme_mod( 's_h_breadcrumb', true );
$breadcrumb_bg_image        = get_theme_mod( 'breadcrumb_bg_image', esc_url(get_template_directory_uri().'/assets/images/breadcrumb-bg.jpg') );
if(! $s_h_breadcrumb){ return; }
?>
<div class="breadcrumb-section" style="background: url(<?php echo esc_url($breadcrumb_bg_image); ?>);">
  <div class="overlay clearfix">
    <div class="container content_center">
      <div class="col-lg-12 "> 
       <div id="trapezoid">
         <h2 class="breadcrumb-title">
          <?php hotelgalaxy_breadcrumb_title(); ?>
        </h2> 
        <ul class="breadcrum-list">
          <?php hotelgalaxy_breadcrumb_content(); ?>
        </ul>
      </div>
      <?php if ( is_page_template( array( 'templates/template-room-grid.php','templates/template-room-filter-tab.php' ) ) ) {
        get_template_part('template-parts/sections/section','roomsearch');

      } ?>
    </div>
  </div>
</div>
</div>