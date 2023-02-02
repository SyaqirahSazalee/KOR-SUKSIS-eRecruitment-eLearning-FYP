<?php
include '..\php\config.php';

$coachId = $_SESSION['loginid'];
$coachName = $_SESSION['name'];

$id = $_GET['id'];
$quizId = $_SESSION['id'];

//SQL code to delete
$sql = "DELETE FROM `answer` WHERE questionId = '$id'";

// select in database 
$rs = mysqli_query($con, $sql);
//$rscheck = mysqli_num_rows($rs);

if($rs > 0)
{
	//SQL code to delete
	$sql = "DELETE FROM `question` WHERE questionId = '$id'";

	// select in database 
	$rs = mysqli_query($con, $sql);
	//$rscheck = mysqli_num_rows($rs);

	if($rs > 0)
	{
		echo "<script>alert(Question Succesfully Deleted)</script>";
		echo "<meta http-equiv=\"refresh\"content=\"0.2;URL=..\html\coach_assessment_quiz_manage.php?id=$quizId\">";
	}
	else
	{
		echo "<script>alert(Sorry, there is a error!)</script>";
		echo "<meta http-equiv=\"refresh\"content=\"0.2;URL=..\html\coach_assessment_quiz_manage.php?id=$quizId\">";
	}
}
else
{
	echo "<script>alert(Sorry, there is a error!)</script>";
	echo "<meta http-equiv=\"refresh\"content=\"0.2;URL=..\html\coach_assessment_quiz_manage.php?id=$quizId\">";
}
?>

<!-- <!DOCTYPE html>
<html>
<head>
	<title>COACH PAGE-DELETE QUESTION</title>
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
					<a style="color: white" class="nav-link" href="..\html\coach_class_law_page.php">Classes</a>
				</b>
			</li>
			<li class="nav-item" style="margin-top: 5px;">
				<b>
					<a style="color: white; text-decoration: underline;" class="nav-link" href="..\html\coach_assessment_page.php">Assessment</a>
				</b>
			</li>
			<li class="nav-item" style="margin-top: 5px;">
				<b>
					<a style="color: white" class="nav-link" href="..\php\logout_process.php">Log Out</a>
				</b>
			</li>
		</ul>
	</nav>

	<br><br> -->