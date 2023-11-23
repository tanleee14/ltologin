<?php
$fullname=$_POST['fullname'];
$email = $_POST['email'];
$passworderr="";
$password1= $_POST['password'];
$retypepassword=$_POST['retype'];

if($password1 == $retypepassword){
    $passworderr="Your password does not match";
    $serverName = "LAPTOP-H96FD3CI\SQLEXPRESS";
    $connectionOptions = [
        "Database" => "WEBAPP",
        "Uid" => "",    
        "PWD" => ""
    ];
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if ($conn == false) {
        die(print_r(sqlsrv_errors(), true));
        } else {
        echo 'Connection Success'."<br>";
        }



    $sql = "INSERT INTO registration (Name, User_Email, Password) VALUES ('$fullname','$email', '$password1')";
    $sql3 = sqlsrv_prepare($conn, $sql);

    if (sqlsrv_execute($sql3)) {
        header("Location:loginpage.php");
        exit();
        echo 'Registration success'."<br>";
    } else {
        echo 'Error'."<br>";
    }
    }
    else{
    $passworderr= "Password does not match";
    echo $passworderr;
    }

?>