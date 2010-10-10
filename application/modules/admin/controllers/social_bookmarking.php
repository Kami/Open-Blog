<?php

class Social_bookmarking extends Controller
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
		$this->load->module_language('admin', 'general');
		$this->load->module_language('admin', 'social_bookmarking');
	}
	
	// Public methods
	public function index()
	{
		$this->load->module_model('admin', 'settings_model', 'settings');
			
		$this->form_validation->set_rules('enable_digg', 'lang:form_enable_digg', 'numeric');
		$this->form_validation->set_rules('enable_technorati', 'lang:form_enable_technorati', 'numeric');
		$this->form_validation->set_rules('enable_delicious', 'lang:form_enable_delicious', 'numeric');
		$this->form_validation->set_rules('enable_stumbleupon', 'lang:form_enable_stumbleupon', 'numeric');
		$this->form_validation->set_rules('enable_reddit', 'lang:form_enable_reddit', 'numeric');
		$this->form_validation->set_rules('enable_furl', 'lang:form_enable_furl', 'numeric');
		
		$this->form_validation->set_error_delimiters('', '<br />');
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->settings->update_social_bookmarking_settings();
			$this->session->set_flashdata('message', lang('successfully_updated'));

			redirect('admin/social_bookmarking', 'refresh');
		}

		$data['settings'] = $this->settings->get_settings();

		$this->_template['page']	= 'social_bookmarking/edit';

		$this->system_library->load($this->_template['page'], $data, TRUE);
	}
}

/* End of file social_bookmarking.php */
/* Location: ./application/modules/admin/controllers/social_bookmarking.php */