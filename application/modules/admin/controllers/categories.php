<?php

class Categories extends Controller
{
	function Categories()
	{
		parent::Controller();
			
		$this->access_library->check_access();
			
		$this->load->module_model('admin', 'categories_model', 'categories');
		
		$this->load->module_language('admin', 'general');
		$this->load->module_language('admin', 'categories');
	}

	function index()
	{
		$data['categories'] = $this->categories->get_categories();

		$this->template['page']	= "categories/list";

		$this->system->load($this->template['page'], $data, TRUE);
	}

	function create()
	{
		$rules['name']	= "required|max_length[60]";
		$rules['description']	= "required|max_length[200]";
		$this->validation->set_rules($rules);

		$fields['name']			= strtolower_utf8(lang('form_category_name'));
		$fields['description']	= strtolower_utf8(lang('form_category_description'));
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('', '<br />');

		if ($this->validation->run() == TRUE)
		{
			$this->categories->create_category();
			$this->session->set_flashdata('message', lang('successfully_created'));

			redirect('admin/categories', 'refresh');
		}
			
		$this->template['page']	= "categories/create";
			
		$this->system->load($this->template['page'], null, TRUE);
	}

	function edit($id = null)
	{
		if ($id == null)
		{
			$id = $this->input->post('id');
		}
			
		$rules['name']	= "required|max_length[60]";
		$rules['description']	= "required|max_length[200]";
		$this->validation->set_rules($rules);
			
		$fields['name']			= strtolower_utf8(lang('form_category_name'));
		$fields['description']	= strtolower_utf8(lang('form_category_description'));
		$this->validation->set_fields($fields);
			
		$this->validation->set_error_delimiters('', '<br />');
			
		$data['category'] = $this->categories->get_category($id);
		$this->validation->name = $data['category']['name'];
		$this->validation->description = $data['category']['description'];
			
		if ($this->validation->run() == TRUE)
		{
			$this->categories->edit_category($id);
			$this->session->set_flashdata('message', lang('successfully_edited'));

			redirect('admin/categories', 'refresh');
		}

		$this->template['page']	= "categories/edit";
			
		$this->system->load($this->template['page'], $data, TRUE);
	}

	function delete($id)
	{
		$this->categories->delete_category($id);
		$this->session->set_flashdata('message', lang('successfully_deleted'));

		redirect('admin/categories', 'refresh');
	}
}

/* End of file categories.php */
/* Location: ./application/modules/admin/controllers/categories.php */