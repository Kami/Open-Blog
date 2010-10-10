<h2><?php echo lang('other');?></h2>
<ul>
	<?php if ($this->session->userdata('logged_in') == false): ?>
		<li><a href="<?php echo site_url('user/login'); ?>"><?php echo lang('other_login'); ?></a></li>
		<li><a href="<?php echo site_url('user/register'); ?>"><?php echo lang('other_register'); ?></a></li>
	<?php else: ?>
		<?php if ($this->session->userdata('level') == "administrator"): ?>
			<li><a href="<?php echo site_url('admin/dashboard'); ?>"><?php echo lang('other_admin_panel'); ?></a></li>
		<?php endif; ?>
		<li><a href="<?php echo site_url('user/view/' . $this->session->userdata('username')); ?>"><?php echo lang('other_view_profile'); ?></a></li>
		<li><a href="<?php echo site_url('user/profile'); ?>"><?php echo lang('other_edit_profile'); ?></a></li>
		<li><a href="<?php echo site_url('user/logout'); ?>"><?php echo lang('other_logout'); ?></a></li>
	<?php endif; ?>
	<li><a href="http://www.open-blog.info" target="_blank">open-blog.info</a></li>
</ul>