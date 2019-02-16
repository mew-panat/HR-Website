<?php 
    session_start();
    $userrole = $_SESSION['userrole'];
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>        
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">  
        <link rel="shortcut icon" type="image/png" href="img/logo.png"/>      
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="css/vendor.css">
        <link rel="stylesheet" href="css/gradient.css">        
        <link rel="stylesheet" href="css/mdb.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" id="theme-style" href="css/app.css">         
        <!-- Theme initialization -->
        <script>
            loadStaffInfo();

            function loadStaffInfo() {
                var xmlhttp = new XMLHttpRequest();
                var url = location.protocol + '//' + location.host + "/cpe231project/getstaffinfo.php";
                console.log(url);
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        displayResponseStaffInfo(xmlhttp.responseText);
                    }
                }
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }

            function displayResponseStaffInfo(response) {
                var arr = JSON.parse(response);
                var i;
                var out = '';

                for (i = 0; i < arr.length; i++) {
                    out += arr[i].fName;
                }
                document.getElementById("fixbarprofile").innerHTML = out;
                if(out == ''){
                    window.location.replace(location.protocol + '//' + location.host + "/cpe231project/login.php");
                }
            }
        </script>        
    </head>
    <body>
        <div class="main-wrapper">
            <header class="header" style="background-color:#3a4651;">
            <div class="header-block header-block-nav">
                <ul class="nav-profile">
                    <li class="profile dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="img" style="background-image: url('https://image.flaticon.com/icons/svg/145/145862.svg')"> </div>
                            <span id="fixbarprofile" class="name"> Noname </span>
                        </a>
                        <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="staff.php">
                                <i class="fa fa-user icon"></i> Profile </a>
                            <a class="dropdown-item" href="employeeActivity.php">
                                <i class="fa fa-comments-o icon"></i> My Activity </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="login.php">
                                <i class="fa fa-power-off icon"></i> Logout </a>
                        </div>
                    </li>
                </ul>
            </div>
            </header>
            <aside class="sidebar near-moon-gradient">
                <div class="sidebar-container">
                    <div class="sidebar-header">
                        <div class="brand">                            
                            <img src="img/logo.png" class="media-object" style="width:50px">Banana IT Company
                        </div>
                    </div>
                    <nav class="menu">
                        <ul class="sidebar-menu metismenu" id="sidebar-menu">
                            <li id = "index">
                                <a href="index.php">
                                    <i class="fa fa-home"></i> Dashboard </a>
                            </li>
                            <li id = "daily">
                                <a href="dailytime.php">
                                    <i class="fa fa-calendar"></i> Daily Time
                                </a>
                            </li>
                            <li id = "employee">
                                <a href="">
                                    <i class="fa fa-th-large"></i> Employee
                                    <i class="fa arrow"></i>
                                </a>
                                <ul class="sidebar-nav"> 
                                    <li id = "employees">
                                        <a href="employees.php"> All </a>
                                    </li>                                                                                          
                                    <li id = "promotion">
                                        <a href="promotion.php"> Promotion </a>
                                    </li>
                                    <li id = "hisedu">
                                        <a href="eduhistory.php"> Education </a>
                                    </li>
                                    <li id = "hiswork">
                                        <a href="workhistory.php"> Work </a>
                                    </li>                                                                 
                                </ul>
                            </li>
                            <?php
                                if($userrole == 3 || $userrole == 4){
                                    echo '<li id = "department"><a href="department.php"><i class="fa fa-group"></i> Department </a></li>'; 
                                }     
                            ?>                          
                            <li id = "activity">
                                <a href="showactivity.php">
                                    <i class="fa fa-bullhorn"></i> Activity </a>
                            </li>
                            <li id = "overtime">
                                <a href="ot.php">
                                    <i class="fa fa-clock-o"></i> Over-Time Request
                                </a>
                            </li>
                            <li id = "absence">
                                <a href="absenceform.php">
                                    <i class="fa fa-clock-o"></i> Absence Form
                                </a>
                            </li>
                            <?php
                                if($userrole == 3) {
                                    echo '<li id = "payslip">
                                            <a href="showpayslip.php"> 
                                                <i class="fa fa-money"></i> Payslip </a>
                                          </li>';                                     
                                }
                            ?>
                            <li id = "resignation">
                                <a href="resignation.php">
                                    <i class="fa fa-minus-square"></i> Resignation
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            
            <div class="sidebar-overlay" id="sidebar-overlay"></div>
            <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
            <div class="mobile-menu-handle"></div>       
        </div>



        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>
        <!-- <script>
            (function(i, s, o, g, r, a, m)
            {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function()
                {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-80463319-4', 'auto');
            ga('send', 'pageview');
        </script> -->

        <script>
        var selectp = "<?php echo $page ?>";
        // $(selectp).addClass("active");
        // var selectp = "eduhistory";
        if (selectp == 'employees' || selectp == 'promotion' || selectp == 'hisedu' || selectp == 'hiswork') {
            document.getElementById("employee").classList.add("active", "open");
        }
        document.getElementById(selectp).classList.add("active");
        console.log(selectp);
        </script>

        <script src="js/vendor.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>
