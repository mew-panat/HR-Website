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
        $department = mysqli_real_escape_string($con,$_GET['cur_department']);
        $position = mysqli_real_escape_string($con,$_GET['cur_position']);
        $absenceType = mysqli_real_escape_string($con,$_GET['absenceType']);
        $getdate = mysqli_real_escape_string($con,$_GET['getdate']);

        $sql = "INSERT INTO dailytimecard(`staffID`,`date`,`statusNo`)
                VALUES($staffID,'$getdate',(SELECT statusNo 
                                          FROM statustype 
                                          WHERE statusName = '$absenceType'))
                ON DUPLICATE KEY UPDATE statusNo = (SELECT statusNo 
                                                    FROM statustype 
                                                    WHERE statusName = '$absenceType');
                
                INSERT INTO extraDeduction(`staffID`,`date`,`deductionTypeNo`,`Amount`)
                VALUES($staffID,'$getdate',4,(SELECT DISTINCT IF(COUNT(staffID) > (SELECT limitDay
                                                                                   FROM statustype
                                                                                   WHERE statusName = '$absenceType'),200,0)
                                            FROM dailytimecard 
                                            WHERE statusNo NOT IN (0,1) AND 
                                                  staffID = $staffID 
                                            GROUP BY staffID));
                DELETE FROM extraDeduction WHERE Amount = 0 AND staffID = $staffID;

                DELETE FROM training WHERE staffID = $staffID AND date = (SELECT date
                                                                          FROM training t, trainingtopics tr
                                                                          WHERE t.courseNo = tr.courseNo);  
                ";                
        
        if(!mysqli_multi_query($con,$sql)){
            die('Error : '.mysqli_error($con));
            header('Location: http://artattack.ga/cpe231project/absenceform.php?status=fail');
        }
        else{
            //--edit here--
            header('Location: http://artattack.ga/cpe231project/absenceform.php?status=success');
        }
        mysqli_close($con);
?>
