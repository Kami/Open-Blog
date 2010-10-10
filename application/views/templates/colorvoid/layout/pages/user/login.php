<div class="post">
		<div class="post_title">
			<h1><?=lang('login');?></h1>
		</div>
		<div class="post_body">
			<p>
				<div class="login">
					<? if($this->session->flashdata('message')): ?>
					<div class="message">
						<?=$this->session->flashdata('message');?>
					</div>
					<? endif; ?>
					
					<? if($this->session->flashdata('error')): ?>
					<div class="error">
						<?=$this->session->flashdata('error');?>
					</div>
					<? endif; ?>
					
					<table class="login">
						<form action="<?=site_url('user/login'); ?>" method="post">	
							<tr><td><?=lang('form_username');?></td> <td><input name="username" id="username" type="text" size="15" class="styled" /></td></tr>
							<tr><td><?=lang('form_password');?></td> <td><input name="password" id="password" type="password" size="15" class="styled" /></td></tr>
							<tr><td colspan="2" class="login"><input type="submit" name="login" id="login" value="<?=lang('button_login');?>" class="login" /></td></tr>
						</form>
					</table>
				</div>
			</p>
		</div>
</div>