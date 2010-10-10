<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class System
{
	function System()
	{
		if (!isset($this->CI))
		{
			$this->CI =& get_instance();
		}
		
		$this->settings_table = 'settings';
		$this->template_table = 'templates';
		$this->languages_table = 'languages';
		
		$this->CI->config->set_item('language', $this->get_default_language());
		
		$this->get_site_info();
	}

	function get_default_template()
	{
		$this->CI->db->select('path');
		$this->CI->db->where('is_default', '1');
		$query = $this->CI->db->get($this->template_table, 1);
		
		if ($query->num_rows() == 1)
		{
			$row = $query->row_array();
		}
		
		return $row['path'];
	}
	
	function get_default_language()
	{
		$this->CI->db->select('language');
		$this->CI->db->where('is_default', '1');
		$query = $this->CI->db->get($this->languages_table, 1);
		
		if ($query->num_rows() == 1)
		{
			$row = $query->row_array();
		}
		
		return $row['language'];
	}
	
	function get_site_info()
	{
		$this->CI->db->select('blog_title, blog_description, meta_keywords, allow_registrations, enable_rss, enable_atom, links_per_box, months_per_archive');
		$this->CI->db->where('id', '1');
		$query = $this->CI->db->get($this->settings_table, 1);
		
		if ($query->num_rows() == 1)
		{
			$result = $query->row_array();
			
			foreach ($result as $key => $value)
			{
				$this->settings[$key] = $value;
			}
		}
	}
	
	function check_site_status()
	{
		$this->CI->db->select('enabled, offline_reason');
		$this->CI->db->where('id', '1');
		$query = $this->CI->db->get($this->settings_table, 1);
		
		if ($query->num_rows() == 1)
		{
			$result = $query->row_array();
			
			if ($result['enabled'] == 0)
			{
				echo lang('site_disabled') . "<br />";
				echo lang('reason') . " <strong>" . $result['offline_reason'] . "</strong>";
				die();
			}
		}
	}
	
	function load($page, $data = null, $admin = false)
	{
		$data['page'] = $page;
		
		if ($admin == true)
		{
			$this->CI->load->view('admin/layout/container', $data);
		}
		else
		{
			$template = $this->get_default_template();
			
			$this->CI->load->view('templates/' . $template . '/layout/container', $data);
		}
	}
	
	function load_normal($page, $data = null)
	{
		$template = $this->get_default_template();
		
		$this->CI->load->view('templates/' . $template . '/layout/pages/' . $page, $data);
	}
}

/* End of file System.php */
/* Location: ./application/libraries/System.php */