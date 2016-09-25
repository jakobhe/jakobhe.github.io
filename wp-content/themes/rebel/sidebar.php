<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('page-sidebar')) : else : ?>
	<div class="widget">
		<p><?php _e('To set up Your widgets go to Appearance -> Widgets','mthemes'); ?></p>
	</div>
<?php endif; ?>