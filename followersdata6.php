<?php
//setting header to json
header('Content-Type: application/json');

//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'elitebuild_user'); //elitebuild_user
define('DB_PASSWORD', 'cpe231project');  //cpe231project
define('DB_NAME', 'elitebuild_cpe231project');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
}

//query to get data from the table
$query = sprintf("SELECT i.incomeName,SUM(e.Amount) AS Amount FROM incometype i,extraincome e WHERE i.incomeTypeNo = e.incomeTypeNo GROUP BY i.incomeTypeNo , e.incomeTypeNo;");

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
while ($rs = $result->fetch_array(MYSQLI_ASSOC)) {
  $data[] = $rs;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);
?>
