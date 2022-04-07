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
    <title>Verification Request | Cycle Haven</title>
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
							<a href="indexseller.php"><img src="images/home/logo.png" alt=""/></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
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
                                <li ><a href="sellerprofile.php" class="active"><i class="fa fa-user"></i> Profile<i></i></a></li> 
                                <li ><a href="orderinbox.php"><i class="fa fa-list"></i> Order Inbox<i></i></a></li>
                                <li ><a href="bots/bots.php"><i class="fa fa-users"></i> Ask A Bot/Help<i></i></a></li>
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
	
	<section style="margin-bottom:110px;">
         <?php  	
					$sql="select * from HavenSeller where SellerUsername='$session'";
					$resu=$conn->query($sql);
					if(empty(mysqli_num_rows($resu))){
						echo "session lost ERROR : $sql". $conn->error;
					}else{
						while($row=mysqli_fetch_assoc($resu)){
							$SellerID		= $row["SellerID"];
                            $SellerUsername		= $row["SellerUsername"];
							$SellerName		= $row["SellerName"];	
							$SellerEmail			= $row["SellerEmail"];	
							$SellerPhone		= $row["SellerPhone"];		
							$SellerBank			= $row["SellerBank"];	
                            $SellerVerificationStatus		= $row["SellerVerificationStatus"];
						}
					}
                                    
                                    
                    $sql2="select * from HavenAccount where AccountUsername='$session'";
					$result=$conn->query($sql2);
					if(empty(mysqli_num_rows($result))){
						echo "session lost ERROR : $sql2". $conn->error;
					}else{
						while($row2=mysqli_fetch_assoc($result)){
							$AccountID		= $row2["AccountID"];
                            $AccountUsername		= $row2["AccountUsername"];
							$AccountPassword		= $row2["AccountPassword"];						
						}
					} 
                                    
                                    
                   $result2 = mysqli_query($conn, "select count(OrderID) from havenorder INNER JOIN havenbicycle ON havenbicycle.BicycleID=havenorder.BicycleID  WHERE havenbicycle.AccountUsername= '$session' AND havenorder.OrderStatus='Order Is Delivered';");
    $count = mysqli_num_rows($result2);
    
    // if no records are found
		if(mysqli_num_rows($result2) == 0) 
		{
		?>
			<div><p>No Records Found</p></div>
		<?php
		} 
			else{
				$row2 = mysqli_fetch_assoc($result2);
			
				}                 
          ?>
		<div class="container" style="margin-bottom:50px;">
            
			<div class="row">
          
				<div class="col-sm-9 padding-right">
                     <div class="mainmenu pull-left" style="margin-bottom:10px;">
                        <a class="btn btn-default" href="sellerprofile.php" style="background-color:#2196F3;color:white;text-decoration:none;"><i class="fa fa-arrow-left" style="font-size:15px;margin-right:4px;"></i>Go Back</a>
						</div>
                   
					<div class="product-details" style="width:1100px;border:1px solid black;"><!--product-details-->
                        <h3 style="margin-left:10px;"><b>Verification Request</b></h3>
						<div class="col-sm-5" style="width:1100px;margin-bottom:30px;">
							<div class="view-product">
                                <small><b style="color:red;">Alert!</b><span style="color:black;"> Minimum Requirement To Be Verified In The Systems Are: Rating 3.0 & Total Orders Delivered : 10</span></small><br/><br/>
                               <i class="fa fa-user-circle" style="font-size:150px;"></i>
                                <br/><br/>
                                    <?php
                                      
                                          $result10 = mysqli_query( $conn, "SELECT AVG(ReviewStar) AS reviewn FROM HavenReview INNER JOIN HavenSeller INNER JOIN HavenBicycle ON HavenBicycle.BicycleID=HavenReview.BicycleID AND HavenBicycle.AccountUsername=HavenSeller.SellerUsername WHERE HavenSeller.SellerUsername='$session'");
                                          $row10 = mysqli_fetch_assoc($result10); 
                                       ?>
                                 <h5><b>Seller Rating: </b><?php  echo number_format($row10['reviewn'],1);?> <i class="fa fa-star" style="color:orange;"></i><?php if($row10['reviewn']==0){
                                               echo "<span style='color:silver;'>(Seller Has Not Been Rated Yet.)</span> ";
                                           }
                                           else{
                                               echo"";
                                           }?></h5>
                              <br/>
                                    <h5><b>Total Orders Delivered :</b><?php echo $row2['count(OrderID)']?></h5>
                                <form name="veriffrm" enctype="multipart/form-data" action="verification-request.php" method="post">
                                     <input style="width:50px;" type='hidden' name='account_username' value="<?php echo  $_SESSION['AccountUsername'];?>">
                                    <input style="width:50px;" type='hidden' name='seller_rating' value="<?php  echo number_format($row10['reviewn'],1);?>">
                                    <input style="width:50px;" type='hidden' name='total_delivered' value="<?php echo $row2['count(OrderID)']?>">
                                <button name="submit" type="submit" class="btn btn-default pull-right" style="margin-left:500px;margin-bottom:10px;background-color:#FE980F;color:white;">
											Submit
										</button>
                                </form>			
								<br/><br/>
                                 <?php 
                                    
                                     include ('dbconnect.php');

                                        if(isset($_POST['submit'])) {

                                            // removing ID coz it will be auto-incremented anyway
                                            $AccountUsername    = $_POST['account_username'];
                                            $SellerRating		= $_POST['seller_rating'];
                                            $TotalDelivered		= $_POST['total_delivered'];
                                            
      
                                            $resulto = mysqli_query($conn, "select * from HavenVerification  WHERE  AccountUsername = '$AccountUsername';");
                                            $count = mysqli_num_rows($resulto);

                                            if($SellerRating >=2.9 && $TotalDelivered >=9) {
                                             if(mysqli_num_rows($resulto)!=0) {
                                                echo "<p style='color:red;'>You have already made a verification request for this  bicycle</p>";
                                                 
                                            }
                                            else{
                                                 
                                                
                                                   
                                                    
                                                    
                                                     $query = "INSERT INTO HavenVerification(VerificationSRating, VerificationTDelivered, AccountUsername)VALUES ('$SellerRating',' $TotalDelivered', '$AccountUsername') "; 

                                                                    $inuser = mysqli_query($conn,$query);

                                                      $query = "UPDATE HavenSeller SET SellerVerificationStatus='Y' WHERE SellerUsername='$AccountUsername' "; 

                                                                    $inuser = mysqli_query($conn,$query);
                                                    
                                                    if($inuser == false){			
                                                                echo"<p>ERROR : can't $sql".$conn->error."</p></div>";
                                                            }
                                                            else {			
                                                                 echo "<div class ='box container'>			
                                                                    <p>	<b style='color:#32CD32;'>Verification Sent Successfully</b></p></div>";
       
                                                            }
                                            
                                        }
                                         } 
                                            else{
                                                echo " <p style='color:red;'>Your requirements to be a verified seller has not met the minimum.</p> ";
                                            }
                                            
                                              }
                                       ?>
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