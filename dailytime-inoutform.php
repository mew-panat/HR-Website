<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title> Dailytime </title>
        <link rel="shortcut icon" type="image/png" href="img/logo.png"/>
    </head>
    <body>
        <div class="main-wrapper">
            <div class="app" id="app" class="app header-fixed sidebar-fixed">
                <?php
                include 'fixbar.php';
                ?>
                <!-- Start Content Here -->
                <article class="content forms-page">
                    <div class="sidebar-overlay" id="sidebar-overlay"></div>
                    <div class="sidebar-mossbile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                    <div class="mobile-menu-handle"></div>

                    <div class="title-block">
                        <h3 class="title">Daily Time Read</h3>
                    </div>

                    <section class="section">
                        <div class="row sameheight-container">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="subtitle-block" style="border-bottom: 0em">
                                    <h5 class="subtitle"> Please fill out this form completely and accurately </h5>
                                </div>
                                <div class="card card-block sameheight-item">
                                    <div class="form-group">
                                        <form role="form" id="contact" action="sendinoutform.php" method="get">

                                            <div class="form-inline">
                                                <span>Staff ID &nbsp;</span>
                                                <input type="text" name="staffID" class="form-control underlined" required>
                                            </div>
                                            <br>
                                            <div class="form-inline">
                                                <span>Date &nbsp;</span>
                                                <input type="date" name="date" class="form-control underlined" required>
                                            </div>
                                            <br>
                                            <div class="form-inline">
                                                <span>Time&nbsp;</span>
                                                <input type="time" name="time" class="form-control underlined" required>
                                            </div>
                                            <br>
                                            <div class="form-inline">
                                                <span>Time &nbsp; &nbsp;</span>

                                                <input type="radio" name="check" value="chkin" required> &nbsp;
                                                <span>Check in</span> &nbsp; &nbsp;

                                                <input type="radio" name="check" value="chkout" required> &nbsp;
                                                <span>Check out</span>&nbsp; &nbsp;
                                            </div>
                                            <br>


                                            <div class="form-inline" style="display: flex; align-items: center; justify-content: center;">
                                                <input class="btn btn-primary btn-lg" type="submit" value="Submit"></input>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </section>
                </article>
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
