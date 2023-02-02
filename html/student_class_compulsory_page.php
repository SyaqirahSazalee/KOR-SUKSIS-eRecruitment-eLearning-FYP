<?php
include '..\php\config.php';

$userlogin = $_SESSION['studentEmail'];
//echo $userlogin;
$studentName = $_SESSION['studentName'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>LEARNING PAGE</title>
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
					<a style="color: white; text-decoration: underline;" class="nav-link" href="student_class_law_page.php">Classes</a>
				</b>
			</li>
			<li class="nav-item" style="margin-top: 5px;">
				<b>
					<a style="color: white" class="nav-link" href="..\html\student_assessment_page.php">Assessment</a>
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

	<nav class="nav nav-pills nav-fill">
	<a class="nav-link" href="..\html\student_class_law_page.php">Law</a>
	<a class="nav-link" href="..\html\student_class_marching_page.php">Marching</a>
	<a class="nav-link active" href="..\html\student_class_compulsory_page.php">Compulsory Course</a>
	</nav>

	<br><br>

	<?php
	$con = new PDO ("mysql:host=localhost;dbname=esuksis", "root", "");

	$stmt = $con->prepare("select * from material where materialCategory = 'Compulsory'");
	$stmt->execute();
	while($row = $stmt->fetch())
	{
		?>
		<center>
			<table style="width: 80%" class="table table-striped table-hover">
				<tbody>
				  <tr>
				    <td>
				     <h4><?php echo $row['materialTitle']; ?></h4>
		              <small style="font-style: italic;">Uploded by <?php echo $row['coachName']; ?></small>

		              <br><br>
				      <?php

				      // echo $row['materialDescription'] . "<br>";
				      // echo "<a style='text-decoration: none' target='_blank' href='view.php?id=".$row['materialId']."'>".$row['materialFile']."</a>";

				      if (($row['materialType']) == 'image/png' or ($row['materialType']) == 'image/jpeg') 
				      {
				        echo "<center><embed src = 'data:".$row['materialType'].";base64,".base64_encode($row['materialData'])."'width='350'/></center>";
				      }
				      else
				      {
				        if (($row['materialDescription']) == "") 
				        {
				          echo "<a style='text-decoration: none' target='_blank' href='view.php?id=".$row['materialId']."'>".$row['materialFile']."</a>";
				        }
				        else
				        {
				          echo $row['materialDescription'] . "<br>";
				          echo "<a style='text-decoration: none' target='_blank' href='view.php?id=".$row['materialId']."'>".$row['materialFile']."</a>";
				        }
				      }

				      ?>
				    </td>
				  </tr>
				</tbody>
			</table>
		</center>
	<?php
	}
	?>

</body>
</html>