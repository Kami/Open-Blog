<?php

class Posts_model extends Model
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
	public function get_posts()
	{
		$this->db->select($this->_table['posts'] . '.id, ' . $this->_table['posts'] . '.title, ' . $this->_table['posts'] . '.url_title, ' . $this->_table['posts'] . '.date_posted, ' . $this->_table['posts'] . '.status, ' . $this->_table['posts'] . '.category_id, ' . $this->_table['categories'] . '.name, ' . $this->_table['categories'] . '.url_name');
		$this->db->select('(SELECT COUNT(' . $this->db->dbprefix . $this->_table['comments'] . '.id) FROM ' . $this->db->dbprefix . $this->_table['comments'] . ' WHERE ' . $this->db->dbprefix . $this->_table['comments'] . '.post_id = ' . $this->db->dbprefix . $this->_table['posts'] . '.id) AS comment_count', FALSE);
		$this->db->join($this->_table['categories'], $this->_table['posts'] . '.category_id = ' . $this->_table['categories'] . '.id');
		$this->db->order_by('id', 'DESC');
			
		$query = $this->db->get($this->_table['posts']);
			
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

	public function get_post($id)
	{
		$this->db->select('id, title, category_id, excerpt, content, allow_comments, status');
		$this->db->where('id', $id);
			
		$query = $this->db->get($this->_table['posts'], 1);
			
		if ($query->num_rows() == 1)
		{
			return $query->row_array();
		}
	}

	public function get_categories()
	{
		$this->db->select('id, name');

		$query = $this->db->get($this->_table['categories']);
			
		if ($query->num_rows() > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$data[$row['id']] = $row['name'];
			}

			return $data;
		}
	}

	public function create_post()
	{
		$allow_comments = ($this->input->post('allow_comments') == 1) ? '1' : '0';
			
		$data = array
					(
						'author' => $this->session->userdata('user_id'),
						'date_posted' => date("Y-m-d"),
						'title' => $this->input->post('title'),
						'url_title' => url_title($this->input->post('title'), 'dash', TRUE),
						'category_id' => $this->input->post('category_id'),
						'excerpt' => $this->input->post('excerpt'),
						'content' => $this->input->post('content'),
						'allow_comments' => $allow_comments,
						'status' => $this->input->post('status')
					);
			
		$this->db->insert($this->_table['posts'], $data);
	}

	public function edit_post()
	{
		$allow_comments = ($this->input->post('allow_comments') == 1) ? '1' : '0';
			
		$data = array
					(
						'author' => $this->session->userdata('user_id'),
						'title' => $this->input->post('title'),
						'url_title' => url_title($this->input->post('title'), 'dash', TRUE),
						'category_id' => $this->input->post('category_id'),
						'excerpt' => $this->input->post('excerpt'),
						'content' => $this->input->post('content'),
						'allow_comments' => $allow_comments,
						'status' => $this->input->post('status')
					);
			
		$this->db->where('id', $this->input->post('id'));
		$this->db->update($this->_table['posts'], $data);
	}

	public function delete_post($id)
	{
		$this->db->where('id', $id);
			
		$this->db->delete($this->_table['posts']);
	}
}

/* End of file posts_model.php */
/* Location: ./application/modules/admin/models/posts_model.php */