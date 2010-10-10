<?php

class Information_model extends Model
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
	public function check_for_upgrade()
	{
		$this->config->load('open_blog');
		
		$current_version = $this->config->item('version');
		$latest_version = @file_get_contents($this->config->item('version_check_url'));
		
		if ($latest_version == "")
		{
			return 1;
		}
		else
		{	
			$latest_version = explode('|', $latest_version);
			$latest_version['version'] = $latest_version[0];
			$latest_version['state'] = $latest_version[1];
			
			if ($current_version >= $latest_version['version'])
			{
				return 2;
			}
			else
			{
				if ($latest_version['state'] == 'important')
				{
					return 3;
				}
				else
				{
					return 4;
				}
			}
		}
	}
}