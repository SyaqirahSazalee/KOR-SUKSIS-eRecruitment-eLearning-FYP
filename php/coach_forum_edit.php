<?php
include '..\php\config.php';

$coachId = $_SESSION['loginid'];
$coachName = $_SESSION['name'];

$id = $_GET['id'];
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

	<br><br><br>

	<?php
  	if(isset($_POST['btn']))
  	{
  		mysqli_query($con,"UPDATE forum set  forumTitle='" . $_POST['forumTitle'] . "', forumContent='" . $_POST['forumContent'] . "' WHERE forumId='$id'");

  		echo '<script> alert("Forum Successfully Updated") </script>';
		echo "<meta http-equiv=\"refresh\"content=\"0.2;URL=..\html\coach_forum_page.php\">";
  	}
  	?>

	<?php
	$result = mysqli_query($con,"SELECT * FROM forum WHERE forumId ='$id'");

	if (mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result)) 
		{
			?>
			<center>
		    	<table style="width: 80%;" class="table table-striped table-hover">
			    	<tbody>
			        	<tr>
				          	<td>
				            	<form method="post" action="">
					              	<div class="mb-3">
					                	<label class="form-label">Forum Title</label>
					                	<input type="text" class="form-control" name="forumTitle" value="<?php echo $row['forumTitle'] ?>">
					              	</div>
					              	<div class="mb-3">
					                	<label class="form-label">Content</label> <br>
					                	<textarea class="form-control" name="forumContent" value=""><?php echo $row['forumContent'] ?></textarea>
					              	</div>
					              	<center>
					                	<br>
					                	<button name="btn">Save</button>
					                	<br>
					              	</center>
				            	</form>
				          	</td>
			        	</tr>
			      	</tbody>
			    </table>
			</center>
			<?php
		}
	}
	?>

	</body>
</html>