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

	public function get_category($id)
	{
		$this->db->select('id, name, description');
		$this->db->where('id', $id);
			
		$query = $this->db->get($this->_table['categories'], 1);
			
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
	}

	public function create_category()
	{
		$data = array
					(
						'name' => $this->input->post('name'),
						'url_name' => url_title($this->input->post('name')),
						'description' => $this->input->post('description')
					);

		$this->db->insert($this->_table['categories'], $data);
	}

	public function edit_category()
	{
		$data = array
					(
						'name' => $this->input->post('name'),
						'url_name' => url_title($this->input->post('name')),
						'description' => $this->input->post('description')
					);

		$this->db->where('id', $this->input->post('id'));
		$this->db->update($this->_table['categories'], $data);
	}

	public function delete_category($id)
	{
		$this->db->where('id', $id);
			
		$this->db->delete($this->_table['categories']);
	}
}

/* End of file categories_model.php */
/* Location: ./application/modules/admin/models/categories_model.php */