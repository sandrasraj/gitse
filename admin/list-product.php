<!DOCTYPE html>
<html>
    <?php include 'logincheck.php';?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Gitse| List Products</title>
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
                        <small>List Products</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">List Products</li>
                    </ol>
                </section>
                <?php
                require_once 'functions.php';
                require_once 'db.php';
                ?>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Products</h3>
                                </div>
                                <?php
                                $limit = 10;
                                $sqlProductsCnt = sprintf("SELECT count(*) as cnt FROM products");
                                $resultCount = mysqli_query($link, $sqlProductsCnt);
                                $count = mysqli_fetch_assoc($resultCount);

                                if (isset($_GET{'page'})) {
                                    $page = $_GET{'page'} - 1;
                                } else {
                                    $page = 0;
                                }
                                $total_page = ceil($count['cnt'] / $limit);
                                $start = $limit * $page;

                                $sqlProducts = sprintf("SELECT * from products LIMIT $start, $limit");

                                $resultproducts = mysqli_query($link, $sqlProducts);
                                if (mysqli_num_rows($resultproducts) > 0) {
                                    ?>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <?php
                                        if (!empty($_SESSION['error'])) :
                                            echo flashMessage($_SESSION['error']['message'], $_SESSION['error']['type']);
                                            unset($_SESSION['error']);
                                        endif;
                                        $i = 1;
                                        ?>

                                        <table class="table table-bordered">
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Products Name</th>
                                                <th>Description</th>
                                                <th>Create date</th>
                                                <th>Update date</th>
                                                <th>Change actions</th>
                                                <th style="width: 100px">Actions</th>
                                            </tr>
                                            <?php while ($productsRow = mysqli_fetch_assoc($resultproducts)) { ?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><?php echo $productsRow['productsname'] ?></td>
                                                    <td><?php echo $productsRow['description'] ?></td>
                                                    <td><?php echo $productsRow['create_date'] ?></td>
                                                     <td><?php echo $productsRow['update_date'] ?></td>
                                                     
                                                     <td>
                                                        <a href="change-product.php?id=<?= $productsRow['id']?>" class="btn btn-default btn-success"> <i class="fa fa-edit"></i></a>
                                                  
                                                    <td>
                                             
                                                        <a href="edit-product.php?id=<?= $productsRow['id'] ?>" class="btn btn-default btn-success"> <i class="fa fa-edit"></i></a></a>
                                                        <a href="javascript:void(0)" onclick="deleteConfirm('delete-product.php?id=<?= $productsRow['id'] ?>')" class="btn btn-default btn-danger"> <i class="fa fa-remove"></i></a>
                                                    </td>
                                                </tr>
                                                <?php $i++;
                                            }
                                            ?>

                                        </table>
                                    </div>
<?php } ?>
                                <!-- /.box-body -->
                                <div class="box-footer clearfix">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        <li><a href="list-product.php?page=1">&laquo;</a></li>
                                        <?php
                                        for ($i = 1; $i <= $total_page; $i++) {
                                            ?>
                                            <li><a href="list-product.php?page=<?= $i ?>"><?= $i ?></a></li>
<?php } ?>
                                        <li><a href="list-product.php?page=<?= $total_page ?>">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.box -->


                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
<?php include_once 'footer.php' ?>
    <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 2.2.0 -->
        <script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
                                                    $.widget.bridge('uibutton', $.ui.button);
        </script>
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
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="dist/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>
        <script>
        function deleteConfirm(href) {
            var ask = window.confirm("Are you sure you want to delete this item?");
            if (ask) {
                document.location.href = href;
                }
            }
            $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true
                });
            });
        </script>
    </body>
</html>
