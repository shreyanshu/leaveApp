<?php
	include '../functions.php';

	$data = $_POST;

	$condition = array("id" => $_GET['id']);//update where the id matches

	update($data, $condition, "student");	
	
	$id = $_GET['id'];
	header("location:home.php?id=$id");// move to home
	die;

?>