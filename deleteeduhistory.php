<?php
// $conn = new mysqli("localhost", "root", "", "project");
$conn = new mysqli("localhost", "elitebuild_user", "cpe231project", "elitebuild_cpe231project");
//$conn = new mysqli("localhost", "root", "", "cpe231project");
	if(!$conn){
	echo "Failed to connect to MySQL: " .mysqli_connect_error();
}
$educationNo = mysqli_real_escape_string($conn,$_GET['educationNo']);
mysqli_query($conn,"DELETE FROM educationalhistory WHERE educationNo = $educationNo;");
//$_SESSION['message'] = " deleted success!"; 
//header('location: showactivity.php');
mysqli_close($conn);

?>
