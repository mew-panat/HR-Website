<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$host = "localhost";
$user = "elitebuild_user";
$password = "cpe231project";
$db = "elitebuild_cpe231project";
        //create connection    
        $con = mysqli_connect($host,$user,$password,$db);
        // check connection
        if(!$con){
            echo "Failed to connect to MySQL: " .mysqli_connect_error();
        }
        //database
        $staffID = mysqli_real_escape_string($con,$_GET['staffID']);
        $date = mysqli_real_escape_string($con,$_GET['date']);
        $Name = mysqli_real_escape_string($con,$_GET['firstname']);
        $department = mysqli_real_escape_string($con,$_GET['department']);
        $position = mysqli_real_escape_string($con,$_GET['position']);
        $timeStart = mysqli_real_escape_string($con,$_GET['timeStart']);
        $timeEnd = mysqli_real_escape_string($con,$_GET['timeEnd']);

        $sql = "INSERT INTO dailytimecard(`staffID`,`date`,`startOT`,`endOT`)
                VALUES($staffID,'$date','$timeStart','$timeEnd')
                ON DUPLICATE KEY UPDATE startOT = '$timeStart', endOT = '$timeEnd';
                
                INSERT INTO extraincome(`staffID`,`date`,`incomeTypeNo`,`comments`,`Amount`)
                VALUES($staffID,'$date',3,'OT',(SELECT s.salary/30/8*1.5
                                              FROM staff s
                                              WHERE staffID = $staffID
                                              GROUP BY s.staffID));
                ";                
        
        if(!mysqli_multi_query($con,$sql)){
            die('Error : '.mysqli_error($con));
            header('Location: http://artattack.ga/cpe231project/ot.php?status=fail');
        }
        else{
            //--edit here--
            header('Location: http://artattack.ga/cpe231project/ot.php?status=success');
        }
        mysqli_close($con);
?>
