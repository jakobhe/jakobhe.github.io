<?php
	$video_m4v = get_post_meta( get_the_ID(), '_mt_post_format_video_m4v', true);
	$video_ogv = get_post_meta( get_the_ID(), '_mt_post_format_video_ogv', true);
	$video_embed = get_post_meta( get_the_ID(), '_mt_post_format_video_embedded', true);
	$video_poster = get_post_meta( get_the_ID(), '_mt_post_format_video_poster', true);
	$thumb_post = wp_get_attachment_image_src(get_post_thumbnail_id(), 'post-thumb', true);
?>

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

		<div class="post-item-video clearfix">
			<?php

				if(!empty($video_m4v) || !empty($video_ogv)) {

					$video_output = '[video ';

					if(!empty($video_m4v)) { $video_output .= 'mp4="'. $video_m4v .'" '; }
					if(!empty($video_ogv)) { $video_output .= 'ogv="'. $video_ogv .'"'; }
					if(!empty($video_poster)) { $video_output .= ' poster="'. $video_poster .'"'; } else { $video_output .= ' poster="'. $thumb_post[0] .'"'; }

					$video_output .= ']';

					echo do_shortcode($video_output);
					
				} else {

					echo stripslashes(htmlspecialchars_decode(do_shortcode($video_embed)));

				}

			?>
		</div><!-- / .post-item -->

		<div class="clearfix"></div>
	
		<div class="post-content clearfix">

			<?php
				// function that is responsible for content
				mt_blogpreviewtext();
			?>
			
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'mthemes' ), 'after' => '</div>' ) ); ?>			
		</div><!-- / .post-content -->
			
	</div><!-- / .post-inner -->
</article><!-- / .post -->