<?php

class Rss extends Controller
{
	// Constructor
	public function __construct()
	{
		parent::Controller();
		
		// Load needed models, libraries, helpers and language files
		$this->load->module_model('blog', 'blog_model', 'blog');
		$this->load->module_model('blog', 'comments_model', 'comments');
		$this->load->module_model('blog', 'users_model', 'users');
		
		$this->load->module_language('feed', 'feed');
		
		$this->load->helper('xml');
	}
	
	// Public methods
	public function posts()
	{
		if ($this->system_library->settings['enable_rss_posts'] == 1)
		{
			$data['posts'] = $this->blog->get_posts();
			
			header("Content-Type: application/xml");
			$this->system_library->load_normal('feed/rss_posts', $data);
		}
		else
		{
			$this->_template['page']	= 'errors/feed_disabled';
			
			$this->system_library->load($this->_template['page']);
		}
	}

	public function comments()
	{
		if ($this->system_library->settings['enable_rss_comments'] == 1)
		{
			if ($data['comments'] = $this->comments->get_latest_comments())
			{
				foreach ($data['comments'] as $key => $comment)
				{
					if ($comment['user_id'] != "")
					{
						$display_name = $this->users->get_user_display_name($comment['user_id']);
						$data['comments'][$key]['author'] = $display_name;
					}
					else
					{
						$data['comments'][$key]['author'] = $comment['author'];
					}
				}
			}
			
			header("Content-Type: application/xml");
			$this->system_library->load_normal('feed/rss_comments', $data);
		}
		else
		{
			$this->_template['page']	= 'errors/feed_disabled';
			
			$this->system_library->load($this->_template['page']);
		}
	}
}

/* End of file rss.php */
/* Location: ./application/modules/feed/controllers/rss.php */