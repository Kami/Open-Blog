<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<title>
	<?php $this->load->module_language('admin', 'header'); ?> 
	<?php echo $this->system_library->settings['blog_title']; ?> - <?php echo lang('header_admin_panel'); ?>
</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/admin/static/style/main.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/admin/static/style/date_picker.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/admin/static/style/tooltips.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/admin/static/style/jquery.cluetip.css" media="screen"/>
<!--[if lt IE 7.]>
<script defer type="text/javascript" src="<?php echo base_url(); ?>application/views/admin/static/javascript/pngfix.js"></script>
<![endif]-->
<script type="text/javascript" src="<?php echo base_url(); ?>application/views/admin/static/javascript/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>application/views/admin/static/javascript/date.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>application/views/admin/static/javascript/jquery.datePicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>application/views/admin/static/javascript/jquery.dimensions.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>application/views/admin/static/javascript/jquery.cluetip.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>application/views/admin/static/javascript/main.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>application/views/admin/static/javascript/dates.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>application/views/admin/static/javascript/tooltips.js"></script>
</head>
<body>
<div class="outer-container">
  <div class="inner-container">
    <div class="header">
		<?php $this->load->view('admin/layout/header'); ?>
	</div>
    </div>
    <div class="top">
    	<?php $this->load->module_language('admin', 'menu');?> 
   		<?php $this->load->view('admin/layout/menu/top'); ?>
    </div>
    <div class="main">
      <div class="content">
      	<?php $this->load->view('admin/layout/pages/' . $page); ?>
      </div>
      <div class="navigation">
     	<?php $this->load->view('admin/layout/menu/navigation'); ?>
      </div>
      <div class="clearer">&nbsp;</div>
    </div>
    <div class="footer">
    	<?php $this->load->module_language('admin', 'footer');?> 
    	<?php $this->load->view('admin/layout/footer'); ?>
    </div>
  </div>
</div>
</body>
</html>
