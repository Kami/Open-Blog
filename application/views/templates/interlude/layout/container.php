<? $this->load->module_language('blog', 'system'); ?> 
<? $this->system->check_site_status(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="<?=$this->system->settings['blog_description'];?>" />
<meta name="keywords" content="<?=$this->system->settings['meta_keywords'];?>" /> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/templates/interlude/static/style/main.css" media="screen"/>
<title><?=$this->system->settings['blog_title'];?> - <?=$this->system->settings['blog_description'];?></title>
</head>
<body>
<div id="header">
	<div id="logo">
		<? $this->load->view('templates/interlude/layout/header'); ?>
	</div>
	<div id="menu">
		<? $this->load->view('templates/interlude/layout/menu/navigation'); ?>
	</div>
</div>
<hr />

<div id="wrapper">
	<div id="page">

		<div id="content">
			<? $this->load->view('templates/interlude/layout/pages/' . $page); ?>
		</div>

		<div id="sidebar">
			<? $this->load->module_language('blog', 'sidebar'); ?> 
			<? $this->load->view('templates/interlude/layout/menu/sidebar'); ?>
		</div>

		<br style="clear: both;" />
	</div>
</div>

<div id="wrapper2">
	<p id="legal">
		<? $this->load->module_language('blog', 'footer'); ?> 
		<? $this->load->view('templates/interlude/layout/footer'); ?>
	 </p>
</div>
</body>
</html>
