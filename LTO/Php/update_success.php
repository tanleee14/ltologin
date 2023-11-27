<?php 
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

    $sourceQuery1 = "SELECT * FROM USERDATA WHERE USERID = (SELECT MAX(USERID) FROM USERDATA)";
    $results = sqlsrv_query($conn, $sourceQuery1);
    if ($results === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $sourceQuery2 = "SELECT COUNT(USERID) as totalcount FROM USERDATA";
    $results2 = sqlsrv_query($conn, $sourceQuery2);
    $totalcount = sqlsrv_fetch_array($results2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <style>
         body, h1, p, div {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }
       
      
        .container {
            max-width: 100%;
            margin: auto;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            background: #fff;
            padding: 20px;
        }

        /* Header and Text */
        h1, p {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Row and Cell styling */
        .row {
            display: flex;
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s;
        }
        .row.header {
            background-color: #007bff;
            color: #fff;
        }
        .row:hover:not(.header) {
            background-color: #f8f8f8;
        }
        .cell {
            flex: 1;
            padding: 10px;
            text-align: left;
        }

        /* Button Styling */
        .button {
            display: block;
            width: 200px;
            margin: 20px auto;
            text-align: center;
            padding: 10px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .button:hover {
            background: #0056b3;
        }   
        a{
            text-decoration: none;
            color: #FFF;
        }
    </style>
</head>
<body>
    <h1>Update Success</h1>
    <p>This is the updated Data</p>
    <div class="container">
        <div class="row header">
            <div class="cell">LASTNAME</div>
            <div class="cell">FIRSTNAME</div>
            <div class="cell">MIDDLENAME</div>
            <div class="cell">STREET</div>
            <div class="cell">PROVINCE</div>
            <div class="cell">CITY</div>
            <div class="cell">CONTACT</div>
            <div class="cell">TIN</div>
            <div class="cell">NATIONALITY</div>
            <div class="cell">GENDER</div>
            <div class="cell">BIRTHDATE</div>
            <div class="cell">HEIGHT</div>
            <div class="cell">WEIGHT</div>
        </div>
        <?php
            while($rows = sqlsrv_fetch_array($results)) {
                $firstname = $rows['FIRSTNAME'];
                $lastname = $rows['LASTNAME'];
                $middlename = $rows['MIDDLENAME'];
                $street = $rows['STREET'];
                $province = $rows['PROVINCE'];
                $city = $rows['CITY'];
                $contact = $rows['CONTACT'];
                $tin = $rows['TIN'];
                $nationality = $rows['NATIONALITY'];
                $gender = $rows['GENDER'];
                $bday = $rows['BIRTHDATE']->format('Y-m-d');
                $height = $rows['HEIGHT'];
                $weight = $rows['WEIGHT'];

                echo '<div class="row">
                        <div class="cell">'.$lastname.'</div>
                        <div class="cell">'.$firstname.'</div>
                        <div class="cell">'.$middlename.'</div>
                        <div class="cell">'.$street.'</div>
                        <div class="cell">'.$province.'</div>
                        <div class="cell">'.$city.'</div>
                        <div class="cell">'.$contact.'</div>
                        <div class="cell">'.$tin.'</div>
                        <div class="cell">'.$nationality.'</div>
                        <div class="cell">'.$gender.'</div>
                        <div class="cell">'.$bday.'</div>
                        <div class="cell">'.$height.'</div>
                        <div class="cell">'.$weight.'</div>
                      </div>';
            }
        ?>
    </div>
    <div>
        <button class="button"><a href="update_form.php">Proceed to login</a></button>
    </div>
</body>
</html>
