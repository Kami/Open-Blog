<?php

class Statistics extends Controller
{
	// Protected or private properties
	protected $_template;
	
	// Constructor
	public function __construct()
	{
		parent::Controller();

		// Check if the logged user is an administrator
		$this->access_library->check_access();

		// Load needed models, libraries, helpers and language files
		$this->load->module_model('admin', 'statistics_model', 'statistics');
		
		$this->load->module_language('admin', 'general');
		$this->load->module_language('admin', 'statistics');
	}

	// Public methods
	public function index()
	{
		$data['posts_count_all'] = $this->statistics->get_posts_count();
		$data['posts_count_published'] = $this->statistics->get_posts_count('published');
		$data['posts_count_draft'] = $this->statistics->get_posts_count('draft');
		$data['post_with_most_comments'] = $this->statistics->get_post_with_most_comments();
		$data['categories_count'] = $this->statistics->get_categories_count();
		$data['category_with_most_posts'] = $this->statistics->get_category_with_most_posts();
		$data['comments_count_all'] = $this->statistics->get_comments_count();
		$data['comments_count_members'] = $this->statistics->get_comments_count('members');
		$data['comments_count_guests'] = $this->statistics->get_comments_count('guests');

		$this->_template['page']	= 'statistics/index';

		$this->system_library->load($this->_template['page'], $data, TRUE);
	}
}

/* End of file statistics.php */
/* Location: ./application/modules/admin/controllers/statistics.php */