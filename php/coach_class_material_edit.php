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
	mysqli_query($con,"UPDATE material set  materialTitle='" . $_POST['materialTitle'] . "', materialDescription='" . $_POST['materialDescription'] . "' WHERE materialId='$id'");

	echo '<script> alert("Material Successfully Updated") </script>';
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
								<p style="font-size: 30px;"><b>MATERIAL DETAILS</b></p>
							</center>
							<div class="container">
								<br>
								<label for="materialTitle"><b>Title: </b></label>
								<input name="materialTitle" class="form-control" type="text" aria-label="default input example" value="<?php echo $materialTitle?>">
								<br>

								<br>
								<label for="materialDescription"><b>Description: </b></label>
								<input name="materialDescription" class="form-control" type="text" aria-label="default input example" value="<?php echo $materialDescription?>">
								<br>

								<br>
								<label for="materialFile"><b>File: </b></label>
								<input class="form-control" type="text" aria-label="default input example" value="<?php echo $materialFile?>">
								<br>
								To change file: 
								<a class="btn btn-primary" href="..\php\coach_class_changefile.php?id=<?php echo $row["materialId"]; ?>" >Change File</a>
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