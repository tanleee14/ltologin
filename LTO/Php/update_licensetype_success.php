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





    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Data</title>
        <style>
            body {
                font-family: Arial, sans-serif;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid black;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
            tr:nth-child(even) {
                background-color: #f9f9f9;
            }
            tr:hover {
                background-color: #ddd;
            }
        </style>
    </head>
    <body>
        <h1>Update Sucess</h1>
        <p>This is the updated Data</p>
        <table>
            <thead>
                <tr>
                    <th>A</th>
                    <th>B</th>
                    <th>C</th>
                    <th>D</th>
                    <th>E</th>
                    <th>F</th>
                    <th>G</th>
                    <th>H</th>
                    <th>I</th>
                    <th>J</th>
                    <th>K</th>
                    <th>L</th>
                    <th>M</th>
                    <th>N</th>
                    <th>L1</th>
                    <th>L2</th>
                    <th>L3</th>
                    <th>L4</th>
                    <th>D1</th>
                    <th>D2</th>
                    <th>E1</th>
                    <th>E2</th>
                    <th>E3</th>
                    <th>E4</th>
                    <th>E5</th>
                    <th>E6</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
            while($rows = sqlsrv_fetch_array($results)){
                $a = $rows['A'];
                $b = $rows['B'];
                $c = $rows['C'];
                $d = $rows['D'];
                $e = $rows['E'];
                $f = $rows['F'];
                $g = $rows['G'];
                $h = $rows['H'];
                $i = $rows['I'];
                $j = $rows['J']; // Corrected from $rows('M') to $rows['GENDER']
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

        
            

            echo '<tr>
                <td>'.$a.'</td>
                <td>'.$b.'</td>
                <td>'.$c.'</td>
                <td>'.$d.'</td>
                <td>'.$e.'</td>
                <td>'.$f.'</td>
                <td>'.$g.'</td>
                <td>'.$h.'</td>
                <td>'.$i.'</td>
                <td>'.$j.'</td>
                <td>'.$k.'</td>
                <td>'.$l.'</td>
                <td>'.$m.'</td>
                <td>'.$n.'</td>
                <td>'.$l1.'</td>
                <td>'.$l2.'</td>
                <td>'.$l3.'</td>
                <td>'.$l4.'</td>
                <td>'.$d1.'</td>
                <td>'.$d2.'</td>
                <td>'.$e1.'</td>
                <td>'.$e2.'</td>
                <td>'.$e3.'</td>
                <td>'.$e4.'</td>
                <td>'.$e5.'</td>
                <td>'.$e6.'</td>
            </tr>';
            }
                ?>
            </tbody>
        </table>

        <div>
            <button><a href="update_form.php">Proceed to login</a></button>
        </div>
    

    </body>
    </html>
