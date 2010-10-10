<?php

class Posts_model extends Model
{
	// Protected or private properties
	protected $_table;
	
	// Constructor
	public function __construct()
	{
		parent::Model();
		
		$this->load->module_model('admin', 'categories_model', 'categories');
		
		$this->_table = $this->config->item('database_tables');
	}

	// Public methods
	public function get_posts()
	{
		$this->db->select('posts.id, posts.title, posts.url_title, posts.date_posted, posts.status');
		$this->db->order_by('id', 'DESC');
			
		$query = $this->db->get($this->_table['posts'] . ' posts');
			
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();

			foreach (array_keys($result) as $key)
			{
				$result[$key]['categories'] = $this->categories->get_categories_by_ids($this->get_post_categories($result[$key]['id']));
				$result[$key]['comment_count'] = $this->db->where('post_id', $result[$key]['id'])->from($this->_table['comments'])->count_all_results();
			}

			return $result;
		}
	}

	public function get_post($id)
	{
		$this->db->select('id, date_posted, title, excerpt, content, allow_comments, sticky, status');
		$this->db->where('id', $id);
			
		$query = $this->db->get($this->_table['posts'], 1);
			
		if ($query->num_rows() == 1)
		{
			return $query->row_array();
		}
	}
	
	public function get_post_categories($post_id)
	{
		$this->db->select('category_id');
		$this->db->where('post_id', $post_id);
		
		$query = $this->db->get($this->_table['posts_to_categories']);
			
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();
			
			foreach ($result as $category)
			{
				$categories[] = $category['category_id'];
			}
			
			return $categories;
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
	
	public function get_tags_by_post_id($post_id)
	{
		$this->db->select('tags.id, tags.name');
		$this->db->from($this->_table['tags_to_posts'] . ' tags_to_posts');
		$this->db->join($this->_table['tags'] . ' tags', 'tags_to_posts.tag_id = tags.id', 'left');
		$this->db->where('post_id', $post_id);
		
		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();

			foreach ($query->result_array() as $row)
			{
				$data[$row['id']] = $row['name'];
			}
			
			$tags = implode(', ', $data);
			
			return $tags;
		}
	}
	
	public function get_tag_id($tag_name)
	{
		$this->db->select('id');
		$this->db->where('name', $tag_name);
		
		$query = $this->db->get($this->_table['tags'], 1);
		
		if ($query->num_rows() == 1)
		{
			$result = $query->row_array();
			
			return $result['id'];
		}
		else
		{
			return FALSE;
		}
	}
	
	public function parse_tags($tags)
	{
		$tags = str_replace(' ', '', $tags);
		$tags = explode(',', $tags);
		
		return $tags;
	}

	public function create_post()
	{
		$date_posted = ($this->input->post('publish_date') != '') ? date('Y-m-d', strtotime($this->input->post('publish_date'))) : date('Y-m-d');
		$allow_comments = ($this->input->post('allow_comments') == 1) ? '1' : '0';
		$sticky = ($this->input->post('sticky') == 1) ? '1' : '0';
			
		$data = array
					(
						'author' => $this->session->userdata('user_id'),
						'date_posted' => $date_posted,
						'title' => $this->input->post('title'),
						'url_title' => url_title($this->input->post('title'), 'dash', TRUE),
						'excerpt' => $this->input->post('excerpt'),
						'content' => $this->input->post('content'),
						'allow_comments' => $allow_comments,
						'sticky' => $sticky,
						'status' => $this->input->post('status')
					);
			
		$this->db->insert($this->_table['posts'], $data);
	}
	
	public function add_post_to_category($post_id, $category_id)
	{
		$data = array
					(
						'post_id' => $post_id,
						'category_id' => $category_id
					);
					
		$this->db->insert($this->_table['posts_to_categories'], $data);
	}
	
	public function add_tag_to_post($tag_id, $post_id)
	{
		$data = array
					(
						'tag_id' => $tag_id,
						'post_id' => $post_id
					);
					
		$this->db->insert($this->_table['tags_to_posts'], $data);
	}

	public function add_tags($tags, $post_id)
	{
		foreach ($tags as $tag)
		{
			$tag_id = $this->get_tag_id($tag);
			
			if ($tag_id == FALSE) 
			{
				$data = array
							(
								'name' => $tag
							);
					
				$this->db->insert($this->_table['tags'], $data);
				
				$tag_id = $this->db->insert_id();
			}

			$this->add_tag_to_post($tag_id, $post_id);
		}
	}
	
	public function edit_post()
	{
		$date_posted = ($this->input->post('publish_date') != '') ? date('Y-m-d', strtotime($this->input->post('publish_date'))) : date('Y-m-d');
		$allow_comments = ($this->input->post('allow_comments') == 1) ? '1' : '0';
		$sticky = ($this->input->post('sticky') == 1) ? '1' : '0';
			
		$data = array
					(
						'author' => $this->session->userdata('user_id'),
						'date_posted' => $date_posted,
						'title' => $this->input->post('title'),
						'url_title' => url_title($this->input->post('title'), 'dash', TRUE),
						'excerpt' => $this->input->post('excerpt'),
						'content' => $this->input->post('content'),
						'allow_comments' => $allow_comments,
						'sticky' => $sticky,
						'status' => $this->input->post('status')
					);
			
		$this->db->where('id', $this->input->post('id'));
		$this->db->update($this->_table['posts'], $data);
	}
	
	public function edit_post_categories($post_id, $categories)
	{
		$this->db->select('id');
		$this->db->where('post_id', $post_id);
		$this->db->where_in('category_id', $categories);
			
		$query = $this->db->get($this->_table['posts_to_categories']);

		if ($query->num_rows() != count($categories))
		{
			// delete old categories
			$this->delete_post_categories($post_id);
			
			// add new categories
			foreach ($categories as $category_id)
			{
				$this->add_post_to_category($post_id, $category_id);
			}
		}
	}
	
	public function edit_post_tags($post_id, $tags)
	{
		// delete old tags
		$this->delete_post_tags($post_id);
		
		// add new tags (if any)
		if ($tags)
		{
			$this->add_tags($this->posts->parse_tags($tags), $post_id);
		}
		
		$this->check_for_orphaned_tags();
	}

	public function delete_post($post_id)
	{
		$this->db->where('id', $post_id);
		$this->db->delete($this->_table['posts']);
		
		$this->db->where('post_id', $post_id);
		$this->db->delete($this->_table['tags_to_posts']);
		
		$this->check_for_orphanned_comments();
		$this->check_for_orphaned_tags();
	}
	
	public function delete_post_categories($post_id)
	{
		$this->db->where('post_id', $post_id);
		$this->db->delete($this->_table['posts_to_categories']);
	}
	
	public function delete_post_tags($post_id)
	{
		$this->db->where('post_id', $post_id);
		$this->db->delete($this->_table['tags_to_posts']);
	}
	
	// Private or protected methods
	protected function check_for_orphanned_comments()
	{
		$this->db->select('comments.id');
		$this->db->from($this->_table['comments'] . ' comments');
		$this->db->join($this->_table['posts'] . ' posts', 'comments.post_id = posts.id', 'left');
		$this->db->where($this->_table['posts'] . '.id IS NULL');
		
		$query = $this->db->get();
		
		// we found orphaned comments, lets delete them
		if ($query->num_rows() > 0)
		{
			$results = $query->result_array();
			
			foreach ($results as $result)
			{
				$this->db->where('id', $result['id']);
				$this->db->delete($this->_table['comments']);
			}
		}
	}
	
	protected function check_for_orphaned_tags()
	{
		$this->db->select('tags.id');
		$this->db->from($this->_table['tags'] . ' tags');
		$this->db->join($this->_table['tags_to_posts'] . ' tags_to_posts', 'tags.id = tags_to_posts.tag_id', 'left');
		$this->db->where('tags_to_posts.tag_id IS NULL');
		
		$query = $this->db->get();
		
		// we found orphaned tags, lets delete them
		if ($query->num_rows() > 0)
		{
			$results = $query->result_array();
			
			foreach ($results as $result)
			{
				$this->db->where('id', $result['id']);
				$this->db->delete($this->_table['tags']);
			}
		}
	}
}

/* End of file posts_model.php */
/* Location: ./application/modules/admin/models/posts_model.php */