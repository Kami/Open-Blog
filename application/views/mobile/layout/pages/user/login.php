<div class="post" id="post">
	<h2><?php echo lang('login'); ?></h2>
	<div class="entry">
	<br />
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
		</table>
	</div>
</div>

