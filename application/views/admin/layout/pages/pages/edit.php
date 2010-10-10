<?php echo initialize_tinymce(); ?>
<div class="post">
		<div class="post_title">
			<h1><?php echo lang('edit_page'); ?></h1>
		</div>
		<div class="post_body">
			<p><?php echo lang('edit_page_description'); ?></p>
			
			<?php if (validation_errors()): ?>
				<div class="error">
				<?php echo validation_errors(); ?>
				</div>
			<?php endif; ?>
			
				<table width="100%">
				<tr>
					 <td colspan="2">
					 	<fieldset id="main">
					 		<legend><?php echo lang('form_main'); ?></legend>
					 		<table>
					 			<tr>
					 				<?php echo form_open('admin/pages/edit'); ?>
					 				<td width="150px"><?php echo lang('form_title'); ?></td>
					 				<td><?php echo form_input(array('name' => 'title', 'id' => 'title', 'class' => 'styled', 'size' => '50', 'value' => set_value('title', isset($page_data['title']) ? $page_data['title'] : ''))); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="150px" valign="top"><?php echo lang('form_content'); ?></td>
					 				<td><?php echo form_textarea(array('name' => 'content', 'id' => 'content', 'rows' => '20', 'cols' => '100', 'value' => set_value('content', isset($page_data['content']) ? $page_data['content'] : ''))); ?></td>
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
					 				<td width="150px" valign="top"><?php echo lang('form_status'); ?></td>
					 				<td><?php echo form_dropdown('status', array('active' => lang('active'), 'inactive' => lang('inactive')), set_value('status', isset($page_data['status']) ? $page_data['status'] : '')); ?></td>
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
						<?php echo form_hidden('id', $page_data['id']); ?>
						<input type="submit" name="submit" value="<?php echo lang('button_edit'); ?>" class="styled" />
						<?php echo form_close(); ?>
					</td>
				</tr>
				</table>
		</div>
</div>