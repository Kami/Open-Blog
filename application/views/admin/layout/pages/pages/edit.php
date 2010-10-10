<?=initialize_tinymce();?>
<div class="post">
		<div class="post_title">
			<h1><?=lang('edit_page');?></h1>
		</div>
		<div class="post_body">
			<p><?=lang('edit_page_description');?></p>
			
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
					 				<?=form_open('admin/pages/edit');?>
					 				<td width="150px"><?=lang('form_title');?></td>
					 				<td><?=form_input(array('name' => 'title', 'id' => 'title', 'class' => 'styled', 'size' => '50', 'value' => $this->validation->title));?></td>
					 			</tr>
					 			<tr>
					 				<td width="150px" valign="top"><?=lang('form_content');?></td>
					 				<td><?=form_textarea(array('name' => 'content', 'id' => 'content', 'rows' => '20', 'cols' => '100', 'value' => $this->validation->content));?></td>
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
					 	<fieldset id="settings">
					 		<legend><?=lang('form_settings');?></legend>
					 		<table>
					 			<tr>
					 				<td width="150px" valign="top"><?=lang('form_status');?></td>
					 				<td><?=form_dropdown('status', array('active' => lang('active'), 'inactive' => lang('inactive')), $this->validation->status);?></td>
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
						<?=form_hidden('id', $page_data['id']);?>
						<input type="submit" name="submit" value="<?=lang('button_edit');?>" class="styled" />
						<?=form_close();?>
					</td>
				</tr>
				</table>
		</div>
</div>