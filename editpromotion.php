<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$host = "localhost";
$user = "elitebuild_user";
$password = "cpe231project";
$db = "elitebuild_cpe231project";
        //create connection
        $conn = mysqli_connect($host,$user,$password,$db);
        // $conn = mysqli_connect("localhost", "root", "", "project");

        // check connection
        if(!$conn){
            echo "Failed to connect to MySQL: " .mysqli_connect_error();
        }

        //database
        $fstaffid = mysqli_real_escape_string($conn,$_GET['staffID']);
        $fstartdate = mysqli_real_escape_string($conn,$_GET['startDate']);

        $sdate = mysqli_real_escape_string($conn,$_GET['estartDate']);
        $edate = mysqli_real_escape_string($conn,$_GET['eendDate']);
        $pos = mysqli_real_escape_string($conn,$_GET['eprevPosition']);
        $dep = mysqli_real_escape_string($conn,$_GET['eprevDepartment']);
        $status = mysqli_real_escape_string($conn,$_GET['estatus']);

        $sql = "UPDATE promotionhistory
                SET startDate = '$sdate', endDate = '$edate', prevPosition = '$pos', prevDepartment = '$dep', status = '$status'
                WHERE staffID = $fstaffid AND startDate = '$fstartdate';";

                
        if(!mysqli_query($conn,$sql)){
            die('Error : '.mysqli_error($conn));
        }
        mysqli_close($conn);
?>