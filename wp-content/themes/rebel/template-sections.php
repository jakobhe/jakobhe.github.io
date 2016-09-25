<?php

/*
Template Name: Page with sections
*/

get_header(); ?>

<div class="page-area clearfix">

	<?php
		// function that contains title and slider/featured image (if set)
		mt_content_header();
	?>
	<div class="content">		

		<?php 
			if (have_posts()) :
				while (have_posts()) : the_post();
					the_content();
					wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'mthemes' ), 'after' => '</div>' ) );
				endwhile;
			endif;
		?>
		<div class="clearfix"></div>
	</div><!-- / .content -->
</div><!-- / .page-area -->

<?php get_footer(); ?>