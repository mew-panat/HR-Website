<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "elitebuild_user", "cpe231project", "elitebuild_cpe231project");

$result = $conn->query("SELECT staffID, fName, lName,s.telNo,s.email, p.positionName,d.departmentName 
                        FROM staff s ,position p,department d
                        WHERE s.ID = p.ID AND p.departmentID = d.departmentID AND d.departmentID = 2003;");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"staffID":"'. $rs["staffID"]. '",';
    $outp .= '"fName":"'. $rs["fName"]. '",';
    $outp .= '"lName":"'. $rs["lName"]. '",';
    $outp .= '"telNo":"'. $rs["telNo"]. '",';
    $outp .= '"email":"'. $rs["email"]. '",';
    $outp .= '"positionName":"'. $rs["positionName"]. '",';
    $outp .= '"departmentName":"'. $rs["departmentName"]. '"}'; 
}
$outp .="]";

$conn->close();

echo($outp);
?>