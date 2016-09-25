<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="meta-side">
		<?php get_template_part('/includes/meta' ); ?>
	</div>
	
	<div class="post-inner clearfix">		

		<header class="post-header">
		<?php get_template_part('/includes/meta-top' ); ?>
		<?php if ( !is_single() ) { ?>
			<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
		<?php } else { ?>
			<h1><?php the_title(); ?></h1>
		<?php }	?>
		</header>

		<div class="post-item-gallery">
			<?php

				$attachment_ids = explode(',', get_post_meta( get_the_ID(), '_mt_post_format_gallery_ids', true));
				$type = get_post_meta( get_the_ID(), '_mt_post_format_gallery_type', true);
				$size = get_post_meta( get_the_ID(), '_mt_post_format_gallery_images_size', true);

				// if type is standardslider
				if ($type == 'standardslider') {

				$slide_anim = get_post_meta( get_the_ID(), '_mt_post_format_slideshow_anim', true);
				$slide_pagi = get_post_meta( get_the_ID(), '_mt_post_format_slideshow_pagi', true);
				$slide_nav = get_post_meta( get_the_ID(), '_mt_post_format_slideshow_nav', true);
				$slide_caption = get_post_meta( get_the_ID(), '_mt_post_format_slideshow_caption', true);
				$slide_pause = get_post_meta( get_the_ID(), '_mt_post_format_slideshow_pause', true);
				$slide_speed = get_post_meta( get_the_ID(), '_mt_post_format_slideshow_speed', true);				

				// enqueue required scripts
				wp_enqueue_script('mt-owlCarousel', get_template_directory_uri() . '/js/owl.carousel.min.js', 'jquery', '',true);

			?>

			<div class="owl-page-slider clearfix">
				<div id="owl-post-slider-<?php the_ID(); ?>" class="owl-page-slide">
					<?php
					foreach ($attachment_ids as $attachment_id) {
						
						switch ( $size ) {
							case 'standard_43':
								$thumb = wp_get_attachment_image_src($attachment_id,'full-43', true);
							break;
							case 'standard_169':
								$thumb = wp_get_attachment_image_src($attachment_id,'full-169', true);
							break;
							case 'masonry':
								$thumb = wp_get_attachment_image_src($attachment_id,'portfolio-full', true);
							break;
							default:
							break;
						} // End SWITCH Statement
						$thumb_full = wp_get_attachment_image_src($attachment_id,'full', true);
						$thumb_small = wp_get_attachment_image_src($attachment_id,'latest-widget', true);
						$thumb_meta = wp_prepare_attachment_for_js($attachment_id);
						$lightbox = get_post_meta( get_the_ID(), '_mt_post_format_gallery_lightbox', true);
					?>

						<?php if ($lightbox == 'on') { ?>
							<div class="owl-slide-item lightbox-image">
								<div class="image-overlay post-overlay">
									<img src="<?php echo $thumb[0]; ?>" width="<?php echo $thumb[1]; ?>" height="<?php echo $thumb[2]; ?>" alt="<?php echo $thumb_meta['title']; ?>" />
									<?php if(!empty($thumb_meta['caption']) && $slide_caption == 'on') {
										echo '<div class="owl-caption">'.do_shortcode($thumb_meta['caption']).'</div>';
									} ?>
									<div class="overlay-wrapper">
										<div class="overlay-content">
											<h5><?php echo $thumb_meta['title']; ?></h5>
											<div class="clearfix"></div>
											<a class="image-lightbox mt-opil" href="<?php echo $thumb_full[0]; ?>" title="<?php the_title(); ?>"><i class="glyphicon glyphicon-search"></i></a>
											<?php if ( !is_single() ) { ?>
											<a class="mt-opip" href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						<?php } else { ?>
							<div class="owl-slide-item">
								<img src="<?php echo $thumb[0]; ?>" width="<?php echo $thumb[1]; ?>" height="<?php echo $thumb[2]; ?>" alt="<?php echo $thumb_meta['title']; ?>" />
								<?php if(!empty($thumb_meta['caption']) && $slide_caption == 'on') {
									echo '<div class="owl-caption">'.do_shortcode($thumb_meta['caption']).'</div>';
								} ?>
							</div>
						<?php } ?>
					<?php
					} // END foreach
					?>
				</div>
			</div>			

			<?php

				// if type is shortcode slider
				} elseif ($type == 'revoslider') {

					$slider_sc_id = get_post_meta( get_the_ID(), '_mt_post_format_shortcode_slider_id', true);

					if (!empty($slider_sc_id)) {
						echo do_shortcode($slider_sc_id);
					}

				// if no type is selected
				} else {
					
					echo 'Select gallery type';

				} // END of if statement

			?>

		</div><!-- / .portfolio-item -->

		<div class="clearfix"></div>
	
		<div class="post-content clearfix">

			<?php
				// function that is responsible for content
				mt_blogpreviewtext();
			?>
			
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'mthemes' ), 'after' => '</div>' ) ); ?>			
		</div><!-- / .post-content -->
		
	</div><!-- / .post-inner -->
	<?php if ($type == 'standardslider') { ?>
	<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery("#owl-post-slider-<?php the_ID(); ?>").owlCarousel({
			autoPlay: <?php echo $slide_speed; ?>,
			stopOnHover : <?php if($slide_pause == 'on') { echo 'true'; } else { echo 'false'; } ?>,
			paginationSpeed: 1000,
			navigation: <?php if($slide_nav == 'on') { echo 'true'; } else { echo 'false'; } ?>,
			navigationText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
			pagination: <?php if($slide_pagi == 'on') { echo 'true'; } else { echo 'false'; } ?>,
			singleItem: true,
			autoHeight: true,
			<?php if($slide_anim == 'slide') { echo ''; } else { echo 'transitionStyle:"'.$slide_anim.'",'; } ?>
		});
	});
	</script>
	<?php } ?>
</article><!-- / .post -->