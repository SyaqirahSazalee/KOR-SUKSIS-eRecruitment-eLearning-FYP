<?php
include '..\php\config.php';

$coachId = $_SESSION['loginid'];

// Uploads files
if (isset($_POST['Upload'])) 
{
    $title = $_POST["notesTitle"];

    $pname = rand(1000,10000)."-".$_FILES["notesFile"]["name"];

    $tname = $_FILES["notesFile"]["tmp_name"];

    $uploads_dir = '/files';

    move_uploaded_file($tname, $uploads_dir.'/'. $pname);

    $sql = "INSERT into notes(notesId, coachId, notesTitle, notesFile) VALUES('0', $coachId, $title','$pname')";
 
    if(mysqli_query($con,$sql)){
 
    echo "File Sucessfully uploaded";
    }
    else{
        echo "Error";
    }
}

































//     // name of the uploaded file
//     $filename = $_FILES['myfile']['name'];

//     // destination of the file on the server
//     $destination = 'uploads/' . $filename;

//     // get the file extension
//     $extension = pathinfo($filename, PATHINFO_EXTENSION);

//     // the physical file on a temporary uploads directory on the server
//     $file = $_FILES['myfile']['tmp_name'];
//     $size = $_FILES['myfile']['size'];

//     if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
//         echo "You file extension must be .zip, .pdf or .docx";
//     } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
//         echo "File too large!";
//     } else {
//         // move the uploaded (temporary) file to the specified destination
//         if (move_uploaded_file($file, $destination)) {
//             $sql = "INSERT INTO notes (coachId, notes, size) VALUES ($coachId, '$filename', $size)";
//             if (mysqli_query($con, $sql)) {
//                 echo "File uploaded successfully";
//             }
//         } else {
//             echo "Failed to upload file.";
//         }
//     }
// }
?>