<!DOCTYPE html>
<html>
<head>
	<title>Upload File</title>
</head>
<body>
	<form action="upload.php" method="post" enctype="multipart/form-data">

		<input type="File" name="my_file">

		<input type="submit" name="submit" value="Upload">
		
	</form>
</body>
</html>

<center>
      <table style="width: 80%" class="table table-striped table-hover">
        <tbody>
          <tr>
            <td>

				<?php

				$result = mysqli_query($con,"SELECT * FROM question WHERE quizId = '$quizId'");

				if (mysqli_num_rows($result) > 0) 
				{
					while($row = mysqli_fetch_array($result)) 
					{
						$questionId = $row['questionId'];
						?>

						<p><b>QUESTION</b></p>

						<?php
						echo $row['question'];

						?>
						<br><br>
						<?php

						$result = mysqli_query($con,"SELECT * FROM option WHERE questionId = '$questionId' AND option is NOT NULL");

						?>

						<p><b>ANSWER</b></p>

						<?php

						if (mysqli_num_rows($result) > 0) 
						{
							while($row = mysqli_fetch_array($result)) 
							{
								?>

								<input type="radio" name="answer" value="<?php echo $row['option']; ?>">

								<?php
								echo $row['option'];
								?>

								<br>
								<?php

							}
						}
						else
						{
							echo "No result found";
						}
					}
				}
				else
				{
					echo "No result found";
				}
				?>
			</td>
          </tr>
        </tbody>
      </table>
    </center>