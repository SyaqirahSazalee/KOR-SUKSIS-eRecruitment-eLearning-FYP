<?php
include '..\php\config.php';

$adminEmail = $_SESSION['loginemail'];
?>


<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PAGE</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style type="text/css">
    	a:hover
    	{
    		background-color: grey;
    	}
    </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    	// Load Charts and the corechart package.
	    google.charts.load('current', {'packages':['corechart']});

	    // Draw the pie chart for Sarah's pizza when Charts is loaded.
	    google.charts.setOnLoadCallback(drawSarahChart);

	    // Draw the pie chart for the Anthony's pizza when Charts is loaded.
	    google.charts.setOnLoadCallback(drawAnthonyChart);

	    // Callback that draws the pie chart for Sarah's pizza.
	    function drawSarahChart() 
	    {
	      	<?php
			$query = "SELECT status, count(*) as number FROM student GROUP BY status";  
 			$result = mysqli_query($con, $query);    
			?>

			var data = google.visualization.arrayToDataTable([  
	              ['Status', 'Number'],  
	              <?php  
	              while($row = mysqli_fetch_array($result))  
	              {  
	                   echo "['".$row["status"]."', ".$row["number"]."],";  
	              }  
	              ?>  
	         ]);  

	        // Set options for Sarah's pie chart.
	        var options = 
	        {
	        	title:'Percentage of Recruitment Application Status',
	        	slices: {0: {color: 'green'}, 1:{color: '#FFD700'}}, 
	            is3D:true,  
                pieHole: 0.4 
            };

	        // Instantiate and draw the chart for Sarah's pizza.
	        var chart = new google.visualization.PieChart(document.getElementById('Sarah_chart_div'));
	        chart.draw(data, options);
	    }

	    // Callback that draws the pie chart for Anthony's pizza.
	    function drawAnthonyChart() 
	    {
	      	<?php
			$query = "SELECT applicantGender, count(*) as number FROM application GROUP BY applicantGender";  
			$result = mysqli_query($con, $query);  
			?>

			var data = google.visualization.arrayToDataTable([  
	              ['Gender', 'Number'],  
	              <?php  
	              while($row = mysqli_fetch_array($result))  
	              {  
	                   echo "['".$row["applicantGender"]."', ".$row["number"]."],";  
	              }  
	              ?>  
	         ]);

	        // Set options for Anthony's pie chart.
	        var options = 
	        {
	        	title:'Percentage of Male and Female Applicant',
	        	slices: {0: {color: 'hotpink'}, 1:{color: 'blue'}}, 
	            is3D:true,  
                pieHole: 0.4 
            };

	        // Instantiate and draw the chart for Anthony's pizza.
	        var chart = new google.visualization.PieChart(document.getElementById('Anthony_chart_div'));
	        chart.draw(data, options);
	    }
    </script>
</head>
<body>
	<nav class="navbar navbar-light" style="background-color: #00008B; justify-content: flex-end;">
		<ul class="nav justify-content-end">
			<li class="nav-item" style="margin-top: 5px;">
				<b>
					<a style="color: white; text-decoration: underline;" class="nav-link" href="..\html\admin_page.php">Dashboard</a>
				</b>
			</li>
			<li class="nav-item" style="margin-top: 5px;">
				<b>
					<a style="color: white" class="nav-link" href="..\php\admin_recruitment_pending_process.php">Recruitment</a>
				</b>
			</li>
			<li class="nav-item" style="margin-top: 5px;">
				<b>
					<a style="color: white" class="nav-link" href="..\php\logout_process.php">Log Out</a>
				</b>
			</li>
		</ul>
	</nav>


	<div id="Sarah_chart_div" style="width: 650px; height: 650px; float: right;"></div>

    <div id="Anthony_chart_div" style="width: 650px; height: 650px; float: left;"></div>

	<!-- <?php
	include 'applicant_status_piechart.php';
	include 'applicant_gender_piechart.php';
	?> -->
</body>
</html>