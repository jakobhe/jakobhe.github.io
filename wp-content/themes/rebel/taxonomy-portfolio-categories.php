<?php

global $mt_options;
$size = $mt_options['portfolio_tax_size'];
$images_size = $mt_options['portfolio_tax_images_size'];
$layout_type = $mt_options['portfolio_tax_layout_type'];

get_header(); ?>

<div class="page-area clearfix">

	<header class="page-title">
		<div class="container">
			<h1><?php _e('Category:', 'mthemes') ?> <?php echo get_queried_object()->name; ?></h1>
		</div>
	</header>

	<div class="clearfix"></div>

	<div class="content container">
		<div class="row portfolio-row <?php echo $layout_type; ?>">

			<?php if ($layout_type == 'grid') { ?>
				<div class="portfolio-filterable isotope no-transition grid-<?php echo $size; ?>"><div class="grid-sizer"></div>
			<?php } else  { ?>
				<div class="portfolio-filterable isotope no-transition standard-<?php echo $size; ?>"><div class="grid-sizer"></div>
			<?php }
					global $query_string;
					query_posts( $query_string . '&posts_per_page=-1' );
					if( have_posts() ) : while (have_posts()) : the_post();

					$terms = ''; //initialize variables
					$terms = get_the_terms( $post->ID, 'portfolio-categories' );
					$term_list = '';
					$term_over_info = '';
					if( is_array($terms) ) {
						foreach( $terms as $term ) {
							$term_list .= urldecode($term->slug);
							$term_list .= ' ';
							$term_over_info .= urldecode($term->name);
							$term_over_info .= ' ';
						}
					}

					$thumb_id = get_post_thumbnail_id();
					$thumb_full = wp_get_attachment_image_src($thumb_id,'full', true);
					switch ( $images_size ) {
						case 'standard':
							$thumb = wp_get_attachment_image_src( $thumb_id ,'portfolio-thumb' );
						break;
						case 'masonry':
							$thumb = wp_get_attachment_image_src( $thumb_id ,'gallery-masonry' );
						break;
						default:
						break;
					} // End SWITCH Statement

					switch ( $size ) {
						case '2':
							echo '<div class="portfolio-item-wrapper col-xs-6 '.$term_list.'">';
						break;
						case '3':
							echo '<div class="portfolio-item-wrapper col-xs-4 '.$term_list.'">';
						break;
						case '4':
							echo '<div class="portfolio-item-wrapper col-xs-3 '.$term_list.'">';
						break;
						default:
						break;
					} // End SWITCH Statement
					
				?>
					<div class="portfolio-item" id="portfolio-item-<?php the_ID(); ?>">	
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
									<a class="image-lightbox mt-opil" href="<?php echo $thumb_full[0]; ?>" title="<?php the_title(); ?>"><i class="glyphicon glyphicon-search"></i></a>
									<a class="mt-opip" href="<?php the_permalink(); ?>"><i class="glyphicon glyphicon-share-alt"></i></a>									
								</div>
							</div>
						</div>
					</div><!-- / .portfolio-item -->
					
				</div><!-- / .columns -->
				<?php endwhile; endif; ?>
			</div><!-- / .portfolio-filterable -->

		</div><!-- / .row -->
	</div><!-- / .content -->

</div><!-- / .page-area -->

<?php get_footer(); ?>