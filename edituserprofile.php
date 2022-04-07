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
    <title>Edit User Profile | Cycle Haven</title>
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
		$sql="select * from HavenUser where UserUsername='$session'";
					$resu=$conn->query($sql);
					if(empty(mysqli_num_rows($resu))){
						echo "session lost ERROR : $sql". $conn->error;
					}else{
						while($row=mysqli_fetch_assoc($resu)){
							$UserID		= $row["UserID"];
                            $UserUsername		= $row["UserUsername"];
							$UserName		= $row["UserName"];	
							$UserEmail			= $row["UserEmail"];	
							$UserPhone		= $row["UserPhone"];		
							$UserAddress			= $row["UserAddress"];					
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
								<li><a href="indexuser.php"><i class="fa fa-home"></i> Home</a></li>
								<li ><a href="shopuser.php"><i class="fa fa-shopping-cart"></i> Shop<i></i></a></li>
                                <li><a href="userprofile.php"  class="active"><i class="fa fa-user"></i> Profile</a></li>
                                <li><a href="orderhistory.php"><i class="fa fa-clock-o"></i> Order History</a></li>
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
	
	<section>
		<div class="container">
            
			<div class="row">
                
				<div class="col-sm-9 padding-right">
                    <div class="mainmenu pull-left" style="margin-bottom:10px;">
                        <a class="btn btn-default" href="userprofile.php" style="color:white;text-decoration:none;background-color:#2196F3;"><i class="fa fa-arrow-left" style="font-size:15px;margin-right:4px;"></i>Go Back</a>
						</div>
                   
					<div class="product-details" style="width:1100px;border:1px solid black;"><!--product-details-->
                         <?php 
                                    
                                    if(isset($_POST['submit'])) {
        
        
      
			
				 if(isset($_POST['edit'])){ 
              $User_ID			= $_POST['edit'];
              $User_Name	= $_POST['name'];  
              $User_Address 	= $_POST['address']; 
              $User_Phone 	= $_POST['phone'];  
              $User_Email 	= $_POST['email'];  
              
              
            $sql="select * from HavenUser where UserID='$User_ID'";
		    $resul=$conn->query($sql);
                       
              
					
                     
                        if ( $User_Name == "" || $User_Email == "" || $User_Phone  == "" ||  $User_Address == "") {
				echo "<div class ='box container'>
					<h5 style='color:red;'>Error: One or more fields are missing</h5>
					</div>";}
                            
                     else{
                      $queryu ="update HavenUser set UserName='$User_Name',UserAddress='$User_Address',UserPhone='$User_Phone',
                    UserEmail='$User_Email' where UserID = '$User_ID' ";
					$inuser = mysqli_query($conn,$queryu);   
                        
			             }
                         
                     
                         }
                                }
                                    
                                    ?>
                        <h3 style="margin-left:13px;"><b>User Profile</b></h3>
						<div class="col-sm-5" style="width:1100px;">
							<div class="view-product">
								<img src="images/pics/user.png" alt="" style="height:100px;width:90px;margin-bottom:10px;"/>
                                <br/><br/>
                                <a href="edituserpassword.php" class="btn btn-default" style="background-color:#FE980F;color:white;text-decoration:none;">Edit Password</a>
                                <p style="margin-top:10px;"><b>Name:</b></p>
                                <form action="edituserprofile.php" method="post" name="editprofile" enctype="multipart/form-data">
                                    <input type="hidden" name="edit" value="<?php echo $UserID; ?>" style="color:black;">
                                <input name="name" type="text" value="<?php echo $UserName ?>"/><br/><br/>
                                 <p><b>Email:</b></p>
                                <input name="email" type="text" value="<?php echo $UserEmail ?>"/><br/><br/>
                                <p><b>Phone:</b></p>
                                <input name="phone" type="text" value="<?php echo $UserPhone ?>"/><br/><br/>
                                <p><b>Address:</b></p>
                                <input name="address" type="text" value="<?php echo $UserAddress ?>" style="width:500px;height:100px;"/><br/><br/>   
                                    
                                 <p><b>Account Status: </b><span style="color:grey;">Active</span></p><br/>
                                   
                                    <button name="submit" type="submit" class="btn btn-default pull-right" style="margin-left:500px;margin-bottom:10px;background-color:#FE980F;color:white;">
											Submit
										</button>
                                    <br/>
                                    <a class="btn btn-default pull-right" href="userprofile.php" style="margin-left:500px;margin-bottom:10px;color:white;background-color:#32CD32;text-decoration:none;"><i class="fa fa-arrow-left" style="font-size:15px;margin-right:4px;"></i>View Updated Details</a>
                                    
                                </form>
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