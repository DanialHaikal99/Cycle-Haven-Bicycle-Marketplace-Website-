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
    <title>Seller Order Inbox| Cycle Haven</title>
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
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
</head><!--/head-->

<body>
    <style>
    .notification {
  text-decoration: none;
  padding: 15px 26px;
  position: relative;
  display: inline-block;
  border-radius: 2px;
}

.notification:hover {
  background: #FE980F;
}

.notification .badge {
  position: absolute;
  top: -10px;
  right: -20px;
  padding: 5px 10px;
  border-radius: 50%;
  background: #FE980F;
  color: white;
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
                                <li ><a href="sellerprofile.php"><i class="fa fa-user"></i> Profile<i></i></a></li> 
                                <li><a href="orderinbox.php" class="active"><i class="fa fa-list"></i> Order Inbox</a></li>
                                <!--<li><a href="orderinbox.php"  class="notification"><i class="fa fa-list" style="color:#fdb45e;"></i> <span style="color:#fdb45e;">Order Inbox</span><span class="badge">1</span><i></i></a></li>-->
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
	<?php  
    if(isset($_POST['submit'])) {
        
        
      
			
				 if(isset($_POST['edit'])){ 
              $OrderID			= $_POST['edit'];  
              $OrderApproval			= $_POST['approve'];       
              
            $sql3="select * from HavenOrder INNER JOIN havenuser ON HavenOrder.OrderID='$OrderID' WHERE havenorder.AccountUsername = havenuser.UserUsername;";
		    $resul=$conn->query($sql3);
                          
                      $queryu ="update HavenOrder set OrderApproval='$OrderApproval' where OrderID = '$OrderID' ";
					$inuser = mysqli_query($conn,$queryu);   
                        
                         }
                                }
   
        if(isset($_POST['submit2'])) {
        
        
      
			
				 if(isset($_POST['edit'])){ 
              $OrderID2			= $_POST['edit'];        
              
            $sql4="select * from HavenOrder INNER JOIN havenuser ON HavenOrder.OrderID='$OrderID2' WHERE havenorder.AccountUsername = havenuser.UserUsername;";
		    $resul2=$conn->query($sql4);
                          
                      $queryv ="update HavenOrder set OrderApproval='F' where OrderID = '$OrderID2' ";
					$inuser2 = mysqli_query($conn,$queryv);   
                        
                         }
                                }                             
                                    
                                    
    
    ?>
    
	<section style="height:auto;">
        <div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <h3>Order Inbox</h3>
                        <br/>
                        <div class="brands-name" style="width:100px;border:none;">
								
                            <form action="orderinbox.php" style="color:black;" method="POST">    
                            
                            <select name="status">
                            <option value="all">All</option>
                            <option value="not">Not Approved</option>
                            <option value="yes">Approved</option>
                            <option value="flag">Flagged</option>        
                            </select><br/><br/>
                            <input type="submit" value="Sort" name="submit">
                            </form>
                                
							</div>
                        <br/>
                        <table class="table user-list">
                            <thead>
                                <tr>
                                <th><span style="font-size:12px;">Bicycle</span></th>
                                <th><span style="font-size:12px;">User/Buyer</span></th>
                                <th><span style="margin-right:5px;font-size:12px;">Order ID</span></th>    
                                <th><span style="font-size:12px;">Order Created</span></th>
                                <th class="text-center"><span style="font-size:12px;">Approval</span></th>
                                <th><span style="font-size:12px;">Email</span></th>
                                <th style="width:10%;font-size:12px;"><span>View</span></th>
                                <th><span style="font-size:12px;">Action</span></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                
                                <?php  	
			
          
                                   
                            if(isset($_POST['status']) && $_POST['status'] == 'all') 
                            {   
	                         $sql="SELECT *FROM HavenBicycle INNER JOIN HavenOrder ON HavenBicycle.BicycleID = HavenOrder.BicycleID INNER JOIN HavenSeller On HavenBicycle.AccountUsername = HavenSeller.SellerUsername INNER JOIN HavenUser On HavenOrder.AccountUsername = HavenUser.UserUsername WHERE HavenBicycle.AccountUsername='$session' order by OrderID desc;";  
                            }
                            else if(isset($_POST['status']) && $_POST['status'] == 'not') 
                            {   
                              $sql="SELECT *FROM HavenBicycle INNER JOIN HavenOrder ON HavenBicycle.BicycleID = HavenOrder.BicycleID INNER JOIN HavenSeller On HavenBicycle.AccountUsername = HavenSeller.SellerUsername INNER JOIN HavenUser On HavenOrder.AccountUsername = HavenUser.UserUsername WHERE HavenBicycle.AccountUsername='$session' AND HavenOrder.OrderApproval = 'N' order by OrderID desc;";  
                            }  
                            else if(isset($_POST['status']) && $_POST['status'] == 'yes') 
                            {   
                              $sql="SELECT *FROM HavenBicycle INNER JOIN HavenOrder ON HavenBicycle.BicycleID = HavenOrder.BicycleID INNER JOIN HavenSeller On HavenBicycle.AccountUsername = HavenSeller.SellerUsername INNER JOIN HavenUser On HavenOrder.AccountUsername = HavenUser.UserUsername WHERE HavenBicycle.AccountUsername='$session' AND HavenOrder.OrderApproval = 'Y' order by OrderID desc;";  
                            }      
                            else if(isset($_POST['status']) && $_POST['status'] == 'flag') 
                            {   
                              $sql="SELECT *FROM HavenBicycle INNER JOIN HavenOrder ON HavenBicycle.BicycleID = HavenOrder.BicycleID INNER JOIN HavenSeller On HavenBicycle.AccountUsername = HavenSeller.SellerUsername INNER JOIN HavenUser On HavenOrder.AccountUsername = HavenUser.UserUsername WHERE HavenBicycle.AccountUsername='$session' AND HavenOrder.OrderApproval = 'F' order by OrderID desc;";  
                            }      
                            else
                            {   
	                         $sql="SELECT *FROM HavenBicycle INNER JOIN HavenOrder ON HavenBicycle.BicycleID = HavenOrder.BicycleID INNER JOIN HavenSeller On HavenBicycle.AccountUsername = HavenSeller.SellerUsername INNER JOIN HavenUser On HavenOrder.AccountUsername = HavenUser.UserUsername WHERE HavenBicycle.AccountUsername='$session' order by OrderID desc;";  
                            }
                                
                                
                            $result = mysqli_query($conn, $sql);     
                            $count = mysqli_num_rows($result);
                             
                                
                                
                               
                                    
                        // if no records are found
                        if(mysqli_num_rows($result) == 0) 
                        {

                        ?>         
                            <div style="width:800px;position:absolute;margin-top:50px;">
                                <h4 style="margin-left:430px;">No Orders For Now! :3</h4>
                                 <img src="images/404/noorders.png" alt="" style="margin-left:320px;width:410px;height:320px;"/> 
                            </div>            
                        <?php
                        }
                           

                        else{
                            // if got records found use looping to display the results
                            while($row = mysqli_fetch_assoc($result)) {
                                 
                            ?>
                                <tr>
                                    
                                    <td>
                                        
                                        <img src="<?php echo $row['BicycleImage'] ?>" style="max-width:70px;max-height:50px;"><br/>
                                        <span class="user-subhead" style="font-size:10px;"><?php echo $row['BicycleName'] ?></span>
                                    </td>
                                    <td><p style="margin-top:30px;font-size:12px;"><?php echo $row['AccountUsername'] ?></p></td>
                                    <td><p style="margin-top:30px;margin-left:13px;"><?php echo $row['OrderID'] ?></p></td>
                                    <td><p style="margin-top:30px;"><?php echo $row['OrderDate'] ?></p></td>
                                    <td class="text-center">
                                        <p style="margin-top:30px;"> <?php 
                                
                                if($row['OrderApproval'] =='Y'){
                                    echo" <div class='btn btn-success'>Approved</div>";
                                }
                                else{
                                    echo" <div class='btn btn-danger'>Flagged</div>";
                                }
                                
                                ?></p>
                                    </td>
                                    <td>
                                        <p style="margin-top:30px;"><?php echo $row['UserEmail'] ?></p>
                                    </td>
                                    <td>
                                        <a href="order-details-seller.php?code=<?php echo $row['OrderID'];?>&code2=<?php echo $row['BicycleID'];?>" type="button" class="btn btn-default get" style="font-size: 12px;margin-bottom:3px;background-color:#FE980F;border:1px solid black;border:none;">View Details</a>
                                    </td>
                                    <td style="width:20%;">
                                        <!--<script>
                                       function myFunction() {
                                      alert("Action Successfully Executed");
                                       }
                                        </script>-->
                                        <!--<a href="" type="button" class="btn btn-default get" style="font-size: 12px;margin-bottom:23px;margin-right:5px;background-color:#00bfff;border:1px solid black;">View Details</a>-->
                                        <form action="orderinbox.php" name="apprOrder" method="post" >
                                             <input type="hidden" name="edit" value="<?php echo $row['OrderID'] ?>" style="color:black;">
                                             <input type="hidden" name="approve" value="Y" style="color:black;">
                                            <span class="fa-stack" style="width:70px;margin-right:30px;margin-top:22px;">
                                                <i class="fa fa-square fa-stack-2x" ></i>
                                                <button name="submit"  onclick="myFunction()" class="fa fa-check fa-stack-1x fa-inverse" style="background-color:green;font-size:20px;border:none;"></button>
                                            </span>
                                            
                                         <span class="fa-stack" style="width:70px;margin-top:22px;">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <button name="submit2"  onclick="myFunction()" class="fa fa-flag fa-stack-1x fa-inverse" style="background-color:red;font-size:20px;border:none;"></button>
                                            </span>
                                           
                                        </form>
                                        
                                    </td>
                                </tr>
                                
                                  <?php   
						} }  ?> 
                            </tbody>
                           
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
		<br/><br/><br/><br/><br/><br/>
        <br/><br/><br/><br/><br/><br/>
        <br/><br/><br/><br/><br/><br/><br/><br/>
        <br/><br/>
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