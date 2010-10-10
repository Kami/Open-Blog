<?php

class Blog extends Controller
{
	// Protected or private properties
	protected $_template;
	
	// Constructor
	public function __construct()
	{
		parent::Controller();
			
		$this->template['module'] = 'blog';
		$this->template['lang_file'] = 'blog';

		// Load needed models, libraries, helpers and language files
		$this->load->module_model('blog', 'blog_model', 'blog');
		$this->load->module_model('blog', 'users_model', 'users');
		
		$this->load->module_language('blog', 'general');
	}

	// Public methods
	public function index($page = null)
	{
		$this->load->library('pagination');

		$config['total_rows'] = $this->blog->get_posts_count();
		$config['per_page'] = $this->blog->get_posts_per_site();
			
		$this->pagination->initialize($config);
			
		$pages_count = ceil($config['total_rows'] / $config['per_page']);
		$page = ($page == 0) ? 1 : $page;
		$offset = $config['per_page'] * ($page - 1);
			
		if ($data['posts'] = $this->blog->get_posts($config['per_page'], $offset))
		{
			if ($page > $pages_count)
			{
				redirect('blog', 'refresh');
			}
		
			$data['posts_per_site'] = $this->blog->get_posts_per_site();
			$data['posts_count'] = $this->blog->get_posts_count();
			$data['pages_count'] = $pages_count;
			$data['current_page'] = $page;
			$data['next_page'] = $page + 1;
			$data['previous_page'] = $page - 1;

			foreach ($data['posts'] as $key => $post)
			{
				$data['posts'][$key]['url'] = post_url($post['url_title'], $post['date_posted']);
				$data['posts'][$key]['display_name'] = $this->users->get_user_display_name($post['author']);
			}

			$this->_template['page']	= 'blog/posts';
		}
		else
		{
			$this->_template['page']	= 'errors/no_posts';
		}
			
		$this->system_library->load($this->_template['page'], $data);
	}

	public function post($year = NULL, $month = NULL, $day = NULL, $url_title = NULL)
	{
		$this->load->module_model('blog', 'comments_model', 'comments');
		$this->load->module_model('blog', 'users_model', 'users');
			
		if ($data['post'] = $this->blog->get_posts_by_url($year, $month, $day, $url_title))
		{
			$data['post']['url'] = post_url($data['post']['url_title'], $data['post']['date_posted']);
			$data['post']['display_name'] = $this->users->get_user_display_name($data['post']['author']);
			
			if ($data['post']['allow_comments'] == 1)
			{
				$this->comment($data['post']['id'], $data['post']['url']);
			}
				
			$data['comments'] = $this->comments->get_comments($data['post']['id']);

			if ($data['comments'] != "")
			{
				foreach ($data['comments'] as $key => $comment)
				{
					$data['comments'][$key]['content']  = parse_bbcode(nl2br(parse_smileys($comment['content'], base_url() . 'application/views/admin/static/javascript/tiny_mce/plugins/emotions/img/')));

					if ($comment['user_id'] != "")
					{
						$website = $this->users->get_user_website($comment['user_id']);
						$display_name = $this->users->get_user_display_name($comment['user_id']);
						$data['comments'][$key]['author'] = "<a href=\"$website\" target=\"_blank\">$display_name</a>";
					}
					else
					{
						if ($comment['author_website'] != "")
						{
							$data['comments'][$key]['author'] = "<a href=\"" . $comment['author_website'] . "\" target=\"_blank\">" . $comment['author'] . "</a>";
						}
					}
				}
			}

			$this->_template['page']	= 'blog/single_post';
		}
		else
		{
			$this->_template['page']	= 'errors/404';
		}
			
		$this->system_library->load($this->_template['page'], $data);
	}

	public function archive($year = null, $month = null)
	{
		if ($data['posts'] = $this->blog->get_posts_by_date($year, $month))
		{
			foreach ($data['posts'] as $key => $post)
			{
				$data['posts'][$key]['url'] = post_url($post['url_title'], $post['date_posted']);
				$data['posts'][$key]['display_name'] = $this->users->get_user_display_name($post['author']);
			}

			$this->_template['page']	= 'blog/archive';
		}
		else
		{
			$this->_template['page']	= 'errors/archive_no_posts';
		}
			
		$this->system_library->load($this->_template['page'], $data);
	}

	public function category($url_name = null)
	{
			
		if ($data['posts'] = $this->blog->get_posts_by_category($url_name))
		{
			foreach ($data['posts'] as $key => $post)
			{
				$data['posts'][$key]['url'] = post_url($post['url_title'], $post['date_posted']);
				$data['posts'][$key]['display_name'] = $this->users->get_user_display_name($post['author']);
			}

			$this->_template['page']	= 'blog/archive';
		}
		else
		{
			$this->_template['page']	= 'errors/404';
		}
			
		$this->system_library->load($this->_template['page'], $data);
	}

	public function search()
	{
		$data['search_term'] = $this->input->post('term');
			
		if ($data['search_term'] != "")
		{
			if ($data['posts'] = $this->blog->get_posts_by_term($data['search_term']))
			{
				foreach ($data['posts'] as $key => $post)
				{
					$data['posts'][$key]['url'] = post_url($post['url_title'], $post['date_posted']);
					$data['posts'][$key]['display_name'] = $this->users->get_user_display_name($post['author']);
				}
					
				$this->_template['page']	= 'blog/search';
			}
			else
			{
				$this->_template['page']	= 'errors/search_no_results';
			}
				
			$this->system_library->load($this->_template['page'], $data);
		}
		else
		{
			redirect('blog', 'refresh');
		}
	}

	public function comment($id, $url)
	{
		$this->load->module_model('blog', 'comments_model', 'comments');
			
		if ($this->session->userdata('logged_in') == FALSE)
		{
			$this->form_validation->set_rules('nickname', 'lang:nickname', 'required|max_length[50]');
			$this->form_validation->set_rules('email', 'lang:email', 'required|valid_email');
		}
		
		$this->form_validation->set_rules('website', 'lang:website', '');
		$this->form_validation->set_rules('comment', 'lang:comment', 'required|max_length[400]');
			
		$this->form_validation->set_error_delimiters('', '<br />');

		if ($this->form_validation->run() == TRUE)
		{
			$this->comments->create_comment($id);
			redirect('blog/post/' . $url, 'refresh');
		}
	}
}

/* End of file blog.php */
/* Location: ./application/modules/blog/controllers/blog.php */