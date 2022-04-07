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
					<h3 class="page-header">Seller Details Page</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<li>Seller Details Page</li>
					</ol>
				</div>
			</div>
              <!-- page start-->

              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Seller Information
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
		$result = mysqli_query($conn, "select * from HavenSeller INNER JOIN HavenAccount ON HavenSeller.SellerUsername=HavenAccount.AccountUsername WHERE HavenAccount.AccountUsername = '$code'");
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
                                   <td style="width:105px;"><img src="../images/pics/user.png" alt="" style="width:100px;height:auto;"/></td>
                                  <td style="width:30px;"></td>
                                  <td style="margin-left:20px;width:700px;color:black;">
                                      Seller ID : <?php echo $row['SellerID']; ?><br/><br/>
                                      Seller Username : <?php echo $row['SellerUsername']; ?><br/><br/>
                                      Seller Name : RM <?php echo $row['SellerName']; ?><br/><br/>
                                      Seller Email : <?php echo $row['SellerEmail']; ?> <br/><br/>
                                      Seller Phone : <?php echo $row['SellerPhone']; ?>
                                      <br/><br/>
                                      Seller Bank : <?php echo $row['SellerBank']; ?>
                                      <br/><br/>
                                  </td>
                                  <td style="width:300px;"></td>
                                  <td> <div class="btn-group">
                                       <form action="seller-list.php" name="apprUser" method="post">
                                          <input type="hidden" name="edit" value="<?php echo $row['SellerUsername'] ?>" style="color:black;">
                                           <button name="submit" type="submit" class="btn btn-success" style="margin-right:30px;"><i class="icon_check_alt2"></i> Enable User</button>
                                      <button name="submit2" type="submit2" class="btn btn-danger"><i class="icon_close_alt2"></i> Disable User</button><br/>
                                           <small><span style="color:red;">Warning!</span>Disabling Seller Will Prevent Seller<br/> From Logging Into The Website. (Disabling <br/>Without A Reason Is Absolutely Unacceptable.)</small>
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
