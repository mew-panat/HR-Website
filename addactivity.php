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
        $Name = mysqli_real_escape_string($con,$_GET['firstname']);
        $no = mysqli_real_escape_string($con,$_GET['no']);
        $courseNo = mysqli_real_escape_string($con,$_GET['courseNo']);
        $courseName = mysqli_real_escape_string($con,$_GET['courseName']);
        $date = mysqli_real_escape_string($con,$_GET['date']);
        $time = mysqli_real_escape_string($con,$_GET['time']);

        $sql = "INSERT INTO trainingtopics (courseNo,courseName,date,time)VALUES ($courseNo,'$courseName','$date','$time');";
        $sql .= "INSERT INTO training(no,staffID,courseNo) VALUES ($no,$staffID,$courseNo);";
                
        if(!mysqli_multi_query($con,$sql)){
            die('Error : '.mysqli_error($con));
            header('Location: http://artattack.ga/cpe231project/activity.php?status=fail');
        }
        else{
            //--edit here--
            header('Location: http://artattack.ga/cpe231project/activity.php?status=success');
        }
        mysqli_close($con);
?>
