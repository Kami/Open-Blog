<div class="post">
		<div class="post_title">
			<h1><?php echo lang('create_link'); ?></h1>
		</div>
		<div class="post_body">
			<p><?php echo lang('create_link_description'); ?></p>
			
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
					 				<?php echo form_open('admin/links/create'); ?>
					 				<td width="200px"><?php echo lang('form_name'); ?></td>
					 				<td><?php echo form_input(array('name' => 'name', 'id' => 'name', 'size' => '20', 'class' => 'styled', 'value' => set_value('name'))); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?php echo lang('form_url'); ?></td>
					 				<td><?php echo form_input(array('name' => 'url', 'id' => 'url', 'size' => '30', 'class' => 'styled', 'value' => set_value('url'))); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?php echo lang('form_description'); ?></td>
					 				<td><?php echo form_input(array('name' => 'description', 'id' => 'description', 'size' => '40', 'class' => 'styled', 'value' => set_value('description'))); ?></td>
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
					 				<td><?php echo form_dropdown('target', array('blank' => 'blank', 'self' => 'self'), set_value('target')); ?> <a title="<?php echo lang('form_target_title'); ?>|<?php echo lang('form_target_hint'); ?>" class="tip">[?]</a></td>
					 			</tr>
					 			<tr>
					 				<td width="150px" valign="top"><?php echo lang('form_visible'); ?></td>
					 				<td><?php echo form_dropdown('visible', array('yes' => lang('form_yes'), 'no' => lang('form_no')), set_value('visible')); ?> <a title="<?php echo lang('form_visible_title'); ?>|<?php echo lang('form_visible_hint'); ?>" class="tip">[?]</a></td>
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
						<input type="submit" name="submit" value="<?php echo lang('button_create'); ?>" class="styled" />
						<?php echo form_close(); ?>
					</td>
				</tr>
				</table>
		</div>
</div>