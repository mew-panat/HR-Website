<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$host = "localhost";
$user = "elitebuild_user";
$password = "cpe231project";
$db = "elitebuild_cpe231project";


$conn = new mysqli($host, $user, $password, $db);

$result = $conn->query("SELECT s.CirPicture,s.fName,s.lName, d.departmentName
                        FROM staff s, department d, position p,extraincome e
                        WHERE s.staffID = e.staffID AND e.incomeTypeNo = 1
                        GROUP BY s.staffID
                        ORDER BY SUM(Amount) DESC
                        LIMIT 3;");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
  if ($outp != "[") {$outp .= ",";}
    $outp .= '{"CirPicture":"'  . $rs["CirPicture"] . '",';
    $outp .= '"fName":"'  . $rs["fName"] . '",';
    $outp .= '"lName":"'  . $rs["lName"] . '",';
    $outp .= '"departmentName":"'   . $rs["departmentName"]. '"}';
}
$outp .="]";

$conn->close();

echo($outp);
?>
