<?php

class Feeds extends Controller
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
		$this->load->module_language('admin', 'feeds');
	}

	// Public methods
	public function index()
	{
		$this->load->module_model('admin', 'settings_model', 'settings');
			
		$this->form_validation->set_rules('enable_rss_posts', 'lang:form_enable_rss_posts', 'numeric');
		$this->form_validation->set_rules('enable_rss_comments', 'lang:form_enable_rss_comments', 'numeric');
		$this->form_validation->set_rules('enable_atom_posts', 'lang:form_enable_atom_posts', 'numeric');
		$this->form_validation->set_rules('enable_atom_comments', 'lang:form_enable_atom_comments', 'numeric');
		
		$this->form_validation->set_error_delimiters('', '<br />');
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->settings->update_feed_settings();
			$this->session->set_flashdata('message', lang('successfully_updated'));

			redirect('admin/feeds', 'refresh');
		}

		$data['settings'] = $this->settings->get_settings();

		$this->_template['page']	= 'feeds/edit';

		$this->system_library->load($this->_template['page'], $data, TRUE);
	}
}

/* End of file feeds.php */
/* Location: ./application/modules/admin/controllers/feeds.php */