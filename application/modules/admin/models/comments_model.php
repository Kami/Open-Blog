<?php

class Comments_model extends Model
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
	public function get_comments($limit = 30)
	{
		$this->db->select('comments.id, comments.post_id, comments.user_id, comments.author, comments.content, comments.date, posts.title, posts.url_title, posts.date_posted');
		$this->db->join($this->_table['posts'], 'comments.post_id = posts.id');
		$this->db->order_by('id', 'DESC');
			
		$query = $this->db->get($this->_table['comments']);
			
		if ($query->num_rows() > 0)
		{
			$query->result_array();

			return $query->result_array();
		}
	}
	
	public function get_comment($id)
	{
		$this->db->select('id, content');
		$this->db->where('id', $id);
			
		$query = $this->db->get($this->_table['comments'], 1);
			
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
	}
	
	public function edit_comment()
	{
		$data = array
					(
						'content' => $this->input->post('comment')
					);

		$this->db->where('id', $this->input->post('id'));
		$this->db->update($this->_table['comments'], $data);
	}

	public function delete_comment($id)
	{
		$this->db->where('id', $id);
			
		$this->db->delete($this->_table['comments']);
	}
}

/* End of file comments_model.php */
/* Location: ./application/modules/admin/models/comments_model.php */