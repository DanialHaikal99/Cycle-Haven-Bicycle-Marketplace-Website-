<?php
	session_start();
    include ("checksession.php");
include ("dbconnect.php");
include ("checkcart.php");
$session = $_SESSION['AccountUsername'];
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Order/Checkout Page | Cycle Haven</title>
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
<?php
		$sql="select * from HavenUser where UserUsername='$session'";
					$resu=$conn->query($sql);
					if(empty(mysqli_num_rows($resu))){
						echo "session lost ERROR : $sql". $conn->error;
					}else{
						while($row=mysqli_fetch_assoc($resu)){
							$UserID		= $row["UserID"];
                            $UserUsername		= $row["UserUsername"];
							$UserName		= $row["UserName"];	
							$UserEmail			= $row["UserEmail"];	
							$UserPhone		= $row["UserPhone"];		
							$UserAddress			= $row["UserAddress"];					
						}
					}
                                    
                                    
                    $sql2="select * from HavenAccount where AccountUsername='$session'";
					$result=$conn->query($sql2);
					if(empty(mysqli_num_rows($result))){
						echo "session lost ERROR : $sql2". $conn->error;
					}else{
						while($row=mysqli_fetch_assoc($result)){
							$AccountID		= $row["AccountID"];
                            $AccountUsername		= $row["AccountUsername"];
							$AccountPassword		= $row["AccountPassword"];						
						}
					} 
?>
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
	

	</header><!--/header-->
	<section>
		<div class="container" style="margin-bottom:50px;">
            
			<div class="row">
          
				<div class="col-sm-9 padding-right">
                   <br/>
					<div class="product-details" style="width:1100px;border:1px solid black;"><!--product-details-->
                        

                        
                        <h3 style="margin-left:15px;"><b>Help For Order Page</b></h3>
                         <h5><b><span style="color:#428bca;margin-left:15px;">Note To User : </span>Please read thoroughly if the proof of payment concept is new for you.</b></h5>
                         <div class="mainmenu pull-left" style="margin-bottom:5px;margin-left:15px;">
							<a class="btn btn-default" href="order.php" style="color:white;text-decoration:none;background-color:#2196F3;"><i class="fa fa-arrow-left" style="font-size:15px;margin-right:4px;"></i> Go Back To Order</a>
						</div>
				      <br/><br/><br/>
                       
                       
                       <p style="margin-left:15px;"><b>Step 1 :</b> Add Your Bicycle(s) That You Wish To Purchase In The Cart.</p>
                        <br/><br/>
                         <img src="images/help/1.png"  style="margin-left:15px;width:500px;height:280px;"> 
                        <br/><br/>
                       <p style="margin-left:15px;"><b>Step 2 :</b> Proceed To Order Page Through The "Proceed To Checkout" Button.</p>
                         <br/><br/>
                        <img src="images/help/2.png"  style="margin-left:15px;width:500px;height:280px;"> 
                        <br/><br/>
                       <p style="margin-left:15px;"><b>Step 3 :</b> Check Your Profile Information Whether It Is Correct And Confirm Whether The Bicycle(s) Selected Are The One You Wish To Purchase, If It Is Not. Then Click On Go Back To Cart Button And Remove The Bicycle(s) In The Cart.</p>
                        <br/><br/> 
                        <img src="images/help/4.png"  style="margin-left:15px;width:500px;height:280px;"> 
                        <br/><br/>
					   <p style="margin-left:15px;"><b>Step 4 :</b> Click On Preferable Malaysian Banks For Link To A New Tab To The Online Banking Of Those Malaysian Online Banking Websites. Refer To The Seller Bank Account Info On The Checkout/Order Page On The Payment Section</p>
                        <br/><br/>
                         <img src="images/help/3.png"  style="margin-left:15px;width:500px;height:280px;"> 
                        <br/><br/>
                        <p style="margin-left:15px;"><b>Step 5 :</b> Submit The Photo If You Are Sure, Click The Reset Button If It Is Incorrect. It should be ok after that, then click Proceed To View The Order That Has Been Made. Enjoy.</p>
                         <img src="images/help/7.png"  style="margin-left:15px;width:550px;height:310px;"> 
                        <br/>
                         <h5><b><span style="color:red;margin-left:15px;">Note To User : </span></b>Other Recognized Malaysian Online Banking Methods Are Allowed But Not Recommended.</h5>
						</div><!--/product-details-->
                        
				</div>
			</div>
            <br/><br/>
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