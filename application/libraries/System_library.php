<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class System_library
{
	// Public properties
	public $settings = array();
	// Protected or private properties
	protected $_table;
	
	// Constructor
	public function __construct()
	{
		if (!isset($this->CI))
		{
			$this->CI =& get_instance();
		}
		
		// Load needed models, libraries, helpers and language files
		$this->CI->load->library('user_agent');
		$this->CI->config->load('database_tables', TRUE);
		
		$this->_table = $this->CI->config->item('database_tables');
		$this->CI->config->set_item('language', $this->get_default_language());
		
		$this->get_site_info();
	}

	// Public methods
	public function get_default_template()
	{
		$this->CI->db->select('path');
		$this->CI->db->where('is_default', '1');
		
		$query = $this->CI->db->get($this->_table['templates'], 1);
		
		if ($query->num_rows() == 1)
		{
			$row = $query->row_array();
		}
		
		return $row['path'];
	}
	
	public function get_default_language()
	{
		$this->CI->db->select('language');
		$this->CI->db->where('is_default', '1');
		
		$query = $this->CI->db->get($this->_table['languages'], 1);
		
		if ($query->num_rows() == 1)
		{
			$row = $query->row_array();
		}
		
		return $row['language'];
	}
	
	public function get_site_info()
	{
		$this->CI->db->select('name, value');
		
		$query = $this->CI->db->get($this->_table['settings']);
		
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();

			foreach ($result as $row)
			{
				$this->settings[$row['name']] = $row['value'];
			}
		}
	}
	
	public function check_site_status()
	{
		$this->CI->db->select('name, value');
		$this->CI->db->where('name', 'enabled');
		
		$query = $this->CI->db->get($this->_table['settings'], 1);
		
		if ($query->num_rows() == 1)
		{
			$result = $query->row_array();
			
			if ($result['value'] == 0)
			{
				$data['offline_reason'] = $this->settings['offline_reason'];
				
				$this->CI->load->view('admin/layout/pages/offline', $data);
				die();
			}
		}
	}
	
	public function generate_social_bookmarking_links($post_url, $post_title)
	{
		$links = '';
		
		if ($this->settings['enable_digg'] == 1)
		{
			$links = '<a href="http://digg.com/submit?phase=2&amp;url=' . $post_url . '&amp;title=' . $post_title . '" target="_blank">Digg</a>';
		}
		
		if ($this->settings['enable_technorati'] == 1)
		{
			$links .= ($links) ?  ' | ' : '';
			$links .= '<a href="http://technorati.com/faves?add=' . $post_url . '" target="_blank">Technorati</a>';
		}
		
		if ($this->settings['enable_delicious'] == 1)
		{
			$links .= ($links) ?  ' | ' : '';
			$links .= '<a href="http://del.icio.us/post?url=' . $post_url . '&amp;title=' . $post_title . '" target="_blank">del.icio.us</a>';
		}
		
		if ($this->settings['enable_stumbleupon'] == 1)
		{
			$links .= ($links) ?  ' | ' : '';
			$links .= '<a href="http://www.stumbleupon.com/submit?url=' . $post_url . '&amp;title=' . $post_title . '" target="_blank">Stumbleupon</a>';
		}
		
		if ($this->settings['enable_reddit'] == 1)
		{
			$links .= ($links) ?  ' | ' : '';
			$links .= '<a href="http://reddit.com/submit?url=' . $post_url . '&amp;title=' . $post_title . '" target="_blank">reddit</a>';
		}
		
		if ($this->settings['enable_furl'] == 1)
		{
			$links .= ($links) ?  ' | ' : '';
			$links .= '<a href="http://www.furl.net/storeIt.jsp?t=' . $post_title . '&amp;u=' . $post_url . '" target="_blank">Furl</a>';
		}
		
		return $links;
	}
	
	public function load($page, $data = NULL, $admin = FALSE)
	{
		$data['page'] = $page;

		if ($this->settings['recognize_user_agent'] == 1)
		{
			if ($admin == TRUE)
			{
				$this->CI->load->view('admin/layout/container', $data);
			}
			else if ($this->CI->agent->is_mobile())
			{
				$user_agent = $this->CI->agent->mobile();

				// iPhone or iPod Touch
				if ($user_agent == 'Apple iPhone' || $user_agent == 'Apple iPod Touch')
				{
					$this->CI->load->view('iphone/layout/container', $data);
				}
				else // Mobile phone or PDA
				{
					$this->CI->load->view('mobile/layout/container', $data);
				}
				
			}
			else
			{
				$template = $this->get_default_template();
				$this->CI->load->view('templates/' . $template . '/layout/container', $data);
			}
		}
		else
		{
			if ($admin == TRUE)
			{
				$this->CI->load->view('admin/layout/container', $data);
			}
			else
			{
				$template = $this->get_default_template();
				$this->CI->load->view('templates/' . $template . '/layout/container', $data);
			}
		}
	}
	
	public function load_normal($page, $data = NULL)
	{
		$template = $this->get_default_template();
		
		$this->CI->load->view('templates/' . $template . '/layout/pages/' . $page, $data);
	}
}

/* End of file System.php */
/* Location: ./application/libraries/System.php */