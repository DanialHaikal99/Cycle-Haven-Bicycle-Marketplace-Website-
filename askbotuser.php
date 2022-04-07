<?php
	session_start();
    include ("checksession.php");
include ("dbconnect.php");

$session = $_SESSION['UserUsername'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Q&A Bot | Cycle Haven</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
    
    .card {
    width: 300px;
    border: none;
    border-radius: 15px
}

.adiv {
    background: #04CB28;
    border-radius: 15px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
    font-size: 12px;
    height: 46px
}

.chat {
    border: none;
    background: #E2FFE8;
    font-size: 10px;
    border-radius: 20px
}

.bg-white {
    border: 1px solid #E7E7E9;
    font-size: 10px;
    border-radius: 20px
}

.myvideo img {
    border-radius: 20px
}

.dot {
    font-weight: bold
}

.form-control {
    border-radius: 12px;
    border: 1px solid #F0F0F0;
    font-size: 13px
}

.form-control:focus {
    box-shadow: none
}

.form-control::placeholder {
    font-size: 13px;
    color: #C4C4C4
}
    </style>
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
							<ul class="" style="text-decoration:none;margin-top:10px;">
								<li><a href=""><i class="fa fa-lock"></i><?php echo $_SESSION['UserUsername'] ?></a></li>
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
								<li><a href="indexuser.php" >Home</a></li>
								<li ><a href="shopuser.php" >Shop<i></i></a></li> 
                                <li ><a href="userprofile.php">Profile<i></i></a></li> 
                                <li><a href="orderhistory.php">Order History</a></li>
                                <li><a href="askbotuser.php" class="active">Ask A Bot/Help</a></li>
                                <li><a href="cart.php">Cart</a></li>
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
	
	<section>
		<div class="container">
            
			<div class="row">
          
				<div class="col-sm-9 padding-right">
                    <div class="mainmenu pull-left" style="margin-bottom:10px;">
						</div>
                   
					<div class="product-details" style="width:1100px;border:1px solid black;"><!--product-details-->
                        <h3 style="margin-left:476px;"><b>Ask A Bot/Help</b></h3><br/>
                        <h3 style="margin-left:449px;"><b>Questions to ask here</b></h3>
                   <br/>
							<button type="submit" class="btn btn-default" style="color:white;background-color:#2196F3;margin-left:452px;font-size:13px;"><a href="listofcommonq-user.php" style="color:white;text-decoration:none;">List Of Common Questions</a></button>
						<br/>
						<div class="col-sm-5" style="width:1100px;">
							<div class="container d-flex justify-content-center" style="margin-left:120px;margin-bottom:20px; width:800px;">
                    <div class="card mt-5">
                <div class="d-flex flex-row justify-content-between p-3 adiv text-white"> <i class="fas fa-chevron-left"></i> <span class="pb-3">Q&A Bot</span> <i class="fas fa-times"></i> </div>
                <div class="d-flex flex-row p-3"> <img src="https://img.icons8.com/color/48/000000/circled-user-female-skin-type-7.png" width="30" height="30">
            <div class="chat ml-2 p-3">Hello and thank you for visiting CycleHaven. Please click the textbox below to start asking me questions.</div>
            </div>
            <div class="d-flex flex-row p-3">
            <div class="bg-white mr-2 p-3"><span class="text-muted">What is the payment process in this website?</span></div> <img src="https://img.icons8.com/color/48/000000/circled-user-male-skin-type-7.png" width="30" height="30">
            </div>
            <div class="d-flex flex-row p-3"> <img src="https://img.icons8.com/color/48/000000/circled-user-female-skin-type-7.png" width="30" height="30">
            <div class="chat ml-2 p-3"><span class="text-muted dot">In CycleHaven, the payment process does not involve the normal fpx banking but we use an upload proof of payment process that require a screenshot of the transfer done to the seller that will be used to verify the payment process</span></div>
             </div>
             <div class="form-group px-3"> <textarea class="form-control" rows="5" placeholder="Type your message" style="font-size:15px;"></textarea> </div>
            </div>
            </div>
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