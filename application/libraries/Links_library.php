<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Links_library
{
	// Protected or private properties
	protected $_table;
	
	// Constructor
	public function __construct()
	{
		if (!isset($this->CI))
		{
			$this->CI =& get_instance();
		}
		
		$this->_table = $this->CI->config->item('database_tables');
	}
	
	// Public methods
	public function get_links()
	{
		$this->CI->db->select('id, name, url, target, description, visible');
		$this->CI->db->where('visible', 'yes'); 
		$this->CI->db->order_by('id', 'ASC'); 
		$this->CI->db->limit($this->CI->system_library->settings['links_per_box']);
		
		$query = $this->CI->db->get($this->_table['links']);
		
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