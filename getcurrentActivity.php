<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "elitebuild_user", "cpe231project", "elitebuild_cpe231project");

$username = $_SESSION['username'];
$result = $conn->query("SELECT tp.courseName, tp.date, tp.time
                        FROM trainingtopics tp, training t, staff s
                        WHERE t.courseNo = tp.courseNo AND
	                          t.staffID = s.staffID AND
                              s.email = '$username'
                              GROUP BY t.courseNo
                              HAVING tp.date >= CURDATE();");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"courseName":"'. $rs["courseName"]. '",';
    $outp .= '"time":"'. $rs["time"]. '",';
    $outp .= '"date":"'. $rs["date"]. '"}'; 
}
//echo $time;
$outp .="]";

$conn->close();

echo($outp);
?>