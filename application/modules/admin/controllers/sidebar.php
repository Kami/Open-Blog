<?php

class Sidebar extends Controller
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
		$this->load->module_model('admin', 'sidebar_model', 'sidebar');
		
		$this->load->module_language('admin', 'general');
		$this->load->module_language('admin', 'sidebar');
	}
	
	// Public methods
	public function index()
	{
		$data['sidebar'] = $this->sidebar->get_sidebar();

		$this->_template['page']	= 'sidebar/list';

		$this->system_library->load($this->_template['page'], $data, TRUE);
	}
	
	public function move_sidebar_item()
	{
		$item = $this->input->post('item');
		$item_id = explode('_', $item);
		$action = $this->input->post('action');
		
		if ($action == 'up')
		{
			$this->sidebar->move_item_up($item_id[1]);
		}
		else if ($action == 'down')
		{
			$this->sidebar->move_item_down($item_id[1]);
		}
	}

	public function enable($id)
	{
		$this->sidebar->enable_sidebar_item($id);
		$this->session->set_flashdata('message', lang('successfully_enabled'));

		redirect('admin/sidebar', 'refresh');
	}
	
	public function disable($id)
	{
		$this->sidebar->disable_sidebar_item($id);
		$this->session->set_flashdata('message', lang('successfully_disabled'));

		redirect('admin/sidebar', 'refresh');
	}
	
	public function delete($id)
	{
		$this->sidebar->delete_sidebar_item($id);
		$this->session->set_flashdata('message', lang('successfully_deleted'));

		redirect('admin/sidebar', 'refresh');
	}
}

/* End of file sidebar.php */
/* Location: ./application/modules/admin/controllers/sidebar.php */