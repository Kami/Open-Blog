<div class="post">
		<div class="post_title">
			<h1><?=lang('edit_category');?></h1>
		</div>
		<div class="post_body">
			<p><?=lang('edit_category_description');?></p>
			
			<? if ($this->validation->error_string != ""): ?>
				<div class="error">
				<?=$this->validation->error_string;?>
				</div>
			<? endif; ?>
			
				<table width="100%">
				<tr>
					 <td colspan="2">
					 	<fieldset id="main">
					 		<legend><?=lang('form_main');?></legend>
					 		<table>
					 			<tr>
					 				<?=form_open('admin/categories/edit/');?>
					 				<td width="200px"><?=lang('form_category_name');?></td>
					 				<td><?=form_input(array('name' => 'name', 'id' => 'name', 'size' => '20', 'class' => 'styled', 'value' => $this->validation->name));?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?=lang('form_category_description');?></td>
					 				<td><?=form_input(array('name' => 'description', 'id' => 'description', 'size' => '40', 'class' => 'styled', 'value' => $this->validation->description));?></td>
					 			</tr>
					 		</table>
					 	</fieldset>
					 </td>
				</tr>
				<tr>
					 <td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2">
						<?=form_hidden('id', $category['id']) ?>
						<input type="submit" name="submit" value="<?=lang('button_edit');?>" class="styled" />
						<?=form_close();?>
					</td>
				</tr>
				</table>
		</div>
</div>