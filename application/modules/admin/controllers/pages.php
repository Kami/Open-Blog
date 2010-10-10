<?php

class Pages extends Controller
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
		$this->load->module_model('admin', 'pages_model', 'pages');
		$this->load->module_model('admin', 'navigation_model', 'navigation');
		
		$this->load->module_language('admin', 'general');
		$this->load->module_language('admin', 'pages');
	}

	// Public methods
	public function index()
	{
		$data['pages'] 				= $this->pages->get_pages();
		
		$this->_template['page']	= 'pages/list';

		$this->system_library->load($this->_template['page'], $data, TRUE);
	}

	public function create()
	{
		$this->form_validation->set_rules('title', 'lang:form_title', 'required|max_length[200]');
		$this->form_validation->set_rules('content', 'lang:form_content', 'required');
		$this->form_validation->set_rules('status', 'lang:form_status', 'required');

		$this->form_validation->set_error_delimiters('', '<br />');
			
		if ($this->form_validation->run() == TRUE)
		{
			$this->pages->create_page();
			
			if ($this->input->post('add_to_navigation'))
			{
				$url = 'pages/' . url_title($this->input->post('title'), 'dash', TRUE) . '/';
				
				$this->navigation->create_navigation_item($this->input->post('title'), $this->input->post('title'), $url);
			}
			
			$this->session->set_flashdata('message', lang('successfully_created'));

			redirect('admin/pages', 'refresh');
		}
			
		$this->_template['page']	= 'pages/create';
			
		$this->system_library->load($this->_template['page'], null, TRUE);
	}

	public function edit($id = null)
	{
		if ($id == null)
		{
			$id = $this->input->post('id');
		}
			
		$this->form_validation->set_rules('title', 'lang:form_title', 'required|max_length[200]');
		$this->form_validation->set_rules('content', 'lang:form_content', 'required');
		$this->form_validation->set_rules('status', 'lang:form_status', 'required');

		$this->form_validation->set_error_delimiters('', '<br />');
			
		$data['page_data'] = $this->pages->get_page($id);
			
		if ($this->form_validation->run() == TRUE)
		{
			$this->pages->edit_page($id);
			$this->session->set_flashdata('message', lang('successfully_edited'));

			redirect('admin/pages', 'refresh');
		}
		
		$this->_template['page']	= 'pages/edit';
			
		$this->system_library->load($this->_template['page'], $data, TRUE);
	}

	public function delete($id)
	{
		$this->pages->delete_page($id);
		$this->session->set_flashdata('message', lang('successfully_deleted'));

		redirect('admin/pages', 'refresh');
	}
}

/* End of file pages.php */
/* Location: ./application/modules/admin/controllers/pages.php */