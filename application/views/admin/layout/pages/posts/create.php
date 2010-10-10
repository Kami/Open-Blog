<?=initialize_tinymce();?>
<div class="post">
		<div class="post_title">
			<h1><?=lang('create_post');?></h1>
		</div>
		<div class="post_body">
			<p><?=lang('create_post_description');?></p>
			
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
					 				<?=form_open('admin/posts/create');?>
					 				<td width="150px"><?=lang('form_title');?></td>
					 				<td><?=form_input(array('name' => 'title', 'id' => 'title', 'class' => 'styled', 'size' => '50', 'value' => $this->validation->title));?></td>
					 			</tr>
					 			<tr>
					 				<td width="150px" valign="top"><?=lang('form_excerpt');?></td>
					 				<td><?=form_textarea(array('name' => 'excerpt', 'id' => 'excerpt', 'rows' => '10', 'cols' => '100', 'value' => $this->validation->excerpt));?></td>
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
					 				<td width="150px"><?=lang('form_category');?></td>
					 				<td><?=form_dropdown('category_id', $categories, $this->validation->category_id);?></td>
					 			</tr>
					 			<tr>
					 				<td width="150px" valign="top"><?=lang('form_status');?></td>
					 				<td><?=form_dropdown('status', array('published' => lang('published'), 'draft' => lang('draft')), $this->validation->status);?></td>
					 			</tr>
					 			<tr>
					 				<td width="150px" valign="top"><?=lang('form_allow_coments');?></td>
					 				<td><?=form_checkbox('allow_comments', 1, $this->validation->allow_comments);?></td>
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
						<input type="submit" name="submit" value="<?=lang('button_create');?>" class="styled" />
						<?=form_close();?>
					</td>
				</tr>
				</table>
		</div>
</div>