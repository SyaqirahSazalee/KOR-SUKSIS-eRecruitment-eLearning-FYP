<?php
include '..\php\config.php';

$coachId = $_SESSION['loginid'];
$id = $_GET['id'];

// database select SQL code
$sql = "SELECT * FROM `material` WHERE materialId = '$id'";

// select in database 
$rs = mysqli_query($con, $sql);
$rscheck = mysqli_num_rows($rs);

if($rscheck > 0)
{
	$row = mysqli_fetch_assoc($rs);

	$materialTitle = $row["materialTitle"];
	$materialDescription = $row["materialDescription"];
	$materialFile = $row["materialFile"];

}

if(isset($_POST['Submit'])) 
{
	mysqli_query($con,"UPDATE material set materialFile='" . $_POST['materialFile'] . "' WHERE materialId='$id'");

	echo '<script> alert("Successfully edited") </script>';
	echo "<meta http-equiv=\"refresh\"content=\"0.2;URL=..\html\coach_class_law_page.php\">";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<form method="post" action="">
		<center>
			<table style="width: 80%; margin-top: 50pt; margin-bottom: 50pt" class="table table-striped table-hover">
				<tbody>
					<tr>
						<td>
							<center>
								<p style="font-size: 30px;"><b>CHANGE FILE</b></p>
							</center>
							<div class="container">
								<br>
								<label for="materialFile"><b>File: </b></label>
								<br>
								<input type="file" class="form-control" name="materialFile" aria-label="default input example">
								<br><br>
							</div>
							<input class="btn btn-primary" type="submit" name="Submit" id="Submit" value="OK">
						</td>
					</tr>
				</tbody>
			</table>
		</center>
	</form>
</body>
</html>