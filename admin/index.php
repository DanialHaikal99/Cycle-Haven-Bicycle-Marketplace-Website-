<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
<body>

    <?php
	session_start();
    include ("checksession.php");
include ("dbconnect.php");

$session = $_SESSION['AccountUsername'];
?>
    
<?php include_once("header.php");?>

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="">
                      <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
				  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Inbox</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="advertisement-app-admin.php">Advertisement Inbox</a></li>                          
                          <li><a class="" href="verification-app-admin.php">Verification Inbox</a></li>
                      </ul>
                  </li>       
                   <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Users & Sellers</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="user-list.php">User List</a></li>                          
                          <li><a class="" href="seller-list.php">Seller List</a></li>
                      </ul>
                  </li>
                   <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Admin View</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="../shopadmin.php">Bicycle Menu Page</a></li>                          
                      </ul>
                  </li> 
                  
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-table"></i>Welcome Back, <?php echo $_SESSION['AccountUsername'] ?>.</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-envelope"></i><a href="advertisement-app-admin.php">Advertisement Inbox</a></li>
					</ol>
				</div>
			</div>
              <!-- page start-->

              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Admin Home Page
                          </header>
                          
                                
                      </section>
                      <h3 style="margin-left:730px;"><b><i class="fa fa-home"></i> Admin Home Page</b></h3>
                      <div id="demo" class="carousel slide" data-bs-ride="carousel" style="width:60%;margin-left:310px;">

                      <!-- Indicators/dots -->
                      <div class="carousel-indicators">
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                      </div>

                      <!-- The slideshow/carousel -->
                      <div class="carousel-inner" >
                        <div class="carousel-item active">
                          <img src="../images/admin/admin1.png"  class="d-block" style="width:100%">
                            <div class="carousel-caption" style="margin-bottom:20px;">
                                <span style="color:white;font-size:25px;"><b>Welcome Admin, Click Below To Get Started.</b></span><br/>
                                <div class="btn-group">
                                      <a class="btn btn-primary" href="advertisement-app-admin.php" style="width:100%;height:20%">View Details</a>
                                  </div>
                          </div>
                        </div>
                        <div class="carousel-item">
                          <img src="../images/admin/admin2.png"  class="d-block" style="width:100%">
                            <div class="carousel-caption" style="margin-bottom:20px;">
                                 <span style="color:white;font-size:25px;"><b>Want To Manage Users In The System? Click Below.</b></span><br/>
                                <div class="btn-group">
                                      <a class="btn btn-primary" href="user-list.php" style="width:100%;height:20%">View Details</a>
                                  </div>
                          </div>
                        </div>
                           <div class="carousel-item">
                          <img src="../images/admin/admin3.png"  class="d-block" style="width:100%">
                                <div class="carousel-caption" style="margin-bottom:20px;">
                                 <span style="color:white;font-size:25px;"><b>Want To Manage Sellers In The System? Click Below.</b></span><br/>
                                <div class="btn-group">
                                      <a class="btn btn-primary" href="seller-list.php" style="width:100%;height:20%">View Details</a>
                                  </div>
                          </div>
                        </div>
                      </div>

                      <!-- Left and right controls/icons -->
                      <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                      </button>
                    </div>
                      <hr/>
                       
                      
                      
                      
                  </div>
              </div>
              
               <div class="row">
				<div class="col-lg-12">
                    
                   </div>
			</div>
              <br/><br/>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  
  <!-- container section end -->
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nicescroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>


  </body>
</html>
