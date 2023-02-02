<!-- 
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
	$(document).ready(function()
	{
		setInterval(function()
		{
			$("#show").load("time.php");
		}, 1000);
	});
</script>

<p id="show"></p> -->

<?php
include '..\php\config.php';

//get userlogin email from session
$userlogin = $_SESSION['studentEmail'];
$studentId = $_SESSION['studentId'];

$quizId = $_SESSION['id'];

$result = mysqli_query($con, "SELECT * FROM quiz WHERE quizId='$quizId' ") ;
while ($row = mysqli_fetch_array($result)) 
{
	$mytime = $row['quizTimeLimit'];
}
?>

<?php
//session_start();
//$mytime = 25; //minute

if(!isset($_SESSION['time']))
{
	$_SESSION['time'] = time();
}
else
{
	$diff = time()-$_SESSION['time'];
	$diff = $mytime-$diff; //remaining time

	$hour = floor($diff/60);
	$minute = (int)($diff/60);
	$second = $diff%60;

	$show = $hour.":".$minute.":".$second; //showing time

	if($diff==0 || $diff<0)
	{
		echo "Timeout";
	}
	else
	{
		echo $show;
	}

}

?>