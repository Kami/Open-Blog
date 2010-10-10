<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function activation_url($email, $key)
{
	return site_url('user/forgotten_password/key/' . $key . '/email/' . $email);
}

function post_url($url_title, $date)
{
	return date('Y', strtotime($date)) . '/' . date('m', strtotime($date)) . '/' . date('d', strtotime($date)) . '/' . $url_title  . '/';
}

/* End of file MY_url_helper.php */
/* Location: ./application/helpers/MY_url_helper.php */