<?php
session_start();

if(empty($_SESSION["errorMessage"]))
    $_SESSION["errrorMessage"] = "";
$id = $_GET["id"];
include("includes/OpenDbConn.php");
?>

<!doctype html>
<html>
<head>
<meta charset = "utf-8">
    <title>Assign06 - Update</title>
    <style type = "text/css">
        form{width:450px margin:0px auto;}
        ul{list-style: none; margin-top:5px}
        ul li{display:block; float:left; width:100%; height:1%;}
        label{float: left; padding: 7px;}
        span{color: #ff0000; font-weight: bold;}
        input{float: right; margin: 10px; border: 1px solid #00000; padding: 3px; width: 240px;}
        #submit{width: 248px;}
        input:focus{border: 1px solid #999999;}
        fieldset{padding: 10px; border: 1px solid #000000; width: 450px; overflow: auto; margin:10px;}
        legend{color: #00000;  margin: 0 10px 0 0; padding:0 5px; font-size: 11px; font-weight:bold;}
</style>
</head>
<body>
     <h1 style = "text-align: center;"> Assign05 - Update </h1>
     <?php
     include("includes/menu.php");
     ?>
     <div style="font-style:italic text-align:center; font-size:9px;"> this set of pages validates as HTML5 compliant <br />&nbsp;</div>
    
    <?php
        $sql = "SELECT ShipperID, CompanyName, Phone FROM shippersLab5 WHERE ShipperID=".$id;
        $result = mysqli_query($db, $sql);
        if(empty($result))
        {
            $num_results = 0;
        }
        else
        {
            $num_results = mysqli_num_rows($result);
            $row = mysqli_fetch_array($result);
        }
        if($num_results == 0)
            $_SESSION["errorMessage"] = "You must first insert a Shipper with ID 2";
    ?>


     <form id="form0" name="form0" method="post" action="doUpdate.php">
        <fieldset>
            <legend>Insert into shippersLab5 table</legend>
            <ul>
                <li>
                    <label title="shipperID" for = "shipperID">ShipperID</label>
                    <input name = "shipperIDdis" id="shipperIDdis" type="text" size="20" maxlength="3" disabled="disabled"
                        value ="<?php if($num_results!=0){
                            echo(trim($row["ShipperID"]));
                        }?>"/>
                        <input name = "shipperID" id="shipperID" type="hidden"
                        value ="<?php if($num_results!=0){
                            echo(trim($row["ShipperID"]));
                        }?>"/>
                </li>
                <li>
                    <label title="companyName" for = "companyName">Company Name</label>
                    <input name = "companyName" id="companyName" type="text" size="20" maxlength="20" value ="<?php if($num_results!=0){
                            echo(trim($row["CompanyName"]));
                        }?>"
                     />
                </li>
                <li>
                    <label title="phone" for = "phone">Phone</label>
                    <input name = "phone" id="phone" type="text" size="20" maxlength="20" value ="<?php if($num_results!=0){
                            echo(trim($row["Phone"]));
                        }?>" />
                </li>
                <li>
                    <span><?php echo($_SESSION["errorMessage"]);?></span>
                </li>
                <li>
                    <input type="submit" value="Insert Info" name="submit" id="submit" />
                </li>
            </ul>
        </fieldset>
    </form>
    <?php
        $_SESSION["errorMessage"] = "";
    ?>
    <script type="text/javascript">
        document.getElementById("shipperID").focus();
    </script>

</body>
</html>