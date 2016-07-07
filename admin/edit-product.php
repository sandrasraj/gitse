<?php ob_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Chloris | Add Product</title>
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
        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php session_start(); ?>
            <?php include_once 'header.php'; ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php include_once 'left-menu.php'; ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Products
                        <small>Add Product</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Add Product</li>
                    </ol>
                </section>

                <?php
                require_once 'functions.php';
                require_once 'db.php';

                if (isset($_GET['id'])) {
                    $product_id = sanatizeInput($_GET['id'], 'int');
                }

                if (isset($_POST['submit'])) {

                    $_SESSION['error'] = array();
                    $error = "";

                    $product_id = sanatizeInput($_POST['id'], 'int');
                    $flowername = sanatizeInput($_POST['flowername'], 'string');
                    $description = trim($_POST['description']);
                    $specification = trim($_POST['specification']);
                    $qty = sanatizeInput($_POST['qty'], 'int');
                    $price = sanatizeInput($_POST['price'], 'int');
                    $sprice = sanatizeInput($_POST['sprice'], 'int');
                    $category = sanatizeInput($_POST['category'], 'int');

                    if (empty($flowername)) {
                        $error .= 'Flower name cant be empty!<br/>';
                    }

                    if (empty($description)) {
                        $error .= 'Description cant be empty!<br/>';
                    }

                    /* if (empty($specification)) {
                        $error .= 'Specification cant be empty!<br/>';
                    }*/

                    if (empty($qty)) {
                        $error .= 'Quantity cant be empty!<br/>';
                    } else if (!is_numeric($qty)) {
                        $error .= 'Quantity is not numeric!<br/>';
                    }

                    if (empty($price)) {
                        $error .= 'Price cant be empty!<br/>';
                    } else if (!is_numeric($price)) {
                        $error .= 'Price is not numeric!<br/>';
                    }

                    if (empty($sprice)) {
                        $error .= 'Selling Price cant be empty!<br/>';
                    } else if (!is_numeric($sprice)) {
                        $error .= 'Selling Price is not numeric!<br/>';
                    }

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

                            //add product data in to product table
                            $sqlProduct = sprintf("UPDATE product SET
                                name = '%s',
                                description = '%s',
                                qty = '%s',
                                price ='%s',
                                sprice = '%s',
                                specification='%s',
                                category_id = '%s' WHERE id=%d", $flowername, $description, $qty, $price, $sprice, $specification, $category, $product_id);

                            $resultProduct = mysqli_query($link, $sqlProduct);

                            $id = $product_id;

                            if ($resultProduct) {
                                $_SESSION['error'] = array(
                                    'message' => 'Product Sucessfully Edited!',
                                    'type' => 'success'
                                );
                            } else {
                                $error .= "Error Product Edit<br/>";
                                $_SESSION['error'] = array(
                                    'message' => $error,
                                    'type' => 'danger'
                                );

                                header('location:edit-product.php?id=' . $product_id);
                                die();
                            }

                            // If no errors, upload the image, else, output the errors
                            if ($error == '') {
                                for ($i = 0; $i < $no_of_images; $i++) {
                                    $sepext = explode('.', strtolower($_FILES['fileToUpload']['name'][$i]));
                                    $type = end($sepext);       // gets extension
                                    //Removing Already existing product images
                                    $i1 = "product_images/chloris_product_" . $id . "_image_" . $i . ".jpg";
                                    chmod($i1, 0644);
                                    unlink($i1);
                                    $i1 = "chloris_product_" . $id . "_image_" . $i . ".jpg";
                                    $img_q = sprintf("DELETE FROM product_image WHERE image_name='%s'", $i1);
                                    mysqli_query($link, $img_q);
                                    $i2 = "product_images/chloris_product_" . $id . "_image_" . $i . ".jpeg";
                                    chmod($i2, 0644);
                                    unlink($i2);
                                    $i2 = "chloris_product_" . $id . "_image_" . $i . ".jpeg";
                                    $img_q = sprintf("DELETE FROM product_image WHERE image_name='%s'", $i2);
                                    mysqli_query($link, $img_q);
                                    $product_image_name = "chloris_product_" . $id . "_image_" . $i . "." . $type;
                                    $uploadpath = 'product_images/' . $product_image_name;
                                    chmod($uploadpath, 0644);
                                    unlink($uploadpath);

                                    //Uploading New Image
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
                        } else {

                            //add product data in to product table
                            $sqlProduct = sprintf("UPDATE product SET
                                name = '%s',
                                description = '%s',
                                qty = '%s',
                                price ='%s',
                                sprice = '%s',
                                specification='%s',
                                category_id = '%s' WHERE id=%d", $flowername, $description, $qty, $price, $sprice, $specification, $category, $product_id);

                            $resultProduct = mysqli_query($link, $sqlProduct);

                            if ($resultProduct) {
                                $_SESSION['error'] = array(
                                    'message' => 'Product Sucessfully Edited!',
                                    'type' => 'success'
                                );
                            } else {
                                $error .= "Error Product Edit<br/>";
                                $_SESSION['error'] = array(
                                    'message' => $error,
                                    'type' => 'danger'
                                );

                                header('location:edit-product.php?id=' . $product_id);
                                die();
                            }
                        }
                    }

                    if ($error) {
                        $_SESSION['error'] = array(
                            'message' => $error,
                            'type' => 'danger'
                        );

                        header('location:edit-product.php?id=' . $product_id);
                        exit();
                    }

                    header('location:list-product.php');
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
                                    <h3 class="box-title">Add Product</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <?php
                                if (!empty($_SESSION['error'])) :
                                    echo flashMessage($_SESSION['error']['message'], $_SESSION['error']['type']);
                                    unset($_SESSION['error']);
                                endif;

                                $product_data_query = sprintf("SELECT * FROM product WHERE id=%d", $product_id);
                                $product_data_result = mysqli_query($link, $product_data_query);
                                $product_data = mysqli_fetch_assoc($product_data_result);
                                ?>

                                <form role="form" method="POST" enctype="multipart/form-data" id="editForm" action="edit-product.php">
                                    <input id="id" name="id" value="<?= $product_id ?>" hidden >
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Flower Name</label>
                                            <input type="text" name="flowername" id="flowername" class="form-control" placeholder="Flower Name" value="<?= $product_data['name'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1" >Description</label>
                                            <textarea class="textarea" name="description" placeholder="Description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                <?= $product_data['description'] ?>
                                            </textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1" >Specification</label>
                                            <textarea class="textarea" name="specification" placeholder="Specification" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                <?= $product_data['specification'] ?>
                                            </textarea>
                                        </div>

                                        <?php
                                        $sqlCategories = sprintf("SELECT id, category FROM category");
                                        $resultCategory = mysqli_query($link, $sqlCategories);
                                        ?>

                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control select2" name="category">
                                                <?php while ($rowCategories = mysqli_fetch_assoc($resultCategory)): ?>
                                                    <option value="<?php echo $rowCategories['id'] ?>" <?php if ($product_data['category_id'] == $rowCategories['id']) { ?> selected <?php } ?>><?php echo $rowCategories['category'] ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Quantity</label>
                                            <input type="text" name="qty" id="qty" class="form-control" value="<?= $product_data['qty'] ?>" placeholder="Quantity">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Price</label>
                                            <input type="text" name="price" id="price" class="form-control" placeholder="Price" value="<?= $product_data['price'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Selling Price</label>
                                            <input type="text" name="sprice" id="sprice" class="form-control" placeholder="Price" value="<?= $product_data['sprice'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Select Images</label>
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <span class="btn btn-default btn-file"><span>Choose Images</span><input type="file" multiple id="fileToUpload" name="fileToUpload[]"/></span>
                                            </div>
                                        </div>
                                        
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th id="change_col">Size</th>
                                                </tr>
                                            </thead>
                                            <tbody id="selected_details">

                                            </tbody>
                                        </table>

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

        <!-- jQuery 2.2.0 -->
        <script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

        <!-- Bootstrap 3.3.6 -->
        <script src="bootstrap/js/bootstrap.min.js"></script>

        <!-- jquery form -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>

        <!-- Select2 -->
        <script src="plugins/select2/select2.full.min.js"></script>


        <!-- Bootstrap WYSIHTML5 -->
        <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>


        <!-- AdminLTE App -->
        <script src="dist/js/app.min.js"></script>

        <!-- AdminLTE for demo purposes -->
        <!--<script src="dist/js/demo.js"></script>-->
        <script>
            $(function () {
                $(".select2").select2();
                $(".textarea").wysihtml5();
                function fileToUploadFunction() {
                    var x = document.getElementById("fileToUpload");
                    var txt = "";
                    if ('files' in x) {
                        if (x.files.length == 0) {
                            txt = "<tr><td colspan='3'>New upload replaces all the Existing Images.</td></tr>";
                            $('.img_av').show();
                        } else if (x.files.length < 4) {
                            txt = "<tr><td colspan='3'>Selected fewer than 4 Images. Four Images are needed.</td></tr>";
                            $('.img_av').show();
                            x.value = '';
                        } else if (x.files.length > 4) {
                            txt = "<tr><td colspan='3'>Selected more than 4 Images. Only four images are allowed</td></tr>";
                            $('.img_av').show();
                            x.value = '';
                        } else {
                            $('.img_av').hide();
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
                            $('.img_av').hide();
                        } else {
                            txt += "The files property is not supported by your browser!";
                            txt += "<br>The path of the selected file: " + x.value; // If the browser does not support the files property, it will return the path of the selected file instead. 
                            $('.img_av').hide();
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
