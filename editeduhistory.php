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
        // $conn = mysqli_connect("localhost", "root", "", "project");
        // check connection
        if(!$conn){
            echo "Failed to connect to MySQL: " .mysqli_connect_error();
        }
        //database
        $find = mysqli_real_escape_string($conn,$_GET['educationNo']);

        $university = mysqli_real_escape_string($conn,$_GET['euniversityName']);
        $faculty = mysqli_real_escape_string($conn,$_GET['efaculty']);
        $department = mysqli_real_escape_string($conn,$_GET['edepartment']);
        $degree = mysqli_real_escape_string($conn,$_GET['edegree']);
        $gpax = mysqli_real_escape_string($conn,$_GET['eGPAX']);
        $endyear = mysqli_real_escape_string($conn,$_GET['eendyear']);

        $sql = "UPDATE educationalhistory
                SET universityName = '$university', faculty = '$faculty', department = '$department',
                    degree = '$degree', GPAX = $gpax, endyear = '$endyear'
                WHERE educationNo = $find;";

                
        if(!mysqli_query($conn,$sql)){
            die('Error : '.mysqli_error($conn));
            //header('Location: http://artattack.ga/cpe231project/activity.php?status=fail');

        }
        else{
            //--edit here--
            //header('Location: http://artattack.ga/cpe231project/activity.php?status=success');
        }
        mysqli_close($conn);
?>