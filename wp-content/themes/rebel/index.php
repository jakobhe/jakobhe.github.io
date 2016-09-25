<?php

global $mt_options;
$blog_pagi = $mt_options['blog_pagi'];
$sidebar = $mt_options['blog_sidebar'];

get_header(); ?>
<div class="blog-wrapper clearfix page-sidebar-<?php echo $sidebar; ?>">

	<header class="page-title">
		<div class="container">
			<h1><?php _e('Blog', 'mthemes'); ?></h1>	
		</div>
	</header>
	<?php mt_breadcrumbs(); ?>

	<div class="content container">
		<div class="row">

			<?php
			// if sidebar double is set change center column width to 50%, otherwise use 75%
			if( $sidebar == 'double' ) { ?>
				<aside class="sidebar sidebar-left col-md-3" role="complementary">
					<div class="sidebar-inner">
						<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('blog-sidebar')) : else : ?>
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

				<!-- BEGIN .post -->
				<?php
					if(get_post_format()) {
						get_template_part( 'includes/format/' . get_post_format() );
					} else {
						get_template_part( 'includes/format/standard' );
					}
				?>
				<!-- END .post -->

			<?php endwhile; ?>

				<?php if ($blog_pagi == 'pagination') { ?>
					<?php echo mt_pagination(); ?>
				<?php } else { ?>
					<nav class="wp-posts-nav clearfix">
						<div class="older"><?php next_posts_link( __( 'Older Entries', 'mthemes' ) ); ?></div>
						<div class="newer"><?php previous_posts_link( __( 'Newer Entries', 'mthemes' ) ); ?></div>
					</nav>
				<?php } ?>
			
			<?php endif; ?>

			</div><!-- / .sidebar-inner-content -->

			<?php
			// use switch statement to show different sidebars
			switch( $sidebar ) {

				// if left sidebar is used
				case "left": ?>
					<aside class="sidebar sidebar-left col-md-3" role="complementary">
						<div class="sidebar-inner">
							<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('blog-sidebar')) : else : ?>
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
							<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('blog-sidebar')) : else : ?>
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
							<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('blog-sidebar2')) : else : ?>
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
	
</div><!-- / .blog-wrapper -->
<?php get_footer(); ?>