<div class="post">
		<div class="post_title">
			<h1><?php echo lang('edit_link'); ?></h1>
		</div>
		<div class="post_body">
			<p><?php echo lang('edit_link_description'); ?></p>
			
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
					 				<?php echo form_open('admin/links/edit'); ?>
					 				<td width="200px"><?php echo lang('form_name'); ?></td>
					 				<td><?php echo form_input(array('name' => 'name', 'id' => 'name', 'size' => '20', 'class' => 'styled', 'value' => set_value('name', isset($link['name']) ? $link['name'] : ''))); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?php echo lang('form_url'); ?></td>
					 				<td><?php echo form_input(array('name' => 'url', 'id' => 'url', 'size' => '30', 'class' => 'styled', 'value' => set_value('url', isset($link['url']) ? $link['url'] : ''))); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?php echo lang('form_description'); ?></td>
					 				<td><?php echo form_input(array('name' => 'description', 'id' => 'description', 'size' => '40', 'class' => 'styled', 'value' => set_value('description', isset($link['description']) ? $link['description'] : ''))); ?></td>
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
					 				<td width="150px" valign="top"><?php echo lang('form_target'); ?></td>
					 				<td><?php echo form_dropdown('target', array('blank' => 'blank', 'self' => 'self', 'parent' => 'parent'), set_value('target', isset($link['target']) ? $link['target'] : '')); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="150px" valign="top"><?php echo lang('form_visible'); ?></td>
					 				<td><?php echo form_dropdown('visible', array('yes' => lang('form_yes'), 'no' => lang('form_no')), set_value('visible', isset($link['visible']) ? $link['visible'] : '')); ?></td>
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
						<?php echo form_hidden('id', $link['id']); ?>
						<input type="submit" name="submit" value="<?php echo lang('button_edit'); ?>" class="styled" />
						<?php echo form_close(); ?>
					</td>
				</tr>
				</table>
		</div>
</div>