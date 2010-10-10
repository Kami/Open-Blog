<?php $this->load->module_language('blog', 'system'); ?> 
<?php $this->system_library->check_site_status(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<meta name="description" content="<?php echo $this->system_library->settings['blog_description']; ?>" />
	<meta name="keywords" content="<?php echo $this->system_library->settings['meta_keywords']; ?>" /> 
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/templates/emplode/static/style/main.css" media="screen" />
	<script type="text/javascript" src="<?php echo base_url(); ?>application/views/admin/static/javascript/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>application/views/admin/static/javascript/main.js"></script>
	<title><?php echo $this->system_library->settings['blog_title']; ?> - <?php echo $this->system_library->settings['blog_description']; ?></title>
</head>

<body>

<div id="header">
	<div class="center_wrapper">
		<?php $this->load->view('templates/emplode/layout/header'); ?>
	</div>
</div>

<div id="navigation">
	<div class="center_wrapper">
		<?php $this->load->view('templates/emplode/layout/menu/navigation'); ?>
	</div>
</div>

<div id="main_wrapper_outer">
	<div id="main_wrapper_inner">
		<div class="center_wrapper">

			<div class="left" id="main">
				<div id="main_content">
					<?php $this->load->view('templates/emplode/layout/pages/' . $page); ?>	
				</div>
			</div>

			<div class="right" id="sidebar">
				<div id="sidebar_content">
					<?php $this->load->module_language('blog', 'sidebar'); ?> 
					<?php $this->load->view('templates/emplode/layout/menu/sidebar'); ?>
				</div>
			</div>
			
			<div class="clearer">&nbsp;</div>

		</div>
	</div>
</div>

<div id="footer">
	<div class="center_wrapper">
		<?php $this->load->module_language('blog', 'footer'); ?> 
		<?php $this->load->view('templates/emplode/layout/footer'); ?>
	</div>
</div>

</body>
</html>