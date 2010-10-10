<?php

class Pages_model extends Model
{
	function Pages_model()
	{
		parent::Model();
			
		$this->pages_table = 'pages';
	}

	function get_pages()
	{
		$this->db->select('id, title, url_title, date, status');
		$this->db->order_by('id', 'ASC');
			
		$query = $this->db->get($this->pages_table);
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}

	function get_page($id)
	{
		$this->db->select('id, title, content, status');
		$this->db->where('id', $id);
			
		$query = $this->db->get($this->pages_table, 1);
			
		if ($query->num_rows() == 1)
		{
			return $query->row_array();
		}
	}

	function create_page()
	{
		$data = array
					(
						'author' => $this->session->userdata('user_id'),
						'date' => date("Y-m-d"),
						'title' => $this->input->post('title'),
						'url_title' => url_title($this->input->post('title')),
						'content' => $this->input->post('content'),
						'status' => $this->input->post('status')
					);
			
		$this->db->insert($this->pages_table, $data);
	}

	function edit_page()
	{
		$data = array
					(
						'author' => $this->session->userdata('user_id'),
						'date' => date("Y-m-d"),
						'title' => $this->input->post('title'),
						'url_title' => url_title($this->input->post('title')),
						'content' => $this->input->post('content'),
						'status' => $this->input->post('status')
					);
			
		$this->db->where('id', $this->input->post('id'));
		$this->db->update($this->pages_table, $data);
	}

	function delete_page($id)
	{
		$this->db->where('id', $id);
			
		$this->db->delete($this->pages_table);
	}
}

/* End of file pages_model.php */
/* Location: ./application/modules/admin/models/pages_model.php */