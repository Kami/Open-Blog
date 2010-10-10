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
		$this->load->module_model('admin', 'categories_model', 'categories');

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
		$this->form_validation->set_rules('title', 'lang:form_title', 'required|max_length[200]|xss_clean');
		$this->form_validation->set_rules('excerpt', 'lang:form_excerpt', 'required|prep_for_form');
		$this->form_validation->set_rules('content', 'lang:form_content', 'prep_for_form');
		$this->form_validation->set_rules('categories', 'lang:form_categories', 'required');
		$this->form_validation->set_rules('tags', 'lang:form_tags', 'xss_clean');
		$this->form_validation->set_rules('status', 'lang:form_status', 'required|xss_clean');
		$this->form_validation->set_rules('allow_comments', 'lang:form_allow_comments', 'numeric');
		$this->form_validation->set_rules('sticky', 'lang:form_sticky', 'numeric');

		$this->form_validation->set_error_delimiters('', '<br />');
		
		$data['settings']['allow_comments'] = 'checked';
			
		if ($this->form_validation->run() == TRUE)
		{
			$this->posts->create_post();
			
			$post_id = $this->db->insert_id();
			$categories = $this->input->post('categories');
			$tags = $this->input->post('tags');
	
			foreach ($categories as $category_id)
			{
				$this->posts->add_post_to_category($post_id, $category_id);
			}
			
			if ($tags)
			{
				$this->posts->add_tags($this->posts->parse_tags($tags), $post_id);
			}
			
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
		$this->form_validation->set_rules('excerpt', 'lang:form_excerpt', 'required|prep_for_form');
		$this->form_validation->set_rules('content', 'lang:form_content', 'prep_for_form');
		$this->form_validation->set_rules('categories', 'lang:form_categories', 'required|xss_clean');
		$this->form_validation->set_rules('tags', 'lang:form_tags', 'xss_clean');
		$this->form_validation->set_rules('status', 'lang:form_status', 'required|xss_clean');
		$this->form_validation->set_rules('allow_comments', 'lang:form_allow_comments', 'numeric');
		$this->form_validation->set_rules('sticky', 'lang:form_sticky', 'numeric');
		
		$this->form_validation->set_error_delimiters('', '<br />');
			
		$data['post'] 						= $this->posts->get_post($id);
		$data['post_categories']			= $this->posts->get_post_categories($id);
		$data['categories'] 				= $this->posts->get_categories();
		$data['tags']						= $this->posts->get_tags_by_post_id($id);
		$data['settings']['allow_comments'] = ($data['post']['allow_comments'] == 1) ? 'checked' : '';
		$data['settings']['sticky'] = ($data['post']['sticky'] == 1) ? 'checked' : '';
	
		if ($this->form_validation->run() == TRUE)
		{
			$categories = $this->input->post('categories');
			$tags = $this->input->post('tags');

			$this->posts->edit_post($id);
			$this->posts->edit_post_categories($id, $categories);
			$this->posts->edit_post_tags($id, $tags);
			
			$this->session->set_flashdata('message', lang('successfully_edited'));

			redirect('admin/posts', 'refresh');
		}
		
		$this->_template['page']	= 'posts/edit';
			
		$this->system_library->load($this->_template['page'], $data, TRUE);
	}

	public function delete($post_id)
	{
		$this->posts->delete_post($post_id);
		$this->posts->delete_post_categories($post_id);
		
		$this->session->set_flashdata('message', lang('successfully_deleted'));

		redirect('admin/posts', 'refresh');
	}
}

/* End of file posts.php */
/* Location: ./application/modules/admin/controllers/posts.php */