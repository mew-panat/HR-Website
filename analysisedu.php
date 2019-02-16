<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "elitebuild_user", "cpe231project", "elitebuild_cpe231project");

$result = $conn->query("SELECT DISTINCT e.universityName,COUNT(e.staffID)AS countstaff FROM educationalhistory e GROUP BY e.universityName");
$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"universityName":"'  . $rs["universityName"] . '",';
     $outp .= '"countstaff":"'. $rs["countstaff"]     . '"}'; 
}
$outp .="]";

$conn->close();
echo($outp);
?>