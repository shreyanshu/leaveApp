<?php

    include '../functions.php';

    if(!checkLogin()){ // check if user is logged in, if not redirect to login page
  //echo $_SESSION['loggedInUser'];
  redirect('../login.php');
}
    $condition = array("id" => $_GET['id']);
    $res = listWhere("student", $condition);
    $data = fetch_array($res);
   // echo $data['password'];  
?>

<html>
  <head>
      <meta charset="utf-8">
      <mata name="viewport" content="width=device, initial-sctiale=1.0">
      <title>View User Details</title>
       <link href="../libs/css/bootstrap.min.css" rel="stylesheet">
      <!-- in server <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->


  </head>
  
<body class= "bg-info">
   <div class="container-fluid ">
   
      <div class="jumbotron well-lg">
        <h2 class = "text-success">View acount</h2>  
            

      </div>


  <div>

    <!-- <div class = "text-info">To send leave fill the following form</div> -->

    <a href="home.php?id=<?php echo $_GET['id'] ?>" class="btn btn-info col-md-offset-9"><< Back</a>
    <a href="editUser.php?id=<?php echo $_GET['id'] ?>" class="btn btn-success ">Edit Account</a>   
    <a href="../logout.php" class="btn btn-danger">Logout</a>
   <!--  <h3 class = "text-info">To send leave fill the following form</h3>    -->

    
  </div>
    <form class = "form-horizontal" >

     <div class="fluid-container">  
       <div class = "form-group">
          <label for = "username" class = "control-label col-sm-2">User Name: </label>     
          <div class = "col-sm-5">
             <input type = "text" class = "form-control" value =<?php echo $data['username'] ?> disabled>
          </div>
       </div>

      <!--  <div class = "form-group">
          <label for = "password" class = "control-label col-sm-2">Password for the account: </label>
          <div class = "col-sm-5">
             <input type = "password" class = "form-control" value =<?php //echo $data['password']?> disabled>
          </div>
       </div>  -->

       <div class = "form-group">
        <label for = "firstname" class = "control-label col-sm-2">First Name: </label>
          
          <div class = "col-sm-5">
             <input type = "text" class = "form-control" value = <?php echo $data['firstName'] ?> disabled>
          </div>
       </div>
       
       <div class = "form-group">
          <label for = "lastname" class = "control-label col-sm-2">Last Name: </label>
          <div class = "col-sm-5">
             <input type = "text" class = "form-control " value = <?php echo $data['lastName'] ?> disabled>
          </div>
       </div>


       <div class = "form-group ">   
          <label for = "batch" class = "control-label col-sm-2" >Batch: </label>
             <div class = "col-sm-5">
                 <input type = "text" class = "form-control " value = <?php echo $data['batch'] ?> disabled>
             </div>   
       </div> 


       <div class = "form-group">   
            <label for = "section" class = "control-label col-sm-2">Section: </label>
            <div class = "col-sm-5">
             <input type = "text" class = "form-control " value = <?php echo $data['section'] ?> disabled>
            </div>  
        </div>
    

       <div class = "form-group">
          <label for = "rollno" class = "control-label col-sm-2">Roll No: </label>
          <div class = "col-sm-5">
             <input type = "text" class = "form-control " value = <?php echo $data['rollNo'] ?> disabled>
          </div>
       </div> 

      
      
       <div class = "form-group">
          <label for = "contNo" class = "control-label col-sm-2">Contact No: </label>
          <div class = "col-sm-5">
             <input type = "text" class = "form-control " value = <?php echo $data['contactNo'] ?> disabled>
          </div>
       </div>
          

      
  </p>

   
  </form>

 

</html>

   
