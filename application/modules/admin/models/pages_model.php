<?php

class Pages_model extends Model
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
	public function get_pages()
	{
		$this->db->select('id, title, url_title, date, status');
		$this->db->order_by('id', 'ASC');
			
		$query = $this->db->get($this->_table['pages']);
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}

	public function get_page($id)
	{
		$this->db->select('id, title, content, status');
		$this->db->where('id', $id);
			
		$query = $this->db->get($this->_table['pages'], 1);
			
		if ($query->num_rows() == 1)
		{
			return $query->row_array();
		}
	}

	public function create_page()
	{
		$data = array
					(
						'author' => $this->session->userdata('user_id'),
						'date' => date("Y-m-d"),
						'title' => $this->input->post('title'),
						'url_title' => url_title($this->input->post('title'), 'dash', TRUE),
						'content' => $this->input->post('content'),
						'status' => $this->input->post('status')
					);
			
		$this->db->insert($this->_table['pages'], $data);
	}

	public function edit_page()
	{
		$data = array
					(
						'author' => $this->session->userdata('user_id'),
						'date' => date("Y-m-d"),
						'title' => $this->input->post('title'),
						'url_title' => url_title($this->input->post('title'), 'dash', TRUE),
						'content' => $this->input->post('content'),
						'status' => $this->input->post('status')
					);
			
		$this->db->where('id', $this->input->post('id'));
		$this->db->update($this->_table['pages'], $data);
	}

	public function delete_page($id)
	{
		$this->db->where('id', $id);
			
		$this->db->delete($this->_table['pages']);
	}
}

/* End of file pages_model.php */
/* Location: ./application/modules/admin/models/pages_model.php */