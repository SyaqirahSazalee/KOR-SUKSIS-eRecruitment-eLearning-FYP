<?php
include '..\php\config.php';

$coachId = $_SESSION['loginid'];
$coachName = $_SESSION['name'];

$id = $_GET['id'];
$quizId = $_SESSION['id'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>COACH PAGE-ADD QUESTION</title>
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
	if(isset($_POST['btn']))
	{
		//get POST records value
		$question = $_SESSION['question'] = $_POST['question'];
		$opt1 = $_SESSION['opt1'] = $_POST['opt1'];
		$opt2 = $_SESSION['opt2'] = $_POST['opt2'];
		$opt3 = $_SESSION['opt3'] = $_POST['opt3'];
		$opt4 = $_SESSION['opt4'] = $_POST['opt4'];
		$ans = $_SESSION['ans'] = $_POST['ans'];

		if ($_POST['opt3'] == "")
		{

			// database select SQL code
			$sql = "INSERT INTO question (quizId, question, opt1, opt2, ans) VALUES ('$quizId', '$question', '$opt1', '$opt2', '$ans')";

			// insert in database 
			$rs = mysqli_query($con, $sql);

			if ($rs) 
			{
				//echo '<script> alert("Quiz Already Created") </script>';
				echo "<meta http-equiv=\"refresh\"content=\"0.5;..\html\coach_assessment_quiz_manage.php?id=$id\">";
			}
			else
			{
				echo '<script> alert("Data Not Inserted") </script>';
			} 
		}
		else if ($_POST['opt4'] == "")
		{

			// database select SQL code
			$sql = "INSERT INTO question (quizId, question, opt1, opt2, opt3, ans) VALUES ('$quizId', '$question', '$opt1', '$opt2', '$opt3', '$ans')";

			// insert in database 
			$rs = mysqli_query($con, $sql);

			if ($rs) 
			{
				//echo '<script> alert("Quiz Already Created") </script>';
				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\coach_assessment_quiz_manage.php?id=$id\">";
			}
			else
			{
				echo '<script> alert("Data Not Inserted") </script>';
			} 
		}
		else if(($_POST['opt1'] == "")||($_POST['opt2'] == ""))
		{
			echo '<script> alert("Please fill in Option 1 and Option 2") </script>';
		}
		else
		{
			// database select SQL code
			$sql = "INSERT INTO question (quizId, question, opt1, opt2, opt3, opt4, ans) VALUES ('$quizId', '$question', '$opt1', '$opt2', '$opt3', '$opt4', '$ans')";

			// insert in database 
			$rs = mysqli_query($con, $sql);

			if ($rs) 
			{
				//echo '<script> alert("Quiz Already Created") </script>';
				echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\coach_assessment_quiz_manage.php?id=$id\">";
			}
			else
			{
				echo '<script> alert("Data Not Inserted") </script>';
			} 
		}
			
	}
	?>

	<br><br>
	<div class="container">
		<div class="row">
			<form action="" method="post" enctype="multipart/form-data" >

				<center>
					<div class="mb-3">
					  <label class="form-label">QUESTION</label><br>
					  <textarea id="question" name="question" style="width: 80%" required></textarea>
				 	<br>
					</div>
					<div class="mb-3">
					  <label class="form-label">OPTION 1</label><br>
					  <textarea id="opt1" name="opt1" style="width: 80%" required></textarea>
					</div>
					<div class="mb-3">
					  <label class="form-label">OPTION 2</label><br>
					  <textarea id="opt2" name="opt2" style="width: 80%" required></textarea>
					</div>
					<div class="mb-3">
					  <label class="form-label">OPTION 3</label><br>
					  <textarea id="opt3" name="opt3" style="width: 80%"></textarea>
					</div>
					<div class="mb-3">
					  <label class="form-label">OPTION 4</label><br>
					  <textarea id="opt4" name="opt4" style="width: 80%"></textarea>
					</div>
					<div class="mb-3">
					  <label class="form-label">CORRECT ANSWER</label><br>
					  <select name="ans">
					  	<option value="opt1">OPTION 1</option>
					  	<option value="opt2">OPTION 2</option>
					  	<option value="opt3">OPTION 3</option>
					  	<option value="opt4">OPTION 4</option>
					  </select>
					</div>
				</center>

				<center>
					<br>
					<button name="btn">Save</button>
					<br>
				</center>

				<br>
			</form>
		</div>
	</div>
	<p>  </p>
</body>
</html>