<?php
include '..\php\config.php';

$userlogin = $_SESSION['studentEmail'];
$studentId = $_SESSION['studentId'];
//echo $userlogin;
?>

<!DOCTYPE html>
<html>
<head>
	<title>STUDENT PAGE</title>
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
			 <li class="nav-item" style="margin-top: 13px;">
				<b>
					<small style="color: darkgrey;"><?php echo $userlogin; ?></small>
				</b>
			</li>-
			<li class="nav-item" style="margin-top: 5px;">
				<b>
					<a style="color: white" class="nav-link" href="..\php\logout_process.php">Log Out</a>
				</b>
			</li>
		</ul>
	</nav>

	<center>
		<h1 style="color: black; margin-top: 10%;">eSUKSIS</h1>

		<div style="margin-top: 5%;">
			<a href="student_recruitment.php">
				<img src="image/recruitment.jpg" alt="recruitment">
			</a>
			<?php
			$result=mysqli_query($con,"SELECT * FROM student WHERE studentEmail='$userlogin'");
			while($row=mysqli_fetch_array($result))
			{
				$application=$row['application'];
				$status=$row['status'];
				//echo $application;
				if($application == 'Yes' AND $status == 'Approve')
				{
					?>
					<a href="student_class_law_page.php">
						<img src="image/learning.jpg" alt="learning">
					</a>
					<?php
				}
			}
			?>
			<!-- <a href="student_class_law_page.php">
				<img src="image/learning.jpg" alt="learning">
			</a> -->
		</div>
	</center>
	
</body>
</html>