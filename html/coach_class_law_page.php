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
    <a class="nav-link active" href="..\html\coach_class_law_page.php">Law</a>
    <a class="nav-link" href="..\html\coach_class_marching_page.php">Marching</a>
    <a class="nav-link" href="..\html\coach_class_compulsory_page.php">Compulsory Course</a>
  </nav>

  <br><br>

  <!-- <span class="border border-2" style="float: right; margin-right: 30pt;">
    <div class="dropdown">
      <select class="btn btn-danger dropdown-toggle">
        <option class="dropdown-item" style="background-color: white;">Add material</option>
        <option class="dropdown-item" style="background-color: white;">Add link</option>
      </select>
    </div>
  </span> -->

 <!--  <span class="border border-2" style="float: right; margin-right: 30pt; border-radius: 5pt; background-color: lightgreen; width: 15%">
    <img style="width: 15%" src="..\html\image\add.jpg">
    <a style="text-decoration: none; color: black; font-size: 15pt" href="..\php\coach_class_law_process.php">ADD MATERIAL</a>
  </span> -->

  <span  style="float: right; margin-right: 30pt;">
    <a style="background-color: #B4FF9F; color: black; text-decoration: none;" class="btn btn-primary" href="..\php\coach_class_law_process.php">ADD MATERIAL</a>
  </span>

  <br><br><br>

  <?php
  $con = new PDO ("mysql:host=localhost;dbname=esuksis", "root", "");

  $stmt = $con->prepare("select * from material where materialCategory = 'law'");
  $stmt->execute();
  while($row = $stmt->fetch())
  {
    // $uploadId = $row['coachId'];

    // $stmt = $con->prepare("select * from coach where coachId = '$uploadId'");
    // $stmt->execute();

    // while($row = $stmt->fetch())
    // {

    //   $coachName = $row["coachName"];
    //   // $applicantRace = $row["applicantRace"];
    //   // $applicantHeight = $row["applicantHeight"];
    //   // $applicantWeight = $row["applicantWeight"];
    //   // $applicantEye = $row["applicantEye"];
    //   // $applicantDisability = $row["applicantDisability"];
    //   // $applicantDisease = $row["applicantDisease"];
    // }
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
                echo "<li><embed src = 'data:".$row['materialType'].";base64,".base64_encode($row['materialData'])."'width='200'/></li>";
              }
              else
              {
                if (($row['materialDescription']) == "") 
                {
                  echo "<a style='text-decoration: none' target='_blank' href='view.php?id=".$row['materialId']."'>".$row['materialFile']."</a>";
                }
                else
                {
                  echo $row['materialDescription'] . "<br>" ;
                  echo "<a style='text-decoration: none' target='_blank' href='view.php?id=".$row['materialId']."'>".$row['materialFile']."</a>";
                }
              }

              ?>
            </td>
            <td>
              <br>
              <span style="float: right;">
                <a class="btn btn-primary" href="..\php\coach_class_material_edit.php?id=<?php echo $row["materialId"]; ?>" >Edit</a>
                <a class="btn btn-primary" onclick="return confirm('Are you sure, you want to delete it?')" href="..\php\coach_class_material_delete.php?id=<?php echo $row["materialId"]; ?>" >Delete</a>
              </span>
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