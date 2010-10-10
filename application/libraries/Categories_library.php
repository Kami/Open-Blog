<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Categories_library
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
	public function get_categories()
	{
		$this->CI->db->select('id, name, url_name');
		$this->CI->db->from($this->_table['categories'] . ' categories');
		$this->CI->db->select('(SELECT COUNT(' . $this->CI->db->dbprefix . 'posts_to_categories.id) FROM ' . $this->CI->db->dbprefix . 'posts_to_categories WHERE ' . $this->CI->db->dbprefix . 'posts_to_categories.category_id = categories.id) AS posts_count', FALSE); 
		$this->CI->db->order_by('id', 'ASC');
		
		$query = $this->CI->db->get();
			
		if ($query->num_rows() > 0)
		{			
			return $query->result_array();
		}
	}
}

/* End of file Categories_library.php */
/* Location: ./application/libraries/Categories_library.php */