<?php

class Settings extends Controller
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
		$this->load->module_language('admin', 'settings');
	}

	// Public methods
	public function index()
	{
		$this->load->module_model('admin', 'settings_model', 'settings');

		$this->form_validation->set_rules('blog_title', 'lang:form_blog_title', 'required');
		$this->form_validation->set_rules('blog_description', 'lang:form_blog_description', 'required');
		$this->form_validation->set_rules('meta_keywords', 'lang:form_meta_keywords', 'required');
		$this->form_validation->set_rules('admin_email', 'lang:form_admin_email', 'required|valid_email');
		$this->form_validation->set_rules('allow_registrations', 'lang:form_allow_registrations', 'numeric');
		$this->form_validation->set_rules('enable_captcha', 'lang:form_enable_captcha', 'numeric');
		$this->form_validation->set_rules('recognize_user_agent', 'lang:form_recognize_user_agent', 'numeric');
		$this->form_validation->set_rules('enabled', 'lang:form_enabled', 'numeric');
		$this->form_validation->set_rules('template', 'lang:form_template', 'required|numeric');
		$this->form_validation->set_rules('language', 'lang:form_language', 'required|numeric');
		$this->form_validation->set_rules('posts_per_page', 'lang:form_posts_per_page', 'required|numeric');
		$this->form_validation->set_rules('links_per_box', 'lang:form_links_per_box', 'required|numeric');
		$this->form_validation->set_rules('months_per_archive', 'lang:form_months_per_archive', 'required|numeric');
		$this->form_validation->set_rules('offline_reason', 'lang:form_offline_reason', '');
		
		if ($this->input->post('enabled') == 0)
		{
			$this->form_validation->set_rules('offline_reason', 'lang:form_offline_reason', 'required');
		}

		$this->form_validation->set_error_delimiters('', '<br />');
		
		$data['settings'] = $this->settings->get_settings();
		$data['templates'] = $this->settings->get_templates();
		$data['languages'] = $this->settings->get_languages();
		$data['settings']['template'] = $this->settings->get_default_template();
		$data['settings']['language'] = $this->settings->get_default_language();
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->settings->update_settings();
			$this->session->set_flashdata('message', lang('successfully_updated'));

			redirect('admin/settings', 'refresh');
		}
		
		$this->_template['page']	= 'settings/edit';

		$this->system_library->load($this->_template['page'], $data, TRUE);
	}
}

/* End of file settings.php */
/* Location: ./application/modules/admin/controllers/settings.php */