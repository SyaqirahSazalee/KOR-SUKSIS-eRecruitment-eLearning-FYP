<?php
include '..\php\config.php';

$coachId = $_SESSION['loginid'];
$coachName = $_SESSION['name'];

$id = $_GET['id'];
$quizId = $_SESSION['id'];

$result = mysqli_query($con,"SELECT * FROM quiz WHERE quizId='$quizId'");
while ($row = mysqli_fetch_array($result)) 
{
	$quizTitle = $row['quizTitle'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>COCH PAGE-ADD STUDENT</title>
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

	<script language="JavaScript">
	function toggle(source) 
	{
		checkboxes = document.getElementsByName('student[]');
		for(var i=0, n=checkboxes.length;i<n;i++) 
		{

		  	checkboxes[i].checked = source.checked;
		}
	}
	</script>

	<?php
	if(isset($_POST['btn']))
	{
		$checked = $_POST['student'] ;  

		for ($i=0; $i<sizeof ($checked);$i++) 
		{  
			$result = mysqli_query($con,"SELECT * FROM student WHERE studentId = '".$checked[$i]. "'");

			if (mysqli_num_rows($result) > 0) 
			{
				while($row = mysqli_fetch_array($result)) 
				{
					$studentName = $row['studentName'];

					// database select SQL code
					$sql = "INSERT INTO `quiz_student` (`quizId`, `quizTitle`, `studentId`, `studentName`, `quizStatus`) VALUES ('$id', '$quizTitle', '".$checked[$i]. "', '$studentName', 'none')";

					// insert in database 
					$rs = mysqli_query($con, $sql);

					if ($rs) 
					{

						echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\coach_assessment_quiz_manage.php?id=$id\">";
					}
				}
			}
		} 
	}
	?>

	<br><br>

	<form method="post" action="">
		<div class="card col-md-5" style="width: 70%; margin-left: 15%">
		  	<h5 class="card-header" style="text-align: center;">Student(s)</h5>
		  	<div class="card-body">
			  	<?php
			  	$result = mysqli_query($con,"SELECT * FROM student WHERE coachId ='$coachId'");

				if (mysqli_num_rows($result) > 0) 
				{
					while($row = mysqli_fetch_array($result)) 
					{
						?>

						<input type="checkbox" name="student[]" value="<?php echo $row['studentId']; ?>"> <?php echo $row['studentMatricNo'];?> - <?php echo $row['studentName']; ?>
						<br>

						<?php
					}
				}
				else
				{
					echo "no result found";
				}
			  	?>
		  	</div>

			<br>
			<center>
				<input type="checkbox" onClick="toggle(this)" /> Select All<br><br>
				<button name="btn" style="width: 30%">Save</button>
			</center>
			<br>
		</div>

	</form>

</body>
</html>