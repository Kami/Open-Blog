<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sidebar_library
{
	// Public properties
	public $sidebar = array();
	// Protected or private properties
	protected $_table;
	
	// Constructor
	public function __construct()
	{
		if (!isset($this->CI))
		{
			$this->CI =& get_instance();
		}
		
		$this->CI->config->load('database_tables', TRUE);
		
		$this->_table = $this->CI->config->item('database_tables');
		
		$this->get_sidebar_items();
	}

	// Public methods
	public function get_sidebar_items()
	{
		$this->CI->db->select('title, file, status, position');
		$this->CI->db->where('status', 'enabled');
		$this->CI->db->order_by('position', 'ASC');
		
		$query = $this->CI->db->get($this->_table['sidebar']);

		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();

			foreach ($result as $row)
			{
				$this->sidebar[] = $row;
			}
		}
	}
}

/* End of file Sidebar_library.php */
/* Location: ./application/libraries/Sidebar_library.php */