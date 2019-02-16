<?php
// $conn = new mysqli("localhost", "root", "", "project");
$conn = new mysqli("localhost", "elitebuild_user", "cpe231project", "elitebuild_cpe231project");
//$conn = new mysqli("localhost", "root", "", "cpe231project");
	if(!$conn){
	echo "Failed to connect to MySQL: " .mysqli_connect_error();
}
$staffID = mysqli_real_escape_string($conn,$_GET['staffID']);
$startDate = mysqli_real_escape_string($conn,$_GET['startDate']);
mysqli_query($conn,"DELETE FROM promotionhistory 
                    WHERE staffID = $staffID AND startDate = '$startDate';");
//$_SESSION['message'] = " deleted success!"; 
//header('location: showactivity.php');
mysqli_close($conn);

?>