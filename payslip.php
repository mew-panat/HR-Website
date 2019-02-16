<!doctype html>
<html class="no-js" lang="en">

<head>
    <title> Payslip </title>
    <link rel="shortcut icon" type="image/png" href="img/logo.png"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>    
</head>

<body>
    <div class="main-wrapper">
        <div class="app" id="app" class="app header-fixed sidebar-fixed">
            <?php
                    $page = 'payslip';
                    include 'fixbar.php';                         
              
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


                <article class="content forms-page">
                    <div class="sidebar-overlay" id="sidebar-overlay"></div>
                    <div class="sidebar-mossbile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                    <div class="mobile-menu-handle"></div>

                    <div class="title-block">
                        <h3 class="title">Monthly Payslip</h3>
                        <p class="title-description">Monthly Payslip for Employees</p>
                    </div>

                    <section class="section">
                        <div class="row sameheight-container">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="subtitle-block" style="border-bottom: 0em">
                                    <h3 class="subtitle"> Please fill out this form completely and accurately </h3>
                                </div>

                                <div class="card card-block sameheight-item">
                                    <div class="form-group">
                                        <form role="form" id="contact" action="sendpayslip.php" method="get">
                                            <div class="form-inline float-right">
                                                    <span>Date : &nbsp;</span>
                                                    <?php
                                                        echo date("Y-m-d");
                                                    ?>                                                                                                       
                                            </div>
                                            <br>
                                            <div class="form-inline">
                                                <span>Staff ID &nbsp;</span>
                                                <input type="text" name="staffID" class="form-control underlined">
                                                <span>Account No.&nbsp;&nbsp;</span>
                                                <input type="text" name="accountNo" class="form-control underlined"> &nbsp;&nbsp;
                                            </div> 
                                            <br><br>                                           
                                            
                                            <p class="title-description">Monthly Payslip</p>                                            
                                            <br>
                                            <div class="form-inline">
                                                <span>Type &nbsp;&nbsp;</span>
                                                    <select id="type01" class="form-control" name="pay_type">&nbsp;&nbsp;  
                                                        <option value="" disabled selected>Choose your option</option> 
                                                        <option value="Income">Income</option>
                                                        <option value="Deduction">Deduction</option>
                                                    </select>
                                                <span>&nbsp;&nbsp;Name &nbsp;&nbsp;</span>
                                                    <select id="type02" class="form-control" name="type_name">
                                                        <option value="Choose your option" disabled selected>Choose your option</option>
                                                    </select>
                                            </div>
                                            <br> 
                                            <div class="form-inline">
                                                <span> Description &nbsp;</span>                                             
                                                <input class="form-control underlined" name="Description" size="50px"></input>                                                
                                            </div>
                                            <br>
                                            <div class="form-inline">                                                
                                                <span>Amount &nbsp;&nbsp;</span>
                                                <input type="text" name="totalAmount" class="form-control underlined"> 
                                                <span>Baht &nbsp;&nbsp;</span>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="form-inline" style="display: flex; align-items: center; justify-content: center;">
                                                <input class="btn btn-primary btn-lg" type="submit" value="Submit"></input>

                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </section>
                </article>

                <script>
                    
                    $('#type01').change(createSelect2);

                    function createSelect2() {
                        var option = $(this).find(':selected').val(),
                            dataString = option;
                        if (option != '') {
                            loadName(dataString);
                        }
                    }

                    function loadName(optionval) {
                        var xmlhttp = new XMLHttpRequest();
                        var url = location.protocol + '//' + location.host +
                            "/cpe231project/gettypepay.php?Name=" + optionval;

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
                                arr[i].payName +
                                '">' +
                                arr[i].payName +
                                '</option>';
                        }
                        document.getElementById("type02").innerHTML = out;
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