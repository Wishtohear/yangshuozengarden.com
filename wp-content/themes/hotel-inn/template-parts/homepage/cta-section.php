<?php
$hotel_inn_options = hotel_inn_theme_options();


$cta_show            = $hotel_inn_options['cta_show'];
$cta_title		 	 = $hotel_inn_options['cta_title'];
$cta_button_txt	 = $hotel_inn_options['cta_button_txt'];
$cta_button_url		 = $hotel_inn_options['cta_button_url'];
$cta_bg_image		 = $hotel_inn_options['cta_bg_image'];


if(!empty($cta_bg_image)){
    $background_style = "style='background-image:url(".esc_url($cta_bg_image).")'";
}
else{
    $background_style = '';
}



if($cta_show) { 
    if (1 == $cta_show):?>
    <div class="section cta-sec" <?php echo wp_kses_post($background_style); ?>>
        <div class="container">
            <div class="row">
                <div class="cta-content">
                    <h2 class="cta-title"><?php echo esc_html($cta_title); ?></h2>
                    
                    <?php  if( $cta_button_txt && $cta_button_url):?>
                        <a href="<?php echo esc_url($cta_button_url); ?>" class="btn btn-default"><?php echo esc_html($cta_button_txt); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

        <?php
        
    endif;
}