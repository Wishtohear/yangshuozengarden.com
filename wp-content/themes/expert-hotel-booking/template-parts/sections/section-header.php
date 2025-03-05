<header class="main-header">
<?php 
  $expert_hotel_booking_header = get_theme_mod('expert_hotel_booking_header_setting','1');
  
  if($expert_hotel_booking_header == '1') {
?>
  <div class="upper-header-area">
  	<div class="container">
    	<?php 
				$expert_hotel_booking_topheader_offer_text = get_theme_mod('expert_hotel_booking_topheader_offer_text');
				$expert_hotel_booking_topheader_email = get_theme_mod( 'expert_hotel_booking_topheader_email' );
				$expert_hotel_booking_topheader_phoneno = get_theme_mod( 'expert_hotel_booking_topheader_phoneno' );
			?>
			<div class="row">
				<div class="col-lg-5 col-md-7 contact text-lg-start text-center">
					<?php if( $expert_hotel_booking_topheader_email != ''){?>
						<a href="mailto:<?php echo esc_html( apply_filters('expert_hotel_booking_topheader', $expert_hotel_booking_topheader_email)); ?>" class="me-md-3 mb-md-0 mb-2"><i class="fas fa-envelope me-2"></i><?php echo esc_html( apply_filters('expert_hotel_booking_topheader', $expert_hotel_booking_topheader_email)); ?></a>
					<?php }?>
					<?php if( $expert_hotel_booking_topheader_phoneno != ''){?>
						<a href="tel:<?php echo esc_html( apply_filters('expert_hotel_booking_topheader', $expert_hotel_booking_topheader_phoneno)); ?>"><i class="fas fa-phone me-2"></i><?php echo esc_html( apply_filters('expert_hotel_booking_topheader', $expert_hotel_booking_topheader_phoneno)); ?></a>
					<?php }?>
				</div>
				<div class="offset-lg-2 col-lg-5 col-md-5 text-lg-end text-center mt-lg-0 mt-md-0 mt-2">
					<?php if( $expert_hotel_booking_topheader_offer_text != ''){?>
						<p class="offer-text"><?php echo esc_html( apply_filters('expert_hotel_booking_topheader', $expert_hotel_booking_topheader_offer_text)); ?></p>
					<?php }?>
					<?php if ( class_exists('woocommerce') ) { ?>
        		<a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" class="ms-3 myaccount-icon"><i class="fas fa-user"></i><span class="screen-reader-text"><?php esc_html_e( 'My Account','expert-hotel-booking' );?></span></a>
        	<?php }?>
				</div>
			</div>
		</div>
	</div>
<?php }?>
    <div class="<?php if( get_theme_mod( 'expert_hotel_booking_sticky_header', '0')) { ?>sticky-header<?php } else { ?>close-sticky<?php } ?>">
		<div class="lower-header-area">	
			<div class="container">
	      <nav class="navbar navbar-expand-lg navbaroffcanvase">
	    		<div class="navbar-menubar responsive-menu">
	          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-menu"  aria-label="<?php echo esc_attr_e('Toggle navigation','expert-hotel-booking'); ?>"> 
	          	<i class="fa fa-bars"></i>
	          </button>
	        	<div class="collapse navbar-collapse navbar-menu">
	          	<button class="navbar-toggler navbar-toggler-close" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-menu"  aria-label="<?php esc_attr_e('Toggle navigation','expert-hotel-booking'); ?>"> 
	              <i class="fa fa-times"></i>
	          	</button> 
					<?php 
			            wp_nav_menu( array( 
			              'theme_location' => 'responsive-menu',
			              'container_class' => 'main-menu clearfix' ,
			              'menu_class' => 'clearfix',
	                  'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
			            ) ); 
			        ?>
	     			</div>
					</div>
	      	<div class="row">
	      		<div class="col-lg-5">
	      			<div class="navbar-menubar left-menu">
	              <div class="collapse navbar-collapse navbar-menu">
							<?php 
				                wp_nav_menu( array( 
				                  'theme_location' => 'primary-left',
				                  'container_class' => 'main-menu clearfix' ,
				                  'menu_class' => 'clearfix',
				                  'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
				                  'fallback_cb' => 'wp_page_menu',
				                ) ); 
				            ?>
	                </div>
	              </div>
	      			</div>
			    		<div class="col-lg-2 col-md-12 px-0 position-relative text-center logobox">
								<div class="logo">
									<?php 
									if (has_custom_logo()) {
										the_custom_logo();
									} else {
										// Check if both title and tagline settings are disabled
										$expert_hotel_booking_tagline_enabled = get_theme_mod('expert_hotel_booking_tagline_setting', false);
										$expert_hotel_booking_title_enabled = get_theme_mod('expert_hotel_booking_site_title_setting', false);

										if (!$expert_hotel_booking_tagline_enabled && !$expert_hotel_booking_title_enabled) {
											// Display the default logo
											$default_logo_url = get_template_directory_uri() . '/assets/images/logo.png'; // Replace with your default logo path
											echo '<a href="' . esc_url(home_url('/')) . '">';
											echo '<img src="' . esc_url($default_logo_url) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
											echo '</a>';
										}

										// Display tagline if the setting is enabled
										if ($expert_hotel_booking_tagline_enabled) :
											$expert_hotel_booking_site_desc = get_bloginfo('description'); ?>
											<p class="site-description"><?php echo esc_html($expert_hotel_booking_site_desc); ?></p>
										<?php endif; ?>

										<?php
										// Display site title if the setting is enabled
										if ($expert_hotel_booking_title_enabled) : ?>
											<p class="site-title">
												<a href="<?php echo esc_url(home_url('/')); ?>">
													<?php echo esc_html(get_bloginfo('name')); ?>
												</a>
											</p>
										<?php endif; ?>
									<?php } ?>
								</div>
							</div>
							<div class="col-lg-5">
								<div class="navbar-menubar right-menu">
		              <div class="collapse navbar-collapse navbar-menu">
							<?php 
				                wp_nav_menu( array( 
				                  'theme_location' => 'primary-right',
				                  'container_class' => 'main-menu clearfix' ,
				                  'menu_class' => 'clearfix',
				                  'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
				                  'fallback_cb' => 'wp_page_menu',
				                ) ); 
				            ?>
		              </div>
		            </div>
		          </div>
	      	</div>
	      </nav>
	    </div>
	</div>
  </div>
</header>