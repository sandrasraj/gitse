<!DOCTYPE html>
<html>
<head>
<title>Gitse Enterprises</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<script src="js/jquery.min.js"></script>
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Innate Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndroId Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/tmStickUp.js"></script>
<script src="js/jquery.ui.totop.js"></script>
<script>
 $(window).load(function(){
  $().UItoTop({ easingType: 'easeOutQuart' });
  $('#stuck_container').tmStickUp({});  
 }); 
</script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
					jQuery(document).ready(function($) {
						$(".scroll").click(function(event){		
							event.preventDefault();
							$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
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
<div class="header" id="home">
<div class="container">
<section id="stuck_container">
		<div style="text-align:center;float:none;" class="head container">
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
<div class="navbar-brand logo1 wow fadeInLeft animated" data-wow-delay=".5s">
							<h1><a href="index1.html"><img src="images/gitsa_logo.png" height="90px"></a></h1>	
						</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse nav-wil t_cen" id="bs-example-navbar-collapse-1">
					 <ul class="nav navbar-nav wow fadeInDown animated" data-wow-delay=".5s">
					<li ><a href="#home" class=" scroll"><span data-hover="Home">Home</span></a> </li>
					<li><a href="#events" class="scroll"><span data-hover="Events">Product</span> </a></li>
						<li><a href="#gallery"  class="scroll"><span data-hover="Gallery">Gallery</span></a></li>
						<li><a href="#clients" class="scroll"><span data-hover="clients">Client</span> </a></li>
						<li><a href="#contact" class=" scroll"><span data-hover="Contact">Contact</span></a></li>
					  </ul>
					  
					</div><!-- /.navbar-collapse -->
				</nav>
		</div></section>
		<div class="line1"> </div><br>
		
						<br>
		<!--div class="banner">
		
		<section class="wrapper wow fadeInUp animated" data-wow-delay=".5s">
		  <h2 >Gitse Enterprises is a distribution </h2><div class="popEffect">
		  <h3 class="sentence">company having its reach all over
			  <span> Kerala.</span>
			  <span> Kerala.</span>
			  <span> Kerala.</span>
			  <span> Kerala.</span>

			</div>
		  </h3>
		</section>
	<a href="#" class="hvr-rectangle-out wow fadeInDown animated" data-wow-delay=".5s">Read More</a>

		</div-->
	</div>
</div>
<!--content-->
<div class="content">
	<div class="container">
		<div class="col-top" id="about">
			<h3>Welcome to Gitse </h3>
			<p>Gitse Enterprises is a distribution company having its reach all over Kerala. Our product range includes White Cement, Ceramic Sanitaryware, Wall Putty, Bathroom fittings, Tile Adhesives and still adding on. 
                            Delivering quality products with better service on time at fair price. That's our philosophy..</p>
		</div>
		<!---->

  <div class="clearfix"></div>
 	 </div>
	 </div>
	 
	 
	 
	 <div class="event" id="events">
		<div class="container">
		
		<div class="top-event">
			<h3>Product</h3>
			
		</div>
                    <?php
                    $i = 0;
                    $sqlProducts = sprintf("SELECT * from products ");
                    $resultproducts = mysqli_query($link, $sqlProducts);
                                if (mysqli_num_rows($resultproducts) > 0) {
                                    while ($row = mysqli_fetch_assoc($resultproducts)) {
                                        
                                    
                    ?>
                    

                    
                    

                            <?php if ($i%2 == 0) { ?>
                            <div class="event-grid ">
                            <?php } ?>
			<div class="<?php echo ($i%2 == 0) ? 'event-left wow fadeInLeft' : 'event-right wow fadeInRight';?> animated" data-wow-delay=".5s">
				<a href="products.php?id=<?php echo $row['id'];?>"><img src="admin/<?php echo $row['image'];?>" class="img-responsive" alt=""></a>
				<div class="event-top <?php echo ($i%2 != 0) ? 'event-top1' : '';?>">
					<div class="event-gr">
						<h4><a href="products.php?id=<?php echo $row['id'];?>"><?php echo $row['productsname'];?></a> </h4>
                                                
                                                <?php 
                                                    $sqlbrands =  sprintf("SELECT b.brandname from product_brand pb JOIN brands b ON pb.brand_id=b.id where pb.product_id = %d", $row['id']);
                                                       $resultbrands= mysqli_query($link, $sqlbrands);                       
                                                       if (mysqli_num_rows($resultbrands) > 0) {
                                                                   while ($rowBrands = mysqli_fetch_assoc($resultbrands)) {
                                                ?>
                                                
                                                <h3><a href="products.php?id=<?php echo $row['id'];?>"> <?php echo $rowBrands['brandname']?></a> </h3>
                                       <?php }}?>
					</div>
				</div>
			</div>
			
			<?php if ($i%2 != 0) { ?>
			<div class="clearfix"></div>
                        </div>
                        <?php } ?>
                        

                                <?php 
                                $i++;
//                       }}
                                } } 
                    ?>
                    </div>
			<div class="clearfix"></div>
		</div>
<!--		<div class="event-grid">
			<div class="event-left event-left1 wow fadeInRight animated" data-wow-delay=".5s">
				<a href="cp_fittings.html"><img src="images/pc2.jpg" class="img-responsive" alt=""></a>
				<div class="clearfix"></div>
				<div class="event-top event-t">
					<div class="event-gr">
						<h4><a href="cp_fittings.html">CP Fittings</a> </h4>
						
					</div>
				</div>
			</div>
			<div class="event-right event-right1 wow fadeInLeft animated" data-wow-delay=".5s">
				<a href="Wall_Putty_Primer12.html"><img src="images/logo2 (1).jpg" class="img-responsive" alt=""></a>
				<div class="clearfix"></div>
				<div class="event-top event-t1">
					<div class="event-gr">
						<h4><a href="Wall_Putty_Primer12.html">Wall Putty & Primer</a> </h4>
						<h4><a href="Wall_Putty_Primer12.html">MYK Laticrete</a> </h4>
                                                <h3><a href="Wall_Putty_Primer12.html">- Latafinish</a> </h3>
						<h3><a href="Wall_Putty_Primer12.html">- Lataprimer</a> </h3>
						<h3><a href="Wall_Putty_Primer12.html">- Vembanad</a> </h3>
						<h3><a href="Wall_Putty_Primer12.html">- Alltek Paste Putty</a> </h3>
					</div>                                     
				</div>
			</div>
			<div class="clearfix"></div>
		</div>-->
		
		</div>
		</div>
	 
	 <!---->
	 <div class="portfolio" id="gallery">
		
		 <div class="portfolio-top wow fadeInDown animated" data-wow-delay=".5s">
		 
			<div class="col-md-4 grid slideanim">
				<figure class="effect-jazz">
				<a href="#portfolioModal1"  data-toggle="modal">

					<img src="images/pi.jpg" alt="img25" class="img-responsive"/>
						<figcaption>
							<h4>Ceramic Sanitaryware</h4>
							<p></p>
						</figcaption>
					</a>						
				</figure>
			</div>
			<div class="col-md-4 grid slideanim">
				<figure class="effect-jazz">
				<a href="#portfolioModal2"  data-toggle="modal">

					<img src="images/pi1.jpg" alt="img25" class="img-responsive"/>
						<figcaption>
							<h4>Solare Sanitaryware Product</h4>
							<p></p>							
						</figcaption>	
						</a>						
				</figure>
			</div>
			<div class="col-md-4 grid slideanim">
				<figure class="effect-jazz">
				<a href="#portfolioModal3"  data-toggle="modal">

					<img src="images/pi2.jpg" alt="img25" class="img-responsive"/>
						<figcaption>
							<h4> Cela Waterfall Basin Mixer Tap</h4>
						<p></p>							
						</figcaption>
					</a>						
				</figure>
			</div>
			
			<div class="clearfix"></div>
		 </div>
		  <div class="portfolio-top wow fadeInUp animated" data-wow-delay=".5s"">
			<div class="col-md-3 grid grid-wi slideanim">
				<figure class="effect-jazz">
				<a href="#portfolioModal4"  data-toggle="modal">

					<img src="images/pi3.jpg" alt="img25" class="img-responsive"/>
						<figcaption>
							<h4 class="effcet-text">Wall Putty</h4>
					<p></p>							
						</figcaption>	
					</a>						
				</figure>
			</div>
			<div class="col-md-3 grid grid-wi slideanim">
				<figure class="effect-jazz">
				<a href="#portfolioModal5"  data-toggle="modal">

					<img src="images/pi5.jpg" alt="img25" class="img-responsive"/>
						<figcaption>
							<h4 class="effcet-text">Tile Adhesives</h4>
						<p></p>							
						</figcaption>
						</a>						
				</figure>
			</div>
			<div class="col-md-3 grid grid-wi slideanim">
				<figure class="effect-jazz">
				<a href="#portfolioModal6"  data-toggle="modal">

					<img src="images/pi4.jpg" alt="img25" class="img-responsive"/>
						<figcaption>
							<h4 class="effcet-text">Bathroom Fittings</h4>
							<p></p>							
						</figcaption>
					</a>						
				</figure>
			</div>
			<div class="col-md-3 grid grid-wi slideanim">
				<figure class="effect-jazz">
				<a href="#portfolioModal7"  data-toggle="modal">

					<img src="images/pi6.jpg" alt="img25" class="img-responsive"/>
						<figcaption>
							<h4 class="effcet-text"> Epoxy</h4>
						<p></p>							
						</figcaption>
					</a>						
				</figure>
			</div>
			<div class="clearfix"></div>
		 </div>

	<!---->
	
<!-- Portfolio Modals -->
<div class="portfolio-modal modal fade slideanim" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="container">
		
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h3>Ceramic Sanitaryware</h3>
						
                        <img src="images/pi.jpg" class="img-responsive" alt="">
                        </div>
                </div>
           
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade slideanim" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="container">
         
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h3>Solare Sanitaryware Product</h3>
                      
                        <img src="images/pi1.jpg" class="img-responsive" alt="">
                        </div>
                </div>
           
        </div>
    </div>
    </div>
<div class="portfolio-modal modal fade slideanim" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="container">
           
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h3>Cela Waterfall Basin Mixer Tap</h3>
                     
                        <img src="images/pi2.jpg" class="img-responsive" alt="">
						</div>
                </div>
            </div>
       
    </div>
</div>
<div class="portfolio-modal modal fade slideanim" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="container">
			
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h3>Wall Putty</h3>
                       
                        <img src="images/pi3.jpg" class="img-responsive" alt="">
                        </div>
                </div>
            
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade slideanim" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="container">

                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h3>Tile Adhesives</h3>
                       
                        <img src="images/pi5.jpg" class="img-responsive" alt="">
                        </div>
                </div>
           
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade slideanim" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="container">
           
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h3>Bathroom Fittings</h3>
                       
                        <img src="images/pi4.jpg" class="img-responsive" alt="">
                        </div>
                </div>
            </div>
        
    </div>
</div>
<div class="portfolio-modal modal fade slideanim" id="portfolioModal7" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"></div>
            </div>
        </div>
        <div class="container">
            
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h3>Epoxy</h3>
                     
                        <img src="images/pi6.jpg" class="img-responsive" alt="">
                        </div>
                </div>
         
        </div>
    </div>
</div>
					
						<div class="client_logo">
							<div class="container">
								  <div class="row">
<!--								<div class="col-md-2">
									  <a href="#" class="thumbnail">  
										<img src="images/w_c_img.jpg" alt="" style="width:200px;height:120px">
									  </a>
									</div>-->
								  <div class="col-md-2">
									  <a href="#" class="thumbnail">  
										<img src="images/chemshire logo green (1).png" alt="" style="width:200px;height:120px">
									  </a>
									</div>
								  <div class="col-md-2">
									  <a href="#" class="thumbnail">  
										<img src="images/logo.jpg" alt="" style="width:200px;height:120px">
									  </a>
									</div>
									<div class="col-md-2">
									  <a href="#" class="thumbnail">  
										<img src="images/white01.jpg" alt="" style="width:200px;height:120px">
									  </a>
									</div>
									<div class="col-md-2">
									  <a href="#" class="thumbnail">  
										<img src="images/logo2 (1).jpg" alt="" style="width:200px;height:120px">
									  </a>
									</div>
<!--									<div class="col-md-2">
									  <a href="cinqueterre.jpg" class="thumbnail">  
										<img src="cinqueterre.jpg" alt="" style="width:200px;height:120px">
									  </a>
									</div>-->
								  </div>
							</div>
						</div>

		<div class="clients" id="clients" >
			 <div class="container">
				<h3>Our client </span></h3>
				<!---->
				 <!-- requried-jsfiles-for owl -->
				 <link href="css/owl.carousel.css" rel="stylesheet">
							    <script src="js/owl.carousel.js"></script>
							        <script>
									    $(document).ready(function() {
									      $("#owl-demo1").owlCarousel({
									        items : 1,
									        lazyLoad : true,
									        autoPlay : true,
									        navigation : true,
									        navigationText :  true,
									        pagination : false,
									      });
									    });
									  </script>
							 <!-- //requried-jsfiles-for owl -->
							 <!-- start content_slider -->
						       <div id="owl-demo1" class="owl-carousel wow fadeInDown animated" data-wow-delay=".5s">
							   <div class="item-bottom">
					                <div class="item-right">
									<p>As on 2016, we have around 700 dealers spread all over Kerala, apart from the major builders. Due to the request from our clients and to avoid abuse, clients list has been removed from the website.</p>
										<span></span>
									</div>
								</div>
								<div class="item-bottom">
					                <div class="item-right">
										<p>As on 2016, we have around 700 dealers spread all over Kerala, apart from the major builders. Due to the request from our clients and to avoid abuse, clients list has been removed from the website.</p>
										<span></span>
									</div>
								</div>
								<div class="item-bottom">
					                <div class="item-right">
										<p>As on 2016, we have around 700 dealers spread all over Kerala, apart from the major builders. Due to the request from our clients and to avoid abuse, clients list has been removed from the website.</p>
										<span></span>
									</div>
								</div>					
									
								</div>
				</div>	
			</div>

			<!---->

		<!---->
	</div>
	<!--contact--->
	<div class="contact" id="contact">
					<div class="col-md-6 map wow fadeInLeft animated" data-wow-delay=".5s">
						<iframe src="https://www.google.com/maps/embed/v1/place?q=1/434,+Fathima+Building,Nallalam+Bazar,Calicut&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe>
					</div>
				<div class="col-md-6 contact-form wow fadeInRight animated" data-wow-delay=".5s">
					<h3>Contact</h3>
				<div class="col-md-6 contact-top">
					<form>				
							<input type="text" placeholder="Your Name" required="" >								
							<input type="text" placeholder="Your Email" required="" >							
							<input type="text" placeholder="Subject" required="" >			
							<textarea placeholder="Your Message" required=""></textarea>	
						<label class="hvr-rectangle-out">
								<input type="submit" value="Send" >
						</label>		
					</form>						
				</div>
				
					<div class="col-md-6 contact-left">
						
			
					<div class="address">
					<div class=" address-grid">
							<i class="glyphicon glyphicon-map-marker"></i>
							<div class="address1">
								<h6>Address</h6>
								<p><span class="heading_b">Head Office:</span>
								Gitse Enterprises,
								1/434, Fathima Building,<br>
								Nallalam Bazar,
								Calicut - 673027, Kerala, India</p>
								<p><span class="heading_b">Branch:</span>
								Gitse Enterprises
								6/320, Old MDC Bank Building<br>
								Arabic College Road
								Areecode
								Malappuram Dist.</p>
								<p><span class="heading_b">Branch:</span>
								Gitse Enterprises
								Kazharkode</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class=" address-grid ">
							<i class="glyphicon glyphicon-phone"></i>
							<div class="address1">
							<h6>Our Phone:</h6>
								<p>Sales & Service Hotline - </p>
								<p>Head Office: - +91-495-242 23 00</p>
								<p>Branch: - +91-859 20 1 22 44</p>
								<p>Branch: - +91-859 20 4 22 55</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class=" address-grid ">
							<i class="glyphicon glyphicon-envelope"></i>
							<div class="address1">
							<h6>Email:</h6>
								<p><a href="mailto:info@example.com">mail@gitse.in</a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class=" address-grid ">
							<i class="glyphicon glyphicon-phone-alt"></i>
							<div class="address1">
							<h6>Sales & Service Hotline:</h6>
								<p>+91-858 99 1 22 44</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						
</div>
				</div>
		<div class="clearfix"></div>
	
		</div>
		<div class="clearfix"></div>
	</div>


<!--</div>
<!--//content-->
<!--footer-->
<?php include_once('footer.php'); ?>

 <script type="text/javascript">
						$(document).ready(function() {
							/*
							var defaults = {
					  			containerID: 'toTop', // fading element id
								containerHoverID: 'toTopHover', // fading element hover id
								scrollSpeed: 1200,
								easingType: 'linear' 
					 		};
							*/
							
							$().UItoTop({ easingType: 'easeOutQuart' });
							
						});
					</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>


</body>
</html>