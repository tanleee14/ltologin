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

$error_message = "";
$success_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $repeatPassword = isset($_POST["repeatPassword"]) ? $_POST["repeatPassword"] : "";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid Email";
    } elseif ($password !== $repeatPassword) {
        $error_message = "Passwords do not match";
    } else {
        $check_query = "SELECT * FROM USERS WHERE EMAIL='$email'";
        $check_result = sqlsrv_query($conn, $check_query);

        if ($check_result === false) {
            $error_message = "Error checking email availability: " . print_r(sqlsrv_errors(), true);
        } else {
            if (sqlsrv_has_rows($check_result)) {
                $error_message = "Email already taken. Please choose a different one.";
            } else {
                $insert_query = "INSERT INTO USERS (EMAIL, PASSWORD) VALUES ('$email', '$password')";
                $insert_result = sqlsrv_query($conn, $insert_query);

                if ($insert_result === false) {
                    $error_message = "Error inserting user: " . print_r(sqlsrv_errors(), true);
                } else {
                    $success_message = "Registration successful! You can now log in.";

                    echo "<script>
                            setTimeout(function() {
                                window.location.href='login.php';
                            }, 5000); // Redirect after 5 seconds
                          </script>";
                }
            }
        }
    }
}

sqlsrv_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an Account</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <img src="src/kap.jpg" alt="kap" class="pic">
    <div class="container">
        <form action="register.php" method="post">
            <h2>Create an Account</h2>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <label for="repeatPassword">Repeat Password:</label>
            <input type="password" name="repeatPassword" required>
            <button type="submit">Register</button>
            <!-- Display error message here -->
            <?php
            if (!empty($error_message)) {
                echo "<p style='color: red;'>$error_message</p>";
            }

            // Display success message here
            if (!empty($success_message)) {
                echo "<p style='color: green;'>$success_message</p>";
            }
            ?>

            <p>Already have an account? <a href="login.php">Login here</a></p>
        </form>
    </div>
</body>
</html>



