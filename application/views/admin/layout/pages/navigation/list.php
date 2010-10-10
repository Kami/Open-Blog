<script type="text/javascript" src="<?php echo base_url(); ?>application/views/admin/static/javascript/navigation.js"></script>
<div class="post">
		<div class="post_title">
			<h1><?php echo lang('navigation'); ?></h1>
		</div>
		<div class="post_body">
			<p><?php echo lang('navigation_description'); ?></p>
				
				<?php if($this->session->flashdata('message')): ?>
				<div class="message">
					<?php echo $this->session->flashdata('message'); ?>
				</div>
				<?php endif; ?>
				
				<table class="admin">
				<tr>
					<th class="admin"><?php echo lang('th_title'); ?></th>
					<th class="admin"><?php echo lang('th_description'); ?></th>
					<th class="admin" width="45"><?php echo lang('th_position'); ?></th>
					<th class="admin"><?php echo lang('th_actions'); ?></th>
				</tr>
				<?php if ($navigation): ?>
					<?php foreach ($navigation as $navigation): ?>
					<tr id="item_<?php echo $navigation['id']; ?>">
						<td class="admin"><?php echo anchor($navigation['url'], $navigation['title']); ?></td>
						<td class="admin"><?php echo $navigation['description']; ?></td>
						<td class="admin"><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/arrow_up.png" class="move_up" title="<?php echo lang('move_up'); ?>" border="0" /> <img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/arrow_down.png" class="move_down" title="<?php echo lang('move_down'); ?>" border="0" /></td>
						<td class="admin"><?php echo anchor('admin/navigation/edit/' . $navigation['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/edit.png" title="' . lang('edit') . '" border="0">'); ?> <?php echo anchor('admin/navigation/delete/' . $navigation['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/delete.png" title="' . lang('delete') . '" border="0">', array ('onClick' => "return confirm('" . lang('delete_confirmation') . "')")); ?></td>
					</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
					<td colspan="4"><?php echo lang('no_items'); ?></td>
					</tr>
				<?php endif; ?>
				</table>
				<br />
				<?php echo anchor('admin/navigation/create', lang('new_item')); ?>
		</div>
</div>