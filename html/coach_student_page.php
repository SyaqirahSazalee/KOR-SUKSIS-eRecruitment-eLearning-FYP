<?php
include '..\php\config.php';

$coachId = $_SESSION['loginid'];
$coachName = $_SESSION['name'];

//$id=$_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>COACH PAGE - ASSESSMENT</title>
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
			<!-- <li class="nav-item" style="margin-top: 5px;">
				<b>
					<a style="color: white;" class="nav-link" href="..\html\coach_page.php">Dashboard</a>
				</b>
			</li> -->
			<li class="nav-item" style="margin-top: 5px;">
				<b>
					<a style="color: white" class="nav-link" href="..\html\coach_class_law_page.php">Classes</a>
				</b>
			</li>
			<li class="nav-item" style="margin-top: 5px;">
				<b>
					<a style="color: white;" class="nav-link" href="..\html\coach_assessment_page.php">Assessment</a>
				</b>
			</li>
			<li class="nav-item" style="margin-top: 5px;">
		        <b>
		          	<a style="color: white;" class="nav-link" href="..\html\coach_forum_page.php">Forum</a>
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
	// $result=mysqli_query($con,"SELECT * FROM student");
	// $i=0;
	// while($row=mysqli_fetch_array($result))
	// {
	// 	// $id=$row['studentId'];
	// 	// $student=$row['studentName'];
	// 	// echo $student;

	// 	$student[$i]=$row['studentName'] . "<br>";
	// 	$i++;
	// }
	//echo $i;

	//echo $student[0];

	// $j=0;
	// while($j<$i)
	// {
	// 	$name=$student[$j];

	// 	$result=mysqli_query($con,"SELECT * FROM quiz_student WHERE studentName = '$name'");
	// 	$row=mysqli_num_rows($result);
	// 	echo $row;



	// 	//echo $student[$j];
		
	// 	$j++;
	// }

	$result=mysqli_query($con,"SELECT * FROM student");
	$row=mysqli_num_rows($result);

	$i=1;
	while($i<=$row)
	{
		$result=mysqli_query($con,"SELECT * FROM quiz_student WHERE studentId='$i'");
		$rows=mysqli_fetch_array($result);

		echo $rows['studentName'];
		echo $rows['mark'];

		echo "<br>";

		$i++;
	}
	?>

</body>
</html>