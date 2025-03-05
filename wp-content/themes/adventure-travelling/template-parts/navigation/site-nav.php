<?php
/*
* Display Theme menus
*/
?>
<?php
$adventure_travelling_sticky = get_theme_mod('adventure_travelling_sticky');
    $adventure_travelling_data_sticky = "false";
    if ($adventure_travelling_sticky) {
    $adventure_travelling_data_sticky = "true";
    }
    global $wp_customize;
?>

<div class="menubar <?php if( is_user_logged_in() && !isset( $wp_customize ) ){ echo "login-user";} ?>" data-sticky="<?php echo esc_attr($adventure_travelling_data_sticky); ?>">
  	<div class="container right_menu">
  		<div class="row">
	    	<div class="menubox col-lg-11 col-md-10 col-8 align-self-center">
	      		<div class="innermenubox">
			          	<div class="toggle-nav mobile-menu">
	            			<button onclick="adventure_travelling_menu_open()" class="responsivetoggle"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','adventure-travelling'); ?></span></button>
	          			</div>
         	 		<div id="mySidenav" class="nav sidenav">
            			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'adventure-travelling' ); ?>">
			              	<?php 
			                  	wp_nav_menu( array(
				                    'theme_location' => 'primary-menu',
				                    'container_class' => 'main-menu clearfix' ,
				                    'menu_class' => 'clearfix',
				                    'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
				                    'fallback_cb' => 'wp_page_menu',
			                  	) );
			              	?>
              				<a href="javascript:void(0)" class="closebtn mobile-menu" onclick="adventure_travelling_menu_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','adventure-travelling'); ?></span></a>
	            		</nav>
	          		</div>
          			<div class="clearfix"></div>
        		</div>
	    	</div>
	      	<div class="col-lg-1 col-md-2 col-5 align-self-center d-flex justify-content-center align-items-center">
	    		<?php if(get_theme_mod('adventure_travelling_search_icon',true) != ''){ ?>
			        <span class="search-bar">
			            <button type="button" class="open-search"><i class="fas fa-search"></i></button>
			        </span>
		    	<?php }?>
		    </div>
		    <div class="search-outer">
		        <div class="inner_searchbox w-100 h-100">
		            <?php get_search_form(); ?>
		        </div>
		        <button type="button" class="search-close"><?php esc_html_e('CLOSE', 'adventure-travelling'); ?></button>
		    </div>
	    </div>
  	</div>
</div>
