<h1><?php echo lang('dashboard'); ?></h1>

<p><?php echo lang('dashboard_description'); ?></p>
	<?php if ($new_version == 3): ?>
		<div class="error">
			<?php echo lang('important_upgrade', array($website_url)); ?>
		</div>
	<?php endif; ?>
	
	<table class="dashboard">
	  <tr>
	    <td><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/settings.png" border="0"><br /><?php echo anchor('admin/settings', lang('settings')); ?></td>
	    <td><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/templates.png" border="0"><br /><?php echo anchor('admin/templates', lang('templates')); ?></td>
	    <td><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/sidebar.png" border="0"><br /><?php echo anchor('admin/sidebar', lang('sidebar')); ?></td>
	    <td><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/languages.png" border="0"><br /><?php echo anchor('admin/languages', lang('languages')); ?></td>
	  </tr>
	  <tr>
	  	<td><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/feeds.png" border="0"><br /><?php echo anchor('admin/feeds', lang('feeds')); ?></td>
	    <td><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/social_bookmarking.png" border="0"><br /><?php echo anchor('admin/social_bookmarking', lang('social_bookmarking')); ?></td>
	  	<td><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/categories.png" border="0"><br /><?php echo anchor('admin/categories', lang('categories')); ?></td>
	   	<td><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/posts.png" border="0"><br /><?php echo anchor('admin/posts', lang('posts')); ?></td>
	  </tr>
	  <tr>
	   	<td><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/comments.png" border="0"><br /><?php echo anchor('admin/comments', lang('comments')); ?></td>
	    <td><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/pages.png" border="0"><br /><?php echo anchor('admin/pages', lang('pages')); ?></td>
	  	<td><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/users.png" border="0"><br /><?php echo anchor('admin/users', lang('users')); ?></td>
	  	<td><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/navigation.png" border="0"><br /><?php echo anchor('admin/navigation', lang('navigation')); ?></td>
	  <tr>
	  	<td><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/links.png" border="0"><br /><?php echo anchor('admin/links', lang('links')); ?></td>
	  	<td><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/database.png" border="0"><br /><?php echo anchor('admin/backup', lang('database_backup')); ?></td>
	  	<td><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/statistics.png" border="0"><br /><?php echo anchor('admin/statistics', lang('statistics')); ?></td>
	  	<td><img src="<?php echo base_url(); ?>application/views/admin/static/images/icons/info.png" border="0"><br /><?php echo anchor('admin/information', lang('information')); ?></td>
	  </tr>
	</table>