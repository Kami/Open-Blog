<div class="post">
		<div class="post_title">
			<h1><?php echo lang('social_bookmarking'); ?></h1>
		</div>
		<div class="post_body">
			<p><?php echo lang('social_bookmarking_description'); ?></p>
				
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
					 		<legend><?php echo lang('social_bookmarking_settings'); ?></legend>
					 		<table>
					 			<tr>
					 				<?php echo form_open('admin/social_bookmarking'); ?>
					 				<td width="150px"><?php echo lang('form_enable_digg'); ?></td>
					 				<td><?php echo form_checkbox('enable_digg', 1, $settings['enable_digg']); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="150px"><?php echo lang('form_enable_technorati'); ?></td>
					 				<td><?php echo form_checkbox('enable_technorati', 1, $settings['enable_technorati']); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="150px"><?php echo lang('form_enable_delicious'); ?></td>
					 				<td><?php echo form_checkbox('enable_delicious', 1, $settings['enable_delicious']); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="150px"><?php echo lang('form_enable_stumbleupon'); ?></td>
					 				<td><?php echo form_checkbox('enable_stumbleupon', 1, $settings['enable_stumbleupon']); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="150px"><?php echo lang('form_enable_reddit'); ?></td>
					 				<td><?php echo form_checkbox('enable_reddit', 1, $settings['enable_reddit']); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="150px"><?php echo lang('form_enable_furl'); ?></td>
					 				<td><?php echo form_checkbox('enable_furl', 1, $settings['enable_furl']); ?></td>
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