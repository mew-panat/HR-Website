<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$host = "localhost";
$user = "elitebuild_user";
$password = "cpe231project";
$db = "elitebuild_cpe231project";



$conn = new mysqli($host, $user, $password, $db);

$result = $conn->query("SELECT s.fName, d.departmentName, d.telNo, s.picture
                        FROM staff s, department d, position p
                        WHERE   d.departmentID = p.departmentID AND
	                            p.id = s.id AND
                                p.positionName = 'Manager';");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"picture":"'  . $rs["picture"] . '",';
    $outp .= '"fName":"'  . $rs["fName"] . '",';
    $outp .= '"departmentName":"'   . $rs["departmentName"]        . '",';
    $outp .= '"telNo":"'. $rs["telNo"]     . '"}'; 
}
$outp .="]";

$conn->close();

echo($outp);
?>