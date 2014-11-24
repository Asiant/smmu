<?php
include'core/init.php';


if(empty($_POST) === false)
	{
		$username= $_POST['username'];
		$password= $_POST['password'];

		if(empty($username) === true || empty($password) === true)
			{
				$errors[]='you need to enter a username and password';
			} 
			elseif (user_exists($username)===false)
			{
				$errors[]='cant find user with that username';
			} 
			elseif (user_active($username)===false) 
			{
				$errors[]='you havent activated your account';
			} 
			else
				{
					$login=login($username,$password);

				if($login===false)
				{
					$errors[]='username or password combination is incorrect';
				} 
					else 
				{
					$_SESSION['userID']= $login;
					header('Location: index.php');
					exit();
				}
				}

			print_r($errors);
	}
?>
