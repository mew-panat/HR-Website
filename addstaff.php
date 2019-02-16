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
        //personal information
        $staffID = mysqli_real_escape_string($con,$_GET['staffID']);       
        $position = mysqli_real_escape_string($con,$_GET['cur_position']);
        $department = mysqli_real_escape_string($con,$_GET['cur_department']);
        $fName = mysqli_real_escape_string($con,$_GET['firstname']);
        $lName = mysqli_real_escape_string($con,$_GET['lastname']);
        $address = mysqli_real_escape_string($con,$_GET['address']);
        $email = mysqli_real_escape_string($con,$_GET['email']);
        $telNo = mysqli_real_escape_string($con,$_GET['tel']);
        $birthday = mysqli_real_escape_string($con,$_GET['DOB']);
        $age = mysqli_real_escape_string($con,$_GET['age']);  
        $gender = mysqli_real_escape_string($con,$_GET['gender']);
        $marital = mysqli_real_escape_string($con,$_GET['marital']);
        $bSalary = mysqli_real_escape_string($con,$_GET['baseSalary']);

        //education history
        $uniName = mysqli_real_escape_string($con,$_GET['UniName']);
        $degree = mysqli_real_escape_string($con,$_GET['degree']);       
        $faculty = mysqli_real_escape_string($con,$_GET['faculty']);
        $Uni_department = mysqli_real_escape_string($con,$_GET['UniDepartment']);
        $fromDate = mysqli_real_escape_string($con,$_GET['fromDate']);
        $toDate = mysqli_real_escape_string($con,$_GET['toDate']);        
        $gpax = mysqli_real_escape_string($con,$_GET['gpax']);        

        //work history
        $companyName = mysqli_real_escape_string($con,$_GET['companyName']);
        $startDate = mysqli_real_escape_string($con,$_GET['startDate']);
        $endDate = mysqli_real_escape_string($con,$_GET['endDate']);
        $fPosition = mysqli_real_escape_string($con,$_GET['fPosition']);
        $lPosition = mysqli_real_escape_string($con,$_GET['lPosition']);
        $startSalary = mysqli_real_escape_string($con,$_GET['startSalary']);
        $endSalary = mysqli_real_escape_string($con,$_GET['endSalary']);
       
        $sql = "INSERT INTO staff(`staffID`,`id`,`fName`,`lName`,`gender`,`DOB`,`telNo`,
                            `email`,`address`,`salary`,`marital`,`status`)
                VALUES($staffID,(SELECT id FROM position WHERE positionName = '$position' 
                                                                AND departmentID = (SELECT departmentID
                                                                                    FROM department
                                                                                    WHERE departmentName = '$department')),
                       '$fName','$lName','$gender','$birthday','$telNo','$email','$address',$bSalary,'$marital','y');
                
                INSERT INTO educationalhistory(`staffID`,`universityName`,
                            `faculty`,`department`,`degree`,`GPAX`,`endyear`)
                VALUES($staffID,'$uniName','$faculty','$Uni_department','$degree',$gpax,'$toDate');

                INSERT INTO workhistory(`staffID`,`company`,`startDate`,`endDate`,
                            `startSalary`,`endSalary`,`firstPosition`,`lastPosition`)
                VALUES($staffID,'$companyName','$startDate','$endDate',$startSalary,$endSalary,'$fPosition','$lPosition');
                ";
                        
        if(!mysqli_multi_query($con,$sql)){
            die('Error : '.mysqli_error($con));           
            header('Location: http://artattack.ga/cpe231project/formstaff.php?status=fail');
        }
        else{
            //--edit here--
            header('Location: http://artattack.ga/cpe231project/formstaff.php?status=success');            
        }
        mysqli_close($con);
?>
