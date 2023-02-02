<?php
include '..\php\config.php';

$coachId = $_SESSION['loginid'];
$coachName = $_SESSION['name'];

$id=$_GET['id'];
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
	$query = "SELECT markLevel, count(*) as number FROM quiz_student WHERE quizId = '$id' GROUP BY markLevel";  
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
                               echo "['".$row["markLevel"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of Students Mark Range',  
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

	$result = mysqli_query($con,"SELECT * FROM quiz_student JOIN student ON quiz_student.studentId=student.studentId WHERE quizId='$id' ORDER BY mark DESC");

	if (mysqli_num_rows($result) > 0) 
	{
	?>
		<table style="float: right; width: 60%; margin-right: 15px;" class="table table-bordered table-hover">
			<thead>
				<tr>
					<!-- <th style="text-align: center;">#</th> -->
					<th style="text-align: center;">Student Matric No.</th>
					<th style="text-align: center;">Student Name</th>
					<th style="text-align: center;">Total Marks (20%)</th>
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
					<?php
					if($row['quizStatus']=='none')
					{
						?>
						<td style="text-align: center;"><?php echo "Not Attempt" ?></td>
						<?php
					}
					else
					{
						?>
						<td style="text-align: center;"><?php echo $row["mark"]; ?></td>
						<?php
					}
					?>
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