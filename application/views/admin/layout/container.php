<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<title>
	<? $this->load->module_language('admin', 'header');?> 
	<?=$this->system_library->settings['blog_title'];?> - <?=lang('header_admin_panel');?>
</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>application/views/admin/static/style/main.css" media="screen"/>
<!--[if lt IE 7.]>
<script defer type="text/javascript" src="<?=base_url();?>application/views/admin/static/javascript/pngfix.js"></script>
<![endif]-->
<script type="text/javascript" src="<?php echo base_url(); ?>application/views/admin/static/javascript/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>application/views/admin/static/javascript/main.js"></script>
</head>
<body>
<div class="outer-container">
  <div class="inner-container">
    <div class="header">
		<? $this->load->view('admin/layout/header'); ?>
	</div>
    </div>
    <div class="top">
    	<? $this->load->module_language('admin', 'menu');?> 
   		<? $this->load->view('admin/layout/menu/top'); ?>
    </div>
    <div class="main">
      <div class="content">
      	<? $this->load->view('admin/layout/pages/' . $page); ?>
      </div>
      <div class="navigation">
     	<? $this->load->view('admin/layout/menu/navigation'); ?>
      </div>
      <div class="clearer">&nbsp;</div>
    </div>
    <div class="footer">
    	<? $this->load->module_language('admin', 'footer');?> 
    	<? $this->load->view('admin/layout/footer'); ?>
    </div>
  </div>
</div>
</body>
</html>
