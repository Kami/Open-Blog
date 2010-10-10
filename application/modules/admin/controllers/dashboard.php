<?php

class Dashboard extends Controller
{
	function Dashboard()
	{
		parent::Controller();

		$this->access_library->check_access();
		
		$this->load->module_language('admin', 'dashboard');
	}

	function index()
	{
		$this->template['page']	= "dashboard";
			
		$this->system->load($this->template['page'], null, TRUE);
	}
}

/* End of file dashboard.php */
/* Location: ./application/modules/admin/controllers/dashboard.php */