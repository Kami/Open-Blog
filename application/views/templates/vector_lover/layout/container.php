<?php $this->load->module_language('blog', 'system'); ?> 
<?php $this->system_library->check_site_status(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>
	<?php if (isset($post['title'])): ?>
		<?php echo $post['title']; ?> 
	<?php elseif (isset($page_data['title'])): ?>
		<?php echo $page_data['title']; ?> 
	<?php else: ?>
		<?php echo $this->system_library->settings['blog_title']; ?> - <?php echo $this->system_library->settings['blog_description']; ?>
	<?php  endif; ?>
</title>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
<meta name="description" content="<?php echo $this->system_library->settings['blog_description']; ?>" />
<meta name="keywords" content="<?php echo $this->system_library->settings['meta_keywords']; ?>" /> 
<link rel="stylesheet" href="<?php echo base_url(); ?>application/views/templates/vector_lover/static/style/main.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo base_url(); ?>application/views/admin/static/javascript/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>application/views/admin/static/javascript/main.js"></script>
</head>
<body>
<!-- wrap starts here -->
<div id="wrap">

	<div id="header">			
		<?php $this->load->view('templates/vector_lover/layout/header'); ?>				
	</div>

	<div  id="nav">
		<?php $this->load->view('templates/colorvoid/layout/menu/navigation'); ?>
	</div>
	
	<div id="content">
		<div id="main">
			<?php $this->load->view('templates/vector_lover/layout/pages/' . $page); ?>			
		</div>
				
		<div id="sidebar">
			<?php $this->load->module_language('blog', 'sidebar'); ?> 
			<?php $this->load->view('templates/vector_lover/layout/menu/sidebar'); ?>	
		</div>		

	</div>
	
	<div id="footer">
		<?php $this->load->module_language('blog', 'footer'); ?>
		<?php $this->load->view('templates/vector_lover/layout/footer'); ?>
	</div>
</div>
</body>
</html>
