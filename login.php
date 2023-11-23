<?php
$serverName = "STANLEE\SQLEXPRESS";
$connectionOptions = [
    "Database" => "WEBAPP",
    "Uid" => "",
    "PWD" => ""
];

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Initialize error message
$errorMessage = "";

// Handle login

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

    // Check if the email and password match
    $login_query = "SELECT * FROM USERS WHERE EMAIL='$email' AND PASSWORD='$password'";
    $login_result = sqlsrv_query($conn, $login_query);

    if (sqlsrv_has_rows($login_result)) {
        // Successful login, redirect to homepage.html
        header("Location: homepage.html");
        exit();
    } else {
        // Incorrect email or password
        $errorMessage = "Incorrect email or password.";
    }
}

sqlsrv_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="login.php" method="post">
            <h2>Login</h2>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <!-- Display error message for incorrect email or password -->
        <?php
        if (!empty($errorMessage)) {
            echo "<p style='color: red;'>$errorMessage</p>";
        }
        ?>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
        <p>Admin Login <a href="admin.php">Login in here</a></p>
    </div>
</body>
</html>
