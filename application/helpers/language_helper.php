<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function lang($line_key = '', $args = '', $lang = '')
{
    $ci =& get_instance();

    if(!is_array($args))
    {
        $args = array($args);
    }

    $line_key = $ci->lang->line($line_key, $lang);
    
    return vsprintf($line_key, $args);
}

/* End of file language_helper.php */
/* Location: ./application/helpers/language_helper.php */