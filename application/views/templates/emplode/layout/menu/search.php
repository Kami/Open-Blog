<div class="box">
	<div class="box_title"><?php echo lang('search'); ?></div>
	<div class="box_content">
		<form method="post" action="<?php echo site_url('search'); ?>">
			<table class="search">
				<tr>
					<td><input type="text" value="" name="term" id="term" class="search" /></td>
					<td style="padding-left: 10px"><input type="submit" name="submit" value="<?=lang('search');?>" /></td>
				</tr>
			</table>
		</form>
	</div>
</div>