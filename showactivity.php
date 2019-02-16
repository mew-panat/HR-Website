<?php
    session_start();
    $userrole = $_SESSION['userrole'];
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <title> Activity </title>
    <link rel="shortcut icon" type="image/png" href="img/logo.png"/>
</head>

<body>
    <div class="main-wrapper">
        <div class="app" id="app" class="app header-fixed sidebar-fixed">
            <?php
                $page = 'activity';
                include 'fixbar.php';
            ?>

            <!-- Start Content Here -->
            <article class="content responsive-tables-page">
            <section class="section">
            <?php
                if($userrole == 1 || $userrole == 4){
                    echo '<div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-primary float-right" href="activity.php">
                                        <i class="fa fa-plus"></i> New Activities</a>
                                </div>
                            </div>';
                }
            ?>
            <div class="row">
                            <div class="col-md-12">

                                <div class="card">
                                    <div class="card-block">
                                        <div class="card-title-block">
                                            <h3 class="title"> Popular Activity </h3>
                                        </div>
                                        <section class="example">
                                            <div id="id02" class="table-flip-scroll">
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                        <section class="section">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="card-title-block">
                                                <h3 class="title"> Activities </h3>
                                            </div>
                                            <section class="example">
                                                <div id="id01" class="table-flip-scroll"></div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
            </article>

            <script>
                loadActivity(0,0);

                function loadActivity(edit,selectedit) {
                    var xmlhttp = new XMLHttpRequest();
                    var url = location.protocol + '//' + location.host + "/cpe231project/getshowactivity.php";

                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            displayResponse(xmlhttp.responseText, edit, selectedit);
                        }
                    }
                    xmlhttp.open("GET", url, true);
                    xmlhttp.send();
                }

                function displayResponse(response, edit, selectedit) {
                    var arr = JSON.parse(response);
                    var i;
                    if (edit == 0){
                        var out = '<table class="table table-striped table-bordered table-hover flip-content">' +
                        '<thead class="flip-header"><tr><th style="text-align: center;">Course Name</th>' +
                        '<th style="text-align: center;">Date</th><th style="text-align: center;">Time</th>'

                        var userrole = <?= $userrole ?>;

                        if(userrole == 1 || userrole == 4){
                            out += '<th style="text-align: center;">Edit</th><th style="text-align: center;">Delete</th>';
                        }

                        out += '</tr></thead>' + '<tbody>';

                        for (i = 0; i < arr.length; i++) {
                            out += "<tr><td>" +
                                arr[i].courseName +
                                "</td><td>" +
                                arr[i].date +
                                "</td><td>" +
                                arr[i].time +
                                "</td>";
                                if(userrole == 1 || userrole == 4){
                                    out += "<td>" +
                                           "<button onclick=\"loadActivity(1,'" + arr[i].courseNo + "')\">Edit</button>" +
                                           "</td><td>" +
                                           "<button onclick=\"deleteActivity('" + arr[i].courseNo + "')\">Delete</button>" +
                                           "</td>";
                                }
                            out += "</tr>";
                        }
                        out += "</table>";
                        document.getElementById("id01").innerHTML = out;
                    } else if (edit == 1){
                        var out = '<table class="table table-striped table-bordered table-responsive table-hover flip-content">' +
                        '<thead class="flip-header"><tr><th style="text-align: center;">Course Name</th>' +
                        '<th style="text-align: center;">Date</th><th style="text-align: center;">Time</th>' +
                        '<th style="text-align: center;">Save</th><th style="text-align: center;">Cancel</th></tr></thead>' +
                        '<tbody>';

                        for (i = 0; i < arr.length; i++) {
                            if (selectedit == arr[i].courseNo) {
                                out += "<tr><td>" +
                                '<input type="text" name="ecourseName" style="font-size: 12px;" class="form-control underlined" value="' +
                                arr[i].courseName +
                                '">' +
                                "</td><td>" +
                                '<input type="date" name="edate" style="width:115px; font-size: 12px;" class="form-control underlined" value="' +
                                arr[i].date +
                                '">' +
                                "</td><td>" +
                                '<input type="time" name="etime" style="width:65px; font-size: 12px;" class="form-control underlined" value="' +
                                arr[i].time +
                                '">' +
                                "</td><td>" +
                                "<button onclick=\"editActivity('" + arr[i].courseNo + "')\">Save</button>" +
                                "</td><td>" +
                                "<button onclick=\"loadActivity(0,0)\">Cancel</button>" +
                                "</td></tr>";
                            } else {
                                out += "<tr><td>" +
                                arr[i].courseName +
                                "</td><td>" +
                                arr[i].date +
                                "</td><td>" +
                                arr[i].time +
                                "</td><td>" +
                                "</td><td>" +
                                "</td></tr>";
                            }
                        }
                        out += "</table>";
                        document.getElementById("id01").innerHTML = out;
                    }
                }

                function editActivity(courseNo) {
                    console.log(courseNo);
                    var eName = document.getElementsByName("ecourseName")[0].value;
                    var edate = document.getElementsByName("edate")[0].value;
                    var etime = document.getElementsByName("etime")[0].value;
                    console.log(eName);
                    console.log(edate);
                    console.log(etime);

                    var xmlhttp = new XMLHttpRequest();
                    var url = location.protocol + '//' + location.host + "/cpe231project/editactivity.php?courseNo=" +
                        courseNo + "&ecourseName=" + eName + "&edate=" + edate + "&etime=" + etime;
                    console.log(url);
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            //displayResponse(xmlhttp.responseText);
                            loadActivity(0,0);
                        }
                    }
                    xmlhttp.open("GET", url, true);
                    xmlhttp.send();
                }

                function deleteActivity(courseNo) {
                    var xmlhttp = new XMLHttpRequest();
                    var url = location.protocol + '//' + location.host + "/cpe231project/deleteactivity.php?courseNo=" +
                        courseNo;
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            //displayResponse(xmlhttp.responseText);
                            loadActivity(0,0);
                        }
                    }
                    xmlhttp.open("GET", url, true);
                    xmlhttp.send();
                }

//---------------------------------------------------------//
                 loadPapers();

                function loadPapers(){
                    var xmlhttp = new XMLHttpRequest();
                    var url = location.protocol + '//' + location.host+"/cpe231project/analysisactivity.php";

                    xmlhttp.onreadystatechange=function() {
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
                    var out = '<table class="table table-striped table-bordered table-hover flip-content">'+
                                        '<thead class="flip-header"><tr><th style="text-align: center;">Course Name</th><th style="text-align: center;">Number of Staff</th></tr></thead>'+
                                        '<tbody>';

                    for(i = 0; i < arr.length; i++) {
                        out += "<tr><td>" +
                        arr[i].courseName +
                        "</td><td>" +
                        arr[i].countstaff +
                        "</td></tr>";
                    }
                    out += "</tbody></table>";
                    document.getElementById("id02").innerHTML = out;
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
</body>

</html>
