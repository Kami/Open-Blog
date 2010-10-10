<div class="post">
		<div class="post_title">
			<h1><?php echo lang('categories'); ?></h1>
		</div>
		<div class="post_body">
			<p><?php echo lang('categories_description'); ?></p>
				
				<?php if($this->session->flashdata('message')): ?>
				<div class="message">
					<?php echo $this->session->flashdata('message'); ?>
				</div>
				<?php endif; ?>
				
				<table class="admin">
				<tr>
					<th class="admin"><?php echo lang('th_id'); ?></td>
					<th class="admin"><?php echo lang('th_name'); ?></td>
					<th class="admin"><?php echo lang('th_description'); ?></td>
					<th class="admin"><?php echo lang('th_actions'); ?></td>
				</tr>
				<?php if ($categories): ?>
					<?php foreach ($categories as $category): ?>
					<tr>
						<td class="admin"><?php echo $category['id']; ?></td>
						<td class="admin"><?php echo $category['name']; ?></td>
						<td class="admin"><?php echo $category['description']; ?></td>
						<td class="admin"><?php echo anchor('admin/categories/edit/' . $category['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/edit.png" title="' . lang('edit') . '" border="0">'); ?> <?php echo anchor('admin/categories/delete/' . $category['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/delete.png" title="' . lang('delete') . '" border="0">', array ('onClick' => "return confirm('" . lang('delete_confirmation') . "')")); ?></td>
					</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
					<td colspan="4"><?php echo lang('no_categories'); ?></td>
					</tr>
				<?php endif; ?>
				</table>
				<br />
				<?php echo anchor('admin/categories/create', lang('new_category')); ?>
		</div>
</div>