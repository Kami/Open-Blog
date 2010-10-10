<?php

class Information extends Controller
{
	function Information()
	{
		parent::Controller();
			
		$this->access_library->check_access();
		
		$this->load->module_language('admin', 'general');
		$this->load->module_language('admin', 'information');
	}
	
	function upgrade_check()
	{
		$this->config->load('open_blog');
		
		$current_version = $this->config->item('version');
		$latest_version['version'] = @file_get_contents($this->config->item('version_check_url'));
		$download_url = ($this->config->item('download_url'));
		$data = explode(' ', $latest_version['version']);

		$data['current_version'] = $current_version;
		$data['latest_version'] = $latest_version['version'];
		
		if ($latest_version['version'] == "")
		{
			$data['status'] = $this->lang->line('check_failed');
		}
		else
		{
			$latest_version['number'] = $data[0];
			$latest_version['state'] = $data[1];
			
			switch ($latest_version['state'])
			{
				case 'dev' :
					$latest_version['state'] = "development";
				break;
				
				case 'prealpha' :
					$latest_version['state'] = "pre alpha";
				break;
				
				case 'beta' :
					$latest_version['state'] = "beta";
				break;
				
				case 'stable' :
					$latest_version['state'] = "stable";
				break;
			}
		
			if ($current_version >= $latest_version['version'])
			{
				$data['status'] = "<font color=\"green\">" . lang('no_upgrades') . "</font>";
			}
			else
			{
				$data['status'] = "<font color=\"red\">" . lang('upgrades_available', array($download_url)) . "</font>";
			}
		}
		
		$this->template['page']	= "information/upgrade_check";

		$this->system->load($this->template['page'], $data, TRUE);
	}
}

/* End of file information.php */
/* Location: ./application/modules/admin/controllers/information.php */