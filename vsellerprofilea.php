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
   <?php
		// write the codes to select the bicycle info
		$code = $_REQUEST['code'];
		$result = mysqli_query($conn, "select * from HavenSeller INNER JOIN HavenBicycle ON HavenBicycle.AccountUsername = HavenSeller.SellerUsername WHERE SellerUsername = '$code'");
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
    
    
    $result1 = mysqli_query($conn, "select count(OrderID) from havenorder INNER JOIN havenbicycle ON havenbicycle.BicycleID=havenorder.BicycleID  WHERE havenbicycle.AccountUsername= '$code';");
    $count = mysqli_num_rows($result1);
    
    // if no records are found
		if(mysqli_num_rows($result1) == 0) 
		{
		?>
			<div><p>No Records Found</p></div>
		<?php
		} 
			else{
				$row1 = mysqli_fetch_assoc($result1);
			
				}
    
     $result2 = mysqli_query($conn, "select count(OrderID) from havenorder INNER JOIN havenbicycle ON havenbicycle.BicycleID=havenorder.BicycleID  WHERE havenbicycle.AccountUsername= '$code' AND havenorder.OrderStatus='Order Is Delivered';");
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
							<a href="admin/index.php"><img src="images/home/logo.png" alt=""/></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<!--<li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>-->
								<li><a href="admin/index.php"><i class="fa fa-lock"></i><?php echo $_SESSION['AccountUsername'] ?></a></li>
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
								<li><a href="admin/index.php"><i class="fa fa-home"></i> Home</a></li>
								<li ><a href="shopadmin.php"><i class="fa fa-shopping-cart"></i> Bicycle<i></i></a></li>
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
<div class="row" >
     <div class="mainmenu pull-left" style="margin-bottom:10px;margin-left:15px;">
							<a class="btn btn-default"  href="shopadmin.php" style="color:white;text-decoration:none;background-color:#2196F3;"><i class="fa fa-shopping-cart"></i> Go To Shop</a>
						</div><br/><br/><br/>
      <div class="col-xs-12 col-sm-9" >
        
          
          
        <!-- User profile -->
        <div class="panel panel-default" >
                   <!-- User profile -->
                    
                            <div class="panel panel-default" >
                              <div class="panel-heading">
                              <h4 class="panel-title">Seller profile</h4>
                              </div>
                              <div class="panel-body">
                                <div class="profile__avatar">
                                  <img src="images/pics/user.png" width="100px" height="100px" alt="...">
                                </div>
                                <div class="profile__header">

                                  <h4><?php echo $row['SellerUsername']; ?> <small>Seller</small><?php 
                                
                                if($row['SellerVerificationStatus'] =='Y'){
                                    echo" <i class='fa fa-check-circle' style='font-size:17px;color:#00BFFF;'></i>";
                                }
                                else{
                                    echo"";
                                }
                                
                                ?></h4>
                                     <?php
                
                                          $id = $row['SellerUsername'];
                                          $result9 = mysqli_query( $conn, "SELECT AVG(ReviewStar) AS avg FROM HavenReview INNER JOIN HavenSeller INNER JOIN HavenBicycle ON HavenBicycle.BicycleID=HavenReview.BicycleID AND HavenBicycle.AccountUsername=HavenSeller.SellerUsername WHERE HavenSeller.SellerUsername='$id'");
                                          $row9 = mysqli_fetch_assoc($result9);
                                
                
                                           if($row9['avg']==0){
                                               echo "<p style='color:silver;'>Seller Has Not Been Rated Yet</p> ";
                                           }
                                           else{
                                               echo"<p style='color:silver;'>Seller Has Been Rated.</p>";
                                           }
                                       ?>
                                         <p>Seller Rating: <?php  echo number_format($row9['avg'],1);?> <i class="fa fa-star" style="color:orange;"></i></p>
                                   
                                    
                                   
                                </div>
                              </div>
                            </div>
        </div>

        <!-- User info -->
        <div class="panel panel-default">
          <div class="panel-heading">
          <h4 class="panel-title">Seller Facts</h4>
          </div>
          <div class="panel-body">
            <table class="table profile__table">
              <tbody>
                <tr>
                  <th><strong>Total Orders</strong></th>
                  <td><?php echo $row1['count(OrderID)']?></td>
                </tr>
                <tr>
                  <th><strong>Total Orders Delivered</strong></th>
                  <td><?php echo $row2['count(OrderID)']?></td>
                </tr>
                   <tr>
                  <th><strong>Total Number Of Reviews</strong></th>
                  <td><?php
                
                                          $id2 = $row['SellerUsername'];
                                          $result10 = mysqli_query( $conn, "SELECT COUNT(ReviewStar) AS reviewn FROM HavenReview INNER JOIN HavenSeller INNER JOIN HavenBicycle ON HavenBicycle.BicycleID=HavenReview.BicycleID AND HavenBicycle.AccountUsername=HavenSeller.SellerUsername WHERE HavenSeller.SellerUsername='$id2'");
                                          $row10 = mysqli_fetch_assoc($result10);
                                
                
                                           
                                       ?>
                      <?php  echo number_format($row10['reviewn']); if($row10['reviewn']==0){
                                               echo "<span style='color:silver;'> (Seller Has No Reviews Yet.)</span> ";
                                           }
                                           else{
                                               echo"";
                                           }?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- User info 2-->
        <div class="panel panel-default">
          <div class="panel-heading">
          <h4 class="panel-title">Seller info</h4>
          </div>
          <div class="panel-body">
            <table class="table profile__table">
              <tbody>
                <tr>
                  <th><strong>Seller Name</strong></th>
                    <td><span style="float:right;"><?php echo $row['SellerName']; ?></span></td>
                </tr>
                <tr>
                  <th><strong>Bank Info</strong></th>
                    <td><span style="float:right;"><?php echo $row['SellerBank']; ?></span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>  
          

        <!-- Latest posts -->
        <div class="panel panel-default">
          <div class="panel-heading">
           
                               
              
              
          <h4 class="panel-title">Recently Posted By <?php echo $row['SellerUsername']; ?></h4>
          </div>
          <div class="panel-body">
            <div class="profile__comments">   
                                      <?php 
                
                
	             $sql2 = "select * from HavenBicycle INNER JOIN HavenSeller ON HavenBicycle.AccountUsername = HavenSeller.SellerUsername WHERE HavenSeller.SellerUsername = '$code' order by BicycleID desc";  
                 $result3 = mysqli_query($conn, $sql2);
		         $count = mysqli_num_rows($result3);

                // if no records are found
                if(mysqli_num_rows($result3) == 0) 
                {

                ?>

                    <div><p>No Records Found</p></div>

                <?php

                } 

                else{
                    // if got records found use looping to display the results
                    while($row3 = mysqli_fetch_assoc($result3)) {


                ?>
                    <div class="col-sm-4">
              <div class="product-image-wrapper" style="border:1px solid silver;">
                               
								<div class="single-products">
                                    
									<div class="productinfo text-center" >
                                         
										<img src="<?php echo $row3['BicycleImage']; ?>" alt="" style="width:120px;height:100px;"/>
										<h2>RM <?php echo $row3['BicyclePrice']; ?></h2>
										<p><?php echo $row3['BicycleName']; ?></p>
                                        <p style="font-size:12px;">Posted By <a href="vsellerprofilea.php?code=<?php echo $row3['SellerUsername']; ?>" style="color:#00BFFF"><?php echo $row3['AccountUsername']; ?></a><?php 
                                
                                if($row['SellerVerificationStatus'] =='Y'){
                                    echo" <i class='fa fa-check-circle' style='font-size:17px;color:#00BFFF;'></i>";
                                }
                                else{
                                    echo"";
                                }
                                
                                ?></p>
										<a href="product-details-admin.php?code=<?php echo $row3['BicycleID'];?>&code2=<?php echo $row3['AccountUsername'];?>" class="btn btn-default add-to-cart"><i class="fa fa-mouse-pointer"></i>View Details</a>
                                        
                                        
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
             
            
          </div>
        </div>
          </div>
      </div>
      <div class="col-xs-12 col-sm-3">
        
        <!-- Contact user -->
        

       
        
        <!-- Contact info -->
        <div class="profile__contact-info">
          <div class="profile__contact-info-item">
            <div class="profile__contact-info-icon">
              <i class="fa fa-phone"></i>
            </div>
            <div class="profile__contact-info-body">
              <h5 class="profile__contact-info-heading">Contact number</h5>
              <?php echo $row['SellerPhone']; ?>
            </div>
          </div>
             <hr class="profile__contact-hr">
          <div class="profile__contact-info-item">
            <div class="profile__contact-info-icon">
              <i class="fa fa-envelope-square"></i>
            </div>
            <div class="profile__contact-info-body">
              <h5 class="profile__contact-info-heading">E-mail address</h5>
              <a href="mailto:admin@domain.com"><?php echo $row['SellerEmail']; ?></a>
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