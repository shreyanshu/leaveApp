<?php
	include 'functions.php';
	
	$id = $_GET['id'];// get id to change the status

	update(array("status"=>"active"),array("id"=>$id),"student");//update the status

	$_SESSION['Feedbacks'] = "User registered";//send the feedback
	header("Location:login.php");
	die;

?>