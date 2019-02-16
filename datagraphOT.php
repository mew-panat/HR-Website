<?php
//setting header to json
header('Content-Type: application/json');

//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', '');   //elitebuild_user
define('DB_PASSWORD', '');       //cpe231project
define('DB_NAME', 'elitebuild_cpe231project');
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
}

//query to get data from the table
$query = sprintf("SELECT d.departmentName,AVG((t.endOT-t.startOT)/10000 ) AS AVGot FROM staff s,department d,position p,dailytimecard t WHERE s.id = p.id AND s.staffID = t.staffID AND p.departmentID = d.departmentID AND (t.endOT-t.startOT)/10000 > 0 GROUP BY p.departmentID , d.departmentID ORDER BY AVGot DESC;");

//execute query
$result = $mysqli->query($query);

//loop through the returned data
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
