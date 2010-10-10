<h2><?php echo lang('search');?></h2>
<ul>
<form method="post" action="<?php echo base_url(); ?>blog/search">
	<table class="search">
		<tr>
			<td><input type="text" value="" name="term" id="term" class="search" /></td>
			<td style="padding-left: 10px"><input type="submit" name="submit" value="<?php echo lang('search'); ?>" /></td>
		</tr>
	</table>
</form>
</ul>