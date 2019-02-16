<!doctype html>
<html class="no-js" lang="en">

<head>    
    <title> Add Staff </title>   
    <link rel="shortcut icon" type="image/png" href="img/logo.png"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>   
</head>

<body>
    <div class="main-wrapper">
        <div class="app" id="app" class="app header-fixed sidebar-fixed">
            <?php
                $page = 'employee';
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

                    <div class="subtitle-block">
                        <h3 class="subtitle"> New Employee </h3>
                    </div>

                    <section class="section">

                        <div class="row sameheight-container">
                            <div class="col-md-12">
                                <div class="card card-block sameheight-item">
                                    <form role="form" id="newstaff">
                                        <div class="form-group">
                                            <br>
                                            <div>
                                                <div style="font-weight:bold;"> Personal Information </div>
                                                </label>
                                                <br>
                                                <div class="row" style="margin-left: 2%">
                                                    <div class="col-md-12">
                                                        <div class="form-inline">
                                                        <div class="form-inline">
                                                                <span>Staff ID&nbsp;</span>
                                                                <input type="text" name="staffID" class="form-control underlined"><br>
                                                            </div>
                                                            
                                                        </div>
                                                        <br>
                                                        <div class="form-inline">   
                                                            <span>Department&nbsp;&nbsp;</span>
                                                            <select id="dep01" class="form-control" name="cur_department">
                                                            </select>                                                   
                                                            <span>&nbsp;&nbsp;Position &nbsp;&nbsp;</span> 
                                                            <select id="pos01" class="form-control" name="cur_position">
                                                            <option value="Choose your option" disabled selected>Choose your option</option>
                                                            </select> 
                                                            <span>&nbsp;&nbsp;Salary&nbsp;</span>
                                                            <input type="float" name="baseSalary" class="form-control underlined" size="15">
                                                            <span>Bath</span>
                                                        </div>
                                                        <br>
                                                        <div class="form-inline">
                                                        <br>
                                                            <span>Firstname&nbsp;</span>
                                                            <input type="text" name="firstname" class="form-control underlined" size="45">
                                                            <span>Lastname&nbsp;</span>
                                                            <input type="text" name="lastname" class="form-control underlined" size="45">
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <span>Address&nbsp;</span>
                                                            <input type="text" name="address" class="form-control underlined" size="100">
                                                        </div>
                                                        <div class="form-inline">
                                                            <span>E-mail&nbsp;</span>
                                                            <input type="email" name="email" class="form-control underlined" size="60">
                                                            <span>Telephone&nbsp;</span>
                                                            <input type="tel" name="tel" class="form-control underlined" size="30">
                                                        </div>
                                                        <div class="form-inline">
                                                            <span style="margin-right: 1%">Date of Birth&nbsp;</span>
                                                            <input type="date" name="DOB" class="form-control underlined" size="50">
                                                            <span style="margin-left: 2%">Age &nbsp;</span>
                                                            <input type="int" name="age" class="form-control underlined" size="10">
                                                            <span style="margin-left: 2%">Gender &nbsp;</span>
                                                            <input type="radio" name="gender" value="f" size="10" style="margin-left: 1%">&nbsp;Female</input>
                                                            <input type="radio" name="gender" value="m" size="10" style="margin-left: 1%">&nbsp;Male</input>
                                                        </div>
                                                        <br>

                                                        <div class="form-inline">
                                                            <br>
                                                            <span style="margin-right: 3%">Marital Status</span>
                                                            <input type="radio" name="marital" value="single"> &nbsp;
                                                            <span> Single </span> &nbsp;
                                                            <input type="radio" name="marital" value="married" style="margin-left: 2%"> &nbsp;
                                                            <span> Married </span> &nbsp;
                                                            <input type="radio" name="marital" value="separated" style="margin-left: 2%"> &nbsp;
                                                            <span> Separated </span> &nbsp;
                                                            <input type="radio" name="marital" value="widowed" style="margin-left: 2%"> &nbsp;
                                                            <span> Widowed </span> &nbsp;
                                                            <input type="radio" name="marital" value="divorced" style="margin-left: 2%"> &nbsp;
                                                            <span> Divorced </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="row sameheight-container">
                            <div class="col-md-12">
                                <div class="card card-block">
                                    <div style="font-weight:bold;">Education Background</div>
                                    <br>
                                    <div id="eduhistory" class="row" style="margin-left: 2%">
                                        <div id="file-0" class="col-md-12">
                                            <div class="form-inline">
                                                <span>University Name&nbsp;</span>
                                                <input type="text" name="UniName" class="form-control underlined" size="50">
                                            </div>
                                            <br>
                                            <div class="form-inline">
                                                <span>Degree&nbsp;&nbsp;</span>
                                                <select class="form-control" name="degree">
                                                    <option value="">Choose your option</option>
                                                    <option value="Bachelor">Bachelor</option>
                                                    <option value="Master">Master</option>
                                                    <option value="Doctor">Doctor</option>
                                                </select>
                                            </div>
                                            <div class="form-inline">
                                                <span>Faculty&nbsp;&nbsp;</span>
                                                <input type="text" name="faculty" class="form-control underlined" size="40">
                                                <span>Department&nbsp;&nbsp;</span>
                                                <input type="text" name="UniDepartment" class="form-control underlined" size="50">
                                            </div>
                                            <div class="form-inline">
                                                <span style="margin-right: 1%">From Date&nbsp;&nbsp;</span>
                                                <input type="date" name="fromDate" class="form-control underlined" size="50">
                                                <span style="margin-right: 1%">To Date&nbsp;&nbsp;</span>
                                                <input type="date" name="toDate" class="form-control underlined" size="50">
                                            </div>
                                            <div class="form-inline">
                                                <span>GPAX&nbsp;&nbsp;</span>
                                                <input type="float" name="gpax" class="form-control underlined" size="10">
                                            </div>                    
                                        </div>
                                    </div>
                                    <div class="row" style="margin-left: 2%">
                                        <div class="col-md-12"><button type="button" class="btn btn-primary float-right" onclick="addEduHistory()"><i class="fa fa-plus"></i></button></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row sameheight-container">
                            <div class="col-md-12">
                                <div class="card card-block">
                                    <div style="font-weight:bold;">Work History</div>
                                    <br>
                                    <div id="workhistory" class="row" style="margin-left: 2%">
                                        <div id="file-0" class="col-md-12">
                                            <div class="form-inline">
                                                <span>Company Name&nbsp;&nbsp;</span>
                                                <input type="text" name="companyName" class="form-control underlined" size="50">
                                            </div>
                                            <div class="form-inline">
                                                <span style="margin-right: 1%">Date Employed&nbsp;&nbsp;</span>
                                                <input type="date" name="startDate" class="form-control underlined" size="50">
                                                <span style="margin-right: 1%">To&nbsp;&nbsp;</span>
                                                <input type="date" name="endDate" class="form-control underlined" size="50">
                                            </div>
                                            <div class="form-inline">
                                                <span>First Position&nbsp;&nbsp;</span>
                                                <input type="text" name="fPosition" class="form-control underlined" size="40">
                                                <span>Last Position&nbsp;&nbsp;</span>
                                                <input type="text" name="lPosition" class="form-control underlined" size="40">
                                            </div>
                                            <div class="form-inline">
                                                <span>Start Salary&nbsp;&nbsp;</span>
                                                <input type="float" name="startSalary" class="form-control underlined" size="30">
                                                <span>End Salary&nbsp;&nbsp;</span>
                                                <input type="float" name="endSalary" class="form-control underlined" size="30">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-left: 2%">
                                        <div class="col-md-12"><button type="button" class="btn btn-primary float-right" onclick="addWorkHistory()"><i class="fa fa-plus"></i></button></div>
                                    </div>
                                </div>
                            </div>
                    </section>
                    <div class="form-inline" style="display: flex; align-items: center; justify-content: center;">
                        <button class="btn btn-primary btn-lg" type="button" onclick="submitForm()">Submit</button>
                    </div>
            </article>

            <script>
                loadDepartment();
                $('#dep01').change(createSelect2);

                var fileId = 0;
                function addWorkHistory(){                    
                    fileId++; // increment fileId to get a unique ID for the new element                    
                    var html = '<br><div class="form-inline">' +
                                                '<span>Company Name&nbsp;&nbsp;</span>' +
                                                '<input type="text" name="companyName" class="form-control underlined" size="50">' +
                                            '</div>' +
                                            '<div class="form-inline">' +
                                                '<span style="margin-right: 1%">Date Employed&nbsp;&nbsp;</span>' +
                                                '<input type="date" name="startDate" class="form-control underlined" size="50">' +
                                                '<span style="margin-right: 1%">To&nbsp;&nbsp;</span>' +
                                                '<input type="date" name="endDate" class="form-control underlined" size="50">' +
                                            '</div>' +
                                            '<div class="form-inline">' +
                                                '<span>First Position&nbsp;&nbsp;</span>' +
                                                '<input type="text" name="fPosition" class="form-control underlined" size="40">' +
                                                '<span>Last Position&nbsp;&nbsp;</span>' +
                                                '<input type="text" name="lPosition" class="form-control underlined" size="40">' +
                                            '</div>' +
                                            '<div class="form-inline">' +
                                                '<span>Start Salary&nbsp;&nbsp;</span>' +
                                                '<input type="float" name="startSalary" class="form-control underlined" size="30">' +
                                                '<span>End Salary&nbsp;&nbsp;</span>' +
                                                '<input type="float" name="endSalary" class="form-control underlined" size="30">' +
                                            '</div>';
                    addElement('workhistory', 'div', 'file-' + fileId, html);
                }

                function addEduHistory(){                    
                    fileId++; // increment fileId to get a unique ID for the new element
                    var html = '<br><div class="form-inline">' +
                                                '<span>University Name&nbsp;</span>' +
                                                '<input type="text" name="UniName" class="form-control underlined" size="50">' +
                                            '</div>' +
                                            '<br>' +
                                            '<div class="form-inline">' +
                                                '<span>Degree&nbsp;&nbsp;</span>' +
                                                '<select class="form-control" name="degree">' +
                                                    '<option value="">Choose your option</option>' +
                                                    '<option value="Bachelor">Bachelor</option>' +
                                                    '<option value="Master">Master</option>' +
                                                    '<option value="Doctor">Doctor</option>' +
                                                '</select>' +
                                            '</div>' +
                                            '<div class="form-inline">' +
                                                '<span>Faculty&nbsp;&nbsp;</span>' +
                                                '<input type="text" name="faculty" class="form-control underlined" size="40">' +
                                                '<span>Department&nbsp;&nbsp;</span>'+
                                                '<input type="text" name="UniDepartment" class="form-control underlined" size="50">' +
                                            '</div>' +
                                            '<div class="form-inline">' +
                                                '<span style="margin-right: 1%">From Date&nbsp;&nbsp;</span>' +
                                                '<input type="date" name="fromDate" class="form-control underlined" size="50">' +
                                                '<span style="margin-right: 1%">To Date&nbsp;&nbsp;</span>' +
                                                '<input type="date" name="toDate" class="form-control underlined" size="50">' +
                                            '</div>' +
                                            '<div class="form-inline">' +
                                                '<span>GPAX&nbsp;&nbsp;</span>' +
                                                '<input type="float" name="gpax" class="form-control underlined" size="10">' +
                                            '</div>';                    
                    addElement('eduhistory', 'div', 'file-' + fileId, html);
                }

                function addElement(parentId, elementTag, elementId, html) {
                    // Adds an element to the document
                    var p = document.getElementById(parentId);
                    var newElement = document.createElement(elementTag);
                    newElement.setAttribute('id', elementId);
                    newElement.classList.add('col-md-12');
                    newElement.innerHTML = html;
                    p.appendChild(newElement);
                    
                }                

                function submitForm(){
                    var personalData; 
                    var educationData;
                    var workData;  

                    personalData = {"staffID": document.getElementsByName("staffID")[0].value,
                                             "department": document.getElementsByName("cur_department")[0].value,
                                             "position": document.getElementsByName("cur_position")[0].value,
                                             "salary": document.getElementsByName("baseSalary")[0].value,
                                             "firstname": document.getElementsByName("firstname")[0].value,
                                             "lastname": document.getElementsByName("lastname")[0].value,
                                             "address": document.getElementsByName("address")[0].value,
                                             "email": document.getElementsByName("email")[0].value,
                                             "telephone": document.getElementsByName("tel")[0].value,
                                             "DOB": document.getElementsByName("DOB")[0].value,
                                             "age": document.getElementsByName("age")[0].value,
                                             "gender": getRadioValue('gender'),
                                             "marital": getRadioValue('marital')}
                    
                    for(var i=0;i<document.getElementsByName("UniName").length;i++){
                    var degree_checked = $('input:radio[name=degree]:checked').val();
                    educationData = {"university": document.getElementsByName("UniName")[i].value,
                                              "degree": document.getElementsByName("degree")[i].value,
                                              "faculty": document.getElementsByName("faculty")[i].value,
                                              "department": document.getElementsByName("UniDepartment")[i].value,
                                              "fromDate": document.getElementsByName("fromDate")[i].value,
                                              "toDate": document.getElementsByName("toDate")[i].value,
                                              "gpax": document.getElementsByName("gpax")[i].value}

                    $.ajax({url: 'sendstaff.php',dataType: "text", type: 'post', data: { s_personal: personalData ,s_education: educationData}, 
					success: function(result){
								console.log(result);                                                        
								if(result == 'success'){
									//window.location = 'incomplete.php';
                                     console.log("yeah");
								}
							}
						});
                    }

                    for(var i=0;i<document.getElementsByName("companyName").length;i++){ 
                    
                    workData = {"company": document.getElementsByName("companyName")[i].value,
                                         "startDate": document.getElementsByName("startDate")[i].value,
                                         "endDate": document.getElementsByName("endDate")[i].value,
                                         "fPosition": document.getElementsByName("fPosition")[i].value,
                                         "lPosition": document.getElementsByName("lPosition")[i].value,
                                         "startSalary": document.getElementsByName("startSalary")[i].value,
                                         "endSalary": document.getElementsByName("endSalary")[i].value} 
                    
                                $.ajax({url: 'sendstaff2.php',dataType: "text", type: 'post', data: {s_personal: personalData,s_work: workData}, 
										success: function(result){
										console.log(result);
										if(result == 'success'){
											//window.location = 'incomplete.php';
                                            console.log("yeah");
										}
									}
							    });
                    }
                }
                

                function getRadioValue(theRadioGroup){
                        var elements = document.getElementsByName(theRadioGroup);
                        for (var i = 0; i < elements.length; i++){
                            if (elements[i].checked){
                                return elements[i].value;
                            }
                        }
                }    

                function createSelect2() {
                    var option = $(this).find(':selected').val(),
                    dataString = option;
                    if(option != ''){
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
                    document.getElementById("dep01").innerHTML = out;
                }

                function loadPosition(optionval) {
                    var xmlhttp = new XMLHttpRequest();
                    var url = location.protocol + '//' + location.host + "/cpe231project/getposition.php?departmentName=" + optionval;

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
                    document.getElementById("pos01").innerHTML = out;
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