<?php

class User_model extends Model
{
	function User_model()
	{
		parent::Model();
			
		$this->users_table = 'users';
	}
	
	function get_user($id)
	{
		$this->db->select('id, username, email, website, msn_messenger, jabber, display_name, about_me, registered, level');
		$this->db->where('id', $id);
			
		$query = $this->db->get($this->users_table, 1);
			
		if ($query->num_rows() == 1)
		{
			return $query->row_array();
		}
	}
	
	function get_user_by_nickname($nickname)
	{
		$this->db->select('id, username, email, website, msn_messenger, jabber, display_name, about_me, registered, level');
		$this->db->where('username', $nickname);
			
		$query = $this->db->get($this->users_table, 1);
			
		if ($query->num_rows() == 1)
		{
			return $query->row_array();
		}
	}

	function verify_user($username, $password)
	{
		$this->db->select('id, username, level');
		$this->db->where('username', $username);
		$this->db->where('password', dohash($password, 'md5'));
		$this->db->where('status', '1');
			
		$query = $this->db->get($this->users_table, 1);
			
		if ($query->num_rows() == 1)
		{
			$row = $query->row();

			$data = array
						(
							'user_id' => $row->id,
							'username' => $row->username,
							'level' => $row->level,
							'logged_in' => TRUE
						);
				
			$this->session->set_userdata($data);
		}
		else
		{
			$this->session->set_flashdata('error', lang('invalid_username'));
		}
	}

	function update_last_login()
	{
		$data = array
					(
						'last_login' => date('Y-m-d H:i:s')
					);

		$this->db->where('id', $this->session->userdata('user_id'));
		$this->db->update($this->users_table, $data);
	}

	function logout()
	{
		$data = array
					(
						'user_id' => 0,
						'username' => 0,
						'level' => 0,
						'logged_in' => FALSE
					);

		$this->session->sess_destroy();
		$this->session->unset_userdata($data);
	}
	
	function validation_check($data)
	{
		$this->db->select('id');
		$this->db->where($data);
		
		$query = $this->db->get($this->users_table);
		
		if ($query->num_rows() == 1)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	function create_user()
	{
		$data = array
					(
						'username' => $this->input->post('username'),
						'password' => dohash($this->input->post('password'), 'md5'),
						'display_name' => $this->input->post('display_name'),
						'email' => $this->input->post('email'),
						'website' => $this->input->post('website'),
						'msn_messenger' => $this->input->post('msn_messenger'),
						'jabber' => $this->input->post('jabber'),
						'about_me' => $this->input->post('about_me'),
						'registered' => date('Y-m-d H:i:s')
						);

		$this->db->insert($this->users_table, $data);
	}

	function edit_profie($id)
	{
		$data = array
					(
						'display_name' => $this->input->post('display_name'),
						'email' => $this->input->post('email'),
						'website' => $this->input->post('website'),
						'msn_messenger' => $this->input->post('msn_messenger'),
						'jabber' => $this->input->post('jabber'),
						'about_me' => $this->input->post('about_me')
					);
			
		if ($this->input->post('password') != "")
		{
			$data['password'] = dohash($this->input->post('password'), 'md5');
		}
			
		$this->db->where('id', $id);
		$this->db->update($this->users_table, $data);
	}
}

/* End of file user_model.php */
/* Location: ./application/modules/user/models/user_model.php */