<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Navigation_library
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
	public function get_navigation()
	{
		$this->CI->db->select('title, description, url, external, position');
		$this->CI->db->order_by('position', 'ASC'); 
		
		$query = $this->CI->db->get($this->_table['navigation']);
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}
}

/* End of file Navigation_library.php */
/* Location: ./application/libraries/Navigation_library.php */