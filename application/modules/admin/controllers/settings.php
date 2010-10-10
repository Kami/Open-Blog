<?php

class Settings extends Controller
{
	function Settings()
	{
		parent::Controller();
			
		$this->access_library->check_access();
		
		$this->load->module_language('admin', 'general');
		$this->load->module_language('admin', 'settings');
	}

	function index()
	{
		$this->load->module_model('admin', 'settings_model', 'settings');
			
		$rules['blog_title']			= "required";
		$rules['blog_description']		= "required";
		$rules['meta_keywords']			= "required";
		$rules['allow_registrations']	= "numeric";
		$rules['enabled']				= "numeric";
		$rules['template']				= "required|numeric";
		$rules['posts_per_site']		= "required|numeric";
		$rules['links_per_box']			= "required|numeric";
		$rules['months_per_archive']	= "required|numeric";
		
		if ($this->input->post('enabled') == 0)
		{
			$rules['offline_reason']	= "required";
		}
		
		$this->validation->set_rules($rules);
		
		$fields['blog_title']			= strtolower_utf8(lang('form_blog_title'));
		$fields['blog_description']		= strtolower_utf8(lang('form_blog_description'));
		$fields['meta_keywords']		= strtolower_utf8(lang('form_meta_keywords'));
		$fields['allow_registrations']	= strtolower_utf8(lang('form_allow_registrations'));
		$fields['enabled']				= strtolower_utf8(lang('form_enabled'));
		$fields['template']				= strtolower_utf8(lang('form_template'));
		$fields['posts_per_site']		= strtolower_utf8(lang('form_posts_per_site'));
		$fields['links_per_box']		= strtolower_utf8(lang('form_links_per_box'));
		$fields['months_per_archive']	= strtolower_utf8(lang('form_months_per_archive'));
		$fields['offline_reason']		= strtolower_utf8(lang('form_offline_reason'));
		
		$this->validation->set_fields($fields);
		
		$this->validation->set_error_delimiters('', '<br />');
		
		$data['settings'] = $this->settings->get_settings();
		$data['templates'] = $this->settings->get_templates();
		$data['languages'] = $this->settings->get_languages();
		$this->validation->blog_title = $data['settings']['blog_title'];
		$this->validation->blog_description = $data['settings']['blog_description'];
		$this->validation->meta_keywords = $data['settings']['meta_keywords'];
		$this->validation->allow_registrations = $data['settings']['allow_registrations'];
		$this->validation->template = $this->settings->get_default_template();
		$this->validation->language = $this->settings->get_default_language();
		$this->validation->enabled = $data['settings']['enabled'];
		$this->validation->offline_reason =  $data['settings']['offline_reason'];
		$this->validation->posts_per_site = $data['settings']['posts_per_site'];
		$this->validation->links_per_box = $data['settings']['links_per_box'];
		$this->validation->months_per_archive = $data['settings']['months_per_archive'];
		
		if ($this->validation->run() == TRUE)
		{
			$this->settings->update_settings();
			$this->session->set_flashdata('message', lang('successfully_updated'));

			redirect('admin/settings', 'refresh');
		}
		
		$this->template['page']	= "settings/edit";

		$this->system->load($this->template['page'], $data, TRUE);
	}
}

/* End of file settings.php */
/* Location: ./application/modules/admin/controllers/settings.php */