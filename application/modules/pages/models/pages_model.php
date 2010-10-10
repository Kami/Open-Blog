<?php

class Pages_Model extends Model
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
	public function get_page_by_url($url_title)
	{
		$this->db->select('id, title, content, status');
		$this->db->where('url_title', $url_title);
		$this->db->where('status', 'active');
			
		$query = $this->db->get($this->_table['pages'], 1);
		
		if ($query->num_rows() == 1)
		{
			return $query->row_array();
		}
	}
}

/* End of file pages_model.php */
/* Location: ./application/modules/admin/models/pages_model.php */