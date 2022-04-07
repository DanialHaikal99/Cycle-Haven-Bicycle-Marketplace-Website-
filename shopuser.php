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
    <title>User Shop | Cycle Haven</title>
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
								<li ><a href="shopuser.php" class="active"><i class="fa fa-shopping-cart"></i> Shop<i></i></a></li>
                                <li><a href="userprofile.php"><i class="fa fa-user"></i> Profile</a></li>
                                <li><a href="orderhistory.php"><i class="fa fa-clock-o"></i> Order History</a></li>
                                <li><a href="bot/bot.php"><i class="fa fa-question-circle"></i> Ask A Bot/Help</a></li>
                                <li><a href="cart.php"><i class="fa fa-cart-plus"></i> Cart</a></li>
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
                                <form action=""  method="GET"> 
                                <p style="margin-left:5px;color:silver;">Type The Price To Filter (RM)</p>
                                <label for="min" class="col-lg-4">Min:</label><input type="number" value="<?php if(isset($_GET['min'])){echo $_GET['min']; }else{echo "100";} ?>"  name="min"  style="width:auto;margin-bottom:10px;"  class="form-control" max="4999"> 
                                <label for="max" class="col-lg-4">Max:</label> <input type="number" value="<?php if(isset($_GET['max'])){echo $_GET['max']; }else{echo "900";} ?>"  name="max"  style="width:auto;"  class="form-control" max="5000" >
                                <button class="btn btn-primary" type="submit" style="margin-left:61px;">Filter</button>
                                </form>
							</div>
						</div><!--/price-range-->
						<h2>Filter By Type</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
                            
                            
							<form action="shopuser.php" style="color:black;" method="POST">    
                            
            <select name="category">
            <option value="all">All</option>
            <option value="normalb">Normal Bike</option>
            <option value="mountainb">Mountain Bike</option>
            <option value="foldingb">Folding Bike</option>
            <option value="childrenb">Children Bike</option>
            <option value="roadb">Road Bike</option>
            </select><br/><br/>
            <input class="btn btn-primary" type="submit" value="Sort" name="submit" style="margin-left:100px;">
                            </form>
                            

						</div><!--/category-productsr-->
					
				     <div class="brands_products">
							<h2>Sort By Time</h2>
							<div class="brands-name">
								
                            <form action="shopuser.php" style="color:black;" method="POST">    
                            
                            <select name="category">
                            <option value="latest">Latest</option>
                            <option value="old">Oldest</option>

                            </select><br/><br/>
                            <input class="btn btn-primary" type="submit" value="Sort" name="submit" style="margin-left:100px;">
                            </form>
                                
							</div>
						</div>
                        <br/><br/>
							 <!--<h2>More Sorting</h2>-->
                           
					</div>
                    <br/>
                
				</div>
                
				<div class="col-sm-9 padding-right">
                    <div class="row height d-flex justify-content-center align-items-center">
                        <form action="shopuser.php" method="get">
                            
                            
        <div class="col-md-8">
            <div class="search" style=" position: relative;"> <i class="fa fa-search" style="position: absolute;top: 10px;left: 16px;"></i> 
                
                
                <input value="<?=isset($_GET['search'])?$_GET['search']:'';?>"  name="search" list="searcha" style="text-indent: 25px;"  class="form-control" placeholder="Search Bicycles Here..."> 
                
                
                
                
                <datalist id="searcha">
                <option value="Mountain Bike">
                <option value="Folding Bike">
                <option value="Road Bike">
                <option value="Children Bike">
               </datalist>
                
                <button style="position: absolute;background:blue;bottom:1px;left:570px;" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button></div>
            <br/>
        </div>
                            
                            
                        </form>
                    </div>
                    
                    
                    
                    
                    
					<!--features_items-->
                    <div class="features_items" ><!--features_items-->
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
            
			<div><p>No Bicycles Found</p></div><br/>
            
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
                                         
										<img src="<?php echo $row['BicycleImage']; ?>" style="height:180px;"/>
										<h2>RM <?php echo $row['BicyclePrice']; ?></h2>
										<p><b><?php echo $row['BicycleName']; ?></b></p>
                                         <?php
                
                                          $id = $row['BicycleID'];
                                          $result9 = mysqli_query( $conn, "SELECT AVG(ReviewStar) AS avg FROM HavenReview WHERE BicycleID='$id'");
                                          $row9 = mysqli_fetch_assoc($result9);
                                
                
                                           if($row9['avg']==0){
                                               echo "<p style='color:grey;'>No Reviews Yet.</p> ";
                                           }
                                           else{
                                          ?>     
                                               
                                                                <?php
                             $result12 = mysqli_query($conn, "select COUNT(ReviewID) AS number from HavenReview WHERE BicycleID ='$id'");
                             $row12 = mysqli_fetch_assoc($result12);
                            
                            ?>
                            <p><i class="fa fa-comments" style="color:limegreen;"></i> (<?php  echo($row12['number']);?>) Review(s)</p>
                                        <?php
                                           }
                                       ?>
                                         <p>Rating: <?php  echo number_format($row9['avg'],1);?> <i class="fa fa-star" style="color:orange;"></i></p>
                                        <p style="font-size:12px;">Posted By <a href="vsellerprofileu.php?code=<?php echo $row['SellerUsername']; ?>" style="color:#00BFFF"><?php echo $row['AccountUsername']; ?><?php 
                                
                                if($row['SellerVerificationStatus'] =='Y'){
                                    echo" <i class='fa fa-check-circle' style='font-size:13px;color:#00BFFF;'></i>";
                                }
                                else{
                                    echo"";
                                }
                                
                                ?></a></p>
                                        <a href="product-details-user.php?code=<?php echo $row['BicycleID'];?>&code2=<?php echo $row['AccountUsername'];?>" class="btn btn-default add-to-cart"><i class="fa fa-mouse-pointer"></i>View Details</a>
                                        <form method='POST' action='cart.php?action=addCart&BicycleID=<?php echo $row["BicycleID"]; ?>'>
                                             <p style="color:black;float:center;margin-top:5px;">Quantity: <input type='number' name='gadget_quantity' value='0' style="width:20%;color:black;" min="1" max="5"></p>
                                            
                                     <?php
                                    
                                    $colors=explode("," , $row['BicycleColor']);
                                    $colors = array_diff($colors, array(""));
                                        
                                    ?>
                                     
                                        <select name="visible_color" style="width:200px;margin-bottom:10px;">
                                         
                                        <?php
                                                foreach($colors as $color):
                                                $color = trim($color);
                                                echo '<option value="'.$color.'">'.$color.'</option>'; //close your tags!!
                                                endforeach;
                                        ?>
                                         
                                       </select>
                                            
                                            <button  name='addCart' class="btn btn-default add-to-cart" style="margin-top:2px;"><i class="fa fa-shopping-cart"></i>Add To Cart</button>
                                        
                                        <input type='hidden' name='hidden_id' value="<?php echo $row["BicycleID"];?>">    
                                        <input type='hidden' name='hidden_name' value="<?php echo $row["BicycleName"];?>">	
		                                <input type='hidden' name='hidden_price' value="<?php echo $row["BicyclePrice"];?>">
                                        <input type='hidden' name='hidden_image' value="<?php echo $row["BicycleImage"];?>">
                                        <input type='hidden' name='hidden_seller' value="<?php echo $row["AccountUsername"];?>">
                                        <input type='hidden' name='hidden_bank' value="<?php echo $row["SellerBank"];?>">    
                                        </form>
                                        
										
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
                        alert("Still Working on this feature");
                                              }
                        </script>
                            
                       </div><!--features_items-->
                        
                        <!--
						<ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul>-->
                 
                   
						
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