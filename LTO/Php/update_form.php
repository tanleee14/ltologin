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
        } else {
        }

// Validate and sanitize user inputs
$lastname = isset($_POST['Lastname']) ? trim(stripslashes(htmlspecialchars($_POST['Lastname']))) : '';
$firstname = isset($_POST['Firstname']) ? trim(stripslashes(htmlspecialchars($_POST['Firstname']))) : '';
$middlename = isset($_POST['Middlename']) ? trim(stripslashes(htmlspecialchars($_POST['Middlename']))) : '';
$street = isset($_POST['Street']) ? trim(stripslashes(htmlspecialchars($_POST['Street']))) : '';
$province = isset($_POST['Province']) ? trim(stripslashes(htmlspecialchars($_POST['Province']))) : '';
$city = isset($_POST['City']) ? trim(stripslashes(htmlspecialchars($_POST['City']))) : '';
$contact = isset($_POST['Contact']) ? trim(stripslashes(htmlspecialchars($_POST['Contact']))) : '';
$tin = isset($_POST['Tin']) ? trim(stripslashes(htmlspecialchars($_POST['Tin']))) : '';
$nationality = isset($_POST['Nationality']) ? trim(stripslashes(htmlspecialchars($_POST['Nationality']))) : '';
$gender = isset($_POST['Gender']) ? trim(stripslashes(htmlspecialchars($_POST['Gender']))) : '';
$birthdate = isset($_POST['Birthday']) ? trim(stripslashes(htmlspecialchars($_POST['Birthday']))) : '';
$height = isset($_POST['Height']) ? trim(stripslashes(htmlspecialchars($_POST['Height']))) : '';
$weight = isset($_POST['Weight']) ? trim(stripslashes(htmlspecialchars($_POST['Weight']))) : '';




// Update query
$sql = "UPDATE USERDATA SET LASTNAME = ?, FIRSTNAME = ? , MIDDLENAME = ? , STREET = ? , PROVINCE = ? , CITY = ?, CONTACT = ? , TIN = ? , NATIONALITY = ? , GENDER = ? , BIRTHDATE = ? , HEIGHT = ? , WEIGHT = ?  WHERE USERID = IDENT_CURRENT('USERDATA')";
$params = array($lastname, $firstname, $middlename, $street, $province, $city, $contact, $tin, $nationality, $gender, $birthdate, $height, $weight);

$sourceQuery1 = "SELECT * FROM USERDATA WHERE USERID = IDENT_CURRENT('USERDATA')";
$results = sqlsrv_query($conn, $sourceQuery1);


$stmt = sqlsrv_query($conn, $sql, $params);
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
} 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../Style/updateform.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="../Script/lto.js"></script>
    </head>
    <body id="body">
      <form class="formbody" id="ltoregistration" method="post" action="update_form.php">
      <div class="form-panel active first-panel">
        <h2>Update Registration Form</h2>
          <div class="row align-items-center justify-content-center">
            <div class="col-sm-3 inputText">
              <div class="form-floating">
                <input type="text" id="Lastname" name="Lastname" class="form-control" id="floatingInput" placeholder="Lastname">
                <label for="floatingInput">Lastname</label>
              </div>
              </div>
              
            <div class="col-sm-3 inputText">
              <div class="form-floating">
                <input type="text" id="Lastname" name="Firstname" class="form-control" id="floatingInput" placeholder="Firstname">
                <label for="floatingInput">Firstname</label>
              </div>
            </div>
      
            <div class="col-sm-3 inputText">
              <div class="form-floating">
                <input type="text" id="Lastname" name="Middlename" class="form-control" id="floatingInput" placeholder="Middlename">
                <label for="floatingInput">Middlename</label>
              </div>
            </div>
            </div>
      
            <div class="row align-items-center justify-content-center">
              <div class="col-sm-3 inputText">
                <div class="form-floating">
                  <input type="text" id="Street" name="Street" class="form-control" id="floatingInput" placeholder="Address">
                  <label for="floatingInput">Address</label>
                </div>
              </div>
              <div class="col-sm-3 inputText">
              <select name="Province" id="province-dropdown" class="form-select" style="font-size: medium;" onchange="showPlacesDropdown('province-dropdown','place-select')">
                  <option value="">SELECT A REGION</option>
                  <option value="NCR">METRO-MANILA</option>
                  <option value="CAVITE">CAVITE</option>
                  <option value="LAGUNA">LAGUNA</option>
                  <option value="BATANGAS">BATANGAS</option>
                  <option value="RIZAL">RIZAL</option>
                  <option value="QUEZON">QUEZON</option>
                </select>
              </div>
      
              <div class="col-sm-3 inputText">
                <select name="City" id="place-select" class="form-select" style="font-size: medium;">
                  <option value="">SELECT A CITY</option>
                </select>
              </div>
            </div>
            
          
          <div class="row d-flex align-items-center justify-content-center">
            <div class="col-sm-3 inputText">
              <div class="form-floating">
                <input type="tel" class="form-control" id="Contact" name="Contact" placeholder="Tel" pattern="[0-9]+" maxlength="11">
                <label for="floatingInput">Tel No.</label>
              </div>
            </div>
            <div class="col-sm-3 inputText">
              <div class="form-floating">
                <input type="tin" class="form-control" id="Tin" name="Tin" placeholder="Tin" pattern="\d{3}-\d{3}-\d{3}-\d{3}" maxlength="15">
                <label for="floatingInput">Tin (xxx-xxx-xxx-xxx)</label>
              </div>
            </div>
            <div class="col-sm-3 inputText">
              <select name="Nationality" class="form-select" style="font-size: medium;">
                <option value="">SELECT NATIONALITY</option>
                <option value="FILIPINO">FILIPINO</option>
                <option value="FOREIGNER">FOREIGNER</option>
                <option value="OTHERS">OTHERS</option>        
              </select>
            </div>
            </div>
          
            
            <div class="row align-items-center justify-content-center">
              <div class="col-sm-3 inputText">
                <div class="form-floating">
                  <input type="date" class="form-control" id="Birthday" name="Birthday" placeholder="Birthdate">
                  <label for="floatingInput">Birthday</label>
                </div>
              </div>
      
              <div class="col-sm-2 inputText">  
                <select name="Gender" class="form-select" style="font-size: medium;">
                  <option value="">SELECT GENDER</option>
                  <option value="M">MALE</option>
                  <option value="F">FEMALE</option>
                  <option value="N/A">UNDECIDED</option>
                </select>
              </div>
      
              <div class="col-sm-2 inputText">
                <div class="form-floating">
                  <input type="text" class="form-control" id="Height" name="Height" placeholder="Height">
                  <label for="floatingInput">Height</label>
                </div>
              </div>
      
              <div class="col-sm-2 inputText">
                <div class="form-floating">
                  <input type="text" class="form-control" id="Weight" name="Weight" placeholder="Weight">
                  <label for="floatingInput">Weight</label>
                </div>
              </div>
            </div>
            <div class="button">
            <a class="submit" name="submit" href="update_success.php">Submit and See Updated Data</a>
           </div>
            </div>           
        </form>
    </body>
</html>


