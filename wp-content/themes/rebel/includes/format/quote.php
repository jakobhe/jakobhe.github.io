<?php
	$quote_author = get_post_meta( get_the_ID(), '_mt_post_format_quote_author', true);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="post-inner clearfix">
	
		<div class="post-content clearfix">
			
			<blockquote>
				<?php the_content(); ?>
				<small><cite title="<?php the_title(); ?>"><?php echo $quote_author; ?></cite></small>
			</blockquote>
				
		</div><!-- / .post-content -->

	</div><!-- / .post-inner -->
</article><!-- / .post -->