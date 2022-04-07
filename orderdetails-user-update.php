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
    <title>Edit User Payment | Cycle Haven</title>
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
		$result = mysqli_query($conn, "select * from HavenOrder INNER JOIN HavenSeller INNER JOIN HavenUser ON HavenOrder.OrderID = '$code' WHERE havenorder.AccountUsername= HavenUser.UserUsername;");
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
	
	<section style="margin-bottom:283px;">
<div class="container">
			<div class="row">
				<div class="col-sm-9 padding-right">
                    <div class="mainmenu pull-left" style="margin-bottom:10px;">
                        <a class="btn btn-default" href="orderdetails-user.php?code=<?php echo $row['BicycleID'];?>" style="color:white;background-color:#2196F3;text-decoration:none;"><i class="fa fa-arrow-left" style="font-size:15px;margin-right:4px;"></i>Go Back</a><br/>
						</div>
							<div class="product-details" style="width:1100px;border:1px solid black;"><!--/product-information-->
								
								
                               

                                
                                <h3 style="margin-left:13px;">Update Order Payment<small>(Please Make Sure The Picture Is Correct)</small></h3><br/>
                               <?php
			  if(isset($_POST['submit'])) {
				 if(isset($_POST['edit'])){ 
              $OrderID			= $_POST['edit'];
               $code			= $_POST['code'];      
         
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
                                                        <p  style='color:red;'>Image Of Payment Is Missing. Please Upload The Image.</p>					
                                                        </div>";
                                                                
                                                           } 
                                    else {
                                    $query = "update HavenOrder SET OrderPayment ='$target_file' where OrderID = '$OrderID'";
 
                                    $inuser = mysqli_query($conn,$query);

                                                      
                                                    
                                                    if($inuser == false){			
                                                                echo"<p>ERROR : can't $sql".$conn->error."</p></div>";
                                                            }
                                                            else {			
                                                                 echo "<div class ='box container' style='margin-left:13px;'>			
                                                                    <p>	<b style='color:#32CD32;'>Payment Uploaded Successfully</b></p></div>";
                                                                
                                                                 echo "<script>
                                                               
                                                                  alert('Payment Uploaded Successfully.');
                                                                
                                                                </script>";
                                                                
                                                                echo "<script> location.href='orderhistory.php'; </script>";
                                                                 exit;
                                                               
                                                            }
                                     }
                                    }

                         }
                                     
                                ?>
                            
                                <form  name="orderfrm2" enctype="multipart/form-data" action="orderdetails-user-update.php" method="post">
                                     <input type="hidden" name="code" value="<?php echo $row['OrderID']; ?>" style="color:black;">  
                                    <input type="hidden" name="edit" value="<?php echo $row['OrderID']; ?>" style="color:black;">
                                     <p style="background:none;color:black;margin-left:13px;">Re-Upload Proof Of Payment Here</p>
                                    <input class="form-control" type="file" id="formFile" name="picture" onchange="preview()" style="width:230px;margin-left:13px;"><br/>
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
                                    <p style="background:none;color:black;margin-left:13px;">(Jpg , Jpeg & Png Only)</p><br/>
                                    <div class="productinfo text-center">
									</div>
                                     <button  type="submit" name="submit" class="btn btn-default pull-left" style="margin-bottom:10px;background-color:#FE980F;color:white;margin-left:13px;">
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