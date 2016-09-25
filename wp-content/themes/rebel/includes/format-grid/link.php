<?php
	$post_custom_url = get_post_meta( get_the_ID(), '_mt_post_format_link_url', true);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<div class="post-inner clearfix">			
			<h1><a target="_blank" href="<?php echo $post_custom_url; ?>"><?php the_title(); ?></a></h1>			
		</div><!-- / .post-inner -->

</article><!-- / .post -->