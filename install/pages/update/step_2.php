<?php

if (is_installed())
{
	require('../application/config/config.php');
	require('../application/config/database.php');
	
	mysql_connect($db['default']['hostname'], $db['default']['username'], $db['default']['password']) or die(mysql_error());
	mysql_select_db($db['default']['database']) or die(mysql_error());
	
	//  data
	$data = get_data($db['default']['dbprefix']);
	// drop old tables
	drop_old_tables($db['default']['dbprefix']);
	// create new tables
	create_new_tables($db['default']['dbprefix']);
	// insert old data
	insert_data($db['default']['dbprefix'], $data);
	
	mysql_close();
	
	// write main config file
	write_main_config($config['base_url']);
	
	echo 'Open Blog has been successfully updated to version 1.1.0.<br /><br />
	Before you can start using your blog, you must delete the <strong>install/</strong> directory.<br /><br />
	When you are done, go to your <a href="' . $config['base_url'] . '" target="_blank">blog home page</a>.';
}
else
{
	header("Location: update.php");
}

?>