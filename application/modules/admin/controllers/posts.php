<?php

class Posts extends Controller
{
	function Posts()
	{
		parent::Controller();
			
		$this->access_library->check_access();
			
		$this->load->module_model('admin', 'posts_model', 'posts');
		
		$this->load->module_language('admin', 'general');
		$this->load->module_language('admin', 'posts');
	}

	function index()
	{
		$data['posts'] = $this->posts->get_posts();

		$this->template['page']	= "posts/list";

		$this->system->load($this->template['page'], $data, TRUE);
	}

	function create()
	{
		$rules['title']				= "required|max_length[200]";
		$rules['excerpt']			= "required";
		$rules['category_id']		= "required|numeric";
		$rules['status']			= "required";
		$this->validation->set_rules($rules);
		
		$fields['title']			= strtolower_utf8(lang('form_title'));
		$fields['excerpt']			= strtolower_utf8(lang('form_excerpt'));
		$fields['content']			= strtolower_utf8(lang('form_content'));
		$fields['category_id']		= strtolower_utf8(lang('form_category'));
		$fields['status']			= strtolower_utf8(lang('form_status'));
		$fields['allow_comments']	= strtolower_utf8(lang('form_allow_comments'));
		$this->validation->set_fields($fields);

		$this->validation->set_error_delimiters('', '<br />');
		
		$this->validation->allow_comments = ($this->validation->allow_comments == '') ? "checked" : "";
			
		if ($this->validation->run() == TRUE)
		{
			$this->posts->create_post();
			$this->session->set_flashdata('message', lang('successfully_created'));

			redirect('admin/posts', 'refresh');
		}
			
		$data['categories'] = $this->posts->get_categories();
		$this->template['page']	= "posts/create";
			
		$this->system->load($this->template['page'], $data, TRUE);
	}

	function edit($id = null)
	{
		if ($id == null)
		{
			$id = $this->input->post('id');
		}
			
		$rules['title']				= "required|max_length[200]";
		$rules['excerpt']			= "required";
		$rules['category_id']		= "required|numeric";
		$rules['status']			= "required";
		$this->validation->set_rules($rules);

		$fields['title']			= strtolower_utf8(lang('form_title'));
		$fields['excerpt']			= strtolower_utf8(lang('form_excerpt'));
		$fields['content']			= strtolower_utf8(lang('form_content'));
		$fields['category_id']		= strtolower_utf8(lang('form_category'));
		$fields['status']			= strtolower_utf8(lang('form_status'));
		$fields['allow_comments']	= strtolower_utf8(lang('form_allow_comments'));
		$this->validation->set_fields($fields);
			
		$this->validation->set_error_delimiters('', '<br />');
			
		$data['post'] = $this->posts->get_post($id);
		$data['categories'] = $this->posts->get_categories();
		$this->validation->title = $data['post']['title'];
		$this->validation->excerpt = $data['post']['excerpt'];
		$this->validation->content = $data['post']['content'];
		$this->validation->category_id = $data['post']['category_id'];
		$this->validation->allow_comments = ($data['post']['allow_comments'] == 1) ? "checked" : "";
		$this->validation->status = $data['post']['status'];
			
		if ($this->validation->run() == TRUE)
		{
			$this->posts->edit_post($id);
			$this->session->set_flashdata('message', lang('successfully_edited'));

			redirect('admin/posts', 'refresh');
		}
		
		$this->template['page']	= "posts/edit";
			
		$this->system->load($this->template['page'], $data, TRUE);
	}

	function delete($id)
	{
		$this->posts->delete_post($id);
		$this->session->set_flashdata('message', lang('successfully_deleted'));

		redirect('admin/posts', 'refresh');
	}
}

/* End of file posts.php */
/* Location: ./application/modules/admin/controllers/posts.php */