<div class="post">
		<div class="post_title">
			<h1><?=lang('templates');?></h1>
		</div>
		<div class="post_body">
			<p><?=lang('templates_description');?></p>

				<? if ($this->validation->error_string != ""): ?>
					<div class="error">
					<?=$this->validation->error_string;?>
					</div>
				<? endif; ?>
				
				<? if($this->session->flashdata('message')): ?>
				<div class="message">
					<?=$this->session->flashdata('message');?>
				</div>
				<? endif; ?>
				
				<?if ($templates): ?>
					<table width="100%">
					<tr>
						 <td colspan="2">
						 	<fieldset id="template">
						 		<legend><?=lang('form_choose_template');?></legend>
						 		<table>
						 			<?=form_open('admin/templates');?>
						 			<? foreach ($templates as $template): ?>
						 			<tr>
						 				<td width="270px"><img src="<?=base_url();?>application/views/admin/static/images/templates/<?=$template['image'];?>" /><br /><center><strong><?=$template['name'];?></strong></center></td>
						 				<td><?=form_radio('template', $template['id'], $template['checked']);?></td>
						 			</tr>
						 			<tr>
						 				<td colspan="2">&nbsp;</td>
									</tr>
						 			<? endforeach; ?>
						 		</table>
						 	</fieldset>
					<tr>
						 <td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="submit" name="submit" value="<?=lang('button_save');?>" class="styled" />
							<?=form_close();?>
						</td>
					</tr>
					</table>
				<? endif; ?>
		</div>
</div>