<?php
include '..\php\config.php';

$coachId = $_SESSION['loginid'];
$coachName = $_SESSION['name'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>COACH PAGE-ADD QUIZ</title>
	<link href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet"
    type="text/css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
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

  	<nav class="nav nav-pills nav-fill">
    	<a class="nav-link active" href="..\html\coach_assessment_page.php">QUIZ</a>
    	<a class="nav-link" href="..\html\coach_assessment_page_2.php">QUIZ SCORE</a>
  	</nav>

  	<br><br>

  	<?php
  	if (isset($_POST['btn'])) 
  	{
  		//get POST records value
		$quizTitle = $_SESSION['quizTitle'] = $_POST['quizTitle'];
		$quizQuestion = $_SESSION['quizQuestion'] = $_POST['quizQuestion'];
		$quizDate = $_SESSION['quizDate'] = date('Y-m-d', strtotime($_POST['quizDate']));
		$quizTime = $_SESSION['quizTime'] = $_POST['quizTime'];
		$quizTime2 = $_SESSION['quizTime2'] = $_POST['quizTime2'];
		//$quizTimeLimit = $_SESSION['quizTimeLimit'] = $_POST['quizTimeLimit'];
		//$quizQuestionPoint = $_SESSION['quizQuestionPoint'] = $_POST['quizQuestionPoint'];
 
		// database select SQL code
		$sql = "INSERT INTO `quiz` (`quizId`, `coachId`, `coachName`, `quizTitle`, `quizQuestion`, `quizDate`, `quizTime`, `quizTime2`) VALUES ('0', '$coachId', '$coachName', '$quizTitle', '$quizQuestion', '$quizDate', '$quizTime', '$quizTime2')";

		// insert in database 
		$rs = mysqli_query($con, $sql);

		if ($rs) 
		{
			echo '<script> alert("Quiz Successfully Created") </script>';
			echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\coach_assessment_page.php\">";
		}
		else
		{
			echo '<script> alert("Data Not Inserted") </script>';
		} 

  	}
  	?>

	<div class="container">
		<div class="row">
			<form action="" method="post" enctype="multipart/form-data" >

				<br>

				<div class="mb-3">
				  <label class="form-label">Quiz Title</label>
				  <input type="text" class="form-control" name="quizTitle" placeholder="Enter Quiz Title (Example: Test 1)" required>
				</div>
				<div class="mb-3">
				  <label class="form-label">Total Question</label> <br>
				  <input type="number" class="form-control" name="quizQuestion" placeholder="Enter Total Number of Question" required>
				</div>
				<div class="mb-3" >
					<label class="form-label">Date (atleast 1 day after today's date)</label> <br>
					<input class="form-control datepicker" name="quizDate" id="date_picker" required>
					<script language="javascript">
				        $(document).ready(function () {
				            $("#date_picker").datepicker({
				                minDate: 0
				            });
				        });
				    </script>
				</div>
				<div class="mb-3" style="float: left; width: 50%;">
				  <label class="form-label">Start Time</label> <br>
				  <input type="time" class="form-control" name="quizTime" required>
				</div>
				<div class="mb-3" style="float: right; width: 50%;">
				  <label class="form-label">End Time</label> <br>
				  <input type="time" class="form-control" name="quizTime2" required>
				</div>

				<center>
					<br>
					<button name="btn">Save</button>
					<br>
				</center>

			</form>
		</div>
	</div>
</body>
</html>