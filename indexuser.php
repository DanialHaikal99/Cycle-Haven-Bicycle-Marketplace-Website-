<?php
	session_start();
    include ("checksession.php");
include ("dbconnect.php");

$session = $_SESSION['AccountUsername'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>User Home | Cycle Haven</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
     <link rel="shortcut icon" type="image/png" href="cycle.png"/>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-envelope"></i> cyclehavenofficial@gmail.com</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="indexuser.php"><img src="images/home/logo.png" alt=""/></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<!--<li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>-->
								<li><a href="userprofile.php"><i class="fa fa-lock"></i><?php echo $_SESSION['AccountUsername'] ?></a></li>
                                <li><a href="logout.php"><i class="fa fa-book"></i>Logout</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="indexuser.php" class="active"><i class="fa fa-home"></i> Home</a></li>
								<li ><a href="shopuser.php"><i class="fa fa-shopping-cart"></i> Shop<i></i></a></li>
                                <li><a href="userprofile.php"><i class="fa fa-user"></i> Profile</a></li>
                                <li><a href="orderhistory.php"><i class="fa fa-clock-o"></i> Order History</a></li>
                                <li><a href="bot/bot.php"><i class="fa fa-question-circle"></i> Ask A Bot/Help</a></li>
                                <li><a href="cart.php"><i class="fa fa-cart-plus"></i> Cart</a></li>
							</ul>
						</div>
					</div>
                    <!-- 
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
                    -->
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>Cycle</span>-Haven</h1>
									<h2>Welcome, <?php echo $_SESSION['AccountUsername'] ?></h2>
									<p>Get started with your purchases here</p>
                                    <a href="shopuser.php" type="button" class="btn btn-default get">Get it now</a>
								</div>
								<div class="col-sm-6">
									<img src="images/home/cycle3.png" class="girl img-responsive" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Cycle</span>-Haven</h1>
									<h2>Cycling Knows No Boundaries</h2>
									<p>View our bicycles that range from mountain bikes, road bikes and for children as well.  </p>
									<a href="shopuser.php" type="button" class="btn btn-default get">Get it now</a>
								</div>
								<div class="col-sm-6">
									<img src="images/home/manybikes.png" class="girl img-responsive" alt="" />
								</div>
							</div>
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
                <div class="col-sm-3" style="width:246px;">
                </div>
				<div class="col-sm-9 padding-right">
                    
                     				<div class="col-sm-9 padding-right">
					<div class="features_items" style="border:1px solid black;"><!--features_items-->
							<h2 class="title text-center">Recently Added</h2>
                        <?php 
                
        
                          $sql = "select * from HavenBicycle INNER JOIN HavenSeller WHERE HavenBicycle.AccountUsername = HavenSeller.SellerUsername AND HavenBicycle.BicycleApproval='Y' order by BicycleID desc limit 3";
               
                   
                
                          $result = mysqli_query($conn, $sql);
                          $count = mysqli_num_rows($result);

		                  // if no records are found
		                  if(mysqli_num_rows($result) == 0) 
		                  {
            
		                  ?>
            
			             <div><p>No Records Found</p></div>
            
		                 <?php
            
		                  } 
			
		                 else{
			             // if got records found use looping to display the results
			             while($row = mysqli_fetch_assoc($result)) {
	
			
		                 ?>
                        
						<div class="col-sm-4">
                            
							<div class="product-image-wrapper" style="max-height:400px;">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo $row['BicycleImage']; ?>" alt="" style="width:130px;height:100px;"/>
										<h2>RM<?php echo $row['BicyclePrice']; ?></h2>
										<p><?php echo $row['BicycleName']; ?></p>
                                        <?php
                             $id = $row['BicycleID'];
                             $result12 = mysqli_query($conn, "select COUNT(ReviewID) AS number from HavenReview WHERE BicycleID ='$id'");
                             $row12 = mysqli_fetch_assoc($result12);
                            
                            ?>
                            <p><i class="fa fa-comments" style="color:limegreen;"></i> (<?php  echo($row12['number']);?>) Review(s)</p>
                                        <p style="font-size:12px;">Posted By <a href="vsellerprofileu.php?code=<?php echo $row['SellerUsername']; ?>" style="color:#00BFFF"><?php echo $row['AccountUsername']; ?><?php 
                                
                                if($row['SellerVerificationStatus'] =='Y'){
                                    echo" <i class='fa fa-check-circle' style='font-size:17px;color:#00BFFF;'></i>";
                                }
                                else{
                                    echo"";
                                }
                                
                                ?></a></p>
                                       
                                        <a href="product-details-user.php?code=<?php echo $row['BicycleID'];?>&code2=<?php echo $row['AccountUsername'];?>" class="btn btn-default add-to-cart"><i class="fa fa-mouse-pointer"></i>View Bicycle</a>
									</div>
								</div>
                                <!-- 
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>-->
							</div>
						</div>
                         <?php 
                            }//while end bracket
			                 }//Else end bracket
		                  ?>


					</div><!--features_items-->
                                        <br/><br/>
                        <div class="features_items" style="border:1px solid black;"><!--features_items-->
						<h2 class="title text-center">About Us</h2>
								
							<p style=""><b>CycleHaven</b> is a bicycle marketplace website that focuses on the relationship between the User and Seller. 
                            This Idea is conceived in the context of the thought process of the <b>Covid-19 Pandemic</b>, the idea was to provide a simple platform for different Sellers to sell their bicycles and Users to buy them. 
                            </p>
                            <br/>
                            <h4 style="margin-left:272px;">Leadership</h4>
                            <img src="images/pics/danial.jpg" alt="" style="width:100px;height:100px;margin-left:268px;"/>
                            <p style="margin-top:10px; margin-left:275px;"><b>Danial Haikal</b></p>
                            <p style="margin-top:10px; margin-left:160px;">Founder/Programmer/Lead Designer Of Cycle Haven</p>
						<br/>
					</div><!--features_items-->
                       <br/>                 
				</div>
                    
                </div>
                
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-7">
						
					</div>
					<div class="col-sm-3">
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © Cycle Haven Inc. All rights reserved.</p>
					<p class="pull-right">Designed by Danial Haikal<span><a target="_blank"></a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>