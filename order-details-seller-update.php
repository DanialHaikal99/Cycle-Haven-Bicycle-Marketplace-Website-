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
		$result = mysqli_query($conn, "select * from HavenOrder INNER JOIN HavenBicycle INNER JOIN HavenSeller INNER JOIN HavenUser ON HavenOrder.OrderID = '$code' WHERE havenorder.AccountUsername= HavenUser.UserUsername and HavenBicycle.AccountUsername = HavenSeller.SellerUsername AND havenorder.BicycleID = havenbicycle.BicycleID;");
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
	
	<section style="margin-bottom:270px;">
<div class="container">
			<div class="row">
				<div class="col-sm-9 padding-right">
                    <div class="mainmenu pull-left" style="margin-bottom:10px;">
                        <a class="btn btn-default" href="order-details-seller.php?code=<?php echo $row['OrderID'];?>&code2=<?php echo $row['BicycleID'];?>" style="color:white;background-color:#2196F3;margin-bottom:20px;text-decoration:none;"><i class="fa fa-arrow-left" style="font-size:15px;margin-right:4px;"></i>Go Back</a>
						</div>
							<div class="product-details" style="width:1100px;border:1px solid black;"><!--/product-information-->
								
								
                               

                                
                                <h3 style="margin-left:13px;">Update Order Status</h3><br/>
                               
                                <form action="order-details-seller-update.php" style="color:black;" method="POST">  
                                  <input type="hidden" name="code" value="<?php echo $row['OrderID']; ?>" style="color:black;">  
                            <input type="hidden" name="edit" value="<?php echo $row['OrderID']; ?>" style="color:black;">
                            <?php
                                    
                                    $statuss=explode("," , $row['OrderStatus']);
                                        
                                    ?>
                                     <small style="font-size:15px;margin-left:13px;"><b>Order Status :</b></small>
                                        <select name="status" style="width:200px;margin-bottom:10px;margin-left:16px;">
                                         
                                        <?php
                                                foreach($statuss as $status):
                                                echo '<option value="'.$status.'">'.$status.'</option>'; //close your tags!!
                                                endforeach;
                                        ?>
                                              <option value="Order Is Packing">Order Is Packing</option>
                                              <option value="Order Is Shipping">Order Is Shipping</option>
                                              <option value="Order Is Delivered">Order Is Delivered</option>
                                       </select>
                                    <br/><br/>
                                    <small style="font-size:15px;margin-left:13px;"><b>Order Message :</b></small>
                                    <textarea name="message" type="text" placeholder="Type Order Message For Buyer" style="width:300px;height:150px;"><?php echo $row['OrderMessage']?></textarea><br/><br/>
                                    <?php
			  if(isset($_POST['submit'])) {
				 if(isset($_POST['edit'])){ 
              $OrderID			= $_POST['edit'];
              $OrderStatus	= $_POST['status'];        
              $OrderMessage	= $_POST['message']; 
              $code = $_POST['code'];       
         
                        if ($OrderMessage == "") {
				echo "<div class ='box container'>
					<h5 style='color:red;'>Error: Message field is missing</h5>
					</div>";}
                            
                     else{
                       $queryu ="update HavenOrder set OrderMessage='$OrderMessage', OrderStatus='$OrderStatus' where OrderID = '$OrderID' ";
					$inuser = mysqli_query($conn,$queryu);   
                        
			            
                         
                      if($inuser == false){			
                                                                echo"<p>ERROR : can't $sql".$conn->error."</p></div>";
                                                            }
                                                            else {			
                                                                 echo "<div class ='box container'>			
                                                                    <p>	<b style='color:#32CD32;'>Updated Successfully</b></p></div>";
                                                                
                                                            } }
                         }
                                     }
                                ?>
                                     <button name="submit" type="submit" class="btn btn-default pull-right" style="margin-right:10px;margin-bottom:10px;background-color:#FE980F;color:white;">
											Submit
										</button>
                            </form>
                                
							</div><!--/product-information-->
						
					
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