<?php
include '../functions.php';


if(isset($_SESSION['Data'])){
  $oldData = $_SESSION['Data']; 
  unset($_SESSION['Data']); //session_unset(); 
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
      if(isset($_SESSION['emailError'])){
        
         echo "<p class = 'bg-danger'>";
          $error = $_SESSION['emailError'];
          echo "<b class = 'text-danger'>$error</b><br>";
        echo '</p>';
        
        unset($_SESSION['emailError']); //session_unset();
      } 

        
      ?>
    <form class = "form-horizontal" role = "form" method="POST" action="insertUser.php">

     <div class="fluid-container">  
       <div class = "form-group">
          <label for = "username" class = "control-label col-sm-2">User Name: </label>     
          <div class = "col-sm-5">
             <input type = "text" class = "form-control" name="username" placeholder = "Enter User Name" value="<?php echo isset($username)?$username:''; ?>">
          </div>
       </div>

       <div class = "form-group">
          <label for = "password" class = "control-label col-sm-2">Password for the account: </label>
          <div class = "col-sm-5">
             <input type = "password" class = "form-control" name = "password"  placeholder = "Enter password" value="<?php echo isset($password)?$password:''; ?>">
          </div>
       </div> 

       <div class = "form-group">
        <label for = "firstname" class = "control-label col-sm-2">First Name: </label>
          
          <div class = "col-sm-5">
             <input type = "text" class = "form-control" name="firstName" placeholder = "Enter First Name" value="<?php echo isset($firstName)?$firstName:''; ?>">
          </div>
       </div>
       
       <div class = "form-group">
          <label for = "lastname" class = "control-label col-sm-2">Last Name: </label>
          <div class = "col-sm-5">
             <input type = "text" class = "form-control " name = "lastName" placeholder = "Enter Last Name" value="<?php echo isset($lastName)?$lastName:''; ?>">
          </div>
       </div>


       <div class = "form-group ">   
          <label for = "batch" class = "control-label col-sm-2" >Batch: </label>
             <div class = "col-sm-5">
                <select class="form-control" name= "batch" value="<?php echo isset($batch)?$batch:''; ?>">
                  <option value="2016">2016</option>
                  <option value="2017">2017</option>
                  <option value="2018">2018</option>
                  <option value="2019">2019</option>
  `              </select>
             </div>   
       </div> 


       <div class = "form-group">   
            <label for = "section" class = "control-label col-sm-2">Section: </label>
            <div class = "col-sm-5">
              <select class = "form-control" name = "section" value="<?php echo isset($section)?$section:''; ?>">
                  <option value="A">A</option>
                  <option value="B">B</option>
              </select>
            </div>  
        </div>
    

       <div class = "form-group">
          <label for = "rollno" class = "control-label col-sm-2">Roll No: </label>
          <div class = "col-sm-5">
             <input type = "text" class = "form-control" name = "rollNo" placeholder = "Enter Roll No." value="<?php echo isset($rollNo)?$rollNo:''; ?>">
          </div>
       </div> 

      
      
       <div class = "form-group">
          <label for = "contNo" class = "control-label col-sm-2">Contact No: </label>
          <div class = "col-sm-5">
             <input type = "text" class = "form-control" name = "contactNo" placeholder = "Enter Contact No." value="<?php echo isset($contactNo)?$contactNo:''; ?>">
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

   
