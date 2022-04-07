<?php 
session_start();

include("dbconnect.php");

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | CycleHaven</title>
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
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		
        <div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/logo.png" alt=""/></a>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9" >
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left" style="margin-left:503px;">
							<a class="btn btn-default" href="index.php" style="color:white;text-decoration:none;background-color:#2196F3;"><i class="fa fa-arrow-left" style="font-size:15px;margin-right:4px;"></i>Home Page</a>
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
	
	
		<div class="container" style="margin-bottom:105px;">
			<div class="row" style="margin-left:450px;">
				<div class="col-sm-4 col-sm-offset-1" style="margin-left:auto;margin-right:auto;">
                      <br/><br/><br/><br/>
                    <img src="images/pics/login.png" alt="" style="width:100px; height:100px;margin-left:45px;"/>
					<div class="login-form" ><!--login form-->
                      
						<h1 style="margin-left:51px;"><b>Login</b></h1>
						<form  action="login.php" method="post">
							<input type="username" name="username" placeholder="Username"/>
                            <br/>
							<input type="password" name="password" placeholder="Password" id="myInput"/>
                             <?php 

if(isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	if($username == "" || $password == "") {
		echo "
			
			<p style='color:red;'>Either username or password field is empty.</p>";
	} else {
		$sqllogin ="SELECT * FROM HavenAccount WHERE AccountUsername='$username' AND AccountPassword='$password' AND AccountStatus='Y' AND AccountType = 'U'"
					or die("Could not execute the select query.");
		$results = mysqli_query($conn, $sqllogin);
        $data = mysqli_fetch_assoc($results);
				
        $sqllogin2 ="SELECT * FROM HavenAccount WHERE AccountUsername='$username' AND AccountPassword='$password' AND AccountStatus='Y' AND AccountType = 'S'"
					or die("Could not execute the select query.");
		$results2 = mysqli_query($conn, $sqllogin2);
        $data2 = mysqli_fetch_assoc($results2);    
        
         $sqllogin3 ="SELECT * FROM HavenAccount WHERE AccountUsername='$username' AND AccountPassword='$password' AND AccountStatus='Y' AND AccountType = 'A'"
					or die("Could not execute the select query.");
		$results3 = mysqli_query($conn, $sqllogin3);
        $data3 = mysqli_fetch_assoc($results3);  
        
              if (isset($data)) {

					$_SESSION["AccountUsername"] = $username;
                  $_SESSION["AccountType"] = "U";
                    $_SESSION['id']=$data['AccountID'];
					header("location: indexuser.php");	
                    
                
                    mysqli_query($conn,"insert into userlog(AccountID,AccountUsername) values('".$_SESSION['id']."','".$_SESSION['AccountUsername']."')");
				}
        
        
         else if(isset($data2)) {

					$_SESSION["AccountUsername"] = $username;
                  $_SESSION["AccountType"] = "S";
                    $_SESSION['id']=$data['AccountID'];
					header("location: indexseller.php");	
                    
                
                    mysqli_query($conn,"insert into userlog(AccountID,AccountUsername) values('".$_SESSION['id']."','".$_SESSION['AccountUsername']."')");
				}
        
        
         else if(isset($data3)) {

					$_SESSION["AccountUsername"] = $username;
                  $_SESSION["AccountType"] = "A";
                    $_SESSION['id']=$data['AccountID'];
					header("location: admin/index.php");	
                    
                
                    mysqli_query($conn,"insert into userlog(AccountID,AccountUsername) values('".$_SESSION['id']."','".$_SESSION['AccountUsername']."')");
				}
        else {
				echo"<p style='color:red;'>Invalid Username Or Password.</p>";
            
             
			}
		
	
	}
}
?>                 
                             <input type="checkbox" onclick="myFunction()" style="width: 12px; height: 12px;float:left;margin-left:40px;"><small style="font-size:13px;margin-left:3px;"> Show Password</small>

                                <script>
                                        function myFunction() {
                                        var x = document.getElementById("myInput");
                                        if (x.type === "password") {
                                        x.type = "text";
                                        } else {
                                        x.type = "password";
                                                }
                                                }
                                </script>
                                <br/><br/>
							<button type="submit" name="submit" class="btn btn-default" style="margin-left:58px;">Login</button>
						</form>
                        <br/>
                       
                        <br/>
                        <a href="register.php" style="margin-left:58px;">Register Here</a>
                        
					</div><!--/login form-->
				</div><!-- 
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
                
				<div class="col-sm-4">
					<div class="signup-form">
						<h2>New User Signup!</h2>
						<form action="#">
							<input type="text" placeholder="Name"/>
							<input type="email" placeholder="Email Address"/>
							<input type="password" placeholder="Password"/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div>
				</div>-->
                
			</div>
       
		</div>
	
    <br/>
    <br/>
    <br/>
    <br/>
    
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