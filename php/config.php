<?php
session_start();

$con = mysqli_connect('localhost', 'root', '', 'esuksis');

if(!$con)
{
	echo "Connection to Database Failed";
}
// else
// {
// 	echo "good";
// }


?>