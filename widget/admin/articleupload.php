<form enctype="multipart/form-data" class="form-horizontal" method="POST" action="admin.php">
    <div class="control-group">
    <label class="control-label" for="title">Title*</label>
    <div class="controls">
    <input type="text" name="title" placeholder="" class="input-xlarge" required>
    <p class="help-block">Place the title of article here</p>
    </div>
    </div>

    <div class="control-group">
    <label class="control-label" for="abstract">Abstract*</label>
    <div class="controls">
    <input type="text" name="abstract" placeholder="" class="input-xlarge" required>
    <p class="help-block">Describe it in short here</p>
    </div>
    </div>

    <div class="control-group">
    <label class="control-label" for="content">content*</label>
    <div class="controls">
    <textarea name="content" placeholder="" class="input-xlarge" style="height: 500px; width: 500px;" required></textarea>
    <p class="help-block">Your article goes here</p>
    </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="content">Upload a Picture</label>
    <div class="controls">
    <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
    <input name="uploadedfile" type="file" /><br /><p class="help-block">Choose a file to upload: </p>
    </div>
    </div>
    <div class="form-actions">
    <button type="submit" class="btn btn-primary" value="Upload File">Save changes</button>
    </div>
</form>
<?php
function cleanQuery($string){    
if(get_magic_quotes_gpc())
$string = stripslashes($string);
return mysql_escape_string($string);
}
if(empty($_POST)== false)
{
$target_path = "uploads/article/";
		$filename = basename($_FILES['uploadedfile']['name']);
		$ext = substr($filename, strrpos($filename, '.') + 1);
			if (($ext == "jpg"||$ext == "JPG"||$ext == "jpeg"||$ext == "JPEG"||$ext == "png"||$ext == "PNG"||$ext == "gif"||$ext == "GIF") && ($_FILES["uploadedfile"]["size"] < 1048576)) 
			{
				$target_path = $target_path.$filename; 

				if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) 
					{	$destination = $_FILES['uploadedfile']['name'];
						echo "<p>The file ".  basename( $_FILES['uploadedfile']['name']). " has been uploaded. Thanks for uploading. ....</p>";
					} 
				else
					{
	    				echo "There was an error uploading the file, please try again\!";
					}
			}

$title = cleanQuery($_POST['title']);
$abstract= cleanQuery($_POST['abstract']);
$content= cleanQuery($_POST['content']);
$docreation= date('Y-m-d h:i:s a', time());
$destination= $target_path;
mysql_query("INSERT INTO `article` (`title`,`abstract`,`content`,`docreation`, `destination`) VALUES ('$title','$abstract','$content','$docreation', '$destination')");
}
?>