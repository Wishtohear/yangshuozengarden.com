<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Expert Hotel Booking
 */

// For archive post setting
$expert_hotel_booking_post_heading = get_theme_mod('expert_hotel_booking_post_heading_settings', '1');
$expert_hotel_booking_post_content = get_theme_mod('expert_hotel_booking_post_content_settings', '1');
$expert_hotel_booking_post_feature_image = get_theme_mod('expert_hotel_booking_post_featured_image_settings', '1');
$expert_hotel_booking_post_date = get_theme_mod('expert_hotel_booking_post_date_settings', '1');
$expert_hotel_booking_post_comments = get_theme_mod('expert_hotel_booking_post_comments_settings', '1');
$expert_hotel_booking_post_author = get_theme_mod('expert_hotel_booking_post_author_settings', '1');
$expert_hotel_booking_post_timing = get_theme_mod('expert_hotel_booking_post_timing_settings', '1');
$expert_hotel_booking_post_tags = get_theme_mod('expert_hotel_booking_post_tags_settings', '1');

// For single post setting
$expert_hotel_booking_single_post_heading = get_theme_mod('expert_hotel_booking_single_post_heading_settings', '1');
$expert_hotel_booking_single_post_content = get_theme_mod('expert_hotel_booking_single_post_content_settings', '1');
$expert_hotel_booking_single_post_feature_image = get_theme_mod('expert_hotel_booking_single_post_featured_image_settings', '1');
$expert_hotel_booking_single_post_date = get_theme_mod('expert_hotel_booking_single_post_date_settings', '1');
$expert_hotel_booking_single_post_comments = get_theme_mod('expert_hotel_booking_single_post_comments_settings', '1');
$expert_hotel_booking_single_post_author = get_theme_mod('expert_hotel_booking_single_post_author_settings', '1');
$expert_hotel_booking_single_post_timing = get_theme_mod('expert_hotel_booking_single_post_timing_settings', '1');
$expert_hotel_booking_single_post_tags = get_theme_mod('expert_hotel_booking_single_post_tags_settings', '1');

$expert_hotel_booking_is_archive_visible = (
    $expert_hotel_booking_post_heading == '1' ||
    $expert_hotel_booking_post_content == '1' ||
    $expert_hotel_booking_post_feature_image == '1' ||
    $expert_hotel_booking_post_date == '1' ||
    $expert_hotel_booking_post_comments == '1' ||
    $expert_hotel_booking_post_author == '1' ||
    $expert_hotel_booking_post_timing == '1' ||
    $expert_hotel_booking_post_tags == '1'
);

$expert_hotel_booking_is_single_visible = (
    $expert_hotel_booking_single_post_heading == '1' ||
    $expert_hotel_booking_single_post_content == '1' ||
    $expert_hotel_booking_single_post_feature_image == '1' ||
    $expert_hotel_booking_single_post_date == '1' ||
    $expert_hotel_booking_single_post_comments == '1' ||
    $expert_hotel_booking_single_post_author == '1' ||
    $expert_hotel_booking_single_post_timing == '1' ||
    $expert_hotel_booking_single_post_tags == '1'
);

if (!is_single() && !$expert_hotel_booking_is_archive_visible) {
    return;
}

if (is_single() && !$expert_hotel_booking_is_single_visible) {
    return;
}

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('blog-item'); ?>>
	<?php
		$expert_hotel_booking_post_id = get_the_ID();
		$expert_hotel_booking_post = get_post($expert_hotel_booking_post_id);
		$expert_hotel_booking_content = do_shortcode(apply_filters('the_content', $expert_hotel_booking_post->post_content));
		$expert_hotel_booking_embeds = get_media_embedded_in_content($expert_hotel_booking_content);

		if (!empty($expert_hotel_booking_embeds)) {
			foreach ($expert_hotel_booking_embeds as $expert_hotel_booking_embed) {
				$expert_hotel_booking_embed = wp_kses($expert_hotel_booking_embed, array(
					'iframe' => array(
						'src' => array(),
						'width' => array(),
						'height' => array(),
						'frameborder' => array(),
						'allowfullscreen' => array(),
					),
					'video' => array(
						'src' => array(),
						'width' => array(),
						'height' => array(),
						'controls' => array(),
					),
				));
				if (strpos($expert_hotel_booking_embed, 'video') !== false || 
					strpos($expert_hotel_booking_embed, 'youtube') !== false || 
					strpos($expert_hotel_booking_embed, 'vimeo') !== false || 
					strpos($expert_hotel_booking_embed, 'dailymotion') !== false || 
					strpos($expert_hotel_booking_embed, 'vine') !== false || 
					strpos($expert_hotel_booking_embed, 'wordpress.tv') !== false || 
					strpos($expert_hotel_booking_embed, 'hulu') !== false) {
					?>
					<div class="custom-embedded-video">
						<div class="video-container">
							<?php echo $expert_hotel_booking_embed; ?>
						</div>
						<div class="video-comments">
							<?php comments_template(); ?>
						</div>
					</div>
					<?php
				}
			}
		}
	?>
	<?php
	if (is_single()) :
        if ($expert_hotel_booking_single_post_date == '1') : ?>
            <h6 class="theme-button"><?php echo esc_html(get_the_date('j')); ?>, <?php echo esc_html(get_the_date('M')); ?> <?php echo esc_html(get_the_date('Y')); ?></h6>
        <?php endif;
    else :
        if ($expert_hotel_booking_post_date == '1') : ?>
            <h6 class="theme-button"><?php echo esc_html(get_the_date('j')); ?>, <?php echo esc_html(get_the_date('M')); ?> <?php echo esc_html(get_the_date('Y')); ?></h6>
        <?php endif;
    endif;
    ?>

    <div class="blog-content">
        <?php
        if (is_single()) :
            if ($expert_hotel_booking_single_post_heading == '1') :
                the_title('<h5 class="post-title">', '</h5>');
            endif;
        else :
            if ($expert_hotel_booking_post_heading == '1') :
                the_title(sprintf('<h5 class="post-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h5>');
            endif;
        endif;

        if (is_singular()) :
            if ($expert_hotel_booking_single_post_content == '1') :
                the_content();
            endif;
        else :
            $expert_hotel_booking_excerpt_limit = get_theme_mod('expert_hotel_booking_excerpt_limit', 50);

            if ($expert_hotel_booking_post_content == '1') :
                echo "<p>" . wp_trim_words(get_the_excerpt(), $expert_hotel_booking_excerpt_limit) . "</p>";
            endif;
        endif;
        ?>
    </div>

    <?php if (is_singular()) : ?>
        <ul class="comment-timing">
            <?php if ($expert_hotel_booking_single_post_comments == '1') : ?>
                <li><a href="javascript:void(0);"><i class="fa fa-comment"></i> <?php echo esc_html(get_comments_number($post->ID)); ?></a></li>
            <?php endif; ?>

            <?php if ($expert_hotel_booking_single_post_author == '1') : ?>
                <li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><i class="fa fa-user"></i><?php esc_html_e('By', 'expert-hotel-booking'); ?> <?php the_author(); ?></a></li>
            <?php endif; ?>

            <?php if ($expert_hotel_booking_single_post_timing == '1') : ?>
                <li><a href="javascript:void(0);"><i class="fas fa-clock pe-1"></i> <?php echo esc_html( get_the_time( 'F j, Y' ) ); ?> <?php echo esc_html( get_the_time( 'H:i A' ) ); ?></li>
            <?php endif; ?>

            
        </ul>
        <?php else : ?>
        <ul class="comment-timing">
            <?php if ($expert_hotel_booking_post_comments == '1') : ?>
                <li><a href="javascript:void(0);"><i class="fa fa-comment"></i> <?php echo esc_html(get_comments_number($post->ID)); ?></a></li>
            <?php endif; ?>

            <?php if ($expert_hotel_booking_post_author == '1') : ?>
                <li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><i class="fa fa-user"></i><?php esc_html_e('By', 'expert-hotel-booking'); ?> <?php the_author(); ?></a></li>
            <?php endif; ?>

            <?php if ($expert_hotel_booking_post_timing == '1') : ?>
                <li><a href="javascript:void(0);"><i class="fas fa-clock pe-1"></i> <?php echo esc_html( get_the_time( 'F j, Y' ) ); ?> <?php echo esc_html( get_the_time( 'H:i A' ) ); ?></a></li>
            <?php endif; ?>
        </ul>
    <?php endif; ?>

    <?php
    if (is_singular()) :
        if ($expert_hotel_booking_single_post_tags == '1') : ?>
            <div class="blog-tags mt-3">
                <?php the_tags(); ?>
            </div>
        <?php endif;
        else :
        if ($expert_hotel_booking_post_tags == '1') : ?>
            <div class="blog-tags mt-3">
                <?php the_tags(); ?>
            </div>
        <?php endif;
    endif;
    ?>
</div>