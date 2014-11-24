<?php
session_start();
//error_reporting(0);
date_default_timezone_set('Asia/Calcutta');
define('LOGGED_IN',true);
require 'core.php';
//require 'chat.php';
require 'connect.php';
require 'general.php';
require 'users.php';
$_SESSION['user']=(isset($_GET['user'])=== true) ? (int)$_GET['user'] : 0;

if(logged_in()=== true)
{
$session_user_id = $_SESSION['userID'];
$user_data=user_data($_SESSION['userID'],'userID','username','password','F_name','L_name','email');

if(user_active($user_data['username'])=== false)
	{
		session_destroy();
		header('Location: index.php');
		exit();
	}
}
$errors = array();
?>