<div class="post">
		<div class="post_title">
			<h1><?php echo lang('feed_settings'); ?></h1>
		</div>
		<div class="post_body">
			<p><?php echo lang('feed_settings_description'); ?></p>
				
				<?php if (validation_errors()): ?>
					<div class="error">
					<?php echo validation_errors(); ?>
					</div>
				<?php endif; ?>
				
				<?php if($this->session->flashdata('message')): ?>
				<div class="message">
					<?php echo $this->session->flashdata('message'); ?>
				</div>
				<?php endif; ?>
				<table width="100%">
				<tr>
					 <td colspan="2">
					 	<fieldset id="edit">
					 		<legend><?php echo lang('feed_settings'); ?></legend>
					 		<table>
					 			<tr>
					 				<?php echo form_open('admin/feeds'); ?>
					 				<td width="200px"><?php echo lang('form_enable_rss_posts'); ?></td>
					 				<td><?php echo form_checkbox('enable_rss_posts', 1, $settings['enable_rss_posts']); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?php echo lang('form_enable_rss_comments'); ?></td>
					 				<td><?php echo form_checkbox('enable_rss_comments', 1, $settings['enable_rss_comments']); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?php echo lang('form_enable_atom_posts'); ?></td>
					 				<td><?php echo form_checkbox('enable_atom_posts', 1, $settings['enable_atom_posts']); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?php echo lang('form_enable_atom_comments'); ?></td>
					 				<td><?php echo form_checkbox('enable_atom_comments', 1, $settings['enable_atom_comments']); ?></td>
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
						<input type="submit" name="submit" value="<?php echo lang('button_save'); ?>" class="styled" />
						<?php echo form_close(); ?>
					</td>
				</tr>
				</table>
		</div>
</div>