<?php
include 'logincheck.php';
ob_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Gitse | Add Products</title>
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
                        Products
                        <small>Add Products</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Add Products</li>
                    </ol>
                </section>

                <?php
                require_once 'functions.php';
                require_once 'db.php';
                if (isset($_GET['id'])) {
                    $brand_id = sanatizeInput($_GET['id'], 'int');
                }
                
                
                if (isset($_POST['submit'])) {
                    $brandname = sanatizeInput($_POST['brandname'], 'string');
                    $description = sanatizeInput($_POST['description'], 'string');
                    $create_date = date('Y-m-d');
                    $update_date = $create_date;
                    $brand_id =sanatizeInput($_POST['id'], 'int');
                    // update product data in to product table
                    $sqlbrands = sprintf("UPDATE brands SET
                                brandname= '%s',
                                description= '%s',
                                create_date= '%s',
                                update_date= '%s' WHERE id='%s'", $brandname, $description, $create_date, $update_date,$brand_id);

                    $resultbrand = mysqli_query($link, $sqlbrands);
//
//                            $id = mysqli_insert_id($link);
//
                    if ($resultbrands) {
                        $_SESSION['error'] = array(
                            'message' => 'brand Sucessfully Edited!',
                            'type' => 'success'
                        );
                    } else {

                        $error .= "Error brand Edited!br/>";
                        $_SESSION['error'] = array(
                            'message' => $error,
                            'type' => 'danger'
                        );
                }}
                ?>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Add products</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <?php
                                if (!empty($_SESSION['error'])) :
                                    echo flashMessage($_SESSION['error']['message'], $_SESSION['error']['type']);
                                    unset($_SESSION['error']);
                                endif;     

                                $brand_data_query = sprintf("SELECT * FROM brands WHERE id=%d", $brand_id);
                                $brand_data_result = mysqli_query($link, $brand_data_query);
                                $brand_data = mysqli_fetch_assoc($brand_data_result);
                                ?>
     
                               
                                
                              
                                
                                <form role="form" method="POST" enctype="multipart/form-data" id="addForm">
                                    <input id="id" name="id" value="<?= $brand_id ?>" hidden >
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Brand Name</label>
                                            <input type="text" name="brandname" id="brandname" class="form-control" placeholder="brand Name" value="<?= $brand_data['brandname'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Description</label>
                                            <textarea placeholder="Your Message" name="description"required=""class="form-control" ><?= $brand_data['description'] ?></textarea>	 
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
