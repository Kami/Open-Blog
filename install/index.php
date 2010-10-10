<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<title>Open Blog Installation</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<link rel="stylesheet" type="text/css" href="includes/style/main.css" media="screen"/>
</head>
<body>
<div class="container">
	<div class="header"> 
		<?php include('header.php'); ?>
	</div>
		
	<div class="top">
		<?php
			require('includes/functions.php');
	
			$step = (int)$_GET['step'];
			
			switch ($step)
			{
				case 1:
				{
					$title = 'Step 1 / 3';
					$file = 'pages/step_1.php';
					break;
				}
				
				case 2:
				{
					$title = 'Step 2 / 3';
					$file = 'pages/step_2.php';
					break;
				}
				
				case 3:
				{
					$title = 'Step 3 / 3';
					$file = 'pages/step_3.php';
					break;
				}
				
				default :
				{
					$title = 'Welcome to installation';
					$file = 'pages/index.php';
				}
			}
		?>
   		<?php echo $title; ?>
    </div>
	
	<div class="main">
			<?php include($file); ?>
	</div>
	
	<div class="footer">
    	<?php include('footer.php'); ?>
    </div>
</div>
</body>
</html>
<?php ob_start(); ?>
