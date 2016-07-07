<?php
include 'logincheck.php';
ob_start();
if($_GET){
    $cat_id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Chloris | Edit Categroy</title>
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
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php include_once 'header.php';?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include_once 'left-menu.php';?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Categroy
                <small>Edit Category</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Edit Category</li>
            </ol>
        </section>

        <?php
        require_once 'functions.php';
        require_once 'db.php';


        if (isset($_POST['submit'])) {

            $_SESSION['error'] = array();
            $error             = "";


            $cat_name  = sanatizeInput($_POST['cat_name'], 'string');

            if (empty($cat_name)) {
                $error .= 'Category name cant be empty!<br/>';
            }


            if ($error) {
                $_SESSION['error'] = array(
                    'message' => $error,
                    'type'    => 'danger'
                );

                header('location:edit_category.php');
                exit();
            }

            $created = date('Y/m/d');
            $updated = $created;
            //add product data in to product table
            $sqlProduct = sprintf("UPDATE category SET category = '%s',updated_date='%s' WHERE id=%d",$cat_name,$updated,$cat_id);


            $resultProduct   = mysqli_query($link, $sqlProduct);

            if ($resultProduct) {
                $_SESSION['error'] = array(
                    'message' => 'Category Sucessfully Edited!',
                    'type'    => 'success'
                );

                header('location:list_category.php');
                exit();

            } else {
                $error .= "Error Category add<br/>";
                $_SESSION['error'] = array(
                    'message' => $error,
                    'type'    => 'danger'
                );

                header('location:edit_category.php');
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
                            <h3 class="box-title">Add Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <?php

                        if(!empty($_SESSION['error'])) :
                            echo flashMessage($_SESSION['error']['message'], $_SESSION['error']['type']);
                            unset($_SESSION['error']);
                        endif;

                        $query = sprintf("SELECT category FROM category WHERE id=%d",$cat_id);
                        $result = mysqli_query($link,$query);
                        $row = mysqli_fetch_assoc($result);

                        ?>

                        <form role="form" method="POST">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="Category Name" value="<?= $row['category'] ?>">
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
    <!-- /.content-wrapper -->
    <?php include_once 'footer.php'?>

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


    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <!--<script src="dist/js/demo.js"></script>-->

    <script>
        $(function(){
            $(".select2").select2();
            $(".textarea").wysihtml5();
        })
    </script>
</body>
</html>
<?php } else {
    echo '<h1>ACCESS DENIED!!!!</h1>';
} ?>