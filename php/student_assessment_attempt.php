<?php
include '..\php\config.php';

//get userlogin email from session
$userlogin = $_SESSION['studentEmail'];
$studentId = $_SESSION['studentId'];
$studentName = $_SESSION['studentName'];

$quizId = $_SESSION['id'] = $_GET['id'];

$result = mysqli_query($con, "SELECT * FROM quiz WHERE quizId='$quizId'");
while($row=mysqli_fetch_array($result))
{
	$_SESSION['totalQues']=$row['quizQuestion'];
	$totalQues=$_SESSION['totalQues'];
	//$timeLimit=$row['quizTimeLimit'];
}
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

    <!-- ni untuk previos page<script type="text/javascript">
		function preventBack() {
			window.history.forward();
		}
		
		setTimeout("preventBack()", 0);
		
		window.onunload = function () { null };
	</script> -->

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
		<!-- <text>Time: <text id="time001" value="<?php echo $mytime ?>"><?php echo $mytime ?></text></text>
		<hr> -->
		<br>
		<?php
		$result = mysqli_query($con,"SELECT * FROM question WHERE quizId='$quizId'");

		if (mysqli_num_rows($result) > 0) 
		{
			?>
			<!-- <p style="text-align: center;">CLICK "START" TO START ANSWERING QUESTIONS</p> -->
			<?php
			//$i = 1;
			$row = mysqli_fetch_array($result)
			
			?>
			<p style="text-align: center;">This quiz will be having <b><?php echo $totalQues; ?> question(s)</b>.</p>
				<p style="text-align: center;">Answer all questions.
			<p style="text-align: center;">CLICK <b>START</b> TO START ANSWERING QUESTIONS</p>
			<center>
				<div>
					<a style="text-decoration: none; color: black; background-color: lightgreen;" class="btn btn-primary" href="student_assessment_attempt_2.php?id=<?php echo $row["questionId"]; ?>">START</a>
				</div>
			</center>
			
			<?php
				//$i++;
			
		}
		?>

		<!-- <script type="text/javascript">
			c = <?php echo $mytime ?>;
			function timer001()
			{
				c=c-1;
				if (c< <?php echo $mytime ?>) 
				{
					time001.innerHTML=c;
				}

				if (c<1) 
				{
					window.clearInterval(update);
					time001.innerHTML="Time's Up!";
					// <?php
					// header('location: ..\html\test.php?id=<?php $quizId ?>')
					// ?>
					
				}
			}

			update = setInterval("timer001()", 1000);
		</script> -->

		<?php
	if(isset($_POST['btn']))
	{

		$questionId = $_POST['questionId'];
		$quizId = $_POST['quizId'];
		$correct = $_POST['correct'];
		$answer = $_POST['ans'];
		$status = "saved";

		$sql = "INSERT INTO answer (studentId, quizId, questionId, correct, answer, status) VALUES ('$studentId', '$quizId','$questionId', '$correct', '$answer', '$status')";

		// insert in database 
		$rs = mysqli_query($con, $sql);

		if ($rs) 
		{
			// echo '<script> alert("Quiz Successfully Attempted") </script>';
			// echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\coach_assessment_page.php\">";
		}
		else
		{
			echo '<script> alert("Data Not Inserted") </script>';
		} 

		// $next = $_POST['questionId'];
		// $next++;
	}
	?>

	</body>
	</html>