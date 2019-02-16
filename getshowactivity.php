<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "elitebuild_user", "cpe231project", "elitebuild_cpe231project");
//$conn = new mysqli("localhost", "root", "", "elitebuild_cpe231project");

$result = $conn->query("SELECT courseNo,courseName , date ,time
                        FROM trainingtopics");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"courseName":"'. $rs["courseName"]. '",';
    $outp .= '"courseNo":"'. $rs["courseNo"]. '",';
    $outp .= '"time":"'. $rs["time"]. '",';
    $outp .= '"date":"'. $rs["date"]. '"}'; 
}
//echo $time;
$outp .="]";

$conn->close();

echo($outp);
?>