<!doctype html>
<html class="no-js" lang="en">

<head>
    <title> Banan IT Company</title>
    <link rel="shortcut icon" type="image/png" href="img/logo.png"/>
    <!-- Place favicon.ico in the root directory -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <!-- Theme initialization -->
</head>

<body>
    <div class="main-wrapper">
        <div class="app" id="app" class="app header-fixed sidebar-fixed">
                <?php
                $page = 'index';
                include 'fixbar.php';
                ?>
            <article class="content dashboard-page">
                <style>
                    img:hover {
                        opacity: 0.5;
                        filter: alpha(opacity=50);
                        /* For IE8 and earlier */
                    }
                </style>

                <section class="section">
                <div class="row">
                <div class="col-md-12 ">
                    <div class="card sameheight-item">
                        <div class="card-block">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="img/banner.jpg " alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="img/banner2.jpg" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="img/banner3.jpg" alt="Third slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                            <br>
                            <br>

                            <section class="text-center">
                                <center>
                                    <class="h3 pt-4">
                                        <h3>Best employee of the year</h3>                                        
                                </center>
                                <div id="best"></div>
                            </section>
                        </div>
                    </div>
                </div>
                </div>
                </section>
                <!--........................................................................-->
                <section class="section">
                    <div class="row sameheight-container">
                        <div class="col col-12 col-sm-12 col-md-6 col-xl-6 stats-col">
                            <div class="card sameheight-item stats" data-exclude="xs">
                                <div class="card-block">
                                    <div class="title-block">
                                        <h2> Manager </h2>
                                            <p class="title-description"> Manager form department</p>
                                    </div>
                                    <div id="manager01"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col col-12 col-sm-12 col-md-6 col-xl-6">
                            <div class="card sameheight-item stats" data-exclude="xs">                               
                                    <div class="card-block">
                                        <div class="title-block">
                                            <h2>Absence statistics</h2>                                            
                                        </div>
                                        <div id="show1"></div>
                                    </div>                                
                            </div>                            
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col col-12 col-sm-12 col-md-6 col-xl-6">
                            <div class="card sameheight-item stats" data-exclude="xs">                               
                                    <div class="card-block">
                                        <div class="title-block">
                                            <h2>Average income</h2>
                                            <p class="title-description">Average income of each Department</p>
                                        </div>
                                        <div id="chart-container">
				                            <canvas id="mycanvas"></canvas>
		                                </div>
                                    </div>                                
                            </div>                            
                        </div>

                        <div class="col col-12 col-sm-12 col-md-6 col-xl-6">
                            <div class="card sameheight-item stats" data-exclude="xs">                               
                                    <div class="card-block">
                                        <div class="title-block">
                                            <h2>Employees Count</h2>
                                            <p class="title-description">Employees Count of each Department</p>
                                        </div>
                                        <div id="chart-container">
			                                <canvas id="mycanvas2"></canvas>
		                                </div>
                                    </div>                                
                            </div>                            
                        </div>

                        <div class="col col-12 col-sm-12 col-md-6 col-xl-6">
                            <div class="card sameheight-item stats" data-exclude="xs">                               
                                    <div class="card-block">
                                        <div class="title-block">
                                            <h2>Number of male and female employees </h2>
                                            <p class="title-description">Number of male and female employees of each department</p>
                                        </div>
                                        <div id="chart-container">
				                            <canvas id="mycanvas3"></canvas>
		                                </div>
                                    </div>                                
                            </div>                            
                        </div>

                        <div class="col col-12 col-sm-12 col-md-6 col-xl-6">
                            <div class="card sameheight-item stats" data-exclude="xs">                               
                                    <div class="card-block">
                                        <div class="title-block">
                                            <h2>Marital of Employees </h2>
                                            <p class="title-description">Marital of Employees of each department</p>
                                        </div>
                                        <div id="chart-container">
				                            <canvas id="mycanvas4"></canvas>
		                                </div>
                                    </div>                                
                            </div>                            
                        </div>

                        <div class="col col-12 col-sm-12 col-md-6 col-xl-6">
                            <div class="card sameheight-item stats" data-exclude="xs">                               
                                    <div class="card-block">
                                        <div class="title-block">
                                            <h2>Average work hours</h2>
                                            <p class="title-description">Average work hours of each department</p>
                                        </div>
                                        <div id="chart-container">
				                            <canvas id="mycanvas5"></canvas>
		                                </div>
                                    </div>                                
                            </div>                            
                        </div>

                         <div class="col-md-12">
                                    <a class="btn btn-primary float-right" href="analysis.php">
                                        <i class="fa fa-plus"></i> Next to statistics</a>
                                </div>
                </section>
            </article>

                <script>
                    loadDailyTimeCard2();

                    function loadDailyTimeCard2() {
                        var xmlhttp = new XMLHttpRequest();
                        var url = location.protocol + '//' + location.host +
                            "/cpe231project/getdailytime2.php";

                        xmlhttp.onreadystatechange = function () {
                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                displayResponse2(xmlhttp.responseText);
                            }
                        }
                        xmlhttp.open("GET", url, true);
                        xmlhttp.send();
                    }

                    function displayResponse2(response) {
                        var arr = JSON.parse(response);
                        var i;
                        var out =
                            '<table class="table table-striped table-bordered table-hover flip-content">' +
                            '<thead class="flip-header"><tr><th style="text-align: center;">Month</th><th style="text-align: center;">The number of employee</th>' +
                            '<tbody>';

                        for (i = 0; i < arr.length; i++) {
                            out += '<tr><td style="text-align: center;">' +
                                arr[i].Month +
                                '</td><td style="text-align: center;">' +
                                arr[i].count +
                                '</td></tr>';
                        }
                        out += "</tbody></table>";
                        document.getElementById("show1").innerHTML = out;
                        window.alert = out;
                    }

                    loadBest();

                    function loadBest() {
                        var xmlhttp = new XMLHttpRequest();
                        var url = location.protocol + '//' + location.host +
                            "/cpe231project/getBestEmployee.php";
                        xmlhttp.onreadystatechange = function () {
                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                displayResponse3(xmlhttp.responseText);
                            }
                        }
                        xmlhttp.open("GET", url, true);
                        xmlhttp.send();
                    }

                    function displayResponse3(response) {
                        var arr = JSON.parse(response);
                        var i;
                        var out = '<div class="row shadow p-3 mb-5">';
                        for (i = 0; i < arr.length; i++) {
                            out +=
                                '<div class="col-lg-4 col-md-12 mb-4">' +
                                '<div class="card testimonial-card spring-warmth-gradient">' +
                                '<div class="card-up morpheus-den-gradient "></div>' +
                                '<div class="avatar mx-auto">' +
                                '<img src="' + arr[i].CirPicture +
                                '" class="rounded-circle img-responsive" style="width:200px">' + 
                                '</div>' +
                                '<div class="card-body"><h4 class="card-title mt-1">' +
                                arr[i].fName +
                                '</h4>' + arr[i].lName +
                                '<br><hr>' +
                                arr[i].departmentName +
                                '</div></div></div>';
                        }
                        out += '</div>';
                        document.getElementById("best").innerHTML = out;
                        window.alert = out;
                    }

                    loadManager();

                    function loadManager() {
                        var xmlhttp = new XMLHttpRequest();
                        var url = location.protocol + '//' + location.host +
                            "/cpe231project/getmanager.php";

                        xmlhttp.onreadystatechange = function () {
                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                displayResponse(xmlhttp.responseText);
                            }
                        }
                        xmlhttp.open("GET", url, true);
                        xmlhttp.send();
                    }

                    function displayResponse(response) {
                        var arr = JSON.parse(response);
                        var i;
                        var out = '<div class="row row-sm stats-container">'

                        for (i = 0; i < arr.length; i++) {
                            out += '<div class="col-12 col-sm-6 stat-col cloudy-knoxville-gradient">' +
                                '<img src="' +
                                arr[i].picture +
                                '"class="media-object" style="width:60px"></img>' +
                                '<div class="stat"><span>' +
                                arr[i].fName +
                                '</span><br>' +
                                '<span style="font-size:11.5px">' +
                                arr[i].departmentName +
                                '</span><br>' +
                                '<span style="font-size:12px">' +
                                arr[i].telNo +
                                '</span></div><br>' +
                                '</div>';
                        }
                        out += '</div>';
                        document.getElementById("manager01").innerHTML = out;
                        window.alert = out;
                    }                
                </script>

                <!-- End Content Here -->
                <footer class="footer">
                    <div class="container-fluid author">
                        <ul style="text-align: right;">
                            <li> © 2018 CPE30 All Rights Reserved.</li>
                        </ul>
                    </div>
                </footer>

                <div class="modal fade" id="modal-media">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Media Library</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                            <div class="modal-body modal-tab-container">
                                <ul class="nav nav-tabs modal-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#gallery" data-toggle="tab" role="tab">Gallery</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#upload" data-toggle="tab" role="tab">Upload</a>
                                    </li>
                                </ul>
                                <div class="tab-content modal-tab-content">
                                    <div class="tab-pane fade" id="gallery" role="tabpanel">
                                        <div class="images-container">
                                            <div class="row"> </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade active in" id="upload" role="tabpanel">
                                        <div class="upload-container">
                                            <div id="dropzone">
                                                <form action="/" method="POST" enctype="multipart/form-data" class="dropzone needsclick dz-clickable" id="demo-upload">
                                                    <div class="dz-message-block">
                                                        <div class="dz-message needsclick"> Drop files here or click to upload. </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Insert Selected</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <div class="modal fade" id="confirm-modal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">
                                    <i class="fa fa-warning"></i> Alert</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure want to do this?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Yes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                </div>
        </div>
        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
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
        </script>
        <script type="text/javascript" src="js/Chart.min.js"></script>
		<script type="text/javascript" src="js/app_test.js"></script>
        <script type="text/javascript" src="js/app3.js"></script>
        <script type="text/javascript" src="js/app4.js"></script>
        <script type="text/javascript" src="js/app5.js"></script>
        <script type="text/javascript" src="js/app6.js"></script>
        <script type="text/javascript" src="js/app7.js"></script>        
</body>

</html>
