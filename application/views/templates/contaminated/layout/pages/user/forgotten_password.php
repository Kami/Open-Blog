<h2><?php echo lang('forgotten_password'); ?></h2>
<p><?php echo lang('forgotten_password_description'); ?></p>
	
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
		 	<fieldset id="password">
		 		<legend><?php echo lang('forgotten_password'); ?></legend>
		 		<table>
		 			<tr>
		 				<form action="<?=site_url('user/forgotten_password'); ?>" method="post">
		 				<td width="150px"><?php echo lang('form_username'); ?></td>
		 				<td><input name="username" id="username" type="text" value="<?php echo set_value('username'); ?>" size="15" class="styled" /> <font color="red">*</font></td>
		 			</tr>
		 			<tr>
		 				<td width="150px"><?php echo lang('form_email'); ?></td>
		 				<td><input name="email" id="email" type="text" value="<?php echo set_value('email'); ?>" size="25" class="styled" /> <font color="red">*</font></td>
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
			<input type="submit" name="submit" value="<?php echo lang('send'); ?>" />
			</form>
		</td>
	</tr>
	</table>