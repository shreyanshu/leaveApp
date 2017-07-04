<?php
	/*
	The required file sot complete the process are included 
	*/
	require_once('../libs/phpmailer/class.phpmailer.php');
	require_once("../libs/phpmailer/class.smtp.php");
	require ("../libs/phpmailer/PHPMailerAutoload.php");
	
	include '../functions.php';

	if(!checkLogin()){ // check if user is logged in, if not redirect to login page
	redirect('../login.php');
	}


	// changing the status on basis of action of admin
	if($_GET['action'] == 'accepted')
	{
		$condition  = array('id' =>  $_GET['id']);
		$data  = array('status' => "accepted");
		echo "got here";
		update($data,$condition,"leaveData");

	}


	else
	{
		$condition  = array('id' =>  $_GET['id']);
		$data  = array('status' => "rejected");
		update($data,$condition,"leaveData");
	}

	$action = $_GET['action'];
	$Sid = $_GET['Sid'];
	// getting user info to send the email
	$query = "select * from student where id = $Sid";

	$res = execute($query);

	$data = fetch_array($res);

	$firstName = ucwords(strtolower($data['firstName']));

	$lastName = ucwords(strtolower($data['lastName']));
	$emailOfRec = $firstName.".".$lastName."@deerwalk.edu.np";//strtolower($data['firstName']).'.'.strtolower($data['lastName']).'@deerwalk.edu.np';


	$Aid = $_GET['Aid'];
	$query1 = "select username from admin where id = $Aid";
	$res1 = execute($query1);
	$dataOfAdmin = fetch_array($res1);
	$nameOfSender = $dataOfAdmin['username'];


	$email = 'leaveapplicationforms@gmail.com';

	// $stDate = substr($_POST['stDate'], 5, 2).'/'.substr($_POST['stDate'], 8, 2).'/'.substr($_POST['stDate'], 0, 4).' '.substr($_POST['stDate'], 11);
	// $endDate = substr($_POST['endDate'], 5, 2).'/'.substr($_POST['endDate'], 8, 2).'/'.substr($_POST['endDate'], 0, 4).' '.substr($_POST['endDate'], 11);

	$name = $firstName.' '.$lastName;
	$leaveId = $_GET['id'];
	$queryForDate = "select startDate, endDate from leaveData where id = $leaveId";
	$resForDate = execute($queryForDate);
	$dateArray = fetch_array($resForDate);
	$stDate = $dateArray['startDate'];
	$endDate = $dateArray['endDate'];

	//mailer part (the part which composes the mail)
	$mailer = new PHPMailer();
	$mailer->IsSMTP();
	$mailer->SMTPSecure = 'tls';
	$mailer->Host = 'smtp.gmail.com';
	$mailer->SMPTDebug = 2;
	$mailer->Port = 587;
	$mailer->Username = $email;//Email address of sender i.e. leaveapp...
	$mailer->Password = 'Sheru!@#4';//password of the email address
	$mailer->SMTPAuth = true;
	$mailer->From = $email;//Email address of sender i.e. leaveapp...
	$mailer->FromName = $nameOfSender;//admin send the reply to leave form 
	$mailer->Subject = 'Leave Form - '.$action ;//subject of the email
	$mailer->isHTML(true);

	$mailer->Body="Hello $firstName,<br><br>Your leave application from $stDate to $endDate has been $action.<br><br>Thanks,<br>$nameOfSender";// email body
	$mailer->AddAddress($emailOfRec,$name);//adding address of receiver


	//send the mail
	if($mailer->Send()){
	    	
	  }else{
	    echo "Error while sending email.";
	}

 	header("location:home.php?id=$Aid");
	    die;
 ?>