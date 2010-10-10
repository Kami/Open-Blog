<? if ($this->session->userdata('logged_in') == false): ?>
	<li><a href="<?=site_url('user/login');?>"><?=lang('other_login');?></a></li>
	<li><a href="<?=site_url('user/register');?>"><?=lang('other_register');?></a></li>
<? else: ?>
	<? if ($this->session->userdata('level') == "administrator"): ?>
		<li><a href="<?=site_url('admin/dashboard');?>"><?=lang('other_admin_panel');?></a></li>
	<? endif; ?>
	<li><a href="<?=site_url('user/view/' . $this->session->userdata('username'));?>"><?=lang('other_view_profile');?></a></li>
	<li><a href="<?=site_url('user/profile');?>"><?=lang('other_edit_profile');?></a></li>
	<li><a href="<?=site_url('user/logout');?>"><?=lang('other_logout');?></a></li>
<? endif; ?>
<li><a href="http://www.open-blog.info" target="_blank">open-blog.info</a></li>