<?php
include '..\php\config.php';

$coachId = $_SESSION['loginid'];
$coachName = $_SESSION['name'];

$id = $_GET['id'];
$forumId = $_SESSION['id'] = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>COACH - LAW</title>
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
		          <a style="color: white;" class="nav-link" href="..\html\coach_class_law_page.php">Classes</a>
		        </b>
	      	</li>
	      	<li class="nav-item" style="margin-top: 5px;">
		        <b>
		          <a style="color: white" class="nav-link" href="..\html\coach_assessment_page.php">Assessment</a>
		        </b>
	      	</li>
	      	<li class="nav-item" style="margin-top: 5px;">
		        <b>
		          <a style="color: white; text-decoration: underline;" class="nav-link" href="..\html\coach_forum_page.php">Forum</a>
		        </b>
	      	</li>
	      	<li class="nav-item" style="margin-top: 5px;">
		        <b>
		          <a style="color: white" class="nav-link" href="..\php\logout_process.php">Log Out</a>
		        </b>
	      	</li>
    	</ul>
  	</nav>

  	<br>

  	<?php
	$result = mysqli_query($con,"SELECT * FROM forum WHERE forumId = '$id'");

	if (mysqli_num_rows($result) > 0) 
	{
		while($row = mysqli_fetch_array($result)) 
		{
			?>
			<br>
			<center>
				<h3><?php echo $row['forumTitle']; ?></h3><br>
				<h5 class="card-header"><?php echo $row['forumContent']; ?></h5>
				<small>by <?php echo $row['coachName']; ?></small>
			</center>

			<br><br>
		  	<?php
			$result = mysqli_query($con,"SELECT * FROM forum_reply WHERE forumId = '$id'");

		  	if (mysqli_num_rows($result) > 0) 
		  	{
		  		
				while($row = mysqli_fetch_array($result)) 
				{
					?>
					<center>
				      <table style="width: 80%" class="table table-striped table-hover">
				        <tbody>
				          <tr>
				            <td>
				              <h4><?php echo $row['reply']; ?></h4>
				              <small style="font-style: italic;">Replied by <?php echo $row['studentName']; ?></small>

				              <br><br>
				              
				            </td>
				          </tr>
				        </tbody>
				      </table>
				    </center>
				    <?php
				}  
			
			}
			else
			{
				echo "No result found";
			}

		}
	}

	?>

</body>
</html>