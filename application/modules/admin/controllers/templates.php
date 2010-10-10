<?php

class Templates extends Controller
{
	function Templates()
	{
		parent::Controller();
			
		$this->access_library->check_access();
		
		$this->load->module_language('admin', 'general');
		$this->load->module_language('admin', 'templates');
	}

	function index()
	{
		$this->load->module_model('admin', 'settings_model', 'settings');
			
		$rules['template']	= "required|numeric";
		$this->validation->set_rules($rules);
		
		$fields['template']	= strtolower_utf8(lang('form_template'));
		$this->validation->set_fields($fields);
		
		$this->validation->set_error_delimiters('', '<br />');
		
		if ($this->validation->run() == TRUE)
		{
			$this->settings->set_default_template();
			$this->session->set_flashdata('message', lang('successfully_set'));
				
			redirect('admin/templates', 'refresh');
		}
		
		$data['templates'] = $this->settings->get_templates_detaill();
		$data['default_template'] = $this->settings->get_default_template();
		
		foreach ($data['templates'] as $key => $template)
		{
			if ($template['is_default'] == 1)
				$data['templates'][$key]['checked'] = TRUE;
			else
				$data['templates'][$key]['checked'] = FALSE;
		}

		$this->template['page']	= "templates/edit";

		$this->system->load($this->template['page'], $data, TRUE);
	}
}

/* End of file templates.php */
/* Location: ./application/modules/admin/controllers/templates.php */