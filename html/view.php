<?php
include '..\php\config.php';

$coachId = $_SESSION['loginid'];

$con = new PDO ("mysql:host=localhost;dbname=esuksis", "root", "");

$id = isset($_GET['id'])? $_GET['id'] : "";
$stmt = $con->prepare("select * from material where materialId=?");
$stmt->bindParam(1, $id);
$stmt->execute();
$row = $stmt->fetch();
header('Content-Type:'.$row['materialType']);
echo $row['materialData'];
?>