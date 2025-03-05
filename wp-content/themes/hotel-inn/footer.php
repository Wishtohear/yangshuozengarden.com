<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hotel_inn
 */

$hotel_inn_options = hotel_inn_theme_options();

$show_prefooter = $hotel_inn_options['show_prefooter'];
$footer_text = $hotel_inn_options['copyright_text'];

?>

<footer id="colophon" class="site-footer">


	<?php if ($show_prefooter== 1){ ?>
	    <section class="footer-sec">
	        <div class="container">
	            <div class="row">
	                <?php if (is_active_sidebar('hotel_inn_footer_1')) : ?>
	                    <div class="col-md-4">
	                        <?php dynamic_sidebar('hotel_inn_footer_1') ?>
	                    </div>
	                    <?php
	                else: hotel_inn_blank_widget();
	                endif; ?>
	                <?php if (is_active_sidebar('hotel_inn_footer_2')) : ?>
	                    <div class="col-md-4">
	                        <?php dynamic_sidebar('hotel_inn_footer_2') ?>
	                    </div>
	                    <?php
	                else: hotel_inn_blank_widget();
	                endif; ?>
	                <?php if (is_active_sidebar('hotel_inn_footer_3')) : ?>
	                    <div class="col-md-4">
	                        <?php dynamic_sidebar('hotel_inn_footer_3') ?>
	                    </div>
	                    <?php
	                else: hotel_inn_blank_widget();
	                endif; ?>
	            </div>
	        </div>
	    </section>
	<?php } ?>

		<div class="site-info">
		<?php if($footer_text){ ?>
			<p><?php echo esc_html($footer_text); ?> </p>
			<?php } 

		else{ ?>

		<p><?php esc_html_e('Powered By WordPress', 'hotel-inn');
                    esc_html_e(' | ', 'hotel-inn') ?>
                    <span><a target="_blank" rel="nofollow"
                       href="<?php echo esc_url('https://www.flawlessthemes.com/theme/hotel-inn-best-hotel-booking-wordpress-theme/'); ?>"><?php esc_html_e('Hotel Inn' , 'hotel-inn'); ?></a></span>
					   </p> <?php } ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); 

?>

<!-- // Demo buy CTA button - Start -->
<?php if ( get_option( 'theme_demo' ) )  { ?>
	<style>
#back-to-top {
	bottom: 100px;
}
@media only screen and (max-width: 991px) {
	footer.site-footer{
		padding-bottom:60px;
	}
	.site-info {
		padding-left: 55px;
        padding-right: 55px;
    }	  
}
</style>
<div class="box_wrapper">
<div class="toggle" id="togglePopup"></div>
<div class="section-deal">
<h2>Make your website live today!</h2>
<h3>GET <strong>A FULL</strong> COPY OF THIS EXACT DEMO THEME IN YOUR WORDPRESS WITHIN MINUTES.</h3>
<ul>
<li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 13">
<path fill="#a0c801"
                            d="M15.57 2.845L14.238 1.51c-.13-.13-.353-.13-.48 0L6.66 8.623l-3.093-3.11c-.13-.13-.352-.13-.482 0L1.75 6.845c-.128.13-.128.352 0 .48l4.67 4.67c.073.055.147.092.24.092s.167-.037.24-.093l8.67-8.67c.13-.13.13-.35 0-.48z">
</path>
</svg> Effortless one-click demo import</li>
<li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 13">
<path fill="#a0c801"
                            d="M15.57 2.845L14.238 1.51c-.13-.13-.353-.13-.48 0L6.66 8.623l-3.093-3.11c-.13-.13-.352-.13-.482 0L1.75 6.845c-.128.13-.128.352 0 .48l4.67 4.67c.073.055.147.092.24.092s.167-.037.24-.093l8.67-8.67c.13-.13.13-.35 0-.48z">
</path>
</svg> Theme Installation Service at <strong>$29</strong></li>
<li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 13">
<path fill="#a0c801"
                            d="M15.57 2.845L14.238 1.51c-.13-.13-.353-.13-.48 0L6.66 8.623l-3.093-3.11c-.13-.13-.352-.13-.482 0L1.75 6.845c-.128.13-.128.352 0 .48l4.67 4.67c.073.055.147.092.24.092s.167-.037.24-.093l8.67-8.67c.13-.13.13-.35 0-.48z">
</path>
</svg> Life Time Updates & Premium Support</li>
<li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 13">
<path fill="#a0c801"
                            d="M15.57 2.845L14.238 1.51c-.13-.13-.353-.13-.48 0L6.66 8.623l-3.093-3.11c-.13-.13-.352-.13-.482 0L1.75 6.845c-.128.13-.128.352 0 .48l4.67 4.67c.073.055.147.092.24.092s.167-.037.24-.093l8.67-8.67c.13-.13.13-.35 0-.48z">
</path>
</svg> Risk-Free 7 Days Money Back Policy</li>
</ul>
<p>Purchase this WordPress theme and <strong> save $10</strong> today</p>
</div>
<div class="section-action">
<a href="https://www.flawlessthemes.com/theme/hotel-inn-best-hotel-booking-wordpress-theme/" class="action-button" target="_blank"><span class="main">Buy Hotel Inn Theme </span><span
                    class="after">SALE</span>
</a>
<!--  <span class="alternative-action">or
<a href="https://elegantblogthemes.com/theme/vinyl-news-mag-best-newspaper-and-magazine-wordpress-theme/" target="_blank">learn more about it's features</a>
</span> -->
</div>
</div>
<script>
       document.addEventListener('DOMContentLoaded', function () {
        var toggleButton = document.getElementById('togglePopup');
        var boxWrapper = document.querySelector('.box_wrapper');
        toggleButton.addEventListener('click', function () {
            boxWrapper.classList.toggle('open');
        });
    });
</script>
<?php } ?>
<!-- // Demo buy CTA button - End -->
</body>
</html>
