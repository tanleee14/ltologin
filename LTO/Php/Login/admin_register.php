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

$error_message = "";
$success_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : "";
    $lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $repeatPassword = isset($_POST["repeatPassword"]) ? $_POST["repeatPassword"] : "";
    $randomNumberMt = mt_rand(1000, 10000);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid Email";
    } elseif ($password !== $repeatPassword) {
        $error_message = "Passwords do not match";
    } else {
        $check_query = "SELECT * FROM ADMIN WHERE ADMIN_EMAIL='$email'";
        $check_result = sqlsrv_query($conn, $check_query);

        if ($check_result === false) {
            $error_message = "Error checking email availability: " . print_r(sqlsrv_errors(), true);
        } else {
            if (sqlsrv_has_rows($check_result)) {
                $error_message = "Email already taken. Please choose a different one.";
            } else {
                $insert_query = "INSERT INTO ADMIN (ADMIN_EMAIL, ADMIN_PASSWORD, ADMIN_FIRSTNAME, ADMIN_LASTNAME, CREATIONDATE, ADMIN_CODE) 
                VALUES ('$email', '$password', '$firstname', '$lastname', GETDATE(), '$randomNumberMt')";
                $insert_result = sqlsrv_query($conn, $insert_query);
                if ($insert_result === false) {
                    $error_message = "Error inserting user: " . print_r(sqlsrv_errors(), true);
                } else {
                    $success_message = "Registration successful! You can now log in.";
                }
                header("location: ../Login/admin.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Login Page</title>
    <link rel="stylesheet" href="../../Style/registerpagestyle.css">
</head>
<body>
    <div class="wrapper">
        <div class="left">
        
        </div>
   
    <div class="container">
        <form action="" method="post">
            <h2>Create Admin Account</h2>
            <div class="inputText">
              <div class="form-floating">
                <input type="email" id="email" name="email" class="form-control" id="floatingInput" placeholder="Lastname">
                <label for="floatingInput">Email</label>
              </div>
              </div>
              
              <div class="inputText">
              <div class="form-floating">
                <input type="text" id="firstname" name="firstname" class="form-control" id="floatingInput" placeholder="password">
                <label for="floatingInput">Firstname</label>
              </div>
            </div>
            <div class="inputText">
              <div class="form-floating">
                <input type="text" id="lastname" name="lastname" class="form-control" id="floatingInput" placeholder="password">
                <label for="floatingInput">Lastname</label>
              </div>
            </div>

            <div class="inputText">
              <div class="form-floating">
                <input type="password" id="password" name="password" class="form-control" id="floatingInput" placeholder="password">
                <label for="floatingInput">Password</label>
              </div>
            </div>
            <div class="inputText">
              <div class="form-floating">
                <input type="password" id="repeatpassword" name="repeatPassword" class="form-control" id="floatingInput" placeholder="password">
                <label for="floatingInput">Confirm Password</label>
              </div>
            </div>
           
            <button class="submit" type="submit">Register</button>
            <p>Already have an account? <a href="admin.php" style="">Admin Login</a></p>
        </form>
        <!-- Display error message for incorrect email or password -->
        <?php
            if (!empty($error_message)) {
                echo "<p style='color: red;'>$error_message</p>";
            }

            // Display success message here
            if (!empty($success_message)) {
                echo "<p style='color: green;'>$success_message</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>



