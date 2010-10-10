<?php

class Links extends Controller
{
	function Links()
	{
		parent::Controller();
			
		$this->access_library->check_access();
			
		$this->load->module_model('admin', 'links_model', 'links');
		
		$this->load->module_language('admin', 'general');
		$this->load->module_language('admin', 'links');
	}

	function index()
	{
		$data['links'] = $this->links->get_links();

		$this->template['page']	= "links/list";

		$this->system->load($this->template['page'], $data, TRUE);
	}

	function create()
	{
		$rules['name']			= "required|max_length[50]";
		$rules['url']			= "required";
		$rules['target']		= "required";
		$rules['description']	= "required|max_length[100]";
		$rules['visible']		= "required";
		$this->validation->set_rules($rules);

		$fields['name']			= strtolower_utf8(lang('form_name'));
		$fields['url']			= strtolower_utf8(lang('form_url'));
		$fields['target']		= strtolower_utf8(lang('form_target'));
		$fields['description']	= strtolower_utf8(lang('form_description'));
		$fields['visible']		= strtolower_utf8(lang('form_visible'));
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('', '<br />');
			
		if ($this->validation->run() == TRUE)
		{
			$this->links->create_link();
			$this->session->set_flashdata('message', lang('successfully_created'));

			redirect('admin/links', 'refresh');
		}
			
		$this->template['page']	= "links/create";
			
		$this->system->load($this->template['page'], null, TRUE);
	}

	function edit($id = null)
	{
		if ($id == null)
		{
			$id = $this->input->post('id');
		}
			
		$rules['name']			= "required|max_length[50]";
		$rules['url']			= "required";
		$rules['target']		= "required";
		$rules['description']	= "required|max_length[100]";
		$rules['visible']		= "required";
		$this->validation->set_rules($rules);

		$fields['name']			= strtolower_utf8(lang('form_name'));
		$fields['url']			= strtolower_utf8(lang('form_url'));
		$fields['target']		= strtolower_utf8(lang('form_target'));
		$fields['description']	= strtolower_utf8(lang('form_description'));
		$fields['visible']		= strtolower_utf8(lang('form_visible'));
		$this->validation->set_fields($fields);
			
		$this->validation->set_error_delimiters('', '<br />');
			
		$data['link'] = $this->links->get_link($id);
		$this->validation->name = $data['link']['name'];
		$this->validation->url = $data['link']['url'];
		$this->validation->target = $data['link']['target'];
		$this->validation->description = $data['link']['description'];
		$this->validation->visible = $data['link']['visible'];
			
		if ($this->validation->run() == TRUE)
		{
			$this->links->edit_link($id);
			$this->session->set_flashdata('message', lang('successfully_edited'));

			redirect('admin/links', 'refresh');
		}
		
		$this->template['page']	= "links/edit";
			
		$this->system->load($this->template['page'], $data, TRUE);
	}

	function delete($id)
	{
		$this->links->delete_link($id);
		$this->session->set_flashdata('message', lang('successfully_deleted'));

		redirect('admin/links', 'refresh');
	}
}

/* End of file links.php */
/* Location: ./application/modules/admin/controllers/links.php */