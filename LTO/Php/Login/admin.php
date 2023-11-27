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
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Prepare and execute the SQL query with parameters
    $query = "SELECT * FROM ADMIN WHERE ADMIN_EMAIL = ? AND ADMIN_PASSWORD = ?";
    $params = array($username, $password);
    
    $result = sqlsrv_query($conn, $query, $params);

    if ($result !== false) {
        $rows = sqlsrv_has_rows($result);

        if ($rows === true) {
            // Login successful
            header("Location: ../../Pages/Login/adminlanding.php");
            exit(); // Ensure that no further output is sent
        } else {
            // Login failed
            $errorMessage = "Incorrect username or password.";
        }

        sqlsrv_free_stmt($result);
    } else {
        echo "Error executing query: " . print_r(sqlsrv_errors(), true);
    }
}

// Close connection
sqlsrv_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Login Page</title>
    <link rel="stylesheet" href="../../Style/admin.css">
</head>
<body>
    <div class="wrapper">
        <div class="left">
        <div class="content">
            <h1 style="color:black">Welcome Back!</h1>
            <h6>Create An Admin Account Here</h6>
            <button class="signup"><a href="admin_register.php">Signup</a></button>
            </div>
        </div>
   
    <div class="container">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Land_Transportation_Office.svg/2048px-Land_Transportation_Office.svg.png" alt="">
        <form action="" method="post">
            <h2>Admin Login</h2>
            <div class="inputText">
              <div class="form-floating">
                <input type="email" id="email" name="username" class="form-control" id="floatingInput" placeholder="Lastname">
                <label for="floatingInput">Email</label>
              </div>
              </div>
              
            <div class="inputText">
              <div class="form-floating">
                <input type="password" id="password" name="password" class="form-control" id="floatingInput" placeholder="password">
                <label for="floatingInput">Password</label>
              </div>
            </div>
            <button class="submit" type="submit">Login</button>
        </form>
        <!-- Display error message for incorrect email or password -->
        <?php
        if (!empty($errorMessage)) {
            echo "<p style='color: red;'>$errorMessage</p>";
        }
        ?>
        </div>
    </div>
</body>
</html>
