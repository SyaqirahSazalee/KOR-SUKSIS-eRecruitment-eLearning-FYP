<?php
include '..\php\config.php';

//get userlogin email from session
$userlogin = $_SESSION['studentEmail'];
$studentId = $_SESSION['studentId'];
$studentName = $_SESSION['studentName'];

$id = $_GET['id'];

$result = mysqli_query($con, "SELECT * FROM quiz WHERE quizId='$id'");
while($row=mysqli_fetch_array($result))
{
	$quizTitle=$row['quizTitle'];
}
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
					<a style="color: white" class="nav-link" href="..\php\logout_process.php">Log Out</a>
				</b>
			</li>
		</ul>
	</nav>

	<br><br>

	<!-- <nav class="nav nav-pills nav-fill">
    	<a class="nav-link active" href="..\html\coach_assessment_page.php">QUIZ</a>
  	</nav>

	<br><br> -->

	<?php
	mysqli_query($con,"UPDATE quiz_student set quizStatus='taken' WHERE studentId='$studentId' AND quizId='$id'");

	$quesCheck = mysqli_query($con, "SELECT * FROM question WHERE quizId='$id' ") ;
	$noQues=mysqli_num_rows($quesCheck);

	$result=mysqli_query($con, "SELECT * FROM answer WHERE studentId='$studentId' AND quizId='$id'");
	$rows=mysqli_num_rows($result);
	//echo $rows;

	if($rows>0)
	{
		$mark=0;
		$i=1;
		while ($row=mysqli_fetch_array($result)) 
		{
			if($row['answer']==$row['correct'])
			{
				$mark++;
			}
			$i++;
		}
		//echo $mark;
		$finalmark=(($mark/$noQues)*20);
		//echo $finalmark;

		$result = mysqli_query($con, "SELECT * FROM carry_mark WHERE studentName='$studentName'");
		while($row=mysqli_fetch_array($result))
		{
			$mark=$row['total'];
			$carryMark=$mark+$finalmark;
		}
	}

	if( $finalmark<='5')
	{
		mysqli_query($con,"UPDATE quiz_student set mark='$finalmark', markLevel='low' WHERE studentId='$studentId' AND quizId='$id'");

		if($quizTitle=='Test 1')
		{
			mysqli_query($con,"UPDATE carry_mark set quiz1='$finalmark' WHERE studentName='$studentName'");

			if($carryMark<=39)
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Fail' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
			else
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Pass' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
		}
		else if($quizTitle=='Test 2')
		{
			mysqli_query($con,"UPDATE carry_mark set quiz2='$finalmark' WHERE studentName='$studentName'");

			if($carryMark<=39)
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Fail' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
			else
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Pass' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
		}
		else if($quizTitle=='Test 3')
		{
			mysqli_query($con,"UPDATE carry_mark set quiz3='$finalmark' WHERE studentName='$studentName'");

			if($carryMark<=39)
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Fail' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
			else
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Pass' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
		}
		else if($quizTitle=='Test 4')
		{
			mysqli_query($con,"UPDATE carry_mark set quiz4='$finalmark' WHERE studentName='$studentName'");

			if($carryMark<=39)
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Fail' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
			else
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Pass' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
		}
		else if($quizTitle=='Test 5')
		{
			mysqli_query($con,"UPDATE carry_mark set quiz5='$finalmark' WHERE studentName='$studentName'");

			if($carryMark<=39)
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Fail' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
			else
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Pass' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
		}
	}
	else if($finalmark>='6' && $finalmark<='14')
	{
		mysqli_query($con,"UPDATE quiz_student set mark='$finalmark', markLevel='mid' WHERE studentId='$studentId' AND quizId='$id'");

		if($quizTitle=='Test 1')
		{
			mysqli_query($con,"UPDATE carry_mark set quiz1='$finalmark' WHERE studentName='$studentName'");

			if($carryMark<=39)
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Fail' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
			else
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Pass' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
		}
		else if($quizTitle=='Test 2')
		{
			mysqli_query($con,"UPDATE carry_mark set quiz2='$finalmark' WHERE studentName='$studentName'");

			if($carryMark<=39)
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Fail' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
			else
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Pass' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
		}
		else if($quizTitle=='Test 3')
		{
			mysqli_query($con,"UPDATE carry_mark set quiz3='$finalmark' WHERE studentName='$studentName'");

			if($carryMark<=39)
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Fail' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
			else
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Pass' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
		}
		else if($quizTitle=='Test 4')
		{
			mysqli_query($con,"UPDATE carry_mark set quiz4='$finalmark' WHERE studentName='$studentName'");

			if($carryMark<=39)
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Fail' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
			else
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Pass' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
		}
		else if($quizTitle=='Test 5')
		{
			mysqli_query($con,"UPDATE carry_mark set quiz5='$finalmark' WHERE studentName='$studentName'");

			if($carryMark<=39)
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Fail' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
			else
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Pass' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
		}
	}
	else if($finalmark>='15')
	{
		mysqli_query($con,"UPDATE quiz_student set mark='$finalmark', markLevel='high' WHERE studentId='$studentId' AND quizId='$id'");

		if($quizTitle=='Test 1')
		{
			mysqli_query($con,"UPDATE carry_mark set quiz1='$finalmark' WHERE studentName='$studentName'");

			if($carryMark<=39)
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Fail' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
			else
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Pass' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
		}
		else if($quizTitle=='Test 2')
		{
			mysqli_query($con,"UPDATE carry_mark set quiz2='$finalmark' WHERE studentName='$studentName'");

			if($carryMark<=39)
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Fail' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
			else
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Pass' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
		}
		else if($quizTitle=='Test 3')
		{
			mysqli_query($con,"UPDATE carry_mark set quiz3='$finalmark' WHERE studentName='$studentName'");

			if($carryMark<=39)
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Fail' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
			else
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Pass' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
		}
		else if($quizTitle=='Test 4')
		{
			mysqli_query($con,"UPDATE carry_mark set quiz4='$finalmark' WHERE studentName='$studentName'");

			if($carryMark<=39)
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Fail' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
			else
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Pass' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
		}
		else if($quizTitle=='Test 5')
		{
			mysqli_query($con,"UPDATE carry_mark set quiz5='$finalmark' WHERE studentName='$studentName'");

			if($carryMark<=39)
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Fail' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
			else
			{
				mysqli_query($con,"UPDATE carry_mark set total='$carryMark', level='Pass' WHERE studentName='$studentName'");

				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";
			}
		}
	}


	// mysqli_query($con,"UPDATE quiz_student set mark='$finalmark' WHERE studentId='$studentId' AND quizId='$id'");

	// echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_assessment_page.php\">";

	?>
</body>
</html>