<?php

class Statistics_model extends Model
{
	// Protected or private properties
	protected $_table;
	
	// Constructor
	public function __construct()
	{
		parent::Model();
			
		$this->_table = $this->config->item('database_tables');
	}

	// Public methods
	public function get_posts_count($status = 'all')
	{
		$this->db->select('id');
		
		if ($status != 'all')
		{
			$this->db->where('status', $status);
		}
			
		$this->db->from($this->_table['posts']);
		
		return $this->db->count_all_results();
	}
	
	public function get_post_with_most_comments()
	{
		$this->db->select('COUNT(' . $this->db->dbprefix . $this->_table['comments'] . '.id) AS comments_count, ' . $this->_table['posts'] . '.title, ' . $this->_table['posts'] . '.url_title, ' . $this->_table['posts'] . '.date_posted');
		$this->db->join($this->_table['posts'], $this->_table['comments'] . '.post_id = ' . $this->_table['posts'] . '.id');
		$this->db->group_by($this->_table['comments'] . '.post_id');
		$this->db->order_by('comments_count', 'DESC');
		$this->db->limit(1);
		
		$query = $this->db->get($this->_table['comments']);
		
		if ($query->num_rows() == 1)
		{
			return $query->row_array();
		}
	}
	
	public function get_categories_count()
	{
		$this->db->select('id');
			
		$this->db->from($this->_table['categories']);
		
		return $this->db->count_all_results();
	}
	
	public function get_category_with_most_posts()
	{
		$this->db->select('COUNT(' . $this->db->dbprefix . $this->_table['posts'] . '.id) AS posts_count, ' . $this->_table['categories'] . '.name, ' . $this->_table['categories'] . '.url_name');
		$this->db->join($this->_table['categories'], $this->_table['posts'] . '.category_id = ' . $this->_table['categories'] . '.id');
		$this->db->group_by($this->_table['posts'] . '.category_id');
		$this->db->order_by('posts_count', 'DESC');
		$this->db->limit(1);
		
		$query = $this->db->get($this->_table['posts']);
		
		if ($query->num_rows() == 1)
		{
			return $query->row_array();
		}
	}
	
	public function get_comments_count($who = 'all')
	{
		$this->db->select('id');
		
		if ($who == 'members')
		{
			$this->db->where('user_id IS NOT NULL');
		}
		else if ($who == 'guests')
		{
			$this->db->where('user_id IS NULL');
		}

		$this->db->from($this->_table['comments']);
		
		return $this->db->count_all_results();
	}
}

/* End of file statistics_model.php */
/* Location: ./application/modules/admin/models/statistics_model.php */