<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Categories_library
{
	function Categories_library()
	{
		if (!isset($this->CI))
		{
			$this->CI =& get_instance();
		}
		
		$this->categories_table = 'categories';
	}
		
	function get_categories()
	{
		$this->CI->db->select('id, name, url_name');
		$this->CI->db->select('(SELECT COUNT(' . $this->CI->db->dbprefix . 'posts.id) FROM ' . $this->CI->db->dbprefix . 'posts WHERE ' . $this->CI->db->dbprefix . 'posts.category_id = ' . $this->CI->db->dbprefix . 'categories.id AND ' . $this->CI->db->dbprefix . 'posts.status = "published") AS posts_count', FALSE); 
		$this->CI->db->order_by('id', 'ASC'); 
		$query = $this->CI->db->get($this->categories_table);
			
		if ($query->num_rows() > 0)
		{			
			return $query->result_array();
		}
	}
}

/* End of file Categories_library.php */
/* Location: ./application/libraries/Categories_library.php */