<?php

    $serverName = "LAPTOP-H96FD3CI\SQLEXPRESS";
    $connectionOptions = [
        "Database" => "WEBAPP",
        "Uid" => "",
        "PWD" => ""
    ];
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if ($conn == false) {
        die(print_r(sqlsrv_errors(), true));
    }



?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <h2>Complete your login credentials</h2>

    <form id="registration" action="3rdpage.php" method="POST" action="success.php"  method="GET">

    <label for="fullname">FULL NAME</label>
    <input type="text" id="fullname" name="fullname"><br><br>

    <label for="email">EMAIL</label>
    <input type="text" id="email" name="email"><br><br>

    <label for="password">PASSWORD</label>
    <input type="text" id="password" name="password"><br><br>

    <label for="retype">RE-TYPE PASSWORD</label>
    <input type="text" id="retype" name="retype"><br><br>
    <input type="submit">
    </form>
</head>
<body>
    
</body>
</html>