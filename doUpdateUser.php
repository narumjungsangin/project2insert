<?php
session_start();

$userID = $_POST["userID"];
$FirstName = addslashes($_POST["FirstName"]);
$LastName = addslashes($_POST["LastName"]);
$Title = addslashes($_POST["Title"]);

$removeThese = array("<?php","<?","?>","</","<",">","/>",";");
$FirstName =  str_replace($removeThese,"",$FirstName);
$LastName =  str_replace($removeThese,"",$LastName);
$Title =  str_replace($removeThese,"",$Title);

if(empty($userID)){
    header("Location:select.php");
    exit;
}

include("includes/OpenDbConn.php");
$sql = "UPDATE usersLab5 SET FirstName='".$FirstName."',LastName='".$LastName."',Title='".$Title."' WHERE UserID = ".$userID;
echo($sql);
$result = mysqli_query($db, $sql);

include("includes/CloseDbConn.php");
header("Location: select.php");
?>