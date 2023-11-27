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


    $sourceQuery1 = "SELECT * FROM CATEGORY_DETAILS WHERE APPLICATIONID = (SELECT MAX(APPLICATIONID) FROM CATEGORY_DETAILS)";
    $results = sqlsrv_query($conn, $sourceQuery1);
    if ($results === false) {
        die(print_r(sqlsrv_errors(), true));
    }



    $sourceQuery2 = " SELECT COUNT (USERID) as totalcount FROM USERDATA";
    $results2 = sqlsrv_query($conn, $sourceQuery2);
    $totalcount = sqlsrv_fetch_array($results2);

    ?>



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

    $sourceQuery1 = "SELECT * FROM CATEGORY_DETAILS WHERE APPLICATIONID = (SELECT MAX(APPLICATIONID) FROM CATEGORY_DETAILS)";
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
    <title>Category Details</title>
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
            max-width: 1000px;
            margin: auto;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            background: #fff;
            padding: 20px;
        }
        h1, p {
            text-align: center;
            margin-bottom: 20px;
        }
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Category Details Updated</h1>
        <p>This is the updated Data</p>
        <div class="row header">
            <div class="cell">A</div>
            <div class="cell">B</div>
            <div class="cell">C</div>
            <div class="cell">D</div>
            <div class="cell">E</div>
            <div class="cell">F</div>
            <div class="cell">G</div>
            <div class="cell">H</div>
            <div class="cell">I</div>
            <div class="cell">j</div>
            <div class="cell">K</div>
            <div class="cell">L</div>
            <div class="cell">M</div>
            <div class="cell">N</div>
            <div class="cell">L1</div>
            <div class="cell">L2</div>
            <div class="cell">L3</div>
            <div class="cell">L4</div>
            <div class="cell">D1</div>
            <div class="cell">D2</div>
            <div class="cell">E1</div>
            <div class="cell">E2</div>
            <div class="cell">E3</div>
            <div class="cell">E4</div>
            <div class="cell">E5</div>
            <div class="cell">E6</div>
        </div>
        <div class="data-display">
            <?php
                while($rows = sqlsrv_fetch_array($results)) {
                    $a = $rows['A'];
                    $b = $rows['B'];
                    $c = $rows['C'];
                    $d = $rows['D'];
                    $e = $rows['E'];
                    $f = $rows['F'];
                    $g = $rows['G'];
                    $h = $rows['H'];
                    $i = $rows['I'];
                    $j = $rows['J'];
                    $k = $rows['K'];
                    $l = $rows['L'];
                    $m = $rows['M'];
                    $n = $rows['N'];
                    $l1 = $rows['L1'];
                    $l2 = $rows['L2'];
                    $l3 = $rows['L3'];
                    $l4 = $rows['L4'];
                    $d1 = $rows['D1'];
                    $d2 = $rows['D2'];
                    $e1 = $rows['E1'];
                    $e2 = $rows['E2'];
                    $e3 = $rows['E3'];
                    $e4 = $rows['E4'];
                    $e5 = $rows['E5'];
                    $e6 = $rows['E6'];
                    // ... other data fields ...

                    echo '<div class="row">
                            <div class="cell">'.$a.'</div>
                            <div class="cell">'.$b.'</div>
                            <div class="cell">'.$c.'</div>
                            <div class="cell">'.$d.'</div>
                            <div class="cell">'.$e.'</div>
                            <div class="cell">'.$f.'</div>
                            <div class="cell">'.$g.'</div>
                            <div class="cell">'.$h.'</div>
                            <div class="cell">'.$i.'</div>
                            <div class="cell">'.$j.'</div>
                            <div class="cell">'.$k.'</div>
                             <div class="cell">'.$l.'</div>
                             <div class="cell">'.$m.'</div>
                             <div class="cell">'.$n.'</div>
                             <div class="cell">'.$l1.'</div>
                             <div class="cell">'.$l2.'</div>
                             <div class="cell">'.$l3.'</div>
                             <div class="cell">'.$l4.'</div>
                             <div class="cell">'.$d1.'</div>
                             <div class="cell">'.$d2.'</div>
                             <div class="cell">'.$e1.'</div>
                             <div class="cell">'.$e2.'</div>
                             <div class="cell">'.$e3.'</div>
                             <div class="cell">'.$e4.'</div>
                             <div class="cell">'.$e5.'</div>
                             <div class="cell">'.$e6.'</div>
                            
                          </div>';
                }
            ?>
        </div>
        <a href="../Php/Login/login.php" class="button">Proceed to Login</a>
    </div>
</body>
</html>
