<?php

class Captcha extends Controller
{
	// Constructor
	public function __construct()
	{
		parent::Controller();

		// Load needed models, libraries, helpers and language files
		$this->load->library('securimage_library');
	}

	// Public methods
	public function normal()
	{
		$this->securimage_library->initialize();
		$this->securimage_library->show();
	}
	
	public function mobile()
	{
		$this->securimage_library->initialize(TRUE);
		$this->securimage_library->show();
	}
}
	
/* End of file captcha.php */
/* Location: ./application/modules/blog/controllers/captcha.php */