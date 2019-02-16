<!doctype html>
<html class="no-js" lang="en">

<head>   
    <title> Demotion </title>    
    <link rel="shortcut icon" type="image/png" href="img/logo.png"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>   
</head>

<body>
    <div class="main-wrapper">
        <div class="app" id="app" class="app header-fixed sidebar-fixed">
            <?php
                $page = 'promotion';
                include 'fixbar.php';
            ?>            
            <!-- Start Content Here -->
            <article class="content forms-page">
                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mossbile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>

                <div class="subtitle-block">
                    <h3 class="subtitle"> Demotion </h3>
                </div>

                <section class="section">

                    <div class="row sameheight-container">
                        <div class="col-md-12">
                            <div class="card card-block sameheight-item">
                                <form role="form" id="senddemote" action="senddemote.php" method="GET">
                                    <div class="form-group">
                                        <br>
                                        <div>
                                            <div style="font-weight:bold;"> Demotion </div>
                                            </label>
                                            <br>
                                            <div class="form-inline">
                                                <span>Staff ID</span>
                                                <input type="text" name="staffID" class="form-control underlined" size="25">
                                            </div>
                                            <br>
                                            <div class="form-inline">
                                                <span>Firstname&nbsp;</span>
                                                <input type="text" name="firstname" class="form-control underlined" size="40">
                                                <span>Lastname&nbsp;</span>
                                                <input type="text" name="lastname" class="form-control underlined" size="40">
                                            </div>
                                            <br>
                                            <span> New Position </span>
                                            <div class="form-inline">
                                                <span style="margin-left: 3%">Department &nbsp;</span>
                                                <select id="dropdowndepartment" class="form-control" name="newdepartment">
                                                </select>
                                                <span> &nbsp; Position &nbsp;</span>
                                                <select id="dropdownposition" class="form-control" name="newposition">
                                                    <option value="Choose your option" disabled selected>Choose your option</option>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="form-inline">
                                                <span style="margin-right: 2%">Start Date </span>
                                                <input type="date" name="startdate" class="form-control underlined" size="45">
                                            </div>
                                            <div class="form-group">
                                                <br>
                                                <span style="margin-right: 2%">Reason for Demotion</span>
                                                <input type="text" name="reason" class="form-control underlined" size="100">
                                            </div>
                                            <br>
                                        </div>
                                        </div>
                                    <div class="form-inline" style="display: flex; align-items: center; justify-content: center;">
                                        <input class="btn btn-primary btn-lg" type="submit" value="Submit"></input>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>                
            </article>
            <script>
                loadDepartment();
                $('#dropdowndepartment').change(createSelect2);

                function createSelect2() {
                    var option = $(this).find(':selected').val(),
                        dataString = option;
                    if (option != '') {
                        loadPosition(dataString);
                    }
                }

                function loadDepartment() {
                    var xmlhttp = new XMLHttpRequest();
                    var url = location.protocol + '//' + location.host + "/cpe231project/getdepartment.php";

                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            displayResponseDepartment(xmlhttp.responseText);
                        }
                    }
                    xmlhttp.open("GET", url, true);
                    xmlhttp.send();
                }

                function displayResponseDepartment(response) {
                    var arr = JSON.parse(response);
                    var i;
                    var out = '<option value="" disabled selected>Choose your option</option>';

                    for (i = 0; i < arr.length; i++) {
                        out += '<option value="' +
                            arr[i].departmentName +
                            '">' +
                            arr[i].departmentName +
                            '</option>';
                    }
                    document.getElementById("dropdowndepartment").innerHTML = out;
                }

                function loadPosition(optionval) {
                    var xmlhttp = new XMLHttpRequest();
                    var url = location.protocol + '//' + location.host +
                        "/cpe231project/getposition.php?departmentName=" + optionval;

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
                    var out = '<option value="" disabled selected>Choose your option</option>';

                    for (i = 0; i < arr.length; i++) {
                        out += '<option value="' +
                            arr[i].positionName +
                            '">' +
                            arr[i].positionName +
                            '</option>';
                    }
                    document.getElementById("dropdownposition").innerHTML = out;
                }
            </script>
            <!-- End Content Here -->
            <footer class="footer">
                <div class="container-fluid author">
                    <ul style="text-align: right;">
                        <li> ? 2018 CPE30 All Rights Reserved.</li>
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