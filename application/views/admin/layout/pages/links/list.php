<div class="post">
		<div class="post_title">
			<h1><?=lang('links');?></h1>
		</div>
		<div class="post_body">
			<p><?=lang('links_description');?></p>
				
				<? if($this->session->flashdata('message')): ?>
				<div class="message">
					<?=$this->session->flashdata('message');?>
				</div>
				<? endif; ?>
				
				<table class="admin">
				<tr>
					<th class="admin"><?=lang('th_id');?></th>
					<th class="admin"><?=lang('th_name');?></th>
					<th class="admin"><?=lang('th_description');?></th>
					<th class="admin"><?=lang('th_visible');?></th>
					<th class="admin"><?=lang('th_actions');?></th>
				</tr>
				<? if ($links): ?>
					<? foreach ($links as $link): ?>
					<tr>
						<td class="admin"><?=$link['id'];?></td>
						<td class="admin"><?=anchor($link['url'], $link['name']);?></td>
						<td class="admin"><?=$link['description'];?></td>
						<td class="admin"><?=lang($link['visible']);?></td>
						<td class="admin"><?=anchor('admin/links/edit/' . $link['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/edit.png" title="' . lang('edit') . '" border="0">');?> <?=anchor('admin/links/delete/' . $link['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/delete.png" title="' . lang('delete') . '" border="0">', array ('onClick' => "return confirm('" . lang('delete_confirmation') . "')"));?></td>
					</tr>
					<? endforeach; ?>
				<? else: ?>
					<tr>
					<td colspan="5"><?=lang('no_links');?></td>
					</tr>
				<? endif; ?>
				</table>
				<br />
				<?=anchor('admin/links/create', lang('new_link'));?>
		</div>
</div>