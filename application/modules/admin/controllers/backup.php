<?php

class Backup extends Controller
{
	// Constructor
	public function __construct()
	{
		parent::Controller();
		
		// Check if the logged user is an administrator
		$this->access_library->check_access();
		
		// Load needed models, libraries, helpers and language files
		$this->load->dbutil();
		$this->load->helper('download');
	}

	// Public methods
	public function index()
	{
		$backup =& $this->dbutil->backup(); 
		$file_name = 'database-' . date('Y-m-d') . '.sql.gz';
		
		force_download($file_name, $backup); 	
	}
}

/* End of file backup.php */
/* Location: ./application/modules/admin/controllers/backup.php */

