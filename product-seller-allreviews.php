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
    <title>Bicycle Page | Cycle Haven</title>
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
    <?php
		// write the codes to select the bicycle info
		$code = $_REQUEST['code'];
        $code2 = $_REQUEST['code2'];
		$result = mysqli_query($conn, "select * from HavenBicycle WHERE BicycleID = '$code' AND AccountUsername = '$code2'");
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
								<li ><a href="shopseller.php" class="active"><i class="fa fa-shopping-cart"></i> Bicycle<i></i></a></li> 
                                <li ><a href="sellerprofile.php"><i class="fa fa-user"></i> Profile<i></i></a></li> 
                                <li ><a href="orderinbox.php"><i class="fa fa-list"></i> Order Inbox<i></i></a></li>
                                <li ><a href="bots/bots.php"><i class="fa fa-users"></i> Ask A Bot/Help<i></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section style="min-height:624px;margin-bottom:10px;">
<div class="container">
			<div class="row">
				<div class="col-sm-9 padding-right">
                     <div class="mainmenu pull-left" style="margin-bottom:10px;margin-left:15px;">
							<a class="btn btn-default" href="product-details-seller.php?code=<?php echo $row['BicycleID'];?>&code2=<?php echo $row['AccountUsername'];?>" style="color:white;text-decoration:none;background-color:#2196F3;"><i class="fa fa-arrow-left" style="font-size:15px;margin-right:4px;"></i> Go Back To Bicycle</a>
                        
						</div><br/><br/><br/><br/>
					
					<div class="category-tab shop-details-tab" style="border:1px dashed black;width:1085px;"><!--category-tab-->
						<div class="col-sm-12">
                            <h3 style="margin-left:23px;">All Reviews</h3>
                            <p style="margin-left:23px;"> <img src="<?php echo $row['BicycleImage']; ?>" alt="" style="width:50px;height:40px;"/> <?php echo $row['BicycleName'];?></p>
                              <br/>
                               <?php
                                          $result8 = mysqli_query( $conn, "SELECT AVG(ReviewStar) AS avg FROM HavenReview WHERE BicycleID='$code';");
                                          $row8 = mysqli_fetch_assoc($result8);
                                       ?>
                             <p style="color:black;margin-left:23px;font-size:20px;"><b>Rating : <?php  echo number_format($row8['avg'],1);?> </b><i class="fa fa-star" style="color:orange;"></i></p><br/>
                             <?php
                             $result12 = mysqli_query($conn, "select COUNT(ReviewID) AS number from HavenReview WHERE BicycleID ='$code'");
                             $row12 = mysqli_fetch_assoc($result12);
                            
                            ?>
                            <p style="margin-left:23px;"><i class="fa fa-comments" style="color:limegreen;"></i> (<?php  echo($row12['number']);?>) Review(s)</p>
                            <h5 style="margin-left:23px;">Recently Added</h5>
                              
						</div>
                      
						<div class="tab-content">
							
                                           
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
                                    <?php
                                    
                                          $sql4 = "select * from HavenReview INNER JOIN HavenSeller INNER JOIN HavenBicycle INNER JOIN HavenUser ON HavenBicycle.BicycleID = HavenReview.BicycleID AND HavenSeller.SellerUsername = HavenBicycle.AccountUsername AND HavenReview.AccountUsername = HavenUser.UserUsername WHERE HavenBicycle.BicycleID ='$code' AND HavenBicycle.AccountUsername='$code2' order by HavenReview.ReviewID DESC";
                                          $result4 = mysqli_query($conn, $sql4);
                                          $count4 = mysqli_num_rows($result4);

                                // if no records are found
                                if(mysqli_num_rows($result4) == 0) 
                                {

                                ?>

                                    <div><h4> <i class="fa fa-star" style="color:orange;"></i><span style="color:silver;"> No Reviews Has Been Made Yet For This Bicycle.</span></h4></div>
                                        <br/>
                                <?php

                                } 
                                  
                                else{
                                    // if got records found use looping to display the results
                                    while($row4 = mysqli_fetch_assoc($result4)) {

			
		                           ?>
									<div class="col-sm-12" style="border:1px solid black;margin-bottom:10px;">
									<ul>
										<li><a><i class="fa fa-user"></i><?php echo $row4["UserUsername"];?></a></li>
                                        <b>Rating: <?php echo $row4["ReviewStar"];?>  <i class="fa fa-star" style="color:orange;"></i> </b>
                                        <br/>
                                        <p><?php echo $row4["ReviewTitle"];?></p>
                                        <p><?php echo $row4["ReviewDesc"];?></p>
                                        <small style="color:grey;"><?php echo $row4["ReviewDate"];?></small>
									</ul>
								    </div>
                                    <?php }} ?>
                                    
                                 
                                   
								</div>
                                
							</div>
							
						</div>
					</div><!--/category-tab-->
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
					<p class="pull-left">Copyright ?? Cycle Haven Inc. All rights reserved.</p>
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