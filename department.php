<?php
    session_start();
    $userrole = $_SESSION['userrole'];
    if($userrole == 1 || $userrole == 2){
        header('Location: index.php');
    }
?>
<!doctype html>
<html class="no-js" lang="en">

<head>   
    <title> Department </title>  
    <link rel="shortcut icon" type="image/png" href="img/logo.png"/> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
</head>

<body>
    <div class="main-wrapper">
        <div class="app" id="app" class="app header-fixed sidebar-fixed">
            <?php
                $page = 'department';
                include 'fixbar.php';
            ?>                           
            <!-- Start Content Here -->
            <article class="content">
                <section id="id01" class="section">
                </section>
            </article>
            <script>
                    loadDailyTimeCard();
                    
                    function loadDailyTimeCard(){
                    var xmlhttp = new XMLHttpRequest();
                    var url = location.protocol + '//' + location.host+"/cpe231project/getdepartment.php";
                    
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
                        var r = 0;
                        var out = '<div class="row">';
                    
                        for(i = 0; i < arr.length; i++) {
                            if(r < 3){
                                r++;
                            }
                            else{
                                r=0;
                                r++;
                                out += '<div class="row">';
                            }
                            out += '<div class="col-xl-4"><a href="' +
                            arr[i].page +
                            '" style="text-decoration: none"><div class="card card-default animated infinite pulse" style="padding-bottom:5%; padding-top :5%;"><div class="card-header"><div class="header-block"><p class="title" style="padding: 5px 10px;">' + 
                            arr[i].departmentName +
                            '</p></div></div></div></a></div>';
                            if(r == 3){
                                out += '</div>';
                            }
                            console.log(r);
                        }
                        document.getElementById("id01").innerHTML = out;
                    }
                    </script>
            <!--script>
                $(document).ready(function(){
                    $("#graphic").hover(function(){
                        $(this).addClass("animated");
                    }, function(){
                        $(this).removeClass("animated");
                    });
                });
            </script-->
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
