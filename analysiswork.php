<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "elitebuild_user", "cpe231project", "elitebuild_cpe231project");
//$conn = new mysqli("localhost", "root", "", "elitebuild_cpe231project");

$result = $conn->query("SELECT w.staffID, fName, lName, SUM( YEAR( endDate ) - YEAR( startDate ) ) AS countyear
                        FROM workhistory w, staff s
                        WHERE s.staffID = w.staffID
                        GROUP BY staffID
                        HAVING SUM( YEAR( endDate ) - YEAR( startDate ) ) > 0
                        ORDER BY SUM( YEAR( endDate ) - YEAR( startDate ) ) DESC
                        LIMIT 5");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"staffID":"'. $rs["staffID"]. '",';
    $outp .= '"fName":"'. $rs["fName"]. '",';
    $outp .= '"lName":"'. $rs["lName"]. '",';
    $outp .= '"countyear":"'. $rs["countyear"]. '"}'; 
}
$outp .="]";

$conn->close();

echo($outp);
?>