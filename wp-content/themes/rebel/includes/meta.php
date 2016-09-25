<div class="meta clearfix">

	<div class="meta-inner">
		<div class="meta-date-wrapper">
			<span class="month"><?php the_time('M') ?></span>
			<span class="day"><?php the_time('j') ?></span>			
		</div>
		<div class="meta-item meta-author"><?php echo get_avatar( get_the_author_meta('email'), '75' ); ?> <?php the_author_posts_link(); ?></div>
		<div class="meta-item meta-comments"><?php comments_popup_link( '<i class="fa fa-lg fa-comment-o"></i> 0', '<i class="fa fa-lg fa-comment-o"></i> 1', '<i class="fa fa-lg fa-comment-o"></i> %', 'comments-link', '-'); ?></div>
	</div>
	
</div><!-- / .meta -->