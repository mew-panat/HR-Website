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

        $sql = "UPDATE staff SET status = 'n' WHERE  staffID = '$staffID';
        DELETE FROM loginform WHERE staffID = '$staffID';
        DELETE FROM monthlypayslip WHERE staffID = '$staffID";

        if(!mysqli_multi_query($con,$sql)){
            die('Error : '.mysqli_error($con));
            header('Location: http://artattack.ga/cpe231project/resignation.php?status=fail');
        }
        else{
            //--edit here--
            header('Location: http://artattack.ga/cpe231project/login.php?status=success');
        }
        mysqli_close($con);
?>
