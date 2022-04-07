<?php
	session_start();
    include ("checksession.php");
include ("dbconnect.php");

$session = $_SESSION['AccountUsername'];
?>

<?php 
    include('dbconnect.php');
    
	if (isset($_POST["addCart"])){
        if (isset($_SESSION["cart"][1])){
            $item_array_id = array_column($_SESSION["cart"],"BicycleID");
           
            if (!in_array($_GET["BicycleID"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'BicycleID' => $_POST["hidden_id"],
                    'BicycleName' => $_POST["hidden_name"],
                    'BicyclePrice' => $_POST["hidden_price"],
                    'BicycleImage' => $_POST["hidden_image"],
                    'BicycleColor' => $_POST["visible_color"],
                    'AccountUsername' => $_POST["hidden_seller"],
                    'SellerBank' => $_POST["hidden_bank"],
                    'gadget_quantity' => $_POST["gadget_quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="cart.php"</script>';           
            
             }
            else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="cart.php"</script>';
            }
        }
        else{
            $item_array = array(
                'BicycleID' => $_POST["hidden_id"],
                'BicycleName' => $_POST["hidden_name"],
                'BicyclePrice' => $_POST["hidden_price"],
                'BicycleImage' => $_POST["hidden_image"],
                'BicycleColor' => $_POST["visible_color"],
                'AccountUsername' => $_POST["hidden_seller"],
                'SellerBank' => $_POST["hidden_bank"],
                'gadget_quantity' => $_POST["gadget_quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }
     if(isset($_GET["AccountUsername"])){
        $item_array_user = array_column($_SESSION["cart"],"AccountUsername");
         if($item_array_user !=$_GET["AccountUsername"]){
              echo '<script>alert("The Product Added Is From A Different Seller")</script>';
                echo '<script>window.location="cart.php"</script>';
         }
         }
    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["BicycleID"] == $_GET["BicycleID"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Bicycle has been Removed")</script>';
                    echo '<script>window.location="cart.php"</script>';
                }
            }
        }
        
    }  
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart | Cycle Haven</title>
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
                                <li><a href="orderhistory.php"><i class="fa fa-clock-o"></i> Order History</a></li>
                                <li><a href="bot/bot.php"><i class="fa fa-question-circle"></i> Ask A Bot/Help</a></li>
                                <li><a href="cart.php" class="active"><i class="fa fa-cart-plus"></i> Cart</a></li>
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

	<section id="cart_items" style="margin-bottom:40px;">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a>Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
                <h5>(<span style="color:red;">Note To User: </span>If This Cart Is Empty, To Continue Please Just Start Adding Bicycles To Cart To Continue)</h5>
			</div>
            
			<div class="table-responsive cart_info">
                 <?php
    
    
                $_SESSION['total'] = 0;
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                        foreach ($_SESSION["cart"] as $key => $value) {
                            ?>
                <table class="table table-condensed">
                    
					<thead>
                        
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
                            <td >Remove</td>
							<td></td>
						</tr>
					</thead>
                    
					<tbody>
						<tr>
							<td class="cart_product">
                               
								<a href=""><img src="<?php echo $value["BicycleImage"]; ?>" alt="" style="max-width:70px;max-height:50px;"></a>
                                 <p  style="visibility:hidden;" ><?php echo $value["BicycleID"]; ?></p>
							</td>
							<td class="cart_description" style="max-width:100px;">
								<h4><a href=""><?php echo $value["BicycleName"]; ?></a></h4>
								<p>Color: <?php echo $value["BicycleColor"]; ?></p>
                                <p style="font-size:12px;">Seller : <a href="vsellerprofileu.php?code=<?php echo $value['AccountUsername']; ?>" style="color:#00BFFF"><?php echo $value['AccountUsername']; ?></a></p>
							</td>
							<td class="cart_price" style="max-width:100px;">
								<p>RM<?php echo $value["BicyclePrice"]; ?></p>
                                <small style="font-size:5px;color:white;"><?php echo $value["SellerBank"]; ?></small>
							</td>
							<td class="cart_quantity" style="max-width:30px;">
								<div class="cart_quantity_button">
                                    <p><?php echo $value["gadget_quantity"];  ?></p>
								</div>
							</td>
                            <td class="cart_delete">
								<a class="cart_quantity_delete" href="cart.php?action=delete&BicycleID=<?php echo $value["BicycleID"]; ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                        <?php
                                $total = $total + ($value["gadget_quantity"] * $value["BicyclePrice"]);
                                $_SESSION['total'] = $total;
                            ?>
					</tbody>
                    
				</table>
               <div class="total_area" style="max-width:1050px;">
						<ul>
							<li>Total <span>RM<?php echo number_format($total, 2); ?></span></li>
						</ul>
					</div>
                 
			
            
              
                       <?php   }  } ?>
                  
              </div>              
            
           
          
		</div>
          
	</section> <!--/#cart_items-->

                    
    
	<section id="do_action" style="margin-bottom:40px;">
		<div class="container">
			<div class="row">
				
                 
				<?php  
                if (isset($_SESSION["cart"][0])){
                
                ?>
                <a class="btn btn-default check_out" href="order.php" style="margin-left:990px;">Proceed To Checkout</a>
                     
			   <?php 
                 }
                
                 else{
                     echo"";
                 }
                
                ?>
			</div>
		</div>
        
	</section><!--/#do_action-->
    
<section id="advertisement" style="margin-bottom:187px;">
        
                <div class="container">
                    <img src="images/shop/advertisements1.png" alt="" />
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
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>