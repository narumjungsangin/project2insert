<?php

session_start();


$id = $_GET["id"];

include("includes/OpenDbConn.php");

$sql = "DELETE FROM shippersLab5 WHERE ShipperID=".$id;

$result = mysqli_query($db, $sql);

include("includes/CloseDbConn.php");

header("Location:select.php");
?>