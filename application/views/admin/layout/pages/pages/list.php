<div class="post">
		<div class="post_title">
			<h1><?=lang('pages');?></h1>
		</div>
		<div class="post_body">
			<p><?=lang('pages_description');?></p>
				
				<? if($this->session->flashdata('message')): ?>
				<div class="message">
					<?=$this->session->flashdata('message');?>
				</div>
				<? endif; ?>
				
				<table class="admin">
				<tr>
					<th class="admin"><?=lang('th_date_created');?></th>
					<th class="admin"><?=lang('th_title');?></th>
					<th class="admin"><?=lang('th_status');?></th>
					<th class="admin"><?=lang('th_actions');?></th>
				</tr>
				<? if ($pages): ?>
					<? foreach ($pages as $page): ?>
					<tr>
						<td class="admin"><?=$page['date'];?></td>
						<td class="admin"><?=anchor('pages/' . $page['url_title'], $page['title']);?></td>
						<td class="admin"><?=lang($page['status']);?></td>
						<td class="admin"><?=anchor('admin/pages/edit/' . $page['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/edit.png" title="' . lang('edit') . '" border="0">');?> <?=anchor('admin/pages/delete/' . $page['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/delete.png" title="' . lang('delete') . '" border="0">', array ('onClick' => "return confirm('" . lang('delete_confirmation') . "')"));?></td>
					</tr>
					<? endforeach; ?>
				<? else: ?>
					<tr>
					<td colspan="4"><?=lang('no_pages');?></td>
					</tr>
				<? endif; ?>
				</table>
				<br />
				<?=anchor('admin/pages/create', lang('new_page'));?>
		</div>
</div>