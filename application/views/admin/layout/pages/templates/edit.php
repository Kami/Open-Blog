<div class="post">
		<div class="post_title">
			<h1><?php echo lang('templates'); ?></h1>
		</div>
		<div class="post_body">
			<p><?php echo lang('templates_description'); ?></p>

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
				
				<?php if ($templates): ?>
					<table width="100%">
					<tr>
						 <td colspan="2">
						 	<fieldset id="template">
						 		<legend><?php echo lang('form_choose_template'); ?></legend>
						 		<table>
						 			<?php echo form_open('admin/templates'); ?>
						 			<?php foreach ($templates as $template): ?>
						 			<tr>
						 				<td width="270px"><img src="<?php echo base_url(); ?>application/views/admin/static/images/templates/<?php echo $template['image']; ?>" /><br /><center><strong><?php echo $template['name']; ?></strong></center></td>
						 				<td><?php echo form_radio('template', $template['id'], $template['checked']); ?></td>
						 			</tr>
						 			<tr>
						 				<td colspan="2">&nbsp;</td>
									</tr>
						 			<?php endforeach; ?>
						 		</table>
						 	</fieldset>
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
				<?php endif; ?>
		</div>
</div>