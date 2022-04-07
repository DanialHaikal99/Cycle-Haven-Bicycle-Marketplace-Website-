<?php
	session_start();
    include ("checksession.php");
include ("dbconnect.php");
include ("checkcart.php");
$session = $_SESSION['AccountUsername'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Order/Checkout Page | Cycle Haven</title>
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
							<a href=""><img src="images/home/logo.png" alt=""/></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-lock"></i><?php echo $_SESSION['AccountUsername'] ?></a></li>
                                <li><a href="logout.php"><i class="fa fa-book"></i> Logout</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		
	</header><!--/header-->
	<section>
		<div class="container" style="margin-bottom:50px;">
            
			<div class="row">
          
				<div class="col-sm-9 padding-right">
                   <br/>
                                           <div class="breadcrumbs" style="height:60px;">
				<ol class="breadcrumb">
				  <li><a>Home</a></li>
				  <li class="active">Order/Checkout Page</li>
				</ol>
			</div>
					<div class="product-details" style="width:1100px;border:1px solid black;"><!--product-details-->
                        

                        
                        <h3 style="margin-left:15px;"><b>Order/Checkout Page</b></h3>
                         <h5><b><span style="color:#428bca;margin-left:15px;">Note To User : </span>Please make sure all details below are correct.</b></h5>
                         <div class="mainmenu pull-left" style="margin-bottom:5px;margin-left:15px;">
							<a class="btn btn-default" href="cart.php" style="color:white;text-decoration:none;background-color:#2196F3;"><i class="fa fa-arrow-left" style="font-size:15px;margin-right:4px;"></i> Go Back To Cart</a>
						</div>
						<div class="col-sm-5" style="width:1100px;margin-bottom:30px;">
							<div class="view-product">
                                
                             
                                <div class="single-products" style="margin-top:8px;">
                                   
                                    
                                    
                                         <hr/>
                                    <div class="step-one">
					               <h2 class="heading" style="background-color:#525049;color:white;">Step 1 : User Info</h2>
                                        <small><span style="color:red;">Note To User : </span>Below Is Your Chosen Info & Address (Not The One You Want? Please Edit In Profile.)</small>
				                    </div>
                                    
                                           <br/> <a class="btn btn-default pull-left" style="background-color:#FE980F;color:white;text-decoration:none;" href="edituserprofile.php" style="color:white;">Edit Details</a><br/><br/>
                                    <input type="hidden" name="edit" value="<?php echo $UserID; ?>" style="color:black;">
                                  <p>Name:</p>        
                                <input name="name" type="text" value="<?php echo $UserName ?>" style="width:300px;background-color:#dcdcdc;" readonly="readonly"/><br/><br/>
                                 <p>Email:</p>
                                <input name="email" type="text" value="<?php echo $UserEmail ?>" style="width:300px;background-color:#dcdcdc;" readonly="readonly"/><br/><br/>
                                <p>Phone:</p>
                                <input name="phone" type="text" value="<?php echo $UserPhone ?>" style="width:300px;background-color:#dcdcdc;" readonly="readonly"/><br/><br/>
                                <p>Address:</p>
                                <input name="address" type="text" value="<?php echo $UserAddress ?>" style="width:500px;height:100px;background-color:#dcdcdc;" style="width:300px;" readonly="readonly"/><br/><br/>   
                                    
                                 
                                   
                                   
                                    <br/>
                                    
                                    <hr/>
                                    
                                     <div class="step-one">
					               <h2 class="heading" style="background-color:#525049;color:white;">Step 2 : Bicycle Information</h2>
                                        <small><span style="color:red;">Note To User : </span>Below Is The Bicycle You've Chosen To Purchase. </small>
				                    </div>
                                    <br/>
                                   
                                    <section id="cart_items" style="margin-bottom:15px;">
		<div class="container">
			
			<div class="table-responsive cart_info">
				
                
                <?php
    
    
                $_SESSION['total'] = 0;
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                        foreach ($_SESSION["cart"] as $key => $value) {
                            ?>
                <table class="table table-condensed" style="max-width:1050px;">
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
                <div class="total_area" style="max-width:1050px;height:30px;font-size:5px;visibility:hidden;">
						<ul>
							<li>Total <span>RM<?php echo number_format($total, 2); ?></span></li>
						</ul>
					</div>
                
                            
                  <?php  
                        
                    
                                  }  } ?>
                 <div class="total_area" style="max-width:1050px;">
						<ul>
							<li>Total <span>RM<?php echo number_format($total, 2); ?></span></li>
						</ul>
					</div>
                      
			</div>
            
            
            
            
		</div>
	</section> <!--/#cart_items-->
                                    
                                    
                                    <?php 
                                    
                                    $bid = $value["BicycleID"]; 
    
    
                                    $sql3="select * from HavenBicycle INNER JOIN HavenSeller where BicycleID='$bid' AND HavenBicycle.AccountUsername = HavenSeller.SellerUsername";
                                    $result=$conn->query($sql3);
                                    if(empty(mysqli_num_rows($result))){
                                        echo "session lost ERROR : $sql3". $conn->error;
                                    }else{
                                        while($row=mysqli_fetch_assoc($result)){
                                            $BicycleID		= $row["BicycleID"];
                                            $AccountUsername		= $row["AccountUsername"];
                                            $SellerUsername		= $row["SellerUsername"];
                                            $SellerBank	= $row["SellerBank"];
                                        }
                                    } 
                                    
                                    
                                    ?>
                                    
                                    
                               
                                    
                                    <hr/>
                                    
                                     <div class="step-one">
					               <h2 class="heading" style="background-color:#525049;color:white;">Step 3 : Payment Section</h2>
                                        <small><span style="color:red;">Note To User : </span>Below Is The Payment Section. Upload And Submit Proof To Purchase.</small>
				                    </div>
                                    <br/>
                                    <a class="btn btn-info" href="helporder.php">Help?</a>
                                    <br/>
                                   
                                   <div class="view-product">
                                <br/>
                                <p>Your Total Bicycle Price - <b style="font-style: italic;text-decoration:underline;">RM<?php echo number_format($total, 2); ?></b></p><br/>
                                <p>Seller's Bank Account - <b style="font-style: italic;text-decoration:underline;"><?php echo $SellerBank?></b></p><br/>
                                <p>Clicking these bank images will lead you to a new tab. Please refer from the cart the amount needed to pay and the words shown above for seller's bank information</p><br/>
                                  <p>Your payment in the online banking services are separate from this website, after finishing the payment please upload the screenshot of your payment here</p><br/>      
                                <div class="single-products">
                                    <a type="button" class="btn btn-default" style="width:100px;height:40px;background:#00BFFF;" href="https://logon.rhb.com.my" style="border:1px solid black;font-size:13px;" target="_blank"><b style="color:blue;">RHB</b></a>
                                   <a type="button" class="btn btn-default" style="width:100px;height:40px;background:yellow;" href="https://www.maybank2u.com.my/home/m2u/common/login.do" style="border:1px solid black;" target="_blank"><b style="color:black;">Maybank</b></a>
                                     <a type="button" class="btn btn-default" style="width:100px;height:40px;background:red;" href="https://www.cimbclicks.com.my/clicks/#/" style="border:1px solid black;" target="_blank"><b style="color:white;">CIMB</b></a>
                                     <a type="button" class="btn btn-default" style="width:100px;height:40px;background:red;" href="https://ambank.amonline.com.my/web/" style="border:1px solid black;" target="_blank"><b style="color:yellow;">AmBank</b></a>
                                    		
                                    
                                     <p style="background:none;color:black;margin-top:13px;"><b>Upload Proof Of Payment</b></p><br/>
                                     
                                    <button onclick="clearImage()" class="btn btn-default" style="margin-left:0px;font-size:10px;">Reset</button>
                              <br/><br/>
                                    <form  name="orderfrm" enctype="multipart/form-data" action="order.php" method="post">
                                    <input class="form-control" type="file" id="formFile" name="picture" onchange="preview()" style="width:230px;"><br/>
                            <!-- Bootstrap Bundle with Popper -->
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                                        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                                        crossorigin="anonymous"></script>
                            <script>
                                    function preview() {
                                                frame.src = URL.createObjectURL(event.target.files[0]);
                                                        }
                                    function clearImage() {
                                                document.getElementById('formFile').value = null;
                                                frame.src = "";
                                                            }
                            </script>
                                    <p style="background:none;color:grey;">(Jpg , Jpeg & Png Only)</p><br/>
                                    <div class="productinfo text-center">
									</div>
                                    
								
                                 
                               
                                         <?php 
                                       
                                include ('dbconnect.php');

                if(isset($_POST['submit'])) {

                    // removing ID coz it will be auto-incremented anyway
                    $BicycleID		= $_POST['hidden_order_bicycle_id'];
                    $BicycleColor		= $_POST['hidden_order_color'];
                    $AccountUsername		= $_POST['hidden_order_username'];
                    $Quantity		= $_POST['hidden_order_quantity'];
                    $Total	= $_POST['hidden_order_total']; 
                    

                       
                    
                                     if (!empty($_FILES['picture']['name']))
                                            {
                                                    $target_dir = "images/payments/";
                                                    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
                                                    $uploadOk = 1;
                                                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                                    // Allow certain file formats
                                                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                                                    && $imageFileType != "gif" ) 
                                                    {
                                                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                                        $uploadOk = 0;
                                                    }
                                                    // Check if $uploadOk is set to 0 by an error
                                                    if ($uploadOk == 0) 
                                                    {
                                                        echo "Sorry, your file was not uploaded.";
                                                    } 
                                                    // if everything is ok, try to upload file
                                                    else 
                                                    {
                                                        if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) 
                                                        {
                                                            echo "The file ". basename( $_FILES["picture"]["name"]). " has been uploaded.";
                                                        } 
                                                        else 
                                                        {
                                                            echo "Sorry, there was an error uploading your file.";
                                                        }
                                                    }
                                            }        
                                            else{
                                                $target_file ="";
                                            }
                
                                                            if($target_file ==""){			
                                                    echo "<div class ='box container'>			
                                                        <p style='color:red;'>Image Of Payment Is Missing. Please Upload The Image.</p>					
                                                        </div>";
                                                                
                                                      echo "<script>
                                                               
                                                                  alert('Order Failed , Please Upload The Proof Of Payment Image.');
                                                                
                                                                </script>";           
                                                                                 } 
                                                else {		
                                                     $query = "INSERT INTO HavenOrder(OrderTotalPrice, OrderQuantity, OrderStatus, OrderApproval, BicycleID, AccountUsername, OrderPayment, OrderColor, OrderMessage) 
                                                                                VALUES ('$Total',' $Quantity', 'Order Is Generated', 'N', '$BicycleID', '$AccountUsername', '$target_file' , '$BicycleColor', 'Order Has Been Generated.(This Is Auto-Generated By System)')";

                                                                    $inuser = mysqli_query($conn,$query);

                                                      
                                                    
                                                    if($inuser == false){			
                                                                echo"<p>ERROR : can't $sql".$conn->error."</p></div>";
                                                            }
                                                            else {			
                                                                 echo "<div class ='box container'>			
                                                                    <p>	<b style='color:#32CD32;'>Ordered Successfully</b></p></div>";
                                                                
                                                                
                                                                
                                                                 echo "<script> location.href='orderhistory.php'; </script>";
                                                                 exit;
                                                                
                                                               
                                                            }
                                                }
                
                
                                            }
 
                                       
                                       
                                       
                                  ?>   
                                  
                              
                                       
                                 <input style="width:50px;" type='hidden' name='hidden_order_bicycle_id' value="<?php echo $value["BicycleID"];?>">	
                                 <input style="width:50px;" type='hidden' name='hidden_order_color' value="<?php echo $value["BicycleColor"];?>">	       
                                 <input style="width:50px;" type='hidden' name='hidden_order_username' value="<?php echo $_SESSION['AccountUsername'] ?>">   
                                 <input style="width:50px;" type='hidden' name='hidden_order_quantity' value="<?php echo $value["gadget_quantity"];?>">	   
                                 <input style="width:100px;" type='hidden' name='hidden_order_total' value="<?php echo number_format($total,2); ?>">    
                                    
                                 <button  onclick="return confirm('Proceed With Upload And Order?')" type="submit" name="submit" class="btn btn-default pull-left" style="margin-bottom:10px;background-color:#FE980F;color:white;">
											Submit
										</button>
                                
                                </form>
                                    
                                    <br/>
                                    
                                    </div> 
							</div>
                                  
								</div>
                                
                                
                                
							</div>
                       
						</div>
                        
					</div><!--/product-details-->
				</div>
			</div>
            <br/><br/>
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