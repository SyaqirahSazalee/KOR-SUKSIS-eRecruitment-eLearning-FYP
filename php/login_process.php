<?php
include 'config.php';

// get the post records
$studentEmail = $_SESSION['studentEmail'] = $_POST['studentEmail'];
$studentPassword = $_SESSION['studentPassword'] = $_POST['studentPassword'];

// database select SQL code
$sql = "SELECT * FROM `student` WHERE studentEmail = '$studentEmail' && studentPassword = '$studentPassword'";

// select in database 
$rs = mysqli_query($con, $sql);
$rscheck = mysqli_num_rows($rs);

if($rscheck > 0)
{
	$row = mysqli_fetch_assoc($rs);

	$_SESSION['studentName'] = $row["studentName"];
	$_SESSION['studentMatricNo'] = $row["studentMatricNo"];
	$_SESSION['studentIcNo'] = $row["studentIcNo"];
	$_SESSION['studentPhoneNo'] = $row["studentPhoneNo"];
	$_SESSION['studentFaculty'] = $row["studentFaculty"];
	$_SESSION['studentCourse'] = $row["studentCourse"];
	$_SESSION['studentAddress'] = $row["studentAddress"];
	$_SESSION['studentEmail'] = $row["studentEmail"];
	$_SESSION['studentId'] = $row["studentId"];
	$_SESSION['coachId'] = $row["coachId"];
	$_SESSION['privilage'] = "student";

	$userid = $_SESSION['studentEmail'];
	$usermatric =$_SESSION['studentMatricNo'];
	$studentId = $_SESSION['studentId'];
	$studentName = $_SESSION['studentName'];
	$coachId = $_SESSION['coachId'];
	//echo $userid . $usermatric;
	//echo "Yay Student Found!";
	//header("location: ..\html\student_page.html");

	if($_SESSION['privilage']=="student")
		echo "<meta http-equiv=\"refresh\"content=\"0.2;URL=..\html\student_page.php\">";
}
else
{
	// database select SQL code
	$sql = "SELECT * FROM `admin` WHERE adminEmail = '$studentEmail' && adminPassword = '$studentPassword'";

	// select in database 
	$rs = mysqli_query($con, $sql);
	$rscheck = mysqli_num_rows($rs);

	if($rscheck > 0)
	{
		$row = mysqli_fetch_assoc($rs);

		$_SESSION['loginemail'] = $row["adminEmail"];
		$_SESSION['loginid'] = $row["adminId"];
		$_SESSION['privilage'] = "admin";

		$adminEmail = $_SESSION['loginemail'];
		//echo "Yay Admin Found!";

		if($_SESSION['privilage']=="admin")
			echo "<meta http-equiv=\"refresh\"content=\"0.2;URL=..\html\admin_page.php\">";
	}
	else
	{
		// database select SQL code
		$sql = "SELECT * FROM `coach` WHERE coachEmail = '$studentEmail' && coachPassword = '$studentPassword'";

		// select in database 
		$rs = mysqli_query($con, $sql);
		$rscheck = mysqli_num_rows($rs);

		if($rscheck > 0)
		{
			$row = mysqli_fetch_assoc($rs);

			$_SESSION['name'] = $row["coachName"];
			$_SESSION['loginemail'] = $row["coachEmail"];
			$_SESSION['loginid'] = $row["coachId"];
			$_SESSION['privilage'] = "coach";

			//echo "Yay Coach Found!";

			$coachId = $_SESSION['loginid'];
			$coachName = $_SESSION['name'];
			
			if($_SESSION['privilage']=="coach")
				echo "<meta http-equiv=\"refresh\"content=\"0.2;URL=..\html\coach_class_law_page.php\">";
		}
		else
		{
			echo '<script> alert("Please enter correct username and password!") </script>';
			echo "<meta http-equiv=\"refresh\"content=\"0.2;URL=..\html\login.php\">";
		}
	}
}
?>