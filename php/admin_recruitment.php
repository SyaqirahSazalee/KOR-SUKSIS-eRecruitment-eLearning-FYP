<?php
include '..\php\config.php';

$adminEmail = $_SESSION['loginemail'];

//echo $userlogin;

// database select SQL code
// $sql = "SELECT * FROM `student` WHERE application = 'Yes'";

// select in database 
// $rs = mysqli_query($con, $sql);
// $studentList = array();
// while($studentListRow = mysqli_fetch_assoc($rs) )
// {
// 	array_push($studentList, $studentListRow);
// 	$studentId = $studentListRow['studentId'];
// }

// foreach ($studentList as $index => $student):
// {
// 	echo "STUDENT ID: " . $student['studentId'] . "<br>";
// 	echo "STUDENT NAME: " . $student['studentName'] . "<br>";
// 	echo "STUDENT MATRIC NO: " . $student['studentMatricNo'] . "<br>";
// 	echo "STUDENT IC NO: " . $student['studentIcNo'] . "<br>";
// 	echo "STUDENT PHONE NO: " . $student['studentPhoneNo'] . "<br>";
// 	echo "STUDENT FACULTY: " . $student['studentFaculty'] . "<br>";
// 	echo "STUDENT COURSE: " . $student['studentCourse'] . "<br>";
// 	echo "STUDENT ADDRESS: " . $student['studentAddress'] . "<br>";
// 	echo "STUDENT EMAIL: " . $student['studentEmail'] . "<br>";
// 	echo "<br>";

$result = mysqli_query($con,"SELECT * FROM student WHERE application = 'Yes' AND status IS NULL");

if (mysqli_num_rows($result) > 0) {
?>

<!DOCTYPE html>
<html>
<head>
	<title>RECRUITMENT APPLICATION LIST</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th scope="col">Id</th>
				<th scope="col">Name</th>
				<th scope="col">Matric No</th>
				<th scope="col">IC No</th>
				<th scope="col">Phone No</th>
				<th scope="col">Action</th>
			  </tr>
		</thead>

		<?php
		$i=0;
		while($row = mysqli_fetch_array($result)) {
		?>

		<tbody>
			<tr>
				<th scope="row"><?php echo $row["studentId"]; ?></th>
				<td><?php echo $row["studentName"]; ?></td>
				<td><?php echo $row["studentMatricNo"]; ?></td>
				<td><?php echo $row["studentIcNo"]; ?></td>
				<td><?php echo $row["studentPhoneNo"]; ?></td>
				<td>
					<a class="btn btn-primary" href="admin_recruitment_process.php?id=<?php echo $row["studentId"]; ?>">Review</a>
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

	<!-- <!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
		<input class="btn btn-primary" type="submit" name="Approve" id="Approve" value="Approve">
		<input class="btn btn-primary" type="submit" name="Reject" id="Reject" value="Reject">
	</body>
	</html> -->

	<!-- <?php
	// echo "<br><br>";
	// }
	// endforeach;

	?> -->

