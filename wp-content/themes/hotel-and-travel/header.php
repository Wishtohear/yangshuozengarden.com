<?php
/**
* Theme Header
* This is the template that displays all of the <head> section and everything up until <div id="content">
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
* @package Best_Shop
* DOCTYPE hook 
* @hooked hotel_and_travel_doctype
*/
do_action( 'hotel_and_travel_doctype' );
?>
<head itemscope itemtype="https://schema.org/WebSite">
<?php 
    /**
     * Before wp_head
     * 
     * @hooked hotel_and_travel_head
    */
    do_action( 'hotel_and_travel_before_wp_head' );
	wp_head(); 
    ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">
<?php wp_body_open();
    /**
     * Before Header
     * 
     * @hooked hotel_and_travel_page_start 
    */
    do_action( 'hotel_and_travel_before_header' );

	/**
	 * Header
	 */
    

    $hotel_and_travel_header_layout = hotel_and_travel_get_header_style();
            
    //if header layout is customizer or empty, get customizer setting
    if ($hotel_and_travel_header_layout === 'customizer-setting' || $hotel_and_travel_header_layout === '' ) {
        $hotel_and_travel_header_layout = hotel_and_travel_get_setting('header_layout');
    }
        

    ?>
    
		<header id="masthead" class="site-header style-one 
        <?php if ($hotel_and_travel_header_layout==='transparent-header') { 
            echo esc_attr($hotel_and_travel_header_layout); 
        } 
                                     
        ?>"
        itemscope itemtype="https://schema.org/WPHeader">
            
            <?php if(hotel_and_travel_get_setting('enable_top_bar')): ?>
            
            <div class="top-bar-menu">
                <div class="container">
                    
                    <div class="left-menu">                        
                    <?php
                        
                        if(hotel_and_travel_get_setting('top_bar_left_content') === 'menu') {
                            
                            wp_nav_menu( array( 'container_class' => 'top-bar-menu', 
                                                'theme_location'  =>  'top-bar-left-menu', 
                                                'depth' =>  1,
                                            ) );
                            
                        } elseif(hotel_and_travel_get_setting('top_bar_left_content') === 'contacts'){
                        ?><ul>
                        <?php if (hotel_and_travel_get_setting('phone_number')!=''): ?>
                        <li><?php echo esc_html(hotel_and_travel_get_setting('phone_title')).esc_html(hotel_and_travel_get_setting('phone_number')) ; ?></li>
                        <?php endif; ?>  
                        
                        <?php if (hotel_and_travel_get_setting('address')!=''): ?>
                        <li><?php echo esc_html(hotel_and_travel_get_setting('address_title')).esc_html(hotel_and_travel_get_setting('address')) ; ?></li>
                        <?php endif; ?> 
                        
                        <?php if (hotel_and_travel_get_setting('mail_description')!=''): ?>
                        <li><?php echo esc_html(hotel_and_travel_get_setting('mail_title')).esc_html(hotel_and_travel_get_setting('mail_description')) ; ?></li>
                        <?php endif; ?>   
                        
                        </ul><?php
                        } elseif(hotel_and_travel_get_setting('top_bar_left_content') === 'text')  {
                            ?><ul><li><?php echo esc_html((hotel_and_travel_get_setting('top_bar_left_text')) ); ?></li></ul><?php    
                        }


                    ?>                      
                    </div>
                    
                    <div class="right-menu">
                    <?php
                     if(hotel_and_travel_get_setting('top_bar_right_content') === 'menu') {
                      wp_nav_menu( array( 'container_class' => 'top-bar-menu', 
                                        'theme_location' =>  'top-bar-right-menu', 
                                        'depth' =>  1,
                                      ) );                         
                     } elseif(hotel_and_travel_get_setting('top_bar_right_content') === 'social'){
                         
                         hotel_and_travel_social_links( true );
                         
                     } elseif(hotel_and_travel_get_setting('top_bar_right_content') === 'menu_social'){
                         
                       wp_nav_menu( array( 'container_class' => 'top-bar-menu', 
                                        'theme_location' =>  'top-bar-right-menu', 
                                        'depth' =>  1,
                                      ) );
                         
                        hotel_and_travel_social_links( true );
                         
                     } 

                    ?>
                    </div>
                    
                </div>
            </div>
            
            <?php endif; /* end top bar*/ ?> 
                         
			<div class=" <?php if(hotel_and_travel_get_setting('menu_layout') === 'default' ) { echo 'main-menu-wrap'; } else { echo 'burger-banner'; } ?> ">
                <div class="container">
				<div class="header-wrapper">
					<?php 
					/**
					 * Site Branding 
					*/
					hotel_and_travel_site_branding();           
					?>
					<div class="nav-wrap">
                        <?php if(hotel_and_travel_get_setting('menu_layout') === 'default' ) { ?>
						<div class="header-left">
							<?php 
							/**
							 * Primary navigation 
							*/
							hotel_and_travel_primary_navigation(); 
							?>
						</div>
						<div class="header-right">
							<?php
							/**
							 * Header Search 
							*/ 
							hotel_and_travel_header_search();
							?>
						</div>
                        <?php } else { ?>
                        <div class="banner header-right media-image-news">
                            <img src="<?php echo esc_url(hotel_and_travel_get_setting('header_banner_img')); ?>">
                            <?php echo wp_kses_post(do_shortcode(hotel_and_travel_get_setting('header_shortcode'))); ?>
                        </div>
                        <?php } ?>
                        
					</div><!-- #site-navigation -->
				</div>
                </div>
			</div>
            
            <?php
            if(hotel_and_travel_get_setting('menu_layout') === 'full_width' ) {
            ?>
            
            <!--Burger header-->
            <div class="burger main-menu-wrap">
            <div class="container">
            <div class="header-wrapper">
            <div class="nav-wrap">
                <div class="header-left">
                    <?php 
                    /**
                     * Primary navigation 
                    */
                    hotel_and_travel_primary_navigation(); 
                    ?>
                </div>
                <div class="header-right">
                    <?php
                    /**
                     * Header Search 
                    */ 
                    hotel_and_travel_header_search();
                    ?>
                </div>
            </div>
            </div>
            </div>
            </div>
            <!-- #site-navigation -->            
            
			<?php
            }
                
			/**
			 * Mobile navigation
			 */
			hotel_and_travel_mobile_navigation(); 
            
			/**
			 * Header shortcode
			 */            
            $hotel_and_travel_woo_ajax_search_code = trim((hotel_and_travel_get_setting('woo_ajax_search_code')));
            if($hotel_and_travel_woo_ajax_search_code !== '') {            
            ?>
            <div class="container">
                <div class="row">
                <?php
                    echo do_shortcode((wp_kses_post($hotel_and_travel_woo_ajax_search_code)));                
                ?>
                </div>
            </div>
            <?php } ?>
            
            
		</header><!-- #masthead -->
    

     <?php
    
    /**
	 * * @hooked hotel_and_travel_primary_page_header - 10
	*/
	do_action( 'hotel_and_travel_before_posts_content' );
    