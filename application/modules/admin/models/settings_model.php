<?php

class Settings_model extends Model
{
	// Protected or private properties
	protected $_table;
	
	// Constructor
	public function __construct()
	{
		parent::Model();
			
		$this->_table = $this->config->item('database_tables');
	}

	// Public methods
	public function get_settings()
	{
		$this->db->select('name, value');
			
		$query = $this->db->get($this->_table['settings']);
			
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();

			foreach ($result as $row)
			{
				$result[$row['name']] = $row['value'];
			}
			
			return $result;
		}
	}

	public function get_templates()
	{
		$this->db->select('id, name, is_default');

		$query = $this->db->get($this->_table['templates']);
			
		if ($query->num_rows() > 0)
		{
			foreach ($query->result_array() as $row)
			{
				$data[$row['id']] = $row['name'];
			}

			return $data;
		}
	}
	
	public function get_templates_detaill()
	{
		$this->db->select('id, name, author, image, is_default');

		$query = $this->db->get($this->_table['templates']);
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}

	public function get_default_template()
	{
		$this->db->select('id');
		$this->db->where('is_default', '1');
			
		$query = $this->db->get($this->_table['templates'], 1);
			
		if ($query->num_rows() == 1)
		{
			$row = $query->row_array();

			return $row['id'];
		}
	}
	
	public function get_languages()
	{
		$this->db->select('id, language, is_default');

		$query = $this->db->get($this->_table['languages']);
			
		if ($query->num_rows() > 0)
		{
			foreach ($query->result_array() as $row)
			{
				if (lang($row['language']))
				{
					$data[$row['id']] = lang($row['language']);
				}
				else 
				{
					$data[$row['id']] = $row['language'];
				}
			}

			return $data;
		}
	}
	
	public function get_default_language()
	{
		$this->db->select('id');
		$this->db->where('is_default', '1');
			
		$query = $this->db->get($this->_table['languages'], 1);
			
		if ($query->num_rows() == 1)
		{
			$row = $query->row_array();

			return $row['id'];
		}
	}

	public function update_settings()
	{
		$offline_reason = ($this->input->post('enabled') == 0) ? $this->input->post('offline_reason') : '';

		$this->db->set('value', $this->input->post('blog_title'));
		$this->db->where('name', 'blog_title');
		$this->db->update($this->_table['settings']);
		
		$this->db->set('value', $this->input->post('blog_description'));
		$this->db->where('name', 'blog_description');
		$this->db->update($this->_table['settings']);
		
		$this->db->set('value', $this->input->post('meta_keywords'));
		$this->db->where('name', 'meta_keywords');
		$this->db->update($this->_table['settings']);
		
		$this->db->set('value', $this->input->post('admin_email'));
		$this->db->where('name', 'admin_email');
		$this->db->update($this->_table['settings']);
		
		$this->db->set('value', $this->input->post('allow_registrations'));
		$this->db->where('name', 'allow_registrations');
		$this->db->update($this->_table['settings']);
		
		$this->db->set('value', $this->input->post('posts_per_site'));
		$this->db->where('name', 'posts_per_site');
		$this->db->update($this->_table['settings']);
		
		$this->db->set('value', $this->input->post('links_per_box'));
		$this->db->where('name', 'links_per_box');
		$this->db->update($this->_table['settings']);
		
		$this->db->set('value', $this->input->post('months_per_archive'));
		$this->db->where('name', 'months_per_archive');
		$this->db->update($this->_table['settings']);
		
		$this->db->set('value', $this->input->post('enabled'));
		$this->db->where('name', 'enabled');
		$this->db->update($this->_table['settings']);
		
		$this->db->set('value', $offline_reason);
		$this->db->where('name', 'offline_reason');
		$this->db->update($this->_table['settings']);
			
		$this->db->set('is_default', '0');
		$this->db->where('id !=', $this->input->post('template'));
		$this->db->update($this->_table['templates']);
								
		$this->db->set('is_default', '1');
		$this->db->where('id', $this->input->post('template'));
		$this->db->update($this->_table['templates']);	

		$this->db->set('is_default', '0');
		$this->db->where('id !=', $this->input->post('language'));
		$this->db->update($this->_table['languages']);
								
		$this->db->set('is_default', '1');
		$this->db->where('id', $this->input->post('language'));
		$this->db->update($this->_table['languages']);
	}
	
	public function update_feed_settings()
	{
		$this->db->set('value', $this->input->post('enable_rss_posts'));
		$this->db->where('name', 'enable_rss_posts');
		$this->db->update($this->_table['settings']);
		
		$this->db->set('value', $this->input->post('enable_rss_comments'));
		$this->db->where('name', 'enable_rss_comments');
		$this->db->update($this->_table['settings']);
		
		$this->db->set('value', $this->input->post('enable_atom_posts'));
		$this->db->where('name', 'enable_atom_posts');
		$this->db->update($this->_table['settings']);
		
		$this->db->set('value', $this->input->post('enable_atom_comments'));
		$this->db->where('name', 'enable_atom_comments');
		$this->db->update($this->_table['settings']);
	}
	
	public function update_social_bookmarking_settings()
	{
		$this->db->set('value', $this->input->post('enable_digg'));
		$this->db->where('name', 'enable_digg');
		$this->db->update($this->_table['settings']);
		
		$this->db->set('value', $this->input->post('enable_technorati'));
		$this->db->where('name', 'enable_technorati');
		$this->db->update($this->_table['settings']);
		
		$this->db->set('value', $this->input->post('enable_delicious'));
		$this->db->where('name', 'enable_delicious');
		$this->db->update($this->_table['settings']);
		
		$this->db->set('value', $this->input->post('enable_stumbleupon'));
		$this->db->where('name', 'enable_stumbleupon');
		$this->db->update($this->_table['settings']);
		
		$this->db->set('value', $this->input->post('enable_reddit'));
		$this->db->where('name', 'enable_reddit');
		$this->db->update($this->_table['settings']);
		
		$this->db->set('value', $this->input->post('enable_furl'));
		$this->db->where('name', 'enable_furl');
		$this->db->update($this->_table['settings']);
	}
	
	public function set_default_template()
	{
		$this->db->set('is_default', '0');
		$this->db->where('id !=', $this->input->post('template'));
		$this->db->update($this->_table['templates']);

		$this->db->set('is_default', '1');
		$this->db->where('id', $this->input->post('template'));
		$this->db->update($this->_table['templates']);						
	}
}

/* End of file settings_model.php */
/* Location: ./application/modules/admin/models/settings_model.php */