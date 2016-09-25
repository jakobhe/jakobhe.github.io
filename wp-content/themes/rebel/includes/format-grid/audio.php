<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="post-inner clearfix">

		<header class="post-header">
		<?php get_template_part('/includes/meta-top' ); ?>
		<?php if ( !is_single() ) { ?>
			<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
		<?php } else { ?>
			<h1><?php the_title(); ?></h1>
		<?php }	?>
		</header>

		<?php

		if ( has_post_thumbnail() ) {
			$thumb_full = wp_get_attachment_image_src(get_post_thumbnail_id(),'full', true);
			?>
			<div class="post-item clearfix">
				<div class="image-overlay post-overlay">
					<?php the_post_thumbnail('blog-grid'); ?>
					<div class="overlay-wrapper">
						<div class="overlay-content">
							<h5><?php the_title(); ?></h5>
							<div class="clearfix"></div>
							<a class="image-lightbox mt-opil" href="<?php echo $thumb_full[0]; ?>" title="<?php the_title(); ?>"><i class="glyphicon glyphicon-search"></i></a>
							<?php if ( !is_single() ) { ?>
							<a class="mt-opip" href="<?php the_permalink(); ?>"><i class="fa fa-headphones"></i></a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div><!-- / .post-item -->
		<?php } ?>
		
		<div class="clearfix"></div>
	
		<div class="post-content clearfix">

			<?php
				// function that is responsible for content
				mt_blogpreviewtext();
			?>
			
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'mthemes' ), 'after' => '</div>' ) ); ?>			
		</div><!-- / .post-content -->

		<?php get_template_part('/includes/meta-grid' ); ?>

	</div><!-- / .post-inner -->
</article><!-- / .post -->