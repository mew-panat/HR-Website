<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$conn = new mysqli("localhost", "elitebuild_user", "cpe231project", "elitebuild_cpe231project");
//$conn = new mysqli("localhost", "root", "", "elitebuild_cpe231project");

$result = $conn->query("SELECT i.Name,SUM(e.Amount) AS Amount FROM incometype i,extraincome e WHERE i.incomeTypeNo = e.incomeTypeNo GROUP BY i.incomeTypeNo , e.incomeTypeNo;");
$outp = "[";

while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"Name":"'  . $rs["Name"] . '",';
    $outp .= '"Amount":"'. $rs["Amount"]     . '"}'; 
}
$outp .="]";

$conn->close();

echo($outp);
?>