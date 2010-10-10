<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Archive_library
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
	public function get_archive()
	{
		$this->CI->db->select('COUNT(' . $this->CI->db->dbprefix . 'posts.id) AS posts_count, ' . $this->CI->db->dbprefix . 'posts.date_posted FROM ' . $this->CI->db->dbprefix . 'posts WHERE ' . $this->CI->db->dbprefix . 'posts.status = \'published\' GROUP BY SUBSTRING(' . $this->CI->db->dbprefix . 'posts.date_posted, 1, 7)', FALSE);
		$this->CI->db->order_by('date_posted', 'DESC');
		$this->CI->db->limit($this->CI->system_library->settings['months_per_archive']);
		
		$query = $this->CI->db->get();
		
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();
			
			foreach ($result as $key => $row)
			{
				$result[$key]['url']  = date('Y', strtotime($row['date_posted'])) . '/' . date('m', strtotime($row['date_posted'])) . '/';
				$result[$key]['date_posted']  = strftime('%B %Y', strtotime($row['date_posted']));
			}
			
			return $result;
		}
	}
}

/* End of file Archive_library.php */
/* Location: ./application/libraries/Archive_library.php */