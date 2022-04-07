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
    <title>View User Order | Cycle Haven</title>
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
								<li><a href="userprofile.php"><i class="fa fa-lock"></i><?php echo $_SESSION['AccountUsername'] ?></a></li>
                                <li><a href="logout.php"><i class="fa fa-book"></i> Logout</a></li>
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
	<?php
		// write the codes to select the bicycle info
		$code = $_REQUEST['code'];
		$result = mysqli_query($conn, "select * from HavenBicycle INNER JOIN HavenOrder INNER JOIN HavenSeller WHERE havenbicycle.BicycleID = '$code' and havenorder.BicycleID = '$code' and havenorder.AccountUsername='$session' and HavenBicycle.AccountUsername = HavenSeller.SellerUsername;");
		$count = mysqli_num_rows($result);

		// if no records are found
		if(mysqli_num_rows($result) == 0) 
		{
		?>
			<div><p>No Records Found</p></div>
		<?php
		} 
			else{
				$row = mysqli_fetch_assoc($result);
			
				}
                                    
               
		?>
	<section style="margin-bottom:30px;">
		<div class="container">
            
			<div class="row">
          
				<div class="col-sm-9 padding-right">
                          <div class="mainmenu pull-left" style="margin-bottom:10px;">
							 <a class="btn btn-default" href="orderhistory.php" style="color:white;background-color:#2196F3;text-decoration:none;"><i class="fa fa-arrow-left" style="font-size:15px;margin-right:4px;"></i>Go Back</a>
						</div>
                    <div class="mainmenu pull-left" style="margin-bottom:10px;">
						</div>
                   
					<div class="product-details" style="width:1100px;border:1px solid black;"><!--product-details-->
                        <h3 style="margin-left:12px;"><b>Order Details</b></h3>
						<div class="col-sm-5" style="width:1100px;">
							<div class="view-product">
                                <a href="vsellerprofileu.php?code=<?php echo $row['SellerUsername']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-address-card-o"></i>Seller - <?php echo $row['SellerName']; ?></a><br/>
								<img src="<?php echo $row['BicycleImage'] ?>" alt="" style="max-height:100px;max-width:150px;margin-bottom:10px;"/>
                                <p style="font-size:15px;text-decoration:underline;"><b>Main Order Details</b></p>
                                <p><b>Order ID: </b><?php echo $row['OrderID'] ?></p>
                                <p><b>Placed On: </b><?php echo $row['OrderDate'] ?></p>
                                <p><b>Total Price (<?php echo $row['OrderQuantity'] ?> Item): </b>RM<?php echo $row['OrderTotalPrice'] ?></p>
                                <hr>
                                 <p><b>Order Status: </b><span style="color:grey;"><?php echo $row['OrderStatus'] ?></span></p>
                                <hr>
                                <small><b style="color:red;">Reminder !</b> Please Take Note Of This Order Message, From Time To Time. The Status Of Your Order Depends On This Message Sent By The Seller.</small><br/><br/>
                                <p><b>Order Message: </b><span style="color:grey;"><?php echo $row['OrderMessage'] ?></span></p>
                                <hr>
                                 <p style="font-size:15px;text-decoration:underline;"><b>More Order Details</b></p>
                                <br/>
                                <p><b>Bicycle: </b><a href="product-details-user.php?code=<?php echo $row['BicycleID'];?>&code2=<?php echo $row['SellerUsername'];?>"><?php echo $row['BicycleName'] ?></a></p><br/>
                                <p><b>Bicycle Color: </b><?php echo $row['OrderColor'] ?></p><br/>
                                <p><b>Quantity: </b><?php echo $row['OrderQuantity'] ?> Item</p>
                                <hr>
                                <p style="font-size:15px;text-decoration:underline;"><b>Proof Of Payment</b></p>
                                <img src="<?php echo $row['OrderPayment'] ?>" alt="" style="max-height:300px;max-width:350px;margin-bottom:10px;"/><br/>
 
                                 <a href="orderdetails-user-update.php?code=<?php echo $row['OrderID'];?>" type="button" class="btn btn-default get" style="font-size: 14px;margin-bottom:3px;background-color:#FE980F;border:1px solid black;border:none;">Edit Proof Of Payment</a><br/>
                             
                                <div class="mainmenu pull-left" style="margin-bottom:10px;">
						</div>
							</div>
						</div>
						
					</div><!--/product-details-->
				</div>
			</div>
            <br/><br/><br/>
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
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>