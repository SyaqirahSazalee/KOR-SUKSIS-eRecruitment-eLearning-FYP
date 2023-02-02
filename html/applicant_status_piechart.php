<?php

 $query = "SELECT status, count(*) as number FROM student GROUP BY status";  
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
                          ['Status', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["status"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of Recruitment Application Status',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>
            <div id="piechart" style="width: 1000px; height: 500px;"></div>
      </body>  
 </html>

<!-- <?php
$sql = "SELECT COUNT(*) FROM gender";
$result = mysqli_query($conn,$sql);
$data=mysqli_fetch_array($result);
echo $data['COUNT(*)'];
?> -->

