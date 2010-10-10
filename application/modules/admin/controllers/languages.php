<?php

class Languages extends Controller
{
	// Protected or private properties
	protected $_template;
	
	// Constructor
	public function __construct()
	{
		parent::Controller();

		// Check if logged user is an administrator
		$this->access_library->check_access();

		// Load needed models, libraries, helpers and language files
		$this->load->module_model('admin', 'languages_model', 'languages');
		
		$this->load->module_language('admin', 'general');
		$this->load->module_language('admin', 'languages');
	}

	// Public methods
	public function index()
	{
		$data['languages'] = $this->languages->get_languages();

		$this->_template['page']	= 'languages/list';

		$this->system_library->load($this->_template['page'], $data, TRUE);
	}
}

/* End of file languages.php */
/* Location: ./application/modules/admin/controllers/languages.php */