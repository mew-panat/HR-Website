<?php
    session_start();
    $userrole = $_SESSION['userrole'];
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <title> Education History </title>
    <link rel="shortcut icon" type="image/png" href="img/logo.png"/>
</head>

<body>
<div class="main-wrapper">
        <div class="app" id="app" class="app header-fixed sidebar-fixed">
            <?php
                $page = 'hisedu';
                include 'fixbar.php';
            ?>
            <!-- Start Content Here -->
            <article class="content responsive-tables-page">
                <section class="section">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-block">
                                    <div class="card-title-block">
                                        <h3 class="title"> List of University </h3>
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
                                        <h3 class="title"> Education History </h3>
                                    </div>
                                    <section class="example">
                                        <div id="id01" class="table-flip-scroll">
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </article>

            <script>
                loadEducationHistory(0,0);

                function loadEducationHistory(edit,selectedit) {
                    var xmlhttp = new XMLHttpRequest();
                    var url = location.protocol + '//' + location.host + "/cpe231project/geteduhistory.php";

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
                        '<thead class="flip-header"><tr><th style="text-align: center;">StaffID</th><th style="text-align: center;">Name</th>' +
                        '<th style="text-align: center;">University</th><th style="text-align: center;">Faculty</th>' +
                        '<th style="text-align: center;">Department</th><th style="text-align: center;">Degree</th>' +
                        '<th style="text-align: center;">GPAX</th><th style="text-align: center;">Endyear</th>';

                        var userrole = <?= $userrole ?>;

                        if(userrole == 4){
                            out += '<th style="text-align: center;">Edit</th><th style="text-align: center;">Delete</th>';
                        }

                        out += '</tr></thead>' + '<tbody>';

                        for (i = 0; i < arr.length; i++) {
                            out += "<tr><td>" +
                                arr[i].staffID +
                                "</td><td>" +
                                arr[i].fName +
                                '   ' +
                                arr[i].lName +
                                "</td><td>" +
                                arr[i].universityName +
                                "</td><td>" +
                                arr[i].faculty +
                                "</td><td>" +
                                arr[i].department +
                                "</td><td>" +
                                arr[i].degree +
                                "</td><td>" +
                                arr[i].GPAX +
                                "</td><td>" +
                                arr[i].endyear +
                                "</td>";
                                if(userrole == 4){
                                    out += "<td>" +
                                           "<button onclick=\"loadEducationHistory(1,'" + arr[i].educationNo + "')\">Edit</button>" +
                                           "</td><td>" +
                                           "<button onclick=\"deleteEdu('" + arr[i].educationNo + "')\">Delete</button>" +
                                           "</td>";
                                }
                                out += "</tr>";
                        }
                        out += "</table>";
                        document.getElementById("id01").innerHTML = out;
                    } else if (edit == 1) {
                        var out = '<table class="table table-striped table-bordered table-responsive table-hover flip-content">' +
                        '<thead class="flip-header"><tr><th style="text-align: center;">StaffID</th><th style="text-align: center;">Name</th>' +
                        '<th style="text-align: center;">University</th><th style="text-align: center;">Faculty</th>' +
                        '<th style="text-align: center;">Department</th><th style="text-align: center;">Degree</th>' +
                        '<th style="text-align: center;">GPAX</th><th style="text-align: center;">Endyear</th>' +
                        '<th style="text-align: center;">Save</th><th style="text-align: center;">Cancel</th></tr></thead><tbody>';

                        for (i = 0; i < arr.length; i++) {
                            if (selectedit == arr[i].educationNo) {
                                out += "<tr><td>" +
                                arr[i].staffID +
                                "</td><td>" +
                                arr[i].fName +
                                '   ' +
                                arr[i].lName +
                                "</td><td>" +
                                '<input type="text" name="euniversityName" style="font-size: 12px;" class="form-control underlined" value="' +
                                arr[i].universityName +
                                '">' +
                                "</td><td>" +
                                '<input type="text" name="efaculty" style="font-size: 12px;" class="form-control underlined" value="' +
                                arr[i].faculty +
                                '">' +
                                "</td><td>" +
                                '<input type="text" name="edepartment" style="font-size: 12px;" class="form-control underlined" value="' +
                                arr[i].department +
                                '">' +
                                "</td><td>" +
                                '<input type="text" name="edegree" style="font-size: 12px;" class="form-control underlined" value="' +
                                arr[i].degree +
                                '">' +
                                "</td><td>" +
                                '<input type="number" name="eGPAX" style="width:40px; font-size: 12px;" min="0" max="4" step=".01" class="form-control underlined" value="' +
                                arr[i].GPAX +
                                '">' +
                                "</td><td>" +
                                '<input type="number" name="eendyear" style="width:45px; font-size: 12px;" class="form-control underlined" value="' +
                                arr[i].endyear +
                                '">' +
                                "</td><td>" +
                                "<button onclick=\"editEdu('" + arr[i].educationNo + "')\">Save</button>" +
                                "</td><td>" +
                                "<button onclick=\"loadEducationHistory(0,0)\">Cancel</button>" +
                                "</td></tr>";
                            } else {
                                out += "<tr><td>" +
                                arr[i].staffID +
                                "</td><td>" +
                                arr[i].fName +
                                '   ' +
                                arr[i].lName +
                                "</td><td>" +
                                arr[i].universityName +
                                "</td><td>" +
                                arr[i].faculty +
                                "</td><td>" +
                                arr[i].department +
                                "</td><td>" +
                                arr[i].degree +
                                "</td><td>" +
                                arr[i].GPAX +
                                "</td><td>" +
                                arr[i].endyear +
                                "</td><td>" +
                                "</td><td>" +
                                "</td></tr>";
                            }
                        }
                        out += "</table>";
                        document.getElementById("id01").innerHTML = out;
                    }
                }

                function editEdu(educationNo) {
                    console.log(educationNo);
                    var euni = document.getElementsByName("euniversityName")[0].value;
                    var efaculty = document.getElementsByName("efaculty")[0].value;
                    var edep = document.getElementsByName("edepartment")[0].value;
                    var edegree = document.getElementsByName("edegree")[0].value;
                    var egpax = document.getElementsByName("eGPAX")[0].value;
                    var eeyear = document.getElementsByName("eendyear")[0].value;
                    console.log(euni);
                    console.log(efaculty);
                    console.log(edep);
                    console.log(edegree);
                    console.log(egpax);
                    console.log(eeyear);

                    var xmlhttp = new XMLHttpRequest();
                    var url = location.protocol + '//' + location.host + "/cpe231project/editeduhistory.php?educationNo=" +
                        educationNo + "&euniversityName=" + euni + "&efaculty=" + efaculty + "&edepartment=" + edep +
                        "&edegree=" + edegree + "&eGPAX=" + egpax + "&eendyear=" + eeyear;
                    console.log(url);
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            //displayResponse(xmlhttp.responseText);
                            loadEducationHistory(0,0);
                        }
                    }
                    xmlhttp.open("GET", url, true);
                    xmlhttp.send();
                }

                function deleteEdu(educationNo) {
                    var xmlhttp = new XMLHttpRequest();
                    var url = location.protocol + '//' + location.host +
                        "/cpe231project/deleteeduhistory.php?educationNo=" + educationNo;

                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            //displayResponse(xmlhttp.responseText);
                            loadEducationHistory(0,0);
                        }
                    }
                    xmlhttp.open("GET", url, true);
                    xmlhttp.send();
                }
                //--------------------------------------------------------------//

                loadPapers();

                function loadPapers() {
                    var xmlhttp = new XMLHttpRequest();
                    var url = location.protocol + '//' + location.host + "/cpe231project/analysisedu.php";

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
                    var out = '<table class="table table-striped table-bordered table-hover flip-content">' +
                        '<thead class="flip-header"><tr><th style="text-align: center;">University</th><th style="text-align: center;">Number of Staff</th></tr></thead>' +
                        '<tbody>';

                    for (i = 0; i < arr.length; i++) {
                        out += "<tr><td>" +
                            arr[i].universityName +
                            "</td><td>" +
                            arr[i].countstaff +
                            "</td></tr>";
                    }
                    out += "</tbody></table>";
                    document.getElementById("id02").innerHTML = out;
                }

                //-------------------------------------------------------------//
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
