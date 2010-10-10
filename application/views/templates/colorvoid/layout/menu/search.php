<div class="box">
	<div class="box_title"><?php echo lang('search'); ?></div>
	<div class="box_body">
		<form method="post" id="searchform" action="<?php echo site_url('search'); ?>">
			<div>
				<table class="search">
					<tr>
						<td><input type="text" value="" name="term" id="term" class="styled" /></td>
						<td style="padding-left: 10px"><input type="image" src="<?php echo base_url(); ?>application/views/templates/colorvoid/static/images/button_go.gif" /></td>
					</tr>
				</table>
			</div>
		</form>
	</div>
	<div class="box_bottom"></div>
</div>