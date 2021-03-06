<?php
include 'logincheck.php';
ob_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Gitse | Add Brand</title>
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


        <!-- Select2 -->
        <link rel="stylesheet" href="plugins/select2/select2.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


        <!-- jQuery 2.2.0 -->
        <script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

        <!-- Bootstrap 3.3.6 -->
        <script src="bootstrap/js/bootstrap.min.js"></script>

        <!-- Select2 -->
        <script src="plugins/select2/select2.full.min.js"></script>


        <!-- Bootstrap WYSIHTML5 -->
        <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            table{
                width: 50% !important;
            }

            .progress-container{
                top:0;
                bottom:0;
                left:0;
                right:0;
                background-color: #333;
                position: fixed;
                z-index: <?= PHP_INT_MAX ?>;
            }

            .progress-container .progress{
                width: 75%;
                margin-top: 100px;
                margin-left: auto;
                margin-right: auto;
            }

            .progress-container h1{
                color:#fff;
                margin-top: 15%;
            }

            h3{
                color:#fff;
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
                        Brands
                        <small>Add Brand</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Add Brand</li>
                    </ol>
                </section>

                <?php
                require_once 'functions.php';
                require_once 'db.php';
                if (isset($_POST['submit'])) {
                    $brandname = sanatizeInput($_POST['brandname'], 'string');
                    $description = sanatizeInput($_POST['description'], 'string');
                    $create_date = date('Y-m-d');
                    $update_date = $create_date;
                    // add product data in to product table
                    $sqlbrands = sprintf("INSERT INTO brands SET
                                brandname = '%s',
                                description = '%s',
                                create_date= '%s',
                                update_date= '%s'", $brandname, $description, $create_date, $update_date);

                    $resultbrands = mysqli_query($link, $sqlbrands);
//
                    $id = mysqli_insert_id($link);
//
                    if ($resultbrands) {

                        // add product data in to product table

                        $_SESSION['error'] = array(
                            'message' => 'brands Sucessfully Added!',
                            'type' => 'success'
                        );
                    } else {

                        $error .= "Error brands add<br/>";
                        $_SESSION['error'] = array(
                            'message' => $error,
                            'type' => 'danger'
                        );
                    }
//              
                    ?>

                    <?php
// Check if image file is a actual image or fake image
                    //if (isset($_POST["submit"])) {
                    $error = '';
                    $target_dir = "images/";
                    for ($i = 0; $i < 4; $i++) {
                        $target_file = basename($_FILES["fileToUpload"]["name"][$i]);
                        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                        $target_file = $target_dir . date('Ymd-hms') . '-' . $i . '.' . $imageFileType;
                        $uploadOk = 1;
                        $check = filesize($_FILES["fileToUpload"]["tmp_name"][$i]);
                        if ($check !== false) {
//                        echo "File is an image - " . $check["mime"] . ".";
                            $uploadOk = 1;
                        } else {
                            $error.= "File is not an image.<br>";
                            $uploadOk = 0;
                        }
// Check if file already exists
                        if (file_exists($target_file)) {
                            $error .= "Sorry, file already exists.<br>";
                            $uploadOk = 0;
                        }
// Check file size
                        if ($_FILES["fileToUpload"]["size"][$i] > 5000000) {
                            $error .= "Sorry, your file is too large.<br>";
                            $uploadOk = 0;
                        }
// Allow certain file formats
                        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                            $error .= "Sorry, only JPG, JPEG, PNG & GIF files allowed.<br>";
                            $uploadOk = 0;
                        }
// Check if $uploadOk is set to 0 by an error
                        if ($uploadOk == 0) {
                            $error .= "Sorry, your file was not uploaded.<br>";
// if everything is ok, try to upload file
                        } else {
                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {

                                $sqlproducts = sprintf("INSERT INTO images SET 
                                brand_id   = '%s',
                                name= '%s' ", $id, $target_file);

                                $resultproducts = mysqli_query($link, $sqlproducts);
                                $_SESSION['error'] = array(
                                    'message' => 'All files has been uploaded.',
                                    'type' => 'success'
                                );
                            } else {
                                $error .= "Sorry, there was an error uploading your file.<br>";
                            }
                        }
                        if ($error != '') {
                            $_SESSION['error'] = array(
                                'message' => $error,
                                'type' => 'danger'
                            );
                            break;
                        }
                    }
                }
                ?>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Add Brands</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <?php
                                if (!empty($_SESSION['error'])) :
                                    echo flashMessage($_SESSION['error']['message'], $_SESSION['error']['type']);
                                    unset($_SESSION['error']);
                                endif;
                                ?>

                                <form role="form" method="POST" enctype="multipart/form-data" id="addForm">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Brand Name</label>
                                            <input type="text" name="brandname" id="brandname" class="form-control" placeholder="Brand Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Description</label>
                                            <textarea placeholder="Your Message" name="description"required=""class="form-control" ></textarea>	
                                        </div>
                                        <div class="form-group">
                                            <label>Select Image</label>
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <span class="btn btn-default btn-file"><span>Choose file</span><input type="file" id="fileToUpload" name="fileToUpload[]" multiple=""/></span>
                                            </div>
                                        </div>


                                    </div>
                                    <!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.box -->

                        </div>
                    </div>
                </section>
                <!-- /.content -->
            </div>
        </div>
        <!-- /.content-wrapper -->
        <?php include_once 'footer.php' ?>


        <!-- AdminLTE App -->
        <script src="dist/js/app.min.js"></script>

    </body>
</html>
