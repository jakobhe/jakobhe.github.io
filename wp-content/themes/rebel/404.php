<?php get_header(); ?>
<div class="content-area clearfix">

	<?php
		// function that contains title for this page
		mt_page_func_header();
	?>

	<div class="content container">

		<div class="page-404-info">
			<i class="fa fa-compass"></i> 404
			<p><?php _e('Sorry, but you\'re looking for something that isn\'t here.', 'mthemes');?></p>
			<br>
			<form action="<?php echo home_url(); ?>/" id="searchform" class="sidebar-search-form" method="get">
				<fieldset>
					<input type="text" id="s" name="s" value="<?php _e('To search type and hit enter', 'mthemes') ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
				</fieldset>
			</form>
		</div>	

	</div><!-- / .content -->
</div><!-- / .content-area -->
<?php get_footer(); ?>