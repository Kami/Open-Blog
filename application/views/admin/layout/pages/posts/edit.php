<?php echo initialize_tinymce(); ?>
<div class="post">
		<div class="post_title">
			<h1><?php echo lang('edit_post'); ?></h1>
		</div>
		<div class="post_body">
			<p><?php echo lang('edit_post_description'); ?></p>
			
			<?php if (validation_errors()): ?>
				<div class="error">
				<?php echo validation_errors(); ?>
				</div>
			<?php endif; ?>
			
				<table width="100%">
				<tr>
					 <td colspan="2">
					 	<fieldset id="edit">
					 		<legend><?php echo lang('form_main'); ?></legend>
					 		<table>
					 			<tr>
					 				<?php echo form_open('admin/posts/edit'); ?>
					 				<td width="150px"><?php echo lang('form_title'); ?></td>
					 				<td><?php echo form_input(array('name' => 'title', 'id' => 'title', 'class' => 'styled', 'size' => '60', 'value' => set_value('title', isset($post['title']) ? $post['title'] : ''))); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="150px" valign="top"><?php echo lang('form_excerpt'); ?></td>
					 				<td><?php echo form_textarea(array('name' => 'excerpt', 'id' => 'excerpt', 'rows' => '10', 'cols' => '100', 'value' => set_value('excerpt', isset($post['excerpt']) ? $post['excerpt'] : ''))); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="150px" valign="top"><?php echo lang('form_content'); ?></td>
					 				<td><?php echo form_textarea(array('name' => 'content', 'id' => 'content', 'rows' => '20', 'cols' => '100', 'value' => set_value('content', isset($post['content']) ? $post['content'] : ''))); ?></td>
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
					 		<legend><?php echo lang('form_settings'); ?></legend>
					 		<table>
					 			<tr>
					 				<td width="150px"><?php echo lang('form_category'); ?></td>
					 				<td><?php echo form_dropdown('category_id', $categories, set_value('category_id', isset($post['category_id']) ? $post['category_id'] : '')); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="150px" valign="top"><?php echo lang('form_status'); ?></td>
					 				<td><?php echo form_dropdown('status', array('published' => lang('published'), 'draft' => lang('draft')), set_value('status', isset($post['status']) ? $post['status'] : '')); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="150px" valign="top"><?php echo lang('form_allow_coments'); ?></td>
					 				<td><?php echo form_checkbox('allow_comments', 1, set_value('allow_comments', isset($settings['allow_comments']) ? $settings['allow_comments'] : '')); ?></td>
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
						<?php echo form_hidden('id', $post['id']) ?>
						<input type="submit" name="submit" value="<?php echo lang('button_edit'); ?>" class="styled" />
						<?php echo form_close(); ?>
					</td>
				</tr>
				</table>
		</div>
</div>