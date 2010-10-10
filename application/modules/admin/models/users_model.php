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
	public function get_users()
	{
		$this->db->select('id, username, email, registered, level, last_login');
			
		$query = $this->db->get($this->_table['users']);
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}
	
	public function get_user($id)
	{
		$this->db->select('id, username, email, website, msn_messenger, jabber, display_name, about_me, registered, level');
		$this->db->where('id', $id);
			
		$query = $this->db->get($this->_table['users'], 1);
			
		if ($query->num_rows() == 1)
		{
			return $query->row_array();
		}
	}
	
	public function edit_user($id)
	{
		$data = array
					(
						'display_name' => $this->input->post('display_name'),
						'email' => $this->input->post('email'),
						'website' => $this->input->post('website'),
						'msn_messenger' => $this->input->post('msn_messenger'),
						'jabber' => $this->input->post('jabber'),
						'about_me' => $this->input->post('about_me'),
						'level' => $this->input->post('level')
					);
			
		$this->db->where('id', $id);
		$this->db->update($this->_table['users'], $data);
	}

	public function delete_user($id)
	{
		$this->db->where('id', $id);
			
		$this->db->delete($this->_table['users']);
	}
}

/* End of file users_model.php */
/* Location: ./application/modules/admin/models/users_model.php */