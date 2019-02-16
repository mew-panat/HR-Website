<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "elitebuild_user", "cpe231project", "elitebuild_cpe231project");
//$conn = new mysqli("localhost", "root", "", "elitebuild_cpe231project");
$result = $conn->query("SELECT departmentID, departmentName, telNo, email, page FROM department;");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"departmentID":"'. $rs["departmentID"]. '",';
    $outp .= '"departmentName":"'. $rs["departmentName"]. '",';
    $outp .= '"telNo":"'. $rs["telNo"]. '",';
    $outp .= '"page":"'. $rs["page"];
    $outp .= '"}'; 
}
$outp .="]";

$conn->close();

echo($outp);
?>