<?php $this->load->module_language('blog', 'system'); ?> 
<?php $this->system_library->check_site_status(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="<?php echo $this->system_library->settings['blog_description']; ?>" />
<meta name="keywords" content="<?php echo $this->system_library->settings['meta_keywords']; ?>" /> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/templates/beautiful_day/static/style/main.css" media="screen"/>
<script type="text/javascript" src="<?php echo base_url(); ?>application/views/admin/static/javascript/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>application/views/admin/static/javascript/main.js"></script>
<title><?php echo $this->system_library->settings['blog_title']; ?> - <?php echo $this->system_library->settings['blog_description']; ?></title>
</head>
<body>
<div class="top">
	<div class="header">
		<?php $this->load->view('templates/beautiful_day/layout/header'); ?>
	</div>	
</div>
<div class="container">	
	<div class="navigation">
		<?php $this->load->view('templates/beautiful_day/layout/menu/navigation'); ?>
	</div>

	<div class="main">	
		<div class="content">
			<?php $this->load->view('templates/beautiful_day/layout/pages/' . $page); ?>
		</div>

		<div class="sidenav">
			<?php $this->load->module_language('blog', 'sidebar'); ?> 
			<?php $this->load->view('templates/beautiful_day/layout/menu/sidebar'); ?>
		</div>

		<div class="clearer"></div>
	</div>

	<div class="footer">
		<?php $this->load->module_language('blog', 'footer'); ?> 
		<?php $this->load->view('templates/beautiful_day/layout/footer'); ?>
	</div>
</div>
</body>
</html>