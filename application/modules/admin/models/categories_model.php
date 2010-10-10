<?php

class Categories_model extends Model
{
	function Categories_model()
	{
		parent::Model();
			
		$this->categories_table = 'categories';
	}

	function get_categories()
	{
		$this->db->select('id, name, description');
			
		$query = $this->db->get($this->categories_table);
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}

	function get_category($id)
	{
		$this->db->select('id, name, description');
		$this->db->where('id', $id);
			
		$query = $this->db->get($this->categories_table, 1);
			
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
	}

	function create_category()
	{
		$data = array
					(
						'name' => $this->input->post('name'),
						'url_name' => url_title($this->input->post('name')),
						'description' => $this->input->post('description')
					);

		$this->db->insert($this->categories_table, $data);
	}

	function edit_category()
	{
		$data = array
					(
						'name' => $this->input->post('name'),
						'url_name' => url_title($this->input->post('name')),
						'description' => $this->input->post('description')
					);

		$this->db->where('id', $this->input->post('id'));
		$this->db->update($this->categories_table, $data);
	}

	function delete_category($id)
	{
		$this->db->where('id', $id);
			
		$this->db->delete($this->categories_table);
	}
}

/* End of file categories_model.php */
/* Location: ./application/modules/admin/models/categories_model.php */