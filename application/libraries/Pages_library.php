<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pages_library
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
	public function get_pages()
	{
		$this->CI->db->select('title, url_title');
		$this->CI->db->where('status', 'active');
		$this->CI->db->order_by('id', 'ASC'); 
		
		$query = $this->CI->db->get($this->_table['pages']);
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}
}

/* End of file Pages_library.php */
/* Location: ./application/libraries/Pages_library.php */