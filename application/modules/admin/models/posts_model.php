<?php

class Posts_model extends Model
{
	function Posts_model()
	{
		parent::Model();
			
		$this->posts_table = 'posts';
		$this->categories_table = 'categories';
	}

	function get_posts()
	{
		$this->db->select('posts.id, posts.title, posts.url_title, posts.date_posted, posts.status, posts.category_id, categories.name, categories.url_name');
		$this->db->select('(SELECT COUNT(' . $this->db->dbprefix . 'comments.id) FROM ' . $this->db->dbprefix . 'comments WHERE ' . $this->db->dbprefix . 'comments.post_id = ' . $this->db->dbprefix . 'posts.id) AS comment_count', FALSE);
		$this->db->join('categories', 'posts.category_id = categories.id');
		$this->db->order_by('id', 'DESC');
			
		$query = $this->db->get($this->posts_table);
			
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();

			foreach (array_keys($result) as $key)
			{
				$result[$key]['url'] = date('Y', strtotime($result[$key]['date_posted'])) . '/' . date('m', strtotime($result[$key]['date_posted'])) . '/' . date('d', strtotime($result[$key]['date_posted'])) . '/' . $result[$key]['url_title']  . '/';
			}

			return $result;
		}
	}

	function get_post($id)
	{
		$this->db->select('id, title, category_id, excerpt, content, allow_comments, status');
		$this->db->where('id', $id);
			
		$query = $this->db->get($this->posts_table, 1);
			
		if ($query->num_rows() == 1)
		{
			return $query->row_array();
		}
	}

	function get_categories()
	{
		$this->db->select('id, name');

		$query = $this->db->get($this->categories_table);
			
		if ($query->num_rows() > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$data[$row['id']] = $row['name'];
			}

			return $data;
		}
	}

	function create_post()
	{
		$allow_comments = ($this->input->post('allow_comments') == 1) ? '1' : '0';
			
		$data = array
					(
						'author' => $this->session->userdata('user_id'),
						'date_posted' => date("Y-m-d"),
						'title' => $this->input->post('title'),
						'url_title' => url_title($this->input->post('title')),
						'category_id' => $this->input->post('category_id'),
						'excerpt' => $this->input->post('excerpt'),
						'content' => $this->input->post('content'),
						'allow_comments' => $allow_comments,
						'status' => $this->input->post('status')
					);
			
		$this->db->insert($this->posts_table, $data);
	}

	function edit_post()
	{
		$allow_comments = ($this->input->post('allow_comments') == 1) ? '1' : '0';
			
		$data = array
					(
						'author' => $this->session->userdata('user_id'),
						'title' => $this->input->post('title'),
						'url_title' => url_title($this->input->post('title')),
						'category_id' => $this->input->post('category_id'),
						'excerpt' => $this->input->post('excerpt'),
						'content' => $this->input->post('content'),
						'allow_comments' => $allow_comments,
						'status' => $this->input->post('status')
					);
			
		$this->db->where('id', $this->input->post('id'));
		$this->db->update($this->posts_table, $data);
	}

	function delete_post($id)
	{
		$this->db->where('id', $id);
			
		$this->db->delete($this->posts_table);
	}
}

/* End of file posts_model.php */
/* Location: ./application/modules/admin/models/posts_model.php */