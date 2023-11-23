<?php

    $username = $_POST['username'];
    $serverName = "LAPTOP-H96FD3CI\\SQLEXPRESS";
    $connectionOptions = [
        "Database" => "WEBAPP",
        "Uid" => "",
        "PWD" => ""
    ];
    $conn = sqlsrv_connect($serverName, $connectionOptions);

    if ($conn == false) {   
        die(print_r(sqlsrv_errors(), true));
    }

    $sourceQuery1 = "SELECT User_Email, Name, Password FROM registration WHERE User_Email = '{$username}'";
    $sourceResult1 = sqlsrv_query($conn, $sourceQuery1);
    $userData = sqlsrv_fetch_array($sourceResult1);
    sqlsrv_close($conn);
?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <!DOCTYPE html> 
        <html lang="en">
        <head>
            <h1>Login Success</h1>
            <h2>Your Full name is <?php echo $userData['Name']; ?></h2>
            <h2>Your Email is is <?php echo $userData['User_Email'];?></h2>
            <h2>Your Passowrd is <?php echo $userData['Password'];
?></h2>
    </form>
    </body>
    </html>