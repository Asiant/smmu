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
		
		if(empty($_POST)==false)
		{
		$target_path = "uploads/papers/";
		$filename = basename($_FILES['uploadedfile']['name']);
		$ext = substr($filename, strrpos($filename, '.') + 1);
			if (($ext == "pdf"||$ext == "doc"||$ext == "docx"||$ext == "rtf"||$ext == "txt") && ($_FILES["uploadedfile"]["size"] < 1048576)) 
			{
				$target_path = $target_path.$filename; 

				if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) 
					{	$docreation = date('Y-m-d h:i:s a', time());
						$destination = $_FILES['uploadedfile']['name']; $title = $_POST['title']; $userdata = $user_data['F_name'];
						echo "<p>The file ".  basename( $_FILES['uploadedfile']['name']). " has been uploaded. Thanks for uploading. Your paper would be reviewed by our society's members....</p>";
					    mysql_query("INSERT INTO `papers` (`username`, `title`, `destination`, `docreation`) 
					    	VALUES 
					    	('$userdata', '$title', '$destination', '$docreation')");
					} 
				else
					{
	    				echo "There was an error uploading the file, please try again\!";
					}
			}
		}
		else
		{
			include 'widget/uploads.php';
		}

	}
		else
	{
		echo 'You are currently not logged in!!!';
	}

	?> 
	<?php include 'includes/footer.php';?> 
<?php echo user_count(); ?>
</body>
</html>