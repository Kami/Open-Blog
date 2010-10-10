<? $this->load->module_language('blog', 'system'); ?> 
<? $this->system->check_site_status(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="description" content="<?=$this->system->settings['blog_description'];?>" />
<meta name="keywords" content="<?=$this->system->settings['meta_keywords'];?>" /> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/templates/natural_essence/static/style/main.css" media="screen"/>
<title><?=$this->system->settings['blog_title'];?> - <?=$this->system->settings['blog_description'];?></title>
</head>
<body>
<div id="wrapper">
	<div id="container">
		<div class="title">
			<? $this->load->view('templates/natural_essence/layout/header'); ?>
		</div>
		
		<div class="header"></div>
		
		<div class="navigation">
			<? $this->load->view('templates/natural_essence/layout/menu/navigation'); ?>
		</div>
		
		<div class="main" id="two-columns">
			<div class="col2">
				<div class="left">
					<div class="content">
						<? $this->load->view('templates/natural_essence/layout/pages/' . $page); ?>
					</div>
				</div>
		
				<div class="right">
					<div class="content">
						<? $this->load->module_language('blog', 'sidebar'); ?> 
						<? $this->load->view('templates/natural_essence/layout/menu/sidebar'); ?>
					</div>
				</div>
				<div class="clearer"></div>
			</div>
		
			<div class="footer">
				<? $this->load->module_language('blog', 'footer'); ?> 
				<? $this->load->view('templates/natural_essence/layout/footer'); ?>
			</div>
		</div>
	</div>
</div>
</body>
</html>