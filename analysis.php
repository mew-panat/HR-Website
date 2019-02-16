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
            <!-- Start Content Here -->
            <article class="content responsive-tables-page">
                    <section class="section">
                        <div class="row sameheight-container">                                           
                            <div class="col col-12 col-sm-12 col-md-6 col-xl-6 ">
                                <div class="card sameheight-item stats" data-exclude="xs">                               
                                        <div class="card-block">
                                            <div class="title-block">
                                            <h3 class="title"> Average OT for each Department </h3>
                                            </div>
                                            <section class="example">
                                                <div id="id04" class="table-flip-scroll">
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                            </div>                          
                            <div class="col col-12 col-sm-12 col-md-6 col-xl-6">
                                <div class="card sameheight-item stats" data-exclude="xs">                               
                                    <div class="card-block">
                                            <div class="title-block">
                                                <h3 class="title"> Average Extra Income  </h3>
                                            </div>
                                            <section class="example">
                                                <div id="id02" class="table-flip-scroll">
                                                </div>
                                            </section>
                                    </div>
                                </div>
                            </div>         
                        </div>
                        <div class="row sameheight-container"> 
                            <div class="col col-12 col-sm-12 col-md-6 col-xl-6">
                                <div class="card" data-exclude="xs">                               
                                        <div class="card-block">
                                            <div class="title-block">
                                            <h3 class="title"> Average Time for each Position  </h3>
                                            </div>
                                            <section class="example">
                                                <div id="id03" class="table-flip-scroll">
                                                </div>
                                            </section>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    
            </article>
              <script>
                    loadDailyTimeCard();

                    function loadDailyTimeCard() {
                        var xmlhttp = new XMLHttpRequest();
                        var url = location.protocol + '//' + location.host + "/cpe231project/getanalysisextra.php";

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
                        var count = 0;
                        var out = '<table class="table table-striped table-bordered table-hover flip-content">' +
                            '<thead class="flip-header"><tr><th>Name </th><th>Amount</th></tr></thead>' +
                            '<tbody>';

                        for (i = 0; i < arr.length; i++) {
                            count++;
                            out += "<tr><td>" +
                                arr[i].Name +
                                "</td><td>" +
                                arr[i].Amount +
                                "</td></tr>";
                        }
                        out += "</tbody></table>";
                        document.getElementById("id02").innerHTML = out;
                        //document.getElementById("emp01").innerHTML = count;
                        window.alert = out;
                    }




                   // ---------------------------------
                    loadDailyTimeCard1();

                    function loadDailyTimeCard1() {
                        var xmlhttp = new XMLHttpRequest();
                        var url = location.protocol + '//' + location.host + "/cpe231project/getanalysistimepos.php";

                        xmlhttp.onreadystatechange = function () {
                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                displayResponse1(xmlhttp.responseText);
                            }
                        }
                        xmlhttp.open("GET", url, true);
                        xmlhttp.send();
                    }

                    function displayResponse1(response) {
                        var arr = JSON.parse(response);
                        var i;
                        var count = 0;
                        var out = '<table class="table table-striped table-bordered table-hover flip-content">' +
                            '<thead class="flip-header"><tr><th>Position</th><th> Average Time</th></tr></thead>' +
                            '<tbody>';

                        for (i = 0; i < arr.length; i++) {
                            count++;
                            out += "<tr><td>" +
                                arr[i].positionName +
                                "</td><td>" +
                                arr[i].AVGtime+
                                "</td></tr>";
                        }
                        out += "</tbody></table>";
                        document.getElementById("id03").innerHTML = out;
                        //document.getElementById("emp01").innerHTML = count;
                        window.alert = out;
                    }
                     //---------------------------------
                     loadDailyTimeCard3();

function loadDailyTimeCard3() {
    var xmlhttp = new XMLHttpRequest();
    var url = location.protocol + '//' + location.host + "/cpe231project/getanalysisOT.php";

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
    var count = 0;
    var out = '<table class="table table-striped table-bordered table-hover flip-content">' +
        '<thead class="flip-header"><tr><th>Department</th><th> Average Time</th></tr></thead>' +
        '<tbody>';

    for (i = 0; i < arr.length; i++) {
        count++;
        out += "<tr><td>" +
            arr[i].departmentName +
            "</td><td>" +
            arr[i].AVGot+
            "</td></tr>";
    }
    out += "</tbody></table>";
    document.getElementById("id04").innerHTML = out;
    //document.getElementById("emp01").innerHTML = count;
    window.alert = out;
}
                     //--------------------------------
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
        <script type="text/javascript" src="js/app8.js"></script>    
</body>

</html>
