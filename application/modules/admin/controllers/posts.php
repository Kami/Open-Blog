<?php

class Posts extends Controller
{
	// Protected or private properties
	protected $_template;
	
	// Constructor
	public function __construct()
	{
		parent::Controller();

		// Check if the logged user is an administrator
		$this->access_library->check_access();

		// Load needed models, libraries, helpers and language files
		$this->load->module_model('admin', 'posts_model', 'posts');
		
		$this->load->module_language('admin', 'general');
		$this->load->module_language('admin', 'posts');
	}

	// Public methods
	public function index()
	{
		$data['posts'] = $this->posts->get_posts();

		$this->_template['page']	= 'posts/list';

		$this->system_library->load($this->_template['page'], $data, TRUE);
	}

	public function create()
	{
		$this->form_validation->set_rules('title', 'lang:form_title', 'required|max_length[200]');
		$this->form_validation->set_rules('excerpt', 'lang:form_excerpt', 'required');
		$this->form_validation->set_rules('content', 'lang:form_content', '');
		$this->form_validation->set_rules('category_id', 'lang:form_category', 'required|numeric');
		$this->form_validation->set_rules('status', 'lang:form_status', 'required');
		$this->form_validation->set_rules('allow_comments', 'lang:form_allow_comments', '');

		$this->form_validation->set_error_delimiters('', '<br />');
		
		$data['settings']['allow_comments'] = 'checked';
			
		if ($this->form_validation->run() == TRUE)
		{
			$this->posts->create_post();
			$this->session->set_flashdata('message', lang('successfully_created'));

			redirect('admin/posts', 'refresh');
		}
			
		$data['categories'] 		= $this->posts->get_categories();
		$this->_template['page']	= 'posts/create';
			
		$this->system_library->load($this->_template['page'], $data, TRUE);
	}

	public function edit($id = null)
	{
		if ($id == null)
		{
			$id = $this->input->post('id');
		}
			
		$this->form_validation->set_rules('title', 'lang:form_title', 'required|max_length[200]');
		$this->form_validation->set_rules('excerpt', 'lang:form_excerpt', 'required');
		$this->form_validation->set_rules('content', 'lang:form_content', '');
		$this->form_validation->set_rules('category_id', 'lang:form_category', 'required|numeric');
		$this->form_validation->set_rules('status', 'lang:form_status', 'required');
		$this->form_validation->set_rules('allow_comments', 'lang:form_allow_comments', '');
		
		$this->form_validation->set_error_delimiters('', '<br />');
			
		$data['post'] 						= $this->posts->get_post($id);
		$data['categories'] 				= $this->posts->get_categories();
		$data['settings']['allow_comments'] = ($data['post']['allow_comments'] == 1) ? 'checked' : '';
			
		if ($this->form_validation->run() == TRUE)
		{
			$this->posts->edit_post($id);
			$this->session->set_flashdata('message', lang('successfully_edited'));

			redirect('admin/posts', 'refresh');
		}
		
		$this->_template['page']	= 'posts/edit';
			
		$this->system_library->load($this->_template['page'], $data, TRUE);
	}

	public function delete($id)
	{
		$this->posts->delete_post($id);
		$this->session->set_flashdata('message', lang('successfully_deleted'));

		redirect('admin/posts', 'refresh');
	}
}

/* End of file posts.php */
/* Location: ./application/modules/admin/controllers/posts.php */