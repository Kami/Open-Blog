<?php

class Comments extends Controller
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
		$this->load->module_model('admin', 'comments_model', 'comments');
		$this->load->module_model('blog', 'users_model', 'users');
		
		$this->load->module_language('admin', 'general');
		$this->load->module_language('admin', 'comments');
	}

	// Public methods
	public function index()
	{
		$this->load->helper('text');
		
		if ($data['comments'] = $this->comments->get_comments())
		{
			foreach ($data['comments'] as $key => $comment)
			{
				$data['comments'][$key]['post_url'] = date('Y', strtotime($comment['date_posted'])) . '/' . date('m', strtotime($comment['date_posted'])) . '/' . date('d', strtotime($comment['date_posted'])) . '/' .$comment['url_title']  . '#comment-' . $comment['id'];
				
				if ($comment['user_id'] != "")
				{
					$display_name = $this->users->get_user_display_name($comment['user_id']);
					$data['comments'][$key]['author'] = $display_name;
				}
			}
		}

		$this->_template['page']	= 'comments/list';

		$this->system_library->load($this->_template['page'], $data, TRUE);
	}
	
	public function edit($id = null)
	{
		if ($id == null)
		{
			$id = $this->input->post('id');
		}

		$this->form_validation->set_rules('comment', 'lang:form_comment', 'required');

		$this->form_validation->set_error_delimiters('', '<br />');
			
		$data['comment'] = $this->comments->get_comment($id);
			
		if ($this->form_validation->run() == TRUE)
		{
			$this->comments->edit_comment($id);
			$this->session->set_flashdata('message', lang('successfully_edited'));

			redirect('admin/comments', 'refresh');
		}

		$this->_template['page']	= 'comments/edit';
			
		$this->system_library->load($this->_template['page'], $data, TRUE);
	}


	public function delete($id)
	{
		$this->comments->delete_comment($id);
		$this->session->set_flashdata('message', lang('successfully_deleted'));

		redirect('admin/comments', 'refresh');
	}
}

/* End of file comments.php */
/* Location: ./application/modules/admin/controllers/comments.php */