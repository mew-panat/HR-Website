<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//$conn = new mysqli("localhost", "root", "", "elitebuild_cpe231project");
$conn = new mysqli("localhost", "elitebuild_user", "cpe231project", "elitebuild_cpe231project");
$departmentName=$_GET['departmentName'];

$result = $conn->query("SELECT DISTINCT positionName
                         FROM position
                         WHERE departmentID = (SELECT departmentID
                                               FROM department
                                               WHERE departmentName = '$departmentName');");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"positionName":"'. $rs["positionName"]. '"}'; 
}
$outp .= "]";

$conn->close();

echo($outp);
?>