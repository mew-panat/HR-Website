<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "elitebuild_user", "cpe231project", "elitebuild_cpe231project");

$result = $conn->query("SELECT s.staffID,s.fName, s.lName, m.accountNo, m.date, m.amount  
                        FROM staff s, monthlypayslip m
                        WHERE s.staffID = m.staffID 
                        ORDER BY m.date DESC");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"staffID":"'. $rs["staffID"]. '",'; 
    $outp .= '"fName":"'. $rs["fName"]. '",';
    $outp .= '"lName":"'. $rs["lName"]. '",';
    $outp .= '"accountNo":"'. $rs["accountNo"]. '",';
    $outp .= '"date":"'. $rs["date"]. '",';
    $outp .= '"amount":"'. $rs["amount"]. '"}'; 
}
$outp .= "]";

$conn->close();

echo($outp);
?>