<?php 
if (isset($_GET['import-demo']) && $_GET['import-demo'] == true) {

    // ------- Create Nav Menu --------
$adventure_travelling_menuname = 'Main Menus';
$adventure_travelling_bpmenulocation = 'primary-menu';
$adventure_travelling_menu_exists = wp_get_nav_menu_object($adventure_travelling_menuname);

if (!$adventure_travelling_menu_exists) {
    $adventure_travelling_menu_id = wp_create_nav_menu($adventure_travelling_menuname);

    // Create Home Page
    $adventure_travelling_home_title = 'Home';
    $adventure_travelling_home = array(
        'post_type' => 'page',
        'post_title' => $adventure_travelling_home_title,
        'post_content' => '',
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'home'
    );
    $adventure_travelling_home_id = wp_insert_post($adventure_travelling_home);

    // Assign Home Page Template
    add_post_meta($adventure_travelling_home_id, '_wp_page_template', 'page-template/front-page.php');

    // Update options to set Home Page as the front page
    update_option('page_on_front', $adventure_travelling_home_id);
    update_option('show_on_front', 'page');

    // Add Home Page to Menu
    wp_update_nav_menu_item($adventure_travelling_menu_id, 0, array(
        'menu-item-title' => __('Home', 'adventure-travelling'),
        'menu-item-classes' => 'home',
        'menu-item-url' => home_url('/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $adventure_travelling_home_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Create About Us Page with Dummy Content
    $adventure_travelling_about_title = 'About Us';
    $adventure_travelling_about_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
    $adventure_travelling_about = array(
        'post_type' => 'page',
        'post_title' => $adventure_travelling_about_title,
        'post_content' => $adventure_travelling_about_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'about-us'
    );
    $adventure_travelling_about_id = wp_insert_post($adventure_travelling_about);

    // Add About Us Page to Menu
    wp_update_nav_menu_item($adventure_travelling_menu_id, 0, array(
        'menu-item-title' => __('About Us', 'adventure-travelling'),
        'menu-item-classes' => 'about-us',
        'menu-item-url' => home_url('/about-us/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $adventure_travelling_about_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Create Services Page with Dummy Content
    $adventure_travelling_services_title = 'Services';
    $adventure_travelling_services_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
    $adventure_travelling_services = array(
        'post_type' => 'page',
        'post_title' => $adventure_travelling_services_title,
        'post_content' => $adventure_travelling_services_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'services'
    );
    $adventure_travelling_services_id = wp_insert_post($adventure_travelling_services);

    // Add Services Page to Menu
    wp_update_nav_menu_item($adventure_travelling_menu_id, 0, array(
        'menu-item-title' => __('Services', 'adventure-travelling'),
        'menu-item-classes' => 'services',
        'menu-item-url' => home_url('/services/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $adventure_travelling_services_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Create Pages Page with Dummy Content
    $adventure_travelling_pages_title = 'Pages';
    $adventure_travelling_pages_content = '<h2>Our Pages</h2>
    <p>Explore all the pages we have on our website. Find information about our services, company, and more.</p>';
    $adventure_travelling_pages = array(
        'post_type' => 'page',
        'post_title' => $adventure_travelling_pages_title,
        'post_content' => $adventure_travelling_pages_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'pages'
    );
    $adventure_travelling_pages_id = wp_insert_post($adventure_travelling_pages);

    // Add Pages Page to Menu
    wp_update_nav_menu_item($adventure_travelling_menu_id, 0, array(
        'menu-item-title' => __('Pages', 'adventure-travelling'),
        'menu-item-classes' => 'pages',
        'menu-item-url' => home_url('/pages/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $adventure_travelling_pages_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Create Contact Page with Dummy Content
    $adventure_travelling_contact_title = 'Contact';
    $adventure_travelling_contact_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
    $adventure_travelling_contact = array(
        'post_type' => 'page',
        'post_title' => $adventure_travelling_contact_title,
        'post_content' => $adventure_travelling_contact_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'contact'
    );
    $adventure_travelling_contact_id = wp_insert_post($adventure_travelling_contact);

    // Add Contact Page to Menu
    wp_update_nav_menu_item($adventure_travelling_menu_id, 0, array(
        'menu-item-title' => __('Contact', 'adventure-travelling'),
        'menu-item-classes' => 'contact',
        'menu-item-url' => home_url('/contact/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $adventure_travelling_contact_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Set the menu location if it's not already set
    if (!has_nav_menu($adventure_travelling_bpmenulocation)) {
        $locations = get_theme_mod('nav_menu_locations'); // Use 'nav_menu_locations' to get locations array
        if (empty($locations)) {
            $locations = array();
        }
        $locations[$adventure_travelling_bpmenulocation] = $adventure_travelling_menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }
}

        //---Header--//
        set_theme_mod('adventure_travelling_search_icon', true);
        set_theme_mod('adventure_travelling_mail_text', 'drop us email');
        set_theme_mod('adventure_travelling_mail', 'companyname@gmail.com');

        set_theme_mod('adventure_travelling_call_text', 'any questions? drop us');
        set_theme_mod('adventure_travelling_call', '123-456-7890 / +223-456-7890 ');

        // Slider Section
        set_theme_mod('adventure_travelling_slider_arrows', true);

        for ($i = 1; $i <= 4; $i++) {
            $adventure_travelling_title = 'Enjoy A Luxury Experience';
            // Create post object
            $my_post = array(
                'post_title'    => wp_strip_all_tags($adventure_travelling_title),
                'post_status'   => 'publish',
                'post_type'     => 'page',
            );

            /// Insert the post into the database
            $post_id = wp_insert_post($my_post);

            if ($post_id) {
                // Set the theme mod for the slider page
                set_theme_mod('adventure_travelling_slider_page' . $i, $post_id);

                $image_url = get_stylesheet_directory_uri() . '/assets/images/slider-img.png';
                $image_id = media_sideload_image($image_url, $post_id, null, 'id');

                if (!is_wp_error($image_id)) {
                    // Set the downloaded image as the post's featured image
                    set_post_thumbnail($post_id, $image_id);
                }
            }
        }


        // Our Services Section
        set_theme_mod('resort_hotel_booking_offer_section_tittle', 'Our Most Popular Rooms');
        set_theme_mod('resort_hotel_booking_offer_section_category', 'postcategory1');

        // Define post category names and post titles
        $resort_hotel_booking_category_names = array('postcategory1');
        $resort_hotel_booking_title_array = array(
            array("Room With View", "Double Rooms", "Family Rooms")
        );

        foreach ($resort_hotel_booking_category_names as $resort_hotel_booking_index => $resort_hotel_booking_category_name) {
            // Create or retrieve the post category term ID
            $resort_hotel_booking_term = term_exists($resort_hotel_booking_category_name, 'category');
            if ($resort_hotel_booking_term === 0 || $resort_hotel_booking_term === null) {
                $resort_hotel_booking_term = wp_insert_term($resort_hotel_booking_category_name, 'category');
            }
            if (is_wp_error($resort_hotel_booking_term)) {
                error_log('Error creating category: ' . $resort_hotel_booking_term->get_error_message());
                continue; // Skip to the next iteration if category creation fails
            }

            $category_id = is_array($resort_hotel_booking_term) ? $resort_hotel_booking_term['term_id'] : $resort_hotel_booking_term;

            for ($resort_hotel_booking_i = 0; $resort_hotel_booking_i < 3; $resort_hotel_booking_i++) {
                // Create post content
                $resort_hotel_booking_title = $resort_hotel_booking_title_array[$resort_hotel_booking_index][$resort_hotel_booking_i];

                // Create the post object
                $resort_hotel_booking_my_post = array(
                    'post_title'    => wp_strip_all_tags($resort_hotel_booking_title),
                    'post_status'   => 'publish',
                    'post_type'     => 'post', // Post type set to 'post'
                );

                // Insert the post into the database
                $resort_hotel_booking_post_id = wp_insert_post($resort_hotel_booking_my_post);

                if (is_wp_error($resort_hotel_booking_post_id)) {
                    error_log('Error creating post: ' . $resort_hotel_booking_post_id->get_error_message());
                    continue; // Skip to the next post if creation fails
                }

                // Assign the category to the post
                wp_set_post_categories($resort_hotel_booking_post_id, array($category_id));

                // Add custom meta fields
                update_post_meta($resort_hotel_booking_post_id, 'resort_hotel_booking_hotel_amount', "$999");
                update_post_meta($resort_hotel_booking_post_id, 'resort_hotel_booking_reviews_count', "5");
                update_post_meta($resort_hotel_booking_post_id, 'resort_hotel_booking_hotel_days', "7 days 6 nights");

                // Handle the featured image using media_sideload_image
                $resort_hotel_booking_image_url = get_stylesheet_directory_uri() . '/assets/images/post-img' . ($resort_hotel_booking_i + 1) . '.png';
                $resort_hotel_booking_image_id = media_sideload_image($resort_hotel_booking_image_url, $resort_hotel_booking_post_id, null, 'id');

                if (is_wp_error($resort_hotel_booking_image_id)) {
                    error_log('Error downloading image: ' . $resort_hotel_booking_image_id->get_error_message());
                    continue; // Skip to the next post if image download fails
                }

                // Assign featured image to the post
                set_post_thumbnail($resort_hotel_booking_post_id, $resort_hotel_booking_image_id);
            }
        }


    }
?>