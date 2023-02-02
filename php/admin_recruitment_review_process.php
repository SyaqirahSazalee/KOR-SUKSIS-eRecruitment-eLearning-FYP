<?php
include '..\php\config.php';

$id = $_GET['id'];

//echo $id;

// database select SQL code
$sql = "SELECT * FROM `student` WHERE studentId = '$id'";

// select in database 
$rs = mysqli_query($con, $sql);
$rscheck = mysqli_num_rows($rs);

if($rscheck > 0)
{
	$row = mysqli_fetch_assoc($rs);

	$studentName = $row["studentName"];
	$studentMatricNo = $row["studentMatricNo"];
	$studentIcNo = $row["studentIcNo"];
	$studentPhoneNo = $row["studentPhoneNo"];
	$studentFaculty = $row["studentFaculty"];
	$studentCourse = $row["studentCourse"];
	$studentAddress = $row["studentAddress"];
	$studentEmail = $row["studentEmail"];
	$studentPassword = $row["studentPassword"];
	$privilage = "student";

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
}
else
{
	echo "rosak";
}

if(count($_POST)>0) 
{
	mysqli_query($con,"UPDATE student set coachId='" . $_POST['coachId'] . "', status='" . $_POST['status'] . "' WHERE studentId='$id'");

	mysqli_query($con,"UPDATE carry_mark set coachId='" . $_POST['coachId'] . "' WHERE studentMatricNo='$studentMatricNo'");

	// mysqli_query($con,"UPDATE student set studentName='" . $_POST['studentName'] . "', studentMatricNo='" . $_POST['studentMatricNo'] . "', studentIcNo='" . $_POST['studentIcNo'] . "', studentPhoneNo='" . $_POST['studentPhoneNo'] . "' ,studentFaculty='" . $_POST['studentFaculty'] . "', studentCourse='" . $_POST['studentCourse'] . "', studentAddress='" . $_POST['studentAddress'] . "', status='" . $_POST['status'] . "' WHERE studentId='$id'");

	echo '<script> alert("Record Modified Successfully") </script>';
	echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=admin_recruitment_approved_process.php\">";

	// $message = '<script> alert("Record Modified Successfully") </script>';
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>RECRUIMENT PAGE</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<form name="frmRecruit" method="post" action="">
		<div>
			<center>
				<p style="font-size: 30px;"><b>STUDENT DETAILS</b></p>
			</center>
			
			<div class="container">
				<br>
				<label for="name"><b>Name: </b></label>
				<?php echo $studentName?>
				<br>

				<br>
				<label for="matricNo"><b>Matric Number: </b></label>
				<?php echo $studentMatricNo?>
				<br>

				<br>
				<label for="icNo"><b>IC Number: </b></label>
				<?php echo $studentIcNo?>
				<br>

				<br>
				<label for="phoneNo"><b>Phone Number: </b></label>
				<?php echo $studentPhoneNo?>
				<br>

				<br>
				<label for="faculty"><b>Faculty: </b></label>
				<?php echo $studentFaculty?>
				<br>

				<br>
				<label for="course"><b>Course: </b></label>
				<?php echo $studentCourse?>
				<br>

				<br>
				<label for="address"><b>Address: </b></label>
				<?php echo $studentAddress?>
				<br>

				<br>
				<label for="email"><b>Email: </b></label>
				<?php echo $studentEmail?>
				<br>

				<hr>

			    <div class="container">
				  	<div class="row">
					    <div class="col">
					    	<p><b>GENERAL INFORMATION</b></p>
						    <br>
							<label for="applicantGender"><b>Gender: </b></label>
							<?php echo $applicantGender?>
							<br>

						    <br>
						    <label for="applicantRace"><b>Race: </b></label>
						    <?php echo $applicantRace?>
						    <br>

						    <br>
						    <label for="applicantHeight"><b>Height(cm): </b></label>
						    <?php echo $applicantHeight?>
						    <br>

						    <br>
						    <label for="applicantWeight"><b>Weight(kg): </b></label>
						    <?php echo $applicantWeight?>
						    <br>
					    </div>

					    <br>
					    <div class="col">
					    	<p><b>HEALTH INFORMATION</b></p>

						    <br>
						    <label for="applicantEye"><b>Eye: </b></label>
							<?php echo $applicantEye?>
							<br>

						    <br>
						    <label for="applicantDisability"><b>Disability/Accident: </b></label>
						    <?php echo $applicantDisability?>
					    	<br>

					    	<br>
							<label for="applicantDisease"><b>Other disease: </b></label>
						    <?php echo $applicantDisease?>
						    <br>
					    </div>
					</div>
				</div>

				<hr>
				<p><b>COACH ASSIGNMENT</b></p>
				<br>
				<label>COACH INCHARGE: </label>
				<select name="coachId" id="coachId">
					<option value="1">AZAHAR BIN AWANG</option>
					<option value="2">HAMZAH BIN MOHAMAD</option>
					<option value="3">MOHD IZZAT BIN AZMAN</option>
				</select>
				<br>

				<br>
				<input type="radio" id="status" name="status" value="Approve" checked="checked ">
				<label for="No">Approve</label><br>
				<input type="radio" id="status" name="status" value="Reject">
				<label for="No">Reject</label><br>
				<br>

				<input class="btn btn-primary" type="submit" name="Submit" id="Submit" value="Submit">

			</div>

			<!-- <br>
			<label>COACH INCHARGE: </label>
			<select name="coachId" id="coachId">
				<option value="1">AZAHAR BIN AWANG</option>
				<option value="2">HAMZAH BIN MOHAMAD</option>
				<option value="3">MOHD IZZAT BIN AZMAN</option>
			</select>
			<br>

			<br>
			<input type="radio" id="status" name="status" value="Approve" checked="checked ">
			<label for="No">Approve</label><br>
			<input type="radio" id="status" name="status" value="Reject">
			<label for="No">Reject</label><br>
			<br>

			<input class="btn btn-primary" type="submit" name="Submit" id="Submit" value="Submit"> -->
		</div>
	</form>
	<p style="margin-bottom: 50px;"> </p>
</body>
</html>

