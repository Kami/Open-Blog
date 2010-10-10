<?php

class Comments_model extends Model
{
	function Comments_model()
	{
		parent::Model();
			
		$this->comments_table = 'comments';
		$this->posts_table = 'posts';
	}

	function get_comments($limit = 30)
	{
		$this->db->select('comments.id, comments.post_id, comments.user_id, comments.author, comments.content, comments.date, posts.title, posts.url_title, posts.date_posted');
		$this->db->join($this->posts_table, 'comments.post_id = posts.id');
		$this->db->order_by('id', 'DESC');
			
		$query = $this->db->get($this->comments_table);
			
		if ($query->num_rows() > 0)
		{
			$query->result_array();

			return $query->result_array();
		}
	}
	
	function get_comment($id)
	{
		$this->db->select('id, content');
		$this->db->where('id', $id);
			
		$query = $this->db->get($this->comments_table, 1);
			
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
	}
	
	function edit_comment()
	{
		$data = array
					(
						'content' => $this->input->post('comment')
					);

		$this->db->where('id', $this->input->post('id'));
		$this->db->update($this->comments_table, $data);
	}

	function delete_comment($id)
	{
		$this->db->where('id', $id);
			
		$this->db->delete($this->comments_table);
	}
}

/* End of file comments_model.php */
/* Location: ./application/modules/admin/models/comments_model.php */