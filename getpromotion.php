<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "elitebuild_user", "cpe231project", "elitebuild_cpe231project");

$username = $_SESSION['username'];
$userrole = $_SESSION['userrole'];

$result = $conn->query("SELECT fName, lName, p.staffID, startDate, endDate, prevPosition, prevDepartment, p.status
                        FROM promotionhistory p, staff s
                        WHERE p.staffID = s.staffID
                        ORDER BY p.staffID;");

$resultRole1 = $conn->query("SELECT fName, lName, ph.staffID, startDate, endDate, prevPosition, prevDepartment, ph.status
                             FROM promotionhistory ph, staff s,department d, position p
                             WHERE ph.staffID = s.staffID AND
                                   s.email = '$username' AND
                                   s.id = p.id AND
                                   p.departmentID = d.departmentID");

$resultRole3 = $conn->query("SELECT fName, lName, p.staffID, startDate, endDate, prevPosition, prevDepartment, p.status
                             FROM promotionhistory p, staff s
                             WHERE p.staffID = s.staffID
                             ORDER BY p.staffID;");

$outp = "[";
if($userrole == 1 || $userrole == 2){
    while($rs = $resultRole1->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"fName":"'. $rs["fName"]. '",';
        $outp .= '"lName":"'. $rs["lName"]. '",';
        $outp .= '"staffID":"'. $rs["staffID"]. '",';
        $outp .= '"startDate":"'. $rs["startDate"]. '",';
        $outp .= '"endDate":"'. $rs["endDate"]. '",';
        $outp .= '"prevPosition":"'. $rs["prevPosition"]. '",';
        $outp .= '"prevDepartment":"'. $rs["prevDepartment"]. '",';
        $outp .= '"status":"'. $rs["status"];
        $outp .= '"}'; 
    }
}
else if($userrole == 3 || $userrole == 4){
    while($rs = $resultRole3->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"fName":"'. $rs["fName"]. '",';
        $outp .= '"lName":"'. $rs["lName"]. '",';
        $outp .= '"staffID":"'. $rs["staffID"]. '",';
        $outp .= '"startDate":"'. $rs["startDate"]. '",';
        $outp .= '"endDate":"'. $rs["endDate"]. '",';
        $outp .= '"prevPosition":"'. $rs["prevPosition"]. '",';
        $outp .= '"prevDepartment":"'. $rs["prevDepartment"]. '",';
        $outp .= '"status":"'. $rs["status"];
        $outp .= '"}'; 
    }
}
$outp .= "]";

$conn->close();

echo($outp);
?>