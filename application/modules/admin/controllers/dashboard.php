<?php

class Dashboard extends Controller
{
	// Protected or private properties
	protected $_template;
	
	// Constructor
	public function __construct()
	{
		parent::Controller();

		// Check if the logged user is an administrator
		$this->access_library->check_access();
		
		// Load needed models, libraries, helpers and language files
		$this->load->module_model('admin', 'information_model', 'information');
		
		$this->load->module_language('admin', 'dashboard');
	}

	// Public methods
	public function index()
	{
		$this->config->load('open_blog');
		
		$data['website_url']		= $this->config->item('website_url');
		$data['new_version'] 		= $this->information->check_for_upgrade();
		
		$this->_template['page']	= 'dashboard';		
			
		$this->system_library->load($this->_template['page'], $data, TRUE);
	}
}

/* End of file dashboard.php */
/* Location: ./application/modules/admin/controllers/dashboard.php */