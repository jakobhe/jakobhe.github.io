<?php

$sidebar = get_post_meta( get_the_ID(), '_mt_page_sidebar', true);
$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'page-image', true);

get_header(); ?>

<div class="page-area clearfix page-sidebar-<?php echo $sidebar; ?>">

	<?php
		// function that contains title and slider/featured image (if set)
		mt_content_header();
	?>

	<?php
	// if there is no sidebar on the page show default content 
	if( $sidebar == 'none' ) {
	?>
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
	<?php
	// if there is any sidebar show content with additional sidebars
	} else {
	?>

		<div class="content container">
			<div class="row">

				<?php
				// if sidebar double is set change center column width to 50%, otherwise use 75%
				if( $sidebar == 'double' ) { ?>
					<aside class="sidebar sidebar-left col-md-3" role="complementary">
						<div class="sidebar-inner">
							<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('page-sidebar')) : else : ?>
								<div class="widget">
									<p><?php _e('To set up Your widgets go to Appearance -> Widgets','mthemes'); ?></p>
								</div>
							<?php endif; ?>
						</div>
					</aside>
					<div class="sidebar-inner-content col-md-6">

				<?php } else { ?>

					<div class="sidebar-inner-content col-md-9">
						
				<?php }	?>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'mthemes' ), 'after' => '</div>' ) ); ?>

				<?php endwhile; endif; ?>

				</div><!-- / .sidebar-inner-content -->

				<?php
				// use switch statement to show different sidebars
				switch( $sidebar ) {

					// if left sidebar is used
					case "left": ?>
						<aside class="sidebar sidebar-left col-md-3" role="complementary">
							<div class="sidebar-inner">
								<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('page-sidebar')) : else : ?>
									<div class="widget">
										<p><?php _e('To set up Your widgets go to Appearance -> Widgets','mthemes'); ?></p>
									</div>
								<?php endif; ?>
							</div>
						</aside>
				<?php break;

					// if right sidebar is used
					case "right": ?>
						<aside class="sidebar sidebar-right col-md-3" role="complementary">
							<div class="sidebar-inner">
								<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('page-sidebar')) : else : ?>
									<div class="widget">
										<p><?php _e('To set up Your widgets go to Appearance -> Widgets','mthemes'); ?></p>
									</div>
								<?php endif; ?>
							</div>
						</aside>
				<?php break;

					// if both sidebars are used
					case "double": ?>
						<aside class="sidebar sidebar-right col-md-3" role="complementary">
							<div class="sidebar-inner">
								<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('page-sidebar2')) : else : ?>
									<div class="widget">
										<p><?php _e('To set up Your widgets go to Appearance -> Widgets','mthemes'); ?></p>
									</div>
								<?php endif; ?>
							</div>
						</aside>
				<?php break;
					default:
					break;
				} // END switch statement
				?>

			</div><!-- / .row -->
		</div><!-- / .content -->

	<?php
	// END else statement
	}
	?>
</div><!-- / .page-area -->

<?php get_footer(); ?>