<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "elitebuild_user", "cpe231project", "elitebuild_cpe231project");

$username = $_SESSION['username'];
$userrole = $_SESSION['userrole'];

$result = $conn->query("SELECT date, staffID, starttime, endtime, s.statusName
                        FROM dailytimecard d
                        LEFT JOIN statustype s ON s.statusNo = d.statusNo;");

$resultRole1 = $conn->query("SELECT dc.date, dc.staffID, dc.starttime, dc.endtime, st.statusName
                             FROM dailytimecard dc, statustype st, staff s, position p, department d
                             WHERE st.statusNo = dc.statusNo
                             AND dc.staffID = s.staffID
                             AND s.id = p.id
                             AND p.departmentID = d.departmentID
                             AND d.departmentID IN (SELECT d.departmentID
                                                    FROM staff s, department d, position p
                                                    WHERE s.email = '$username' AND 
                                                          s.id = p.id AND 
                                                          p.departmentID = d.departmentID);");

$resultRole3 = $conn->query("SELECT date, staffID, starttime, endtime, s.statusName
                             FROM dailytimecard d
                             LEFT JOIN statustype s ON s.statusNo = d.statusNo;");

$outp = "[";
if($userrole == 1 || $userrole == 2){
    while($rs = $resultRole1->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"date":"'  . $rs["date"] . '",';
        $outp .= '"staffID":"'   . $rs["staffID"]        . '",';
        $outp .= '"starttime":"'   . $rs["starttime"]        . '",';
        $outp .= '"endtime":"'   . $rs["endtime"]        . '",';
        $outp .= '"status":"'. $rs["statusName"]     . '"}'; 
    }
}
else if($userrole == 3 || $userrole == 4){
    while($rs = $resultRole3->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"date":"'  . $rs["date"] . '",';
        $outp .= '"staffID":"'   . $rs["staffID"]        . '",';
        $outp .= '"starttime":"'   . $rs["starttime"]        . '",';
        $outp .= '"endtime":"'   . $rs["endtime"]        . '",';
        $outp .= '"status":"'. $rs["statusName"]     . '"}'; 
    }
}
$outp .="]";

$conn->close();

echo($outp);
?>