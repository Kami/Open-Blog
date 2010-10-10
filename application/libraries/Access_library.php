<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Access_library
{
	function Access_library()
	{
		if (!isset($this->CI))
		{
			$this->CI =& get_instance();
		}
	}
		
	function is_logged_in()
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
		
	function is_admin()
	{
		if ($this->CI->session->userdata('level') == "administrator")
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
		
	function check_logged_in()
	{
		if ($this->CI->session->userdata('logged_in') != TRUE)
		{
			redirect('user/login', 'refresh');
			exit();
		}
	}
		
	function check_access()
	{
		if ($this->CI->session->userdata('level') != "administrator")
		{
			redirect('user/login', 'refresh');
			exit();
		}
	}
}

/* End of file Access_library.php */
/* Location: ./application/libraries/Access_library.php */