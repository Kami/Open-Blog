<?php

class Users extends Controller
{
	function Users()
	{
		parent::Controller();
			
		$this->access_library->check_access();

		$this->load->module_model('admin', 'users_model', 'users');
		
		$this->load->module_language('admin', 'general');
		$this->load->module_language('admin', 'users');
	}
		
	function index()
	{
		$data['users'] = $this->users->get_users();

		$this->template['page']	= "users/list";

		$this->system->load($this->template['page'], $data, TRUE);
	}
	
	function edit($id = null)
	{
		if ($id == null)
		{
			$id = $this->input->post('id');
		}
			
		$rules['display_name']			= "max_length[50]";
		$rules['email']					= "required|valid_email";
		$rules['level']					= "required";
		$this->validation->set_rules($rules);
	
		$fields['display_name']			= strtolower_utf8(lang('form_display_name'));
		$fields['email']				= strtolower_utf8(lang('form_email'));
		$fields['level']				= strtolower_utf8(lang('form_level'));
		$this->validation->set_fields($fields);
				
		$this->validation->set_error_delimiters('', '<br />');
			
		$data['user'] = $this->users->get_user($id);
		$this->validation->username 	= $data['user']['username'];
		$this->validation->display_name = $data['user']['display_name'];
		$this->validation->email 		= $data['user']['email'];
		$this->validation->website 		= $data['user']['website'];
		$this->validation->msn_messenger = $data['user']['msn_messenger'];
		$this->validation->jabber 		= $data['user']['jabber'];
		$this->validation->about_me 	= $data['user']['about_me'];
		$this->validation->level	 	= $data['user']['level'];
			
		if ($this->validation->run() == TRUE)
		{
			$this->users->edit_user($id);
			$this->session->set_flashdata('message', lang('successfully_edited'));

			redirect('admin/users', 'refresh');
		}

		$this->template['page']	= "users/edit";
			
		$this->system->load($this->template['page'], $data, TRUE);
	}

	function delete($id)
	{
		$this->users->delete_user($id);
		$this->session->set_flashdata('message', lang('successfully_deleted'));

		redirect('admin/users', 'refresh');
	}
}

/* End of file users.php */
/* Location: ./application/modules/admin/controllers/users.php */