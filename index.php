<!DOCTYPE html>
<html lang="en">
<?php include'core/init.php';?>
<head>
<title>Society Of Mathematics MU</title>
	<?php include 'includes/head.php';?>
</head>
	<?php include 'includes/navbar.php';?>
	<?php
	if(logged_in()==true) 
	{
		//include 'widget/shortdisplay.php';
		include 'includes/test.php';
		include 'widget/chat.php';
	}
	else
	{
		include 'widget/carousel.php';
	}

	?> 
	<?php include 'includes/footer.php';?> 
<?php echo user_count(); ?>
</body>
</html>
