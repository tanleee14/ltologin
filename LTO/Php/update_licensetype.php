<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
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
        }

// Validate and sanitize user inputs
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


$sqlcall2 = "UPDATE CATEGORY_DETAILS 
             SET A = ?, B = ?, C = ?, D = ?, E = ?, F = ?, G = ?, H = ?, I = ?, J = ?, K = ?, L = ?, M = ?, N = ? , L1 = ? , L2 = ? , L3 = ? , L4 = ? , D1 = ? , D2 = ? , E1 = ? , E2 = ? , E3 = ? , E4 = ? , E5 = ? , E6 = ? 
             WHERE APPLICATIONID = IDENT_CURRENT('CATEGORY_DETAILS')"; // Replace 'some_condition' with your actual condition
$params2 = array($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $l1, $l2, $l3, $l4, $d1, $d2, $e1, $e2, $e3, $e4, $e5, $e6);
$sql2 = sqlsrv_prepare($conn, $sqlcall2, $params2);


if (sqlsrv_execute($sql2 )) {
    echo 'Registration success'."<br>"; 
} else {
    echo 'Error'."<br>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../Style/updateform.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="../Script/lto.js"></script>
    </head>
      <body>
      <form class="formbody" method="POST" action="update_licensetype.php">
      <div class="form-panel active first-panel">
      <div class="container mt-5 containerbody">
          <h4 class="mt-5"> TYPE OF APPLICATION(TOA)</h4>
          <form class="row g-12 formbody" id="ltoregistration" >
            <div class="row d-flex justify-content-center TOA">
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="NEW" id="A" name="A" onclick="handleCheckboxes()">
                        <label class="form-check-label" for="A">A.NEW</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="DELINQUENT" id="B" name="B">
                        <label class="form-check-label" for="B">B.DELINQUENT/DORMANT LICENSE</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="PROF TO NON PROF" id="C" name="C">
                        <label class="form-check-label" for="C">C.PROF TO NON-PROF</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="NON PROF TO PROF" id="D" name="D">
                        <label class="form-check-label" for="D">D.NON-PROF TO PROF</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="FOREIGN CONVERSION" id="E" name="E">
                        <label class="form-check-label" for="E">E.FOREIGN LIC.CONVERSION</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="F" name="RENEWAL" onclick="handleCheckboxes()">
                        <label class="form-check-label" for="F">F.RENEWAL</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="ADDITIONAL RESTRICTION CODE" id="G" name="G">
                        <label class="form-check-label" for="G">G.ADDITIONAL RESTRICTION CODE</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="DUPLICATION" id="H" name="H">
                        <label class="form-check-label" for="H">H.DUPLICATION</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="REVISION OF RECORDS" id="I" name="I">
                        <label class="form-check-label" for="I">I.REVISION OF RECORDS</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="CHANGE OF ADDRESS" id="J" name="J">
                        <label class="form-check-label" for="J">J.CHANGE OF ADDRESS</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="CHANGE CIVIL STATUS" id="K" name="K">
                        <label class="form-check-label" for="K">K.CHANGE CIVIL STATUS</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="CHANGE NAME" id="L" name="L">
                        <label class="form-check-label" for="L">L.CHANGE NAME</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="CHANGE DATE OF BIRTH" id="M" name="M">
                        <label class="form-check-label" for="M">M.CHANGE DATE OF BIRTH</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="OTHERS" id="N" name="N">
                        <label class="form-check-label" for="N">N.OTHERS</label>
                    </div>
                </div>
              </div>
              <div class="row d-flex justify-content-center TOA">
                <div class="col">
                  <h6>TYPE OF LICENSE APPLIED FOR</h6>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="License" id="L1" value="1">
                    <label class="form-check-label" for="L1">1.STUDENT PERMIT</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="License" id="L2" value="2">
                    <label class="form-check-label" for="L2">2.NON PROFESSIONAL</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="License" id="L3" value="3">
                    <label class="form-check-label" for="L3">3.PROFESSIONAL</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="License" id="L4" value="4">
                    <label class="form-check-label" for="L4">4.CONDUCTOR</label>
                </div>
                </div>
                
                <div class="col">
                  <h6>DRIVING SKILLS AQUIRED</h6>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="Skill" id="D1" value="1">
                    <label class="form-check-label" for="D1">1.DRIVING SCHOOL</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="Skill" id="D2" value="2">
                    <label class="form-check-label" for="D2">2.LICENSED PRIVATE PERSON</label>
                </div>
                </div>

                <div class="col">
                  <h6>EDUCATIONAL ATTAINMENT</h6>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="Education" id="E1" value="1">
                    <label class="form-check-label" for="E1">1.INFORMAL SCHOOL</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="Education" id="E2" value="2">
                    <label class="form-check-label" for="E2">2.ELEMENTARY</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="Education" id="E3" value="3">
                    <label class="form-check-label" for="E3">3.HIGHSCHOOL</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="Education" id="E4" value="4">
                    <label class="form-check-label" for="E4">4.VOCATIONAL</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="Education" id="E5" value="5">
                    <label class="form-check-label" for="E5">5.COLLEGE</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="Education" id="E6" value="6">
                    <label class="form-check-label" for="E6">6.POST GRADUATE</label>
                  </div>
                </div>
              </div>

              <div class="button">
            <input type="submit" class="submit" name="submit">
            <a class="submit" name="submit" href="update_licensetype_success.php">See Updated Data</a>
           </div>
          </form> 
      </div>
      </div>
      </form>
      </body>
</html>