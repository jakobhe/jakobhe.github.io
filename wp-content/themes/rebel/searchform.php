<form action="<?php echo home_url(); ?>/" id="searchform" class="sidebar-search-form" method="get">
	<fieldset>
		<input type="text" id="s" name="s" value="<?php _e('Search...', 'mthemes') ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
	</fieldset>
</form>