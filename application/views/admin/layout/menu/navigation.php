<h2><?php echo lang('nav_administration');?></h2>
<ul>
	<li><?php echo anchor('admin/dashboard', lang('nav_dashboard'));?></li>
	<li><?php echo anchor('admin/settings', lang('nav_settings'));?></li>
	<li><?php echo anchor('admin/templates', lang('nav_templates'));?></li>
	<li><?php echo anchor('admin/sidebar', lang('nav_sidebar'));?></li>
	<li><?php echo anchor('admin/languages', lang('nav_languages'));?></li>
	<li><?php echo anchor('admin/feeds', lang('nav_feeds'));?></li>
	<li><?php echo anchor('admin/social_bookmarking', lang('nav_bookmarking'));?></li>
	<li><?php echo anchor('admin/backup', lang('nav_database_backup'));?></li>
</ul>
<h2><?php echo lang('nav_posts');?></h2>
<ul>
	<li><?php echo anchor('admin/posts/create', lang('nav_new_post'));?></li>
	<li><?php echo anchor('admin/posts', lang('nav_manage_posts'));?></li>
</ul>
<h2><?php echo lang('nav_pages');?></h2>
<ul>
	<li><?php echo anchor('admin/pages/create', lang('nav_new_page'));?></li>
	<li><?php echo anchor('admin/pages', lang('nav_manage_pages'));?></li>
</ul>
<h2><?php echo lang('nav_navigation');?></h2>
<ul>
	<li><?php echo anchor('admin/navigation/create', lang('nav_new_item'));?></li>
	<li><?php echo anchor('admin/navigation', lang('nav_manage_navigation'));?></li>
</ul>
<h2><?php echo lang('nav_links');?></h2>
<ul>
	<li><?php echo anchor('admin/links/create', lang('nav_new_link'));?></li>
	<li><?php echo anchor('admin/links', lang('nav_manage_links'));?></li>
</ul>
<h2><?php echo lang('nav_categories');?></h2>
<ul>
	<li><?php echo anchor('admin/categories/create', lang('nav_new_category'));?></li>
	<li><?php echo anchor('admin/categories', lang('nav_manage_categories'));?></li>
</ul>
<h2><?php echo lang('nav_comments');?></h2>
<ul>
	<li><?php echo anchor('admin/comments', lang('nav_manage_comments'));?></li>
</ul>
<h2><?php echo lang('nav_users');?></h2>
<ul>
	<li><?php echo anchor('user/profile', lang('nav_my_profile'));?></li>
	<li><?php echo anchor('admin/users', lang('nav_manage_users'));?></li>
</ul>