<?php
include '..\php\config.php';

$id = $_GET['id'];

$sql = "SELECT * FROM `application` WHERE studentId = '$id'";

// select in database 
$rs = mysqli_query($con, $sql);
$rscheck = mysqli_num_rows($rs);

if($rscheck > 0)
{
	$row = mysqli_fetch_assoc($rs);

	$applicantGender = $row["applicantGender"];
	$applicantRace = $row["applicantRace"];
	$applicantHeight = $row["applicantHeight"];
	$applicantWeight = $row["applicantWeight"];
	$applicantEye = $row["applicantEye"];
	$applicantDisability = $row["applicantDisability"];
	$applicantDisease = $row["applicantDisease"];
}
else
{
	echo "rosak";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>
	<div class="container">
	  	<div class="row">
		    <div class="col">
		    	<p><b>GENERAL INFORMATION</b></p>
			    <br>
				<label for="applicantGender"><b>Gender:</b></label>
				<?php echo $applicantGender?>
				<br>

			    <br>
			    <label for="applicantRace"><b>Race:</b></label>
			    <?php echo $applicantRace?>
			    <br>

			    <br>
			    <label for="applicantHeight"><b>Height(cm):</b></label>
			    <?php echo $applicantHeight?>
			    <br>

			    <br>
			    <label for="applicantWeight"><b>Weight(kg):</b></label>
			    <?php echo $applicantWeight?>
			    <br>
		    </div>

		    <div class="col">
		    	<p><b>HEALTH INFORMATION</b></p>

			    <br>
			    <label for="applicantEye"><b>Eye:</b></label>
				<?php echo $applicantEye?>
				<br>

			    <br>
			    <label for="applicantDisability"><b>Disability/Accident:</b></label>
			    <?php echo $applicantDisability?>
		    	<br>

		    	<br>
				<label for="applicantDisease"><b>Other disease:</b></label>
			    <?php echo $applicantDisease?>
			    <br>
		    </div>
		</div>
	</div>
</body>
</html>


