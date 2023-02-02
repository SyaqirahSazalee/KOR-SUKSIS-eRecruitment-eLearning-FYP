<?php
include '..\php\config.php';

$coachId = $_SESSION['loginid'];
$coachName = $_SESSION['name'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>COACH PAGE - ASSESSMENT</title>
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
			<!-- <li class="nav-item" style="margin-top: 5px;">
				<b>
					<a style="color: white;" class="nav-link" href="..\html\coach_page.php">Dashboard</a>
				</b>
			</li> -->
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

	<!-- <span class="border border-2" style="float: right; margin-right: 30pt; border-radius: 5pt; background-color: lightgreen; width: 15%">
		<img style="width: 15%" src="..\html\image\add.jpg">
		<a style="text-decoration: none; color: black; font-size: 15pt" href="..\php\coach_assessment_quiz_add.php">ADD QUIZ</a>
	</span> -->

	<span  style="float: right; margin-right: 30pt;">
	    <a style="background-color: #B4FF9F; color: black; text-decoration: none;" class="btn btn-primary" href="..\php\coach_assessment_quiz_add.php">ADD QUIZ</a>
	</span>

	<br><br><br>

	<?php

	$result = mysqli_query($con,"SELECT * FROM quiz WHERE coachId='$coachId'");

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
				  </tr>
			</thead>

			<?php
			$i=1;
			while($row = mysqli_fetch_array($result)) {
			?>

			<tbody>
				<tr>
					<!-- <th style="text-align: center;" scope="row"><?php echo $i++ ?></th> -->
					<td style="text-align: center;"><?php echo $row["quizTitle"]; ?></td>
					<td style="text-align: center;"><?php echo $row["coachName"]; ?></td>
					<td style="text-align: center;"><?php echo $row["quizQuestion"]; ?></td>
					<td style="text-align: center;"><?php echo $row["quizDate"]." <br>Start Time ".$row["quizTime"]." <br>End Time ".$row["quizTime2"];  ?></td>
					<!-- <td style="text-align: center;"><?php echo $row["quizQuestionPoint"]; ?></td> -->
					<td>
						<center>
							<a class="btn btn-primary" href="..\html\coach_assessment_quiz_manage.php?id=<?php echo $row["quizId"]; ?>">Manage</a>
							<a class="btn btn-primary" href="..\php\coach_assessment_quiz_edit.php?id=<?php echo $row["quizId"]; ?>">Edit</a>
							<a class="btn btn-primary" onclick="return confirm('Are you sure, you want to delete it?')" href="..\php\coach_assessment_quiz_delete.php?id=<?php echo $row["quizId"]; ?>">Delete</a>
						</center>
					</td>
				</tr>
			</tbody>

			<?php
			$i++;
			}
			?>
		</table>

		<?php
		}
		else
		{
		    echo "No result found";
		}
		?>
</body>
</html>