<div class="post">
		<div class="post_title">
			<h1><?=lang('navigation');?></h1>
		</div>
		<div class="post_body">
			<p><?=lang('navigation_description');?></p>
				
				<? if($this->session->flashdata('message')): ?>
				<div class="message">
					<?=$this->session->flashdata('message');?>
				</div>
				<? endif; ?>
				
				<table class="admin">
				<tr>
					<th class="admin"><?=lang('th_position');?></th>
					<th class="admin"><?=lang('th_title');?></th>
					<th class="admin"><?=lang('th_description');?></th>
					<th class="admin"><?=lang('th_actions');?></th>
				</tr>
				<? if ($navigation): ?>
					<? foreach ($navigation as $navigation): ?>
					<tr>
						<td class="admin"><?=$navigation['position'];?></td>
						<td class="admin"><?=anchor($navigation['url'], $navigation['title']);?></td>
						<td class="admin"><?=$navigation['description'];?></td>
						<td class="admin"><?=anchor('admin/navigation/edit/' . $navigation['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/edit.png" title="' . lang('edit') . '" border="0">');?> <?=anchor('admin/navigation/delete/' . $navigation['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/delete.png" title="' . lang('delete') . '" border="0">', array ('onClick' => "return confirm('" . lang('delete_confirmation') . "')"));?></td>
					</tr>
					<? endforeach; ?>
				<? else: ?>
					<tr>
					<td colspan="4"><?=lang('no_items');?></td>
					</tr>
				<? endif; ?>
				</table>
				<br />
				<?=anchor('admin/navigation/create', lang('new_item'));?>
		</div>
</div>