<?php

class Navigation extends Controller
{
	function Navigation()
	{
		parent::Controller();
			
		$this->access_library->check_access();
		
		$this->load->module_model('admin', 'navigation_model', 'navigation');
		
		$this->load->module_language('admin', 'general');
		$this->load->module_language('admin', 'navigation');
	}

	function index()
	{
		$data['navigation'] = $this->navigation->get_navigation();

		$this->template['page']	= "navigation/list";

		$this->system->load($this->template['page'], $data, TRUE);
	}

	function create()
	{	
		$rules['title']			= "required|max_length[50]";
		$rules['url']			= "required";
		$rules['description']	= "required|max_length[100]";
		$rules['position']		= "required|numeric";
		$this->validation->set_rules($rules);

		$fields['title']		= strtolower_utf8(lang('form_title'));
		$fields['url']			= strtolower_utf8(lang('form_url'));
		$fields['description']	= strtolower_utf8(lang('form_description'));
		$fields['position']		= strtolower_utf8(lang('form_position'));
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('', '<br />');
			
		if ($this->validation->run() == TRUE)
		{
			$this->navigation->create_navigation_item();
			$this->session->set_flashdata('message', lang('successfully_created'));

			redirect('admin/navigation', 'refresh');
		}
			
		$this->template['page']	= "navigation/create";
			
		$this->system->load($this->template['page'], null, TRUE);
	}

	function edit($id = null)
	{
		if ($id == null)
		{
			$id = $this->input->post('id');
		}
			
		$rules['title']			= "required|max_length[50]";
		$rules['url']			= "required";
		$rules['description']	= "required|max_length[100]";
		$rules['position']		= "required|numeric";
		$this->validation->set_rules($rules);

		$fields['title']		= strtolower_utf8(lang('form_title'));
		$fields['url']			= strtolower_utf8(lang('form_url'));
		$fields['description']	= strtolower(lang('form_description'));
		$fields['position']		= strtolower_utf8(lang('form_position'));
		$this->validation->set_fields($fields);
			
		$this->validation->set_error_delimiters('', '<br />');
			
		$data['navigation'] = $this->navigation->get_navigation_item($id);
		$this->validation->title = $data['navigation']['title'];
		$this->validation->url = $data['navigation']['url'];
		$this->validation->description = $data['navigation']['description'];
		$this->validation->position = $data['navigation']['position'];
			
		if ($this->validation->run() == TRUE)
		{
			$this->navigation->edit_navigation_item($id);
			$this->session->set_flashdata('message', lang('successfully_edited'));

			redirect('admin/navigation', 'refresh');
		}
		
		$this->template['page']	= "navigation/edit";
			
		$this->system->load($this->template['page'], $data, TRUE);
	}

	function delete($id)
	{
		$this->navigation->delete_navigation_item($id);
		$this->session->set_flashdata('message', lang('successfully_deleted'));

		redirect('admin/navigation', 'refresh');
	}
}

/* End of file navigation.php */
/* Location: ./application/modules/admin/controllers/navigation.php */