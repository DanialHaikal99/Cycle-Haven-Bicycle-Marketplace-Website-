<html>
    <head>
    
    
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
					<h3 class="page-header">Product Details Page</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<li>Product Details Page</li>
					</ol>
				</div>
			</div>
              <!-- page start-->

              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Bicycle Information
                          </header>
                          
                                
                      </section>
                  </div>
              </div>
              
               <div class="row">
				<div class="col-lg-12">
					<ol class="col-lg-12" style="background:white;">
						 <div class="row height d-flex justify-content-center align-items-center">
       
                            
                    </div>
                        <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                         
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                             
                             <?php
		// write the codes to select the bicycle info
		$code = $_REQUEST['code'];
		$result = mysqli_query($conn, "select * from HavenBicycle WHERE BicycleID = '$code'");
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
            
		
        
                              <tr>
                                
                                 <td style="width:405px;"><img src="../<?php echo $row['BicycleImage']; ?>" alt="" style="width:400px;height:350px;"/></td>
                                  <td style="width:30px;"></td>
                                  <td style="margin-left:20px;width:700px;color:black;">
                                      Bicycle ID : <?php echo $row['BicycleID']; ?><br/><br/>
                                      Bicycle Name : <?php echo $row['BicycleName']; ?><br/><br/>
                                  Bicycle Price : RM <?php echo $row['BicyclePrice']; ?><br/><br/>
                                     Bicycle Category : <?php echo $row['BicycleCategory']; ?> <br/><br/>
                                      Bicycle Color : <?php echo $row['BicycleColor']; ?>
                                      <br/><br/>
                                      Bicycle Description : <?php echo $row['BicycleDesc']; ?>
                                      <br/><br/>
                                      <p>Posted by : <span style="color:blue;"><?php echo $row['AccountUsername']; ?></span></p>
                                  </td>
                                  <td style="width:300px;"></td>
                                  <td> <div class="btn-group">
                                       <form action="advertisement-app-admin.php" name="apprBicycle" method="post">
                                          <input type="hidden" name="edit" value="<?php echo $row['BicycleID'] ?>" style="color:black;">
                                       <button name="submit" type="submit" class="btn btn-success"><i class="icon_check_alt2"></i> Approve</button>
                                      <button name="submit2" type="submit2" class="btn btn-danger" style="width:95px;margin-top:10px;"><i class="icon_close_alt2"></i> Reject</button>
                                             <small><span style="color:red;">Warning!</span>Rejecting Bicycle Will Prevent The<br/> Bicycle From Being Displayed In The Website.</small>
                                      </form>
                                  </div></td>
                              </tr>
                              
                           </tbody>
                        </table>
                      </section>
                  </div>
              </div>
					</ol>
				</div>
			</div>
              
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
