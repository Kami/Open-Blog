<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<title>Open Blog Installation / update script</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<link rel="stylesheet" type="text/css" href="includes/style/main.css" media="screen"/>
</head>
<body>
<div class="container">
	<div class="header"> 
		<?php include('header.php'); ?>
	</div>
		
	<div class="top">Welcome to Open Blog installation / update script</div>
	
	<div class="main">
		<p>Please choose what you would like to do: <br /><br />
			<a href="install.php">Install Open Blog</a> - choose this option, if you would like to install Open Blog 1.1.0<br />
			<a href="update.php">Update Open Blog</a> - choose this option, if you would like to update your existing Open Blog 1.0.0 installation to 1.1.0
		</p>
	</div>
	
	<div class="footer">
    	<?php include('footer.php'); ?>
    </div>
</div>
</body>
</html>
<?php ob_start(); ?>
