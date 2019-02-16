<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "elitebuild_user", "cpe231project", "elitebuild_cpe231project");

$username = $_SESSION['username'];
$userrole = $_SESSION['userrole'];

$result = $conn->query("SELECT fName, lName, company, startDate, endDate, startSalary, endSalary, firstPosition, lastPosition, w.staffID
                        FROM workhistory w, staff s
                        WHERE w.staffID = s.staffID
                        ORDER BY w.staffID;");

$resultRole1 = $conn->query("SELECT fName, lName, company, startDate, endDate, startSalary, endSalary, firstPosition, lastPosition, w.staffID
                             FROM workhistory w, staff s,position p,department d
                             WHERE w.staffID = s.staffID AND
                                   s.ID = p.ID AND
                                   p.departmentID = d.departmentID AND
                                   d.departmentID IN (SELECT d.departmentID
                                                      FROM staff s, department d, position p
                                                      WHERE s.email = '$username' AND 
                                                            s.id = p.id AND 
                                                            p.departmentID = d.departmentID);");

$resultRole3 = $conn->query("SELECT fName, lName, company, startDate, endDate, startSalary, endSalary, firstPosition, lastPosition, w.staffID
                             FROM workhistory w, staff s
                             WHERE w.staffID = s.staffID
                             ORDER BY w.staffID;");

$outp = "[";
if($userrole == 1 || $userrole == 2){
    while($rs = $resultRole1->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"fName":"'. $rs["fName"]. '",';
        $outp .= '"lName":"'. $rs["lName"]. '",';
        $outp .= '"company":"'. $rs["company"]. '",';
        $outp .= '"startDate":"'. $rs["startDate"]. '",';
        $outp .= '"endDate":"'. $rs["endDate"]. '",';
        $outp .= '"startSalary":"'. $rs["startSalary"]. '",';
        $outp .= '"endSalary":"'. $rs["endSalary"]. '",';
        $outp .= '"firstPosition":"'. $rs["firstPosition"]. '",';
        $outp .= '"lastPosition":"'. $rs["lastPosition"]. '",';
        $outp .= '"staffID":"'. $rs["staffID"]. '"}'; 
    }
}
else if($userrole == 3 || $userrole == 4){
    while($rs = $resultRole3->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"fName":"'. $rs["fName"]. '",';
        $outp .= '"lName":"'. $rs["lName"]. '",';
        $outp .= '"company":"'. $rs["company"]. '",';
        $outp .= '"startDate":"'. $rs["startDate"]. '",';
        $outp .= '"endDate":"'. $rs["endDate"]. '",';
        $outp .= '"startSalary":"'. $rs["startSalary"]. '",';
        $outp .= '"endSalary":"'. $rs["endSalary"]. '",';
        $outp .= '"firstPosition":"'. $rs["firstPosition"]. '",';
        $outp .= '"lastPosition":"'. $rs["lastPosition"]. '",';
        $outp .= '"staffID":"'. $rs["staffID"]. '"}'; 
    }
}
$outp .= "]";

$conn->close();

echo($outp);
?>