<?php

class Blog_model extends Model
{
	function Blog_model()
	{
		parent::Model();
			
		$this->settings_table = 'settings';
		$this->posts_table = 'posts';
	}

	function get_posts_per_site()
	{
		$this->db->select('posts_per_site');
		$this->db->where('id', '1');
			
		$query = $this->db->get($this->settings_table, 1);
			
		if ($query->num_rows() == 1)
		{
			$row = $query->row_array();
		}
			
		return $row['posts_per_site'];
	}

	function get_posts_count()
	{
		$this->db->select('id');
		$this->db->where('status', 'published');
			
		$query = $this->db->count_all_results('posts');
			
		return $query;
	}

	function get_posts($number = 10, $offset = 0)
	{
		$this->db->select('posts.id, posts.author, posts.date_posted, posts.title, posts.url_title, posts.category_id, posts.excerpt, posts.content, categories.name, categories.url_name, users.display_name');
		$this->db->select('(SELECT COUNT(' . $this->db->dbprefix . 'comments.id) FROM ' . $this->db->dbprefix . 'comments WHERE ' . $this->db->dbprefix . 'comments.post_id = ' . $this->db->dbprefix . 'posts.id) AS comment_count', FALSE);
		$this->db->join('categories', 'posts.category_id = categories.id');
		$this->db->join('users', 'posts.author = users.id');
		$this->db->where('posts.status', 'published');
		$this->db->order_by('id', 'DESC');
			
		$query = $this->db->get($this->posts_table, $number, $offset);
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}

	function get_posts_by_date($year, $month)
	{
		$date = $year . '-' . $month;
		$this->db->select('posts.id, posts.author, posts.date_posted, posts.title, posts.url_title, posts.category_id, posts.excerpt, posts.content, posts.allow_comments, categories.name, categories.url_name, users.display_name');
		$this->db->select('(SELECT COUNT(' . $this->db->dbprefix . 'comments.id) FROM ' . $this->db->dbprefix . 'comments WHERE ' . $this->db->dbprefix . 'comments.post_id = ' . $this->db->dbprefix . 'posts.id) AS comment_count', FALSE);
		$this->db->join('categories', 'posts.category_id = categories.id');
		$this->db->join('users', 'posts.author = users.id');
		$this->db->where('posts.status', 'published');
		$this->db->like('date_posted', $date);
		$this->db->order_by('id', 'DESC');
			
		$query = $this->db->get($this->posts_table);
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}

	function get_posts_by_category($url_name)
	{
		$this->db->select('posts.id, posts.author, posts.date_posted, posts.title, posts.url_title, posts.category_id, posts.excerpt, posts.content, posts.allow_comments, categories.name, categories.url_name, users.display_name');
		$this->db->select('(SELECT COUNT(' . $this->db->dbprefix . 'comments.id) FROM ' . $this->db->dbprefix . 'comments WHERE ' . $this->db->dbprefix . 'comments.post_id = ' . $this->db->dbprefix . 'posts.id) AS comment_count', FALSE);
		$this->db->join('categories', 'posts.category_id = categories.id');
		$this->db->join('users', 'posts.author = users.id');
		$this->db->where('posts.status', 'published');
		$this->db->where('url_name', $url_name);
		$this->db->order_by('id', 'DESC');
			
		$query = $this->db->get($this->posts_table);
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}

	function get_posts_by_url($year, $month, $day, $url_title)
	{
		$date = $year . '-' . $month . '-' . $day;
		$this->db->select('posts.id, posts.author, posts.date_posted, posts.title, posts.url_title, posts.category_id, posts.excerpt, posts.content, posts.allow_comments, categories.name, categories.url_name, users.display_name');
		$this->db->select('(SELECT COUNT(' . $this->db->dbprefix . 'comments.id) FROM ' . $this->db->dbprefix . 'comments WHERE ' . $this->db->dbprefix . 'comments.post_id = ' . $this->db->dbprefix . 'posts.id) AS comment_count', FALSE);
		$this->db->join('categories', 'posts.category_id = categories.id');
		$this->db->join('users', 'posts.author = users.id');
		$this->db->where('posts.status', 'published');
		$this->db->where('url_title', $url_title);
		$this->db->where('date_posted', $date);
			
		$query = $this->db->get($this->posts_table);
			
		if ($query->num_rows() == 1)
		{
			return $query->row_array();
		}
	}

	function get_posts_by_term($term)
	{
		$this->db->select('posts.id, posts.author, posts.date_posted, posts.title, posts.url_title, posts.category_id, posts.excerpt, posts.content, posts.status, categories.name, categories.url_name, users.display_name');
		$this->db->select('(SELECT COUNT(' . $this->db->dbprefix . 'comments.id) FROM ' . $this->db->dbprefix . 'comments WHERE ' . $this->db->dbprefix . 'comments.post_id = ' . $this->db->dbprefix . 'posts.id) AS comment_count', FALSE);
		$this->db->join('categories', 'posts.category_id = categories.id');
		$this->db->join('users', 'posts.author = users.id');
		$this->db->where('posts.status', 'published');
		$this->db->like('title', $term);
		$this->db->orlike('excerpt', $term);
		$this->db->orlike('content', $term);
			
		$query = $this->db->get($this->posts_table);
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}

	function get_post_comment_count($id)
	{
		$this->db->select('(SELECT COUNT(' . $this->db->dbprefix . 'comments.id) FROM ' . $this->db->dbprefix . 'comments WHERE ' . $this->db->dbprefix . 'comments.post_id = ' . $this->db->dbprefix . 'posts.id) AS comment_count', FALSE);
		$this->db->where('posts.status', 'published');
		$this->db->where('posts.id', $id);
			
		$query = $this->db->get($this->posts_table);
			
		$row = $query->row_array();

		return $row['comment_count'];
	}
}

/* End of file blog_model.php */
/* Location: ./application/modules/blog/models/blog_model.php */