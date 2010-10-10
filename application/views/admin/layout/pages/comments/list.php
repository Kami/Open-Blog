<div class="post">
		<div class="post_title">
			<h1><?php echo lang('comments'); ?></h1>
		</div>
		<div class="post_body">
			<p><?php echo lang('comments_description'); ?></p>
				
				<?php if($this->session->flashdata('message')): ?>
				<div class="message">
					<?php echo $this->session->flashdata('message'); ?>
				</div>
				<?php endif; ?>
				
				<table class="admin">
				<tr>
					<th class="admin"><?php echo lang('th_date_posted'); ?></th>
					<th class="admin"><?php echo lang('th_post_title'); ?></th>
					<th class="admin"><?php echo lang('th_author'); ?></th>
					<th class="admin"><?php echo lang('th_comment'); ?></th>
					<th class="admin"><?php echo lang('th_actions'); ?></th>
				</tr>
				<?php if ($comments): ?>
					<?php foreach ($comments as $comment): ?>
					<tr>
						<td class="admin"><?php echo date('Y-m-d', strtotime($comment['date'])); ?></td>
						<td class="admin"><?php echo anchor('blog/post/' . $comment['post_url'], $comment['title'], array('target' => '_blank')); ?></td>
						<td class="admin"><?php echo $comment['author']; ?></td>
						<td class="admin"><?php echo character_limiter($comment['content'], 35); ?></td>
						<td class="admin"><?php echo anchor('admin/comments/edit/' . $comment['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/edit.png" title="' . lang('edit') . '" border="0">'); ?> <?php echo anchor('admin/comments/delete/' . $comment['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/delete.png" title="' . lang('delete') . '" border="0">', array ('onClick' => "return confirm('" . lang('delete_confirmation') . "')")); ?></td>
					</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
					<td colspan="4"><?php echo ('no_comments'); ?></td>
					</tr>
				<?php endif; ?>
				</table>
				<br />
		</div>
</div>