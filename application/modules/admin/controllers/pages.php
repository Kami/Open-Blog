<?php

class Pages extends Controller
{
	function Pages()
	{
		parent::Controller();
			
		$this->access_library->check_access();
			
		$this->load->module_model('admin', 'pages_model', 'pages');
		
		$this->load->module_language('admin', 'general');
		$this->load->module_language('admin', 'pages');
	}

	function index()
	{
		$data['pages'] = $this->pages->get_pages();

		$this->template['page']	= "pages/list";

		$this->system->load($this->template['page'], $data, TRUE);
	}

	function create()
	{		
		$rules['title']		= "required|max_length[200]";
		$rules['content']	= "required";
		$rules['status']	= "required";
		$this->validation->set_rules($rules);

		$fields['title']	= strtolower_utf8(lang('form_title'));
		$fields['content']	= strtolower_utf8(lang('form_content'));
		$fields['status']	= strtolower_utf8(lang('form_status'));
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('', '<br />');
			
		if ($this->validation->run() == TRUE)
		{
			$this->pages->create_page();
			$this->session->set_flashdata('message', lang('successfully_created'));

			redirect('admin/pages', 'refresh');
		}
			
		$this->template['page']	= "pages/create";
			
		$this->system->load($this->template['page'], null, TRUE);
	}

	function edit($id = null)
	{
		if ($id == null)
		{
			$id = $this->input->post('id');
		}
			
		$rules['title']		= "required|max_length[200]";
		$rules['content']	= "required";
		$rules['status']	= "required";
		$this->validation->set_rules($rules);

		$fields['title']	= strtolower_utf8(lang('form_title'));
		$fields['content']	= strtolower_utf8(lang('form_content'));
		$fields['status']	= strtolower_utf8(lang('form_status'));
		$this->validation->set_fields($fields);
			
		$this->validation->set_error_delimiters('', '<br />');
			
		$data['page_data'] = $this->pages->get_page($id);
		$this->validation->title = $data['page_data']['title'];
		$this->validation->content = $data['page_data']['content'];
		$this->validation->status = $data['page_data']['status'];
			
		if ($this->validation->run() == TRUE)
		{
			$this->pages->edit_page($id);
			$this->session->set_flashdata('message', lang('successfully_edited'));

			redirect('admin/pages', 'refresh');
		}
		$this->template['page']	= "pages/edit";
			
		$this->system->load($this->template['page'], $data, TRUE);
	}

	function delete($id)
	{
		$this->pages->delete_page($id);
		$this->session->set_flashdata('message', lang('successfully_deleted'));

		redirect('admin/pages', 'refresh');
	}
}

/* End of file pages.php */
/* Location: ./application/modules/admin/controllers/pages.php */