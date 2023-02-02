<?php
include '..\php\config.php';

//get userlogin email from session
$userlogin = $_SESSION['studentEmail'];
$studentId = $_SESSION['studentId'];
$studentName = $_SESSION['studentName'];

$quizId = $_SESSION['id'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>STUDENT PAGE-ASSESSMENT</title>
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
					<a style="color: white;" class="nav-link" href="student_class_law_page.php">Classes</a>
				</b>
			</li>
			<li class="nav-item" style="margin-top: 5px;">
				<b>
					<a style="color: white; text-decoration: underline;" class="nav-link" href="..\html\student_assessment_page.php">Assessment</a>
				</b>
			</li>
			<li class="nav-item" style="margin-top: 5px;">
		        <b>
		        	<a style="color: white;" class="nav-link" href="..\html\student_forum_page.php">Forum</a>
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

	<?php

	$result = mysqli_query($con,"SELECT * FROM answer WHERE studentId = '$studentId' AND quizId = '$quizId'");

	if (mysqli_num_rows($result) > 0) 
	{
		?>
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th style="text-align: center;">Question</th>
					<th style="text-align: center;">Status</th>
				 </tr>
			</thead>

		<?php
		$i=1;
		while($row = mysqli_fetch_array($result)) 
		{
	
			?>
			<tbody>
				<tr>
					<td style="text-align: center;"><?php echo $row["questionId"]; ?></td>
					<td style="text-align: center;"><?php echo $row["status"]; ?></td>
				</tr>
			</tbody>

			<?php
			$i++;
			?>
		</table>

		<?php
		}
	}
	else
	{
		echo "No result found";
	}

	?>
</body>
</html>