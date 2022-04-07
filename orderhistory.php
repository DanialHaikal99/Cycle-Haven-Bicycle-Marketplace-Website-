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
    <title>Order History Page| Cycle Haven</title>
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
								<li><a href="indexuser.php"><i class="fa fa-home"></i> Home</a></li>
								<li ><a href="shopuser.php"><i class="fa fa-shopping-cart"></i> Shop<i></i></a></li>
                                <li><a href="userprofile.php"><i class="fa fa-user"></i> Profile</a></li>
                                <li><a href="orderhistory.php" class="active"><i class="fa fa-clock-o"></i> Order History</a></li>
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
					<h2 class="title text-center">Order History</h2>
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section style="margin-bottom:234px;">
		<div class="container" style="margin-bottom:51px;">
			<div class="row" style="margin-right:480px;">
                <div class="col-sm-3">
                </div>
				<div class="col-sm-9 padding-right">
                    
                     	<?php  	
					       
                            
    
    
                            $sql="SELECT *FROM HavenBicycle INNER JOIN HavenOrder ON HavenBicycle.BicycleID = HavenOrder.BicycleID INNER JOIN HavenSeller On HavenBicycle.AccountUsername = HavenSeller.SellerUsername WHERE HavenOrder.AccountUsername='$session' order by OrderID desc;";
                                   
                            
                                    
                            $result = mysqli_query($conn, $sql);     
                            $count = mysqli_num_rows($result);
                             
                               
                                    
                        // if no records are found
                        if(mysqli_num_rows($result) == 0) 
                        {

                        ?>

                            <div style="width:800px;">
                                <h4 style="margin-left:260px;">No Orders Have Been Made Yet</h4>
                                 <img src="images/404/noorders.png" alt="" style="margin-left:200px;width:410px;height:400px;"/> 
                                </div>

                        <?php
                        }
                           

                        else{
                            // if got records found use looping to display the results
                            while($row = mysqli_fetch_assoc($result)) {
                            
				
                            
                            
                        
					                
          ?>			
                    <div class="col-sm-9 padding-right">
                                        
					<div class="features_items" style="border:1px solid black;width:800px;"><!--features_items-->
                        
						<div class="col-sm-4">
                            
							<div class="product-image-wrapper">
                                
								<div class="single-products" style="margin-top:25px;">
                                    
                                     <img src="<?php echo $row['BicycleImage'] ?>" alt="" style="max-width:130px;max-height:100px;"/> 
								</div>
                                
							</div>
                            
						</div>
		             <div class="col-sm-4" style="">
										<h3><?php echo $row['BicycleName'] ?></h3>
                                        <p style="font-size:12px;">Seller Username: <a href="vsellerprofileu.php?code=<?php echo $row['SellerUsername']; ?>" style="color:#00BFFF"><?php echo $row['SellerUsername']; ?></a><?php 
                                
                                if($row['SellerVerificationStatus'] =='Y'){
                                    echo" <i class='fa fa-check-circle' style='font-size:17px;color:#00BFFF;'></i>";
                                }
                                else{
                                    echo"";
                                }
                                
                                ?></p>
                                        <small style="color:grey;">Placed On <?php echo $row['OrderDate'] ?></small>
                                        <p><b>Order Status: </b><?php echo $row['OrderStatus'] ?></p>
                                        <p><b>Order ID: </b><?php echo $row['OrderID'] ?></p>
                                        <p><b>Order Quantity: </b><?php echo $row['OrderQuantity'] ?></p>
                                        <p><b>Total Price: </b>RM<?php echo $row['OrderTotalPrice'] ?></p>
						</div>
                        
                      <a href="orderdetails-user.php?code=<?php echo $row['BicycleID'];?>" type="button" class="btn btn-default get" style="margin-top:50px; margin-left:90px;font-size: 11px;">View More Details</a>
                                    
						  <a href="orderreview-user.php?code=<?php echo $row['BicycleID'];?>" type="button" class="btn btn-default get" style="margin-top:20px; margin-left:90px;font-size: 11px;width:112px;background-color:#2196F3;">Review Here</a>		
					</div><!--features_items-->
                                        <br/><br/> <br/><br/><br/>
                       <br/>  
				</div>
                    
                   <?php   
						} }  ?> 
                  
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