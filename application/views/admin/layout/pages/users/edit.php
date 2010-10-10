<div class="post">
		<div class="post_title">
			<h1><?=lang('edit_user');?></h1>
		</div>
		<div class="post_body">
			<p><?=lang('edit_user_description');?></p>
			
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
					 				<?=form_open('admin/users/edit');?>
					 				<td width="200px"><?=lang('form_username');?></td>
					 				<td><?=form_input(array('name' => 'username', 'id' => 'username', 'size' => '15', 'class' => 'styled', 'value' => $this->validation->username), null, 'disabled');?> (<?=lang('form_username_cant_be_changed');?>)</td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?=lang('form_display_name');?></td>
					 				<td><?=form_input(array('name' => 'display_name', 'id' => 'display_name', 'size' => '15', 'class' => 'styled', 'value' => $this->validation->display_name));?></td>
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
					 		<legend><?=lang('form_level');?></legend>
					 		<table>
					 			<tr>
					 				<td width="200px"><?=lang('form_level');?></td>
					 				<td><?=form_dropdown('level', array('user' => 'User', 'administrator' => 'Administrator'), $this->validation->level);?></td>
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
					 		<legend><?=lang('form_contact_info');?></legend>
					 		<table>
					 			<tr>
					 				<td width="200px"><?=lang('form_email');?></td>
					 				<td><?=form_input(array('name' => 'email', 'id' => 'email', 'size' => '25', 'class' => 'styled', 'value' => $this->validation->email));?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?=lang('form_website');?></td>
					 				<td><?=form_input(array('name' => 'website', 'id' => 'website', 'size' => '25', 'class' => 'styled', 'value' => $this->validation->website));?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?=lang('form_msn_messenger');?></td>
					 				<td><?=form_input(array('name' => 'msn_messenger', 'id' => 'msn_messenger', 'size' => '25', 'class' => 'styled', 'value' => $this->validation->msn_messenger));?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px"><?=lang('form_jabber');?></td>
					 				<td><?=form_input(array('name' => 'jabber', 'id' => 'jabber', 'size' => '15', 'class' => 'styled', 'value' => $this->validation->jabber));?></td>
					 			</tr>
					 			<tr>
					 				<td width="200px" valign="top"><?=lang('form_about_me');?></td>
					 				<td><?=form_textarea(array('name' => 'about_me', 'id' => 'about_me', 'rows' => '10', 'cols' => '80', 'class' => 'styled', 'value' => $this->validation->about_me));?></td>
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
						<?=form_hidden('id', $user['id']) ?>
						<input type="submit" name="submit" value="<?=lang('button_edit');?>" class="styled" />
						<?=form_close();?>
					</td>
				</tr>
				</table>
		</div>
</div>