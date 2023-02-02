<?php
include '..\php\config.php';

//get userlogin email from session
$userlogin = $_SESSION['studentEmail'];
$studentId = $_SESSION['studentId'];

// database select SQL code
$sql = "SELECT application, status FROM `student` WHERE studentEmail = '$userlogin'";

// select in database 
$rs = mysqli_query($con, $sql);
$rscheck = mysqli_num_rows($rs);

if($rscheck > 0)
{
	$row = mysqli_fetch_assoc($rs);

	$application = $row["application"];
	$status = $row["status"];

	if($application == 'Yes')
	{
		// echo '<script> alert("You already apply to this KOR SUKSIS recruitment") </script>';
		// echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=student_page.php\">";

		if ($status == 'Approve') 
		{
			echo '<script> alert("Your recruitment application approved") </script>';
			echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=student_page.php\">";
		}
		else if ($status == 'Reject')
		{
			echo '<script> alert("Your recruitment application rejected") </script>';
			echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=student_page.php\">";
		}
		else if ($status == 'Pending')
		{
			echo '<script> alert("Your recruitment application pending") </script>';
			echo "<meta http-equiv=\"refresh\"content=\"0.5;URL=student_page.php\">";
		}
	}
	else
	{
		// database select SQL code
		$sql = "SELECT * FROM `student` WHERE studentEmail = '$userlogin'";

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
		}
		else
		{
			echo "rosak";
		}
		?>

		<!DOCTYPE html>
		<html>
		<head>
			<title>RECRUIMENT PAGE</title>
			<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		</head>
		<body>
			<!-- <?php echo '<script> alert ("Attention! Please check your details and fill in recruitment form") </script>';?> -->
			<center>
				<p style="font-size: 25px;"><b>KOR SUKSIS Recruitment Form</b></p>
			</center>
			
			<form name="frmRecruit" method="post" action="..\php\student_recruitment_process.php">
			  <div class="container">
			    <br>
			    <label for="name"><b>Name: </b></label>
			    <input style="width: 50%" type="text" name="studentName" id="studentName" value="<?php echo $studentName?>" required>
			    <!-- <?php echo $studentName?> -->
			    <br>

			    <br>
			    <label for="matricNo"><b>Matric Number: </b></label>
			    <input type="text" name="studentMatricNo" id="studentMatricNo" value="<?php echo $studentMatricNo?>" required>
			    <!-- <?php echo $studentMatricNo?> -->
			    <br>

			    <br>
			    <label for="icNo"><b>IC Number: </b></label>
			    <input type="text" name="studentIcNo" id="studentIcNo" value="<?php echo $studentIcNo?>" required>
			    <!-- <?php echo $studentIcNo?> -->
			    <br>

			    <br>
			    <label for="phoneNo"><b>Phone Number: </b></label>
			    <input type="text" name="studentPhoneNo" id="studentPhoneNo" value="<?php echo $studentPhoneNo?>" required>
			   <!--  <?php echo $studentPhoneNo?> -->
			    <br>

			    <br>
			    <label for="faculty"><b>Faculty: </b></label>
			    <input type="text" name="studentFaculty" id="studentFaculty" value="<?php echo $studentFaculty?>" required>
			   <!--  <?php echo $studentFaculty?> -->
			    <br>

			    <br>
			    <label for="course"><b>Course:</b></label>
			    <input type="text" name="studentCourse" id="studentCourse" value="<?php echo $studentCourse?>" required>
			    <!-- <?php echo $studentCourse?> -->
			    <br>

			    <br>
			    <label for="address"><b>Address: </b></label>
			    <input style="width: 50%" type="text" name="studentAddress" id="studentAddress" value="<?php echo $studentAddress?>"></input>
			    <!-- <?php echo $studentAddress?> -->
			    <br>

			    <br>
			    <label for="email"><b>Email: </b></label>
			    <input style="width: 25%" type="text" name="studentEmail" id="studentEmail" value="<?php echo $studentEmail?>" required>
			    <!-- <?php echo $studentEmail?> -->
			    <br>

			    <!-- <br>
			    <label for="password"><b>Password:</b></label>
			    <input class="form-control" name="studentPassword" id="studentPassword" value="<?php echo $studentPassword?>" required>
			    <?php echo $studentPassword?>
			    <br> -->

			    <hr>

			    <div class="container">
				  	<div class="row">
					    <div class="col">
					    	<p><b>GENERAL INFORMATION</b></p>
						    <br>
							<label for="applicantGender"><b>Gender: </b></label>
							<select id="applicantGender" name="applicantGender" required>
							   	<option value="MALE" id="applicantGender">MALE</option>
						    	<option value="FEMALE" id="applicantGender">FEMALE</option>
						   	</select>
							<br>

						    <br>
						    <label for="applicantRace"><b>Race: </b></label>
						    <select id="applicantRace" name="applicantRace" required>
						    	<option value="MALAY" id="applicantRace">MALAY</option>
						    	<option value="CHINESE" id="applicantRace">CHINESE</option>
						    	<option value="INDIAN" id="applicantRace">INDIAN</option>
						    	<option value="OTHERS" id="applicantRace">OTHERS</option>
						    </select>
						    <br>

						    <br>
						    <label for="applicantHeight"><b>Height(cm): </b></label>
						    <input type="text" name="applicantHeight" id="applicantHeight" required>
						    <br>

						    <br>
						    <label for="applicantWeight"><b>Weight(kg): </b></label>
						    <input type="text" name="applicantWeight" id="applicantWeight" required>
						    <br>

						   <!--  <br>
						    <label for="applicantBmi"><b>BMI:</b></label>
						    <input type="text" name="applicantBmi" id="applicantBmi" value="<?php echo $applicantBmi?>" required>
						    <br> -->
					    </div>

					    <div class="col">
					    	<p><b>HEALTH INFORMATION</b></p>

						    <br>
						    <label for="applicantEye"><b>Eye: </b></label>
							<select id="applicantEye" name="applicantEye" required>
								<option value="NONE" id="applicantEye">None</option>
								<option value="SHORT-SIGHTED" id="applicantEye">Short-sighted</option>
							    <option value="LONG-SIGHTED" id="applicantEye">Long-sighted</option>
							</select>
							<br>

							<!-- <br>
							<label for="name"><b>Power of your spectacles:</b></label>
						    <input type="text" name="studentEye" id="studentEye" required>
						    <p>Please leave this place blank if you are not short or long sighted</p>
						    <br> -->

						    <br>
						    <label for="applicantDisability"><b>Disability/Accident: </b></label>
						    <p>Have you had an accident or operation in the last 3 years?</p>
						    <p>If yes, please state which part affected.</p>
						    <textarea style="width: 80%;" name="applicantDisability" id="applicantDisability"></textarea>
					    	<br>

					    	<br>
							<label for="applicantDisease"><b>Other disease: </b></label>
						    <input type="text" name="applicantDisease" id="applicantDisease">
						    <br>
					    </div>
					</div>
				</div>

				<!-- <br>
			    <p>Are you sure to submit KOR SUKSIS application?</p>
			    <input type="radio" id="application" name="application" value="Yes" checked="checked ">
			    <label for="No">Yes</label><br>
				<input type="radio" id="application" name="application" value="No">
				<label for="No">No</label><br>
				<br> -->

				<br><br>
				<center>
					<input class="btn btn-primary" type="submit" name="Update" id="Submit" value="Update/Apply">
				</center>
			
			</form>
			<p style="margin-bottom: 50px;"> </p>
		</body>
		</html>

		<?php
	}
}
else
{
	echo "rosak";
}
?>