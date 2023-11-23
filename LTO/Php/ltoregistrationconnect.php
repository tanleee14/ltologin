    <?php

    $lastnameERR ="";
    $firstnameERR ="";
    $streetERR ="";
    $provinceERR ="";
    $placeERR ="";
    $province2ERR ="";
    $place2ERR ="";
    $contactERR ="";
    $tinERR = "";
    $nationalityERR = "";
    $genderERR ="";
    $checkboxERR = "";
    $licenseERR = "";
    $skillERR ="";
    $educationERR = "";
    $bloodtypeERR = "";
    $statusERR= "";
    $hairERR= "";
    $eyesERR = "";
    $builtERR = "";
    $complexionERR = "";
    $birthplaceERR = "";
    $contactlenERR = "";
    $birthdateERR = "";


    if(empty($_POST['Lastname'])){
        $lastnameERR="Lastname is required";
    }
    if(empty($_POST['Firstname'])){
        $firstnameERR="Firstname is required";
    }
    if(empty($_POST['Street'])){
        $streetERR="Address is required";
    }
    if(empty($_POST['Province'])){
        $provinceERR="Province is required";
    }
    if(empty($_POST['City'])){
        $placeERR="City is required";
    }
    if(empty($_POST['Contact'])){
        $contactERR="Contact is required";
    }
    if(isset($_POST['Contact']) && strlen($_POST['Contact']) != 11){
        $contactlenERR = "Enter 11 digits";
    }
    if(empty($_POST['Tin'])){
        $tin="000-000-000-000";
    }else{
        $tin = $_POST['Tin'];
    }
    if(empty($_POST['Nationality'])){
        $nationalityERR="Nationality is required";
    }
    if(empty($_POST['Gender'])){
        $genderERR="Gender is required";
    }

    if(empty($_POST['Birthday'])){
        $birthdateERR="Birthday is required";
    }

    if (
        empty($_POST['A']) &&
        empty($_POST['B']) &&
        empty($_POST['C']) &&
        empty($_POST['D']) &&
        empty($_POST['E']) &&
        empty($_POST['F']) &&
        empty($_POST['G']) &&
        empty($_POST['H']) &&
        empty($_POST['I']) &&
        empty($_POST['J']) &&
        empty($_POST['K']) &&
        empty($_POST['L']) &&
        empty($_POST['M']) &&
        empty($_POST['N'])
    ) {
        $checkboxERR = "At least one checkbox must be selected for TOA";
    }

    if(empty($_POST['bloodtype'])){
        $bloodtypeERR="Bloodtype is required";
    }
    if (!isset($_POST['License'])) {
        $licenseERR = "License type is required";
    }
    if (!isset($_POST['Skill'])) {
        $skillERR = "Skill is required";
    }
    if (!isset($_POST['Education'])) {
        $educationERR = "Education is required";
    }
    if (!isset($_POST['status'])) {
        $statusERR = "Choose Status";
    }
    if (!isset($_POST['hair'])) {
        $hairERR = "Choose hair color";
    }
    if (!isset($_POST['eyes'])) {
        $eyesERR = "Choose eye color";
    }
    if (!isset($_POST['built'])) {
        $builtERR = "Choose one built type";
    }
    if (!isset($_POST['complexion'])) {
        $complexionERR = "Choose body complexion";
    }
    if(empty($_POST['birthplace'])){
        $birthplaceERR="Birthplace is required";
    }

    //Default Juan Dela Cruz
    if (empty($_POST['fathersfirst'])) {
            $fathersfirstname = "Juan";
    } else {
            $fathersfirstname = $_POST['fathersfirst'];
    }
        
    if (empty($_POST['fatherslast'])) {
            $fatherslastname = "Cruz";
    } else {
            $fatherslastname = $_POST['fatherslast'];
    }
        
    if (empty($_POST['fathersmiddle'])) {
            $fathersmiddlename = "Dela";
    } else {
            $fathersmiddlename = $_POST['fathersmiddle'];
    }

    //Default Maria Dela Cruz
    if (empty($_POST['mothersfirst'])) {
        $mothersfirstname = "Maria";
    } else {
        $mothersfirstname = $_POST['mothersfirst'];
    }

    if (empty($_POST['motherslast'])) {
        $motherslastname = "Cruz";
    } else {
        $motherslastname = $_POST['motherslast'];
    }

    if (empty($_POST['mothersmiddle'])) {
        $mothersmiddlename = "Dela";
    } else {
        $mothersmiddlename = $_POST['mothersmiddle'];
    }

    //Default Juan  Dela Cruz
    if (empty($_POST['spousefirst'])) {
        $spousefirstname = "Juan";
    } else {
        $spousefirstname = $_POST['spousefirst'];
    }

    if (empty($_POST['spouselast'])) {
        $spouselastname = "Cruz";
    } else {
        $spouselastname = $_POST['spouselast'];
    }

    if (empty($_POST['spousemiddle'])) {
        $spousemiddlename = "Dela";
    } else {
        $spousemiddlename = $_POST['spousemiddle'];
    }

    //Default Juan Dela Cruz
    if (empty($_POST['Firstnameprev'])) {
        $prevfirstname = "Juan";
    } else {
        $prevfirstname = $_POST['Firstnameprev'];
    }

    if (empty($_POST['Lastnameprev'])) {
        $prevlastname = "Cruz";
    } else {
        $prevlastname = $_POST['Lastnameprev'];
    }

    if (empty($_POST['Middlenameprev'])) {
        $prevmiddlename = "Dela";
    } else {
        $prevmiddlename = $_POST['Middlenameprev'];
    }

    //Employer info
    if (empty($_POST['businessname'])) {
        $businessname = "ABC Corp.";
    } else {
        $businessname=$_POST['businessname'];
    }

    if (empty($_POST['buscont'])) {
        $businesscontact = "99999999999";
    } else {
        $businesscontact=$_POST['buscont'];
    }

    if (empty($_POST['businessadd'])) {
        $businessaddress = "ABC Street";
    } else {
        $businessaddress=$_POST['businessadd'];
    }

    if (empty($_POST['Province2'])) {
        $province2 = "ABC Province";
    } else {
        $province2 = $_POST['Province2'];
    }

    if (empty($_POST['City2'])) {
        $place2 = "ABC City";
    } else {
        $place2 = $_POST['City2'];
    }

    if (empty($_POST['Middlename'])) {
        $middlename = "None";
    } else {
        $middlename = $_POST['Middlename'];
    }

    ?>


    <?php
    if (isset($_POST['submit'])) {
    if (isset($_POST['submit'])) {
            if ($firstnameERR == "" && $lastnameERR == "" && $streetERR == "" && $provinceERR == "" && $placeERR == "" &&
                $contactERR == ""  && $nationalityERR == "" && $genderERR == "" &&
                $checkboxERR == "" && $licenseERR == "" && $skillERR == "" && $educationERR == ""  && $bloodtypeERR == ""  && $statusERR == ""  && $hairERR == ""  && $eyesERR == ""  && $builtERR == ""  && $complexionERR == ""  && $birthplaceERR == "" && $contactlenERR=="" && $birthdateERR== "") {

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
        echo 'Connection Success'."<br>";
        header("Location: ../Pages/review.html");
        }

        $lastname = $_POST['Lastname'];
        $firstname = $_POST['Firstname'];
        $street = $_POST['Street'];
        $province = $_POST['Province'];
        $place = $_POST['City'];
        $contact = $_POST['Contact'];
        $nationality = $_POST['Nationality'];
        $gender = $_POST['Gender'];
        $height = $_POST['Height'];
        $birthdate = $_POST['Birthday'];
        $weight = $_POST['Weight'];
        $a = isset($_POST['A']) ? $_POST['A'] : 0;
        $b = isset($_POST['B']) ? $_POST['B'] : 0;
        $c = isset($_POST['C']) ? $_POST['C'] : 0;
        $d = isset($_POST['D']) ? $_POST['D'] : 0;
        $e = isset($_POST['E']) ? $_POST['E'] : 0;
        $f = isset($_POST['F']) ? $_POST['F'] : 0;
        $g = isset($_POST['G']) ? $_POST['G'] : 0;
        $h = isset($_POST['H']) ? $_POST['H'] : 0;
        $i = isset($_POST['I']) ? $_POST['I'] : 0;
        $j = isset($_POST['J']) ? $_POST['J'] : 0;
        $k = isset($_POST['K']) ? $_POST['K'] : 0;
        $l = isset($_POST['L']) ? $_POST['L'] : 0;
        $m = isset($_POST['M']) ? $_POST['M'] : 0;
        $n = isset($_POST['N']) ? $_POST['N'] : 0;
        $l1 = isset($_POST['License']) && $_POST['License'] === '1' ? 1 : 0;
        $l2 = isset($_POST['License']) && $_POST['License'] === '2' ? 1 : 0;
        $l3 = isset($_POST['License']) && $_POST['License'] === '3' ? 1 : 0;
        $l4 = isset($_POST['License']) && $_POST['License'] === '4' ? 1 : 0;
        $d1 = isset($_POST['Skill']) && $_POST['Skill'] === '1' ? 1 : 0;
        $d2 = isset($_POST['Skill']) && $_POST['Skill'] === '2' ? 1 : 0;
        $e1 = isset($_POST['Education']) && $_POST['Education'] === '1' ? 1 : 0;
        $e2 = isset($_POST['Education']) && $_POST['Education'] === '2' ? 1 : 0;
        $e3 = isset($_POST['Education']) && $_POST['Education'] === '3' ? 1 : 0;
        $e4 = isset($_POST['Education']) && $_POST['Education'] === '4' ? 1 : 0;
        $e5 = isset($_POST['Education']) && $_POST['Education'] === '5' ? 1 : 0;
        $e6 = isset($_POST['Education']) && $_POST['Education'] === '6' ? 1 : 0;
        $bloodtype = $_POST['bloodtype'];
        $organdonor = $_POST['organdonor'];
        $civilstatus = $_POST['status'];
        $hair = $_POST['hair'];
        $eyes = $_POST['eyes'];
        $built = $_POST['built'];
        $complexion = $_POST['complexion'];
        $birthplace=$_POST['birthplace'];
        

        // Sanitize user input and use prepared statements to prevent SQL injection 

        $sourceQuery1 = "SELECT MAX(USERID) AS LatestUserID FROM USERDATA"; 
        $sourceResult1 = sqlsrv_query($conn, $sourceQuery1);

        //for user ID
        if ($sourceResult1 === false) {
        die(print_r(sqlsrv_errors(), true));
        }

        $row1 = sqlsrv_fetch_array($sourceResult1, SQLSRV_FETCH_ASSOC);
        $latestUserID = $row1['LatestUserID'];
    
        if ($latestUserID === null) {
            $userID = 100;
        } else {
            $userID = $latestUserID + 1;
        }

        // For applicationID
        $sourceQuery2 = "SELECT MAX(APPLICATIONID) AS LatestApplicationID FROM CATEGORY_DETAILS"; 
        $Resultappid = sqlsrv_query($conn, $sourceQuery2);

        if ($Resultappid === false) {
        die(print_r(sqlsrv_errors(), true));
        }

        $row2 = sqlsrv_fetch_array($Resultappid, SQLSRV_FETCH_ASSOC);
        $latestApplicationID = $row2['LatestApplicationID'];
    
        if ($latestApplicationID === null) {
            $applicationID = 200;
        } else {
            $applicationID = $latestApplicationID + 1;
        }

        

        //INSERT DATA FOR USERDATA
        $sqlcall1 = "INSERT INTO USERDATA (LASTNAME, FIRSTNAME, MIDDLENAME, STREET, PROVINCE, CITY, CONTACT, TIN, NATIONALITY, GENDER, BIRTHDATE, HEIGHT, WEIGHT) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params1 = array($lastname, $firstname, $middlename, $street, $province, $place, $contact, $tin, $nationality, $gender, $birthdate, $height, $weight );
        $sql1 = sqlsrv_prepare($conn, $sqlcall1, $params1);


        //INSERT DATA FOR CATEGORY_DETAILS
        $sqlcall2 = "INSERT INTO CATEGORY_DETAILS (A, B, C, D, E, F, G, H, I, J, K, L, M, N, L1, L2, L3, L4, D1, D2, E1, E2, E3, E4, E5, E6, USERID) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params2 = array(
        $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $l1, $l2, $l3, $l4, $d1, $d2, $e1, $e2, $e3, $e4, $e5, $e6, $userID);
        $sql2 = sqlsrv_prepare($conn, $sqlcall2, $params2);


        //INSERT DATA FOR USERBIO
        $sqlcall3 = "INSERT INTO USERBIO (BLOODTYPE, ORGANDONOR, CIVILSTATUS, HAIR, EYES, BUILT, COMPLEXION, USERID, APPLICATIONID,FATHERSLASTNAME,FATHERSFIRSTNAME,FATHERSMIDDLENAME,MOTHERSLASTNAME,MOTHERSFIRSTNAME,MOTHERSMIDDLENAME,SPOUSELASTNAME,SPOUSEFIRSTNAME,SPOUSEMIDDLENAME,BIRTHPLACE) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?,?,?,?,?,?,?)";

        $params3 = array($bloodtype, $organdonor, $civilstatus, $hair, $eyes, $built, $complexion, $userID, $applicationID,
        $fatherslastname, $fathersfirstname, $fathersmiddlename,
        $motherslastname, $mothersfirstname, $mothersmiddlename,
        $spouselastname, $spousefirstname, $spousemiddlename,
        $birthplace
        );
        $sql3 = sqlsrv_prepare($conn, $sqlcall3, $params3);

        //INSERT DATA FOR WORK

        $sqlcall4 = "INSERT INTO WORK (BUSINESSNAME, BUSINESSCONTACT, BUSINESSADDRESS, CITY, PROVINCE, PREVLASTNAME, PREVFIRSTNAME, PREVMIDDLENAME, USERID) VALUES (?, ?,?,?, ?, ?, ?, ?, ?)";

        $params4 = array( $businessname, $businesscontact, $businessaddress,$place2,$province2,
            $prevlastname, $prevfirstname, $prevmiddlename,
            $userID);
        $sql4 = sqlsrv_prepare($conn, $sqlcall4, $params4);


        if (sqlsrv_execute($sql1 )) {
            echo 'Registration success'."<br>";
        } else {
            echo 'Error'."<br>";
        }
        if (sqlsrv_execute($sql2 )) {
            echo 'Registration success'."<br>"; 
        } else {
            echo 'Error'."<br>";
        }
        
        if (sqlsrv_execute($sql3 )) {
            echo 'Registration success'."<br>";
            } else {
            echo 'Error'."<br>";
            }
        if (sqlsrv_execute($sql4 )) {
            echo 'Registration success';
            } else {
            echo 'Error'."<br>";
            }       

        }
        echo $firstnameERR."<br>";
        echo $lastnameERR."<br>";
        echo $streetERR."<br>";
        echo $provinceERR."<br>";
        echo $placeERR."<br>";  
        echo $contactERR."<br>";
        echo $contactlenERR."<br>";
        echo $nationalityERR."<br>";
        echo $genderERR."<br>";
        echo $checkboxERR."<br>";
        echo $licenseERR."<br>";
        echo $skillERR."<br>";
        echo $educationERR."<br>";
        echo $bloodtypeERR."<br>";
        echo $statusERR."<br>";
        echo $hairERR."<br>";
        echo $eyesERR."<br>";
        echo $builtERR."<br>";
        echo $complexionERR."<br>";
        echo $birthplaceERR."<br>";
        echo $birthdateERR."<br>";
    }
    }
    ?>