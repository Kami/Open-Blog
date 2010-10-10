<script type="text/javascript" src="<?php echo base_url(); ?>application/views/admin/static/javascript/settings.js"></script>
<div class="post">
		<div class="post_title">
			<h1><?php echo lang('settings'); ?></h1>
		</div>
		<div class="post_body">
			<p><?php echo lang('settings_description'); ?></p>
				
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
					 	<fieldset id="general_settings">
					 		<legend><?php echo lang('form_general_settings'); ?></legend>
					 		<table>
					 			<tr>
					 				<?php echo form_open('admin/settings'); ?>
					 				<td width="200px"><?php echo lang('form_blog_title'); ?></td>
					 				<td><?php echo form_input(array('name' => 'blog_title', 'id' => 'blog_title', 'size' => '50', 'class' => 'styled', 'value' => set_value('blog_title', isset($settings['blog_title']) ? $settings['blog_title'] : ''))); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?php echo lang('form_blog_description'); ?></td>
					 				<td><?php echo form_input(array('name' => 'blog_description', 'id' => 'blog_description', 'size' => '50', 'class' => 'styled', 'value' => set_value('blog_description', isset($settings['blog_description']) ? $settings['blog_description'] : ''))); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?php echo lang('form_meta_keywords'); ?></td>
					 				<td><?php echo form_input(array('name' => 'meta_keywords', 'id' => 'meta_keywords', 'size' => '50', 'class' => 'styled', 'value' => set_value('meta_keywords', isset($settings['meta_keywords']) ? $settings['meta_keywords'] : ''))); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?php echo lang('form_admin_email'); ?></td>
					 				<td><?php echo form_input(array('name' => 'admin_email', 'id' => 'admin_email', 'size' => '50', 'class' => 'styled', 'value' => set_value('admin_email', isset($settings['admin_email']) ? $settings['admin_email'] : ''))); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?php echo lang('form_allow_registrations'); ?></td>
					 				<td><?php echo form_checkbox('allow_registrations', 1, set_value('allow_registrations', isset($settings['allow_registrations']) ? $settings['allow_registrations'] : '')); ?></td>
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
					 		<legend><?php echo lang('form_site_status'); ?></legend>
					 		<table>
					 		<tr>
					 				<td width="200px"><?php echo lang('form_enabled'); ?></td>
					 				<td><?php echo form_checkbox('enabled', 1, set_value('enabled', isset($settings['enabled']) ? $settings['enabled'] : '')); ?></td>
					 			</tr>
					 			<tr class="offline_reason">
					 				<td width="200px"><?php echo lang('form_offline_reason'); ?></td>
					 				<td><?php echo form_input(array('name' => 'offline_reason', 'id' => 'offline_reason', 'size' => '50', 'class' => 'styled', 'value' => set_value('offline_reason', isset($settings['offline_reason']) ? $settings['offline_reason'] : ''))); ?> (<?php echo lang('form_offline_reason_tip'); ?>)</td>
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
					 		<legend><?php echo lang('form_display_settings'); ?></legend>
					 		<table>
					 			<tr>
					 				<td width="200px"><?php echo lang('form_template'); ?></td>
					 				<td><?php echo form_dropdown('template', $templates, set_value('template', isset($settings['template']) ? $settings['template'] : '')); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?php echo lang('form_language'); ?></td>
					 				<td><?php echo form_dropdown('language', $languages, set_value('language', isset($settings['language']) ? $settings['language'] : '')); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?php echo lang('form_posts_per_site'); ?></td>
					 				<td><?php echo form_input(array('name' => 'posts_per_site', 'id' => 'posts_per_site', 'size' => '1', 'class' => 'styled', 'value' => set_value('posts_per_site', isset($settings['posts_per_site']) ? $settings['posts_per_site'] : ''))); ?> (<?php echo lang('form_default'); ?> = 5)</td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?php echo lang('form_links_per_box'); ?></td>
					 				<td><?php echo form_input(array('name' => 'links_per_box', 'id' => 'links_per_box', 'size' => '1', 'class' => 'styled', 'value' => set_value('links_per_box', isset($settings['links_per_box']) ? $settings['links_per_box'] : ''))); ?> (<?php echo lang('form_default'); ?> = 5)</td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?php echo lang('form_months_per_archive'); ?></td>
					 				<td><?php echo form_input(array('name' => 'months_per_archive', 'id' => 'months_per_archive', 'size' => '1', 'class' => 'styled', 'value' => set_value('months_per_archive', isset($settings['months_per_archive']) ? $settings['months_per_archive'] : ''))); ?> (<?php echo lang('form_default'); ?> = 8)</td>
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