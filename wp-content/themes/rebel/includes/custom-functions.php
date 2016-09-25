<?php
/**
 *
 *  MT Breadcrumbs preparation
 *
 */
if ( ! function_exists( 'mt_breadcrumbs' ) ) :
	function mt_breadcrumbs() {
		global $mt_options;
		$breadcrumb_title = $mt_options['breadcrumb_title'];
		$breadcrumb_txt = $mt_options['breadcrumb_title_text'];
		?>

		<div class="mt-breadcrumbs">
			<div class="container">
			<?php if (function_exists( 'breadcrumb_trail' )) {
				if ($breadcrumb_title == 1) {
					breadcrumb_trail(array(
						'labels'=> array('browse' => $breadcrumb_txt),
						'separator' => '<i class="fa fa-caret-right"></i>',
					));
				} else {
					breadcrumb_trail(array(
						'show_browse' => false,
						'separator' => '<i class="fa fa-caret-right"></i>',
					));
				}
			} ?>
			</div>
		</div>

	<?php } // END $mt_breadcrumbs
endif;

/**
 *
 *  Page title
 *
 */
if ( ! function_exists( 'mt_content_header' ) ) :
	function mt_content_header() {
		
			$title = get_post_meta( get_the_ID(), '_mt_show_page_title', true);
			$subtitle = get_post_meta( get_the_ID(), '_mt_page_subtitle', true);
			$slider = get_post_meta( get_the_ID(), '_mt_show_page_slider', true);
			$slider_shortcode = get_post_meta( get_the_ID(), '_mt_page_slider_shortcode', true);
			$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'full', true);

		?>

		<?php if( ($slider == 'on') && !empty($slider_shortcode) ) { ?>
			<div class="page-top-slider">
				<?php echo do_shortcode($slider_shortcode); ?>
			</div>
		<?php } elseif( has_post_thumbnail() && ($slider == 0) ) { ?>
			<!--<div class="page-top-slider">
				<img src="<?php echo $featured_image[0]; ?>" alt="<?php the_title(); ?>" />
			</div>-->
		<?php } ?>

		<?php if($title == 'on') { ?>
			<header class="page-title">
				<div class="container">
					<h1><?php the_title(); ?></h1>
					<?php if( !empty($subtitle) ) { echo '<p class="page-title-description">'. $subtitle .'</p>'; } ?>		
				</div>
			</header>
			<?php mt_breadcrumbs(); ?>
		<?php } ?>

	<?php } // END $mt_content_header
endif;


/**
 *
 *  Page title for functional pages
 *
 */
if ( ! function_exists( 'mt_page_func_header' ) ) :
	function mt_page_func_header() {

		global $mt_options;
		$breadcrumb_title = $mt_options['breadcrumb_title'];
		$breadcrumb_txt = $mt_options['breadcrumb_title_text'];
		$team_pos = get_post_meta( get_the_ID(), '_mt_team_position', true);

		?>

		<header class="page-title">
			<div class="container">

			<?php if ( is_archive() ) { ?>

				<?php /* If this is a category archive */ if (is_category()) { ?>
				<h1><?php printf(__('All posts in %s', 'mthemes'), single_cat_title('',false)); ?></h1>
				<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h1><?php printf(__('All posts tagged %s', 'mthemes'), single_tag_title('',false)); ?></h1>
				<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h1><?php _e('Archive for', 'mthemes') ?> <?php the_time('F jS, Y'); ?></h1>
				 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h1><?php _e('Archive for', 'mthemes') ?> <?php the_time('F, Y'); ?></h1>
				<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h1><?php _e('Archive for', 'mthemes') ?> <?php the_time('Y'); ?></h1>
				<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h1><?php _e('All posts by', 'mthemes') ?> <?php the_author(); ?></h1>
				<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h1><?php _e('Blog Archives', 'mthemes') ?></h1>
				<?php } ?>

			<?php } elseif ( is_search() ) { ?>

				<h1><?php printf( __('Search results for: %s', 'mthemes'), get_search_query()); ?></h1>

			<?php } elseif ( is_404() ) { ?>

				<h1><?php _e('404 - Page not found', 'mthemes');?></h1>

			<?php } elseif ( is_singular('portfolio') ) { ?>

				<h1><?php the_title(); ?></h1>

			<?php } elseif ( is_singular('teammembers') ) { ?>

				<h1><?php the_title(); ?> <?php if ( !empty($team_pos) ) { echo '<small>'. $team_pos .'</small>'; } ?></h1>


			<?php } elseif ( is_single() ) { ?>

				<h1><?php the_title(); ?></h1>			

			<?php } ?>

			</div>
		</header>
		<?php
		// show breadcrumbs on portfolio and blog single and archive pages
		if ( is_single() || is_singular('portfolio') || is_archive() ) {
			mt_breadcrumbs();
		}
		?>

	<?php } // END $mt_page_func_header
endif;


/**
 *
 *  Author info box
 *
 */
if ( ! function_exists( 'mt_authorinfo' ) ) :
	function mt_authorinfo() { ?>

		<div class="author-bio clearfix">
			<div class="well">
				<h5><?php _e('About the author', 'mthemes'); ?></h5>
				<div class="author-thumb"><?php echo get_avatar( get_the_author_meta('email'), '60' ); ?></div>
				<div class="author-description"><?php echo get_the_author_meta( 'description' ) ?></div>
				<div class="clearfix"></div>
			</div>
		</div>

	<?php }
endif;


/**
 *
 *  Blog preview text
 *
 */
if ( ! function_exists( 'mt_blogpreviewtext' ) ) :
	function mt_blogpreviewtext() {

		global $mt_options;
		$blog_preview = $mt_options['blog_preview'];

		if ($blog_preview == 'content') {
			if ( !is_single() ) {
				global $more;
				$more = 0;
				the_content(__('Continue reading &rarr;', 'mthemes'));
			} else {
				the_content();
			}
		} else {
			if ( !is_single() ) {
				the_excerpt();
			} else {
				the_content();
			}
		}
		echo '<div class="clearfix"></div>';

	}
endif;


/**
 *
 *  Portfolio navigation
 *
 */
if ( ! function_exists( 'mt_portfolionav' ) ) :
	function mt_portfolionav() {

		$prev_post = get_previous_post();
		if (!empty( $prev_post )) : ?>
			<div class="portfolio-prev">
				<a class="btn btn-default mt-btn-empty-dark" href="<?php echo get_permalink( $prev_post->ID ); ?>" title="<?php echo $prev_post->post_title; ?>">
					<i class="fa fa-arrow-left"></i> <?php _e('Previous item', 'mthemes'); ?>
				</a>
			</div>
		<?php
		endif; // endif $prev_posts

		$next_post = get_next_post();
		if (!empty( $next_post )) : ?>
			<div class="portfolio-next">
				<a class="btn btn-default mt-btn-empty-dark" href="<?php echo get_permalink( $next_post->ID ); ?>" title="<?php echo $next_post->post_title; ?>">
					<?php _e('Next item', 'mthemes'); ?> <i class="fa fa-arrow-right"></i>
				</a>
			</div>
		<?php
		endif; // endif $next_posts
		
	}
endif;


/**
 *
 *  Portfolio details
 *
 */
if ( ! function_exists( 'mt_portfolio_details' ) ) :
	function mt_portfolio_details() {

		$client = get_post_meta( get_the_ID(), '_mt_portfolio_details_client', true);
		$client_url = get_post_meta( get_the_ID(), '_mt_portfolio_details_client_url', true);
		$link = get_post_meta( get_the_ID(), '_mt_portfolio_details_link', true);

		?>

		<div class="portfolio-details">
						
			<?php if (!empty($client)) { ?>
				<div class="portfolio-details-client">
					<span class="label label-default"><?php echo get_post_meta( get_the_ID(), '_mt_portfolio_details_client_label', true); ?></span> 
					<?php if (!empty($client_url)) { ?>
						<a target="_blank" href="<?php echo $client_url; ?>"><?php echo $client; ?></a>
					<?php } else { ?>
						<?php echo $client; ?>
					<?php } ?>
				</div>
			<?php } ?>

			<div class="portfolio-details-date"><span class="label label-default"><?php echo get_post_meta( get_the_ID(), '_mt_portfolio_details_date_label', true); ?></span> <?php echo get_the_date(); ?></div>

			<div class="portfolio-details-categories"><span class="label label-default"><?php _e('Categories', 'mthemes'); ?></span> <?php echo get_the_term_list(get_the_ID(), 'portfolio-categories', '', ', ', ''); ?></div>

			<?php if (!empty($link)) { ?>
				<div class="portfolio-details-link">
					<a class="btn btn-default" target="_blank" href="<?php echo get_post_meta( get_the_ID(), '_mt_portfolio_details_link_url', true); ?>"><?php echo $link; ?></a>
				</div>
			<?php } ?>
		</div>
		
	<?php }
endif;


/**
 *
 *  Related items for single portfolio page
 *
 */
if ( ! function_exists( 'mt_relateditems' ) ) :
	function mt_relateditems() {

		global $mt_options;
		$cpt_options = wp_parse_args( get_post_meta(get_the_ID(), 'mt_options', true), $mt_options );
		$related_title = $cpt_options['portfolio_related_title'];
		$related_number = get_post_meta( get_the_ID(), '_mt_portfolio_related_number', true);
		$related_orderby = $cpt_options['portfolio_related_orderby'];

		// enqueue script
		wp_enqueue_script('owlCarousel', get_template_directory_uri() . '/js/owl.carousel.min.js', 'jquery', '',true);

		?>
		
		<h4><?php echo $related_title; ?></h4>
		
		<div class="portfolio-related-items">
			<div class="portfolio-carousel">
				<div class="owl-portfolio columns4">

				<?php
					$terms = ''; //initialize variables
					$terms = get_the_terms( get_the_id(), 'portfolio-categories' );
					$term_list = '';
					if( is_array($terms) ) {
						foreach( $terms as $term ) {
							$term_list .= $term->slug;
							$term_list .= ', ';
						}
					}

					$related_loop = new WP_Query(array(
						'post_type' => 'portfolio',
						'posts_per_page' => $related_number,
						'post__not_in' => array(get_the_id()),
						'order' => 'DESC',
						'orderby' => $related_orderby,
						'portfolio-categories' => $term_list,
					));

					if($related_loop) {
						while ($related_loop->have_posts()) {
							$related_loop->the_post();

							$thumb = wp_get_attachment_image_src( get_post_thumbnail_id() ,'portfolio-thumb', true );
							$full_image = wp_get_attachment_image_src( get_post_thumbnail_id() ,'full', true );
					?>
						<div class="portfolio-item" id="portfolio-carousel-<?php the_ID(); ?>">
							<div class="image-overlay project-overlay">
								<div class="portfolio-item-top">
									<?php if ( has_post_thumbnail() ) {
											 echo '<img src="'.$thumb[0].'" width="'.$thumb[1].'" height="'.$thumb[2].'" alt="'.get_the_title().'" />';
										} else {
											 echo '<img src="' . get_template_directory_uri() . '/images/portfolio-empty.png" />';
									} ?>
								</div>
								<div class="overlay-wrapper">
									<div class="overlay-content">
										<h5><?php the_title(); ?></h5>
										<span><?php echo get_the_term_list(get_the_ID(), 'portfolio-categories', '', ', ', ''); ?></span>
										<div class="clearfix"></div>
										<a class="image-lightbox mt-opil" href="<?php echo $full_image[0]; ?>" title="<?php the_title(); ?>"><i class="glyphicon glyphicon-search"></i></a>
										<a class="mt-opip" href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>									
									</div>
								</div>
							</div>
						</div> <!-- END portfolio-item -->
					<?php
						} // end while
					} // end if

					wp_reset_query(); ?>

				</div>
			</div><!-- END portfolio-carousel -->
		</div><!-- END portfolio-related-items -->

	<?php }
endif;


/**
 *
 *  Pagination
 *
 */
if ( ! function_exists( 'mt_pagination' ) ) :
	function mt_pagination($pages = '', $range = 2) {
		$showitems = ($range * 2)+1;
		$additional_loop = '';
		global $paged;
		if(empty($paged)) $paged = 1;

		if($pages == '') {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if(!$pages) {
				$pages = 1;
			}
		}
	 
		if(1 != $pages) {
			echo '<nav class="mt-pagination clearfix">';
			if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; " . __('First', 'mthemes') . "</a>";
			if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; " . __('Previous', 'mthemes') . "</a>";
			for ($i=1; $i <= $pages; $i++) {
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
					echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
				}
			}
			if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">" . __('Next', 'mthemes') . " &rsaquo;</a>";
			if ($paged < $pages-1 && $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>" . __('Last', 'mthemes') . " &raquo;</a>";
			echo '</nav>';
		}
	}
endif;

/**
 *
 *  Custom body classes
 *
 */
function mt_custom_css_classes($classes) {
	global $mt_options;

	// class for fixed header
	if($mt_options['header_fixed'] == 1) { $classes[] = 'fixed-header'; }

	// class for template with sections
	if( is_page_template( 'template-sections.php' ) ) { $classes[] = 'template-sections'; }

	// return classes
	return $classes;
}
add_filter('body_class','mt_custom_css_classes');


/**
 *
 *  HEX to RGB converter
 *
 */
function mt_hex2rgb($hex) {
	$hex = str_replace("#", "", $hex);

	if(strlen($hex) == 3) {
		$r = hexdec(substr($hex,0,1).substr($hex,0,1));
		$g = hexdec(substr($hex,1,1).substr($hex,1,1));
		$b = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else {
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
	}
	$rgb = array($r, $g, $b);
	//return implode(",", $rgb); // returns the rgb values separated by commas
	return $rgb; // returns an array with the rgb values
}

/**
 *
 *  Show Gallery ID in single gallery admin page
 *
 */
function mt_gallery_post_id() {
	global $post;

	// Get the data
	$id = $post->ID;

	// Echo out the field
	echo '<div class="redux-normal redux-info-field redux-field-info"><strong>'.__('Gallery ID', 'mthemes').':</strong> '.$id.'<br><br>'.__('Use this ID in MT Gallery shortcode', 'mthemes').'</div>';
}

function mt_gallery_current_id() {
	add_meta_box('mt_show_shortcode_gallery_id', __('Gallery ID', 'mthemes'), 'mt_gallery_post_id', 'gallery', 'side', 'high');
}
add_action('add_meta_boxes', 'mt_gallery_current_id');


