<?php

class Categories_model extends Model
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
	public function get_categories()
	{
		$this->db->select('id, name, url_name, description');
			
		$query = $this->db->get($this->_table['categories']);
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}
	
	public function get_categories_by_ids($category_ids)
	{
		$this->db->select('id, name, url_name, description');
		$this->db->where_in('id', $category_ids);
			
		$query = $this->db->get($this->_table['categories']);
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}
	
	public function get_categories_by_post($post_id)
	{
		$this->db->select('categories.name');
		$this->db->join($this->_table['categories'] . ' categories', 'posts_to_categories.category_id = categories.id');
		$this->db->where('post_id', $post_id);
		
		$query = $this->db->get($this->_table['posts_to_categories'] . ' posts_to_categories');
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}
}

/* End of file categories.php */
/* Location: ./application/modules/blog/models/categories.php */