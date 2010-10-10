<?php

class Information extends Controller
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
		$this->load->module_model('admin', 'information_model', 'information');
		
		$this->load->module_language('admin', 'general');
		$this->load->module_language('admin', 'information');
		$this->load->module_language('admin', 'upgrade_check');
		
		$this->config->load('open_blog');
	}
	
	// Public methods
	public function index()
	{
		$data['version']			= $this->config->item('version');
		$data['author']				= $this->config->item('author');
		$data['author_email']		= $this->config->item('author_email');
		$data['website_url'] 		= $this->config->item('website_url');
		$data['documentation_url']	= $this->config->item('documentation_url');
		$data['bugtracker_url'] 	= $this->config->item('bugtracker_url');
		
		$this->_template['page']	= 'information/index';

		$this->system_library->load($this->_template['page'], $data, TRUE);
	}
	
	public function upgrade_check()
	{
		$current_version = $this->config->item('version');
		$data['current_version'] = $current_version;
		
		if ($this->information->check_for_upgrade() == 1)
		{
			$data['latest_version'] = 'failed';
			$data['status'] 		= $this->lang->line('check_failed');		
		}
		else
		{
			$website_url 	= $this->config->item('website_url');
			$download_url 	= $this->config->item('download_url');
			$latest_version = @file_get_contents($this->config->item('version_check_url'));
			
			$latest_version 			= explode('|', $latest_version);
			$latest_version['version']	= $latest_version[0];
			$latest_version['state'] 	= $latest_version[1];
			
			$data['latest_version'] 	= $latest_version['version'];
			
			if ($this->information->check_for_upgrade() == 2)
			{
				$data['status'] = '<font color="green">' . lang('no_upgrades') . '</font>';
			}
			else if ($this->information->check_for_upgrade() == 3)
			{
				$data['status'] = '<font color="red">' . lang('upgrades_available2', array($website_url)) . '</font>';
			}
			else if ($this->information->check_for_upgrade() == 4)
			{
				$data['status'] = '<font color="red">' . lang('upgrades_available', array($download_url)) . '</font>';
			}
		}
		
		$this->_template['page']	= 'information/upgrade_check';

		$this->system_library->load($this->_template['page'], $data, TRUE);
	}
}

/* End of file information.php */
/* Location: ./application/modules/admin/controllers/information.php */