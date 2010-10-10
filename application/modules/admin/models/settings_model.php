<?php

class Settings_model extends Model
{
	function Settings_model()
	{
		parent::Model();
			
		$this->settings_table = 'settings';
		$this->templates_table = 'templates';
		$this->languages_table = 'languages';
	}

	function get_settings()
	{
		$this->db->select('blog_title, blog_description, meta_keywords, allow_registrations, enable_rss, enable_atom, posts_per_site, links_per_box, months_per_archive, enabled, offline_reason');
		$this->db->where('id', '1');
			
		$query = $this->db->get($this->settings_table, 1);
			
		if ($query->num_rows() == 1)
		{
			return $query->row_array();
		}
	}

	function get_templates()
	{
		$this->db->select('id, name, is_default');

		$query = $this->db->get($this->templates_table);
			
		if ($query->num_rows() > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$data[$row['id']] = $row['name'];
			}

			return $data;
		}
	}
	
	function get_templates_detaill()
	{
		$this->db->select('id, name, author, image, is_default');

		$query = $this->db->get($this->templates_table);
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}

	function get_default_template()
	{
		$this->db->select('id');
		$this->db->where('is_default', '1');
			
		$query = $this->db->get($this->templates_table, 1);
			
		if ($query->num_rows() == 1)
		{
			$row = $query->row_array();

			return $row['id'];
		}
	}
	
	function get_languages()
	{
		$this->db->select('id, language, is_default');

		$query = $this->db->get($this->languages_table);
			
		if ($query->num_rows() > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$data[$row['id']] = lang($row['language']);
			}

			return $data;
		}
	}
	
	function get_default_language()
	{
		$this->db->select('id');
		$this->db->where('is_default', '1');
			
		$query = $this->db->get($this->languages_table, 1);
			
		if ($query->num_rows() == 1)
		{
			$row = $query->row_array();

			return $row['id'];
		}
	}

	function update_settings()
	{
		$allow_registrations = ($this->input->post('allow_registrations') == 1) ? '1' : '0';
		$enabled = ($this->input->post('enabled') == 1) ? '1' : '0';
		$offline_reason = ($this->input->post('enabled') == 0) ? $this->input->post('offline_reason') : '';
			
		$data = array
					(
						'blog_title' => $this->input->post('blog_title'),
						'blog_description' => $this->input->post('blog_description'),
						'meta_keywords' => $this->input->post('meta_keywords'),
						'allow_registrations' => $allow_registrations,
						'posts_per_site' => $this->input->post('posts_per_site'),
						'links_per_box' => $this->input->post('links_per_box'),
						'months_per_archive' => $this->input->post('months_per_archive'),
						'enabled' => $enabled,
						'offline_reason' => $offline_reason
					);

		$this->db->where('id', '1');
		$this->db->update($this->settings_table, $data);
			
		$this->db->set('is_default', '0');
		$this->db->where('id !=', $this->input->post('template'));
		$this->db->update($this->templates_table);
								
		$this->db->set('is_default', '1');
		$this->db->where('id', $this->input->post('template'));
		$this->db->update($this->templates_table);	

		$this->db->set('is_default', '0');
		$this->db->where('id !=', $this->input->post('language'));
		$this->db->update($this->languages_table);
								
		$this->db->set('is_default', '1');
		$this->db->where('id', $this->input->post('language'));
		$this->db->update($this->languages_table);
	}
	
	function update_feed_settings()
	{
		$enable_rss = ($this->input->post('enable_rss') == 1) ? '1' : '0';
		$enable_atom = ($this->input->post('enable_atom') == 1) ? '1' : '0';
			
		$data = array
					(
						'enable_rss' => $enable_rss,
						'enable_atom' => $enable_atom
					);

		$this->db->where('id', '1');
		$this->db->update($this->settings_table, $data);							
	}
	
	function set_default_template()
	{
		$this->db->set('is_default', '0');
		$this->db->where('id !=', $this->input->post('template'));
		$this->db->update($this->templates_table);

		$this->db->set('is_default', '1');
		$this->db->where('id', $this->input->post('template'));
		$this->db->update($this->templates_table);						
	}
}

/* End of file settings_model.php */
/* Location: ./application/modules/admin/models/settings_model.php */