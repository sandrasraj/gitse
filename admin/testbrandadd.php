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
                 $error = "";

//
                    $brandname = sanatizeInput($_POST['brandname'], 'string');

//                    
//
//                    if (empty($brandname)) {
//                        $error .= 'Brand name cant be empty!<br/>';
//                    }
//
//                }
//
//              
                    ?>


                    <?php
// if ($error == '') {
                          if ($error == '') {
                        //PHP Upload Script
                        if (!is_dir("product_images")) {
                            mkdir("product_images");
                        }

                        $max_size = 3000;          // maximum file size, in KiloBytes
                        $allowtype = array('jpg', 'jpeg');        // allowed extensions

                        $no_of_images = sizeof($_FILES['fileToUpload']['name']);

                        if ($no_of_images == 4) {
                            for ($i = 0; $i < $no_of_images; $i++) {
                                $sepext = explode('.', strtolower($_FILES['fileToUpload']['name'][$i]));
                                $type = end($sepext);       // gets extension
                                // Checks if the file has allowed type and size
                                if (!in_array($type, $allowtype)) {
                                    $error .= '<br>The file: <b>' . $_FILES['fileToUpload']['name'][$i] . '</b> doesnot not have the allowed extension type.';
                                }
                                if ($_FILES['fileToUpload']['size'][$i] > $max_size * 1000) {
                                    $error .= '<br/>Maximum file size is: ' . $max_size . ' KB. ' . $_FILES['fileToUpload']['name'][$i] . ' is a larger file and cannot upload.';
                                }
                            }
                        } else {
                            $error .= "Sorry, there was an error uploading your file.<br>";
//                        $_SESSION['error']=array(
//                            'message'=>'Sorry, there was an error uploading your file.',
//                            'type'=>'danger'
//                        );
                        }
                    }
                  
//                }
//                       
//
//                            }
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
//                            $id = mysqli_insert_id($link);
//
                    if ($resultbrands) {
                        
                        
                        
                        // add product data in to product table
                    $sqlproducts = sprintf("INSERT INTO images SET 
                                type      = '%s',
                                type_id   = '%s',
                                name= '%s' ", 1,$id, $target_file);

                    $resultproducts = mysqli_query($link, $sqlproducts);
                        
                        
                        
                        $_SESSION['error'] = array(
                            'message' => 'brand Sucessfully Added!',
                            'type' => 'success'
                        );
                    } else {

                        $error .= "Error brand add<br/>";
                        $_SESSION['error'] = array(
                            'message' => $error,
                            'type' => 'danger'
                        );
                    }
//header('location:add-product.php');
                                die();
                            

                            // If no errors, upload the image, else, output the errors
                            if ($error == '') {
                                for ($i = 0; $i < $no_of_images; $i++) {
                                    $sepext = explode('.', strtolower($_FILES['fileToUpload']['name'][$i]));
                                    $type = end($sepext);       // gets extension
                                    $product_image_name = "chloris_product_" . $id . "_image_" . $i . "." . $type;
                                    $uploadpath = 'product_images/' . $product_image_name;
                                    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'][$i], $uploadpath)) {
                                        $query = sprintf("INSERT INTO product_image SET image_name='%s',product_id=%d", $product_image_name, $id);
                                        $result = mysqli_query($link, $query);
                                        if (!$result) {
                                            $error .="Failed to add image name to Database." . mysqli_error($link);
                                        }
                                    } else {
                                        //header('Location: add_song.php?status=2');
                                        $error .= '<br>Uploading ' . $_FILES['fileToUpload']['name'][$i] . ' Failed';
                                    }
                                }
                            }
                         else {
                            $error .="No Images selected/ Fewer than 4 images Selected for Uploading";
                        }
                    

                    if ($error) {
                        $_SESSION['error'] = array(
                            'message' => $error,
                            'type' => 'danger'
                        );

//                        echo '<script>window.location.href="add-product.php";</script>';
//                        header('location:add-product.php');
                        exit();
                    }
//                    echo '<script>window.location.href="list-product.php";</script>';
//                    header('location:list-product.php');
                    exit();
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
                                                <span class="btn btn-default btn-file"><span>Choose file</span><input type="file" id="fileToUpload" name="fileToUpload[]" /></span>
                                            </div>
                                        </div>

    <!--                                        <table class="table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Size</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="selected_details">

                                                </tbody>
                                            </table>--> 

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
 <script>
                    $(function () {
                        $(".select2").select2();
                        $(".textarea").wysihtml5();
                        function fileToUploadFunction() {
                            var x = document.getElementById("fileToUpload");
                            var txt = "";
                            if ('files' in x) {
                                if (x.files.length == 0) {
                                    txt = "<tr><td colspan='3'>Select Exactly four Images.</td></tr>";
                                } else if (x.files.length < 4) {
                                    txt = "<tr><td colspan='3'>Selected fewer than 4 Images. Four Images are needed.</td></tr>";
                                    x.value = '';
                                } else if (x.files.length > 4) {
                                    txt = "<tr><td colspan='3'>Selected more than 4 Images. Only four images are allowed</td></tr>";
                                    x.value = '';
                                } else {
                                    for (var i = 0; i < x.files.length; i++) {
                                        var file = x.files[i];
                                        if ('name' in file) {
                                            txt += "<tr><td>" + (i + 1) + ".</td><td>" + file.name + "</td>";
                                        }
                                        if ('size' in file) {
                                            txt += "<td>" + file.size + " Bytes </td></tr>";
                                        }
                                    }
                                }
                            } else {
                                if (x.value == "") {
                                    txt += "Select one or more files.";
                                } else {
                                    txt += "The files property is not supported by your browser!";
                                    txt += "<br>The path of the selected file: " + x.value; // If the browser does not support the files property, it will return the path of the selected file instead. 
                                }
                            }
                            document.getElementById("selected_details").innerHTML = txt;
                        }

                        fileToUploadFunction();
                        $('#fileToUpload').change(function () {
                            fileToUploadFunction();
                        });

                    });
        </script>
    </body>
</html>
