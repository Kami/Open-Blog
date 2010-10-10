<div class="post">
		<div class="post_title">
			<h1><?php echo lang('create_item'); ?></h1>
		</div>
		<div class="post_body">
			<p><?php echo lang('create_item_description'); ?></p>
			
			<?php if (validation_errors()): ?>
				<div class="error">
				<?php echo validation_errors(); ?>
				</div>
			<?php endif; ?>
			
				<table width="100%">
				<tr>
					 <td colspan="2">
					 	<fieldset id="create">
					 		<legend><?php echo lang('create_item'); ?></legend>
					 		<table>
					 			<tr>
					 				<?php echo form_open('admin/navigation/create'); ?>
					 				<td width="200px"><?php echo lang('form_title'); ?></td>
					 				<td><?php echo form_input(array('name' => 'title', 'id' => 'title', 'size' => '20', 'class' => 'styled', 'value' => set_value('title'))); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?php echo lang('form_url'); ?></td>
					 				<td><?php echo form_input(array('name' => 'url', 'id' => 'url', 'size' => '20', 'class' => 'styled', 'value' => set_value('url'))); ?> (<?php echo lang('form_example'); ?> pages/about/)</td>
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
						<input type="submit" name="submit" value="<?php echo lang('button_create'); ?>" class="styled" />
						<?php echo form_close(); ?>
					</td>
				</tr>
				</table>
		</div>
</div>