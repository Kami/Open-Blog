<div class="post">
		<div class="post_title">
			<h1><?php echo lang('edit_comment'); ?></h1>
		</div>
		<div class="post_body">
			<p><?php echo lang('edit_comment_description'); ?></p>
			
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
					 				<?php echo form_open('admin/comments/edit/'); ?>
					 				<td width="150px" valign="top"><?php echo lang('form_comment'); ?></td>
					 				<td><?php echo form_textarea(array('name' => 'comment', 'id' => 'comment', 'rows' => '10', 'cols' => '60', 'class' => 'styled', 'value' => set_value('comment', isset($comment['content']) ? $comment['content'] : ''))); ?></td>
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
						<?php echo form_hidden('id', $comment['id']) ?>
						<input type="submit" name="submit" value="<?php echo lang('button_edit'); ?>" class="styled" />
						<?php echo form_close(); ?>
					</td>
				</tr>
				</table>
		</div>
</div>