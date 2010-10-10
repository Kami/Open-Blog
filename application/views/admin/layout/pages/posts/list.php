<div class="post">
		<div class="post_title">
			<h1><?php echo lang('posts'); ?></h1>
		</div>
		<div class="post_body">
			<p><?php echo lang('posts_description'); ?></p>
				
				<?php if($this->session->flashdata('message')): ?>
				<div class="message">
					<?php echo $this->session->flashdata('message'); ?>
				</div>
				<?php endif; ?>
				
				<table class="admin">
				<tr>
					<th class="admin"><?php echo lang('th_date_posted'); ?></th>
					<th class="admin"><?php echo lang('th_title'); ?></th>
					<th class="admin"><?php echo lang('th_category'); ?></th>
					<th class="admin"><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/icon_comments.png" title="Comments" border="0"></th>
					<th class="admin"><?php echo lang('th_status'); ?></th>
					<th class="admin"><?php echo lang('th_actions'); ?></th>
				</tr>
				<?php if ($posts): ?>
					<?php foreach ($posts as $post): ?>
					<tr>
						<td class="admin"><?php echo $post['date_posted']; ?></td>
						<td class="admin"><?php echo anchor('blog/post/' . $post['url'], $post['title'], array('target' => '_blank')); ?></td>
						<td class="admin"><?php echo anchor('blog/category/' . $post['url_name'], $post['name'], array('target' => '_blank')); ?></td>
						<td class="admin"><?php echo $post['comment_count']; ?></td>
						<td class="admin"><?php echo lang($post['status']); ?></td>
						<td class="admin"><?php echo anchor('admin/posts/edit/' . $post['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/edit.png" title="' . lang('edit'). '" border="0">'); ?> <?php echo anchor('admin/posts/delete/' . $post['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/delete.png" title="' . lang('delete') . '" border="0">', array ('onClick' => "return confirm('" . lang('delete_confirmation') . "')")); ?></td>
					</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
					<td colspan="6"><?php echo lang('no_posts'); ?></td>
					</tr>
				<?php endif; ?>
				</table>
				<br />
				<?php echo anchor('admin/posts/create', lang('new_post')); ?>
		</div>
</div>