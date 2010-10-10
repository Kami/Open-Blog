<?php

class Links_model extends Model
{
	function Links_model()
	{
		parent::Model();
			
		$this->links_table = 'links';
	}

	function get_links()
	{
		$this->db->select('id, name, description, url, visible');
			
		$query = $this->db->get($this->links_table);
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}

	function get_link($id)
	{
		$this->db->select('id, name, url, target, description, visible');
		$this->db->where('id', $id);
			
		$query = $this->db->get($this->links_table, 1);
			
		if ($query->num_rows() == 1)
		{
			return $query->row_array();
		}
	}

	function create_link()
	{
		$data = array
					(
						'name' => $this->input->post('name'),
						'url' => $this->input->post('url'),
						'target' => $this->input->post('target'),
						'description' => $this->input->post('description'),
						'visible' => $this->input->post('visible'),
					);
			
		$this->db->insert($this->links_table, $data);
	}

	function edit_link($id)
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
		$this->db->update($this->links_table, $data);
	}

	function delete_link($id)
	{
		$this->db->where('id', $id);
			
		$this->db->delete($this->links_table);
	}
}

/* End of file links_model.php */
/* Location: ./application/modules/admin/models/links_model.php */