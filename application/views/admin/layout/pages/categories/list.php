<div class="post">
		<div class="post_title">
			<h1><?=lang('categories');?></h1>
		</div>
		<div class="post_body">
			<p><?=lang('categories_description');?></p>
				
				<? if($this->session->flashdata('message')): ?>
				<div class="message">
					<?=$this->session->flashdata('message');?>
				</div>
				<? endif; ?>
				
				<table class="admin">
				<tr>
					<th class="admin"><?=lang('th_id');?></td>
					<th class="admin"><?=lang('th_name');?></td>
					<th class="admin"><?=lang('th_description');?></td>
					<th class="admin"><?=lang('th_actions');?></td>
				</tr>
				<? if ($categories): ?>
					<? foreach ($categories as $category): ?>
					<tr>
						<td class="admin"><?=$category['id'];?></td>
						<td class="admin"><?=$category['name'];?></td>
						<td class="admin"><?=$category['description'];?></td>
						<td class="admin"><?=anchor('admin/categories/edit/' . $category['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/edit.png" title="' . lang('edit') . '" border="0">');?> <?=anchor('admin/categories/delete/' . $category['id'], '<img src="' . base_url() . 'application/views/admin/static/images/icons/delete.png" title="' . lang('delete') . '" border="0">', array ('onClick' => "return confirm('" . lang('delete_confirmation') . "')"));?></td>
					</tr>
					<? endforeach; ?>
				<? else: ?>
					<tr>
					<td colspan="4"><?=lang('no_categories');?></td>
					</tr>
				<? endif; ?>
				</table>
				<br />
				<?=anchor('admin/categories/create', lang('new_category'));?>
		</div>
</div>