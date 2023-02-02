<?php
include 'config.php';

// get the post records
$studentName = $_POST['studentName'];
$studentMatricNo = $_POST['studentMatricNo'];
$studentIcNo = $_POST['studentIcNo'];
$studentPhoneNo = $_POST['studentPhoneNo'];
$studentFaculty = $_POST['studentFaculty'];
$studentCourse = $_POST['studentCourse'];
$studentAddress = $_POST['studentAddress'];
$studentEmail = $_POST['studentEmail'];
$studentPassword = $_POST['studentPassword'];

// database insert SQL code
$sql = "INSERT INTO `student` (`studentId`, `studentName`, `studentMatricNo`, `studentIcNo`, `studentPhoneNo`, `studentFaculty`, `studentCourse`, `studentAddress`, `studentEmail`, `studentPassword`) VALUES ('0', '$studentName', '$studentMatricNo', '$studentIcNo', '$studentPhoneNo', '$studentFaculty', '$studentCourse', '$studentAddress', '$studentEmail', '$studentPassword')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	$result = mysqli_query($con,"INSERT INTO `carry_mark` (`studentMatricNo`, `studentName`) VALUES ('$studentMatricNo', '$studentName')");

	if($result)
	{
		echo '<script> alert("You Have Successfully Registered") </script>';
		echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\login.php\">";
	}
	else
	{
		echo '<script> alert("Fail to Register") </script>';
		echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\login.php\">";
	}
	
}
else
{
	echo "Failed";
	echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\login.php\">";
}

?>