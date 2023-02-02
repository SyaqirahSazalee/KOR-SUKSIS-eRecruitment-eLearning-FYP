<?php
include '..\php\config.php';

$coachId = $_SESSION['loginid'];
$id = $_GET['id'];

//SQL code to delete
$sql = "DELETE FROM `material` WHERE materialId = '$id'";

// select in database 
$rs = mysqli_query($con, $sql);
//$rscheck = mysqli_num_rows($rs);

if($rs > 0)
{
	echo '<script>alert("Material Succesfully Deleted")</script>';
	echo "<meta http-equiv=\"refresh\"content=\"0.2;URL=..\html\coach_class_law_page.php\">";
}
else
{
	echo '<script>alert("Sorry, there is an error!")</script>';
	echo "<meta http-equiv=\"refresh\"content=\"0.2;URL=..\html\coach_class_law_page.php\">";
}
?>