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
    <title>Order Details Page (Seller) | Cycle Haven</title>
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
    <?php
		// write the codes to select the bicycle info
		$code = $_REQUEST['code'];
        $code2 = $_REQUEST['code2'];
		$result = mysqli_query($conn, "select * from HavenOrder INNER JOIN HavenBicycle INNER JOIN HavenSeller INNER JOIN HavenUser ON HavenOrder.OrderID = '$code' AND HavenBicycle.BicycleID = '$code2' WHERE havenorder.AccountUsername= HavenUser.UserUsername and HavenBicycle.AccountUsername = HavenSeller.SellerUsername group by havenorder.BicycleID = havenbicycle.BicycleID;");
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
							<a href="indexseller.php"><img src="images/home/logo.png" alt=""/></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<!--<li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>-->
								<li><a href="sellerprofile.php"><i class="fa fa-lock"></i><?php echo $_SESSION['AccountUsername'] ?></a></li>
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
								<li><a href="indexseller.php"><i class="fa fa-home"></i> Home</a></li>
								<li ><a href="shopseller.php"><i class="fa fa-shopping-cart"></i> Bicycle<i></i></a></li> 
                                <li ><a href="sellerprofile.php"><i class="fa fa-user"></i> Profile<i></i></a></li> 
                                <li ><a href="orderinbox.php" class="active"><i class="fa fa-list"></i> Order Inbox<i></i></a></li>
                                <li ><a href="bots/bots.php"><i class="fa fa-users"></i> Ask A Bot/Help<i></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section style="margin-bottom:160px;">
<div class="container">
			<div class="row">
				<div class="col-sm-9 padding-right">
                    <div class="mainmenu pull-left" style="margin-bottom:10px;">
                        <a class="btn btn-default" href="orderinbox.php" style="color:white;background-color:#2196F3;text-decoration:none;"><i class="fa fa-arrow-left" style="font-size:15px;margin-right:4px;"></i>Go Back</a>
						</div>
					<div class="product-details" style="width:1100px;"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<?php echo $row['BicycleImage']; ?>" alt="" style="width:450px;"/>
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information" style="margin-left:30px;width:600px;"><!--/product-information-->
								
								<h2><?php echo $row['BicycleName']; ?></h2>
                                <p>Order Made By <a style="color:#00BFFF" href="vsellerprofiles.php?code=<?php echo $row['AccountUsername'];?>"><?php echo $row['AccountUsername']; ?></a></p>
                                <br/>
                                
                                <form action="orderinbox.php" name="apprOrder" method="post" >
                                             <input type="hidden" name="edit" value="<?php echo $row['OrderID'] ?>" style="color:black;">
                                             <input type="hidden" name="approve" value="Y" style="color:black;">
                                            <span class="fa-stack" style="width:70px;margin-right:30px;margin-top:20px;">
                                                <i class="fa fa-square fa-stack-2x" ></i>
                                                <button name="submit"  onclick="myFunction()" class="fa fa-check fa-stack-1x fa-inverse" style="background-color:green;font-size:20px;width:115px;"> Approve</button>
                                            </span>
                                            
                                         <span class="fa-stack" style="width:70px;margin-top:20px;margin-left:20px;">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <button name="submit2"  onclick="myFunction()" class="fa fa-flag fa-stack-1x fa-inverse" style="background-color:red;font-size:20px;width:110px;"> Flag</button>
                                            </span>
                                           
                                 </form>
								<span>
									<span style="font-size:20px;"><b style="color:#696763;">Total (<?php echo $row['OrderQuantity'] ?> Item):</b> RM <?php echo $row['BicyclePrice']; ?></span>
									
									<br/>
								</span>
                                <hr/>
                                <h4 style="text-decoration:underline;">Order Status</h4>
                                <p><b>Order Status:</b><?php echo $row['OrderStatus']; ?></p><br/>
                                <p><b>Order Message:</b><?php echo $row['OrderMessage']; ?></p>
                               
                                <a href="order-details-seller-update.php?code=<?php echo $row['OrderID'];?>" type="button" class="btn btn-default get" style="font-size: 14px;margin-bottom:3px;background-color:#FE980F;border:1px solid black;border:none;">Edit Details</a><hr/>
                                <h4 style="text-decoration:underline;">Order Info</h4>
								<p><b>Order ID:</b><?php echo $row['OrderID']; ?></p>
                               
                                 <small style="font-size:14px;color:#696969;"><b>Order Approval: </b><?php 
                                
                                if($row['OrderApproval'] =='Y'){
                                    echo" <div class='btn btn-success'>Approved</div>";
                                }
                                else{
                                    echo" <div class='btn btn-danger'>Flagged</div>";
                                }
                                
                                ?></small>
                                <p><b>Order Date Created:</b><?php echo $row['OrderDate']; ?></p>
                                 <hr/>
                                 <h4 style="text-decoration:underline;">User Info</h4>
                                 <p><b>User's Username:</b> <?php echo $row['UserUsername']; ?></p><br/>
                                 <p><b>User's Name:</b> <?php echo $row['UserName']; ?></p><br/>
                                <p><b>User's Email:</b> <?php echo $row['UserEmail']; ?></p><br/>
                                <p><b>User's Phone Number:</b> <?php echo $row['UserPhone']; ?></p>
                                <br/>
                                <hr>
                                <h4 style="text-decoration:underline;">User Payment Info</h4>
                                <p><b>Proof Of Payment</b></p>
								<img src="<?php echo $row['OrderPayment']; ?>" alt="" style="width:400px; height:350px;"/><br/><br/>
                                
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
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
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>