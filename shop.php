<?php

include ("dbconnect.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop | Cycle Haven</title>
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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    

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
							<a href="index.php"><img src="images/home/logo.png" alt=""/></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<!--<li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>-->
								<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
                               <li><a href="register.php"><i class="fa fa-book"></i> Register</a></li>
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
								<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
								<li ><a href="shop.php" class="active"><i class="fa fa-shopping-cart"></i> Shop<i></i></a></li>
							</ul>
						</div>
					</div>
                    
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
    
	<section id="advertisement">
        
		<div class="container">
			<img src="images/shop/advertisements1.png" alt="" />
		</div>
	</section>
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
                        <div class="price-range"><!--price-range-->
							<h2>Filter By Price</h2>
							<div class="well">
                                <!--
                                <form action="pricerange.php" style="color:black;" method="POST">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="2000" data-slider-step="5" data-slider-value="[0,2000]" id="sl2" ><br />
								 <b>RM 0</b> <b class="pull-right">RM 2000</b>
                                </form>-->
                                <form action="shop.php"  method="GET"> 
                                <p style="margin-left:5px;color:silver;">Type The Price To Filter (RM)</p>
                                <label for="min" class="col-lg-4">Min:</label><input type="number" value="<?php if(isset($_GET['min'])){echo $_GET['min']; }else{echo "100";} ?>"  name="min"  style="width:auto;margin-bottom:10px;"  class="form-control" max="4999"> 
                                <label for="max" class="col-lg-4">Max:</label> <input type="number" value="<?php if(isset($_GET['max'])){echo $_GET['max']; }else{echo "900";} ?>"  name="max"  style="width:auto;"  class="form-control" max="5000" >
                                <button class="btn btn-primary" type="submit" style="margin-left:61px;">Filter</button>
                                </form>
							</div>
						</div><!--/price-range-->
						<h2>Filter By Type</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
                            
                            
							<form action="shop.php" style="color:black;" method="POST">    
                            
                            <select name="category">
                            <option value="all">All</option>
                            <option value="normalb">Normal Bike</option>
                            <option value="mountainb">Mountain Bike</option>
                            <option value="foldingb">Folding Bike</option>
                            <option value="childrenb">Children Bike</option>
                            <option value="roadb">Road Bike</option>
                            </select><br/><br/>
                            <input type="submit" class="btn btn-primary" value="Filter" name="submit" style="margin-left:100px;">
                            </form>
                            

						</div><!--/category-productsr-->
					
                        <div class="brands_products">
							<h2>Sort By Time</h2>
							<div class="brands-name">
								
                            <form action="shop.php" style="color:black;" method="POST">    
                            
                            <select name="category">
                            <option value="latest">Latest</option>
                            <option value="old">Oldest</option>

                            </select><br/><br/>
                            <input type="submit" class="btn btn-primary" value="Sort" name="submit" style="margin-left:100px;">
                            </form>
                                
							</div>
						</div>
                        <!--
						<div class="brands_products">
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href=""> <span class="pull-right">(1)</span>Cyca</a></li>
								</ul>
							</div>
						</div>-->
					</div>
				</div>
				<div class="col-sm-9 padding-right">
                    <div class="row height d-flex justify-content-center align-items-center">
                        <form action="shop.php" method="get">
                            
                            
        <div class="col-md-8">
            <div class="search" style=" position: relative;"> <i class="fa fa-search" style="position: absolute;top: 10px;left: 16px;"></i> 
                
                
                <input value="<?=isset($_GET['search'])?$_GET['search']:'';?>"  name="search" list="searcha" style="text-indent: 25px;"  class="form-control" placeholder="Search Bicycles Here..."> 
                
                <!--
                <datalist id="searcha">
                <option value="Mountain Bike">
                <option value="Folding Bike">
                <option value="Road Bike">
                <option value="Children Bike">
               </datalist>-->
                
                <button style="position: absolute;background:blue;bottom:1px;left:570px;" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button></div>
            <br/>
        </div>
                            
                            
                        </form>
                    </div>
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Featured Items</h2>
                        <?php 
                
                        
                        
                   if(isset($_GET['search'])){
                  
                   $search = '%' . $_GET['search'] . '%';
                   $sql = "select * from HavenBicycle  INNER JOIN HavenSeller WHERE HavenBicycle.AccountUsername = HavenSeller.SellerUsername AND HavenBicycle.BicycleApproval='Y' AND BicycleName like '%$search%' order by BicycleID desc limit 15";
                
                  
              }                                
                 else if(isset($_POST['category']) && $_POST['category'] == 'all') 
        {   
	        $sql = "select * from HavenBicycle INNER JOIN HavenSeller WHERE HavenBicycle.AccountUsername = HavenSeller.SellerUsername AND HavenBicycle.BicycleApproval='Y' order by BicycleID desc ";  
        }
          else if(isset($_POST['category']) && $_POST['category'] == 'latest') 
        {   
	       $sql = "select * from HavenBicycle  INNER JOIN HavenSeller WHERE HavenBicycle.AccountUsername = HavenSeller.SellerUsername AND HavenBicycle.BicycleApproval='Y' order by BicycleID desc";  
        } 
         else if(isset($_POST['category']) && $_POST['category'] == 'old') 
        {   
	       $sql = "select * from HavenBicycle  INNER JOIN HavenSeller WHERE HavenBicycle.AccountUsername = HavenSeller.SellerUsername AND HavenBicycle.BicycleApproval='Y' order by BicycleID asc";  
        } 
                        
         else if(isset($_POST['category']) && $_POST['category'] == 'normalb') 
        {   
	       $sql = "SELECT * FROM HavenBicycle INNER JOIN HavenSeller ON HavenBicycle.AccountUsername = HavenSeller.SellerUsername WHERE BicycleCategory = 'Normal Bike' AND HavenBicycle.BicycleApproval='Y' LIMIT 15";  
        }                 
	      else if(isset($_POST['category']) && $_POST['category'] == 'mountainb') 
        {   
	       $sql = "SELECT * FROM HavenBicycle INNER JOIN HavenSeller ON HavenBicycle.AccountUsername = HavenSeller.SellerUsername WHERE BicycleCategory = 'Mountain Bike' AND HavenBicycle.BicycleApproval='Y' LIMIT 15 ";  
        }     
        else if(isset($_POST['category']) && $_POST['category'] == 'foldingb') 
        {   
	       $sql = "SELECT * FROM HavenBicycle INNER JOIN HavenSeller ON HavenBicycle.AccountUsername = HavenSeller.SellerUsername WHERE BicycleCategory = 'Folding Bike' AND HavenBicycle.BicycleApproval='Y' LIMIT 15";  
        }    
        else if(isset($_POST['category']) && $_POST['category'] == 'childrenb') 
        {   
	       $sql = "SELECT * FROM HavenBicycle INNER JOIN HavenSeller ON HavenBicycle.AccountUsername = HavenSeller.SellerUsername WHERE BicycleCategory = 'Children Bike' AND HavenBicycle.BicycleApproval='Y' LIMIT 15";  
        }  
        else if(isset($_POST['category']) && $_POST['category'] == 'roadb') 
        {   
	       $sql = "SELECT * FROM HavenBicycle INNER JOIN HavenSeller ON HavenBicycle.AccountUsername = HavenSeller.SellerUsername WHERE BicycleCategory = 'Road Bike' AND HavenBicycle.BicycleApproval='Y' LIMIT 15 ";  
        } 
        else if(isset($_GET['min']) && isset($_GET['max']))
        {
                            $min = $_GET['min'];
                            $max = $_GET['max'];

                            $sql = "SELECT * FROM HavenBicycle INNER JOIN HavenSeller WHERE HavenBicycle.AccountUsername = HavenSeller.SellerUsername AND HavenBicycle.BicycleApproval='Y' AND BicyclePrice BETWEEN '$min' AND '$max' order by BicyclePrice asc LIMIT 15 ";
        }                
        else
        {
            $sql = "select * from HavenBicycle INNER JOIN HavenSeller WHERE HavenBicycle.AccountUsername = HavenSeller.SellerUsername AND HavenBicycle.BicycleApproval='Y'  order by BicycleID desc";
        }          
                   
                        
                $result = mysqli_query($conn, $sql);
		        $count = mysqli_num_rows($result);

		// if no records are found
		if(mysqli_num_rows($result) == 0) 
		{
            
		?>
            
			<div><p>No Bicycles Found</p></div>
            
		<?php
            
		} 
			
		else{
			// if got records found use looping to display the results
			while($row = mysqli_fetch_assoc($result)) {
	
			
		?>
						<div class="col-sm-4">
                            
							<div class="product-image-wrapper">
                               
								<div class="single-products">
                                    
									<div class="productinfo text-center" >
                                         
										<img src="<?php echo $row['BicycleImage']; ?>" style="height:180px;" />
										<h2>RM <?php echo $row['BicyclePrice']; ?></h2>
										<p><?php echo $row['BicycleName']; ?></p>
                                        <?php
                             $id = $row['BicycleID'];
                             $result12 = mysqli_query($conn, "select COUNT(ReviewID) AS number from HavenReview WHERE BicycleID ='$id'");
                             $row12 = mysqli_fetch_assoc($result12);
                            
                            ?>
                            <p><i class="fa fa-comments" style="color:limegreen;"></i> (<?php  echo($row12['number']);?>) Review(s)</p>
                                        <p style="font-size:12px;">Posted By <a href="vsellerprofilem.php?code=<?php echo $row['SellerUsername']; ?>" style="color:#00BFFF"><?php echo $row['AccountUsername']; ?></a><?php 
                                
                                if($row['SellerVerificationStatus'] =='Y'){
                                    echo" <i class='fa fa-check-circle' style='font-size:13px;color:#00BFFF;'></i>";
                                }
                                else{
                                    echo"";
                                }
                                
                                ?></p>
										<a href="product-details.php?code=<?php echo $row['BicycleID'];?>&code2=<?php echo $row['SellerUsername'];?>" class="btn btn-default add-to-cart"><i class="fa fa-mouse-pointer"></i>View Details</a>
                                        <a href="#" class="btn btn-default add-to-cart" onclick="myFunction()"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        
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
						 <script>
                        function myFunction() {
                        alert("Please register/log-in first to use this feature");
                                              }
                        </script>
                        <!--
						<ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul>-->
					</div><!--features_items-->
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