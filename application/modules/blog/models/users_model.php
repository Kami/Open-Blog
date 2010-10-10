<?php

class Users_model extends Model
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
	public function get_user_display_name($user_id)
	{
		$this->db->select('username, display_name');
		$this->db->where('id', $user_id);
		$query = $this->db->get($this->_table['users'], 1);
			
		if ($query->num_rows() == 1)
		{
			$row = $query->row_array();

			if ($row['display_name'] != "")
			{
				return $row['display_name'];
			}
			else
			{
				return $row['username'];
			}
		}
	}

	public function get_user_website($user_id)
	{
		$this->db->select('website');
		$this->db->where('id', $user_id);
		$query = $this->db->get($this->_table['users'], 1);
			
		if ($query->num_rows() == 1)
		{
			$row = $query->row_array();
		}
			
		return $row['website'];
	}
}

/* End of file users_model.php */
/* Location: ./application/modules/blog/models/users_model.php */