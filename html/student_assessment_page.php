<?php
include '..\php\config.php';

//get userlogin email from session
$userlogin = $_SESSION['studentEmail'];
$studentId = $_SESSION['studentId'];
$studentName = $_SESSION['studentName'];

// date_default_timezone_set("Asia/Kuala_Lumpur");
// echo "Today is " . date("Y-m-d") . " " . date("H:i:s") . "<br>";
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

	<!-- <nav class="nav nav-pills nav-fill">
    	<a class="nav-link active" href="..\html\coach_assessment_page.php">QUIZ</a>
  	</nav>

	<br><br> -->


	<?php
	$result = mysqli_query($con,"SELECT * FROM quiz_student JOIN quiz ON quiz_student.quizId=quiz.quizId WHERE studentId = '$studentId'");
	//$row = mysqli_fetch_array($result);
	//$coachId = $row['coachId'];

	//$result = mysqli_query($con,"SELECT * FROM quiz WHERE coachId = '$coachId'");

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
				<th style="text-align: center;">Date/Time</th>
				<th style="text-align: center;">Action</th>
				<th style="text-align: center;">Total Marks (20%)</th>
			  </tr>
		</thead>

		<?php
		$i=1;
		while($row = mysqli_fetch_array($result)) 
		{
			if($row['quizStatus']=='none')
			{
				?>
				<tbody>
					<tr>
						<!-- <th style="text-align: center;" scope="row"><?php echo $i++ ?></th> -->
						<td style="text-align: center;"><?php echo $row["quizTitle"]; ?></td>
						<td style="text-align: center;"><?php echo $row["coachName"]; ?></td>
						<td style="text-align: center;"><?php echo $row["quizQuestion"]; ?></td>
						<td style="text-align: center;"><?php echo $row["quizDate"]." <br>Start Time ".$row["quizTime"]." <br>End Time ".$row["quizTime2"];  ?></td>
						<!-- <td style="text-align: center;"><?php echo $row["quizQuestionPoint"]; ?></td> -->
						<?php
						date_default_timezone_set("Asia/Kuala_Lumpur");
						$dateNow = date("Y-m-d");
						$timeNow = date ("H:i:00");
						//echo $timeNow;
						
						if (($dateNow > ($row["quizDate"])) || ($dateNow < ($row['quizDate'])))
						{ 
							?>
							<td>
								<center>
									close
								</center>
							</td>
							<?php
						}
						else
						{
							if (($timeNow >= ($row["quizTime"])) && ($timeNow <= ($row["quizTime2"])))
							{ 
								?>
								<td>
									<center>
										<a class="btn btn-primary" href="..\php\student_assessment_attempt.php?id=<?php echo $row["quizId"]; ?>">Attempt</a>
									</center>
								</td>
								<?php
							}
							else
							{
								?>
								<td>
									<center>
										close
									</center>
								</td>
								<?php
							}
						}

						?>
						<!-- <td>
							<center>
								<a class="btn btn-primary" href="..\php\student_assessment_attempt.php?id=<?php echo $row["quizId"]; ?>">Attempt</a>
							</center>
						</td> -->
						<!-- <td style="text-align: center;"><?php echo $row["status"]; ?></td> -->
					</tr>
				</tbody>

				<?php
			}
			else
			{
				?>
				<tbody>
					<tr>
						<!-- <th style="text-align: center;" scope="row"><?php echo $i++ ?></th> -->
						<td style="text-align: center;"><?php echo $row["quizTitle"]; ?></td>
						<td style="text-align: center;"><?php echo $row["coachName"]; ?></td>
						<td style="text-align: center;"><?php echo $row["quizQuestion"]; ?></td>
						<td style="text-align: center;"><?php echo $row["quizDate"]." <br>Start Time ".$row["quizTime"]." <br>End Time ".$row["quizTime2"];  ?></td>
						<td style="text-align: center;"><?php echo $row["quizStatus"]; ?></td>
						<td style="text-align: center;"><?php echo $row["mark"]; ?></td>
					</tr>
				</tbody>

				<?php
			}
			$i++;
		}
	}
		?>
		</table>
</body>
</html>