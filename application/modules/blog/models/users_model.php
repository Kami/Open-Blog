<?php

class Users_model extends Model
{
	function Users_model()
	{
		parent::Model();
			
		$this->users_table = 'users';
	}

	function get_user_display_name($user_id)
	{
		$this->db->select('username, display_name');
		$this->db->where('id', $user_id);
		$query = $this->db->get($this->users_table, 1);
			
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

	function get_user_website($user_id)
	{
		$this->db->select('website');
		$this->db->where('id', $user_id);
		$query = $this->db->get($this->users_table, 1);
			
		if ($query->num_rows() == 1)
		{
			$row = $query->row_array();
		}
			
		return $row['website'];
	}
}

/* End of file users_model.php */
/* Location: ./application/modules/blog/models/users_model.php */