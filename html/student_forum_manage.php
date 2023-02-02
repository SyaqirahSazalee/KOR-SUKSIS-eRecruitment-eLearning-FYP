<?php
include '..\php\config.php';

//get userlogin email from session
$userlogin = $_SESSION['studentEmail'];
$studentId = $_SESSION['studentId'];
$studentName = $_SESSION['studentName'];
$coachId = $_SESSION['coachId'];

$id = $_GET['id'];
$forumId = $_SESSION['id'] = $_GET['id'];

$rs=mysqli_query($con,"SELECT * FROM forum_reply WHERE forumId='$forumId' AND studentId='$studentId'");
while($row=mysqli_fetch_array($rs))
{
	$replyId = $row['replyId'];
}
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
					<a style="color: white;" class="nav-link" href="..\html\student_assessment_page.php">Assessment</a>
				</b>
			</li>
			<li class="nav-item" style="margin-top: 5px;">
		        <b>
		        	<a style="color: white; text-decoration: underline;" class="nav-link" href="..\html\student_forum_page.php">Forum</a>
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

	<?php
  	if (isset($_POST['btn'])) 
  	{
    //get POST records value
  	$forumId = $_SESSION['forumId'] = $_POST['forumId'];
  	$reply = $_SESSION['forumReply'] = $_POST['forumReply'];

 	// database select SQL code
 	$sql = "INSERT INTO forum_reply (`replyId`, `forumId`, `studentId`, `studentName`, `reply` ) VALUES ('0', '$forumId', '$studentId', '$studentName', '$reply')";

	// insert in database 
	$rs = mysqli_query($con, $sql);

  	if ($rs) 
  	{
    	echo '<script> alert("Reply Already Sent") </script>';
    	echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_forum_page.php\">";
  	}
  	else
  	{
    	echo '<script> alert("Data Not Inserted") </script>';
  	} 

  	}
  	?>

  	<?php
  	if (isset($_POST['edit'])) 
  	{
    //get POST records value
  	//$forumId = $_SESSION['forumId'] = $_POST['forumId'];
  	$reply = $_SESSION['forumReply'] = $_POST['forumReply'];

 	mysqli_query($con,"UPDATE forum_reply set  reply='$reply' WHERE replyId='$replyId'");

	echo '<script> alert("Reply Already Updated") </script>';
    echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\student_forum_page.php\">";
  	}
  	?>

	<?php
	$result = mysqli_query($con,"SELECT * FROM forum WHERE forumId = '$id'");

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
				            		<input type="hidden" name="forumId" value="<?php echo $row['forumId'] ?>">
					              	<div class="mb-3">
					                	<label class="form-label">Forum Title</label>
					                	<input type="text" class="form-control" name="forumTitle" value="<?php echo $row['forumTitle'] ?>">
					              	</div>
					              	<div class="mb-3">
					                	<label class="form-label">Content</label> <br>
					                	<textarea class="form-control" name="forumContent" value=""><?php echo $row['forumContent'] ?></textarea>
					              	</div>

					              	<?php
					              	$result = mysqli_query($con,"SELECT * FROM forum_reply WHERE studentId = '$studentId' && forumId = '$id'");

					              	if (mysqli_num_rows($result) > 0) 
									{
										while($row = mysqli_fetch_array($result)) 
										{
											if($row['reply']!="")
											{
					              			?>

								              	<label class="form-label">Reply</label> <br>
								              	<textarea rows="5" cols="50" class="form-control" name="forumReply"><?php echo $row['reply']; ?></textarea>

								              	<center>
								                	<br>
								                	<button name="edit">Edit</button>
								                	<br>
								              	</center>

							              	<?php
							              	}
							            }
							        }
							        else
					              	{
					              		?>
					              		
					              		<label class="form-label">Reply</label> <br>
					              		<textarea rows="5" cols="50" class="form-control" name="forumReply"></textarea>

					              		<center>
						                	<br>
						                	<button name="btn">Save</button>
						                	<br>
						              	</center>

					              		<?php
					              	}
					              	?>
					              	<!-- <center>
					                	<br>
					                	<button name="btn">Save</button>
					                	<button name="edit">Edit</button>
					                	<br>
					              	</center> -->
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