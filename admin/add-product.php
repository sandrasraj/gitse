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

        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>


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
                if (isset($_POST['submit'])) {
                    ?>


                    <?php
                    $error = '';
                    $target_dir = "images/";
                    $target_file = $target_dir . date('Ymd-hms') . '.jpg';
                    $uploadOk = 1;
                    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
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
                    if ($_FILES["fileToUpload"]["size"] > 50000000) {
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
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//                        $error= "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                            $_SESSION['error'] = array(
                                'message' => 'The file ' . basename($_FILES["fileToUpload"]["name"]) . ' has been uploaded.',
                                'type' => 'success'
                            );
                        } else {
                            $error .= "Sorry, there was an error uploading your file.<br>";
//                        $_SESSION['error']=array(
//                            'message'=>'Sorry, there was an error uploading your file.',
//                            'type'=>'danger'
//                        );
                        }
                    }
                    if ($error != '') {
                        $_SESSION['error'] = array(
                            'message' => $error,
                            'type' => 'danger'
                        );
                    }
                    
                    $productsname = sanatizeInput($_POST['productsname'], 'string');
                    $description = sanatizeInput($_POST['description'], 'string');
                    $create_date = date('Y-m-d');
                    $update_date = $create_date;

                    // add product data in to product table
                    $sqlproducts = sprintf("INSERT INTO products SET
                                productsname = '%s',
                                description = '%s',
                                image ='%s',
                                create_date= '%s',
                                update_date= '%s'", $productsname, mysqli_real_escape_string($link, $description), $target_file, $create_date, $update_date);

                    $resultproducts = mysqli_query($link, $sqlproducts);
//
                    $productId = mysqli_insert_id($link);

                    if ($resultproducts) {
                        
                        $brandsArray = ($_POST['brand']);
                        
                        if (!empty($brandsArray)) {
                            foreach ($brandsArray as $brand) {
                                
                                $sqlproducts = sprintf("INSERT INTO product_brand SET
                                product_id = %d,
                                brand_id = %d
                                ", $productId, $brand );
                                
                                //echo $sqlproducts;die;

                                $resultproducts = mysqli_query($link, $sqlproducts);
                            }
                        }


                        
              
                        
                        $_SESSION['error'] = array(
                            'message' => 'products Sucessfully Added!',
                            'type' => 'success'
                        );
                    } else {

                        $error .= "Error products add<br/>";
                        $_SESSION['error'] = array(
                            'message' => $error,
                            'type' => 'danger'
                        );
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
                                    <h3 class="box-title">Add products</h3>
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
                                            <label for="exampleInputEmail1">Product Name</label>
                                            <input type="text" name="productsname" id="productsname" class="form-control" placeholder="Product Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Description</label>
                                            <textarea placeholder="Your Message" name="description"required=""class="form-control" ></textarea>	
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Brand</label>
                                        
                                            <select class="js-data-example-ajax form-control" name="brand[]" id="brand" multiple="">
                                                <?php
                                                $qrybrands = sprintf("SELECT * FROM `brands`");
                                                $resbrands=mysqli_query($link, $qrybrands);
                                                while ($rowb = mysqli_fetch_assoc($resbrands)) {
                                                    ?>
                                                    <option value="<?php echo $rowb['id']; ?>"><?php echo $rowb['brandname']; ?></option>

                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Select Image</label>
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <span class="btn btn-default btn-file"><span>Choose file</span><input type="file" id="fileToUpload" name="fileToUpload"/></span>
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
        <script>
            $(".js-data-example-ajax").select2({
                
            });
        </script>

        <!-- AdminLTE App -->
        <script src="dist/js/app.min.js"></script>

    </body>
</html>
