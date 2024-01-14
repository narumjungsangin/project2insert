<?php
session_start();

$shipperID = $_POST["shipperID"];
$companyName = addslashes($_POST["companyName"]);
$phone = addslashes($_POST["phone"]);

$removeThese = array("<?php","<?","?>","</","<",">","/>",";");
$companyName =  str_replace($removeThese,"",$companyName);
$phone =  str_replace($removeThese,"",$phone);

if(empty($shipperID)){
    header("Location:select.php");
    exit;
}

include("includes/OpenDbConn.php");
$sql = "UPDATE shippersLab5 SET CompanyName='".$companyName."',Phone='".$phone."' WHERE ShipperID = ".$shipperID;
echo($sql);
$result = mysqli_query($db, $sql);

include("includes/CloseDbConn.php");
header("Location: select.php");
?>