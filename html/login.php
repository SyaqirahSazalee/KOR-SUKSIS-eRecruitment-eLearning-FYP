<!DOCTYPE html>
<html>
<head>
	<title>LOGIN PAGE</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	 <style type="text/css">
    	a:hover
    	{
    		background-color: grey;
    	}
    </style>
</head>
<body style="background-image: url(image/tauliah3.jpg); background-size: 100%; background-repeat: no-repeat;">
	<nav class="navbar navbar-light" style="background-color: #00008B; justify-content: flex-end;">
		<ul class="nav justify-content-end">
		  <li class="nav-item">
		    <b>
		    	<a style="color: white" class="nav-link" href="index.php">About</a>
		    </b>
		  </li>
		  <li class="nav-item">
		    <b>
		    	<a style="color: white; text-decoration: underline;" class="nav-link active" href="login.php">Log In</a>
		    </b>
		  </li>
		  <li class="nav-item">
		  	<b>
			    <a style="color: white" class="nav-link" href="student_registration.php">Sign Up</a>
			</b>
		  </li>
		</ul>
	</nav>

	<br>
	<center>
		<h1 style="color: white">WELCOME TO KOR SUKSIS UTeM</h1>
	</center>

	<form action="..\php\login_process.php" method="post" align="center" style="margin-top: 140px">
	  	<div class="container">
		  	<br>
		    <label style="color: white" for="email"><b>Email &emsp; &emsp;</b></label>
		    <input type="text" placeholder="Enter Email" name="studentEmail" id="studentEmail" required>
		    <br>

		    <br>
		    <label style="color: white" for="password"><b>Password &nbsp;</b></label>
		    <input type="password" placeholder="Enter Password" name="studentPassword" id="studentPassword" required>
		    <br>

		    <br>
		    <input class="btn btn-primary" type="submit" name="Submit" id="Submit" value="Submit">
		    <br>
		</div>
	</form>
</body>
</html>