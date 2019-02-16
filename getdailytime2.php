<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "elitebuild_user", "cpe231project", "elitebuild_cpe231project");

$result = $conn->query("SELECT Monthname(date) AS Month, COUNT(staffID) AS count
                        FROM dailytimecard d
                        WHERE  Monthname(date) is not null AND statusNo NOT IN (0)
                        GROUP BY Monthname(date)
                        ORDER BY Month(date) ");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"Month":"'   . $rs["Month"]        . '",';
    $outp .= '"count":"'   . $rs["count"]        . '"}';   
}
$outp .="]";

$conn->close();

echo($outp);
?>
