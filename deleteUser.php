<?php
session_start();
$id = $_GET["id"];
include("includes/OpenDbConn.php");
$sql = "DELETE FROM usersLab5 WHERE UserID=".$id;

$result = mysqli_query($db, $sql);
include("includes/CloseDbConn.php");
header("Location:select.php");
?>