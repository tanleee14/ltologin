<?php
$serverName = "STANLEE\\SQLEXPRESS"; // Double backslash is needed for Windows authentication
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
    $query = "SELECT * FROM ADMIN WHERE ADMIN_USERNAME = ? AND ADMIN_PASSWORD = ?";
    $params = array($username, $password);
    
    $result = sqlsrv_query($conn, $query, $params);

    if ($result !== false) {
        $rows = sqlsrv_has_rows($result);

        if ($rows === true) {
            // Login successful
            header("Location: adminlanding.html");
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
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h2>Admin Login</h2>
    <form action="admin.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">Login</button>
        <p>User Login <a href="login.php">Login here</a></p>
    </form>
    <?php
            if (!empty($errorMessage)) {
                echo "<p style='color: red;'>$errorMessage</p>";
            }
            ?>
    </div>
</body>
</html>
