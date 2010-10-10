<?php

class Links extends Controller
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
		$this->load->module_model('admin', 'links_model', 'links');
		
		$this->load->module_language('admin', 'general');
		$this->load->module_language('admin', 'links');
	}

	// Public methods
	public function index()
	{
		$data['links'] = $this->links->get_links();

		$this->_template['page']	= 'links/list';

		$this->system_library->load($this->_template['page'], $data, TRUE);
	}

	public function create()
	{
		$this->form_validation->set_rules('name', 'lang:form_name', 'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('url', 'lang:form_url', 'required|xss_clean');
		$this->form_validation->set_rules('target', 'lang:form_target', 'required|xss_clean');
		$this->form_validation->set_rules('description', 'lang:form_description', 'required|max_length[100]|xss_clean');
		$this->form_validation->set_rules('visible', 'lang:form_visible', 'required|xss_clean');

		$this->form_validation->set_error_delimiters('', '<br />');
			
		if ($this->form_validation->run() == TRUE)
		{
			$this->links->create_link();
			$this->session->set_flashdata('message', lang('successfully_created'));

			redirect('admin/links', 'refresh');
		}
			
		$this->_template['page']	= 'links/create';
			
		$this->system_library->load($this->_template['page'], null, TRUE);
	}

	public function edit($id = null)
	{
		if ($id == null)
		{
			$id = $this->input->post('id');
		}
			
		$this->form_validation->set_rules('name', 'lang:form_name', 'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('url', 'lang:form_url', 'required|xss_clean');
		$this->form_validation->set_rules('target', 'lang:form_target', 'required|xss_clean');
		$this->form_validation->set_rules('description', 'lang:form_description', 'required|max_length[100]|xss_clean');
		$this->form_validation->set_rules('visible', 'lang:form_visible', 'required|xss_clean');

		$this->form_validation->set_error_delimiters('', '<br />');
			
		$data['link'] = $this->links->get_link($id);
			
		if ($this->form_validation->run() == TRUE)
		{
			$this->links->edit_link($id);
			$this->session->set_flashdata('message', lang('successfully_edited'));

			redirect('admin/links', 'refresh');
		}
		
		$this->_template['page']	= 'links/edit';
			
		$this->system_library->load($this->_template['page'], $data, TRUE);
	}

	public function delete($id)
	{
		$this->links->delete_link($id);
		$this->session->set_flashdata('message', lang('successfully_deleted'));

		redirect('admin/links', 'refresh');
	}
}

/* End of file links.php */
/* Location: ./application/modules/admin/controllers/links.php */