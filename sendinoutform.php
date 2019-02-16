<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$host = "localhost";
$user = "elitebuild_user";
$password = "cpe231project";
$db = "elitebuild_cpe231project";
        //create connection    
        $con = mysqli_connect($host,$user,$password,$db);
        // $con = mysqli_connect("localhost", "root", "", "project");
        // check connection
        if(!$con){
            echo "Failed to connect to MySQL: " .mysqli_connect_error();
        }
        //database
        $staffID = mysqli_real_escape_string($con,$_GET['staffID']);
        $date = mysqli_real_escape_string($con,$_GET['date']);
        $time = mysqli_real_escape_string($con,$_GET['time']);
        $check = mysqli_real_escape_string($con,$_GET['check']);

        if ($check == 'chkin') {
            $sql = "INSERT INTO dailytimecard(`staffID`,`date`,`starttime`,`statusNo`)
                    VALUES($staffID,'$date','$time',0)
                    ON DUPLICATE KEY UPDATE starttime = '$time', statusNo = 0;";
        } else if ($check == 'chkout') {
            $sql = "INSERT INTO dailytimecard(`staffID`,`date`,`endtime`)
                    VALUES($staffID,'$date','$time')
                    ON DUPLICATE KEY UPDATE endtime = '$time';";
        } 

        
        if(!mysqli_query($con,$sql)){
            die('Error : '.mysqli_error($con));
            // header('Location: http://artattack.ga/cpe231project/dailytime-inoutform.php?status=fail');
        }
        else{
            //--edit here--
            // header('Location: http://artattack.ga/cpe231project/dailytime-inoutform.php?status=success');
        }
        mysqli_close($con);
?>
