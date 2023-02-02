<?php
include 'config.php';

//get userlogin email and studentId from session
$userlogin = $_SESSION['studentEmail'];
$studentId = $_SESSION['studentId'];

// if(isset($_POST['Update']))
// {
// 	//get userlogin email from session
// 	//$userlogin = $_SESSION['studentEmail'];

// 	//get POST records value
// 	$studentName = $_SESSION['studentName'] = $_POST['studentName'];
// 	$studentMatricNo = $_SESSION['studentMatricNo'] = $_POST['studentMatricNo'];
// 	$studentIcNo = $_SESSION['studentIcNo'] = $_POST['studentIcNo'];
// 	$studentPhoneNo = $_SESSION['studentPhoneNo'] = $_POST['studentPhoneNo'];
// 	$studentFaculty = $_SESSION['studentFaculty'] = $_POST['studentFaculty'];
// 	$studentCourse = $_SESSION['studentCourse'] = $_POST['studentCourse'];
// 	$studentAddress = $_SESSION['studentAddress'] = $_POST['studentAddress'];
// 	// $studentEmail = $_SESSION['studentEmail'] = $_POST['studentEmail'];
// 	// $studentPassword = $_SESSION['studentPassword'] = $_POST['studentPassword'];
// 	$application = $_SESSION['application'] = $_POST['application'];

// 	// database select SQL code
// 	$sql = "UPDATE `student` SET studentName = '$studentName' , studentMatricNo = '$studentMatricNo' , studentIcNo = '$studentIcNo' , studentPhoneNo = '$studentPhoneNo' , studentFaculty = '$studentFaculty' , studentCourse = '$studentCourse' , studentAddress = '$studentAddress' , application = '$application'  WHERE studentEmail = '$userlogin'";

// 	// insert in database 
// 	$rs = mysqli_query($con, $sql);

// 	if ($rs) 
// 	{
// 		echo '<script> alert("Data Updated") </script>';
// 		echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_page.php\">";

// 	}
// 	else
// 	{
// 		echo '<script> alert("Data Not Updated") </script>';
// 	}
// }

if(isset($_POST['Update']))
{

	//get POST records value
	$applicantGender = $_SESSION['applicantGender'] = $_POST['applicantGender'];
	$applicantRace = $_SESSION['applicantRace'] = $_POST['applicantRace'];
	$applicantHeight = $_SESSION['applicantHeight'] = $_POST['applicantHeight'];
	$applicantWeight = $_SESSION['applicantWeight'] = $_POST['applicantWeight'];
	$applicantEye = $_SESSION['applicantEye'] = $_POST['applicantEye'];
	$applicantDisability = $_SESSION['applicantDisability'] = $_POST['applicantDisability'];
	$applicantDisease = $_SESSION['applicantDisease'] = $_POST['applicantDisease'];

	// database select SQL code
	$sql = "INSERT INTO `application` (`applicantId`, `studentId`, `applicantGender`, `applicantRace`, `applicantHeight`, `applicantWeight`, `applicantEye`, `applicantDisability`, `applicantDisease`) VALUES ('0', '$studentId', '$applicantGender', '$applicantRace', '$applicantHeight', '$applicantWeight', '$applicantEye', '$applicantDisability', '$applicantDisease')";

	// insert in database 
	$rs = mysqli_query($con, $sql);

	if ($rs) 
	{
		$studentName = $_SESSION['studentName'] = $_POST['studentName'];
		$studentMatricNo = $_SESSION['studentMatricNo'] = $_POST['studentMatricNo'];
		$studentIcNo = $_SESSION['studentIcNo'] = $_POST['studentIcNo'];
		$studentPhoneNo = $_SESSION['studentPhoneNo'] = $_POST['studentPhoneNo'];
		$studentFaculty = $_SESSION['studentFaculty'] = $_POST['studentFaculty'];
		$studentCourse = $_SESSION['studentCourse'] = $_POST['studentCourse'];
		$studentAddress = $_SESSION['studentAddress'] = $_POST['studentAddress'];
		$application = 'Yes';
		$status = 'Pending';

		$sql = "UPDATE `student` SET studentName = '$studentName' , studentMatricNo = '$studentMatricNo' , studentIcNo = '$studentIcNo' , studentPhoneNo = '$studentPhoneNo' , studentFaculty = '$studentFaculty' , studentCourse = '$studentCourse' , studentAddress = '$studentAddress' , application = '$application', status = '$status'  WHERE studentEmail = '$userlogin'";

		// insert in database 
		$rs = mysqli_query($con, $sql);

		if ($rs) 
		{
			echo '<script> alert("Your Recruitment Application Has Been Sent") </script>';
			echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_page.php\">";

		}
		else
		{
			echo '<script> alert("Data Not Updated") </script>';
		}
	}
	else
	{
		echo '<script> alert("Data Not Inserted") </script>';
	}
}

?>