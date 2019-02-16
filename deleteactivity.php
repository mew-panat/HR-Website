<?php

$conn = new mysqli("localhost", "elitebuild_user", "cpe231project", "elitebuild_cpe231project");
//$conn = new mysqli("localhost", "root", "", "cpe231project");
	if(!$conn){
	echo "Failed to connect to MySQL: " .mysqli_connect_error();
}
$courseNo = mysqli_real_escape_string($conn,$_GET['courseNo']);
mysqli_query($conn,"DELETE FROM trainingtopics WHERE courseNo = $courseNo;");
//$_SESSION['message'] = " deleted success!"; 
//header('location: showactivity.php');
mysqli_close($conn);

?>
