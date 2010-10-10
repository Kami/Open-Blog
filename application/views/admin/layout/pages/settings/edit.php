<div class="post">
		<div class="post_title">
			<h1><?=lang('settings');?></h1>
		</div>
		<div class="post_body">
			<p><?=lang('settings_description');?></p>
				
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
					 	<fieldset id="general_settings">
					 		<legend><?=lang('form_general_settings');?></legend>
					 		<table>
					 			<tr>
					 				<?=form_open('admin/settings');?>
					 				<td width="200px"><?=lang('form_blog_title');?></td>
					 				<td><?=form_input(array('name' => 'blog_title', 'id' => 'blog_title', 'size' => '50', 'class' => 'styled', 'value' => $this->validation->blog_title));?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?=lang('form_blog_description');?></td>
					 				<td><?=form_input(array('name' => 'blog_description', 'id' => 'blog_description', 'size' => '50', 'class' => 'styled', 'value' => $this->validation->blog_description));?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?=lang('form_meta_keywords');?></td>
					 				<td><?=form_input(array('name' => 'meta_keywords', 'id' => 'meta_keywords', 'size' => '50', 'class' => 'styled', 'value' => $this->validation->meta_keywords));?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?=lang('form_allow_registrations');?></td>
					 				<td><?=form_checkbox('allow_registrations', 1, $this->validation->allow_registrations); ?></td>
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
					 	<fieldset id="site_status">
					 		<legend><?=lang('form_site_status');?></legend>
					 		<table>
					 		<tr>
					 				<td width="200px"><?=lang('form_enabled');?></td>
					 				<td><?=form_checkbox('enabled', 1, $this->validation->enabled); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?=lang('form_offline_reason');?></td>
					 				<td><?=form_input(array('name' => 'offline_reason', 'id' => 'offline_reason', 'size' => '50', 'class' => 'styled', 'value' => $this->validation->offline_reason));?> (<?=lang('form_offline_reason_tip');?>)</td>
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
					 	<fieldset id="display_settings">
					 		<legend><?=lang('form_display_settings');?></legend>
					 		<table>
					 			<tr>
					 				<td width="200px"><?=lang('form_template');?></td>
					 				<td><?=form_dropdown('template', $templates, $this->validation->template);?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?=lang('form_language');?></td>
					 				<td><?=form_dropdown('language', $languages, $this->validation->language);?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?=lang('form_posts_per_site');?></td>
					 				<td><?=form_input(array('name' => 'posts_per_site', 'id' => 'posts_per_site', 'size' => '1', 'class' => 'styled', 'value' => $this->validation->posts_per_site));?> (<?=lang('form_default');?> = 5)</td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?=lang('form_links_per_box');?></td>
					 				<td><?=form_input(array('name' => 'links_per_box', 'id' => 'links_per_box', 'size' => '1', 'class' => 'styled', 'value' => $this->validation->links_per_box));?> (<?=lang('form_default');?> = 5)</td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?=lang('form_months_per_archive');?></td>
					 				<td><?=form_input(array('name' => 'months_per_archive', 'id' => 'months_per_archive', 'size' => '1', 'class' => 'styled', 'value' => $this->validation->months_per_archive));?> (<?=lang('form_default');?> = 8)</td>
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