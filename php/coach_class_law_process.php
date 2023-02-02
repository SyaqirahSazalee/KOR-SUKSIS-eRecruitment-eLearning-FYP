<?php
include '..\php\config.php';

$coachId = $_SESSION['loginid'];
$coachName = $_SESSION['name'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>CLASS-LAW-ADD MATERIAL</title>
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


	<?php
		$con = new PDO ("mysql:host=localhost;dbname=esuksis", "root", "");

		if(isset($_POST['btn']))
		{
			$title = $_POST['materialTitle'];
			$description = $_POST['materialDescription'];
			$name = $_FILES['materialFile']['name'];
			$type = $_FILES['materialFile']['type'];
			$data = file_get_contents($_FILES['materialFile']['tmp_name']);
			$category = 'law';
			$name = $_FILES['materialFile']['name'];
			$stmt = $con->prepare("insert into material values('',?,?,?,?,?,?,?,?)");
			$stmt->bindParam(1,$coachId);
			$stmt->bindParam(2,$coachName);
			$stmt->bindParam(3,$title);
			$stmt->bindParam(4,$description);
			$stmt->bindParam(5,$name);
			$stmt->bindParam(6,$type);
			$stmt->bindParam(7,$data);
			$stmt->bindParam(8,$category);
			$stmt->execute();

			echo "<meta http-equiv=\"refresh\"content=\"0.2;URL=..\html\coach_class_law_page.php\">";
		}
	?>

	<div class="container">
		<div class="row">
			<form action="" method="post" enctype="multipart/form-data" >

				<br>

				<div class="mb-3">
				  <label class="form-label">Title</label>
				  <input type="text" class="form-control" name="materialTitle" required>
				</div>
				<div class="mb-3">
				  <label class="form-label">Description</label> <br>
				  <textarea name="materialDescription" style="width: 100%; height: 70pt"></textarea>
				</div>
				<div class="mb-3">
				  <label class="form-label">Upload File</label>
				  <input type="file" class="form-control" name="materialFile" required>
				</div>
				<p>File type accepted: .png, .jpeg, .jpg, .pdf, .docx</p>

				<center>
					<br>
					<button name="btn">Upload</button>
					<br>
				</center>

			</form>
		</div>
	</div>
</body>
</html>