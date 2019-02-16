<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//$conn = new mysqli("localhost", "root", "", "elitebuild_cpe231project");
$conn = new mysqli("localhost", "elitebuild_user", "cpe231project", "elitebuild_cpe231project");


$result = $conn->query("SELECT d.departmentName,AVG((t.endOT-t.startOT)/10000 ) AS AVGot FROM staff s,department d,position p,dailytimecard t WHERE s.id = p.id AND s.staffID = t.staffID AND p.departmentID = d.departmentID AND (t.endOT-t.startOT)/10000 > 0 GROUP BY p.departmentID , d.departmentID ORDER BY AVGot DESC;");
$outp = "[";

while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"departmentName":"'  . $rs["departmentName"] . '",';
    $outp .= '"AVGot":"'. $rs["AVGot"]     . '"}'; 
}
$outp .="]";

$conn->close();

echo($outp);
?>