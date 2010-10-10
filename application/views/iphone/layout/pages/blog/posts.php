<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="<?php echo $this->system_library->settings['blog_description']; ?>" />
<meta name="keywords" content="<?php echo $this->system_library->settings['meta_keywords']; ?>" /> 
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/iphone/static/style/iui.css" media="screen"/>
<script type="application/x-javascript" src="<?php echo base_url(); ?>application/views/iphone/static/javascript/iui.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/iphone/static/style/main.css" media="screen"/>
<title><?php echo $this->system_library->settings['blog_title']; ?> - <?php echo $this->system_library->settings['blog_description']; ?></title>
</head>
<body>
	<?php $this->load->view('iphone/layout/header'); ?>
	
	<ul selected="true">
    <li class="group"><?php echo lang('recent_posts'); ?></li>
    	<?php foreach ($posts as $post): ?>
	        <li>
	        <a href="<?php echo post_url($post['url_title'], $post['date_posted']); ?>"><?php echo $post['title']; ?></a>
	        </li>
		<?php endforeach; ?>
    <li class="group"><?php echo lang('pages'); ?></li>
	    <?php if ($this->pages_library->get_pages()): ?>
			<?php foreach ($this->pages_library->get_pages() as $page): ?>
				<li><a href="<?php echo page_url($page['url_title']); ?>" title="<?php echo $page['title']; ?>"><?php echo $page['title']; ?></a></li>
			<?php endforeach; ?>
		<?php endif; ?>		
    <li class="group"><?php echo lang('categories'); ?></li>
   		<?php if ($this->categories_library->get_categories()): ?>
			<?php foreach ($this->categories_library->get_categories() as $category): ?>
				<li><a href="<?php echo category_url($category['url_name']); ?>"> <?php echo $category['name']; ?> (<?php echo $category['posts_count']; ?>)</a></li>
			<?php endforeach; ?>
		<?php endif; ?>
    </ul>
</body>
</html>