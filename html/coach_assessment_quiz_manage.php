<?php
include '..\php\config.php';

$coachId = $_SESSION['loginid'];
$coachName = $_SESSION['name'];

$id = $_GET['id'];
$quizId = $_SESSION['id'] = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>COACH PAGE-MANAGE QUIZ</title>
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
		          	<a style="color: white" class="nav-link" href="..\html\coach_forum_page.php">Forum</a>
		        </b>
		    </li>
			<li class="nav-item" style="margin-top: 5px;">
				<b>
					<a style="color: white" class="nav-link" href="..\php\logout_process.php">Log Out</a>
				</b>
			</li>
		</ul>
	</nav>

	<?php
	$result = mysqli_query($con,"SELECT * FROM quiz WHERE quizId = '$id'");

	if (mysqli_num_rows($result) > 0) 
	{
		while($row = mysqli_fetch_array($result)) 
		{
			?>
			<br>
			<center>
				<h3><?php echo $row['quizTitle']; ?></h3><br>
				<a href="..\php\coach_assessment_quiz_manage_question.php?id=<?php echo $row["quizId"]; ?>" class="btn btn-primary">Add Question</a>
				<a href="..\php\coach_assessment_quiz_manage_student.php?id=<?php echo $row["quizId"]; ?>" class="btn btn-primary">Add Student</a>
			</center>

			<br><br>
				<div class="card col-md-5" style="float: left; margin-left: 50px;">
				  <h5 class="card-header">Questions</h5>
				  <div class="card-body">
				  	<?php
				  	$result = mysqli_query($con,"SELECT * FROM question WHERE quizId = '$id'");

					if (mysqli_num_rows($result) > 0) 
					{
						while($row = mysqli_fetch_array($result)) 
						{
							echo $row['question']; 
							?>

							<br>
							<div style="float: right;">
								<a class="btn btn-primary" href="..\php\coach_assessment_quiz_question_edit.php?id=<?php echo $row["questionId"]; ?>"><small>Edit</small></a>
								<a class="btn btn-primary" onclick="return confirm('Are you sure, you want to delete it?')" href="..\php\coach_assessment_quiz_question_delete.php?id=<?php echo $row["questionId"]; ?>"><small>Delete</small></a>
							</div>
							<br><hr>

							<?php
						}
					}
					else
					{
						echo "no result found";
					}
				  	?>
				  </div>
				</div>

			<div class="card col-md-5" style="float: right; margin-right: 50px;">
			  <h5 class="card-header">Students</h5>
			  <div class="card-body">
			  	<?php
			  	$result = mysqli_query($con,"SELECT * FROM quiz_student JOIN student ON quiz_student.studentId=student.studentId WHERE quizId = '$id'");

				// if (mysqli_num_rows($result) > 0) 
				// {
				// 	while($row = mysqli_fetch_array($result)) 
				// 	{
				// 		$studentId = $row['studentId'];

				// 		$result = mysqli_query($con,"SELECT * FROM student WHERE studentId = '$studentId'");

						if (mysqli_num_rows($result) > 0) 
						{
							while($row = mysqli_fetch_array($result)) 
							{

								echo $row['studentName'];
								?>

								<br>
								<div style="float: right;">
									<a class="btn btn-primary" onclick="return confirm('Are you sure, you want to delete it?')" href="..\php\coach_assessment_quiz_student_delete.php?id=<?php echo $row["studentId"]; ?>"><small>Delete</small></a>
								</div>
								<br><hr>
								
								<?php
							}
						}
						else
						{
							echo "no result found";
						}
				// 	}
				// }
				// else
				// {
				// 	echo "no result found";
				// }
			  	?>
			  </div>
			</div>
			<?php
		}
	}

	?>
</body>
</html>