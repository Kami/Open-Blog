<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Access_library
{
	// Constructor
	public function __construct()
	{
		if (!isset($this->CI))
		{
			$this->CI =& get_instance();
		}
	}

	// Public methods
	public function is_logged_in()
	{
		if ($this->CI->session->userdata('logged_in') == TRUE)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
		
	public function is_admin()
	{
		if ($this->CI->session->userdata('level') == 'administrator')
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
		
	public function check_logged_in()
	{
		if ($this->CI->session->userdata('logged_in') != TRUE)
		{
			redirect('user/login', 'refresh');
			exit();
		}
	}
		
	public function check_access()
	{
		if ($this->CI->session->userdata('level') != 'administrator')
		{
			redirect('user/login', 'refresh');
			exit();
		}
	}
}

/* End of file Access_library.php */
/* Location: ./application/libraries/Access_library.php */