<?php

class Sidebar_model extends Model
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
	public function get_sidebar()
	{
		$this->db->select('id, title, file, status, position');
		$this->db->order_by('position', 'ASC');
		$this->db->order_by('title', 'ASC');
			
		$query = $this->db->get($this->_table['sidebar']);
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}
	
	public function enable_sidebar_item($id)
	{
		$this->db->set('status', 'enabled');
		
		$this->db->where('id', $id);
		$this->db->update($this->_table['sidebar']);
	}
	
	public function disable_sidebar_item($id)
	{
		$this->db->set('status', 'disabled');
		
		$this->db->where('id', $id);
		$this->db->update($this->_table['sidebar']);
	}
	
	public function delete_sidebar_item($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->_table['sidebar']);
		
		$this->reorganize_sidebar();
	}
	
	public function move_item_up($id)
	{
		$previous_item_id = $this->get_previous_item_id($this->get_item_position($id));
		
		$this->db->set('position', 'position-1', FALSE);
		
		$this->db->where('id', $id);
		$this->db->update($this->_table['sidebar']);
		
		$this->db->set('position', 'position+1', FALSE);
		
		$this->db->where('id', $previous_item_id);
		$this->db->update($this->_table['sidebar']);
	}
	
	public function move_item_down($id)
	{
		$next_item_id = $this->get_next_item_id($this->get_item_position($id));
		
		$this->db->set('position', 'position+1', FALSE);
		
		$this->db->where('id', $id);
		$this->db->update($this->_table['sidebar']);
		
		$this->db->set('position', 'position-1', FALSE);
		
		$this->db->where('id', $next_item_id);
		$this->db->update($this->_table['sidebar']);
	}
	
	// Private or protected methods
	public function reorganize_sidebar()
	{
		$this->db->select('id');
		
		$query = $this->db->get($this->_table['sidebar']);
			
		if ($query->num_rows() > 0)
		{
			$result =  $query->result_array();
			
			$i = 0;

			foreach ($result as $row)
			{
				$this->db->set('position', ++$i);
				$this->db->where('id', $row['id']);
				$this->db->update($this->_table['sidebar']);
			}
		}
	}
	
	protected function get_item_position($id)
	{
		$this->db->select('position');
		$this->db->where('id', $id);
		
		$query = $this->db->get($this->_table['sidebar'], 1);
			
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
		
		$query = $this->db->get($this->_table['sidebar'], 1);
			
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
		
		$query = $this->db->get($this->_table['sidebar'], 1);
			
		if ($query->num_rows() == 1)
		{
			$result = $query->row_array();
			
			return $result['id'];
		}
	}
}

/* End of file sidebar_model.php */
/* Location: ./application/modules/admin/models/sidebar_model.php */