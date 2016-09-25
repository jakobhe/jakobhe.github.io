<?php
	$post_custom_url = get_post_meta( get_the_ID(), '_mt_post_format_link_url', true);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="post-inner clearfix">
	
		<div class="post-content clearfix">

			<header class="post-header">
				<h1><a target="_blank" href="<?php echo $post_custom_url; ?>"><i class="fa fa-link"></i> <?php the_title(); ?></a></h1>
			</header>

		</div><!-- / .post-content -->

	</div><!-- / .post-inner -->
</article><!-- / .post -->