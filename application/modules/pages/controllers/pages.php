<?php

class Pages extends Controller
{
	function Pages()
	{
		parent::Controller();
			
		$this->load->module_model('pages', 'pages_model', 'pages');
		$this->load->module_language('blog', 'general');
	}

	function page($url_title)
	{
		$data['page_data'] = $this->pages->get_page_by_url($url_title);
			
		if ($data['page_data'] != "")
		{
			$this->template['page']	= "pages/page";
		}
		else
		{
			$this->template['page']	= "errors/404";
		}
			
		$this->system->load($this->template['page'], $data);
	}
}

/* End of file pages.php */
/* Location: ./application/modules/pages/controllers/pages.php */