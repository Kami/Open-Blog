<div class="post">
		<div class="post_title">
			<h1><?php echo lang('links'); ?></h1>
		</div>
		<div class="post_body">
			<p><?php echo lang('links_description'); ?></p>
				
				<?php if($this->session->flashdata('message')): ?>
				<div class="message">
					<?php echo $this->session->flashdata('message'); ?>
				</div>
				<?php endif; ?>
				
				<table class="admin">
				<tr>
					<th class="admin"><?php echo lang('th_id'); ?></th>
					<th class="admin"><?php echo lang('th_name'); ?></th>
					<th class="admin"><?php echo lang('th_description'); ?></th>
					<th class="admin"><?php echo lang('th_visible'); ?></th>
					<th class="admin"><?php echo lang('th_actions'); ?></th>
				</tr>
				<?php if ($links): ?>
					<?php foreach ($links as $link): ?>
					<tr>
						<td class="admin"><?php echo $link['id']; ?></td>
						<td class="admin"><?php echo anchor($link['url'], $link['name']); ?></td>
						<td class="admin"><?php echo $link['description']; ?></td>
						<td class="admin"><?php echo lang($link['visible']); ?></td>
						<td class="admin"><?php echo anchor('admin/links/edit/' . $link['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/edit.png" title="' . lang('edit') . '" border="0">'); ?> <?php echo anchor('admin/links/delete/' . $link['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/delete.png" title="' . lang('delete') . '" border="0">', array ('onClick' => "return confirm('" . lang('delete_confirmation') . "')")); ?></td>
					</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
					<td colspan="5"><?php echo lang('no_links'); ?></td>
					</tr>
				<?php endif; ?>
				</table>
				<br />
				<?php echo anchor('admin/links/create', lang('new_link')); ?>
		</div>
</div>