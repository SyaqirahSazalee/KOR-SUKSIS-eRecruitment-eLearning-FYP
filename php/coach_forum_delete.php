<?php
include '..\php\config.php';

$coachId = $_SESSION['loginid'];
$coachName = $_SESSION['name'];

$id = $_GET['id'];
//$forumId = $_SESSION['id'];

//SQL code to delete
$sql = "DELETE FROM `forum_reply` WHERE forumId = '$id'";

// select in database 
$rs = mysqli_query($con, $sql);

if($rs > 0)
{
	//SQL code to delete
	$sql = "DELETE FROM `forum` WHERE forumId = '$id'";

	// select in database 
	$rs = mysqli_query($con, $sql);

	if($rs > 0)
	{
		echo "<script>alert(Forum Succesfully Deleted)</script>";
		echo "<meta http-equiv=\"refresh\"content=\"0.2;URL=..\html\coach_forum_page.php\">";
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