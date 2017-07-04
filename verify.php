<?php

	include 'functions.php';

	$username = $_POST['username'];
	$password = $_POST['password'];


	dbConnect();


	// generate code for checking invalid username
	if($_POST['role']=='Admin')
		$query = "select * from admin where username = \"$username\"";
	else
		$query = "select * from student where username = \"$username\"";

	$result = execute($query);
	$num = total_rows($result);

	
	if ($num == 0) 
	{
		$_SESSION['invalidUser']="This user do not exists ";
		header("Location:login.php");
		exit;
	}

	// generate code for checking invalid password
	if($_POST['role']=='Admin')
		$query1 = "select * from admin where username = \"$username\" and password = \"$password\"";
	else
		$query1 = "select * from student where username = \"$username\" and password = \"$password\"";

	
	$result2 = execute($query1);
	$num = total_rows($result2);
	if ($num == 0) 
	{
		$_SESSION['invalidUser']="Username and password do not match";
		header("Location:login.php");
		exit;
	}



	// redirect to admin's homepage
	if($_POST['role']=='Admin')
	{
		$query = "select username,id from admin where username = \"$username\"" ;
		$res = execute($query);
		$arr = fetch_array($res);
		$_SESSION['loggedInUser'] = $arr['username'];
		$id= $arr['id'];
		header("location:admin/home.php?id=$id");
		exit;
	}

	else// redirect to user's homepage
	{
		$query = "select username, id, status from student where username = \"$username\"" ;
		$res = execute($query);
		$arr = fetch_array($res);
		$status = $arr['status'];
		if($status == null)
		{
			$_SESSION['invalidUser']="The account is not active yet!!";
			header("Location:login.php");
			exit;
		}
		else
		{
			$id= $arr['id'];
			$_SESSION['loggedInUser'] = $arr['username'];
			// print_r($arr);
			// echo $_SESSION['loggedInUser'];
			header("location:user/home.php?id=$id");
			exit;
		}
	}

?>