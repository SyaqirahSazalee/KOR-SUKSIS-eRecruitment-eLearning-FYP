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
	<title>COACH PAGE-EDIT QUESTION</title>
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

	<br><br>

	<?php
	if(isset($_POST['btn']))
	{
		mysqli_query($con,"UPDATE question set question='" . $_POST['question'] . "', opt1='" . $_POST['opt1'] . "', opt2='" . $_POST['opt2'] . "', opt3='" . $_POST['opt3'] . "', opt4='" . $_POST['opt4'] . "', ans='" . $_POST['ans'] . "' WHERE questionId='$id'");

		echo '<script> alert("Question Successfully Updated") </script>';
		echo "<meta http-equiv=\"refresh\"content=\"0.2;URL=..\html\coach_assessment_quiz_manage.php?id=$quizId\">";
	}
	?>

	<?php
	$result = mysqli_query($con,"SELECT * FROM question WHERE questionId ='$id'");

	if (mysqli_num_rows($result) > 0) 
	{
		while($row = mysqli_fetch_array($result)) 
		{
			?>
			<div class="container">
				<div class="row">
					<form action="" method="post" enctype="multipart/form-data" >

						<center>
							<br>
							<div class="mb-3">
								<label class="form-label"><b>Question</b></label>
								<br>
							 	<textarea id="question" name="question" style="width: 80%"><?php echo $row['question'] ?></textarea>
							 	<br>
							</div>
							<div class="mb-3">
								<label class="form-label"><b>Option 1</b></label>
								<br>
							 	<textarea id="opt1" name="opt1" style="width: 80%"><?php echo $row['opt1'] ?></textarea>
							 	<br>
							</div>
							<div class="mb-3">
								<label class="form-label"><b>Option 2</b></label>
								<br>
							 	<textarea id="opt2" name="opt2" style="width: 80%"><?php echo $row['opt2'] ?></textarea>
							 	<br>
							</div>
							<div class="mb-3">
								<label class="form-label"><b>Option 3</b></label>
								<br>
							 	<textarea id="opt3" name="opt3" style="width: 80%"><?php echo $row['opt3'] ?></textarea>
							 	<br>
							</div>
							<div class="mb-3">
								<label class="form-label"><b>Option 4</b></label>
								<br>
							 	<textarea id="opt4" name="opt4" style="width: 80%"><?php echo $row['opt4'] ?></textarea>
							 	<br>
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
					</form>
				</div>
			</div>

			<p> </p>
		<?php
		}
	}

	?>
</body>
</html>