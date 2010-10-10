<?php $this->load->module_language('blog', 'system'); ?> 
<?php $this->system_library->check_site_status(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="<?php echo $this->system_library->settings['blog_description']; ?>" />
<meta name="keywords" content="<?php echo $this->system_library->settings['meta_keywords']; ?>" /> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/mobile/static/style/main.css" media="screen"/>
<title><?php echo $this->system_library->settings['blog_title']; ?> - <?php echo $this->system_library->settings['blog_description']; ?></title>
</head>
<body>
<div id="header">
	<?php $this->load->view('mobile/layout/header'); ?>
</div>
<div id="main_navigation"><?php $this->load->view('mobile/layout/menu/navigation'); ?></div>

<?php $this->load->view('mobile/layout/pages/' . $page); ?>

<div class="footer">
	<?php $this->load->module_language('blog', 'footer'); ?> 
	<?php $this->load->view('mobile/layout/footer'); ?>
</div>
</body>
</html>