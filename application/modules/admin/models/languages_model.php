<?php

class Languages_model extends Model
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
	public function get_languages()
	{
		$this->db->select('language, abbreviation, author, author_website');
		
		$query = $this->db->get($this->_table['languages']);
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}
}

/* End of file languages_model.php */
/* Location: ./application/modules/admin/models/languages_model.php */