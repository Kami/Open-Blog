<?php

class Navigation_model extends Model
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
	public function get_navigation_item($id)
	{
		$this->db->select('id, title, url, description, position');
		$this->db->where('id', $id);
			
		$query = $this->db->get($this->_table['navigation'], 1);
			
		if ($query->num_rows() == 1)
		{
			return $query->row_array();
		}
	}

	public function get_navigation()
	{
		$this->db->select('id, title, url, description, position');
		$this->db->order_by('position', 'ASC');
		$this->db->order_by('title', 'ASC');
			
		$query = $this->db->get($this->_table['navigation']);
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}

	public function create_navigation_item($title = null, $description = null, $url = null)
	{
		$data = array
					(
						'title' => ($title) ? $title : $this->input->post('title'),
						'description' => ($description) ? $description : $this->input->post('description'),
						'url' => ($url) ? $url : $this->input->post('url'),
						'external' => ($url) ? '0' : ((strpos($this->input->post('url'), 'http://') === FALSE) ? '0' : '1'),
						'position' => $this->get_last_position() + 1
					);
			
		$this->db->insert($this->_table['navigation'], $data);
	}

	public function edit_navigation_item($id)
	{
		$data = array
					(
						'title' => $this->input->post('title'),
						'description' => $this->input->post('description'),
						'url' => $this->input->post('url'),
						'external' => (strpos($this->input->post('url'), 'http://') === FALSE) ? '0' : '1'
					);
			
		$this->db->where('id', $id);
		$this->db->update($this->_table['navigation'], $data);
	}

	public function delete_navigation_item($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->_table['navigation']);
		
		$this->reorganize_navigation();
	}
	
	public function move_item_up($id)
	{
		$previous_item_id = $this->get_previous_item_id($this->get_item_position($id));
		
		$this->db->set('position', 'position-1', FALSE);
		
		$this->db->where('id', $id);
		$this->db->update($this->_table['navigation']);
		
		$this->db->set('position', 'position+1', FALSE);
		
		$this->db->where('id', $previous_item_id);
		$this->db->update($this->_table['navigation']);
	}
	
	public function move_item_down($id)
	{
		$next_item_id = $this->get_next_item_id($this->get_item_position($id));
		
		$this->db->set('position', 'position+1', FALSE);
		
		$this->db->where('id', $id);
		$this->db->update($this->_table['navigation']);
		
		$this->db->set('position', 'position-1', FALSE);
		
		$this->db->where('id', $next_item_id);
		$this->db->update($this->_table['navigation']);
	}
	
	// Private or protected methods
	public function reorganize_navigation()
	{
		$this->db->select('id');
		
		$query = $this->db->get($this->_table['navigation']);
			
		if ($query->num_rows() > 0)
		{
			$result =  $query->result_array();
			
			$i = 0;

			foreach ($result as $row)
			{
				$this->db->set('position', ++$i);
				$this->db->where('id', $row['id']);
				$this->db->update($this->_table['navigation']);
			}
		}
	}
	
	protected function get_item_position($id)
	{
		$this->db->select('position');
		$this->db->where('id', $id);
		
		$query = $this->db->get($this->_table['navigation'], 1);
			
		if ($query->num_rows() == 1)
		{
			$result = $query->row_array();
			
			return $result['position'];
		}
	}
	
	protected function get_last_position()
	{
		$this->db->select('MAX(position) AS position');
		
		$query = $this->db->get($this->_table['navigation'], 1);
			
		if ($query->num_rows() == 1)
		{
			$result = $query->row_array();
			
			return $result['position'];
		}
	}
	
	protected function get_previous_item_id($position)
	{
		$this->db->select('id');
		$this->db->where('position', $position - 1);
		
		$query = $this->db->get($this->_table['navigation'], 1);
			
		if ($query->num_rows() == 1)
		{
			$result = $query->row_array();
			
			return $result['id'];
		}
	}
	
	protected function get_next_item_id($position)
	{
		$this->db->select('id');
		$this->db->where('position', $position + 1);
		
		$query = $this->db->get($this->_table['navigation'], 1);
			
		if ($query->num_rows() == 1)
		{
			$result = $query->row_array();
			
			return $result['id'];
		}
	}
}

/* End of file navigation_model.php */
/* Location: ./application/modules/admin/models/navigation_model.php */