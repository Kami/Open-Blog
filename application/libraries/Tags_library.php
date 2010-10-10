<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tags_library
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
	public function get_tags()
	{
		$current_date = date('Y-m-d');
		
		$this->CI->db->select('tags.name, COUNT(tags.id) AS usage_count', FALSE);
		$this->CI->db->from($this->_table['tags'] . ' tags');
		$this->CI->db->join($this->_table['tags_to_posts'] . ' tags_to_posts', 'tags.id = tags_to_posts.tag_id');
		$this->CI->db->join($this->_table['posts'] . ' posts', 'tags_to_posts.post_id = posts.id');
		$this->CI->db->where('posts.date_posted <=', $current_date);
		$this->CI->db->group_by($this->_table['tags'] . '.id');
		$this->CI->db->order_by('RAND()');
		
		$query = $this->CI->db->get();
			
		if ($query->num_rows() > 0)
		{			
			return $query->result_array();
		}
	}
	
	public function get_maximum_usage_count()
	{
		$tags = $this->get_tags();
		
		if ($tags)
		{
			$maximum_value = 0;
			foreach ($tags as $tag)
			{
				// find maximal usage value
				if ($tag['usage_count'] > $maximum_value)
				{
					$maximum_value = $tag['usage_count'];
				}
			}
		}
		
		return $maximum_value;
	}
	
	public function get_font_size($maximum_usage_count, $usage_count)
	{
		if ($maximum_usage_count == $usage_count)
		{
			$font_size = 5;
		}
		else
		{
			$value = ($usage_count * 100) / $maximum_usage_count;
			
			if (($value > 0) && ($value < 20))
			{
				$font_size = 1;
			}
			else if (($value >= 20) && ($value < 40))
			{
				$font_size = 2;
			}
			else if (($value >= 40) && ($value < 60))
			{
				$font_size = 3;
			}
			else if (($value >= 60) && ($value < 80))
			{
				$font_size = 4;
			}
			else if (($value >= 80) && ($value < 100))
			{
				$font_size = 5;
			}
		}
		
		return $font_size;
	}
}

/* End of file Tags_library.php */
/* Location: ./application/libraries/Tags_library.php */