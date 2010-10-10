<div class="post">
		<div class="post_title">
			<h1><?php echo lang('pages'); ?></h1>
		</div>
		<div class="post_body">
			<p><?php echo lang('pages_description'); ?></p>
				
				<?php if($this->session->flashdata('message')): ?>
				<div class="message">
					<?php echo $this->session->flashdata('message'); ?>
				</div>
				<?php endif; ?>
				
				<table class="admin">
				<tr>
					<th class="admin"><?php echo lang('th_date_created'); ?></th>
					<th class="admin"><?php echo lang('th_title'); ?></th>
					<th class="admin"><?php echo lang('th_status'); ?></th>
					<th class="admin"><?php echo lang('th_actions'); ?></th>
				</tr>
				<?php if ($pages): ?>
					<?php foreach ($pages as $page): ?>
					<tr>
						<td class="admin"><?php echo $page['date']; ?></td>
						<td class="admin"><?php echo anchor('pages/' . $page['url_title'], $page['title']); ?></td>
						<td class="admin"><?php echo lang($page['status']); ?></td>
						<td class="admin"><?php echo anchor('admin/pages/edit/' . $page['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/edit.png" title="' . lang('edit') . '" border="0">'); ?> <?php echo anchor('admin/pages/delete/' . $page['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/delete.png" title="' . lang('delete') . '" border="0">', array ('onClick' => "return confirm('" . lang('delete_confirmation') . "')")); ?></td>
					</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
					<td colspan="4"><?php echo lang('no_pages'); ?></td>
					</tr>
				<?php endif; ?>
				</table>
				<br />
				<?php echo anchor('admin/pages/create', lang('new_page')); ?>
		</div>
</div>