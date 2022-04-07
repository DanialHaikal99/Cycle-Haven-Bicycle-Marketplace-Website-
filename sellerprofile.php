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
    <title>Seller Profile | Cycle Haven</title>
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
	
	<section>
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
						while($row=mysqli_fetch_assoc($result)){
							$AccountID		= $row["AccountID"];
                            $AccountUsername		= $row["AccountUsername"];
							$AccountPassword		= $row["AccountPassword"];						
						}
					}     
                                    
                     
          ?>
		<div class="container" style="margin-bottom:50px;">
            
			<div class="row">
          
				<div class="col-sm-9 padding-right">
                    <div class="mainmenu pull-left" style="margin-bottom:10px;">
						</div>
                   
					<div class="product-details" style="width:1100px;border:1px solid black;"><!--product-details-->
                        <h3 style="margin-left:13px;"><b>Seller Profile</b></h3>
						<div class="col-sm-5" style="width:1100px;margin-bottom:30px;">
							<div class="view-product">
								<img src="images/pics/user.png" alt="" style="height:100px;width:90px;margin-bottom:10px;"/>
                                <br/><br/>
                               <?php
                
                                         
                                          $result10 = mysqli_query( $conn, "SELECT AVG(ReviewStar) AS reviewn FROM HavenReview INNER JOIN HavenSeller INNER JOIN HavenBicycle ON HavenBicycle.BicycleID=HavenReview.BicycleID AND HavenBicycle.AccountUsername=HavenSeller.SellerUsername WHERE HavenSeller.SellerUsername='$SellerUsername'");
                                          $row10 = mysqli_fetch_assoc($result10); 
                                       ?>
                                 <p><b style="color:grey;">Seller Rating: </b><?php  echo number_format($row10['reviewn'],1);?> <i class="fa fa-star" style="color:orange;"></i><?php if($row10['reviewn']==0){
                                               echo "<span style='color:silver;'>(Seller Has Not Been Rated Yet.)</span> ";
                                           }
                                           else{
                                               echo"";
                                           }?></p>
                                <a href="verification-request.php" type="button" class="btn btn-default get" style="margin-top:10px;font-size: 15px;background-color:#2196F3;"><i class="fa fa-check-circle"></i> Request Verification</a>
                                <br/><br/>
                                
                                <p>Name: <?php echo $SellerName ?></p><br/>
                                <p>Username: <?php echo $SellerUsername ?><?php 
                                
                                if($SellerVerificationStatus=='Y'){
                                    echo" <i class='fa fa-check-circle' style='font-size:17px;color:#00BFFF;'></i>";
                                }
                                else{
                                    echo"";
                                }
                                
                                ?></p><br/>
                                <p>Email: <?php echo $SellerEmail ?></p><br/>
                                <p>Phone: <?php echo $SellerPhone ?></p><br/>
                                <p>Bank Info: <?php echo $SellerBank ?></p><br/>
                                 <p>Account Status: <span style="color:grey;">Active</span></p><br/>
                                
                                <a href="editsellerprofile.php" class="btn btn-default pull-right" style="background-color:#FE980F;color:white;text-decoration:none;">Edit Details</a>
											
								<br/><br/>
                                
							</div>
						</div>
                       
					</div><!--/product-details-->
                    
                    
                    <div class="product-details" style="width:1100px;border:1px solid black;">
                     <h3 style="margin-left:13px;"><b>My Bicycles</b></h3> 
                        <div class="col-sm-5" style="width:1100px;margin-bottom:30px;">
							<div class="view-product">
								
                                <br/><br/>
                               <?php 
                                $sql3="select * from HavenBicycle INNER JOIN HavenSeller ON AccountUsername = SellerUsername where SellerUsername='$session'";
					 $result3 = mysqli_query($conn, $sql3);
		        $count = mysqli_num_rows($result3);

		// if no records are found
		if(mysqli_num_rows($result3) == 0) 
		{
            
		?>
            
			<div><p>No Bicycles Found</p></div><br/>
            
		<?php
            
		} 
			
		else{
			// if got records found use looping to display the results
			while($row = mysqli_fetch_assoc($result3)) {
	
			             
                                
                                
                                ?>
                                 <div class="col-sm-4">
              <div class="product-image-wrapper" style="border:1px solid silver;">
                               
								<div class="single-products">
                                    
									<div class="productinfo text-center" >
                                         
										<img src="<?php echo $row['BicycleImage']; ?>" alt="" style="width:120px;height:100px;"/>
										<h2>RM <?php echo $row['BicyclePrice']; ?></h2>
										<p><?php echo $row['BicycleName']; ?></p>
                                        <p style="font-size:12px;">Posted By <a href="vsellerprofiles.php?code=<?php echo $row['AccountUsername']; ?>" style="color:#00BFFF"><?php echo $row['AccountUsername']; ?><?php 
                                
                                if($row['SellerVerificationStatus'] =='Y'){
                                    echo" <i class='fa fa-check-circle' style='font-size:17px;color:#00BFFF;'></i>";
                                }
                                else{
                                    echo"";
                                }
                                
                                ?></a></p>
										<a href="product-details-seller.php?code=<?php echo $row['BicycleID'];?>&code2=<?php echo $row['AccountUsername'];?>" class="btn btn-default add-to-cart"><i class="fa fa-mouse-pointer"></i>View Details</a>
                                        <?php 
                                
                                if($row['BicycleApproval'] =='Y'){
                                    echo" <br/><div class='btn btn-success'>Approved</div><br/><br/>";
                                }
                                else if($row['BicycleApproval'] =='R'){
                                    echo" <br/><div class='btn btn-danger'>Rejected</div><br/><br/>";
                                }
                                else{
                                    echo"<br/><div class='btn btn-warning'>Pending</div><br/><br/>";
                                }
                                
                                ?>
                                        
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
                         <?php }}?>      
                                
							</div>
						</div>
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
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>