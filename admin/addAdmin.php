<?php
include '../functions.php';

if(!checkLogin()){ // check if user is logged in, if not redirect to login page
  redirect('../login.php');
}

if(isset($_SESSION['oldData'])){
  $oldData = $_SESSION['oldData']; 
  unset($_SESSION['oldData']); //session_unset(); 
  }

if(isset($oldData)){
  foreach($oldData as $key=>$value){
    $$key =$value;
  
  }

} 
?>


<!doctype html>
<html>
  <head>
      <meta charset="utf-8">
      <mata name="viewport" content="width=device, initial-sctiale=1.0">
      <title>Add User</title>
       <link href="../libs/css/bootstrap.min.css" rel="stylesheet">
      <!-- in server <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->


  </head>
  
<body class= "bg-info">
   <div class="container-fluid ">
   
      <div class="jumbotron well-lg">
        <h2 class = "text-success">Add acount</h2>  
            

      </div>
 <?php
      //echo isset($_SESSION['error'])?$_SESSION['error']:"";
      if(isset($_SESSION['errors'])){
        echo "<ul>";
        echo "<p class = 'bg-danger'>";
        foreach ($_SESSION['errors'] as $error) {
          # code...
          echo "<b class = 'text-danger'>$error</b><br>";
         } 
         echo "</p>";
         echo "</ul>";
        unset($_SESSION['errors']); //session_unset();
      } 
     
        
      ?>
      <div>
          <a href="home.php?id=<?php echo $_GET['id'] ?>" class="btn btn-info col-md-offset-9"><< Back</a>
          
          <a href="../logout.php" class="btn btn-danger">Logout</a>
      </div>

      
    <form class = "form-horizontal" role = "form" method="POST" action="insertAdmin.php">

     <div class="fluid-container">  
       <div class = "form-group">
          <label for = "username" class = "control-label col-sm-2">User Name: </label>     
          <div class = "col-sm-5">
             <input type = "text" class = "form-control" name="username" placeholder = "Enter User Name">
          </div>
       </div>

       <div class = "form-group">
          <label for = "password" class = "control-label col-sm-2">Password for the account: </label>
          <div class = "col-sm-5">
             <input type = "password" class = "form-control" name = "password"  placeholder = "Enter password">
          </div>
       </div> 


        <div class = "form-group">
       <div class = "col-sm-10 col-sm-offset-2">
        <input class="btn btn-primary" role="button" value="SUBMIT" type="submit"></a>
    
          </div>
      </div>

      </p>

   
  </form>

 

</html>

