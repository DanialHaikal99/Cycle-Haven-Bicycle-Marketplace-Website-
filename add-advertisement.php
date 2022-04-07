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
    <title>Add Advertisement | Cycle Haven</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">    
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
     <link rel="shortcut icon" type="image/png" href="cycle.png"/>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head><!--/head-->
    <style>
/* The container */
.bruh {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.bruh input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 15px;
  width: 15px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.bruh:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.bruh input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.bruh input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.bruh .checkmark:after {
  left: 5px;
  top: 3px;
  width: 2px;
  height: 5px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
    </style>
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
								<li ><a href="shopseller.php"><i class="fa fa-shopping-cart"></i> Bicycle<i></i></a></li> 
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
	
	
		<div class="container">
             <div class="mainmenu pull-left" style="margin-bottom:10px;">
                        <a type="submit" class="btn btn-default" style="color:white;background-color:#2196F3;" href="shopseller.php" style="color:white;text-decoration:none;"><i class="fa fa-arrow-left" style="font-size:15px;margin-right:4px;"></i>Go Back</a>
						</div>
			<div class="row" style="margin-left:450px;margin-bottom:50px;">
                
				<div class="col-sm-4">
                    
					<div class="signup-form">
                        
						<h2 style="margin-left:12px;"><b>Add Advertisement</b></h2>
                        
                        <?php 
    include ("dbconnect.php");
    if(isset($_POST['submit'])) {
        
	$name			= $_POST['name1'];	
	$price		= $_POST['price'];	
	$category			= $_POST['category'];	
    $desc			= $_POST['desc'];
    $checkbox1=$_POST['color'];  
    $brand = $_POST['brand']; 
    $seller = $_POST['seller'];    
   
    
        $chk="";   
        foreach($checkbox1 as $chk1)  
           {  
              $chk .= $chk1.",";  
           }  


    
	if (!empty($_FILES['picture']['name']))
	{
			$target_dir = "images/shop/";
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
	
	
	
	
	if($name == "" || $category == "" || $price  == "" || $desc == ""|| $brand == "" || $target_file =="" || $checkbox1 ==""){			
		echo "<div class ='box container'>			
			<p style='color:red;'>One or more input is missing</p>					
			</div>";
	} 
	else {		
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
        
        if($SellerVerificationStatus=='Y'){
            $sql2 = "INSERT INTO HavenBicycle (BicycleName, BicyclePrice, BicycleCategory, BicycleDesc, BicycleApproval, BicycleImage, BicycleColor, BicycleBrand, AccountUsername)				
			VALUES ('$name','$price','$category','$desc','Y','$target_file', '$chk', '$brand', '$seller')";	
            
            $result2 = mysqli_query($conn,$sql2);		
		if($result2 == false){			
			echo"<p>ERROR : can't $sql2".$conn->error."</p></div>";
		}
		else {			
			echo "<div class ='box container'>			
				<p style='color:#32CD32;'>Adding Process Was Successfully Executed</p></div>";
		}	
        }
        else{
            $sql = "INSERT INTO HavenBicycle (BicycleName, BicyclePrice, BicycleCategory, BicycleDesc, BicycleApproval, BicycleImage, BicycleColor, BicycleBrand, AccountUsername)				
			VALUES ('$name','$price','$category','$desc','N','$target_file', '$chk', '$brand', '$seller')";	
            $result = mysqli_query($conn,$sql);		
		if($result == false){			
			echo"<p>ERROR : can't $sql".$conn->error."</p></div>";
		}
		else {			
			echo "<div class ='box container'>			
				<p style='color:#32CD32;'>Adding Process Was Successfully Executed</p></div>";
		}	
        }
       	 
		
        
        
		
	}
         }

?>  
                        
                        
                        <form action="add-advertisement.php" method="post" name="addbicycles" enctype="multipart/form-data">
                            <h5 style="margin-left:55px;">Bicycle Image</h5>
                              <br/>
                            <input type="file" class="form-control"  name="picture">
                       
                            <br/>
                            
                            <h5 style="margin-left:50px;">Bicycle Brand</h5>
							<input   name="brand" placeholder="Bicycle Brand"/><br/>
                            
                            <h5 style="margin-left:55px;">Bicycle Name</h5>
                            <input type="text" name="name1" placeholder="Bicycle Name"/><br/>
                            
                            <p id="GFG_UP" style="font-size: 11px;margin-left:10px;font-weight: bold;color:orange;text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;"></p> 
                            
                            <h5 style="margin-left:55px;">Bicycle Price</h5>
                            <input type="number" name="price" placeholder="Bicycle Price (Ex- 200.00)" min="0.00" max="10000.00" step="0.01"/><br/>
                
                           
                                <script>
                                    var el_up = document.getElementById("GFG_UP");
                                    
                                    el_up.innerHTML = 
                                                "Type in the box in two decimal places.";
                                    var RegExp = new RegExp(/^\d*\.?\d*$/);
                            
                                </script>
                            
                            
                             <h5 style="margin-top:10px;margin-left:55px;">Bicycle Color</h5><br/>
                            <label class="bruh" style="font-size:15px;margin-left:50px;">Black<input type="checkbox" name="color[]" value="Black"><span class="checkmark"></span></label>
                            <label class="bruh" style="font-size:15px;margin-left:50px;">Grey<input type="checkbox" name="color[]" value="Grey"><span class="checkmark"></span></label>
                            <label class="bruh" style="font-size:15px;margin-left:50px;">Silver<input type="checkbox" name="color[]" value="Silver"><span class="checkmark"></span></label>
                            <label class="bruh" style="font-size:15px;margin-left:50px;">White<input type="checkbox" name="color[]" value="White"><span class="checkmark"></span></label>
                            <label class="bruh" style="font-size:15px;margin-left:50px;">Blue<input type="checkbox" name="color[]" value="Blue"><span class="checkmark"></span></label>
                            <label class="bruh" style="font-size:15px;margin-left:50px;">Green<input type="checkbox" name="color[]" value="Green"><span class="checkmark"></span></label>
                            <label class="bruh" style="font-size:15px;margin-left:50px;">Red<input type="checkbox" name="color[]" value="Red"><span class="checkmark"></span></label>
                            <label class="bruh" style="font-size:15px;margin-left:50px;">Yellow<input type="checkbox" name="color[]" value="Yellow"><span class="checkmark"></span></label>
                            <label class="bruh" style="font-size:15px;margin-left:50px;">Orange<input type="checkbox" name="color[]" value="Orange"><span class="checkmark"></span></label>
                            <label class="bruh" style="font-size:15px;margin-left:50px;">Green<input type="checkbox" name="color[]" value="Green"><span class="checkmark"></span></label>
                            <label class="bruh" style="font-size:15px;margin-left:50px;">Purple<input type="checkbox" name="color[]" value="Purple"><span class="checkmark"></span></label>
                            <label class="bruh" style="font-size:15px;margin-left:50px;">Brown<input type="checkbox" name="color[]" value="Brown"><span class="checkmark"></span></label>
                            <label class="bruh" style="font-size:15px;margin-left:50px;">Cyan<input type="checkbox" name="color[]" value="Cyan"><span class="checkmark"></span></label>
                            
                            <br/>
                            <h5 style="margin-left:53px;">Bicycle Category</h5>
                            <select name="category" style="margin-left:4px;">
                                <option value="Normal Bike">Normal Bike</option>
                                <option value="Mountain Bike">Mountain Bike</option>
                                <option value="Folding Bike">Folding Bike</option>
                                <option value="Road Bike">Road Bike</option>
                                <option value="Children Bike">Children Bike</option>
                                 <option value="others">Others</option>
                            </select><br/><br/>
                        
                            
                            <h5 style="margin-left:50px;">Bicycle Description</h5>
							<input style="margin-left:5px;"  name="desc" placeholder="Bicycle Description"/>
                            <br/>
                            <style>
                                .hideme
                                {
                                    display:none;
                                    visibility:hidden;
                                }
                                .showme
                                {
                                    display:inline;
                                    visibility:visible;
                                }
                            </style>
                            <button type="submit" name="submit" class="btn btn-default" style="margin-left:65px;margin-bottom:20px;">Send</button>
                            <input class="hideme" name="seller" value="<?php echo $_SESSION['AccountUsername'] ?>"/>
						</form>
    
						
					</div>
				</div>
                
			</div>
		</div>
	
   




    
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