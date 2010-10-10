<?php

class Comments extends Controller
{
	function Comments()
	{
		parent::Controller();
			
		$this->access_library->check_access();
			
		$this->load->module_model('admin', 'comments_model', 'comments');
		$this->load->module_model('blog', 'users_model', 'users');
		
		$this->load->module_language('admin', 'general');
		$this->load->module_language('admin', 'comments');
	}

	function index()
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

		$this->template['page']	= "comments/list";

		$this->system->load($this->template['page'], $data, TRUE);
	}
	
	function edit($id = null)
	{
		if ($id == null)
		{
			$id = $this->input->post('id');
		}
			
		$rules['comment']	= "required";
		$this->validation->set_rules($rules);
			
		$fields['comment']	= strtolower_utf8(lang('form_comment'));
		$this->validation->set_fields($fields);
			
		$this->validation->set_error_delimiters('', '<br />');
			
		$data['comment'] = $this->comments->get_comment($id);
		$this->validation->comment = $data['comment']['content'];
			
		if ($this->validation->run() == TRUE)
		{
			$this->comments->edit_comment($id);
			$this->session->set_flashdata('message', lang('successfully_edited'));

			redirect('admin/comments', 'refresh');
		}

		$this->template['page']	= "comments/edit";
			
		$this->system->load($this->template['page'], $data, TRUE);
	}


	function delete($id)
	{
		$this->comments->delete_comment($id);
		$this->session->set_flashdata('message', lang('successfully_deleted'));

		redirect('admin/comments', 'refresh');
	}
}

/* End of file comments.php */
/* Location: ./application/modules/admin/controllers/comments.php */