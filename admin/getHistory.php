<?php
require("../functions.php"); //including functions.php will automatically start session 
	if(!checkLogin()){ // check if user is logged in, if not redirect to login page
		redirect('../login.php');
	}
?>
<html>
<head>
      <meta charset="utf-8">
      <mata name="viewport" content="width=device, initial-sctiale=1.0">
      <title>Leave application</title>
       <link href="../libs/css/bootstrap.min.css" rel="stylesheet">
      <!-- in server <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->


  </head>

<div class="container">
<body class= "bg-info">   

  <div class="container ">

    <div class="jumbotron well-lg ">
      <h1 class = "text-success">Leave application Form</h1>
      <p><kbd>A simple way to send leave application</p>
    </div>  
    
	<div>
		<a href="home.php?id=<?php echo $_GET['Aid']?>" class="btn btn-primary col-md-offset-9"><< Back</a>

		<a href="../user/addUser.php" class="btn btn-primary ">Add User</a>
		
		<a href="../logout.php" class="btn btn-primary ">Logout</a>
	</div>

	<p></p>
	<div class="table-responsive">
		<table class="table table-stripped">
			<thead>
				<tr class="active">
					<th style= "width: 3%">SN</th>
					<th style= "width: 13%">Full Name</th>
					<th style= "width: 15%">Start Date</th>
					<th style= "width: 15%">End Date</th>
					<th style= "width: 27%">Reason</th> 
					<th style= "width: 17%">Status</th>
				</tr>
			</thead>
			<tbody>
<?php
		$sn =1;
		$id = $_GET['id'];
		$query = "select name, startDate,endDate,leaveData.status, reason from leaveData inner join student on leaveData.Sid = student.id where student.id  = $id order by leaveData.id desc";
		$result = execute($query);
		if(total_rows($result)>0){ //total_rows() function in functions.php
			while ($row = fetch_array($result)) 
			{ // fetch_array() function in function.php		
				?>
					<tr class ="<?php
								if($row['status'] == null)
								{
									echo "warning";
								}
								elseif ($row['status'] == "accepted") 
								{
									echo "success";	
								}
								else
								{
									echo "danger";
								}
							?>">
						<td><?php echo $sn++; ?></td>
						<td><?php echo $row['name'] ?></td>
						<td><?php echo $row['startDate'] ?></td>
						<td><?php echo $row['endDate'] ?></td>
						 <td><?php echo $row['reason'] ?></td> 
						<td>
							<?php
								if($row['status'] == null)
								{
									echo "<div class = \"warning text-warning\">Pending</div>";
								}
								elseif ($row['status'] == "accepted") 
								{
									echo "<div class = \"success text-success\">Accepted</div>";	
								}
								else
								{
									echo "<div class = \"danger text-danger\">Rejected</div>";
								}
							?>	
							
						</td>
					</tr>
				<?php
			}
		}
?>
</tbody>
</table>
</div>
</body>
</div>
</div>
</html>

<?php

?>




