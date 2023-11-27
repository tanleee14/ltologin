<?php
$serverName = "LAPTOP-H96FD3CI\\SQLEXPRESS";
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
        header("Location: ../../Pages/Login/homepage.html");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Login Page</title>
    <link rel="stylesheet" href="../../Style/loginpagestyle.css">
</head>
<body>
    <div class="wrapper">
        <div class="left">
            <div class="content">
            <h1 style="color:black">Welcome Back!</h1>
            <h6>We are so happy to have you here</h6>
            <p>Don't have an account?</p>
            <button class="signup"><a href="register.php">Signup</a></button>
            </div>
        </div>
   
    <div class="container">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Land_Transportation_Office.svg/2048px-Land_Transportation_Office.svg.png" alt="Lto Logo">
        <form action="login.php" method="post">
            <h2>Login</h2>
            <div class="inputText">
              <div class="form-floating">
                <input type="email" id="email" name="email" class="form-control" id="floatingInput" placeholder="Lastname">
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
            <p>Admin Login ? <a href="../Login/admin_verify.php" style="color:#2980b9">Login in here</a></p>   
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
