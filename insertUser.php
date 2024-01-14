<?php
session_start();
include("includes/OpenDbConn.php");
?>

<!doctype html>
<html>
<head>
    <meta charset = "utf-8"/>
    <title>Assign05 - Insert</title>
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
     <h1 style = "text-align: center;"> Assign05 - Insert </h1>
     <?php
     include("includes/menu.php");
     ?>

     <form id="form0" name="form0" method="post" action="doInsertUser.php">
        <fieldset>
            <legend>Insert into shippersLab5 table</legend>
            <ul>
                <li>
                    <label title="userID" for = "userID">User ID</label>
                    <input name = "userID" id="userID" type="text" size="20" maxlength="3" />
                </li>

                <li>
                    <label title="firstName" for = "firstName">First Name</label>
                    <input name = "firstName" id="firstName" type="text" size="20" maxlength="20" />
                </li>

                <li>
                    <label title="lastName" for = "lastName">Last Name</label>
                    <input name = "lastName" id="lastName" type="text" size="20" maxlength="20" />
                </li>
                <li>
                    <label title="title" for = "title">Title</label>
                    <input name = "title" id="title" type="text" size="20" maxlength="20" />
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