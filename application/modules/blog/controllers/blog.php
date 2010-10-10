<?php

class Blog extends Controller
{
	function Blog()
	{
		parent::Controller();
			
		$this->template['module'] = "blog";
		$this->template['lang_file'] = "blog";
			
		$this->load->module_model('blog', 'blog_model', 'blog');
		$this->load->module_model('blog', 'users_model', 'users');
		$this->load->module_language('blog', 'general');
	}

	function index($page = null)
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
				$data['posts'][$key]['url'] = date('Y', strtotime($post['date_posted'])) . '/' . date('m', strtotime($post['date_posted'])) . '/' . date('d', strtotime($post['date_posted'])) . '/' . $post['url_title']  . '/';
				$data['posts'][$key]['display_name'] = $this->users->get_user_display_name($post['author']);
			}

			$this->template['page']	= "blog/posts";
		}
		else
		{
			$this->template['page']	= "errors/no_posts";
		}
			
		$this->system->load($this->template['page'], $data);
	}

	function post($year = NULL, $month = NULL, $day = NULL, $url_title = NULL)
	{
		$this->load->module_model('blog', 'comments_model', 'comments');
		$this->load->module_model('blog', 'users_model', 'users');
			
		if ($data['post'] = $this->blog->get_posts_by_url($year, $month, $day, $url_title))
		{
			$data['post']['url'] = date('Y', strtotime($data['post']['date_posted'])) . '/' . date('m', strtotime($data['post']['date_posted'])) . '/' . date('d', strtotime($data['post']['date_posted'])) . '/' . $data['post']['url_title']  . '/';
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

			$this->template['page']	= "blog/single_post";
		}
		else
		{
			$this->template['page']	= "errors/404";
		}
			
		$this->system->load($this->template['page'], $data);
	}

	function archive($year = null, $month = null)
	{
		if ($data['posts'] = $this->blog->get_posts_by_date($year, $month))
		{
			foreach ($data['posts'] as $key => $post)
			{
				$data['posts'][$key]['url'] = date('Y', strtotime($post['date_posted'])) . '/' . date('m', strtotime($post['date_posted'])) . '/' . date('d', strtotime($post['date_posted'])) . '/' . $post['url_title']  . '/';
				$data['posts'][$key]['display_name'] = $this->users->get_user_display_name($post['author']);
			}

			$this->template['page']	= "blog/archive";
		}
		else
		{
			$this->template['page']	= "errors/archive_no_posts";
		}
			
		$this->system->load($this->template['page'], $data);
	}

	function category($url_name = null)
	{
			
		if ($data['posts'] = $this->blog->get_posts_by_category($url_name))
		{
			foreach ($data['posts'] as $key => $post)
			{
				$data['posts'][$key]['url'] = date('Y', strtotime($post['date_posted'])) . '/' . date('m', strtotime($post['date_posted'])) . '/' . date('d', strtotime($post['date_posted'])) . '/' . $post['url_title']  . '/';
				$data['posts'][$key]['display_name'] = $this->users->get_user_display_name($post['author']);
			}

			$this->template['page']	= "blog/archive";
		}
		else
		{
			$this->template['page']	= "errors/404";
		}
			
		$this->system->load($this->template['page'], $data);
	}

	function search()
	{
		$data['search_term'] = $this->input->post('term');
			
		if ($data['search_term'] != "")
		{
			if ($data['posts'] = $this->blog->get_posts_by_term($data['search_term']))
			{
				foreach ($data['posts'] as $key => $post)
				{
					$data['posts'][$key]['url'] = date('Y', strtotime($post['date_posted'])) . '/' . date('m', strtotime($post['date_posted'])) . '/' . date('d', strtotime($post['date_posted'])) . '/' . $post['url_title']  . '/';
					$data['posts'][$key]['display_name'] = $this->users->get_user_display_name($post['author']);
				}
					
				$this->template['page']	= "blog/search";
			}
			else
			{
				$this->template['page']	= "errors/search_no_results";
			}
				
			$this->system->load($this->template['page'], $data);
		}
		else
		{
			redirect('blog', 'refresh');
		}
	}

	function comment($id, $url)
	{
		$this->load->module_model('blog', 'comments_model', 'comments');
			
		if ($this->session->userdata('logged_in') == FALSE)
		{
			$rules['nickname']		= "required|max_length[50]";
			$rules['email']			= "required|valid_email";
		}
			
		$rules['comment']		= "required|max_length[400]";
		$this->validation->set_rules($rules);

		$fields['nickname']	= strtolower_utf8(lang('nickname'));
		$fields['email']	= strtolower_utf8(lang('email'));
		$fields['website']	= strtolower_utf8(lang('website'));
		$fields['comment']	= strtolower_utf8(lang('comment'));
		$this->validation->set_fields($fields);
			
		$this->validation->set_error_delimiters('', '<br />');

		if ($this->validation->run() == TRUE)
		{
			$this->comments->create_comment($id);
			redirect('blog/post/' . $url, 'refresh');
		}
	}
}

/* End of file blog.php */
/* Location: ./application/modules/blog/controllers/blog.php */