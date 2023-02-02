<?php
include '..\php\config.php';

$coachId = $_SESSION['loginid'];
$coachName = $_SESSION['name'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>CLASS-COACH</title>
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
          <a style="color: white; text-decoration: underline;" class="nav-link" href="..\html\coach_class_law_page.php">Classes</a>
        </b>
      </li>
      <li class="nav-item" style="margin-top: 5px;">
        <b>
          <a style="color: white" class="nav-link" href="..\html\coach_assessment_page.php">Assessment</a>
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
    <!-- <a class="nav-link active" aria-current="page" href="#">Active</a> -->
    <a class="nav-link active" href="..\html\coach_class_law_page.php">Law</a>
    <a class="nav-link" href="..\html\coach_class_marching_page.php">Marching</a>
    <a class="nav-link" href="..\html\coach_class_compulsory_page.php">Compulsory Course</a>
  </nav>

  <br><br>

  <a href="..\php\coach_class_law_process.php">ADD MATERIAL</a>

  <p>ADDED MATERIALS</p>



	<!-- <div class="container">
      <div class="row">
        <form action="..\php\coach_learning_process_1.php" method="post" enctype="multipart/form-data" >

          <br>
          <label>Title</label>
          <input type="text" name="notesTitle">
          <br>

          <br>
          <label>Upload File</label>
          <input type="file" name="notesFile"> 
          <br>

          <br>
          <button type="submit" name="Upload">upload</button>
          <br>
        </form>
      </div>
    </div> -->
</body>
</html>