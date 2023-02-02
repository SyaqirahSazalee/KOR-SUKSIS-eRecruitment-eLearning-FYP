<?php

if (isset($_POST['submit']) && isset($_FILES['my_file'])) 
{
	echo "<pre>";
	print_r($_FILES['my_file']);
	echo "</pre>";

	$file_name = $_FILES['my_file']['name'];
	$file_size = $_FILES['my_file']['size'];
	$tmp_name = $_FILES['my_file']['tmp_name'];
	$error = $_FILES['my_file']['error'];


	if ($error === 0) 
	{
		if ($file_size > 125000)
		{
			$em = "Sorry, your file is too large";
			header("Location: index.php");
		}
		else
		{
			$file_ex = pathinfo($file_name, PATHINFO_EXTENSION);
			$file_ex_lc = strtolower($file_ex);

			$allowed_exs = array("pdf", "docx", "png");

			if (in_array($file_ex_lc, $allowed_exs))
			{
				$new_file_name = uniqid("FILE-", true).'.'.$file_ex_lc;
				$file_upload_path = 'uploads/'.$new_file_name;
				move_uploaded_file($tmp_name, $file_upload_path);
			}
			else
			{
				$em = "You can't upload files of this type";
				header("Location: index.php?error=$em");
			}
		}
	}
	else
	{
		$em = "unknown error occurred";
		header("Location: index.php");
	}
}
else
{
	header("Location: index.php");
}

?>