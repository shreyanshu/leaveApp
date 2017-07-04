<?php
require("../functions.php"); //including functions.php will automatically start session also
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

		<a href="home.php?id=<?php echo $_GET['id'] ?>" class="btn btn-info col-md-offset-9"><< Back</a>

		<a href="../user/addUser.php" class="btn btn-success">Add User</a>
		
		<a href="../logout.php" class="btn btn-danger">Logout</a>
	</div>
	
	<p></p>
	<div class="table-responsive">
		<table class="table table-stripped">
			<thead>
				<tr>
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
		$query = "select name, startDate,endDate,leaveData.status,reason from leaveData inner join student on leaveData.Sid = student.id order by leaveData.id desc";// perform a join to get the total information. See the database for more info.
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
							?>"	>

						<td><?php echo $sn++; ?></td>
						<td><?php echo $row['name'] ?></td>
						<td><?php echo $row['startDate'] ?></td>
						<td><?php echo $row['endDate'] ?></td>
						 <td><?php echo $row['reason'] ?></td> 
						<td>
							<?php
								if($row['status'] == null)
								{
									echo "<div class = \"text-warning\">Pending</div>";
								}
								elseif ($row['status'] == "accepted") 
								{
									echo "<div class = \"text-success\">Accepted</div>";	
								}
								else
								{
									echo "<div class = \"text-danger\">Rejected</div>";
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




