<?php
	global $mt_options;
	$show_footer = $mt_options['show_main_footer'];
	$show_footer_bottom = $mt_options['show_bottom_footer'];
	$footer_text = html_entity_decode($mt_options['footer_text']);
	$footer_info = $mt_options['footer_bottom_info'];
	$social_icons = html_entity_decode($mt_options['footer_bottom_socials']);

	if( !is_page_template( 'template-blank.php' ) ) {

		if($show_footer == 1) { get_template_part('/includes/footer-widgets' ); } ?>

		<?php if($show_footer_bottom == 1) { ?>
		<footer class="footer-bottom-wrapper">
			<div class="container">
				<div class="footer-bottom row">
					<div class="col-md-6">
						<div class="copyright">
							<p><?php echo do_shortcode($footer_text); ?></p>
						</div>
					</div>
					<div class="col-md-6">
						<?php
						if ($footer_info == 'menu') {
							if(has_nav_menu('footer-menu')) {
							?>
							<ul class="footer-nav list-unstyled">
								<?php wp_nav_menu( array('theme_location' => 'footer-menu', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
							</ul>
							<?php
							}
						} else {
							echo '<div class="footer-socials">'.do_shortcode($social_icons).'</div>';
						}
						?>
					</div>
				</div><!-- / .footer-bottom -->
			</div><!-- / .container -->
		</footer><!-- / .footer-bottom-wrapper -->

	<?php } // !template-blank.php ?>

</div><!-- / .content-wrapper -->

<?php }
if (!empty($mt_options['google_analytics'])) {
	echo stripslashes($mt_options['google_analytics']);
}
wp_footer();
?>
</body>
</html>