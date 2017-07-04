<?php
    include '../functions.php';
    if(!checkLogin()){ // check if user is logged in, if not redirect to login page
  redirect('../login.php');
}
    $condition = array("id" => $_GET['id']);//condition for update
    $res = listWhere("student", $condition);//get result set
    $data = fetch_array($res);// put res to an array
   // echo $data['password'];  
?>

<html>
  <head>
      <meta charset="utf-8">
      <mata name="viewport" content="width=device, initial-sctiale=1.0">
      <title>Edit User Details</title>
       <link href="../libs/css/bootstrap.min.css" rel="stylesheet">
      <!-- in server <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->


  </head>
  
<body class= "bg-info">
   <div class="container-fluid ">
   
      <div class="jumbotron well-lg">
        <h2 class = "text-success">Edit account</h2>  
            

      </div>


  <div>

    <!-- <div class = "text-info">To send leave fill the following form</div> -->

    <a href="viewAccount.php?id=<?php echo $_GET['id'] ?>" class="btn btn-info col-md-offset-11"><< Back</a>  
  
   <!--  <h3 class = "text-info">To send leave fill the following form</h3>    -->

    
  </div>
    <form class = "form-horizontal" action = "editAccountLogic.php?id=<?php echo $_GET['id'] ?>" method = "post">

     

      

       <div class = "form-group ">   
          <label for = "batch" class = "control-label col-sm-2" >Batch: </label>
             <div class = "col-sm-5">
                 <input type = "text" class = "form-control" name="batch" value = <?php echo $data['batch'] ?> >
             </div>   
       </div> 


       <div class = "form-group">   
            <label for = "section" class = "control-label col-sm-2">Section: </label>
            <div class = "col-sm-5">
             <input type = "text" class = "form-control" name="section" value = <?php echo $data['section'] ?> >
            </div>  
        </div>
    

       <div class = "form-group">
          <label for = "rollno" class = "control-label col-sm-2">Roll No: </label>
          <div class = "col-sm-5">
             <input type = "text" class = "form-control" name="rollNo" value = <?php echo $data['rollNo'] ?>>
          </div>
       </div> 

      
      
       <div class = "form-group">
          <label for = "contNo" class = "control-label col-sm-2">Contact No: </label>
          <div class = "col-sm-5">
             <input type = "text" class = "form-control" name="contactNo" value = <?php echo $data['contactNo'] ?> >
          </div>
       </div>

        <div class = "form-group">
          <label for = "password" class = "control-label col-sm-2">Password for the account: </label>
          <div class = "col-sm-5">
             <input type = "text" class = "form-control" name="password" value = <?php echo $data['password'] ?>>
          </div>
       </div> 


       <div class = "form-group">
                 <div class = "col-sm-10 col-sm-offset-2">
                  <input class="btn btn-primary" role="button" value="Save" type="submit">
                 </div>
        </div>
          
          

      
  </p>

   
  </form>

 

</html>

   
