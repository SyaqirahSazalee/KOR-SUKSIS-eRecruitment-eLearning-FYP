<?php
include '..\php\config.php';

//get userlogin email from session
$userlogin = $_SESSION['studentEmail'];
$studentId = $_SESSION['studentId'];

$id = $_GET['id'];
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
					<a style="color: white;" class="nav-link" href="">Classes</a>
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
	mysqli_query($con,"UPDATE quiz_student set status='taken' WHERE quizId='$id'");
	?>

	<?php

	$result = mysqli_query($con,"SELECT * FROM quiz_student WHERE studentId = '$studentId' AND status = 'none'");

	if (mysqli_num_rows($result) > 0) 
	{
		while($row = mysqli_fetch_array($result)) 
		{
			$quizId = $row['quizId'];
			$status = $row['status'];

			$result = mysqli_query($con,"SELECT * FROM quiz WHERE quizId = '$quizId'");

			if (mysqli_num_rows($result) > 0) 
			{
				?>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<!-- <th style="text-align: center;">#</th> -->
							<th style="text-align: center;">Title</th>
							<th style="text-align: center;">Coach</th>
							<th style="text-align: center;">Total Questions</th>
							<th style="text-align: center;">Points Per Question</th>
							<th style="text-align: center;">Status</th>
							<th style="text-align: center;">Action</th>
						  </tr>
					</thead>

				<?php
				$i=1;
				while($row = mysqli_fetch_array($result)) 
				{
					?>
					<tbody>
						<tr>
							<!-- <th style="text-align: center;" scope="row"><?php echo $i++ ?></th> -->
							<td style="text-align: center;"><?php echo $row["quizTitle"]; ?></td>
							<td style="text-align: center;"><?php echo $row["coachName"]; ?></td>
							<td style="text-align: center;"><?php echo $row["quizQuestion"]; ?></td>
							<td style="text-align: center;"><?php echo $row["quizQuestionPoint"]; ?></td>
							<td style="text-align: center;"><?php echo $status; ?></td>
							<td>
								<center>
									<a class="btn btn-primary" href="..\php\student_assessment_attempt.php?id=<?php echo $row["quizId"]; ?>">Attempt</a>
								</center>
							</td>
						</tr>
					</tbody>

					<?php
					$i++;
					?>
				</table>

				<?php
				}
			}
			else
			{
				echo "No result found";
			}
		}
	}
	else
	{
		echo "No result found";
	}

	?>
</body>
</html>

yang aku tambah dalam assessment attempt 

// database select SQL code
	$sql = "SELECT * FROM `question` WHERE quizId = '$quizId'";

	// select in database 
	$rs = mysqli_query($con, $sql);
	$rscheck = mysqli_num_rows($rs);

	if($rscheck > 0)
	{
		$row = mysqli_fetch_assoc($rs);

		?>
		<center>
	      <table style="width: 80%" class="table table-striped table-hover">
	        <tbody>
	          <tr>
	            <td>
					<form method="post" action="">
		            	<input type="hidden" name="quizId" value="<?php echo $row['quizId']; ?>">
						<input type="hidden" name="questionId" value="<?php echo $row['questionId']; ?>">
						<input type="hidden" name="correct" value="<?php echo $row['ans']; ?>">

						<p><b>QUESTION</b></p>
						<?php echo $row['question']; ?>

						<?php
						if (($row['opt3'] == "") && ($row['opt4'] == ""))
						{
							?>
							<p>ANSWER</p>
							<input type="radio" name="ans" value="opt1"> <?php echo $row['opt1']; ?> <br>
							<input type="radio" name="ans" value="opt2"> <?php echo $row['opt2']; ?> <br>

							<br>
							<br>
								<button name="btn">Save/Next</button>
							<br>

							<?php
						}
						else if (($row['opt4'] == ""))
						{
							?>
							<p>ANSWER</p>
							<input type="radio" name="ans" value="opt1"> <?php echo $row['opt1']; ?> <br>
							<input type="radio" name="ans" value="opt2"> <?php echo $row['opt2']; ?> <br>
							<input type="radio" name="ans" value="opt3"> <?php echo $row['opt3']; ?> <br>

							<br>
							<br>
								<button name="btn" onclick="next001()">Save/Next</button>
							<br>
							<?php
						}
						else if (($row['opt1'] != "") && ($row['opt2'] != "") && ($row['opt3'] != "") && ($row['opt4'] != ""))
						{
							?>
							<p>ANSWER</p>
							<input type="radio" name="ans" value="opt1"> <?php echo $row['opt1']; ?> <br>
							<input type="radio" name="ans" value="opt2"> <?php echo $row['opt2']; ?> <br>
							<input type="radio" name="ans" value="opt3"> <?php echo $row['opt3']; ?> <br>
							<input type="radio" name="ans" value="opt4"> <?php echo $row['opt4']; ?> <br>

							<br>
							</p>
							<br>
								<button name="btn">Save/Next</button>
							<br>
							<?php
						}
						?>
					</form>
				</td>
	          </tr>
	        </tbody>
	      </table>
	    </center>
	    <br>
			<a href="..\html\test.php?id=<?php echo $row['quizId'] ?>" style="float: right; margin-right: 10%;" name="finish">Finish Attempt</a>
		<br>
	    <?php
	}
	else
	{
		echo "rosak";
	}
	?>