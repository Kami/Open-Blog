<div class="post">
		<div class="post_title">
			<h1><?php echo lang('edit_user'); ?></h1>
		</div>
		<div class="post_body">
			<p><?php echo lang('edit_user_description'); ?></p>
			
			<?php if($this->session->flashdata('message')): ?>
				<div class="message">
					<?php echo $this->session->flashdata('message'); ?>
				</div>
			<?php endif; ?>
				
			<?php if (validation_errors()): ?>
				<div class="error">
				<?php echo validation_errors(); ?>
				</div>
			<?php endif; ?>

				<table width="100%">
				<tr>
					 <td colspan="2">
					 	<fieldset id="name">
					 		<legend><?php echo lang('form_name'); ?></legend>
					 		<table>
					 			<tr>
					 				<?php echo form_open('admin/users/edit'); ?>
					 				<td width="200px"><?php echo lang('form_username'); ?></td>
					 				<td><?php echo form_input(array('name' => 'username', 'id' => 'username', 'size' => '15', 'class' => 'styled', 'value' => set_value('username', isset($user['username']) ? $user['username'] : '')), null, 'disabled'); ?> (<?php echo lang('form_username_cant_be_changed'); ?>)</td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?php echo lang('form_display_name'); ?></td>
					 				<td><?php echo form_input(array('name' => 'display_name', 'id' => 'display_name', 'size' => '15', 'class' => 'styled', 'value' => set_value('display_name', isset($user['display_name']) ? $user['display_name'] : ''))); ?></td>
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
					 	<fieldset id="level">
					 		<legend><?php echo lang('form_level'); ?></legend>
					 		<table>
					 			<tr>
					 				<td width="200px"><?php echo lang('form_level'); ?></td>
					 				<td><?php echo form_dropdown('level', array('user' => 'User', 'administrator' => 'Administrator'), set_value('level', isset($user['level']) ? $user['level'] : '')); ?></td>
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
					 	<fieldset id="contact">
					 		<legend><?php echo lang('form_contact_info'); ?></legend>
					 		<table>
					 			<tr>
					 				<td width="200px"><?php echo lang('form_email'); ?></td>
					 				<td><?php echo form_input(array('name' => 'email', 'id' => 'email', 'size' => '25', 'class' => 'styled', 'value' => set_value('email', isset($user['email']) ? $user['email'] : ''))); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?php echo lang('form_website'); ?></td>
					 				<td><?php echo form_input(array('name' => 'website', 'id' => 'website', 'size' => '25', 'class' => 'styled', 'value' => set_value('website', isset($user['website']) ? $user['website'] : ''))); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?php echo lang('form_msn_messenger'); ?></td>
					 				<td><?php echo form_input(array('name' => 'msn_messenger', 'id' => 'msn_messenger', 'size' => '25', 'class' => 'styled', 'value' => set_value('msn_messenger', isset($user['msn_messenger']) ? $user['msn_messenger'] : ''))); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?php echo lang('form_jabber'); ?></td>
					 				<td><?php echo form_input(array('name' => 'jabber', 'id' => 'jabber', 'size' => '15', 'class' => 'styled', 'value' => set_value('jabber', isset($user['jabber']) ? $user['jabber'] : ''))); ?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px" valign="top"><?php echo lang('form_about_me'); ?></td>
					 				<td><?php echo form_textarea(array('name' => 'about_me', 'id' => 'about_me', 'rows' => '10', 'cols' => '80', 'class' => 'styled', 'value' => set_value('about_me', isset($user['about_me']) ? $user['about_me'] : ''))); ?></td>
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
						<?php echo form_hidden('id', $user['id']) ?>
						<input type="submit" name="submit" value="<?php echo lang('button_edit'); ?>" class="styled" />
						<?php echo form_close(); ?>
					</td>
				</tr>
				</table>
		</div>
</div>