<?php
    session_start();
    $userrole = $_SESSION['userrole'];
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <title>Promotion History</title>
    <link rel="shortcut icon" type="image/png" href="img/logo.png"/>
</head>

<body>
    <div class="main-wrapper">
        <div class="app" id="app" class="app header-fixed sidebar-fixed">
            <?php
                    $page = 'promotion';
                    include 'fixbar.php';
            ?>
            <?php
                    $status=$_GET['status'];
                    if($status=='success') {
                        echo "<script>
                        $(document).ready(function(){
                            $('#myModal').modal({backdrop: false});
                            $('#myModal').modal('toggle');
                            setTimeout(function() {
                                $('#myModal').modal('hide');
                            }, 3000);
                        });
                        </script>";
                    }
                    else if($status=='fail'){
                        echo "<script>
                        $(document).ready(function(){
                            $('#myModal2').modal({backdrop: false});
                            $('#myModal2').modal('toggle');
                            setTimeout(function() {
                                $('#myModal2').modal('hide');
                            }, 3000);
                        });
                        </script>";
                    }
            ?>
            <!-- Start Content Here -->
            <article class="content responsive-tables-page">
                <section class="section">
                    <!-- The Modal -->
                    <div class="modal fade right" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-side modal-bottom-right" role="document">

                            <div class="modal-content">

                                <!-- Modal body -->
                                <div class="modal-body success-color">
                                    <span style="color: white;font-weight: bold">Successfully</span>
                                    <br>
                                    <span style="color: white">Added 1 record.</span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal fade right" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-side modal-bottom-right" role="document">

                            <div class="modal-content">

                                <!-- Modal body -->
                                <div class="modal-body danger-color">
                                    <span style="color: white;font-weight: bold">Unsuccessful</span>
                                    <br>
                                    <span style="color: white">Please try again.</span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php
                        if($userrole == 4){
                            echo '<div class="row">
                                    <div class="col-md-12">
                                        <a class="btn btn-danger float-right" href="demotionstaff.php">
                                        <i class="fa fa-arrow-circle-down"></i> Demote</a>
                                        <a class="btn btn-success float-right" href="promotionstaff.php" style="margin-right: 0.5em;">
                                        <i class="fa fa-arrow-circle-up"></i> Promote</a>
                                    </div>
                                  </div>';
                        }
                    ?>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card">
                                <div class="card-block">
                                    <div class="card-title-block">
                                        <h3 class="title"> Promotion History </h3>
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
                loadPromotion(0,0,0);

                function loadPromotion(edit, select1, select2) {
                    var xmlhttp = new XMLHttpRequest();
                    var url = location.protocol + '//' + location.host + "/cpe231project/getpromotion.php";

                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            displayResponse(xmlhttp.responseText, edit, select1, select2);
                        }
                    }
                    xmlhttp.open("GET", url, true);
                    xmlhttp.send();
                }

                function displayResponse(response, edit, select1, select2) {
                    var arr = JSON.parse(response);
                    var i;
                    if (edit == 0) {
                        var out = '<table class="table table-striped table-bordered table-hover flip-content">' +
                        '<thead class="flip-header"><tr><th style="text-align: center;">Staff ID</th>' +
                        '<th style="text-align: center;"> Name</th><th style="text-align: center;">Start Date</th>' +
                        '<th style="text-align: center;">Last Date</th><th style="text-align: center;">Previous Position</th>' +
                        '<th style="text-align: center;">Previous Department</th><th style="text-align: center;">Status</th>';

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
                                "   " +
                                arr[i].lName +
                                "</td><td>" +
                                arr[i].startDate +
                                "</td><td>" +
                                arr[i].endDate +
                                "</td><td>" +
                                arr[i].prevPosition +
                                "</td><td>" +
                                arr[i].prevDepartment +
                                "</td><td>" +
                                arr[i].status +
                                "</td>";
                                if(userrole == 4){
                                    out += "<td>" +
                                           "<button onclick=\"loadPromotion(1,'" + arr[i].staffID + "','" + arr[i].startDate + "')\">Edit</button>" +
                                           "</td><td>" +
                                           "<button onclick=\"deletePromo('" + arr[i].staffID + "','" + arr[i].startDate + "')\">Delete</button>" +
                                           "</td>";
                                }
                            out += '</tr>';
                        }
                        out += "</table>";
                        document.getElementById("id01").innerHTML = out;
                    } else if (edit == 1) {
                        var out = '<table class="table table-striped table-bordered table-responsive table-hover flip-content">' +
                        '<thead class="flip-header"><tr><th style="text-align: center;">Staff ID</th>' +
                        '<th style="text-align: center;"> Name</th><th style="text-align: center;">Start Date</th>' +
                        '<th style="text-align: center;">Last Date</th><th style="text-align: center;">Previous Position</th>' +
                        '<th style="text-align: center;">Previous Department</th><th style="text-align: center;">Status</th>' +
                        '<th style="text-align: center;">Save</th><th style="text-align: center;">Cancel</th></tr></thead>' +
                        '<tbody>';

                        for (i = 0; i < arr.length; i++) {
                            if (select1 == arr[i].staffID && select2 == arr[i].startDate) {
                                out += "<tr><td>" +
                                arr[i].staffID +
                                "</td><td>" +
                                arr[i].fName +
                                "   " +
                                arr[i].lName +
                                "</td><td>" +
                                '<input type="date" name="estartDate" style="width:115px; font-size: 12px;" class="form-control underlined" value="' +
                                arr[i].startDate +
                                '">' +
                                "</td><td>" +
                                '<input type="date" name="eendDate" style="width:115px; font-size: 12px;" class="form-control underlined" value="' +
                                arr[i].endDate +
                                '">' +
                                "</td><td>" +
                                '<input type="text" name="eprevPosition" style="font-size: 12px;" class="form-control underlined" value="' +
                                arr[i].prevPosition +
                                '">' +
                                "</td><td>" +
                                '<input type="text" name="eprevDepartment" style="font-size: 12px;" class="form-control underlined" value="' +
                                arr[i].prevDepartment +
                                '">' +
                                "</td><td>" +
                                '<input type="text" name="estatus" style="font-size: 12px;" class="form-control underlined" value="' +
                                arr[i].status +
                                '">' +
                                "</td><td>" +
                                "<button onclick=\"editPromo('" + arr[i].staffID + "','" + arr[i].startDate + "')\">Save</button>" +
                                "</td><td>" +
                                "<button onclick=\"loadPromotion(0,0,0)\">Cancel</button>" +
                                "</td></tr>";
                            } else {
                                out += "<tr><td>" +
                                arr[i].staffID +
                                "</td><td>" +
                                arr[i].fName +
                                "   " +
                                arr[i].lName +
                                "</td><td>" +
                                arr[i].startDate +
                                "</td><td>" +
                                arr[i].endDate +
                                "</td><td>" +
                                arr[i].prevPosition +
                                "</td><td>" +
                                arr[i].prevDepartment +
                                "</td><td>" +
                                arr[i].status +
                                "</td><td>" +
                                "</td><td>" +
                                "</td></tr>";
                            }
                        }
                        out += "</table>";
                        document.getElementById("id01").innerHTML = out;
                    }
                }

                function editPromo(staffID,startDate) {
                    console.log(staffID);
                    console.log(startDate);
                    var esdate = document.getElementsByName("estartDate")[0].value;
                    var eedate = document.getElementsByName("eendDate")[0].value;
                    var epos = document.getElementsByName("eprevPosition")[0].value;
                    var edep = document.getElementsByName("eprevDepartment")[0].value;
                    var estatus = document.getElementsByName("estatus")[0].value;
                    console.log(esdate);
                    console.log(eedate);
                    console.log(epos);
                    console.log(edep);
                    console.log(estatus);

                    var xmlhttp = new XMLHttpRequest();
                    var url = location.protocol + '//' + location.host + "/cpe231project/editpromotion.php?staffID=" +
                        staffID + "&startDate=" + startDate + "&estartDate=" + esdate + "&eendDate=" + eedate +
                        "&eprevPosition=" + epos + "&eprevDepartment=" + edep + "&estatus=" + estatus;
                    console.log(url);
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            //displayResponse(xmlhttp.responseText);
                            loadPromotion(0,0,0);
                        }
                    }
                    xmlhttp.open("GET", url, true);
                    xmlhttp.send();
                }

                function deletePromo(staffID,startDate) {
                    var xmlhttp = new XMLHttpRequest();
                    var url = location.protocol + '//' + location.host + "/cpe231project/deletepromotion.php?staffID=" +
                        staffID + "&startDate=" + startDate;
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            //displayResponse(xmlhttp.responseText);
                            loadPromotion(0,0,0);
                        }
                    }
                    xmlhttp.open("GET", url, true);
                    xmlhttp.send();
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
