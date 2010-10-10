<?php

class Links_model extends Model
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
	public function get_links()
	{
		$this->db->select('id, name, description, url, visible');
			
		$query = $this->db->get($this->_table['links']);
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}

	public function get_link($id)
	{
		$this->db->select('id, name, url, target, description, visible');
		$this->db->where('id', $id);
			
		$query = $this->db->get($this->_table['links'], 1);
			
		if ($query->num_rows() == 1)
		{
			return $query->row_array();
		}
	}

	public function create_link()
	{
		$data = array
					(
						'name' => $this->input->post('name'),
						'url' => $this->input->post('url'),
						'target' => $this->input->post('target'),
						'description' => $this->input->post('description'),
						'visible' => $this->input->post('visible'),
					);
			
		$this->db->insert($this->_table['links'], $data);
	}

	public function edit_link($id)
	{
		$data = array
					(
						'name' => $this->input->post('name'),
						'url' => $this->input->post('url'),
						'target' => $this->input->post('target'),
						'description' => $this->input->post('description'),
						'visible' => $this->input->post('visible'),
					);
			
		$this->db->where('id', $id);
		$this->db->update($this->_table['links'], $data);
	}

	public function delete_link($id)
	{
		$this->db->where('id', $id);
			
		$this->db->delete($this->_table['links']);
	}
}

/* End of file links_model.php */
/* Location: ./application/modules/admin/models/links_model.php */