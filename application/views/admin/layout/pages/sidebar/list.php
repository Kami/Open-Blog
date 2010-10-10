<script type="text/javascript" src="<?php echo base_url(); ?>application/views/admin/static/javascript/sidebar.js"></script>
<div class="post">
		<div class="post_title">
			<h1><?php echo lang('sidebar'); ?></h1>
		</div>
		<div class="post_body">
			<p><?php echo lang('sidebar_description'); ?></p>
				
				<?php if($this->session->flashdata('message')): ?>
				<div class="message">
					<?php echo $this->session->flashdata('message'); ?>
				</div>
				<?php endif; ?>
				
				<table class="admin">
				<tr>
					<th class="admin"><?php echo lang('th_title'); ?></th>
					<th class="admin"><?php echo lang('th_description'); ?></th>
					<th class="admin"><?php echo lang('th_status'); ?></th>
					<th class="admin" width="45px"><?php echo lang('th_position'); ?></th>
					<th class="admin" width="45px"><?php echo lang('th_actions'); ?></th>
				</tr>
				<?php if ($sidebar): ?>
					<?php foreach ($sidebar as $item): ?>
					<tr id="item_<?php echo $item['id']; ?>">
						<td class="admin"><?php echo lang(strtolower($item['title'])); ?></td>
						<td class="admin"><?php echo lang(strtolower($item['title']) . '_description'); ?></td>
						<td class="admin"><?php echo lang($item['status']); ?></td>
						<td class="admin"><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/arrow_up.png" class="move_up" title="<?php echo lang('move_up'); ?>" border="0" /> <img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/arrow_down.png" class="move_down" title="<?php echo lang('move_down'); ?>" border="0" /></td>
						<td class="admin">
							<?php if ($item['status'] == 'enabled'): ?>
								<?php echo anchor('admin/sidebar/disable/' . $item['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/disable.png" title="' . lang('disable') . '" border="0">'); ?>
							<?php else: ?>
								<?php echo anchor('admin/sidebar/enable/' . $item['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/enable.png" title="' . lang('enable') . '" border="0">'); ?>
							<?php endif; ?>
						</td>
					</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
					<td colspan="4"><?php echo lang('no_items'); ?></td>
					</tr>
				<?php endif; ?>
				</table>
		</div>
</div>