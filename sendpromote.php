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
        $firstname = mysqli_real_escape_string($con,$_GET['firstname']);
        $Lastname = mysqli_real_escape_string($con,$_GET['lastname']);
        $newposition = mysqli_real_escape_string($con,$_GET['newposition']);
        $newdepartment = mysqli_real_escape_string($con,$_GET['newdepartment']);
        $startdate = mysqli_real_escape_string($con,$_GET['startdate']);
        $enddate = date("Y-m-d");
        $reason = mysqli_real_escape_string($con,$_GET['reason']);

        $sql = "INSERT INTO promotionhistory(`staffID`,`startDate`,`endDate`,`prevPosition`,`prevDepartment`,`status`)
                VALUES($staffID,'$startdate','$enddate',(SELECT positionName
                                                           FROM position
                                                           WHERE id = (SELECT id
                                                                       FROM staff
                                                                       WHERE staffID = $staffID)),(SELECT departmentName
                                                                                                     FROM department
                                                                                                     WHERE departmentID IN (SELECT departmentID
                                                                                                                           FROM position
                                                                                                                           WHERE id = (SELECT id
                                                                                                                                       FROM staff
                                                                                                                                       WHERE staffID = $staffID))),'Promoted');
                UPDATE staff
                SET id = (SELECT id
                          FROM position
                          WHERE positionName = '$newposition' AND departmentID IN (SELECT departmentID
                                                                                  FROM department
                                                                                  WHERE departmentName = '$newdepartment'))
                WHERE staffID = $staffID;
                
                UPDATE loginform l
                SET userrole = (SELECT DISTINCT IF(p.positionName = 'Manager' ,1,
       							IF(d.departmentID = 0241 ,3, 
      						 	IF(d.departmentID = 2003 ,4,2)))                	
				FROM userrole, staff s, position p, department d  
				WHERE l.staffID = $staffID AND  
                      s.id = p.id AND
                      p.departmentID = d.departmentID AND
                	  s.staffID = $staffID)
                WHERE staffID = $staffID;
                ";                
        
        if(!mysqli_multi_query($con,$sql)){
            die('Error : '.mysqli_error($con));
            header('Location: http://artattack.ga/cpe231project/promotion.php?status=fail');
        }
        else{
            //--edit here--
            header('Location: http://artattack.ga/cpe231project/promotion.php?status=success');
        }
        mysqli_close($con);
?>
