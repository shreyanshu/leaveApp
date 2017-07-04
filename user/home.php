
<?php

include '../functions.php';

if(!checkLogin()){ // check if user is logged in, if not redirect to login page
  
  //redirect('../login.php');
}


?>
<!doctype html>
<html>
  <head>
      <meta charset="utf-8">
      <mata name="viewport" content="width=device, initial-sctiale=1.0">
      <title>Leave application</title>
       <link href="../libs/css/bootstrap.min.css" rel="stylesheet">
      <!-- in server <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->


  </head>

<body class= "bg-info">    
  <div class="container ">

    <div class="jumbotron well-lg ">
      <h1 class = "text-success">Leave application Form</h1> 
      <?php


          if(isset($_SESSION['Feedback']))
          {
              $Feedback = $_SESSION['Feedback'];// print the feedbacks
                echo "<p><kbd class = 'text-warning'>$Feedback</p>";
              unset($_SESSION['Feedback']); //session_unset();
            } 
            else
              echo "<p><kbd>A simple way to send leave application</p>";
      ?>     
      
     </div>

  <div>

    <!-- <div class = "text-info">To send leave fill the following form</div> -->

    <a href="viewHistory.php?id=<?php echo $_GET['id'] ?>" class="btn btn-warning col-md-offset-8">Leave Status</a>

    <a href="addUser.php" class="btn btn-success">Add User</a>

    <a href="viewAccount.php?id=<?php echo $_GET['id'] ?>" class="btn btn-info">Account info</a>
    
    <a href="../logout.php" class="btn btn-danger">Logout</a>
   <!--  <h3 class = "text-info">To send leave fill the following form</h3>    -->

    
  </div>


  <?php

      if(isset($_SESSION['errors'])){
          echo "<ul>";
          echo "<p class = 'bg-danger'>";
          foreach ($_SESSION['errors'] as $error) {
           
            echo "<b class = 'text-danger'>$error</b><br>";
           } 
           echo "</p>";
           echo "</ul>";
          unset($_SESSION['errors']); //session_unset();
  } 
?>
  <form class = "form-horizontal" role = "form" method="POST" action="sendLeave.php?id=<?php echo $_GET['id'] ?>">
   <div class="fluid-container">  

     <div class="form-group">
        <label for="message" class="col-sm-2 control-label">Reason: </label>
          <div class="col-sm-5">
            <textarea class="form-control" rows="4" name="reason" ></textarea>
          </div>
    </div>
    

     <div class = "form-group">
        <label for = "startDate" class = "control-label col-sm-2">Start Date: </label>
        <div class = "col-sm-5">
           <input type = "datetime-local"  class = "form-control" name = "stDate" id = "stDate">
        </div>
     </div>

     <div class = "form-group">
        <label for = "endDate" class = "control-label col-sm-2">End Date: </label>
        <div class = "col-sm-5">
           <input type = "datetime-local" value = "minEndDate();" class = "form-control" name = "endDate" id = "endDate">
        </div>
     </div>

     <div class = "form-group" >
      <label for = "EmailOfTeach" class = "control-label col-sm-2">Email of teacher to cc to: </label>
        <div class = "col-sm-5">
          <input type = "email" class = "form-control" name = "myInputs[]">
        </div>    
     </div>

      <div id="dynamicInput">

      </div> 

     <div class = "form-group">
      <label for= "button" class = "control-label col-sm-2"></label>
      
     <div class = "col-sm-5">
        <input class="btn btn-default"  role="button" id = "choose" value="   +   " type = "button"  onclick="addInput('dynamicInput');">
      </div>
    </div>
 
    <script>
    function addInput(divName)
    {
       var newdiv = document.createElement('div');
       newdiv.innerHTML = "<div class = 'form-group'><label class = 'control-label col-sm-2'>Email address of teacher: </label><div class='col-sm-5' > <input type='email' class = 'form-control' name='myInputs[]'></div></div>";
       document.getElementById(divName).appendChild(newdiv);
       counter++;
    }
    
    
    </script>



     <div class = "form-group">
         <div class = "col-sm-10 col-sm-offset-2">
          <input class="btn btn-primary" role="button" value="SUBMIT" type="submit">
         </div>
    </div>



</form>

</div>  

</html>

   
