<h2><?php echo lang('search'); ?></h2>
<form method="post" action="<?php echo base_url(); ?>blog/search">
	<input type="text" value="" name="term" id="term" class="search" />
	<input type="submit" name="submit" value="<?php echo lang('search'); ?>" />
</form>