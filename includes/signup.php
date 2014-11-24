    <?php 
    if(empty($_POST)== false)
    {
        //'L_name', 'cellnum', 'bio'
        $required_fields = array('username', 'password', 'F_name',  'regnum',  'institution', 'email','password','password_confirm');
        foreach ($_POST as $key => $value) 
        {
            if (empty($value) && in_array($key, $required_fields)===true)
                {
                    $errors="Fields with asterisk are required";
                    break 1;
                }
        }

        if(empty($errors)===true)
        {
            if(user_exists($_POST['username'])===true)
            {
                $errors='Sorry, the username, \''.$_POST['username'].'\' already exists';
            }
            if (preg_match("/\\s/", $_POST['username'])==true)
            {
                $errors = 'you\'r username must not contain any spaces'; 
            }
            if(strlen($_POST['password'])<6)
            {
                $errors='You\'password is too short';
            }
            if($_POST['password'] !== $_POST['password_confirm'])
            {
                $errors='you\' passwords didn\'t match';
            }
            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)== false)
            {
                $errors='A valid email is required';
            }
            if(email_exists($_POST['email'])===true)
            {
                $errors = 'Sorry, the email is already in use';
            }
            if(empty($_SESSION['6_letters_code'] ) || strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
            {  
                $errors="The Validation code does not match!";
                $msg = "The Validation code does not match!";
            }
        } 
    }
    print_r($errors);
    ?>

    <?php 
    if(isset($_GET['sucess'])&& empty($_GET['sucess']))
    {
        echo "you\'ve been registered successfully!!";
    }
else
{
    $date_creation = date('Y-m-d h:i:s a', time());
    if(empty($_POST)==false && empty($errors)==true)
    {
        $reg_data = array(
            'username' =>$_POST['username'] ,
            'password' =>$_POST['password'] ,
            'email' =>$_POST['email'] ,
            'F_name' =>$_POST['F_name'] ,
            'L_name' =>$_POST['L_name'] ,
            'regnum' =>$_POST['regnum'] ,
            'bio' =>$_POST['bio'] ,
            'docreation' =>$date_creation ,
            'institution' =>$_POST['institution'] ,
            'cellnum' =>$_POST['cellnum'] 

        );
        reg_user($reg_data);
        header("Location: signup.php?sucess");
        exit();
    }

    ?>

    <form class="form-horizontal" action='' method="POST">
    
    <fieldset>
    
    <div id="legend">
    <legend class="">Register Below</legend>
    </div>

    <div class="control-group">
    <label class="control-label" for="F_name">First Name*</label>
    <div class="controls">
    <input type="text" id="fname" name="F_name" placeholder="" class="input-xlarge" required>
    <p class="help-block">Your First Name</p>
    </div>
    </div>
    
    <div class="control-group">
    <label class="control-label" for="username">Last Name*</label>
    <div class="controls">
    <input type="text" id="lname" name="L_name" placeholder="" class="input-xlarge" required>
    <p class="help-block">Your Last Name</p>
    </div>
    </div>

    <div class="control-group">
    <label class="control-label" for="username">Username*</label>
    <div class="controls">
    <input type="text" id="lname" name="username" placeholder="" class="input-xlarge" required>
    <p class="help-block">Your Username</p>
    </div>
    </div>

    <div class="control-group">
    <label class="control-label" for="username">Registration Number*</label>
    <div class="controls">
    <input type="number" id="reg" name="regnum" placeholder="" class="input-xlarge" required>
    <p class="help-block">Your College ID Registration number</p>
    </div>
    </div>

    <div class="control-group">
    <label class="control-label" for="username">Cell Number</label>
    <div class="controls">
    <input type="number" id="cell" name="cellnum" placeholder="" class="input-xlarge">
    <p class="help-block">Enter a valid contact number</p>
    </div>
    </div>
    
    <div class="control-group">
    <label class="control-label" for="username">Institution*</label>
    <div class="controls">
    <select name="institution" required><br />
			<option value="MIT" selected>MIT</option>
    			<option value="MCES">MCES</option>
    			<option value="MCODS">MCODS</option>
    			<option value="MIC">MIC</option>
    			<option value="MSAP">MSAP</option>
    			<option value="ICAS">ICAS</option>
    			<option value="KMC">KMC</option>
    			<option value="WGSHA">WGSHA</option>
    			<option value="MCPH">MCPH</option>
    			<option value="MCIS">MCIS</option>
    			<option value="MIJM">MIJM</option>
    			<option value="MLSC">MLSC</option>
    			<option value="MIM">MIM</option>
    			<option value="MCON">MCON</option>
    			<option value="MCOPS">MCOPS</option>
    			<option value="others">Others</option>
    </select> 
    <p class="help-block">Select the name of your Institution</p>
    </div>
    </div>

    <div class="control-group">
    <label class="control-label" for="email">E-mail*</label>
    <div class="controls">
    <input type="email" id="email" name="email" placeholder="" class="input-xlarge" required>
    <p class="help-block">Please provide a valid E-mail address</p>
    </div>
    </div>
     
    <div class="control-group">
    <label class="control-label" for="password">Password</label>
    <div class="controls">
    <input type="password" id="p1" name="password" placeholder="" pattern="[a-zA-Z0-9_-]{6,15}" class="input-xlarge" required>
    <p class="help-block">Password should be at least 6 characters</p>
    </div>
    </div>
     
    <div class="control-group">
    <label class="control-label" for="password_confirm">Password (Confirm)</label>
    <div class="controls">
    <input type="password" id="p2" name="password_confirm" placeholder="" class="input-xlarge" onfocus="validatePass(doccument.getElementById('p1'),this);"
    oninput="validatePass(document.getElementById('p1'),this);">
    <p class="help-block">Please confirm password</p>
    </div>
    </div>
    
    <div class="control-group">
    <label class="control-label" for="username">Tell us about yourself...</label>
    <div class="controls">
    <textarea rows="3" name="bio"></textarea>
    <p class="help-block">Max 250 words</p>
    </div>
    </div>

<?php if(isset($msg)== true) 
    { 
        echo $msg ;
    } 
?> 
	<div class="control-group">
    <label class="control-label" for="username">Validation code:</label>
	<div class="controls">
        <img name="captchaimg"src="captcha_code_file.php?rand=<?php echo rand();?>"><br>
        <label for='message'>Enter the code above here :</label>
        <br>
        <input id="6_letters_code" name="6_letters_code" type="text">
        <br>
        <p>Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh
        </p></div></div>
       

<script type='text/javascript'>
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script> 

    <div class="control-group">
    <div class="controls">
    <button name="Submit" type="submit" onclick="return validate();" value="Submit">Register</button>
    </div>
    </div>
    </fieldset>
    </form>
     <?php } ?>