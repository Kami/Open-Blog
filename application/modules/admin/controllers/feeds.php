<?php

class Feeds extends Controller
{
	function Feeds()
	{
		parent::Controller();
			
		$this->access_library->check_access();
		
		$this->load->module_language('admin', 'general');
		$this->load->module_language('admin', 'feeds');
	}

	function index()
	{
		$this->load->module_model('admin', 'settings_model', 'settings');
			
		$rules['rss']	= "numeric";
		$rules['atom']	= "numeric";
		
		$this->validation->set_rules($rules);
		
		$fields['rss']	= strtolower_utf8(lang('form_nable_rss'));
		$fields['atom']	= strtolower_utf8(lang('form_enable_atom'));
		
		$this->validation->set_fields($fields);
		
		$this->validation->set_error_delimiters('', '<br />');
		
		if ($this->validation->run() == TRUE)
		{
			$this->settings->update_feed_settings();
			$this->session->set_flashdata('message', lang('successfully_updated'));

			redirect('admin/feeds', 'refresh');
		}

		$data['settings'] = $this->settings->get_settings();
		$data['settings']['enable_rss_status'] = ($data['settings']['enable_rss'] == 1) ? "checked" : "";
		$data['settings']['enable_atom_status'] = ($data['settings']['enable_atom'] == 1) ? "checked" : "";

		$this->template['page']	= "feeds/edit";

		$this->system->load($this->template['page'], $data, TRUE);
	}
}

/* End of file feeds.php */
/* Location: ./application/modules/admin/controllers/feeds.php */