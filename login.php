<?php
session_start()
?>


<!doctype html>

<html>
  <head>
      <meta charset="utf-8">
      <mata name="viewport" content="width=device, initial-sctiale=1.0">
      <title>Leave application</title>
       <link href="libs/css/bootstrap.min.css" rel="stylesheet">
      <!-- in server <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->


  </head>
  <div class = "container">	
	  <body class= "bg-info">
	  		<nav class="navbar navbar-default navbar-static-top">
				    <div class = "navbar-header">
				      <a class = "navbar-brand" href = "http://www.dwit.edu.np">College site</a>
				    </div>

				   
				   
				      <ul class = "nav navbar-nav">
				         <li class = "active"><a href = "http://classroom.dwit.edu.np">The Classroom site</a></li>
				         <li><a href = "http://www.shreyansh.com.np">About us</a></li>
				      </ul>
				    
			</nav>

	  		
		  		
					
					
				
				<div class="jumbotron well-lg ">
				<div class = "row">
					<h1 class = "text-success col-md-9 ">Leave application Form</h1>  
					<div class = "col-md-3 ">
						
						<!-- <a href = "user/adduser.php" class = "btn btn-primary btn-lg p-y-auto" ><h2 >Create account</h2></a> -->
						</div>
					</div>	
					
				
					
					<p>
						<?php
						//echo isset($_SESSION['error'])?$_SESSION['error']:"";
						if(isset($_SESSION['invalidUser'])){
							$error = $_SESSION['invalidUser'];
							 	echo "<kbd class = 'text-warning'>$error";
							unset($_SESSION['invalidUser']); //session_unset();
						} 

						if(isset($_SESSION['Feedbacks'])){
							$feedback = $_SESSION['Feedbacks'];
							 	echo "<kbd class = 'text-SUCCESS'>$feedback";
							unset($_SESSION['Feedbacks']); //session_unset();
						} 
							

						?>
					</p>
				</div>


				
 				

 				<div>
					<a href="admin/viewAll.php" class="btn btn-warning col-md-offset-9">View Leave Status</a>

					<a href="user/adduser.php" class="btn btn-success">Create Account</a>
					
				</div>

				<form class = "form-horizontal" role = "form" method="POST" action="verify.php">
					<div class="fluid-container">  
						<div class = "form-group">
							<label for = "firstname" class = "control-label col-sm-2">User Name: </label>

							<div class = "col-sm-5">
							   <input type = "text" class = "form-control" name="username" placeholder = "Enter User Name" required>
							</div>
						</div>	
					
						 


						<div class = "form-group">
							<label for = "password" class = "control-label col-sm-2">Password: </label>
							<div class = "col-sm-5">
							   <input type = "password" class = "form-control " name = "password" placeholder = "Enter the password" required>
							</div>
						</div>

						 <div class = "form-group ">   
						        <label for = "batch" class = "control-label col-sm-2" >Role: </label>
						           <div class = "col-sm-5">
						              <select class="form-control" name= "role">
						                <option value="Admin">Admin</option>
						                <option value="Normal User">Normal User</option>
						              </select>
						           </div>   
						     </div> 

						<div class = "form-group">
						     <div class = "col-sm-10 col-sm-offset-2">
						     	<input class="btn btn-primary" role="button" value="SUBMIT" type="submit">
						     </div>
						</div>
					</div>

				</form>

		
			
	    </body>
	
</html> 

