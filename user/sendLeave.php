<?php

	include("../functions.php");

	if(!checkLogin()){ // check if user is logged in, if not redirect to login page
	
	redirect('../login.php');
	}

	require_once('../libs/phpmailer/class.phpmailer.php');
	require_once("../libs/phpmailer/class.smtp.php");
	require ("../libs/phpmailer/PHPMailerAutoload.php");
	require '../libs/PHPWord/vendor/autoload.php';

	$validation = 0;

	foreach ($_POST as $key => $value) 
	{
			$$key = $value; 
	}

	$_SESSION['Data']=$_POST;
	if(empty($reason))
	{
		$_SESSION['errors'][] = "Empty Reason" ;
		$validation = 1;
	}
	if(empty($stDate))
	{
		$_SESSION['errors'][] = "Empty start date" ;
		$validation = 1;
	}
	if(empty($endDate))
	{
		$_SESSION['errors'][] = "Empty end date" ;
		$validation = 1;
	}
	$id = $_GET['id'];
	
	if($validation == 1)
	{
		header("Location:home.php?id=$id");
		exit;
	}

	

	$query = "select * from student where id = \"$id\"";

	$res = execute($query);

	$data = fetch_array($res);

	$firstName = strtolower($data['firstName']);
	$lastName = strtolower($data['lastName']);
	$email = 'leaveapplicationforms@gmail.com';

	$stDate = substr($_POST['stDate'], 5, 2).'/'.substr($_POST['stDate'], 8, 2).'/'.substr($_POST['stDate'], 0, 4).' '.substr($_POST['stDate'], 11);
	$endDate = substr($_POST['endDate'], 5, 2).'/'.substr($_POST['endDate'], 8, 2).'/'.substr($_POST['endDate'], 0, 4).' '.substr($_POST['endDate'], 11);

	$name = $data['firstName'].' '.$data['lastName'];
	$roll = $data['rollNo'];
	$docname = $roll."_".$name."_Leave Form.docx";
	
	$class = $data['batch'].' "'.$data['section'].'" ';
	$con = $data['contactNo'];
	//mailer part (the part which composes the mail)
	$mailer = new PHPMailer();
	$mailer->IsSMTP();
	$mailer->SMTPSecure = 'tls';
	$mailer->Host = 'smtp.gmail.com';
	$mailer->SMPTDebug = 2;
	$mailer->Port = 587;
	$mailer->Username = $email;
	$mailer->Password = "Sheru!@#4";
	$mailer->SMTPAuth = true;
	$mailer->From = $email;
	$mailer->FromName = $name;
	$mailer->Subject = 'Leave Form';
	$mailer->isHTML(true);
	$mailer->Body='Hello Sir,<p> I will be unable to attend classes from '.$stDate.' to '.$endDate.'.</p> <p>Sorry for the inconveniance caused.</p><p>Regards,<p>'.$name.'</p><p>'.$roll.'</p>';
	$mailer->AddAddress('shreyansh.lodha@deerwalk.edu.np','Shreyansh');


	// Template processor instance creation
	$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../resources/leaveform.docx');

	$templateProcessor->setValue('name', $name);
	$templateProcessor->setValue('batch', $class);
	$templateProcessor->setValue('rollno', $roll);
	$templateProcessor->setValue('contNo', $con);
	$templateProcessor->setValue('staDate', $stDate);
	$templateProcessor->setValue('endDate', $endDate);
	$templateProcessor->setValue('reason', $_POST['reason']);
	$templateProcessor->saveAs('../result/'.$docname);

	$myInputs = $_POST['myInputs'];

	foreach ($myInputs as $eachInput) 
	{
    	 $mailer->AddAddress($eachInput);
	}

	// Attach the document;
	$mailer->addAttachment('../result/'.$docname);

	//send the mail
	if($mailer->Send()){
	    $_SESSION['Feedback'] = "Your leave was sent";
	}else{
	    $_SESSION['Feedback'] = "Some error occured. Try again!!";
	}



	// add the leave to the database	
	$dataForLeave = array("name"=>$name, "startDate" => $stDate,"endDate"=>$endDate,"Sid"=>$data['id'], "reason"=>$_POST['reason'] );

	insert($dataForLeave,"leavedata");

	header("location:home.php?id=$id");
	    die;
?> 