<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Links_library
{
	function Links_library()
	{
		if (!isset($this->CI))
		{
			$this->CI =& get_instance();
		}
		
		$this->links_table = 'links';
	}
	
	function get_links()
	{
		$this->CI->db->select('id, name, url, target, description, visible');
		$this->CI->db->where('visible', 'yes'); 
		$this->CI->db->order_by('id', 'ASC'); 
		$this->CI->db->limit($this->CI->system->settings['links_per_box']);
		$query = $this->CI->db->get($this->links_table);
		
		if ($query->num_rows() > 0)
		{	
			$result = $query->result_array();
			
			foreach ($result as $key => $link)
			{
				$result[$key]['target']  = '_' . $link['target'];
			}
					
			return $result;
		}
	}
}

/* End of file Links_library.php */
/* Location: ./application/libraries/Links_library.php */