<h2><?=lang('profile');?></h2>
<p><?=lang('profile_description');?></p>

<? if($this->session->flashdata('message')): ?>
	<div class="message">
		<?=$this->session->flashdata('message');?>
	</div>
<? endif; ?>
	
<? if ($this->validation->error_string != ""): ?>
	<div class="error">
	<?=$this->validation->error_string;?>
	</div>
<? endif; ?>
			
<table width="100%">
<tr>
	 <td colspan="2">
	 	<fieldset id="name">
	 		<legend><?=lang('form_name');?></legend>
	 		<table>
	 			<tr>
	 				<form action="<?=site_url('user/profile'); ?>" method="post">
	 				<td width="150px"><?=lang('form_username');?></td>
	 				<td><input name="username" id="username" type="text" value="<?=$this->validation->username;?>" size="15" class="styled" disabled /> (<?=lang('form_username_cant_be_changed');?>)</td>
	 			</tr>
	 			<tr>
	 				<td width="150px"><?=lang('form_display_name');?></td>
	 				<td><input name="display_name" id="display_name" type="text" value="<?=$this->validation->display_name;?>" size="15" class="styled" /></td>
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
	 		<legend><?=lang('form_password');?></legend>
	 		<table>
	 			<tr>
	 				<td width="150px"><?=lang('form_password');?></td>
	 				<td><input name="password" id="password" type="password" size="15" class="styled" /></td>
	 			</tr>
	 			<tr>
	 				<td width="150px"><?=lang('form_retype_password');?></td>
	 				<td><input name="password_retype" id="password_retype" type="password" size="15" class="styled" /></td>
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
	 		<legend><?=lang('form_contact_info');?></legend>
	 		<table>
	 			<tr>
	 				<td width="150px"><?=lang('form_email');?></td>
	 				<td><input name="email" id="email" type="text" value="<?=$this->validation->email;?>" size="25" class="styled" /></td>
	 			</tr>
	 			<tr>
	 				<td width="150px"><?=lang('form_website');?></td>
	 				<td><input name="website" id="website" type="text" value="<?=$this->validation->website;?>" size="25" class="styled" /></td>
	 			</tr>
	 			<tr>
	 				<td width="150px"><?=lang('form_msn_messenger');?></td>
	 				<td><input name="msn_messenger" id="msn_messenger" type="text" value="<?=$this->validation->msn_messenger;?>" size="25" class="styled" /></td>
	 			</tr>
	 			<tr>
	 				<td width="150px"><?=lang('form_jabber');?></td>
	 				<td><input name="jabber" id="jabber" type="text" value="<?=$this->validation->jabber;?>" size="15" class="styled" /></td>
	 			</tr>
	 			<tr>
	 				<td width="150px" valign="top"><?=lang('form_about_me');?></td>
	 				<td><textarea name="about_me" id="about_me" rows="10" cols="40" class="styled"><?=$this->validation->about_me;?></textarea></td>
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
		<input type="submit" name="submit" value="<?=lang('edit');?>" />
		</form>
	</td>
</tr>
</table>