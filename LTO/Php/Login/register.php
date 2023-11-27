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

$sourceQuery1 = "SELECT * FROM USERS WHERE ACCOUNTID = (SELECT MAX(ACCOUNTID) FROM USERS)";
    $results = sqlsrv_query($conn, $sourceQuery1);
    $rows = sqlsrv_fetch_array($results);
    if ($results === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    


    if ($rows === false || empty($rows)) { // Use $rows instead of $row
        $foreignkey = 100; // Assign 100 as the initial value
    } else {
        $foreignkey = $rows['USERID'] + 1; // Increment the foreign key
    }

$error_message = "";
$success_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : "";
    $lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : "";
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
                
                    $insert_query = "INSERT INTO USERS (EMAIL, PASSWORD, FIRSTNAME, LASTNAME, CREATIONDATE, USERID) 
                    VALUES ('$email', '$password', '$firstname', '$lastname', GETDATE(), $foreignkey)";
                    $insert_result = sqlsrv_query($conn, $insert_query);
                
                if ($insert_result === false) {
                    $error_message = "Error inserting user: " . print_r(sqlsrv_errors(), true);
                } else {
                    $success_message = "Registration successful! You can now log in.";
                    header("location: ../Login/login.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Login Page</title>
    <link rel="stylesheet" href="../../Style/register.css">
</head>
<body>
    <div class="wrapper">
        <div class="left">
        
        </div>
   
    <div class="container">
        <form action="" method="post">
            <h2>Create An Account</h2>
            <div class="inputText">
              <div class="form-floating">
                <input type="email" id="email" name="email" class="form-control" id="floatingInput" placeholder="Email">
                <label for="floatingInput">Email</label>
              </div>
              </div>
              
              <div class="inputText">
              <div class="form-floating">
                <input type="text" id="firstname" name="firstname" class="form-control" id="floatingInput" placeholder="Firstname">
                <label for="floatingInput">Firstname</label>
              </div>
            </div>
            <div class="inputText">
              <div class="form-floating">
                <input type="text" id="lastname" name="lastname" class="form-control" id="floatingInput" placeholder="Lastname">
                <label for="floatingInput">Lastname</label>
              </div>
            </div>

            <div class="inputText">
              <div class="form-floating">
                <input type="password" id="password" name="password" class="form-control" id="floatingInput" placeholder="Password">
                <label for="floatingInput">Password</label>
              </div>
            </div>
            <div class="inputText">
              <div class="form-floating">
                <input type="password" id="repeatpassword" name="repeatPassword" class="form-control" id="floatingInput" placeholder="Confirm password">
                <label for="floatingInput">Confirm Password</label>
              </div>
            </div>
           
            <button class="submit" type="submit">Register</button>
            <p>Already have an account? <a href="login.php">Login here</a></p>
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




