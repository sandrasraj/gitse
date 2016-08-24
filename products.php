<?php include_once 'counter.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Gitse Enterprises</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <!-- Custom Theme files -->
        <script src="js/jquery.min.js"></script>
        <!--theme-style-->
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
        <link href="css/sub_style.css" rel="stylesheet" type="text/css" media="all" />
        <!--//theme-style-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Innate Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndroId Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
                });
            });
        </script>
        <!----start-top-nav-script---->

        <script type="text/javascript" src="js/modernizr.custom.js"></script> 
        <!--animate-->
        <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
        <script src="js/wow.min.js"></script>
        <script>
            new WOW().init();
        </script>
        <!--//end-animate-->

    </head>
    <body>
        <?php include_once('db.php'); ?>
        <!--header-->
        <div class="header header-head" id="home">
            <div class="container">
                <section id="stuck_container">
                    <div style="text-align:center;float:none;width:100%" class="head">
                        <nav class="navbar navbar-default">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>


                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="sub_home">
                                <a href="index.php">Home</a>
                            </div>

                    </div><!-- /.navbar-collapse -->
                    </nav>
            </div></section>

        <div class="navbar-brand logo_c logo wow fadeInLeft animated" data-wow-delay=".5s">
            <h1><a href="index.php"><img src="images/gitsa_logo.png" height="140px"></a></h1>	
        </div><br>

    </div>

    <?php
    require_once 'admin/functions.php';

    if (isset($_GET['id'])) {
        $brand_id = sanatizeInput($_GET['id'], 'int');
    }
    ?>

    <?php
    $sqlbrands = sprintf("SELECT b.brandname as brand, p.productsname as products, p.description as description, b.description as b_description ,pb.brand_id as brandid from brands b JOIN product_brand pb ON b.id=pb.brand_id JOIN products p ON p.id=pb.product_id where pb.product_id = %d", $brand_id);
    $resultbrands = mysqli_query($link, $sqlbrands);
    if (mysqli_num_rows($resultbrands) > 0) {
        $i = 0;
        while ($rowBrands = mysqli_fetch_assoc($resultbrands)) {
            $product = $rowBrands['products'];
            $description = $rowBrands['description'];
            $brands[] = $rowBrands['brand'];
            $bdescription[$i]['brand_id'] = $rowBrands['brandid'];
            $bdescription[$i]['description'] = $rowBrands['b_description'];
            $i++;
        }
    }
    ?>
</div>
</div>
</div>


<!--content-->

<div class="single">
    <div class="container">


        <div class="main-row2"> 

            <div class="skills float-rt">
                <h3 class="title"><?php echo $product; ?></h3>
                <div class="sap_tabs">
                    <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                        <ul class="resp-tabs-list">
                            <?php foreach ($brands as $each_brand) { ?>

                                <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span><?php echo $each_brand; ?></span></li>                                                 
                            <?php }
                            ?>
                            <div class="clear"> </div>
                            <hr>
                        </ul>				  	 
                        <div class="container">
                            <?php foreach ($bdescription as $each_description) { ?>
                                <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                                    <p><?php echo $each_description['description']; ?></p>

                                    <div class="img_sub_page">
                                        <div class="row">
                                            <?php
                                            $sqlimage = sprintf("SELECT * FROM images WHERE brand_id=%d ", $each_description['brand_id']);
                                            $resultimages = mysqli_query($link, $sqlimage);
                                            if (mysqli_num_rows($resultimages) > 0) {
                                                while ($rowBrands = mysqli_fetch_assoc($resultimages)) {
                                                    ?>
                                                    <div class = "col-md-3">
                                                        <a href = "#" class = "thumbnail">

                                                            <img src = "admin/<?php echo $rowBrands['name']; ?>" alt = "" style = "width:250px;height:200px">
                                                        </a>
                                                    </div>

                                                <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                            <?php }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class = "clear"> </div>
        </div>
    </div>
</div>
<!---->

<!--//content-->
<!--//footer-->
<?php include_once 'footer.php';
?>
<!--//footer-->
<script src="js/jquery.circlechart.js"></script>
<!--//circle-chart-->
<!--ResponsiveTabs-->
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
<script type="text/javascript">
            $(document).ready(function () {
                $('#horizontalTab').easyResponsiveTabs({
                    type: 'default', //Types: default, vertical, accordion           
                    width: 'auto', //auto or any width like 600px
                    fit: true   // 100% fit in a container
                });
            });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear' 
         };
         */

        $().UItoTop({easingType: 'easeOutQuart'});

    });
</script>
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>


</body>
</html>