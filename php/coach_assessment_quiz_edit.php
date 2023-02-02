<?php
include '..\php\config.php';

$coachId = $_SESSION['loginid'];
$coachName = $_SESSION['name'];

$id = $_GET['id'];
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
    	<a class="nav-link" href="#">QUIZ SCORE</a>
  	</nav>

  	<br><br>

  	<?php
  	if(isset($_POST['btn']))
  	{
  		$quizDate = $_SESSION['quizDate'] = date('Y-m-d', strtotime($_POST['quizDate']));

  		mysqli_query($con,"UPDATE quiz set  quizTitle='" . $_POST['quizTitle'] . "', quizQuestion='" . $_POST['quizQuestion'] . "', quizDate='$quizDate', quizTime='" . $_POST['quizTime'] . "', quizTime2='" . $_POST['quizTime2'] . "' WHERE quizId='$id'");

  		echo '<script> alert("Successfully edited") </script>';
		echo "<meta http-equiv=\"refresh\"content=\"0.2;URL=..\html\coach_assessment_page.php\">";
  	}
  	?>

  	<?php

  	$result = mysqli_query($con,"SELECT * FROM quiz WHERE quizId ='$id'");

		if (mysqli_num_rows($result) > 0) 
		{
			while($row = mysqli_fetch_array($result)) 
			{
				?>

				<div class="container">
					<div class="row">
						<form action="" method="post" enctype="multipart/form-data" >

							<br>

							<div class="mb-3">
							  <label class="form-label">Quiz Title</label>
							  <input type="text" class="form-control" name="quizTitle" value="<?php echo $row['quizTitle'] ?>">
							</div>
							<div class="mb-3">
							  <label class="form-label">Total Question</label> <br>
							  <input type="number" class="form-control" name="quizQuestion" value="<?php echo $row['quizQuestion'] ?>">
							</div>
							<div class="mb-3">
								<label class="form-label">Date (atleast 1 day after today's date)</label> <br>
								<input type="text" class="form-control datepicker" name="quizDate" id="date_picker" value="<?php echo $row['quizDate'] ?>">
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
							  <input type="time" class="form-control" name="quizTime" value="<?php echo $row['quizTime'] ?>">
							</div>
							<div class="mb-3" style="float: right; width: 50%;">
							  <label class="form-label">End Time</label> <br>
							  <input type="time" class="form-control" name="quizTime2" value="<?php echo $row['quizTime2'] ?>">
							</div>

							<center>
								<br>
								<button name="btn">Save</button>
								<br>
							</center>

						</form>
					</div>
				</div>

				<?php
			}
		}
		?>
</body>
</html>