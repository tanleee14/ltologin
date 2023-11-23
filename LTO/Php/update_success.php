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
                    <th>LASTNAME</th>
                    <th>FIRSTNAME</th>
                    <th>MIDDLENAME</th>
                    <th>STREET</th>
                    <th>PROVINCE</th>
                    <th>CITY</th>
                    <th>CONTACT</th>
                    <th>TIN</th>
                    <th>NATIONALITY</th>
                    <th>GENDER</th>
                    <th>BIRTHDATE</th>
                    <th>HEIGHT</th>
                    <th>WEIGHT</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
            while($rows = sqlsrv_fetch_array($results)){
                $firstname = $rows['FIRSTNAME'];
                $lastname = $rows['LASTNAME'];
                $middlename = $rows['MIDDLENAME'];
                $street = $rows['STREET'];
                $province = $rows['PROVINCE'];
                $city = $rows['CITY'];
                $contact = $rows['CONTACT'];
                $tin = $rows['TIN'];
                $nationality = $rows['NATIONALITY'];
                $gender = $rows['GENDER']; // Corrected from $rows('M') to $rows['GENDER']
                $bday = $rows['BIRTHDATE']->format('Y-m-d');
                $height = $rows['HEIGHT'];
                $weight = $rows['WEIGHT'];

        
            

            echo '<tr>
                <td>'.$lastname.'</td>
                <td>'.$firstname.'</td>
                <td>'.$middlename.'</td>
                <td>'.$street.'</td>
                <td>'.$province.'</td>
                <td>'.$city.'</td>
                <td>'.$contact.'</td>
                <td>'.$tin.'</td>
                <td>'.$nationality.'</td>
                <td>'.$gender.'</td>
                <td>'.$bday.'</td>
                <td>'.$height.'</td>
                <td>'.$weight.'</td>
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
