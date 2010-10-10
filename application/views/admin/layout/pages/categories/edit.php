<div class="post">
		<div class="post_title">
			<h1><?php echo lang('edit_category'); ?></h1>
		</div>
		<div class="post_body">
			<p><?php echo lang('edit_category_description'); ?></p>
			
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
					 				<?php echo form_open('admin/categories/edit/'); ?>
					 				<td width="200px"><?php echo lang('form_category_name'); ?></td>
					 				<td><?php echo form_input(array('name' => 'name', 'id' => 'name', 'size' => '20', 'class' => 'styled', 'value' => set_value('name', isset($category['name']) ? $category['name'] : ''))); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?php echo lang('form_category_description'); ?></td>
					 				<td><?php echo form_input(array('name' => 'description', 'id' => 'description', 'size' => '40', 'class' => 'styled', 'value' => set_value('description', isset($category['description']) ? $category['description'] : ''))); ?></td>
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
						<?php echo form_hidden('id', $category['id']) ?>
						<input type="submit" name="submit" value="<?php echo lang('button_edit'); ?>" class="styled" />
						<?php echo form_close(); ?>
					</td>
				</tr>
				</table>
		</div>
</div>