<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "elitebuild_user", "cpe231project", "elitebuild_cpe231project");

$username = $_SESSION['username'];
$userrole = $_SESSION['userrole'];

$resultRole1 = $conn->query("SELECT DISTINCT s.staffID, fName, lName, p.positionName,d.departmentName
                             FROM staff s ,position p,department d, loginform l
                             WHERE s.ID = p.ID AND s.status = 'y' AND
                                   p.departmentID = d.departmentID AND
                                   d.departmentID IN (SELECT d.departmentID
                                                      FROM staff s, department d, position p
                                                      WHERE s.email = '$username' AND 
                                                          s.id = p.id AND 
                                                          p.departmentID = d.departmentID);");

$resultRole3 = $conn->query("SELECT staffID, fName, lName, p.positionName,d.departmentName                                   
                             FROM staff s ,position p,department d
                             WHERE s.ID = p.ID AND p.departmentID = d.departmentID AND s.status = 'y';");

$resultRole4 = $conn->query("SELECT staffID, fName, lName, p.positionName,d.departmentName,
                                    (CASE WHEN s.status = 'y' THEN 'Active'
                                    ELSE 'Resigned' END) AS Status
                             FROM staff s ,position p,department d
                             WHERE s.ID = p.ID AND p.departmentID = d.departmentID;");

$outp = "[";
if($userrole == 1 || $userrole == 2){
    while($rs = $resultRole1->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"staffID":"'. $rs["staffID"]. '",';
        $outp .= '"fName":"'. $rs["fName"]. '",';
        $outp .= '"lName":"'. $rs["lName"]. '",';
        $outp .= '"positionName":"'. $rs["positionName"]. '",';
        $outp .= '"departmentName":"'. $rs["departmentName"]. '"}'; 
    }
}
else if($userrole == 3){
    while($rs = $resultRole3->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"staffID":"'. $rs["staffID"]. '",';
        $outp .= '"fName":"'. $rs["fName"]. '",';
        $outp .= '"lName":"'. $rs["lName"]. '",';
        $outp .= '"positionName":"'. $rs["positionName"]. '",';        
        $outp .= '"departmentName":"'. $rs["departmentName"]. '"}'; 
    }
}
else{
    while($rs = $resultRole4->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"staffID":"'. $rs["staffID"]. '",';
        $outp .= '"fName":"'. $rs["fName"]. '",';
        $outp .= '"lName":"'. $rs["lName"]. '",';
        $outp .= '"positionName":"'. $rs["positionName"]. '",';
        $outp .= '"Status":"'. $rs["Status"]. '",';
        $outp .= '"departmentName":"'. $rs["departmentName"]. '"}'; 
    }
}

$outp .="]";

$conn->close();
echo($outp);
?>