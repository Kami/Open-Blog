<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function strtolower_utf8($string)
{
	$string = mb_convert_case($string, MB_CASE_LOWER, "UTF-8");
	
	return $string;
}

/* End of file MY_text_helper.php */
/* Location: ./application/helpers/MY_text_helper.php */