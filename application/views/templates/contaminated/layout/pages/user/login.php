<h2><?php echo lang('login'); ?></h2>
<div class="login">
	<?php if($this->session->flashdata('message')): ?>
	<div class="message">
		<?php echo $this->session->flashdata('message'); ?>
	</div>
	<?php endif; ?>
	
	<?php if($this->session->flashdata('error')): ?>
	<div class="error">
		<?php echo $this->session->flashdata('error'); ?>
	</div>
	<?php endif; ?>
	
	<table class="login">
		<form action="<?php echo site_url('user/login'); ?>" method="post">	
			<tr><td><?php echo lang('form_username'); ?></td> <td><input name="username" id="username" type="text" size="15" class="styled" /></td></tr>
			<tr><td><?php echo lang('form_password'); ?></td> <td><input name="password" id="password" type="password" size="15" class="styled" /></td></tr>
			<tr><td colspan="2" class="login"><input type="submit" name="login" id="login" value="<?php echo lang('button_login'); ?>" class="login" /></td></tr>
		</form>
	</table><br />
	<p align="center"><a href="<?php echo site_url('user/register'); ?>"><?php echo lang('register'); ?></a> | <a href="<?php echo site_url('user/forgotten_password'); ?>"><?php echo lang('forgotten_password'); ?></a></p>
</div>