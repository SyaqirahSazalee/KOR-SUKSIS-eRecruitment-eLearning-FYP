<?php

$con = mysqli_connect('localhost', 'root', '', 'esuksis');

if(!$con)
{
	echo "Connection to Database Failed";
}
else
{
	echo "Connection to Database Success";
}

?>