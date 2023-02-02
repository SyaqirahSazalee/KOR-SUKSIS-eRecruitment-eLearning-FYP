<?php
include '..\php\config.php';

$coachId = $_SESSION['loginid'];
$id = $_GET['id'];
$quizId = $_SESSION['id'];

//SQL code to delete
$sql = "DELETE FROM `quiz_student` WHERE studentId = '$id'";

// select in database 
$rs = mysqli_query($con, $sql);
//$rscheck = mysqli_num_rows($rs);

if($rs > 0)
{
	echo "<script>alert(Student Succesfully Deleted)</script>";
	echo "<meta http-equiv=\"refresh\"content=\"0.2;URL=..\html\coach_assessment_quiz_manage.php?id=$quizId\">";
}
else
{
	echo "<script>alert(Sorry, there is a error!)</script>";
	echo "<meta http-equiv=\"refresh\"content=\"0.2;URL=..\html\coach_assessment_quiz_manage.php?id=$quizId\">";
}
?>