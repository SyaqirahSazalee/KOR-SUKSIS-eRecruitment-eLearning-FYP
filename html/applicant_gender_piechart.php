<?php

$query = "SELECT applicantGender, count(*) as number FROM application GROUP BY applicantGender";  
$result = mysqli_query($con, $query);  
?>  

<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
   	<script type="text/javascript">  
   	google.charts.load('current', {'packages':['corechart']});  
   	google.charts.setOnLoadCallback(drawChart2);  
   	function drawChart2()  
  	{  
        var data = google.visualization.arrayToDataTable([  
                  ['Gender', 'Number'],  
                  <?php  
                  while($row = mysqli_fetch_array($result))  
                  {  
                       echo "['".$row["applicantGender"]."', ".$row["number"]."],";  
                  }  
                  ?>  
             ]);  
        var options = {  
              title: 'Percentage of Male and Female Applicant',  
              //is3D:true,  
              pieHole: 0.4  
             };  
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
        chart.draw(data, options);  
   	}  
   	</script>
</head>
<body>
	<br><br>  
   <div style="width:900px;">
        <div id="piechart" style="width: 8900px; height: 500px; float: left;"></div>  
   </div> 



	<!-- <center>
		<h1 style="color: black; margin-top: 10%;">eSUKSIS</h1>

		<div style="margin-top: 5%;">
			<a href="../php/admin_recruitment.php">
				<img src="image/recruitment.jpg" alt="recruitment"></a>
		</div>
	</center> -->
</body>
</html>