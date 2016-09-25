<?php get_header(); ?>
<div class="page-area clearfix page-sidebar-right">

	<?php
		// function that contains title for this page
		mt_page_func_header();
	?>

	<div class="content container">
		<div class="row">

			<div class="sidebar-inner-content col-md-9">

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

				<nav class="site-pagination"><?php if (function_exists("mt_pagination")) { mt_pagination(); } ?></nav>

				<?php else :

				if ( is_category() ) { // If this is a category archive
					printf(__('<h2>Sorry, but there aren\'t any posts in the %s category yet.</h2>', 'mthemes'), single_cat_title('',false));
				} elseif ( is_tag() ) { // If this is a tag archive
				    printf(__('<h2>Sorry, but there aren\'t any posts tagged %s yet.</h2>', 'mthemes'), single_tag_title('',false));
				} elseif ( is_date() ) { // If this is a date archive
					echo(__('<h2>Sorry, but there aren\'t any posts with this date.</h2>', 'mthemes'));
				} else {
					echo(__('<h2>No posts found.</h2>', 'mthemes'));
				}

				endif; ?>

			</div><!-- / .sidebar-inner-content -->

			<aside class="sidebar sidebar-right col-md-3" role="complementary">
				<div class="sidebar-inner">
					<?php get_sidebar(); ?>
				</div>
			</aside>
			
		</div>
	</div><!-- / .content -->

</div><!-- / .content-area -->

<?php get_footer(); ?>