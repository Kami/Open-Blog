<?php

class Pages extends Controller
{
	// Protected or private properties
	protected $_template;
	
	// Constructor
	public function __construct()
	{
		parent::Controller();

		// Load needed models, libraries, helpers and language files
		$this->load->module_model('pages', 'pages_model', 'pages');
		
		$this->load->module_language('blog', 'general');
	}

	// Public methods
	public function page($url_title)
	{
		$data['page_data'] = $this->pages->get_page_by_url($url_title);
			
		if ($data['page_data'] != "")
		{
			$this->_template['page']	= 'pages/page';
		}
		else
		{
			$this->_template['page']	= 'errors/404';
		}
			
		$this->system_library->load($this->_template['page'], $data);
	}
}

/* End of file pages.php */
/* Location: ./application/modules/pages/controllers/pages.php */