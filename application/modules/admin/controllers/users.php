<?php

class Users extends Controller
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
		$this->load->module_model('admin', 'users_model', 'users');
		
		$this->load->module_language('admin', 'general');
		$this->load->module_language('admin', 'users');
	}
		
	public function index()
	{
		$data['users'] = $this->users->get_users();

		$this->_template['page']	= 'users/list';

		$this->system_library->load($this->_template['page'], $data, TRUE);
	}
	
	public function edit($id = null)
	{
		if ($id == null)
		{
			$id = $this->input->post('id');
		}
		
		$this->form_validation->set_rules('display_name', 'lang:form_display_name', 'max_length[50]|xss_clean');
		$this->form_validation->set_rules('email', 'lang:form_email', 'required|valid_email');
		$this->form_validation->set_rules('level', 'lang:form_level', 'required|xss_clean');
		$this->form_validation->set_rules('website', 'lang:form_website', 'xss_clean');
		$this->form_validation->set_rules('msn_messenger', 'lang:form_msn_messenger', 'xss_clean');
		$this->form_validation->set_rules('jabber', 'lang:form_jabber', 'xss_clean');
		$this->form_validation->set_rules('about_me', 'lang:form_about_me', 'xss_clean');
				
		$this->form_validation->set_error_delimiters('', '<br />');
			
		$data['user'] = $this->users->get_user($id);
		$this->validation->username 	= $data['user']['username'];
		$this->validation->display_name = $data['user']['display_name'];
		$this->validation->email 		= $data['user']['email'];
		$this->validation->website 		= $data['user']['website'];
		$this->validation->msn_messenger = $data['user']['msn_messenger'];
		$this->validation->jabber 		= $data['user']['jabber'];
		$this->validation->about_me 	= $data['user']['about_me'];
		$this->validation->level	 	= $data['user']['level'];
			
		if ($this->form_validation->run() == TRUE)
		{
			$this->users->edit_user($id);
			$this->session->set_flashdata('message', lang('successfully_edited'));

			redirect('admin/users', 'refresh');
		}

		$this->_template['page']	= 'users/edit';
			
		$this->system_library->load($this->_template['page'], $data, TRUE);
	}

	public function delete($id)
	{
		$this->users->delete_user($id);
		$this->session->set_flashdata('message', lang('successfully_deleted'));

		redirect('admin/users', 'refresh');
	}
}

/* End of file users.php */
/* Location: ./application/modules/admin/controllers/users.php */