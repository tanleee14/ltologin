<?php   
        if (isset($_POST['submit'])) {
            // Check if the form was submitted
            $username = $_POST['username'];
            $password = $_POST['password'];

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

            // Use prepared statements to avoid SQL injection
            $sql = "SELECT User_Email, Password, Name FROM registration WHERE User_Email = ? AND Password = ?";
            $params = array($username, $password);
            $sql1 = sqlsrv_query($conn, $sql, $params);

            if ($sql1 === false) {
                die(print_r(sqlsrv_errors(), true));
            }

            // Check if a row with the given username and password exists in the database
            $row = sqlsrv_fetch_array($sql1, SQLSRV_FETCH_ASSOC);

            if ($row) {
                header("Location:success.php");
                echo "$username";
                exit;
            } else {
                // Check if the username exists in the database
                $checkUsernameSql = "SELECT User_Email FROM registration WHERE User_email = ?";
                $params = array($username);
                $checkUsernameQuery = sqlsrv_query($conn, $checkUsernameSql, $params);

                if (sqlsrv_has_rows($checkUsernameQuery)) {
                    // Username is correct, but password is incorrect
                    echo "Incorrect password";
                } else {
                    // Username does not exist
                    echo "Username does not exist";
                }
            }

            sqlsrv_close($conn);
        }

        ?>

    <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login Page</title>
        </head>
        <body>
            <h1>Welcome</h1>
            <h1>Enter your login credentials</h1>
            <form action="success.php" method="post">
                <label for="username" name="user">Username</label>
                <input type="text" name="username"><br><br>
                <label for="password" name="password">Password</label>
                <input type="password" name="password"><br><br>
                <input type="submit" name="submit" value="Login">
            </form>
        </body>
        </html>

    
       