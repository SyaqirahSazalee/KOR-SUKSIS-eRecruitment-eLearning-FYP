<?php
include '..\php\config.php';

//get userlogin email from session
$userlogin = $_SESSION['studentEmail'];
$studentId = $_SESSION['studentId'];
$coachId = $_SESSION['coachId'];
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

  $result = mysqli_query($con,"SELECT * FROM forum WHERE coachId = '$coachId'");

  if (mysqli_num_rows($result) > 0) 
  {
  ?>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <!-- <th style="text-align: center;">#</th> -->
          <th style="text-align: center;">Title</th>
          <th style="text-align: center;">Coach</th>
          <th style="text-align: center;">Content</th>
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
          <td style="text-align: center;"><?php echo $row["forumTitle"]; ?></td>
          <td style="text-align: center;"><?php echo $row["coachName"]; ?></td>
          <td style="text-align: center;"><?php echo $row["forumContent"]; ?></td>
          <td>
            <center>
              <a class="btn btn-primary" href="..\html\student_forum_view.php?id=<?php echo $row["forumId"]; ?>">View</a>
              <a class="btn btn-primary" href="..\html\student_forum_manage.php?id=<?php echo $row["forumId"]; ?>">Reply</a>
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