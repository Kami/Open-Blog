<?php $this->load->module_language('blog', 'system'); ?> 
<?php $this->system_library->check_site_status(); ?>

<?php $this->load->view('iphone/layout/pages/' . $page); ?>