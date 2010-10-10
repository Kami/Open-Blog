<?php

define('BASEPATH', TRUE);
require('../application/config/open_blog.php');

function is_installed()
{
	if (file_exists('../application/config/config.php') && file_exists('../application/config/database.php'))
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}

function get_root_url()
{
	$server_host = $_SERVER['HTTP_HOST'];
	$server_path = $_SERVER['PHP_SELF'];
	$server_ssl = $_SERVER['HTTPS'];
	
	$blog_root = (($server_ssl) ? 'https://' : 'http://') . $server_host . $server_path;
	
	$install_path = stripos($blog_root, 'install/install.php');
	$blog_root = substr($blog_root, 0, $install_path);
	
	return $blog_root;
}

function check_for_new_version()
{
	$current_version = $config['version'];
	$latest_version = file_get_contents($config['version_check_url']);
	$latest_version = explode('|', $latest_version);
	$latest_version['version'] = $latest_version[0];
	
	if ($latest_version['version'] == "")
	{
		return 3;
	}
	else
	{	
		if ($current_version >= $latest_version['version'])
		{
			return 1;
		}
		else
		{
			return 2;
		}
	}
}

function test_database_connection($hostname, $username, $password, $database)
{
	$error = FALSE;
	
	$connection = @mysql_connect($hostname, $username, $password) or $error = TRUE;
	@mysql_select_db($database) or $error = TRUE;
	
	@mysql_close($connection);
	
	return $error;
}

function create_tables($tables_prefix)
{
	$database_schema = @file('includes/files/database_schema_install.sql');
	
	$database_schema = preg_replace('#ob_#i', $tables_prefix, $database_schema);
	
	foreach ($database_schema as $line)
	{
		if (substr($line, 0, 1) != '#' && $line != '') 
		{
			$query .= $line;
			if (substr(trim($line), -1, 1) == ';') 
			{
				mysql_query($query) or die(mysql_error());
				$query = '';
			}
		}
	}
}

function insert_blog_data($tables_prefix, $blog_title, $blog_description, $admin_email, $meta_keywords, $allow_registrations, $posts_per_site, $links_per_box, $months_per_archive)
{
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('blog_title', '$blog_title')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('blog_description', '$blog_description')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('meta_keywords', '$meta_keywords')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('allow_registrations', '$allow_registrations')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('enable_rss_posts', '1')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('enable_rss_comments', '1')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('enable_atom_posts', '1')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('enable_atom_comments', '1')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('enable_delicious', '1')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('enable_technorati', '1')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('enable_digg', '1')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('enable_stumbleupon', '1')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('enable_furl', '1')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('enable_reddit', '1')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('posts_per_site', '$posts_per_site')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('links_per_box', '$links_per_box')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('months_per_archive', '$months_per_archive')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('enabled', '1')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('offline_reason', '')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('admin_email', '$admin_email')");
}

function insert_admin_data($tables_prefix, $admin_username, $admin_password, $admin_email, $admin_display_name = NULL)
{
	$registered = date("Y-m-d H:i:s");
	
	if ($admin_display_name === NULL)
	{
		mysql_query("INSERT INTO " . $tables_prefix . "users (username, password, secret_key, email, registered, level, status) VALUES('$admin_username', '" . md5($admin_password) ."', '', '$admin_email', '$registered', 'administrator', '1')") or die (mysql_error());
	}
	else
	{
		mysql_query("INSERT INTO " . $tables_prefix . "users (username, password, secret_key, email, display_name, registered, level, status) VALUES('$admin_username', '" . md5($admin_password) ."', '', '$admin_email', '$admin_display_name', '$registered', 'administrator', '1')") or die (mysql_error());;
	}
}

function write_main_config($base_url)
{
	$sample_config['path'] 		= 'includes/files/config.sample.php';
	$sample_config['handle'] 	= fopen($sample_config['path'], 'r');
	
	$main_config['path'] 		= '../application/config/config.php';
	$main_config['handle'] 		= fopen($main_config['path'], 'w');
		
	$sample_config['content'] = fread($sample_config['handle'], filesize($sample_config['path']));

	$find = array('__url__');
	$replace = array($base_url);
		
	$main_config['content'] = str_replace($find, $replace, $sample_config['content']);
		
	fwrite($main_config['handle'], $main_config['content']);
	chmod($main_config['path'], 0777);
		
	fclose($sample_config['handle']);
	fclose($main_config['handle']);
}

function write_database_config($hostname, $username, $password, $database, $prefix)
{
	$sample_config['path'] 		= 'includes/files/database.sample.php';
	$sample_config['handle'] 	= fopen($sample_config['path'], 'r');
	
	$database_config['path'] 	= '../application/config/database.php';
	$database_config['handle'] 	= fopen($database_config['path'], 'w');
		
	$sample_config['content'] = fread($sample_config['handle'], filesize($sample_config['path']));

	$find = array('__hostname__', '__username__', '__password__', '__database__', '__prefix__');
	$replace = array($hostname, $username, $password, $database, $prefix);
		
	$database_config['content'] = str_replace($find, $replace, $sample_config['content']);
		
	fwrite($database_config['handle'], $database_config['content']);
	chmod($database_config['path'], 0777);
		
	fclose($sample_config['handle']);
	fclose($database_config['handle']);
}

?>