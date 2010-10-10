<?php

class Navigation_model extends Model
{
	function Navigation_model()
	{
		parent::Model();
			
		$this->navigation_table = 'navigation';
	}

	function get_navigation_item($id)
	{
		$this->db->select('id, title, url, description, position');
		$this->db->where('id', $id);
			
		$query = $this->db->get($this->navigation_table, 1);
			
		if ($query->num_rows() == 1)
		{
			return $query->row_array();
		}
	}

	function get_navigation()
	{
		$this->db->select('id, title, url, description, position');
		$this->db->order_by('position', 'ASC');
		$this->db->order_by('title', 'ASC');
			
		$query = $this->db->get($this->navigation_table);
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}

	function create_navigation_item()
	{
		$data = array
					(
						'title' => $this->input->post('title'),
						'description' => $this->input->post('description'),
						'url' => $this->input->post('url'),
						'position' => $this->input->post('position'),
					);
			
		$this->db->insert($this->navigation_table, $data);
	}

	function edit_navigation_item($id)
	{
		$data = array
					(
						'title' => $this->input->post('title'),
						'description' => $this->input->post('description'),
						'url' => $this->input->post('url'),
						'position' => $this->input->post('position'),
					);
			
		$this->db->where('id', $id);
		$this->db->update($this->navigation_table, $data);
	}

	function delete_navigation_item($id)
	{
		$this->db->where('id', $id);
			
		$this->db->delete($this->navigation_table);
	}
}

/* End of file navigation_model.php */
/* Location: ./application/modules/admin/models/navigation_model.php */