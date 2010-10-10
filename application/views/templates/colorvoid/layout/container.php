<? $this->load->module_language('blog', 'system'); ?> 
<? $this->system->check_site_status(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="<?=$this->system->settings['blog_description'];?>" />
<meta name="keywords" content="<?=$this->system->settings['meta_keywords'];?>" /> 
<title><?=$this->system->settings['blog_title'];?> - <?=$this->system->settings['blog_description'];?></title>
<link rel="stylesheet" href="<?=base_url();?>application/views/templates/colorvoid/static/style/main.css" type="text/css" media="screen" />
</head>
<body>
<div id="layout_wrapper">
<div id="layout_edgetop"></div>

<div id="layout_container">
	<div id="site_title">
		<? $this->load->view('templates/colorvoid/layout/header'); ?>
	</div>

	<div id="top_separator"></div>

	<div id="navigation">
		<div id="tabs">
			<? $this->load->view('templates/colorvoid/layout/menu/navigation'); ?>
		</div>
	</div>

	<div class="spacer h5"></div>
	<div id="main">
		<div class="left" id="main_left">
			<div id="main_left_content">
				<? $this->load->view('templates/colorvoid/layout/pages/' . $page); ?>
			</div>
		</div>
		
		<div class="right" id="main_right">
			<div id="sidebar">
				<? $this->load->module_language('blog', 'sidebar'); ?> 
				<? $this->load->view('templates/colorvoid/layout/menu/sidebar'); ?>
			</div>
		</div>
		<div class="clearer">&nbsp;</div>
	</div>
	
	<div id="footer">
		<? $this->load->module_language('blog', 'footer'); ?> 
		<? $this->load->view('templates/colorvoid/layout/footer'); ?>
	</div>
</div>
<div id="layout_edgebottom"></div>
</div>
</body>
</html>