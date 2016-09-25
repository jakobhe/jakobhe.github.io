<div id="comments-wrapper clearfix">
	<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'mthemes' ); ?></p>
	</div><!-- #comments -->
	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php
		// You can start editing here -- including this comment!
	?>

	<?php if ( have_comments() ) : ?>
		<header><h5><?php comments_number(__('No comments', 'mthemes'), __('1 comment', 'mthemes'), __('% comments', 'mthemes') );?></h5></header>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav class="comments-navigation clearfix" role="navigation">
			<div class="next-comments"><?php previous_comments_link() ?></div>
			<div class="prev-comments"><?php next_comments_link() ?></div>
		</nav>
	<?php endif; // check for comment navigation ?>

		<ul class="commentlist">
			<?php wp_list_comments(array( 'avatar_size' => 60 )); ?>
		</ul>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav class="comments-navigation clearfix">
			<div class="next-comments"><?php previous_comments_link() ?></div>
			<div class="prev-comments"><?php next_comments_link() ?></div>
		</nav>
	<?php endif; // check for comment navigation ?>

	<?php else : // or, if we don't have comments:

		/* If there are no comments and comments are closed,
		 * let's leave a little note, shall we?
		 */
		if ( ! comments_open() ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'mthemes' ); ?></p>
	<?php endif; // end ! comments_open() ?>

	<?php endif; // end have_comments() ?>

	<?php comment_form(); ?>

	</div><!-- #comments -->
</div><!-- #comments-wrapper -->