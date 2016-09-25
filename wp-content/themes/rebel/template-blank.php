<?php

/*
Template Name: Blank
*/

get_header(); ?>
<div class="content-area clearfix">

	<div class="content container">
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

</div><!-- / .content-area -->

<?php get_footer(); ?>