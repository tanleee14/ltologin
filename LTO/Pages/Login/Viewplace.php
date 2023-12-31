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


    $province = isset($_POST["province"]) ? $_POST["province"] : "";
    $city = isset($_POST["city"]) ? $_POST["city"] : "";
    

    if (!empty($province) || !empty($city)) {
        $sql = "SELECT * 
        FROM USERS AS U
        INNER JOIN USERDATA AS US
        ON U.USERID = US.USERID 
        WHERE PROVINCE = ? OR CITY = ?";
        $params = array($province, $city);
        $results = sqlsrv_query($conn, $sql, $params);
    } else {
        $sql = "SELECT * 
        FROM USERS AS U
        INNER JOIN USERDATA AS US
        ON U.USERID = US.USERID ";
        $results = sqlsrv_query($conn, $sql);
    }




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    body{
        margin: 0;
        padding: 0;
    }
 
    .container{
       width: 100%;
       display: flex;
       align-items: center;
       justify-content: center;
    }
    .wrapper{
        display: flex;
        flex-grow: 2;

    }
    .left {
    display: flex;
    flex-grow: 0.02;
    height: 100vh;
    flex-direction: column;
    gap: 40px;
    text-align: justify;
    padding-left: 2%;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.4);
    background:white;
    }
    .labels{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: start;
        padding-top: 50px;
        gap: 30px;
    }
    a {
    text-decoration: none;
    font-size: 24px;
    color:black;
    transition: ease-in-out 1s;
    /* Removed text-align: justify; as it's not effective for single line links */
    }
    a:hover{
      
        transition: 0.5s;
    }
    .right{
        flex-grow: 1.5;
        display: flex;
        flex-direction: column; /* Changed to column */

    }
    .search{
        flex-grow: 0.5;
        width: 100%; /* Spans the full width */
        display: flex; /* Added display flex */
        align-items: end;
        justify-content: flex-start; /* Aligns content to the right */
        padding-bottom:10px;
        padding-left: 10px;
        
    }
    form{
        display: flex;
        width: 30%;
        gap: 20px;
        padding: 5px;
    }
    input{
        width:200%;
        height: 40px;
        border-radius: 20px;
    }
    .users{
        width: 100%; /* Spans the full width */
    }
    .info{
        display: flex;
        flex-direction: column;
    }
    .category, .details {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    
}

.category > div, .details > div {
    flex: 1; /* Adjusts each child to take equal width */
    text-align: center;
    flex-grow: 0.5; /* Center the text in each column */
 /* Optional: Adds padding inside each column for better spacing */
}

.box {
    background-color: #fff; /* Background color for the box */
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Shadow effect */
    margin: 10px; /* Space around each box */
    padding-top: 30px; /* Space inside the box */
    padding-bottom: 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap; /* Wrap items if they don't fit in one line */
}
.submit{
    background-color: #007BFF;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
}

.search{
    flex-grow: 0.5;
    
}

</style>

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
            </div>
            <div class="right">
            
                <div class="search">
                <form method="post" action="">
                        <input type="text" name="province" placeholder="Enter by Province">
                        <input type="text" name="city" placeholder="Enter by City">
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
                        <div><H4>Complete Address</H4></div>
                        </div>
                        

                     
                <?php
                
                while ($rows = sqlsrv_fetch_array($results)) {
                    $accountid = $rows['ACCOUNTID'];
                    $email = $rows['EMAIL'];
                    $password = $rows['PASSWORD'];
                    $firstname = $rows['FIRSTNAME'];
                    $lastname = $rows['LASTNAME'];
                    $street = $rows['STREET'];
                    $Province = $rows['PROVINCE'];
                    $city = $rows['CITY']; // Change $City to $city
                
                    echo '<div class="details box">
                        <div><h7>' . $accountid . '</h7></div>
                        <div><h7>' . $email . '</h7></div>
                        <div><h7>' . $password . '</h7></div>
                        <div><h7>' . $firstname . '</h7></div>
                        <div><h7>' . $lastname . '</h7></div>
                        <div><h7>' . $street . ', ' . $Province . ', ' . $city . '</h7></div>
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