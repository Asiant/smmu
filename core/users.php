<?php
function reg_user($reg_data)
	{
		array_walk($reg_data, 'array_sanitize');
		$reg_data['password']=md5($reg_data['password']);

		$fields='`'.implode('`, `', array_keys($reg_data)).'`';
		$data='\''.implode('\',\'',$reg_data).'\'';
		mysql_query("INSERT INTO `users` ($fields) VALUES ($data)");
	}

function user_count()
	{
		return mysql_result(mysql_query("SELECT COUNT(`userID`) FROM `users` WHERE FIELD(`activ`, '1')"), 0);
	}

function user_data($userID)
	{
		$data = array();
		$userID= (int)$userID;
		$func_num_args= func_num_args();
		$func_get_args= func_get_args();

		if($func_num_args>1)
		{
			unset($func_get_args[0]);
			$fields='`'. implode('`,`',$func_get_args).'`';
			$data=mysql_fetch_assoc(mysql_query("SELECT $fields FROM users WHERE `userID`=$userID"));
			return $data;
		}
	}
function logged_in()
	{
		return (isset($_SESSION['userID'])== true) ? true: false;
	}

function user_exists($username)
	{
		$username=sanitize($username);
		$query = mysql_query("SELECT COUNT(`userID`) FROM `users` WHERE `username`='$username'");
		return (mysql_result($query, 0)=='1') ? true : false;
	}
function email_exists($email)
	{
		$email=sanitize($email);
		$query = mysql_query("SELECT COUNT(`userID`) FROM `users` WHERE `email`='$email'");
		return (mysql_result($query, 0)=='1') ? true : false;
	}

function user_active($username)
	{
		$username = sanitize($username);
		$query = mysql_query("SELECT COUNT(`userID`) FROM `users` WHERE `username`='$username' AND FIELD(`activ`, '1')");
		return (mysql_result($query, 0)=='1') ? true : false;
	}

function user_id_from_username($username)
	{
		$username = sanitize($username);
		return mysql_result(mysql_query("SELECT `userID` FROM `users` WHERE `username`='$username'"), 0, 'userID');
	}

function login($username,$password)
	{
		$userID = user_id_from_username($username);
		$username= sanitize($username);
		$password=md5($password);

		return (mysql_result(mysql_query("SELECT COUNT(`userID`) FROM `users` WHERE `username`='$username' AND `password`='$password'"), 0)==1) ? $userID : false;
	}
?>