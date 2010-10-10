<div class="post">
		<div class="post_title">
			<h1><?=lang('feed_settings');?></h1>
		</div>
		<div class="post_body">
			<p><?=lang('feed_settings_description');?></p>
				
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
				<table width="100%">
				<tr>
					 <td colspan="2">
					 	<fieldset id="edit">
					 		<legend><?=lang('feed_settings');?></legend>
					 		<table>
					 			<tr>
					 				<?=form_open('admin/feeds');?>
					 				<td width="200px"><?=lang('form_enable_rss');?></td>
					 				<td><?=form_checkbox('enable_rss', 1, $settings['enable_rss_status']); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?=lang('form_enable_atom');?></td>
					 				<td><?=form_checkbox('enable_atom', 1, $settings['enable_atom_status']); ?></td>
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
						<input type="submit" name="submit" value="<?=lang('button_save');?>" class="styled" />
						<?=form_close();?>
					</td>
				</tr>
				</table>
		</div>
</div>