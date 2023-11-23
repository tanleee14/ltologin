<?php
$studentnameErr = '';
$mobileErr = '';
$mobilelenErr = '';
$namepErr = '';


    if (empty($_POST['mobile'])) {
        $mobileErr = 'Mobile is required';
    } else {
        $mobile = $_POST['mobile'];
        if (strlen($mobile) != 10) {
            $mobilelenErr = 'Mobile number should be 10 digits';
        }
    }

    if (empty($_POST['studentname'])) {
        $studentnameErr = 'Name is required';
    } else {
        $studentname = $_POST['studentname'];
    }

    
    if (empty($mobileErr) && empty($studentnameErr) && empty($mobilelenErr)) {
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
            echo 'Connection Success';
        }

        $email = $_POST['email'];
        $year = $_POST['year'];

        $sql = "INSERT INTO STUDENT(STUDENT_NAME, STUDENT_EMAIL, YEAR_LEVEL, MOBILE_NUMBER) VALUES('$studentname', '$email', '$year', '$mobile')";
        $results = sqlsrv_query($conn, $sql);

        
        $sourceQuery1 = "SELECT STUDENT_ID,STUDENT_NAME FROM STUDENT WHERE STUDENT_ID=(SELECT IDENT_CURRENT('STUDENT'))"; 
        $sourceResult1 = sqlsrv_query($conn, $sourceQuery1);
        $userid = sqlsrv_fetch_array($sourceResult1);
    
        if ($results) {
            exit();
            header("Location:login.php");
            echo 'Registration Successful';
        } else {
            echo 'Error';
        }
    } else {
        echo "You did not fill the form correctly<br><br>";
        echo "$mobileErr<br><br>";
        echo "$studentnameErr<br><br>";
        echo "$mobilelenErr<br><BR>";
    }

?>
