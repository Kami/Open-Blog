<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Navigation_library
{
	function Navigation_library()
	{
		if (!isset($this->CI))
		{
			$this->CI =& get_instance();
		}
		
		$this->navigation_table = 'navigation';
	}
		
	function get_navigation()
	{
		$this->CI->db->select('title, description, url, position');
		$this->CI->db->order_by('position', 'ASC'); 
		$query = $this->CI->db->get($this->navigation_table);
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}
}

/* End of file Navigation_library.php */
/* Location: ./application/libraries/Navigation_library.php */