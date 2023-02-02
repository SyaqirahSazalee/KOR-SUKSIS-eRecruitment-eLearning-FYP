<?php
include '..\php\config.php';

$adminEmail = $_SESSION['loginemail'];

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style type="text/css">
    	a:hover
    	{
    		background-color: grey;
    	}
    </style>
</head>
<body>
	<nav class="navbar navbar-light" style="background-color: #00008B; justify-content: flex-end;">
		<ul class="nav justify-content-end">
			<li class="nav-item" style="margin-top: 5px;">
				<b>
					<a style="color: white" class="nav-link" href="..\html\admin_page.php">Dashboard</a>
				</b>
			</li>
			<li class="nav-item" style="margin-top: 5px;">
				<b>
					<a style="color: white; text-decoration: underline;" class="nav-link" href="..\php\admin_recruitment_pending_process.php">Recruitment</a>
				</b>
			</li>
			<li class="nav-item" style="margin-top: 5px;">
				<b>
					<a style="color: white" class="nav-link" href="..\php\logout_process.php">Log Out</a>
				</b>
			</li>
		</ul>
	</nav>

	<br><br>

	<nav class="nav nav-pills nav-fill">
	  <a class="nav-link" href="..\php\admin_recruitment_pending_process.php">Pending</a>
	  <a class="nav-link active" href="..\php\admin_recruitment_approved_process.php">Approved</a>
	  <a class="nav-link" href="..\php\admin_recruitment_rejected_process.php">Rejected</a>
	</nav>

	<br><br>
</body>
</html>


<?php

$result = mysqli_query($con,"SELECT * FROM student WHERE application = 'Yes' AND status = 'Approve'");

if (mysqli_num_rows($result) > 0) {
?>

<!DOCTYPE html>
<html>
<head>
	<title>RECRUITMENT APPLICATION LIST</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th scope="col">Id</th>
				<th scope="col">Name</th>
				<th scope="col">Matric No</th>
				<th scope="col">IC No</th>
				<th scope="col">Phone No</th>
				<th scope="col">Action</th>
			  </tr>
		</thead>

		<?php
		$i=0;
		while($row = mysqli_fetch_array($result)) 
		{
		?>

			<tbody>
				<tr>
					<th scope="row"><?php echo $row["studentId"]; ?></th>
					<td><?php echo $row["studentName"]; ?></td>
					<td><?php echo $row["studentMatricNo"]; ?></td>
					<td><?php echo $row["studentIcNo"]; ?></td>
					<td><?php echo $row["studentPhoneNo"]; ?></td>
					<td>
						<a class="btn btn-primary" href="admin_recruitment_review_process_2.php?id=<?php echo $row["studentId"]; ?>">Review</a>
					</td>
				</tr>
			</tbody>

		<?php
		$i++;
		}
		?>
	</table>
<?php
}
else
{
    echo "No result found";
}
?>
</body>
</html>