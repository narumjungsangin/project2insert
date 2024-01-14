<?php
session_start();

$userID = $_POST["userID"];
$lastName = addslashes($_POST["lastName"]);
$firstName = addslashes($_POST["firstName"]);
$title = addslashes($_POST["title"]);

$removeThese = array("<?php","<?","?>","</","<",">","/>",";");
$lastName =  str_replace($removeThese,"",$lastName);
$firstname =  str_replace($removeThese,"",$firstName);
$title =  str_replace($removeThese,"",$title);

if(($userID=="")||($lastName=="")||($firstName=="")||($title==""))
{
    $_SESSION["errorMessage"] = "You must enter a value for all boxes!";
    header("Location:insertUser.php");
    exit;
}
else if(!is_numeric($userID))
{
    $SESSION["errorMessage"] = "You must enter a number for user ID!";
    header("Location:insertUser.php");
    exit;
}
else
{
    $_SESSION["errorMessage"] = "";
}

include("includes/OpenDbConn.php");
$sql = "SELECT userID FROM usersLab5 WHERE userID=".$userID;
echo($sql."<br/>");
$result = mysqli_query($db,$sql);

if(empty($result))
    $num_results = 0;

else
    $num_results = mysqli_num_rows($result);

if($num_results !=0)
{
    $_SESSION["errorMessage"] = "The userID you entered already exists!";
    header("Location:insert.php");
    exit;
}

else
    $_SESSION["errorMessage"]= "";

    //still on this page, so we need to insert the data
$sql = "INSERT INTO usersLab5(userID, lastname, firstName, title) VALUES(".$userID.", '".$lastName."','".$firstName."', '".$title."')";
echo($sql."<br/>");
// echo($sql);

$result = mysqli_query($db, $sql);

//if you have trouble with this page, comment out this header line
//so that the echo statments above will be visible to you and you can test them.

include("includes.CloseDbConn.php");
header("Location:select.php");
exit;
?>