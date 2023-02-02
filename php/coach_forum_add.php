<?php
include '..\php\config.php';

$coachId = $_SESSION['loginid'];
$coachName = $_SESSION['name'];
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
  if (isset($_POST['btn'])) 
  {
    //get POST records value
  $forumTitle = $_SESSION['forumTitle'] = $_POST['forumTitle'];
  $forumContent = $_SESSION['forumContent'] = $_POST['forumContent'];

  // database select SQL code
  $sql = "INSERT INTO forum (`forumId`, `coachId`, `coachName`, `forumTitle`, `forumContent` ) VALUES ('0', '$coachId', '$coachName', '$forumTitle', '$forumContent')";

  // insert in database 
  $rs = mysqli_query($con, $sql);

  if ($rs) 
  {
    echo '<script> alert("Forum Successfully Created") </script>';
    echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=..\html\coach_forum_page.php\">";
  }
  else
  {
    echo '<script> alert("Data Not Inserted") </script>';
  } 

  }
  ?>

  <center>
    <table style="width: 80%;" class="table table-striped table-hover">
      <tbody>
        <tr>
          <td>
            <form method="post" action="">
              <div class="mb-3">
                <label class="form-label">Forum Title</label>
                <input type="text" class="form-control" name="forumTitle" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Content</label> <br>
                <textarea rows="10" cols="50" class="form-control" name="forumContent" required></textarea>
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

</body>
</html>