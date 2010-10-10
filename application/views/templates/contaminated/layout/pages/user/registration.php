<h2><?php echo lang('registration'); ?></h2>

<?php if ($this->system_library->settings['allow_registrations'] == 1): ?>
	<p><?php echo lang('registration_description'); ?></p>
	
	<?php if($this->session->flashdata('message')): ?>
		<div class="message">
			<?php echo $this->session->flashdata('message');?>
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
			 				<form action="<?php echo site_url('user/register'); ?>" method="post">
			 				<td width="150px"><?php echo lang('form_username'); ?></td>
			 				<td><input name="username" id="username" type="text" value="<?php echo set_value('username'); ?>" size="15" class="styled" /> <font color="red">*</font></td>
			 			</tr>
			 			<tr>
			 				<td width="150px"><?php echo lang('form_display_name'); ?></td>
			 				<td><input name="display_name" id="display_name" type="text" value="<?php echo set_value('display_name'); ?>" size="15" class="styled" /></td>
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
			 	<fieldset id="password">
			 		<legend><?php echo lang('form_password'); ?></legend>
			 		<table>
			 			<tr>
			 				<td width="150px"><?php echo lang('form_password'); ?></td>
			 				<td><input name="password" id="password" type="password" size="15" class="styled" /> <font color="red">*</font></td>
			 			</tr>
			 			<tr>
			 				<td width="150px"><?php echo lang('form_retype_password'); ?></td>
			 				<td><input name="password_retype" id="password_retype" type="password" size="15" class="styled" /> <font color="red">*</font></td>
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
			 	<fieldset id="contact_info">
			 		<legend><?php echo lang('form_contact_info'); ?></legend>
			 		<table>
			 			<tr>
			 				<td width="150px"><?php echo lang('form_email'); ?></td>
			 				<td><input name="email" id="email" type="text" value="<?php echo set_value('email'); ?>" size="25" class="styled" /> <font color="red">*</font></td>
			 			</tr>
			 			<tr>
			 				<td width="150px"><?php echo lang('form_website'); ?></td>
			 				<td><input name="website" id="website" type="text" value="<?php echo set_value('website'); ?>" size="25" class="styled" /></td>
			 			</tr>
			 			<tr>
			 				<td width="150px"><?php echo lang('form_msn_messenger'); ?></td>
			 				<td><input name="msn_messenger" id="msn_messenger" type="text" value="<?php echo set_value('msn_messenger'); ?>" size="25" class="styled" /></td>
			 			</tr>
			 			<tr>
			 				<td width="150px"><?php echo lang('form_jabber'); ?></td>
			 				<td><input name="jabber" id="jabber" type="text" value="<?php echo set_value('jabber'); ?>" size="15" class="styled" /></td>
			 			</tr>
			 			<tr>
			 				<td width="150px" valign="top"><?php echo lang('form_about_me'); ?></td>
			 				<td><textarea name="about_me" id="about_me" rows="10" cols="40" class="styled"><?php echo set_value('about_me'); ?></textarea></td>
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
				<input type="submit" name="submit" value="<?php echo lang('register'); ?>" />
				</form>
			</td>
		</tr>
		</table>
<?php else: ?>
	<p><?php echo lang('registrations_closed'); ?></p>
<?php endif; ?>