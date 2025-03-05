<?php
/*
* Display Logo and contact details
*/
?>

<div class="headerbox">
  <div class="container">
    <div class="row">
      <div class="email col-lg-4 col-md-4 align-self-center">
        <?php if( get_theme_mod( 'adventure_travelling_mail_text' ) != '' || get_theme_mod( 'adventure_travelling_mail' ) != '') { ?>
          <div class="row">
            <div class="col-lg-2 col-md-3 align-self-center"><i class="<?php echo esc_attr(get_theme_mod('adventure_travelling_mail_icon','fas fa-envelope-open')); ?>"></i></div>
            <div class="col-lg-10 col-md-9 align-self-center">
              <p class="infotext"><?php echo esc_html( get_theme_mod('adventure_travelling_mail_text','')); ?></p>
              <p class="mb-0"><a href="mailto:<?php echo esc_html( get_theme_mod('adventure_travelling_mail','') ); ?>"><?php echo esc_html( get_theme_mod('adventure_travelling_mail','') ); ?></a></p>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="col-lg-4 col-md-4 align-self-center">
        <?php $adventure_travelling_logo_settings = get_theme_mod( 'adventure_travelling_logo_settings','Different Line');
        if($adventure_travelling_logo_settings == 'Different Line'){ ?>
          <div class="logo">
            <?php if( has_custom_logo() ) adventure_travelling_the_custom_logo(); ?>
            <?php if( get_theme_mod('adventure_travelling_site_title_text',true) == 1){ ?>
              <?php if (is_front_page() && is_home()) : ?>
                <h1 class="text-capitalize">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                </h1> 
              <?php else : ?>
                  <p class="text-capitalize site-title">
                      <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                  </p>
              <?php endif; ?>
            <?php }?>
            <?php $adventure_travelling_description = get_bloginfo( 'description', 'display' );
            if ( $adventure_travelling_description || is_customize_preview() ) : ?>
              <?php if( get_theme_mod('adventure_travelling_site_tagline_text',false)){ ?>
                <p class="site-description"><?php echo esc_html($adventure_travelling_description); ?></p>
              <?php }?>
            <?php endif; ?>
          </div>
        <?php }else if($adventure_travelling_logo_settings == 'Same Line'){ ?>
          <div class="logo logo-same-line">
            <div class="row">
              <div class="col-lg-5 col-md-5 align-self-center">
                <?php if( has_custom_logo() ) adventure_travelling_the_custom_logo(); ?>
              </div>
              <div class="col-lg-7 col-md-7 align-self-center">
                <?php if( get_theme_mod('adventure_travelling_site_title_text',true) == 1){ ?>
                  <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php }?>
                <?php $adventure_travelling_description = get_bloginfo( 'description', 'display' );
                if ( $adventure_travelling_description || is_customize_preview() ) : ?>
                  <?php if( get_theme_mod('adventure_travelling_site_tagline_text',false)){ ?>
                    <p class="site-description"><?php echo esc_html($adventure_travelling_description); ?></p>
                  <?php }?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php }?>
      </div>
      <div class="call col-lg-4 col-md-4 align-self-center">
        <?php if( get_theme_mod( 'adventure_travelling_call_text' ) != '' || get_theme_mod( 'adventure_travelling_call' ) != '') { ?>
          <div class="row">
            <div class="col-lg-10 col-md-10 align-self-center">
              <p class="infotext"><?php echo esc_html( get_theme_mod('adventure_travelling_call_text','') ); ?></p>
              <p class="mb-0"><a href="tel:<?php echo esc_html( get_theme_mod('adventure_travelling_call','') ); ?>"><?php echo esc_html( get_theme_mod('adventure_travelling_call','') ); ?></a></p>
            </div>
            <div class="col-lg-2 col-md-2 align-self-center"><i class="<?php echo esc_attr(get_theme_mod('adventure_travelling_call_icon','fas fa-phone')); ?>"></i></div>
          </div>
        <?php } ?>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</div>
