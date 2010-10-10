<?php

class User extends Controller
{
	// Protected or private properties
	protected $_template;
	
	// Constructor
	public function __construct()
	{
		parent::Controller();

		// Load needed models, libraries, helpers and language files
		$this->load->module_model('user', 'user_model', 'user');
		
		$this->load->library('phpass_library');
		
		$this->load->module_language('blog', 'general');
		$this->load->module_language('user', 'registration');
	}

	// Public methods
	public function register()
	{
		if (!$this->access_library->is_logged_in())
		{
			if ($this->system_library->settings['allow_registrations'] == 1)
			{
				$this->form_validation->set_rules('username', 'lang:form_username', 'required|max_length[50]|callback_username_check|xss_clean');
				$this->form_validation->set_rules('display_name', 'lang:form_display_name', 'max_length[50]|xss_clean');
				$this->form_validation->set_rules('password', 'lang:form_password', 'required|matches[password_retype]');
				$this->form_validation->set_rules('password_retype', 'lang:form_retype_password', 'required');
				$this->form_validation->set_rules('email', 'lang:form_email', 'required|valid_email|callback_email_check');
				$this->form_validation->set_rules('website', 'lang:form_website', 'xss_clean');
				$this->form_validation->set_rules('msn_messenger', 'lang:form_msn_messenger', 'xss_clean');
				$this->form_validation->set_rules('jabber', 'lang:form_jabber', 'xss_clean');
				$this->form_validation->set_rules('about_me', 'lang:form_about_me', 'xss_clean');			

				$this->form_validation->set_error_delimiters('', '<br />');
					
				if ($this->form_validation->run() == TRUE)
				{
					$this->user->create_user();
					$this->session->set_flashdata('message', lang('successfully_created'));
		
					redirect('user/register', 'refresh');
				}
			}
					
			$this->_template['page']	= 'user/registration';
					
			$this->system_library->load($this->_template['page']);
		}
		else
		{
			redirect('blog', 'refresh');
		}
	}

	public function account_activation()
	{
		$key = $this->uri->segment(4);
		$email = $this->uri->segment(6);

		if ($key != '' && $email != '')
		{
			if ($this->user->check_secret_key($key, $email))
			{
				$this->user->activate_account($key, $email);
				
				$this->session->set_flashdata('message', lang('successfully_activated'));
				
				redirect('user/register', 'refresh');
			}
			else 
			{
				$this->_template['page']	= 'errors/invalid_secret_key';
				
				$this->system_library->load($this->_template['page']);
			}
		}
		else
		{
			redirect('user/login', 'refresh');
		}
	}
	
	public function forgotten_password()
	{
		$this->load->module_language('user', 'forgotten_password');
		
		$key = $this->uri->segment(4);
		$email = $this->uri->segment(6);
		
		if ($key == null && $email == null)
		{
			$this->form_validation->set_rules('username', 'lang:form_username', 'required|callback_user_existence');
			$this->form_validation->set_rules('email', 'lang:form_email', 'required|valid_email|callback_email_existence');
						
			$this->form_validation->set_error_delimiters('', '<br />');
			
			if ($this->form_validation->run() == TRUE)
			{
				$this->user->forgotten_password();
				
				$this->session->set_flashdata('message', lang('email_successfully_sent'));
				
				redirect('user/forgotten_password', 'refresh');	
			}
			
			$this->_template['page']	= 'user/forgotten_password';
			
			$this->system_library->load($this->_template['page']);
		}
		else
		{
			if ($this->user->check_secret_key($key, $email))
			{
				$this->user->reset_password($key, $email);

				$this->session->set_flashdata('message', lang('successfully_reset'));
				
				redirect('user/forgotten_password', 'refresh');
			}
			else 
			{
				$this->_template['page']	= 'errors/invalid_secret_key';
				
				$this->system_library->load($this->_template['page']);
			}
		}
	}
	
	public function view($nickname = null)
	{
		$this->load->module_language('user', 'view');
		
		$this->access_library->check_logged_in();
		
		if ($data['user'] = $this->user->get_user_by_nickname($nickname))
		{
			$this->_template['page']	= 'user/view';
		}
		else
		{
			$this->_template['page']	= 'errors/404';
		}
				
		$this->system_library->load($this->_template['page'], $data);
	}
	
	public function profile()
	{
		$this->load->module_language('user', 'profile');
		
		$this->access_library->check_logged_in();
		
		$id = $this->session->userdata('user_id');

		$this->form_validation->set_rules('display_name', 'lang:form_display_name', 'max_length[50]|xss_clean');
		$this->form_validation->set_rules('password', 'lang:form_password', 'matches[password_retype]');
		$this->form_validation->set_rules('password_retype', 'lang:form_retype_password', '');
		$this->form_validation->set_rules('email', 'lang:form_email', 'required|valid_email');
		$this->form_validation->set_rules('website', 'lang:form_website', 'xss_clean');
		$this->form_validation->set_rules('msn_messenger', 'lang:form_msn_messenger', 'xss_clean');
		$this->form_validation->set_rules('jabber', 'lang:form_jabber', 'xss_clean');
		$this->form_validation->set_rules('about_me', 'lang:form_about_me', 'xss_clean');	
				
		$this->form_validation->set_error_delimiters('', '<br />');
				
		$data['user'] = $this->user->get_user($id);

		if ($this->form_validation->run() == TRUE)
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
				
		$this->_template['page']	= 'user/profile';
	
		$this->system_library->load($this->_template['page'], $data);
	}
	

	public function login()
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
				$this->_template['page']	= 'user/login';
					
				$this->system_library->load($this->_template['page']);
			}
		}
		else
		{
			redirect('blog', 'refresh');
		}
	}

	public function logout()
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
	
	// Custom validation methods
	public function username_check($username)
	{
		if ($this->user->validation_check(array('username' => $username)))
		{
			$this->form_validation->set_message('username_check', lang('username_already_exists'));
			
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	public function email_check($email)
	{
		if ($this->user->validation_check(array('email' => $email)))
		{
			$this->form_validation->set_message('email_check', lang('email_already_exists'));
			
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	public function user_existence($username)
	{
		if (!$this->user->validation_check(array('username' => $username)))
		{
			$this->form_validation->set_message('user_existence', lang('user_existence'));
			
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	public function email_existence($email)
	{
		if (!$this->user->validation_check(array('email' => $email)))
		{
			$this->form_validation->set_message('email_existence', lang('email_existence'));
			
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
}

/* End of file user.php */
/* Location: ./application/modules/user/controllers/user.php */