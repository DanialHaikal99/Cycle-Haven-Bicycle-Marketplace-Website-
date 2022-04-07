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
    <title>View User Order | Cycle Haven</title>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head><!--/head-->

<body>
    
    <style>
    .rating {
    border: none;
}

.myratings {
    font-size: 20px;
    color: green
}

.rating>[id^="star"] {
    display: none
}

.rating>label:before {
    margin: 5px;
    font-size: 20px;
    font-family: FontAwesome;
    display: inline-block;
    content: "\f005"
}

.rating>.half:before {
    content: "\f089";
    position: absolute
}

.rating>label {
    color: #ddd;
    float: right
}

.rating>[id^="star"]:checked~label,
.rating:not(:checked)>label:hover,
.rating:not(:checked)>label:hover~label {
    color: #FFD700
}

.rating>[id^="star"]:checked+label:hover,
.rating>[id^="star"]:checked~label:hover,
.rating>label:hover~[id^="star"]:checked~label,
.rating>[id^="star"]:checked~label:hover~label {
    color: #FFED85
}

.reset-option {
    display: none
}

.reset-button {
    background-color: rgb(255, 255, 255);
    text-transform: uppercase
}

.mt-100 {
    margin-top: 100px
}

.card {
    width: 350px;
}

.card .card-body {
}

.card-body {

}

    </style>
    
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
                                <li><a href="orderhistory.php" class="active"><i class="fa fa-clock-o"></i> Order History</a></li>
                                <li><a href="bot/bot.php"><i class="fa fa-question-circle"></i> Ask A Bot/Help</a></li>
                                <li><a href="cart.php"><i class="fa fa-cart-plus"></i> Cart</a></li>
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
	<?php
		// write the codes to select the bicycle info
		$code = $_REQUEST['code'];
		$result = mysqli_query($conn, "select * from HavenBicycle INNER JOIN HavenOrder INNER JOIN HavenSeller WHERE havenbicycle.BicycleID = '$code' and havenorder.BicycleID = '$code' and havenorder.AccountUsername='$session' and HavenBicycle.AccountUsername = HavenSeller.SellerUsername;");
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
	<section style="margin-bottom:30px;">
		<div class="container">
            
			<div class="row">
          
				<div class="col-sm-9 padding-right">
                          <div class="mainmenu pull-left" style="margin-bottom:10px;">
							 <a class="btn btn-default" href="orderhistory.php" style="color:white;background-color:#2196F3;text-decoration:none;"><i class="fa fa-arrow-left" style="font-size:15px;margin-right:4px;"></i>Go Back</a>
						</div>
                    <div class="mainmenu pull-left" style="margin-bottom:10px;">
						</div>
                   
					<div class="product-details" style="width:1100px;border:1px solid black;"><!--product-details-->
                        <h3 style="margin-left:12px;"><b>Review Page</b></h3>
                        
						<div class="col-sm-5" style="width:1100px;">
							<div class="view-product">
                                <a href="vsellerprofileu.php?code=<?php echo $row['SellerUsername']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-address-card-o"></i>Seller - <?php echo $row['SellerName']; ?></a><br/>
								<img src="<?php echo $row['BicycleImage'] ?>" alt="" style="max-height:100px;max-width:150px;margin-bottom:10px;"/>
                                <p style="font-size:15px;text-decoration:underline;"><b>Main Order Details</b></p>
                                <p><b>Order ID: </b><?php echo $row['OrderID'] ?></p>
                                <p><b>Placed On: </b><?php echo $row['OrderDate'] ?></p>
                                <p><b>Total Price (<?php echo $row['OrderQuantity'] ?> Item): </b>RM<?php echo $row['OrderTotalPrice'] ?></p>
                                <hr>
                                 <p><b>Order Status: </b><span style="color:grey;"><?php echo $row['OrderStatus'] ?></span></p>
                                
                                <hr>
                                <?php 
                                $resulto4 = mysqli_query($conn, "select * from HavenOrder INNER JOIN HavenReview ON HavenOrder.BicycleID=HavenReview.BicycleID AND HavenOrder.AccountUsername=HavenReview.AccountUsername WHERE HavenReview.BicycleID = '$code' AND HavenReview.AccountUsername = '$session' AND HavenOrder.OrderStatus = 'Order Is Delivered';");
                                $count = mysqli_num_rows($resulto4);
                                          
                                      if(mysqli_num_rows($resulto4)==1){
                                              echo"<br/><h3 style='margin-right:813px;background-color:silver;'><i class='fa fa-star'' style='color:orange;'></i> Review Has Already Been Made</h3>";
                                          }
                                     else if($row['OrderStatus']=='Order Is Shipping'){
                                               echo"<br/><h3 style='margin-right:842px;background-color:silver;'><i class='fa fa-star'' style='color:orange;'></i> Review Is Not Available Yet</h3>";
                                          }
                                      else if($row['OrderStatus']=='Order Is Generated'){
                                               echo"<br/><h3 style='margin-right:842px;background-color:silver;'><i class='fa fa-star'' style='color:orange;'></i> Review Is Not Available Yet</h3>";
                                          }
                                      else if($row['OrderStatus']=='Order Is Packing'){
                                               echo"<br/><h3 style='margin-right:842px;background-color:silver;'><i class='fa fa-star'' style='color:orange;'></i> Review Is Not Available Yet</h3>";
                                          }
					            else if(mysqli_num_rows($resulto4)==0){
                                    
                                
                                
                                ?>
                                <script>
                                    $(document).ready(function(){

                                    $("input[type='radio']").click(function(){
                                    var sim = $("input[type='radio']:checked").val();
                                    //alert(sim);
                                    if (sim<3) { $('.myratings').css('color','red'); $(".myratings").text(sim); }else{ $('.myratings').css('color','green'); $(".myratings").text(sim); } }); });
                                    </script>
                                
                                    <form name="reviewfrm" enctype="multipart/form-data" action="orderreview-user.php" method="post">
                                        <input style="width:50px;" type='hidden' name='code' value="<?php echo $row["BicycleID"];?>">
                                        <input style="width:50px;"  type='hidden' name='code2' value="<?php echo $row["AccountUsername"];?>">
                                    <input style="width:50px;" type='hidden' name='hidden_bicycle_id' value="<?php echo $row["BicycleID"];?>">	
                                    <input style="width:50px;" type='hidden' name='hidden_username' value="<?php echo $_SESSION["AccountUsername"];?>">    
                                        <h4 style="text-decoration:underline;">Post Review</h4>
                                                <div class="card">
                                                    <div class="card-body text-left" > <span class="myratings">5</span>
                                                        <h4 class="mt-1">Order Rating :</h4>
                                                        <fieldset class="rating" style="margin-right:205px;"> <input type="radio" id="star5" name="rating" value="5" checked="checked"/><label class="full" for="star5" title="Awesome - 5 stars"></label> <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label> <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label> <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label> <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label> <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label> <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label> <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label> <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label> <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label> <input type="radio" class="reset-option" name="rating" value="reset" /> </fieldset>
                                                    </div>
                                                </div>
                                          
                                      
                                    
									<p><b>Write Your Review</b></p>
									
									
										<span>
                                            <p>Review Title :</p>
											<textarea name="reviewtitle" type="text" placeholder="Your Title" style="width:150px;height:30px;"></textarea><br/><br/>
										 <p>Review Description :</p>
										<textarea name="reviewdesc" placeholder="Your Review"></textarea>
                                            </span>
										<button type="submit" name="submit" class="btn btn-default pull-right" >
											Submit
										</button>
                                        <script>
                                        function myFunction() {
                                            alert("Still working on the feature");
                                            }
                                        </script>
                                         <?php 
                                    
                                     include ('dbconnect.php');

                                        if(isset($_POST['submit'])) {

                                            // removing ID coz it will be auto-incremented anyway
                                            $ReviewTitle		= $_POST['reviewtitle'];
                                            $ReviewDesc		= $_POST['reviewdesc'];
                                            $ReviewStar		= $_POST['rating'];
                                            $AccountUsername	= $_POST['hidden_username'];
                                            $BicycleID	= $_POST['hidden_bicycle_id']; 
                                            $code = $_POST['code'];
                                            $code2 = $_POST['code2'];
                                              
                    
                                            
                                            $resulto = mysqli_query($conn, "select * from HavenReview  WHERE BicycleID = '$BicycleID' AND AccountUsername = '$AccountUsername';");
                                            $count = mysqli_num_rows($resulto);

                                            $resulto2 = mysqli_query($conn, "select * from HavenOrder  WHERE BicycleID = '$BicycleID' AND AccountUsername = '$AccountUsername' AND OrderStatus = 'Order Is Delivered';");
                                            $count = mysqli_num_rows($resulto2);
                                            
                                            
                                             if(mysqli_num_rows($resulto)!=0) {
                                                echo "<div class ='box container'>			
                                                        <p style='color:red;'>You have already made a review for this  bicycle</p>					
                                                        </div>";
                                                 
                                            }
                                            else{
                                               if($ReviewTitle =="" || $ReviewDesc =="" || $ReviewStar =="" ){			
                                                    echo "<div class ='box container'>			
                                                        <p style='color:red;'>One Or More Fields Are Missing</p>					
                                                        </div>";
                                                                          
                                                                                 }
                                                 else if(mysqli_num_rows($resulto2)!=1) {
                                                echo "<div class ='box container'>			
                                                        <p style='color:red;'>Your order has not been delivered yet for you to review on this bicycle.</p>					
                                                        </div>";
                                                  }
                                                
                                                 else{    
                                                    
                                                    
                                                     $query = "INSERT INTO HavenReview(ReviewTitle, ReviewDesc, ReviewStar, AccountUsername, BicycleID) 
                                                                                VALUES ('$ReviewTitle',' $ReviewDesc', '$ReviewStar', '$AccountUsername', '$BicycleID')";

                                                                    $inuser = mysqli_query($conn,$query);

                                                      
                                                    
                                                    if($inuser == false){			
                                                                echo"<p>ERROR : can't $sql".$conn->error."</p></div>";
                                                            }
                                                            else {			
                                                                 echo "<div class ='box container'>			
                                                                    <p>	<b style='color:#32CD32;'>Review Sent Successfully</b></p></div>";
                                                                
                                                                 echo "<script>
                                                               
                                                                  alert('Review Sent Successfully. Please Check The Bicycle Page Again For The Updated Review You've Added.);
                                                                
                                                                </script>";
                                                         ?>
                                        
                                        <a  class='btn btn-default add-to-cart' href='product-details-user.php?code=<?php echo $row['BicycleID'];?>&code2=<?php echo $row['SellerUsername']; ?>' style='color:white;background-color:#32CD32;'><i class='fa fa-star' style='font-size:15px;margin-right:4px;color:orange;'></i>View Review</a>
                                        
                                        <?php
                                                               
                                                                 
                                                            }
                                            }
                                        }
                                              }
                                       ?>
                                        
									</form>
                                     <?php }
                                          
                                         
                                ?>
                                
							</div>
						</div>
						
					</div><!--/product-details-->
				</div>
			</div>
            <br/><br/><br/>
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