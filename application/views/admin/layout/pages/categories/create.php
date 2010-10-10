<div class="post">
		<div class="post_title">
			<h1><?php echo lang('create_category'); ?></h1>
		</div>
		<div class="post_body">
			<p><?php echo lang('create_category_description'); ?></p>
			
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
					 				<?php echo form_open('admin/categories/create'); ?>
					 				<td width="200px"><?php echo lang('form_category_name'); ?></td>
					 				<td><?php echo form_input(array('name' => 'name', 'id' => 'name', 'size' => '30', 'class' => 'styled', 'value' => set_value('name'))); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?php echo lang('form_category_description'); ?></td>
					 				<td><?php echo form_input(array('name' => 'description', 'id' => 'description', 'size' => '50', 'class' => 'styled', 'value' => set_value('description'))); ?></td>
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