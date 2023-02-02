<!DOCTYPE html>
<html>
<head>
	<title>REGISTRATION PAGE</title>
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
		  <li class="nav-item">
		    <b>
		    	<a style="color: white" class="nav-link" href="index.php">About</a>
		    </b>
		  </li>
		  <li class="nav-item">
		    <b>
		    	<a style="color: white" class="nav-link" href="login.php">Log In</a>
		    </b>
		  </li>
		  <li class="nav-item">
		  	<b>
			    <a style="color: white; text-decoration: underline;" class="nav-link active" href="student_registration.php">Sign Up</a>
			</b>
		  </li>
		</ul>
	</nav>

	<form name="frmRegister" method="post" action="..\php\student_registration_process.php">
	  <div class="container">
	    <h1>Register</h1>
	    <p>Please fill in this form to create an account.</p>
	    <hr>

	    <br>
	    <label for="name"><b>Name</b></label>
	    <input class="form-control" type="text" placeholder="ADAM AIMAN BIN AZAHAR" name="studentName" id="studentName" required>
	    <br>

	    <br>
	    <label for="matricNo"><b>Matric Number</b></label>
	    <input class="form-control" type="text" placeholder="B031910083" name="studentMatricNo" id="studentMatricNo" minlength="10" maxlength="10" required>
	    <br>

	    <br>
	    <label for="icNo"><b>IC Number</b></label>
	    <input class="form-control" type="text" placeholder="000101101453" name="studentIcNo" id="studentIcNo" pattern="[0-9]+" minlength="12" maxlength="12" required>
	    <br>

	    <br>
	    <label for="phoneNo"><b>Phone Number</b></label>
	    <input class="form-control" type="text" placeholder="0193178967" name="studentPhoneNo" id="studentPhoneNo" pattern="^[0-9]*$" minlength="10" maxlength="11" required>
	    <br>

	    <br>
	    <label for="faculty"><b>Faculty</b></label>
	    <input class="form-control" type="text" placeholder="FTMK" name="studentFaculty" id="studentFaculty" required>
	    <br>

	    <br>
	    <label for="course"><b>Course</b></label>
	    <input class="form-control" type="text" placeholder="BITM" name="studentCourse" id="studentCourse" required>
	    <br>

	    <br>
	    <label for="address"><b>Address</b></label>
	    <textarea class="form-control" name="studentAddress" id="studentAddress" required></textarea>
	    <br>

	    <br>
	    <label for="email"><b>Email</b></label>
	    <input class="form-control" type="text" placeholder="b031910083@student.utem.edu.my" name="studentEmail" id="studentEmail" required>
	    <br>

	    <br>
	    <label for="password"><b>Password</b></label>
	    <input class="form-control" type="password" placeholder="" name="studentPassword" id="studentPassword" required>
	    <br>

	    <input class="btn btn-primary" type="submit" name="Submit" id="Submit" value="Submit">
	  </div>
</form>
</body>
</html>