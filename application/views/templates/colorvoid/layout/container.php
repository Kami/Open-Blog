<?php $this->load->module_language('blog', 'system'); ?> 
<?php $this->system_library->check_site_status(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="<?php echo $this->system_library->settings['blog_description']; ?>" />
<meta name="keywords" content="<?php echo $this->system_library->settings['meta_keywords']; ?>" /> 
<title>
	<?php if (isset($post['title'])): ?>
		<?php echo $post['title']; ?> 
	<?php elseif (isset($page_data['title'])): ?>
		<?php echo $page_data['title']; ?> 
	<?php else: ?>
		<?php echo $this->system_library->settings['blog_title']; ?> - <?php echo $this->system_library->settings['blog_description']; ?>
	<?php  endif; ?>
</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>application/views/templates/colorvoid/static/style/main.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo base_url(); ?>application/views/admin/static/javascript/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>application/views/admin/static/javascript/main.js"></script>
</head>
<body>
<div id="layout_wrapper">
<div id="layout_edgetop"></div>

<div id="layout_container">
	<div id="site_title">
		<?php $this->load->view('templates/colorvoid/layout/header'); ?>
	</div>

	<div id="top_separator"></div>

	<div id="navigation">
		<div id="tabs">
			<?php $this->load->view('templates/colorvoid/layout/menu/navigation'); ?>
		</div>
	</div>

	<div class="spacer h5"></div>
	<div id="main">
		<div class="left" id="main_left">
			<div id="main_left_content">
				<?php $this->load->view('templates/colorvoid/layout/pages/' . $page); ?>
			</div>
		</div>
		
		<div class="right" id="main_right">
			<div id="sidebar">
				<?php $this->load->module_language('blog', 'sidebar'); ?> 
				<?php $this->load->view('templates/colorvoid/layout/menu/sidebar'); ?>
			</div>
		</div>
		<div class="clearer">&nbsp;</div>
	</div>
	
	<div id="footer">
		<?php $this->load->module_language('blog', 'footer'); ?> 
		<?php $this->load->view('templates/colorvoid/layout/footer'); ?>
	</div>
</div>
<div id="layout_edgebottom"></div>
</div>
</body>
</html>