<?php

class Navigation extends Controller
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
		$this->load->module_model('admin', 'navigation_model', 'navigation');
		
		$this->load->module_language('admin', 'general');
		$this->load->module_language('admin', 'navigation');
	}

	// Public methods
	public function index()
	{
		$data['navigation'] = $this->navigation->get_navigation();

		$this->_template['page']	= 'navigation/list';

		$this->system_library->load($this->_template['page'], $data, TRUE);
	}
	
	public function move_navigation_item()
	{
		$item = $this->input->post('item');
		$item_id = explode('_', $item);
		$action = $this->input->post('action');
		
		if ($action == 'up')
		{
			$this->navigation->move_item_up($item_id[1]);
		}
		else if ($action == 'down')
		{
			$this->navigation->move_item_down($item_id[1]);
		}
	}

	public function create()
	{	
		$this->form_validation->set_rules('title', 'lang:form_title', 'required|max_length[50]');
		$this->form_validation->set_rules('url', 'lang:form_url', 'required');
		$this->form_validation->set_rules('description', 'lang:form_description', 'required|max_length[100]');

		$this->form_validation->set_error_delimiters('', '<br />');
			
		if ($this->form_validation->run() == TRUE)
		{
			$this->navigation->create_navigation_item();
			$this->session->set_flashdata('message', lang('successfully_created'));

			redirect('admin/navigation', 'refresh');
		}
			
		$this->_template['page']	= 'navigation/create';
			
		$this->system_library->load($this->_template['page'], null, TRUE);
	}

	public function edit($id = null)
	{
		if ($id == null)
		{
			$id = $this->input->post('id');
		}
			
		$this->form_validation->set_rules('title', 'lang:form_title', 'required|max_length[50]');
		$this->form_validation->set_rules('url', 'lang:form_url', 'required');
		$this->form_validation->set_rules('description', 'lang:form_description', 'required|max_length[100]');

		$this->form_validation->set_error_delimiters('', '<br />');
			
		$data['navigation'] = $this->navigation->get_navigation_item($id);
			
		if ($this->form_validation->run() == TRUE)
		{
			$this->navigation->edit_navigation_item($id);
			$this->session->set_flashdata('message', lang('successfully_edited'));

			redirect('admin/navigation', 'refresh');
		}
		
		$this->_template['page']	= 'navigation/edit';
			
		$this->system_library->load($this->_template['page'], $data, TRUE);
	}

	public function delete($id)
	{
		$this->navigation->delete_navigation_item($id);
		$this->session->set_flashdata('message', lang('successfully_deleted'));

		redirect('admin/navigation', 'refresh');
	}
}

/* End of file navigation.php */
/* Location: ./application/modules/admin/controllers/navigation.php */