<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "elitebuild_user", "cpe231project", "elitebuild_cpe231project");
$type=$_GET['Name'];

$result = $conn->query("SELECT Name FROM incometype");
$result2 = $conn->query("SELECT Name FROM deductiontype");

$outp = "[";
if($type == 'Income'){
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"payName":"'. $rs["Name"]. '"}'; 
    }   
}
else{
    while($rs = $result2->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"payName":"'. $rs["Name"]. '"}'; 
    }
    
}

$outp .= "]";
$conn->close();
echo($outp);
?>