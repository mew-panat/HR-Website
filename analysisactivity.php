<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "elitebuild_user", "cpe231project", "elitebuild_cpe231project");
//$conn = new mysqli("localhost", "root", "", "elitebuild_cpe231project");

$result = $conn->query("SELECT DISTINCT t.courseNo ,p.courseName,  COUNT(t.staffID) AS countstaff FROM training t,trainingtopics p WHERE p.courseNo=t.courseNo GROUP BY courseNo  ORDER BY COUNT(t.staffID)  DESC LIMIT 3");
$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"courseName":"'  . $rs["courseName"] . '",';
     $outp .= '"countstaff":"'. $rs["countstaff"]     . '"}'; 
}
$outp .="]";

$conn->close();
echo($outp);
?>