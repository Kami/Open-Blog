<div class="post">
		<div class="post_title">
			<h1><?=lang('posts');?></h1>
		</div>
		<div class="post_body">
			<p><?=lang('posts_description');?></p>
				
				<? if($this->session->flashdata('message')): ?>
				<div class="message">
					<?=$this->session->flashdata('message');?>
				</div>
				<? endif; ?>
				
				<table class="admin">
				<tr>
					<th class="admin"><?=lang('th_date_posted');?></th>
					<th class="admin"><?=lang('th_title');?></th>
					<th class="admin"><?=lang('th_category');?></th>
					<th class="admin"><img src="<?=base_url();?>application/views/admin/static/images/icons/icon_comments.png" title="Comments" border="0"></th>
					<th class="admin"><?=lang('th_status');?></th>
					<th class="admin"><?=lang('th_actions');?></th>
				</tr>
				<? if ($posts): ?>
					<? foreach ($posts as $post): ?>
					<tr>
						<td class="admin"><?=$post['date_posted'];?></td>
						<td class="admin"><?=anchor('blog/post/' . $post['url'], $post['title'], array('target' => '_blank'));?></td>
						<td class="admin"><?=anchor('blog/category/' . $post['url_name'], $post['name'], array('target' => '_blank'));?></td>
						<td class="admin"><?=$post['comment_count'];?></td>
						<td class="admin"><?=lang($post['status']);?></td>
						<td class="admin"><?=anchor('admin/posts/edit/' . $post['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/edit.png" title="' . lang('edit'). '" border="0">');?> <?=anchor('admin/posts/delete/' . $post['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/delete.png" title="' . lang('delete') . '" border="0">', array ('onClick' => "return confirm('" . lang('delete_confirmation') . "')"));?></td>
					</tr>
					<? endforeach; ?>
				<? else: ?>
					<tr>
					<td colspan="6"><?=lang('no_posts');?></td>
					</tr>
				<? endif; ?>
				</table>
				<br />
				<?=anchor('admin/posts/create', lang('new_post'));?>
		</div>
</div>