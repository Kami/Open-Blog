<?php

class Backup extends Controller
{
	function Backup()
	{
		parent::Controller();
			
		$this->access_library->check_access();
	}

	function index()
	{
		$this->load->dbutil();
		$this->load->helper('download');
		$backup =& $this->dbutil->backup(); 
		$file_name = "database-" . date("Y-m-d") . ".sql.gz";
		
		force_download($file_name, $backup); 	
	}
}

/* End of file backup.php */
/* Location: ./application/modules/admin/controllers/backup.php */