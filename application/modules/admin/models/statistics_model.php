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
		$this->db->select('COUNT(comments.id) AS comments_count, posts.title, posts.url_title, posts.date_posted');
		$this->db->from($this->_table['comments'] . ' comments');
		$this->db->join($this->_table['posts'] . ' posts', 'comments.post_id = posts.id');
		$this->db->group_by('comments.post_id');
		$this->db->order_by('comments_count', 'DESC');
		$this->db->limit(1);
		
		$query = $this->db->get();
		
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
		$this->db->select('COUNT(posts_to_categories.id) AS posts_count, categories.name, categories.url_name');
		$this->db->from($this->_table['posts_to_categories'] . ' posts_to_categories');
		$this->db->join($this->_table['categories'] . ' categories', 'posts_to_categories.category_id = categories.id');
		$this->db->group_by('posts_to_categories.category_id');
		$this->db->order_by('posts_count', 'DESC');
		$this->db->limit(1);
		
		$query = $this->db->get();
		
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