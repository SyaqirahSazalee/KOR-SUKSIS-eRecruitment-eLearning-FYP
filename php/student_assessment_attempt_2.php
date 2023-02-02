<?php
include '..\php\config.php';

//get userlogin email from session
$userlogin = $_SESSION['studentEmail'];
$studentId = $_SESSION['studentId'];
$studentName = $_SESSION['studentName'];
$totalQues=$_SESSION['totalQues'];
//echo $totalQues;

$id = $_GET['id'];
$quizId = $_SESSION['id'];

// $result = mysqli_query($con, "SELECT * FROM quiz WHERE quizId='$quizId' ") ;
// $rows = mysqli_num_rows($result);
// while ($row = mysqli_fetch_array($result)) 
// {
// 	$mytime = $row['quizTimeLimit'];
	
// }
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
		<!-- untuk time limit<text>Time: <text id="time001" value="<?php echo $mytime ?>"><?php echo $mytime ?></text></text>
		<hr>
		<br> -->
		<!-- <?php
		$result = mysqli_query($con,"SELECT * FROM question WHERE quizId='$quizId'");

		if (mysqli_num_rows($result) > 0) 
		{
			?>
			<p>QUESTIONS</p>
			<?php
			$i = 1;
			while ($row = mysqli_fetch_array($result)) 
			{
				?>
				<div class="grid-container" style="float: left;">
					<div class="grid-cell">
						<center>
							<a id="selectNo" href="student_assessment_attempt_2.php?id=<?php echo $row["questionId"]; ?>"><?php echo $i ?></a>
						</center>
					</div>
				</div>
				<?php
				$i++;
			}
		}
		?> -->

		<!--untuk time limit <script type="text/javascript">
			c = <?php echo $mytime ?>;
			function timer001()
			{
				c=c-1;
				if (c< <?php echo $mytime ?>) 
				{
					time001.innerHTML=c;
					goto.innerHTML="<button onclick=next()>NEXT</button>";
				}

				if (c<1) 
				{
					window.clearInterval(update);
					time001.innerHTML="Time's Up!";
					document.getElementById('button').style.display="none";
					document.getElementById('selectNo').style.display="none";
					// document.getElementById('opt1').style.display="none";
					// document.getElementById('opt2').style.display="none";
					// document.getElementById('opt3').style.display="none";
					// document.getElementById('opt4').style.display="none";
					goto.innerHTML="<button onclick=next()>NEXT</button>";
					
				}
			}

			update = setInterval("timer001()", 1000);

			function next() 
			{
				currentId=<?php echo $id ?>;
				//document.write(currentId);
				
				newId=currentId+1;
				//document.write(newId);

				//<?php $newId = "<script>document.write(newId);</script>" ?>

				window.location.href="student_assessment_attempt_2.php?id="+newId;
			}
		</script> -->

		<!-- <script type="text/javascript">
			function preventBack() {
				window.history.forward();
			}
			
			setTimeout("preventBack()", 0);
			
			window.onunload = function () { null };
		</script> -->

		<br><br>
	</body>
	</html>

	<!--  -->

	<?php

	// database select SQL code
	$sql = "SELECT * FROM `question` WHERE quizId='$quizId' AND questionId = '$id'";

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
					<form method="post" action="..\php\saveAnswer.php">
		            	<input type="hidden" name="quizId" value="<?php echo $row['quizId']; ?>">
						<input type="hidden" name="questionId" value="<?php echo $row['questionId']; ?>">
						<input type="hidden" name="correct" value="<?php echo $row['ans']; ?>">

						<p id="ques"><b>QUESTION</b></p>
						<?php echo $row['question']; ?>

						<?php
						if (($row['opt3'] == "") && ($row['opt4'] == ""))
						{
							?>
							<br><br>
							<p><b>ANSWER</b></p>
							<input type="radio" name="ans" value="opt1" id="opt1"> <?php echo $row['opt1']; ?> <br>
							<input type="radio" name="ans" value="opt2" id="opt2"> <?php echo $row['opt2']; ?> <br>
							<!-- <label>a) <?php echo $row['opt1']; ?></label><br>
							<label>b) <?php echo $row['opt2']; ?></label><br> -->

							<br>
							<!-- <p>YOUR ANSWER: 
								<select name="ans">
									<option value="opt1">A</option>
									<option value="opt2">B</option>
								</select> 
							</p> -->
							<br>
								<input type="submit" value="Save" id="button">
								<!-- <a href="..\php\saveAnswer.php?id=<?php echo $id ?>" id="button" name="btn">Save</a> -->
								<!-- <p id="goto"></p> -->
							<br>


							<?php
						}
						else if (($row['opt4'] == ""))
						{
							?>
							<br><br>
							<p><b>ANSWER</b></p>
							<input type="radio" name="ans" value="opt1" id="opt1"> <?php echo $row['opt1']; ?> <br>
							<input type="radio" name="ans" value="opt2" id="opt2"> <?php echo $row['opt2']; ?> <br>
							<input type="radio" name="ans" value="opt3" id="opt3"> <?php echo $row['opt3']; ?> <br>

							<br>
							<!-- <p>YOUR ANSWER: 
								<select name="ans">
									<option value="opt1">A</option>
									<option value="opt2">B</option>
									<option value="opt3">C</option>
								</select> 
							</p> -->
							<br>
								<input type="submit" value="Save" id="button">
								<!-- <p id="goto"></p> -->
							<br>
							<?php
						}
						else if (($row['opt1'] != "") && ($row['opt2'] != "") && ($row['opt3'] != "") && ($row['opt4'] != ""))
						{
							?>
							<br><br>
							<p><b>ANSWER</b></p>
							<input type="radio" name="ans" value="opt1" id="opt1"> <?php echo $row['opt1']; ?> <br>
							<input type="radio" name="ans" value="opt2" id="opt2"> <?php echo $row['opt2']; ?> <br>
							<input type="radio" name="ans" value="opt3" id="opt3"> <?php echo $row['opt3']; ?> <br>
							<input type="radio" name="ans" value="opt4" id="opt4"> <?php echo $row['opt4']; ?> <br>

							<br>
							<!-- <p>YOUR ANSWER: 
								<select name="ans">
									<option value="opt1">A</option>
									<option value="opt2">B</option>
									<option value="opt3">C</option>
									<option value="opt4">D</option>
								</select>  -->
							</p>
							<br>
								<input type="submit" value="Save" id="button">
								<!-- <p id="goto"></p> -->
							<br>
							<?php
						}
						?>
						<!-- <input type="submit" name="submit" value="NEXT PAGE" onclick="next()"> -->
					</form>
				</td>
	          </tr>
	        </tbody>
	      </table>
	    </center>
	    <br>
	    	<!-- <p id="goto" style="float: right; margin-right: 10%;"></p> -->
	    	<a href="next.php?id=<?php echo $id ?>" style="float: right; margin-right: 10%; text-decoration: none; color: black; background-color: lightblue" class="btn btn-primary">NEXT</a>
	    	<!-- <button onclick="next()" style="float: right;">NEXT</button> -->
			<!-- <a href="..\html\test.php?id=<?php echo $row['quizId'] ?>" style="float: right; margin-right: 10%;" name="finish">Finish Attempt</a> -->
		<br>
	    <?php
	}
	else
	{
		echo "<meta http-equiv=\"refresh\"content=\"0.1;URL=next.php?id=$id\">";
	}
	// else
	// {
	// 	?>
	 	<!-- <center>
	// 		<p>No more question(s).</p>
	// 		<p>Please click Finish Attempt to proceed.</p>
	// 		<div style="border: 1px solid black; background-color: lightgreen; width: 150px; height: 30px ">
	// 			<a style="text-decoration: none; color: black;" href="..\html\test.php?id=<?php echo $quizId ?>" name="finish">Finish Attempt</a>
	// 		</div>
	// 	</center> -->
	 	<?php
	// }
	?>
</body>
</html>