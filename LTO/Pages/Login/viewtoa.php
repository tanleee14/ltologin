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


    $toa = isset($_POST["typeofapp"]) ? $_POST["typeofapp"] : "";
   

    if (!empty($toa)) {
        $sql = "SELECT * 
        FROM USERS AS U
        INNER JOIN CATEGORY_DETAILS AS C
        ON U.USERID = C.USERID
        WHERE C.A = ? OR C.B = ? OR C.C = ? OR C.D = ? OR 
              C.E = ? OR C.F = ? OR C.G = ? OR C.H = ? OR 
              C.I = ? OR C.J = ? OR C.K = ? OR C.L = ? OR 
              C.M = ? OR C.N = ?";
    $params = array($toa, $toa, $toa, $toa, $toa, $toa, $toa, $toa, $toa, $toa, $toa, $toa, $toa, $toa);
    $results = sqlsrv_query($conn, $sql, $params);

    } else {
        $sql = "SELECT *
        FROM USERS AS U
        INNER JOIN CATEGORY_DETAILS AS C
        ON U.USERID = C.USERID
        INNER JOIN USERDATA AS US
        ON U.USERID = US.USERID";
        $results = sqlsrv_query($conn, $sql);
    }




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Style/viewstyle.css">

</head>
<body>
    <div class="container">
        <div class="wrapper">
            <div class="left">
            <h1>Dashboard</h1>
                <div class="labels">
                <div><a href="adminlanding.php">View All</a></div>
                <div><a href="Viewdate.php">View by date</a></div>
                <div><a href="Viewplace.php">View by Province or City</a></div>
                <div><a href="Viewtoa.php">View by License Application Type</a></div>
                </div>
                <div class="bottom">
                <div><a href="../../Php/Login/login.php">Logout</a></div>
                </div>
                
            </div>
            <div class="right">
            
                <div class="search">
                <form method="post" action="">
                        <input type="text" name="typeofapp" placeholder="Enter type of Application">
                        <button type="submit" class="submit">Search</button>
                        
                    </form>
                </div>
                <div class="users">
                    <div class="info">
                        <div class="category">
                        <div><H4>ID</H4></div>
                        <div><H4>Email</H4></div>
                        <div><H4>Password</H4></div>
                        <div><H4>Firstname</H4></div>
                        <div><H4>Lastname</H4></div>
                        <div><H4>A</H4></div>
                        <div><H4>B</H4></div>
                        <div><H4>C</H4></div>
                        <div><H4>D</H4></div>
                        <div><H4>E</H4></div>
                        <div><H4>F</H4></div>
                        <div><H4>G</H4></div>
                        <div><H4>H</H4></div>
                        <div><H4>I</H4></div>
                        <div><H4>J</H4></div>
                        <div><H4>K</H4></div>
                        <div><H4>L</H4></div>
                        <div><H4>M</H4></div>
                        <div><H4>N</H4></div>
                        </div>
                        

                     
                <?php
                
                while ($rows = sqlsrv_fetch_array($results)) {
                    $accountid = $rows['ACCOUNTID'];
                    $email = $rows['EMAIL'];
                    $password = $rows['PASSWORD'];
                    $firstname = $rows['FIRSTNAME'];
                    $lastname = $rows['LASTNAME'];
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
                
                    echo '<div class="details box">
                        <div><h7>' . $accountid . '</h7></div>
                        <div><h7>' . $email . '</h7></div>
                        <div><h7>' . $password . '</h7></div>
                        <div><h7>' . $firstname . '</h7></div>
                        <div><h7>' . $lastname . '</h7></div>
                        <div><h7>' . $a . '</h7></div>
                        <div><h7>' . $b . '</h7></div>
                        <div><h7>' . $c . '</h7></div>
                        <div><h7>' . $d . '</h7></div>
                        <div><h7>' . $e . '</h7></div>
                        <div><h7>' . $f . '</h7></div>
                        <div><h7>' . $g . '</h7></div>
                        <div><h7>' . $h . '</h7></div>
                        <div><h7>' . $i . '</h7></div>
                        <div><h7>' . $j . '</h7></div>
                        <div><h7>' . $k . '</h7></div>
                        <div><h7>' . $l . '</h7></div>
                        <div><h7>' . $m . '</h7></div>
                        <div><h7>' . $n . '</h7></div>
                        </div>';
                }
                
                ?>
                </div>
            </div>
           
            </div>
        </div>
    </div>

<script>
</script>
</body>
</html>