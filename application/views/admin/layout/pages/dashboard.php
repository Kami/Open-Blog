<h1><?=lang('dashboard');?></h1>

<p><?=lang('dashboard_description');?></p>
	<table class="dashboard">
	  <tr>
	    <td><img src="<?=base_url();?>application/views/admin/static/images/icons/settings.png" border="0"><br /><?=anchor('admin/settings', lang('settings'));?></td>
	    <td><img src="<?=base_url();?>application/views/admin/static/images/icons/templates.png" border="0"><br /><?=anchor('admin/templates', lang('templates'));?></td>
	    <td><img src="<?=base_url();?>application/views/admin/static/images/icons/categories.png" border="0"><br /><?=anchor('admin/categories', lang('categories'));?></td>
	    <td><img src="<?=base_url();?>application/views/admin/static/images/icons/feeds.png" border="0"><br /><?=anchor('admin/feeds', lang('feeds'));?></td>
	  </tr>
	  <tr>
	   	<td><img src="<?=base_url();?>application/views/admin/static/images/icons/posts.png" border="0"><br /><?=anchor('admin/posts', lang('posts'));?></td>
	   	<td><img src="<?=base_url();?>application/views/admin/static/images/icons/comments.png" border="0"><br /><?=anchor('admin/comments', lang('comments'));?></td>
	    <td><img src="<?=base_url();?>application/views/admin/static/images/icons/pages.png" border="0"><br /><?=anchor('admin/pages', lang('pages'));?></td>
	    <td><img src="<?=base_url();?>application/views/admin/static/images/icons/users.png" border="0"><br /><?=anchor('admin/users', lang('users'));?></td>
	  </tr>
	  <tr>
	  	<td><img src="<?=base_url();?>application/views/admin/static/images/icons/navigation.png" border="0"><br /><?=anchor('admin/navigation', lang('navigation'));?></td>
	  	<td><img src="<?=base_url();?>application/views/admin/static/images/icons/links.png" border="0"><br /><?=anchor('admin/links', lang('links'));?></td>
	    <td><img src="<?=base_url();?>application/views/admin/static/images/icons/database.png" border="0"><br /><?=anchor('admin/backup', lang('database_backup'));?></td>
	    <td><img src="<?=base_url();?>application/views/admin/static/images/icons/info.png" border="0"><br /><?=anchor('admin/information/upgrade_check', lang('information'));?></td>
	  </tr>
	</table>