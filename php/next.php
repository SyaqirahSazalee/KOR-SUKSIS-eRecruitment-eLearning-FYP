<?php
include '..\php\config.php';

//get userlogin email from session
$userlogin = $_SESSION['studentEmail'];
$studentId = $_SESSION['studentId'];
$studentName = $_SESSION['studentName'];
$totalQues=$_SESSION['totalQues'];

$quizId = $_SESSION['id'];
//echo $quizId;


$currentId = $_GET['id'];
$newId = $currentId + 1;

?>

<!DOCTYPE html>
<html>
<head>
	<title>STUDENT PAGE-ATTEMPT</title>
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
			<li class="nav-item" style="margin-top: 13px;">
				<b>
					<small style="color: darkgrey;"><?php echo $userlogin; ?></small>
				</b>
			</li>-
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
		        	<a style="color: white;" class="nav-link" href="..\html\student_forum_page.php">Forum</a>
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

	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<style type="text/css">
			.grid-container {
			  display: inline-grid;
			  grid-gap:	15px;
			}

			.grid-cell {
			  height: 30px;
			  width: 30px;
			  margin-bottom: 5px;
			  margin-right: 5px;
			  border-radius: 3px;
			  background: #acaaaa;
			}
		</style>
	</head>
	<body>
	<?php

	$result=mysqli_query($con,"SELECT * FROM question WHERE quizId='$quizId'");
	$numRows = mysqli_num_rows($result);
	//echo $numRows;

	while ($row=mysqli_fetch_array($result)) 
	{
		$list[]=$row['questionId'];
	}
	//print_r($list[$numRows-1]);

	if($newId>$list[$numRows-1])
	{
		?>
 		<center style="margin-top: 10%;">
 			<p>No more question(s).</p>
 			<p>Please click Finish Attempt to proceed.</p>
 			<div style="border: 1px solid black; background-color: lightgreen; width: 150px; height: 30px ">
 				<a style="text-decoration: none; color: black;" href="..\html\test.php?id=<?php echo $quizId ?>" name="finish">Finish Attempt</a>
 			</div>
 		</center>
 		<?php
	}
	else
	{
		if(in_array($newId, $list))
		{
			//echo "ada".$newId;
			echo "<meta http-equiv=\"refresh\"content=\"0.1;URL=..\php\student_assessment_attempt_2.php?id=$newId\">";
		}
		else
		{
			$nextNewId=$newId+1;
			echo "<meta http-equiv=\"refresh\"content=\"0.1;URL=..\php\student_assessment_attempt_2.php?id=$nextNewId\">";
		}
	}

	// for ($i=0; $i < $numRows; $i++) 
	// { 
	// 	if($newId==$list[$i])
	// 	{
	// 		echo "<meta http-equiv=\"refresh\"content=\"0.1;URL=..\php\student_assessment_attempt_2.php?id=$newId\">";
	// 	}
	// }
	

	// 	if($newId<=$limit)
	// 	{
	// 		//echo "ok";
	// 		echo "<meta http-equiv=\"refresh\"content=\"0.1;URL=..\php\student_assessment_attempt_2.php?id=$newId\">";
	// 	}
	// 	else
	// 	{
	// 		//echo "stop";
	// 		?>
	 		<!-- <center style="margin-top: 10%;">
	// 			<p>No more question(s).</p>
	// 			<p>Please click Finish Attempt to proceed.</p>
	// 			<div style="border: 1px solid black; background-color: lightgreen; width: 150px; height: 30px ">
	// 				<a style="text-decoration: none; color: black;" href="..\html\test.php?id=<?php echo $quizId ?>" name="finish">Finish Attempt</a>
	// 			</div>
	// 		</center> -->
	 		<?php
	// 	}
	// }

	// echo "<meta http-equiv=\"refresh\"content=\"0.1;URL=..\php\student_assessment_attempt_2.php?id=$newId\">";

	?>
</body>