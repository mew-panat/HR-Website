<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$host = "localhost";
$user = "elitebuild_user";
$password = "cpe231project";
$db = "elitebuild_cpe231project";
        //create connection    
        $con = mysqli_connect($host,$user,$password,$db);
        $date = date("Y-m-d");
        // check connection
        if(!$con){
            echo "Failed to connect to MySQL: " .mysqli_connect_error();
        }
        //database
        $staffID = mysqli_real_escape_string($con,$_GET['staffID']);
        $accountNo = mysqli_real_escape_string($con,$_GET['accountNo']);
        $pay_type = mysqli_real_escape_string($con,$_GET['pay_type']);
        $name = mysqli_real_escape_string($con,$_GET['type_name']);
        $comment = mysqli_real_escape_string($con,$_GET['Description']);        
        $amount = mysqli_real_escape_string($con,$_GET['totalAmount']);
        
    if($pay_type == 'Income'){
        $sql = "INSERT INTO extraincome(`staffID`,`date`,`incomeTypeNo`,`comments`,`amount`)
                VALUES($staffID,'$getdate',(SELECT incomeTypeNo 
                                            FROM incometype 
                                            WHERE Name = '$name'),
                       '$comment','$amount');";
    }
    else{
        $sql = "INSERT INTO extradeduction(`staffID`,`date`,`incomeTypeNo`,`comments`,`amount`)
                VALUES($staffID,'$getdate',(SELECT deductionTypeNo 
                                            FROM deductiontype 
                                            WHERE Name = '$name'),
                       '$comment','$amount');";
    }
    
        $sql .= "INSERT INTO monthlypayslip(`staffID`,`accountNo`,`date`,`amount`)
                 VALUES($staffID,(SELECT accountNo FROM staff WHERE staffID = $staffID),
                        '$date',(SELECT (s.salary + SUM(ed.amount - ei.amount)) AS Salary
                                 FROM extraincome ei, extradeduction ed, staff s
                                 WHERE ei.staffID = ed.staffID AND 
                                       s.staffID = ei.staffID AND 
                                       ei.staffID = $staffID
                                 GROUP BY ei.staffID))                 
                 ON DUPLICATE KEY UPDATE accountNo = '$accountNo', date = '$date'";                                
        
        if(!mysqli_multi_query($con,$sql)){
            die('Error : '.mysqli_error($con));
            header('Location: http://artattack.ga/cpe231project/payslip.php?status=fail');
        }
        else{
            //--edit here--
            header('Location: http://artattack.ga/cpe231project/showpayslip.php?status=success');
            
        }
        mysqli_close($con);
?>
