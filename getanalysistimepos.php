<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//$conn = new mysqli("localhost", "root", "", "elitebuild_cpe231project");
$conn = new mysqli("localhost", "elitebuild_user", "cpe231project", "elitebuild_cpe231project");
$result = $conn->query("SELECT p.positionName,AVG((t.endtime-t.starttime)/10000 ) AS AVGtime
FROM department d,staff s,position p,dailytimecard t
 WHERE s.id = p.id AND s.staffID = t.staffID
GROUP BY p.positionName;");
$outp = "[";

while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"positionName":"'  . $rs["positionName"] . '",';
    $outp .= '"AVGtime":"'. $rs["AVGtime"]     . '"}'; 
}
$outp .="]";

$conn->close();

echo($outp);
?>