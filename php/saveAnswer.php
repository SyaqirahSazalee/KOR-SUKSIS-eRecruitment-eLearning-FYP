<?php
include '..\php\config.php';

//get userlogin email from session
$userlogin = $_SESSION['studentEmail'];
$studentId = $_SESSION['studentId'];
$studentName = $_SESSION['studentName'];

//$id = $_GET['id'];
$quizId = $_SESSION['id'];

$questionId = $_POST['questionId'];
$quizId = $_POST['quizId'];
$correct = $_POST['correct'];
$answer = $_POST['ans'];
$status = "saved";



?>

<?php
// if(isset($_POST['btn']))
// {

	$result = mysqli_query($con, "SELECT * FROM answer WHERE studentId='$studentId' AND questionId='$questionId'");

	if (mysqli_num_rows($result)>0) 
	{
		//$row = mysqli_fetch_assoc($rs);

		//echo $row['answer'];

		mysqli_query($con,"UPDATE answer set  answer='$answer' WHERE questionId='$questionId'");
		
		echo "<meta http-equiv=\"refresh\"content=\"0;URL=..\php\student_assessment_attempt_2.php?id=$questionId\">";
	}
	else
	{
		//echo "tiada";

		$sql = "INSERT INTO answer (studentId, quizId, questionId, correct, answer, status) VALUES ('$studentId', '$quizId','$questionId', '$correct', '$answer', '$status')";

		// insert in database 
		$rs = mysqli_query($con, $sql);

		if ($rs) 
		{
			// echo '<script> alert("Quiz Successfully Attempted") </script>';
			echo "<meta http-equiv=\"refresh\"content=\"0;URL=..\php\student_assessment_attempt_2.php?id=$questionId\">";
		}
		else
		{
			echo '<script> alert("Data Not Inserted") </script>';
		} 
	}

	// $questionId = $_POST['questionId'];
	// $quizId = $_POST['quizId'];
	// $correct = $_POST['correct'];
	// $answer = $_POST['ans'];
	// $status = "saved";

	// $sql = "INSERT INTO answer (studentId, quizId, questionId, correct, answer, status) VALUES ('$studentId', '$quizId','$questionId', '$correct', '$answer', '$status')";

	// // insert in database 
	// $rs = mysqli_query($con, $sql);

	// if ($rs) 
	// {
	// 	// echo '<script> alert("Quiz Successfully Attempted") </script>';
	// 	echo "<meta http-equiv=\"refresh\"content=\"0;URL=..\php\student_assessment_attempt_2.php?id=$questionId\">";
	// }
	// else
	// {
	// 	echo '<script> alert("Data Not Inserted") </script>';
	// } 

	// $next = $_POST['questionId'];
	// $next++;
//}
?>