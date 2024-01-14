<?php
session_start();

$userName = $_POST["userName"];
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$password = $_POST["password"];
$email = $_POST["email"];
$newsLetter = $_POST["newsLetter"];

// $firstName = addslashes($_POST["firstName"]);
// $password = addslashes($_POST["password"]);
// $email = addslashes($_POST["email"]);
// $newsLetter = addslashes($_POST["newsLetter"]);

$removeThese = array("<?php","<?","?>","</","<",">","/>",";");
// $firstName =  str_replace($removeThese,"",$firstName);
// $password =  str_replace($removeThese,"",$password);
// $email =  str_replace($removeThese,"",$email);
// $newsLetter =  str_replace($removeThese,"",$newsLetter);


if(($userName=="")||($firstName=="")||($password=="")||($email=="")||($newsLetter==""))
{
    $_SESSION["errorMessage"] = "You must enter a value for all boxes!";
    header("Location:insert.php");
    exit;
}

else
{
    $_SESSION["errorMessage"] = "";
}

include("includes/OpenDbConn.php");
$sql = "SELECT Login FROM P2User WHERE Login=".$userName;
echo($sql."<br/>");
$result = mysqli_query($db,$sql);

if(empty($result))
    $num_results = 0;

else
    $num_results = mysqli_num_rows($result);

if($num_results !=0)
{
    $_SESSION["errorMessage"] = "The ShipperID you entered already exists!";
    header("Location:insert.php");
    exit;
}

else
    $_SESSION["errorMessage"]= "";

    //still on this page, so we to insert the data
$sql = "INSERT INTO P2User(Login, FirstName, LastName, Passwd, Email, NewsLetter) VALUES(".$userName.", '".$firstName."','".$lastName."','".$password."','".$email."','".$newsLetter."')";
echo($sql."<br/>");

$result = mysqli_query($db, $sql);

//if you have trouble with this page, comment out this header line
//so that the echo statments above will be visible to you and you can test them.

include("includes.CloseDbConn.php");
header("Location:select.php");
exit;
?>