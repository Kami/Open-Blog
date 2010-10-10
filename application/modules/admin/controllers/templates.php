<?php

class Templates extends Controller
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
		$this->load->module_language('admin', 'templates');
	}

	// Public methods
	public function index()
	{
		$this->load->module_model('admin', 'settings_model', 'settings');

		$this->form_validation->set_rules('template', 'lang:form_template', 'required|numeric');

		$this->form_validation->set_error_delimiters('', '<br />');
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->settings->set_default_template();
			$this->session->set_flashdata('message', lang('successfully_set'));
				
			redirect('admin/templates', 'refresh');
		}
		
		$data['templates'] = $this->settings->get_templates_detaill();
		$data['default_template'] = $this->settings->get_default_template();
		
		foreach ($data['templates'] as $key => $template)
		{
			if ($template['is_default'] == 1)
				$data['templates'][$key]['checked'] = TRUE;
			else
				$data['templates'][$key]['checked'] = FALSE;
		}

		$this->_template['page']	= 'templates/edit';

		$this->system_library->load($this->_template['page'], $data, TRUE);
	}
}

/* End of file templates.php */
/* Location: ./application/modules/admin/controllers/templates.php */