<?php

$sidebar = get_post_meta( get_the_ID(), '_mt_post_sidebar', true);
$author_bio = get_post_meta( get_the_ID(), '_mt_post_author_bio', true);

get_header(); ?>


<?php
// if there is no sidebar on the page show default content 
if( $sidebar == 'none' ) {
?>
	<div class="blog-wrapper clearfix">
		<?php
			// function that contains title for this page
			mt_page_func_header();
		?>
		<div class="content container">
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

				<?php
					//show author bio
					if($author_bio == 'on') {
						mt_authorinfo();
					}
				?>

				<?php comments_template(); ?>

			<?php endwhile; endif; ?>
		</div>
	</div>
<?php
// if there is any sidebar show content with additional sidebars
} else {
?>

	<?php if($sidebar == 'double') { ?>
		<div class="blog-wrapper clearfix page-sidebar-double">
	<?php } else { ?>
		<div class="blog-wrapper clearfix page-sidebar-<?php echo $sidebar; ?>">
	<?php } ?>

		<?php
			// function that contains title for this page
			mt_page_func_header();
		?>

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

						<?php
							//show author bio
							if($author_bio == 'on') {
								mt_authorinfo();
							}
						?>

						<?php comments_template(); ?>

					<?php endwhile; endif; ?>

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
				
			</div>
		</div><!-- / .content -->

	</div><!-- / .content-area -->

<?php } ?>

<?php get_footer(); ?>