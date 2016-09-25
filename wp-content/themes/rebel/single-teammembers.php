<?php

$layout = get_post_meta( get_the_ID(), '_mt_team_layout_type', true);
$socials_onoff = get_post_meta( get_the_ID(), '_mt_team_social_icons_onoff', true);

get_header(); ?>

<div class="content-area clearfix single-team-<?php echo $layout; ?>">

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
			if((has_post_thumbnail()) && (get_post_meta( get_the_ID(), '_mt_team_featured_image', true) == 'show')) {
				$image = wp_get_attachment_image_src(get_post_thumbnail_id(),'portfolio-full', true);
				echo '<div class="team-image"><img src="'.$image[0].'" width="'.$image[1].'" height="'.$image[2].'" alt="'.get_the_title().'" /></div>';
			}

			if (have_posts()) :
				while (have_posts()) : the_post();
		
					the_content();
					wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'mthemes' ), 'after' => '</div>' ) );
			
				endwhile;
			endif;
		?>

	<?php if ( !is_single() || ( is_single() && ($socials_onoff == 'on') ) ) { ?>

		<div class="mt-hr clearfix single-line hr-20"><span><i class="fa fa-retweet fa-lg"></i></span></div>		
		<?php if ($layout == 'standard') { ?>
		<div class="team-member-socials clearfix">
		<?php } else { ?>
		<div class="team-member-socials container clearfix">
		<?php } 
			echo do_shortcode(html_entity_decode(get_post_meta( get_the_ID(), '_mt_team_social_icons', true)));
		?>
		</div>

	<?php } ?>

		<div class="clearfix"></div>
	</div><!-- / .content -->
</div><!-- / .content-area -->

<?php get_footer(); ?>