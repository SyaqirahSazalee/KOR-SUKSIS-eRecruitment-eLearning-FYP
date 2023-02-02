<?php
include '..\php\config.php';

$coachId = $_SESSION['loginid'];
$id = $_GET['id'];

//SQL code to delete
$sql = "DELETE FROM `answer` WHERE quizId = '$id'";

// select in database 
$rs = mysqli_query($con, $sql);
//$rscheck = mysqli_num_rows($rs);

if($rs > 0)
{
	//SQL code to delete
	$sql = "DELETE FROM `quiz_student` WHERE quizId = '$id'";

	// select in database 
	$rs = mysqli_query($con, $sql);
	//$rscheck = mysqli_num_rows($rs);

	if($rs > 0)
	{
		//SQL code to delete
		$sql = "DELETE FROM `question` WHERE quizId = '$id'";

		// select in database 
		$rs = mysqli_query($con, $sql);
		//$rscheck = mysqli_num_rows($rs);

		if($rs > 0)
		{
			//SQL code to delete
			$sql = "DELETE FROM `quiz` WHERE quizId = '$id'";

			// select in database 
			$rs = mysqli_query($con, $sql);
			//$rscheck = mysqli_num_rows($rs);

			if($rs > 0)
			{
				echo "<script>alert(Quiz Succesfully Deleted)</script>";
				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\coach_assessment_page.php\">";
			}
			else
			{
				echo "<script>alert(Sorry, there is a error!)</script>";
				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\coach_assessment_page.php\">";
			}
		}
		else
		{
			echo "<script>alert(Sorry, there is a error!)</script>";
			echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\coach_assessment_page.php\">";
		}
	}
	else
	{
		echo "<script>alert(Sorry, there is a error!)</script>";
		echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\coach_assessment_page.php\">";
	}
}
else
{
	echo "<script>alert(Sorry, there is a error!)</script>";
	echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\coach_assessment_page.php\">";
}

// //SQL code to delete
// $sql = "DELETE FROM `quiz` WHERE quizId = '$id'";

// // select in database 
// $rs = mysqli_query($con, $sql);
// //$rscheck = mysqli_num_rows($rs);

// if($rs > 0)
// {
// 	echo "<script>alert(Succesfully deleted)</script>";
// 	echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\coach_assessment_page.php\">";
// }
// else
// {
// 	echo "<script>alert(Sorry, there is a error!)</script>";
// 	echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\coach_assessment_page.php\">";
// }
?>