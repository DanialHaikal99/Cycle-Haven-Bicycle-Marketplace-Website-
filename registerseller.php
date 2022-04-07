<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register Seller | CycleHaven</title>
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
						<div class="mainmenu pull-left" style="margin-left:505px;">
							<a class="btn btn-default" href="login.php" style="color:white;text-decoration:none;background-color:#2196F3;"><i class="fa fa-arrow-left" style="font-size:15px;margin-right:4px;"></i>Login Page</a>
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
	
	
		<div class="container" style="margin-bottom:160px;">
			<div class="row" style="margin-left:450px;">
                <div class="col-sm-4">
					<div class="signup-form">
						<h2 style="margin-left:15px;">Seller Register Form</h2>
						<form  name="regfrm" enctype="multipart/form-data" action="registerseller.php" method="post">
                            <p style="margin-left:55px;"><b>Username :</b></p>
							<input type="username" name ="username" placeholder="Username"/><br/>
                            <p style="margin-left:58px;"><b>Password :</b></p>
                            <input type="password" name ="pass1" placeholder="Password" id="myInput"/>
                             <input type="checkbox" onclick="myFunction()" style="width: 12px; height: 12px;float:left;"><small style="font-size:13px;margin-left:3px;"> Show Password</small>

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
                            <p style="margin-left:40px;"><b>Confirm Password :</b></p>
                            <input type="password" name ="pass2" placeholder="Confirm Password" id="myInput2"/>
                             <input type="checkbox" onclick="myFunction2()" style="width: 12px; height: 12px;float:left;"><small style="font-size:13px;margin-left:3px;"> Show Password</small>
                               <script>
                                        function myFunction2() {
                                        var x = document.getElementById("myInput2");
                                        if (x.type === "password") {
                                        x.type = "text";
                                        } else {
                                        x.type = "password";
                                                }
                                                }
                                </script>
                            <br/><br/>
                            <p style="margin-left:70px;"><b>Name :</b></p>
							<input type="text" name ="name" placeholder="Seller Name"/><br/>
                             <p style="margin-left:50px;"><b>Email Address :</b></p>
							<input type="email" name ="email" placeholder="Seller Email"/><br/>
                            <p style="margin-left:50px;"><b>Phone Number :</b></p>
                            <input type="phone" name ="phone" placeholder="Phone Number(Ex-011-111-1111)"/><br/>
                            <p style="margin-left:70px;"><b>Bank Info :</b></p>
                            <input type="bank" name ="bank" placeholder="Bank Acc & Bank Number"/>
							<button type="submit" name="submit" class="btn btn-default" style="margin-left:54px;">Submit</button>
                            <br/>
                               <?php 
	include ('dbconnect.php');

if(isset($_POST['submit'])) {
	
	// removing ID coz it will be auto-incremented anyway
	// $id			= $_POST['id'];
	$pass1		= $_POST['pass1'];
	$pass2		= $_POST['pass2'];
	$name		= $_POST['name'];
	$bank	= $_POST['bank']; 
	$username	= $_POST['username'];
	$phone		= $_POST['phone'];
	$email		= $_POST['email'];
	//$pict		= addslashes(file_get_contents($_FILES['pict']['tmp_name']));
	
	// Note: Removing every picture vars to register.php since it is unnecessary and no use most of the time. 
	
	//sql statement to check if the users already exists
	$sql = "select * from HavenSeller where SellerEmail = '$email'";
	$resultemail = mysqli_query($conn,$sql);
		
	$sqlname = "select * from HavenSeller where SellerUsername = '$username'";
	$resultname = mysqli_query($conn,$sqlname);
	
	if ($pass1 != $pass2) 
	{
		//get num of rows resulted from the query then compare
		if(mysqli_num_rows($resultemail)!=0) 
		{
			
			if(mysqli_num_rows($resultname)!=0) 
			{
				echo "<div class ='box container'>
					<p>Error: Password	and Confirm Password is not the same.</p>
					<p>Error: Seller email already existed</p>
					<p>Error: Username already existed</p>
					</div>";
			}
			else
			{
				echo "<div class ='box container'>
					<p>Error: Password	and Confirm Password is not the same.</p>
					<p>Error: Seller email already existed</p>
					</div>";
			}
			
		}
		else if(mysqli_num_rows($resultname)!=0) 
		{
			echo "<div class ='box container'>
				<p>Error: Password	and Confirm Password is not the same.</p>
				<p>Error: Username already existed</p>
				</div>";
		}
		else
		{
			echo "<div class ='box container'>
				<p>Error: Password	and Confirm Password is not the same.</p>
				</div>";
		}
	}	
	else 
	{
		$password = $pass1;
		
		//get num of rows resulted from the query then compare
		if(mysqli_num_rows($resultemail)!=0) 
		{
			if(mysqli_num_rows($resultname)!=0) 
			{
				echo "<div class ='box container'>
					<p>Error: Seller email already existed</p>
					<p>Error: Username already existed</p>
					</div>";
			}
			else
			{
				echo "<div class ='box container'>
					<p>Error: Seller email already existed</p>
					</div>";
			}
			
		}
		else if(mysqli_num_rows($resultname)!=0) 
		{
			echo "<div class ='box container'>
				<p>Error: Username already existed</p>
				</div>";
		}
		else
		{
			if ( $username == "" || $pass1 == "" || $pass2 == "" ||  $name == "" || $email == "" || $phone == "" || $bank == "" ) {
				echo "<div class ='box container'>
					<p>Error: One or more fields are missing</p>
					</div>";
			} 
			else 
			{
				$query = "INSERT INTO HavenSeller(SellerUsername, SellerName, SellerEmail, SellerPhone, SellerBank, SellerVerificationStatus) 
							VALUES ('$username', '$name','$email', '$phone','$bank', 'N')";
                
				$inuser = mysqli_query($conn,$query);
                
                $query2 ="INSERT INTO HavenAccount(AccountUsername, AccountPassword, AccountType , AccountStatus) VALUES ('$username', '$password', 'S', 'Y')";
                
                $inuser2 = mysqli_query($conn,$query2);
                
				if(($inuser)== FALSE){
					echo"Error : $query".$conn->error;
                    echo"Error : $query2".$conn->error;
				}else{     
                            
                            echo "<div class='box container'>
					<p>	<b>Registered Successfully</b></p></div>";
				}
                
                
                
			}
		
		}
	}
	

}
?>
                        <a href="login.php" style="margin-left:66px;">Login Here</a>
						</form>
					</div>
				</div>
                
			</div>
		</div>
	
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