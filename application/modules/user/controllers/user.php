<?php

class User extends Controller
{
	function User()
	{
		parent::Controller();

		$this->load->module_model('user', 'user_model', 'user');
		
		$this->load->module_language('blog', 'general');
	}

	function register()
	{
		$this->load->module_language('user', 'registration');
		
		if (!$this->access_library->is_logged_in())
		{
			if ($this->system->settings['allow_registrations'] == 1)
			{
				$rules['username']				= "required|max_length[50]|callback_username_check";
				$rules['display_name']			= "max_length[50]";
				$rules['password']				= "required|matches[password_retype]";
				$rules['password_retype']		= "required";
				$rules['email']					= "required|valid_email|callback_email_check";
				$this->validation->set_rules($rules);
		
				$fields['username']			= strtolower_utf8(lang('form_username'));
				$fields['display_name']		= strtolower_utf8(lang('form_display_name'));
				$fields['password']			= strtolower_utf8(lang('form_password'));
				$fields['password_retype']	= strtolower_utf8(lang('form_retype_password'));
				$fields['email']			= strtolower_utf8(lang('form_email'));
				$fields['website']			= strtolower_utf8(lang('form_website'));
				$fields['msn_messenger']	= strtolower_utf8(lang('form_msn_messenger'));
				$fields['jabber']			= strtolower_utf8(lang('form_jabber'));
				$fields['about_me']			= strtolower_utf8(lang('form_about_me'));
				$this->validation->set_fields($fields);
					
				$this->validation->set_error_delimiters('', '<br />');
					
				if ($this->validation->run() == TRUE)
				{
					$this->user->create_user();
					$this->session->set_flashdata('message', lang('successfully_created'));
		
					redirect('user/login', 'refresh');
				}
			}
					
			$this->template['page']	= "user/registration";
					
			$this->system->load($this->template['page']);
		}
		else
		{
			redirect('blog', 'refresh');
		}
	}
	
	function username_check($username)
	{
		if ($this->user->validation_check(array('username' => $username)))
		{
			$this->validation->set_message('username_check', lang('username_already_exists'));
			return FALSE;
		}
	}
	
	function email_check($email)
	{
		if ($this->user->validation_check(array('email' => $email)))
		{
			$this->validation->set_message('email_check', lang('email_already_exists'));
			return FALSE;
		}
	}
	
	function view($nickname = null)
	{
		$this->load->module_language('user', 'view');
		
		$this->access_library->check_logged_in();
		
		if ($data['user'] = $this->user->get_user_by_nickname($nickname))
		{
			$this->template['page']	= "user/view";
		}
		else
		{
			$this->template['page']	= "errors/404";
		}
				
		$this->system->load($this->template['page'], $data);
	}
	
	function profile()
	{
		$this->load->module_language('user', 'profile');
		
		$this->access_library->check_logged_in();
		
		$id = $this->session->userdata('user_id');
			
		$rules['display_name']			= "max_length[50]";
		$rules['password']				= "matches[password_retype]";
		$rules['password_retype']		= "";
		$rules['email']					= "required|valid_email";
		$this->validation->set_rules($rules);
	
		$fields['display_name']		= strtolower_utf8(lang('form_display_name'));
		$fields['password']			= strtolower_utf8(lang('form_password'));
		$fields['password_retype']	= strtolower_utf8(lang('form_retype_password'));
		$fields['email']			= strtolower_utf8(lang('form_email'));
		$this->validation->set_fields($fields);
				
		$this->validation->set_error_delimiters('', '<br />');
				
		$data['user'] = $this->user->get_user($id);
		$this->validation->username 	= $data['user']['username'];
		$this->validation->display_name = $data['user']['display_name'];
		$this->validation->email 		= $data['user']['email'];
		$this->validation->website 		= $data['user']['website'];
		$this->validation->msn_messenger = $data['user']['msn_messenger'];
		$this->validation->jabber 		= $data['user']['jabber'];
		$this->validation->about_me 	= $data['user']['about_me'];

		if ($this->validation->run() == TRUE)
		{
			$this->user->edit_profie($id);
				
			if ($this->input->post('password') != "")
			{
				$this->user->logout();
				redirect('user/login', 'refresh');
			}
				
			$this->session->set_flashdata('message', lang('successfully_edited'));
	
			redirect('user/profile', 'refresh');
		}
				
		$this->template['page']	= "user/profile";
	
		$this->system->load($this->template['page'], $data);
	}
	

	function login()
	{
		$this->load->module_language('user', 'login');
		
		if (!$this->access_library->is_logged_in())
		{
			if ($this->input->post('username') != "" && $this->input->post('password') != "")
			{
				$this->user->verify_user($this->input->post('username'), $this->input->post('password'));
					
				if ($this->session->userdata('level') == 'user' || $this->session->userdata('level') == 'administrator')
				{
					$this->user->update_last_login();
					redirect('blog', 'refresh');
				}
				else
				{
					redirect('user/login', 'refresh');
				}
			}
			else
			{
				$this->template['page']	= "user/login";
					
				$this->system->load($this->template['page']);
			}
		}
		else
		{
			redirect('blog', 'refresh');
		}
	}

	function logout()
	{
		if ($this->access_library->is_logged_in())
		{
			$this->user->logout();

			redirect('blog', 'refresh');
		}
		else
		{
			redirect('blog', 'refresh');
		}
	}
}

/* End of file user.php */
/* Location: ./application/modules/user/controllers/user.php */