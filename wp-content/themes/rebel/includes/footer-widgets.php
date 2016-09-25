<?php

	global $mt_options;
	$footer_col = $mt_options['show_footer_columns'];
	$f1w = $mt_options['footer_1col_width'];
	$f2w = $mt_options['footer_2col_width'];
	$f3w = $mt_options['footer_3col_width'];
	$f4w = $mt_options['footer_4col_width'];

	if (function_exists('dynamic_sidebar')) {

?>
<footer class="footer-wrapper">
	<div class="footer container">
		<div class="row">
			<?php if($footer_col == 1) { ?>
				<div class="footer-col col-md-<?php echo $f1w; ?>"><?php dynamic_sidebar('footer-widgets1') ?></div>
			<?php } elseif($footer_col == 2) { ?>
				<div class="footer-col col-md-<?php echo $f1w; ?>"><?php dynamic_sidebar('footer-widgets1') ?></div>
				<div class="footer-col col-md-<?php echo $f2w; ?>"><?php dynamic_sidebar('footer-widgets2') ?></div>
			<?php } elseif($footer_col == 3) { ?>
				<div class="footer-col col-md-<?php echo $f1w; ?>"><?php dynamic_sidebar('footer-widgets1') ?></div>
				<div class="footer-col col-md-<?php echo $f2w; ?>"><?php dynamic_sidebar('footer-widgets2') ?></div>
				<div class="footer-col col-md-<?php echo $f3w; ?>"><?php dynamic_sidebar('footer-widgets3') ?></div>
			<?php } else { ?>
				<div class="footer-col col-md-<?php echo $f1w; ?>"><?php dynamic_sidebar('footer-widgets1') ?></div>
				<div class="footer-col col-md-<?php echo $f2w; ?>"><?php dynamic_sidebar('footer-widgets2') ?></div>
				<div class="footer-col col-md-<?php echo $f3w; ?>"><?php dynamic_sidebar('footer-widgets3') ?></div>
				<div class="footer-col col-md-<?php echo $f4w; ?>"><?php dynamic_sidebar('footer-widgets4') ?></div>
			<?php } ?>
			<div class="clearfix"></div>
		</div><!-- / .row -->
	</div><!-- / .footer -->
</footer><!-- / .footer-wrapper -->
<?php } ?>