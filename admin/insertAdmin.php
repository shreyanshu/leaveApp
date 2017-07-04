<?php

	include("../functions.php");

	if(!checkLogin())
	{
	 // check if user is logged in, if not redirect to login page
	echo $_SESSION['loggedInUser'];
	//redirect('../login.php');
	}	

//	session_start();
	$validation = 0;

	foreach ($_POST as $key => $value) 
	{
			$$key = $value; 
	}

	$_SESSION['Data']=$_POST;
	if(empty($username))
	{
		$_SESSION['errors'][] = "Empty Username" ;
		$validation = 1;
	}

	if(empty($password))
	{
		$_SESSION['errors'][] = "Empty password" ;
		$validation = 1;
	}

	$query = "select * from admin where username = '$username'";
	$res = execute($query);
	$num = total_rows($res);
	if($num>0)
	{
		$_SESSION['errors'][] = "Username already taken use another user" ;
		$validation = 1;
	}

		
	if($validation == 1)
	{
		header("Location:addAdmin.php");
		exit;
	}

	insert($_SESSION['Data'], "admin");

	$_SESSION['Feedbacks'] = "Admin Created";
	header("Location:../login.php");

	exit;


?>