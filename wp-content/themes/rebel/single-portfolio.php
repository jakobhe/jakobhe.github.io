<?php

$comments = get_post_meta( get_the_ID(), '_mt_portfolio_comments', true);
$related_items = get_post_meta( get_the_ID(), '_mt_portfolio_related_items', true);
$layout = get_post_meta( get_the_ID(), '_mt_portfolio_layout_type', true);

get_header(); ?>

<div class="content-area clearfix portfolio-page-<?php echo $layout; ?>">

	<?php
		// function that contains title for this page
		mt_page_func_header();
	?>
	
	<?php if ($layout == 'standard') { ?>
	<div class="content container">
	<?php } else { ?>
	<div class="content">
	<?php } ?>

		<?php
		if (have_posts()) :
			while (have_posts()) : the_post();
				the_content();
				wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'mthemes' ), 'after' => '</div>' ) );
			endwhile;
		endif;
		?>

	<?php
	/**
	 *
	 *  Portfolio nav
	 *
	 */
	if ($layout == 'full') { echo '<div class="container portfolio-full-nav">'; }
		// show related items
		echo '<nav class="portfolio-navigation clearfix">';
		mt_portfolionav();
		echo '</nav>';
	if ($layout == 'full') { echo '</div>'; }
	/**
	 *
	 *  Related items and comments
	 *
	 */
	if($related_items == 'on') {		
		// divider
		echo '<div class="mt-hr clearfix single-line hr-40"><span><i class="fa fa-2x fa-files-o"></i></span></div>';

		if ($layout == 'full') { echo '<div class="container portfolio-full">'; }
		// show related items
		mt_relateditems();
		if ($layout == 'full') { echo '</div>'; }
	}
	if($comments == 'on') {
		// divider
		echo '<div class="mt-hr clearfix single-line hr-40"><span><i class="fa fa-2x fa-comments"></i></span></div>';

		if ($layout == 'full') { echo '<div class="container portfolio-full">'; }
		// show comments template
		comments_template();
		if ($layout == 'full') { echo '</div>'; }
		
	} ?>

	<div class="clearfix"></div>
	</div><!-- / .content -->
</div><!-- / .content-area -->

<?php get_footer(); ?>