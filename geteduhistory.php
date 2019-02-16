<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "elitebuild_user", "cpe231project", "elitebuild_cpe231project");

$username = $_SESSION['username'];
$userrole = $_SESSION['userrole'];

$result = $conn->query("SELECT fName, lName, educationNo, e.staffID, universityName, faculty, department, degree, GPAX, endyear
                        FROM educationalhistory e, staff s
                        WHERE e.staffID = s.staffID
                        ORDER BY e.staffID;");

$resultRole1 = $conn->query("SELECT fName, lName, educationNo, e.staffID, universityName, faculty, department, degree, GPAX, endyear
                             FROM educationalhistory e, staff s,position p,department d
                             WHERE 	e.staffID = s.staffID AND
                                    s.ID = p.ID AND
                                    p.departmentID = d.departmentID AND
                                    d.departmentID IN (SELECT d.departmentID
                                                       FROM staff s, department d, position p
                                                       WHERE s.email = '$username' AND 
                                                             s.id = p.id AND 
                                                             p.departmentID = d.departmentID);");

$resultRole3 = $conn->query("SELECT fName, lName, educationNo, e.staffID, universityName, faculty, department, degree, GPAX, endyear
                        FROM educationalhistory e, staff s
                        WHERE e.staffID = s.staffID
                        ORDER BY e.staffID;");

$outp = "[";
if($userrole == 1 || $userrole == 2){
    while($rs = $resultRole1->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"fName":"'. $rs["fName"]. '",';
        $outp .= '"lName":"'. $rs["lName"]. '",';
        $outp .= '"educationNo":"'. $rs["educationNo"]. '",';
        $outp .= '"staffID":"'. $rs["staffID"]. '",';
        $outp .= '"universityName":"'. $rs["universityName"]. '",';
        $outp .= '"faculty":"'. $rs["faculty"]. '",';
        $outp .= '"department":"'. $rs["department"]. '",';
        $outp .= '"degree":"'. $rs["degree"]. '",';
        $outp .= '"GPAX":"'. $rs["GPAX"]. '",';
        $outp .= '"endyear":"'. $rs["endyear"]. '"}'; 
    }
}
else if($userrole == 3 || $userrole == 4){
    while($rs = $resultRole3->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"fName":"'. $rs["fName"]. '",';
        $outp .= '"lName":"'. $rs["lName"]. '",';
        $outp .= '"educationNo":"'. $rs["educationNo"]. '",';
        $outp .= '"staffID":"'. $rs["staffID"]. '",';
        $outp .= '"universityName":"'. $rs["universityName"]. '",';
        $outp .= '"faculty":"'. $rs["faculty"]. '",';
        $outp .= '"department":"'. $rs["department"]. '",';
        $outp .= '"degree":"'. $rs["degree"]. '",';
        $outp .= '"GPAX":"'. $rs["GPAX"]. '",';
        $outp .= '"endyear":"'. $rs["endyear"]. '"}';  
    }
}
$outp .= "]";

$conn->close();

echo($outp);
?>