<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hotel Booking Lite
 */

$hotel_booking_lite_post_page_title =  get_theme_mod( 'hotel_booking_lite_post_page_title', 1 );
$hotel_booking_lite_post_page_btn = get_theme_mod( 'hotel_booking_lite_post_page_btn', 1 );
$hotel_booking_lite_post_page_content =  get_theme_mod( 'hotel_booking_lite_post_page_content', 1 );
?>

<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $audio = false;

  // Only get audio from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $audio = get_media_embedded_in_content( $content, array( 'audio' ) );
  }
?>

  <div class="col-lg-6 col-md-6 col-sm-6">
    <article id="post-<?php the_ID(); ?>" <?php post_class('article-box'); ?>>
      <?php
        if ( ! is_single() ) {
          // If not a single post, highlight the audio file.
          if ( ! empty( $audio ) ) {
            foreach ( $audio as $audio_html ) {
              echo '<div class="entry-audio">';
                echo $audio_html;
              echo '</div><!-- .entry-audio -->';
            }
          };
        };
      ?>
      <div class="entry-summary">
        <?php if ($hotel_booking_lite_post_page_title == 1 ) {?>
          <?php the_title('<h3 class="entry-title pb-2"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>');?>
        <?php }?>
        <?php if ($hotel_booking_lite_post_page_content == 1 ) {?>
          <p><?php echo wp_trim_words( get_the_content(), esc_attr(get_theme_mod('hotel_booking_lite_post_page_excerpt_length', 30)) ); ?><?php echo esc_html(get_theme_mod('hotel_booking_lite_post_page_excerpt_suffix','[...]')); ?></p>
        <?php }?>
        <?php if ($hotel_booking_lite_post_page_btn == 1 ) {?>
          <a href="<?php the_permalink(); ?>" class="btn-text"><?php esc_html_e('Read More','hotel-booking-lite'); ?></a>
        <?php }?>
      </div>
    </article>
  </div>