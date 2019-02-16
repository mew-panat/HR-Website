<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$host = "localhost";
$user = "elitebuild_user";
$password = "cpe231project";
$db = "elitebuild_cpe231project";
$personalData = $_POST['s_personal'];
$educationData = $_POST['s_education'];
$workData = $_POST['s_work'];
        //create connection    
        $con = mysqli_connect($host,$user,$password,$db);
        // check connection
        if(!$con){
            echo "Failed to connect to MySQL: " .mysqli_connect_error();
        }
        //database
        $staffID = $personalData["staffID"];       
        $position = $personalData["position"];
        $department = $personalData["department"];
        $fName = $personalData["firstname"];
        $lName = $personalData["lastname"];
        $address = $personalData["address"];
        $email = $personalData["email"];
        $telNo = $personalData["telephone"];
        $birthday = $personalData["DOB"];
        $age = $personalData["age"] ;  
        $gender = $personalData["gender"];
        $marital = $personalData["marital"];
        $bSalary = $personalData["salary"];

        //education history
        /*$uniName = $educationData["university"];
        $degree = $educationData["degree"] ;       
        $faculty = $educationData["faculty"];
        $Uni_department = $educationData["department"];
        $fromDate = $educationData["fromDate"];
        $toDate = $educationData["toDate"];        
        $gpax = $educationData["gpax"] ;   */     

        //work history
        $companyName = $workData["company"];
        $startDate = $workData["startDate"];
        $endDate = $workData["endDate"];
        $fPosition = $workData["fPosition"];
        $lPosition = $workData["lPosition"];
        $startSalary = $workData["startSalary"];
        $endSalary = $workData["endSalary"];
        
        
        
            /*$sql = "INSERT INTO staff(`staffID`,`id`,`fName`,`lName`,`gender`,`DOB`,`telNo`,
                    `email`,`address`,`salary`,`marital`,`status`)
                    VALUES($staffID,(SELECT id 
                                    FROM position 
                                    WHERE positionName = '$position' 
                                    AND departmentID = (SELECT departmentID
                                                        FROM department
                                                        WHERE departmentName = '$department')),
                '$fName','$lName','$gender','$birthday','$telNo','$email','$address',$bSalary,'$marital','y')
                ON DUPLICATE KEY UPDATE staffID = $staffID;";
            */
            $sql = "INSERT INTO workhistory(`staffID`,`company`,`startDate`,`endDate`,
                                `startSalary`,`endSalary`,`firstPosition`,`lastPosition`)
                     VALUES('$staffID','$companyName','$startDate','$endDate','$startSalary','$endSalary','$fPosition','$lPosition');"; 
        
        if(!mysqli_query($con,$sql)){
            die('Error : '.mysqli_error($con));
            header('Location: http://artattack.ga/cpe231project/ot.php?status=fail');
        }
        else{
            //--edit here--
            header('Location: http://artattack.ga/cpe231project/ot.php?status=success');
        }
        mysqli_close($con);        
?>
