<?php
    session_start();
    $userrole = $_SESSION['userrole'];
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>        
        <title> Employees </title> 
        <link rel="shortcut icon" type="image/png" href="img/logo.png"/>                     
    </head>
    <body>
        <div class="main-wrapper">
            <div class="app" id="app" class="app header-fixed sidebar-fixed">
                <?php
                    $page = 'employees';
                    include 'fixbar.php';
                ?>      
               
                <!-- Start Content Here -->
                <article class="content responsive-tables-page">
                    <section class="section">
                        <?php
                            if($userrole == 4){
                                echo '<div class="row">
                                        <div class="col-md-12">
                                            <a class="btn btn-primary float-right" href="formstaff.php">
                                            <i class="fa fa-plus"></i> New staff</a>
                                        </div>
                                      </div>';
                            }
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="card-title-block">
                                            <h3 class="title"> Employees </h3>
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
                loadDailyTimeCard();
                function loadDailyTimeCard(){
                var xmlhttp = new XMLHttpRequest();
                var url = location.protocol + '//' + location.host+"/cpe231project/getemployees.php";
                
                xmlhttp.onreadystatechange=function() {
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
                    var out = '<table class="table table-striped table-bordered table-hover flip-content">'+
                    '<thead class="flip-header"><tr><th style="text-align:center;">Staff Name</th>' + 
                    '<th style="text-align:center;">Position</th><th style="text-align:center;">Department</th>';
                    var userrole = <?= $userrole ?>;
                    if(userrole == 4){
                            out += '<th style="text-align:center;">Status</th>';
                        }
                    out += '</tr></thead>' + '<tbody>';

                    for(i = 0; i < arr.length; i++) {
                        out += '<tr><td>' + 
                        arr[i].fName + " " +
                        arr[i].lName +
                        '</td><td>' +
                        arr[i].positionName +
                        '</td><td>' +
                        arr[i].departmentName +
                        '</td>';
                        if(userrole == 4){
                            out += '<td>' +
                                   arr[i].Status + '</td>';
                        }                       
                        out += '</tr>';
                    }
                    out += "</table>";
                    document.getElementById("id01").innerHTML = out;
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
        </script>        
    </body>
</html>
