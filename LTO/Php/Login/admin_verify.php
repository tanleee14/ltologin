<?php
$serverName = "LAPTOP-H96FD3CI\\SQLEXPRESS"; // Double backslash is needed for Windows authentication
$connectionOptions = [
    "Database" => "WEBAPP",
    "Uid" => "", // Replace with your SQL Server username
    "PWD" => ""  // Replace with your SQL Server password
];

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

$errorMessage = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get user input
    $code = isset($_POST['code']) ? $_POST['code'] : '';
  

    // Prepare and execute the SQL query with parameters
    $query = "SELECT * FROM ADMIN WHERE ADMIN_CODE = ?";
    $params = array($code);
    
    $result = sqlsrv_query($conn, $query, $params);

    if ($result !== false) {
        $rows = sqlsrv_has_rows($result);

        if ($rows === true) {
            // Login successful
            header("Location: ../Login/admin.php");
            exit(); // Ensure that no further output is sent
        } else {
            // Login failed
            $errorMessage = "Incorrect Code.";
        }

        sqlsrv_free_stmt($result);
    } else {
        echo "Error executing query: " . print_r(sqlsrv_errors(), true);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Verify Admin </title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* This ensures the body takes the full viewport height */
            margin: 0;
            background-image: url("../../../image/leftimage.gif");
            background-position: cover;
            position: relative;
            background-size: cover;
        }
        body::before {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.5); /* Example tint color with 50% opacity */
        z-index: 1; /* Ensures the overlay is above the background image */
        }
        .container{
            background-color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 500px;
            height: 500px;
            border-radius: 50px;    
            z-index: 1;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
        img{
            height: 100px;
            width: 100px;
        }
        Button {
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            }
        form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Land_Transportation_Office.svg/2048px-Land_Transportation_Office.svg.png" alt="Lto logo">
    <form action="" method="Post">
        <H1>Are you an Admin ?</H1>
        <div class="inputText">
              <div class="form-floating">
                <input type="text" id="code" name="code" class="form-control" id="floatingInput" placeholder="Lastname">
                <label for="floatingInput">Enter Secret Code</label>
              </div>
              </div>
              
            <button class="submit" type="submit">Submit</button>
    </form>
    </div>
</body>
</html>