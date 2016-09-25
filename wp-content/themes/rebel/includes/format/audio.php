<?php
	$audio_mp3 = get_post_meta( get_the_ID(), '_mt_post_format_audio_mp3', true);
	$audio_oga = get_post_meta( get_the_ID(), '_mt_post_format_audio_oga', true);
	$audio_embed = get_post_meta( get_the_ID(), '_mt_post_format_audio_embedded', true);
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

		<div class="post-item-audio clearfix">
		<?php

			if ( has_post_thumbnail() ) {
				the_post_thumbnail('portfolio-full');
			} 

			if(!empty($audio_mp3) || !empty($audio_ogg)) {

				$audio_output = '[audio ';

				if(!empty($audio_mp3)) { $audio_output .= 'mp3="'. $audio_mp3 .'" '; }
				if(!empty($audio_ogg)) { $audio_output .= 'ogg="'. $audio_ogg .'"'; }

				$audio_output .= ']';

				echo do_shortcode($audio_output);
				
			} else {

				echo stripslashes(htmlspecialchars_decode(do_shortcode($audio_embed)));

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