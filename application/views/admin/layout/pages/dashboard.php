<h1><?php echo lang('dashboard'); ?></h1>

<p><?php echo lang('dashboard_description'); ?></p>
	<?php if ($new_version == 3): ?>
		<div class="error">
			<?php echo lang('important_upgrade', array($website_url)); ?>
		</div>
	<?php endif; ?>
	
	<table class="dashboard">
	  <tr>
	    <td><a href="<?php echo site_url('admin/settings'); ?>"><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/settings.png" class="dashboard"><?php echo lang('settings'); ?></a></td>
	    <td><a href="<?php echo site_url('admin/templates'); ?>"><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/templates.png" class="dashboard"><?php echo lang('templates'); ?></td>
	    <td><a href="<?php echo site_url('admin/sidebar'); ?>"><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/sidebar.png" class="dashboard"><?php echo lang('sidebar'); ?></td>
	    <td><a href="<?php echo site_url('admin/languages'); ?>"><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/languages.png" class="dashboard"><?php echo lang('languages'); ?></td>
	  </tr>
	  <tr>
	  	<td><a href="<?php echo site_url('admin/feeds'); ?>"><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/feeds.png" class="dashboard"><?php echo lang('feeds'); ?></td>
	    <td><a href="<?php echo site_url('admin/social_bookmarking'); ?>"><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/social_bookmarking.png" class="dashboard"><?php echo  lang('social_bookmarking'); ?></td>
	  	<td><a href="<?php echo site_url('admin/categories'); ?>"><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/categories.png" class="dashboard"><?php echo lang('categories'); ?></td>
	   	<td><a href="<?php echo site_url('admin/posts'); ?>"><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/posts.png" class="dashboard"><?php echo lang('posts'); ?></td>
	  </tr>
	  <tr>
	   	<td><a href="<?php echo site_url('admin/comments'); ?>"><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/comments.png" class="dashboard"><?php echo lang('comments'); ?></td>
	    <td><a href="<?php echo site_url('admin/pages'); ?>"><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/pages.png" class="dashboard"><?php echo lang('pages'); ?></td>
	  	<td><a href="<?php echo site_url('admin/users'); ?>"><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/users.png" class="dashboard"><?php echo lang('users'); ?></td>
	  	<td><a href="<?php echo site_url('admin/navigation'); ?>"><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/navigation.png" class="dashboard"><?php echo lang('navigation'); ?></td>
	  <tr>
	  	<td><a href="<?php echo site_url('admin/links'); ?>"><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/links.png" class="dashboard"><?php echo lang('links'); ?></td>
	  	<td><a href="<?php echo site_url('admin/backup'); ?>"><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/database.png" class="dashboard"><?php echo lang('database_backup'); ?></td>
	  	<td><a href="<?php echo site_url('admin/statistics'); ?>"><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/statistics.png" class="dashboard"><?php echo lang('statistics'); ?></td>
	  	<td><a href="<?php echo site_url('admin/information'); ?>"><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/info.png" class="dashboard"><?php echo lang('information'); ?></td>
	  </tr>
	</table>