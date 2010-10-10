<?php

class Blog_model extends Model
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
	public function get_posts_per_site()
	{
		$this->db->select('value');
		$this->db->where('name', 'posts_per_site');
			
		$query = $this->db->get($this->_table['settings'], 1);
			
		if ($query->num_rows() == 1)
		{
			$row = $query->row_array();
		}
			
		return $row['value'];
	}

	public function get_posts_count()
	{
		$this->db->select('id');
		$this->db->where('status', 'published');
			
		$query = $this->db->count_all_results($this->_table['posts']);
			
		return $query;
	}

	public function get_posts($number = 10, $offset = 0)
	{
		$this->db->select($this->_table['posts'] . '.id, ' . $this->_table['posts'] . '.author, ' . $this->_table['posts'] . '.date_posted, ' . $this->_table['posts'] . '.title, ' . $this->_table['posts'] . '.url_title, ' . $this->_table['posts'] . '.category_id, ' . $this->_table['posts'] . '.excerpt, ' . $this->_table['posts'] . '.content, ' . $this->_table['posts'] . '.status, ' . $this->_table['categories'] . '.name, ' . $this->_table['categories'] . '.url_name, ' . $this->_table['users'] . '.display_name');
		$this->db->select('(SELECT COUNT(' . $this->db->dbprefix . $this->_table['comments'] . '.id) FROM ' . $this->db->dbprefix . $this->_table['comments'] . ' WHERE ' . $this->db->dbprefix . $this->_table['comments'] . '.post_id = ' . $this->db->dbprefix . $this->_table['posts'] . '.id) AS comment_count', FALSE);
		$this->db->join($this->_table['categories'], $this->_table['posts'] . '.category_id = ' .$this->_table['categories'] . '.id');
		$this->db->join($this->_table['users'], $this->_table['posts'] .'.author = ' . $this->_table['users'] . '.id');
		$this->db->where($this->_table['posts'] . '.status', 'published');
		$this->db->order_by('id', 'DESC');
			
		$query = $this->db->get($this->_table['posts'], $number, $offset);
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}

	public function get_posts_by_date($year, $month)
	{
		$date = $year . '-' . $month;
		$this->db->select($this->_table['posts'] . '.id, ' . $this->_table['posts'] . '.author, ' . $this->_table['posts'] . '.date_posted, ' . $this->_table['posts'] . '.title, ' . $this->_table['posts'] . '.url_title, ' . $this->_table['posts'] . '.category_id, ' . $this->_table['posts'] . '.excerpt, ' . $this->_table['posts'] . '.content, ' . $this->_table['posts'] . '.allow_comments, ' . $this->_table['posts'] . '.status, ' . $this->_table['categories'] . '.name, ' . $this->_table['categories'] . '.url_name, ' . $this->_table['users'] . '.display_name');
		$this->db->select('(SELECT COUNT(' . $this->db->dbprefix . $this->_table['comments'] . '.id) FROM ' . $this->db->dbprefix . $this->_table['comments'] . ' WHERE ' . $this->db->dbprefix . $this->_table['comments'] . '.post_id = ' . $this->db->dbprefix . $this->_table['posts'] . '.id) AS comment_count', FALSE);
		$this->db->join($this->_table['categories'], $this->_table['posts'] . '.category_id = ' .$this->_table['categories'] . '.id');
		$this->db->join($this->_table['users'], $this->_table['posts'] .'.author = ' . $this->_table['users'] . '.id');
		$this->db->where($this->_table['posts'] . '.status', 'published');
		$this->db->like('date_posted', $date);
		$this->db->order_by('id', 'DESC');
			
		$query = $this->db->get($this->_table['posts']);
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}

	public function get_posts_by_category($url_name)
	{
		$this->db->select($this->_table['posts'] . '.id, ' . $this->_table['posts'] . '.author, ' . $this->_table['posts'] . '.date_posted, ' . $this->_table['posts'] . '.title, ' . $this->_table['posts'] . '.url_title, ' . $this->_table['posts'] . '.category_id, ' . $this->_table['posts'] . '.excerpt, ' . $this->_table['posts'] . '.content, ' . $this->_table['posts'] . '.allow_comments, ' . $this->_table['posts'] . '.status, ' . $this->_table['categories'] . '.name, ' . $this->_table['categories'] . '.url_name, ' . $this->_table['users'] . '.display_name');
		$this->db->select('(SELECT COUNT(' . $this->db->dbprefix . $this->_table['comments'] . '.id) FROM ' . $this->db->dbprefix . $this->_table['comments'] . ' WHERE ' . $this->db->dbprefix . $this->_table['comments'] . '.post_id = ' . $this->db->dbprefix . $this->_table['posts'] . '.id) AS comment_count', FALSE);
		$this->db->join($this->_table['categories'], $this->_table['posts'] . '.category_id = ' .$this->_table['categories'] . '.id');
		$this->db->join($this->_table['users'], $this->_table['posts'] .'.author = ' . $this->_table['users'] . '.id');
		$this->db->where($this->_table['posts'] . '.status', 'published');
		$this->db->where('url_name', $url_name);
		$this->db->order_by('id', 'DESC');
			
		$query = $this->db->get($this->_table['posts']);
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}

	public function get_posts_by_url($year, $month, $day, $url_title)
	{
		$date = $year . '-' . $month . '-' . $day;
		$this->db->select($this->_table['posts'] . '.id, ' . $this->_table['posts'] . '.author, ' . $this->_table['posts'] . '.date_posted, ' . $this->_table['posts'] . '.title, ' . $this->_table['posts'] . '.url_title, ' . $this->_table['posts'] . '.category_id, ' . $this->_table['posts'] . '.excerpt, ' . $this->_table['posts'] . '.content, ' . $this->_table['posts'] . '.allow_comments, ' . $this->_table['posts'] . '.status, ' . $this->_table['categories'] . '.name, ' . $this->_table['categories'] . '.url_name, ' . $this->_table['users'] . '.display_name');
		$this->db->select('(SELECT COUNT(' . $this->db->dbprefix . $this->_table['comments'] . '.id) FROM ' . $this->db->dbprefix . $this->_table['comments'] . ' WHERE ' . $this->db->dbprefix . $this->_table['comments'] . '.post_id = ' . $this->db->dbprefix . $this->_table['posts'] . '.id) AS comment_count', FALSE);
		$this->db->join($this->_table['categories'], $this->_table['posts'] . '.category_id = ' .$this->_table['categories'] . '.id');
		$this->db->join($this->_table['users'], $this->_table['posts'] .'.author = ' . $this->_table['users'] . '.id');
		$this->db->where($this->_table['posts'] . '.status', 'published');
		$this->db->where('url_title', $url_title);
		$this->db->where('date_posted', $date);
			
		$query = $this->db->get($this->_table['posts']);
			
		if ($query->num_rows() == 1)
		{
			return $query->row_array();
		}
	}

	public function get_posts_by_term($term)
	{
		$this->db->select($this->_table['posts'] . '.id, ' . $this->_table['posts'] . '.author, ' . $this->_table['posts'] . '.date_posted, ' . $this->_table['posts'] . '.title, ' . $this->_table['posts'] . '.url_title, ' . $this->_table['posts'] . '.category_id, ' . $this->_table['posts'] . '.excerpt, ' . $this->_table['posts'] . '.content, ' . $this->_table['posts'] . '.status, ' . $this->_table['categories'] . '.name, ' . $this->_table['categories'] . '.url_name, ' . $this->_table['users'] . '.display_name');
		$this->db->select('(SELECT COUNT(' . $this->db->dbprefix . $this->_table['comments'] . '.id) FROM ' . $this->db->dbprefix . $this->_table['comments'] . ' WHERE ' . $this->db->dbprefix . $this->_table['comments'] . '.post_id = ' . $this->db->dbprefix . $this->_table['posts'] . '.id) AS comment_count', FALSE);
		$this->db->join($this->_table['categories'], $this->_table['posts'] . '.category_id = ' .$this->_table['categories'] . '.id');
		$this->db->join($this->_table['users'], $this->_table['posts'] .'.author = ' . $this->_table['users'] . '.id');
		$this->db->where($this->_table['posts'] . '.status', 'published');
		$this->db->like('title', $term);
		$this->db->orlike('excerpt', $term);
		$this->db->orlike('content', $term);
			
		$query = $this->db->get($this->_table['posts']);
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}

	public function get_post_comment_count($id)
	{
		$this->db->select('(SELECT COUNT(' . $this->db->dbprefix . $this->_table['comments'] . '.id) FROM ' . $this->db->dbprefix . $this->_table['comments'] . ' WHERE ' . $this->db->dbprefix . $this->_table['comments'] . '.post_id = ' . $this->db->dbprefix . $this->_table['posts'] . '.id) AS comment_count', FALSE);
		$this->db->where($this->_table['posts'] . '.status', 'published');
		$this->db->where($this->_table['posts'] . '.id', $id);
			
		$query = $this->db->get($this->_table['posts']);
			
		$row = $query->row_array();

		return $row['comment_count'];
	}
}

/* End of file blog_model.php */
/* Location: ./application/modules/blog/models/blog_model.php */