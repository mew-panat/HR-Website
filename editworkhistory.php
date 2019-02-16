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
        $fsdate = mysqli_real_escape_string($conn,$_GET['startDate']);

        $company = mysqli_real_escape_string($conn,$_GET['ecompany']);
        $ssalary = mysqli_real_escape_string($conn,$_GET['estartSalary']);
        $esalary = mysqli_real_escape_string($conn,$_GET['eendSalary']);
        $sdate = mysqli_real_escape_string($conn,$_GET['estartDate']);
        $edate = mysqli_real_escape_string($conn,$_GET['eendDate']);
        $fposition = mysqli_real_escape_string($conn,$_GET['efirstPosition']);
        $lposition = mysqli_real_escape_string($conn,$_GET['elastPosition']);

        $sql = "UPDATE workhistory
                SET company = '$company', startSalary = $ssalary, endSalary = $esalary, startDate = '$sdate', endDate = '$edate',
                    firstPosition = '$fposition', lastPosition = '$lposition'
                WHERE staffID = $fstaffid AND startDate = '$fsdate';";

                
        if(!mysqli_query($conn,$sql)){
            die('Error : '.mysqli_error($conn));
        }
        mysqli_close($conn);
?>