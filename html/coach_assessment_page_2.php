<?php
include '..\php\config.php';

$coachId = $_SESSION['loginid'];
$coachName = $_SESSION['name'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>COACH PAGE - ASSESSMENT</title>
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
			<!-- <li class="nav-item" style="margin-top: 5px;">
				<b>
					<a style="color: white;" class="nav-link" href="..\html\coach_page.php">Dashboard</a>
				</b>
			</li> -->
			<li class="nav-item" style="margin-top: 5px;">
				<b>
					<a style="color: white" class="nav-link" href="..\html\coach_class_law_page.php">Classes</a>
				</b>
			</li>
			<li class="nav-item" style="margin-top: 5px;">
				<b>
					<a style="color: white; text-decoration: underline;" class="nav-link" href="..\html\coach_assessment_page.php">Assessment</a>
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
    	<a class="nav-link" href="..\html\coach_assessment_page.php">QUIZ</a>
    	<a class="nav-link active" href="..\html\coach_assessment_page_2.php">QUIZ SCORE</a>
  	</nav>

	<br><br>

	<?php
	$query = "SELECT level, count(*) as number FROM carry_mark WHERE coachId='$coachId' GROUP BY level";  
	$result = mysqli_query($con, $query);  
	?>  
	<!DOCTYPE html>
	<html> 
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
        <script type="text/javascript">  
	        google.charts.load('current', {'packages':['corechart']});  
	        google.charts.setOnLoadCallback(drawChart);  
	        function drawChart()  
	        {  
                var data = google.visualization.arrayToDataTable([  
                          ['Mark', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["level"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of Students Overall Carry Mark', 
                      slices: {0: {color: 'red'}, 1:{color: 'green'}}, 
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           	}  
       	</script>  
        </head>  
        <body>  
            <div style="float: left">
                <div id="piechart" style="width: 522px; height: 500px;"></div>  
            </div>
	    </body> 
	</html>

	<br><br>

	<?php
	$result = mysqli_query($con, "SELECT * FROM carry_mark WHERE coachId='$coachId'");
	if (mysqli_num_rows($result) > 0) 
	{
	?>
		<table style="float: right; width: 60%; margin-right: 15px;" class="table table-bordered table-hover">
			<thead>
				<tr>
					<!-- <th style="text-align: center;">#</th> -->
					<th style="text-align: center;">Student Matric No.</th>
					<th style="text-align: center;">Student Name</th>
					<th style="text-align: center;">Quiz 1</th>
					<th style="text-align: center;">Quiz 2</th>
					<th style="text-align: center;">Quiz 3</th>
					<th style="text-align: center;">Quiz 4</th>
					<th style="text-align: center;">Quiz 5</th>
					<th style="text-align: center;">Carry Mark (100%)</th>
				  </tr>
			</thead>

			<?php
			$i=1;
			while($row = mysqli_fetch_array($result)) {
			?>

			<tbody>
				<tr>
					<!-- <th style="text-align: center;" scope="row"><?php echo $i++ ?></th> -->
					<td style="text-align: center;"><?php echo $row["studentMatricNo"]; ?></td>
					<td style="text-align: center;"><?php echo $row["studentName"]; ?></td>
					<td style="text-align: center;"><?php echo $row["quiz1"]; ?></td>
					<td style="text-align: center;"><?php echo $row["quiz2"]; ?></td>
					<td style="text-align: center;"><?php echo $row["quiz3"]; ?></td>
					<td style="text-align: center;"><?php echo $row["quiz4"]; ?></td>
					<td style="text-align: center;"><?php echo $row["quiz5"]; ?></td>
					<td style="text-align: center;"><?php echo $row["total"]; ?></td>
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

	<br><br>

	<!-- <?php

	$result = mysqli_query($con,"SELECT * FROM quiz");

	if (mysqli_num_rows($result) > 0) 
	{
	?>
		<table style="float: right; width: 60%; margin-right: 15px;" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th style="text-align: center;">Title</th>
					<th style="text-align: center;">Coach</th>
					<th style="text-align: center;">Action</th>
				  </tr>
			</thead>

			<?php
			$i=1;
			while($row = mysqli_fetch_array($result)) {
			?>

			<tbody>
				<tr>
					<th style="text-align: center;" scope="row"><?php echo $i++ ?></th>
					<td style="text-align: center;"><?php echo $row["quizTitle"]; ?></td>
					<td style="text-align: center;"><?php echo $row["coachName"]; ?></td>
					<td>
						<center>
							<a class="btn btn-primary" href="..\php\coach_assessment_quiz_score.php?id=<?php echo $row["quizId"]; ?>">View</a>
						</center>
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
		?> -->
</body>
</html>