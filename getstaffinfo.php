<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "elitebuild_user", "cpe231project", "elitebuild_cpe231project");
//$conn = mysqli_connect('localhost', 'root', '', 'cpe231project');

$username = $_SESSION['username'];
$date = date("Y-m-d");
$result = $conn->query("SELECT *,s.telNo AS tel,TIMESTAMPDIFF (YEAR, DOB, CURDATE()) AS age,
                        (CASE WHEN gender = 'm' THEN 'Male' WHEN gender = 'f' THEN 'Female' END) AS sex
                        FROM loginform lf, staff s, position p,department d                        
                        WHERE '$username' = s.email AND
                              lf.staffID = s.staffID AND
                              p.id = s.id AND
                              d.departmentID = p.departmentID;");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"staffID":"'. $rs["staffID"]. '",';
    $outp .= '"positionName":"'. $rs["positionName"]. '",';
    $outp .= '"departmentName":"'. $rs["positionName"]. '",';
    $outp .= '"fName":"'. $rs["fName"]. '",';
    $outp .= '"lName":"'. $rs["lName"]. '",';
    $outp .= '"sex":"'. $rs["sex"]. '",';
    $outp .= '"age":"'. $rs["age"]. '",';
    $outp .= '"DOB":"'. $rs["DOB"]. '",';
    $outp .= '"tel":"'. $rs["tel"]. '",';
    $outp .= '"email":"'. $username. '",';
    $outp .= '"address":"'. $rs["address"]. '",';
    $outp .= '"salary":"'. $rs["salary"]. '",';
    $outp .= '"marital":"'. $rs["marital"]. '",';
    $outp .= '"picture":"'. $rs["picture"]. '",';   
    $outp .= '"departmentName":"'. $rs["departmentName"]. '",';
    $outp .= '"userrole":"'. $rs["userrole"];    
    $outp .= '"}'; 
    $_SESSION["userrole"] = $rs["userrole"];
}
$outp .= "]";

$conn->close();
echo($outp);
?>