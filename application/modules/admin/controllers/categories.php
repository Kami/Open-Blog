<?php

class Categories extends Controller
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
		$this->load->module_model('admin', 'categories_model', 'categories');
		
		$this->load->module_language('admin', 'general');
		$this->load->module_language('admin', 'categories');
	}

	// Public methods
	public function index()
	{
		$data['categories'] 		= $this->categories->get_categories();

		$this->_template['page']	= "categories/list";

		$this->system_library->load($this->_template['page'], $data, TRUE);
	}

	public function create()
	{
		$this->form_validation->set_rules('name', 'lang:form_category_name', 'required|max_length[60]');
		$this->form_validation->set_rules('description', 'lang:form_category_description', 'required|max_length[200]');

		$this->form_validation->set_error_delimiters('', '<br />');

		if ($this->form_validation->run() == TRUE)
		{
			$this->categories->create_category();
			$this->session->set_flashdata('message', lang('successfully_created'));

			redirect('admin/categories', 'refresh');
		}
			
		$this->_template['page']	= 'categories/create';
			
		$this->system_library->load($this->_template['page'], null, TRUE);
	}

	public function edit($id = null)
	{
		if ($id == null)
		{
			$id = $this->input->post('id');
		}
			
		$this->form_validation->set_rules('name', 'lang:form_category_name', 'required|max_length[60]');
		$this->form_validation->set_rules('description', 'lang:form_category_description', 'required|max_length[200]');

		$this->form_validation->set_error_delimiters('', '<br />');
			
		$data['category'] = $this->categories->get_category($id);
			
		if ($this->form_validation->run() == TRUE)
		{
			$this->categories->edit_category($id);
			$this->session->set_flashdata('message', lang('successfully_edited'));

			redirect('admin/categories', 'refresh');
		}

		$this->_template['page']	= 'categories/edit';
			
		$this->system_library->load($this->_template['page'], $data, TRUE);
	}

	public function delete($id)
	{
		$this->categories->delete_category($id);
		$this->session->set_flashdata('message', lang('successfully_deleted'));

		redirect('admin/categories', 'refresh');
	}
}

/* End of file categories.php */
/* Location: ./application/modules/admin/controllers/categories.php */