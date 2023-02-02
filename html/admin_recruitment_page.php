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
					<a style="color: white; text-decoration: underline;" class="nav-link active" href="..\html\admin_recruitment_page.php">Recruitment</a>
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
	  <!-- <a class="nav-link active" aria-current="page" href="#">Active</a> -->
	  <a class="nav-link" href="..\php\admin_recruitment_pending_process.php">Pending</a>
	  <a class="nav-link" href="..\php\admin_recruitment_approved_process.php">Approved</a>
	  <a class="nav-link" href="..\php\admin_recruitment_rejected_process.php">Rejected</a>
	</nav>
</body>
</html>

