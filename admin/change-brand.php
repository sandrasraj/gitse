<!DOCTYPE html>
<?php include 'logincheck.php'; ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Gitse | List brand</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="plugins/morris/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>

            .hovereffect {
                width:100%;
                height:100%;
                float:left;
                overflow:hidden;
                position:relative;
                text-align:center;
                cursor:default;
            }

            .hovereffect .overlay {
                width:100%;
                height:100%;
                position:absolute;
                overflow:hidden;
                top:0;
                left:0;
                opacity:0;
                background-color:rgba(0,0,0,0.5);
                -webkit-transition:all .4s ease-in-out;
                transition:all .4s ease-in-out
            }

            .hovereffect img {
                display:block;
                position:relative;
                -webkit-transition:all .4s linear;
                transition:all .4s linear;
            }

            .hovereffect h2 {
                text-transform:uppercase;
                color:#fff;
                text-align:center;
                position:relative;
                font-size:17px;
                background:rgba(0,0,0,0.6);
                -webkit-transform:translatey(-100px);
                -ms-transform:translatey(-100px);
                transform:translatey(-100px);
                -webkit-transition:all .2s ease-in-out;
                transition:all .2s ease-in-out;
                padding:10px;
            }

            .hovereffect a.info {
                text-decoration:none;
                display:inline-block;
                text-transform:uppercase;
                color:#fff;
                border:1px solid #fff;
                background-color:transparent;
                opacity:0;
                filter:alpha(opacity=0);
                -webkit-transition:all .2s ease-in-out;
                transition:all .2s ease-in-out;
                margin:50px 0 0;
                padding:7px 14px;
            }

            .hovereffect a.info:hover {
                box-shadow:0 0 5px #fff;
            }

            .hovereffect:hover img {
                -ms-transform:scale(1.2);
                -webkit-transform:scale(1.2);
                transform:scale(1.2);
            }

            .hovereffect:hover .overlay {
                opacity:1;
                filter:alpha(opacity=100);
            }

            .hovereffect:hover h2,.hovereffect:hover a.info {
                opacity:1;
                filter:alpha(opacity=100);
                -ms-transform:translatey(0);
                -webkit-transform:translatey(0);
                transform:translatey(0);
            }

            .hovereffect:hover a.info {
                -webkit-transition-delay:.2s;
                transition-delay:.2s;
            }
            #uploadmodal .fileinput{
                width: 20%;
                margin: auto;
            }
        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php include_once 'header.php'; ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php include_once 'left-menu.php'; ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        brands
                        <small>List Brands</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">List Brands</li>
                    </ol>
                </section>

                <?php
                require_once 'functions.php';
                require_once 'db.php';
                $brand_id = $_GET['id'];
                
                ?>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            if (!empty($_SESSION['error'])) :
                                echo flashMessage($_SESSION['error']['message'], $_SESSION['error']['type']);
                                unset($_SESSION['error']);
                            endif;
                            ?>
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Brands</h3>
                                </div>
                                <?php
                               
                                 $sqlProduct = sprintf("SELECT * from images WHERE brand_id=%d", $brand_id); 
                                $image_result = mysqli_query($link, $sqlProduct);
                                    ?>
                                    
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <center  style="padding: 10px;"><strong>Uploaded Images of this product</strong></center>
                                        <div class="img_av">                                           
                                            <?php
                                            while ($image_row = mysqli_fetch_assoc($image_result)) {
                                                ?>
                                                <div class=" col-lg-3 col-md-3">
                                                    <div class="hovereffect">
                                                        <img class="img-responsive thumbnail" src="<?= $image_row['name'] ?>" alt="Product Image">
                                                        <div class="overlay">
                                                            <a class="info" href="#" onclick="singleImageUpload(<?= $image_row['id'] ?>)">CHANGE IMAGE</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                               
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->


                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                </section>
                <!-- /.content -->
                <!-- Modal -->
                <div id="uploadmodal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <form id="uploadForm" role="form" method="post" action="multyple_image_upload.php" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Choose Image</h4>
                                </div>
                                <div class="modal-body">
                                    <input id="id" name="id" value="" hidden>
                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <span class="btn btn-default btn-file"><span>Choose Image</span><input type="file" id="fileToUpload" name="fileToUpload"/></span>
                                        </div>
                                    </div>
                                    <center id="chosen"></center>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-green progress-bar-striped" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                            <span class="sr-only"></span>
                                        </div>
                                    </div>
                                    <div id="target"></div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="CHANGE IMAGE">
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.content-wrapper -->
            <?php include_once 'footer.php' ?>

            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 2.2.0 -->
        <script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- Morris.js charts -->
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>-->
        <script src="plugins/morris/morris.min.js"></script>
        <!-- Sparkline -->
        <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="plugins/knob/jquery.knob.js"></script>
        <!-- daterangepicker -->
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>-->
        <script src="plugins/daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/app.min.js"></script>
        <!-- jquery form -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>
        <script>
                                                        

                                                        function singleImageUpload(id) {
                                                            $('#uploadmodal').modal();
                                                            $('#uploadmodal #id').val(id);
                                                        }

                                                        $('#uploadmodal #fileToUpload').change(function () {
                                                            var val = $('#uploadmodal #fileToUpload').val();
                                                            $('#uploadmodal #chosen').text(val);
                                                        });
                                                        
                                                        $('.progress').hide();

                                                        $(document).ready(function () {
                                                            $('#uploadForm').submit(function (e) {
                                                                if ($('#fileToUpload').val()) {
                                                                    e.preventDefault();
                                                                    $('.progress').show();
                                                                    $(this).ajaxSubmit({
                                                                        target: '',
                                                                        beforeSubmit: function () {
                                                                            $(".progress-bar").width('0%');
                                                                        },
                                                                        uploadProgress: function (event, position, total, percentComplete) {
                                                                            $(".progress-bar").width(percentComplete + '%');
                                                                            $("#target").html('<div id="progress-status">' + percentComplete + ' %</div>')
                                                                        },
                                                                        success: function () {
                                                                            $('#target').text("Upload Completed");
                                                                            $('#uploadmodal').fadeOut(2500,function(){location.reload();});
                                                                        },
                                                                        resetForm: true
                                                                    });
                                                                    return false;
                                                                }
                                                            });
                                                        });
        </script>
    </body>
</html>
