<div class="post">
		<div class="post_title">
			<h1><?=lang('comments');?></h1>
		</div>
		<div class="post_body">
			<p><?=lang('comments_description');?></p>
				
				<? if($this->session->flashdata('message')): ?>
				<div class="message">
					<?=$this->session->flashdata('message');?>
				</div>
				<? endif; ?>
				
				<table class="admin">
				<tr>
					<th class="admin"><?=lang('th_date_posted');?></th>
					<th class="admin"><?=lang('th_post_title');?></th>
					<th class="admin"><?=lang('th_author');?></th>
					<th class="admin"><?=lang('th_comment');?></th>
					<th class="admin"><?=lang('th_actions');?></th>
				</tr>
				<? if ($comments): ?>
					<? foreach ($comments as $comment): ?>
					<tr>
						<td class="admin"><?=date('Y-m-d', strtotime($comment['date']));?></td>
						<td class="admin"><?=anchor('blog/post/' . $comment['post_url'], $comment['title'], array('target' => '_blank'));?></td>
						<td class="admin"><?=$comment['author'];?></td>
						<td class="admin"><?=word_limiter($comment['content'], 10);?></td>
						<td class="admin"><?=anchor('admin/comments/edit/' . $comment['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/edit.png" title="' . lang('edit') . '" border="0">');?> <?=anchor('admin/comments/delete/' . $comment['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/delete.png" title="' . lang('delete') . '" border="0">', array ('onClick' => "return confirm('" . lang('delete_confirmation') . "')"));?></td>
					</tr>
					<? endforeach; ?>
				<? else: ?>
					<tr>
					<td colspan="4"><?=('no_comments');?></td>
					</tr>
				<? endif; ?>
				</table>
				<br />
		</div>
</div>