<html>
    <head>
    
    
    </head>
<body>
 <style>
       tbody{
           
           display: block;
           height: 400px;
           overflow: auto;
       }
    
    </style>
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
<?php  
    if(isset($_POST['submit'])) {
        
        
      
			
				 if(isset($_POST['edit'])){ 
              $SellerUsername			= $_POST['edit'];       
              
            $sql3="SELECT * FROM HavenVerification INNER JOIN HavenSeller ON havenverification.AccountUsername=havenseller.SellerUsername WHERE havenseller.SellerUsername ='$SellerUsername';";
		    $resul=$conn->query($sql3);
                          
                      $queryu ="update HavenSeller set SellerVerificationStatus='Y' where SellerUsername = '$SellerUsername' ";
					  $inuser = mysqli_query($conn,$queryu);   
                        
                         }
                                }
   
        if(isset($_POST['submit2'])) {
        
        
      
			
				 if(isset($_POST['edit'])){ 
              $SellerUsername2			= $_POST['edit'];      
              
            $sql4="SELECT * FROM HavenVerification INNER JOIN HavenSeller ON havenverification.AccountUsername=havenseller.SellerUsername WHERE havenseller.SellerUsername ='$SellerUsername2';";
		    $resul2=$conn->query($sql4);
                          
                      $queryu ="update HavenSeller set SellerVerificationStatus='N' where SellerUsername = '$SellerUsername2' ";
					  $inuser = mysqli_query($conn,$queryu);  
                        
                         }
                                }                             
                                    
                                    
    
    ?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header">Verification(Seller) Approval Inbox</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<li>Verification Approval Inbox</li>
					</ol>
				</div>
			</div>
              <!-- page start-->

              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              All Verification Status To Be Approved Or Rejected
                          </header>
                          
                                
                      </section>
                  </div>
              </div>
              
               <div class="row">
				<div class="col-lg-12">
					<ol class="col-lg-12" style="background:white;">
						 <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-8">
            <br/>
             <form action="verification-app-admin.php" method="get">
            <div  style="position:relative;"> <input value="<?=isset($_GET['search'])?$_GET['search']:'';?>" style="position:relative;width:520px;" name="search" class="form-control" placeholder="Search Username Here..."> <button style=" position: absolute;background:blue;bottom:0px;left:530px;height:35px;" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button> </div> </form>
            <br/>
             <form action="verification-app-admin.php" style="color:black;" method="POST">    
                            
            <select name="category">
            <option value="all">All</option>
            <option value="oldest">Oldest</option>
            <option value="recent">Recent</option>
            </select><br/><br/>
            <input type="submit" value="Sort" name="Submit" style="">
                            </form>
        </div> 
                            
                    </div>
                        <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Not Approved(Yet) Verification Table
                          </header>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th> Seller ID</th>
                                  <th> Seller Username</th>
                                 <th> Seller Name</th>
                                 <th> Seller Avg. Rating</th>
                                 <th> Number Of Orders Delivered</th>
                                 <th> Seller Verification Status</th> 
                                 <th> Action </th>
                              </tr>
                               <?php 
                
                 
	        if(isset($_POST['category']) && $_POST['category'] == 'all') 
        {   
	       $sql = "SELECT * FROM HavenVerification INNER JOIN HavenSeller ON havenverification.AccountUsername=havenseller.SellerUsername order by havenverification.VerificationID  desc;"; 
        }   
         else if(isset($_POST['category']) && $_POST['category'] == 'oldest') 
        {   
	       $sql = "SELECT * FROM HavenVerification INNER JOIN HavenSeller ON havenverification.AccountUsername=havenseller.SellerUsername order by havenverification.VerificationID  asc;";  
        }                        
         else if(isset($_POST['category']) && $_POST['category'] == 'recent') 
        {   
	       $sql = "SELECT * FROM HavenVerification INNER JOIN HavenSeller ON havenverification.AccountUsername=havenseller.SellerUsername order by havenverification.VerificationID  desc;";  
        }              
         else
        {
            $sql = "SELECT * FROM HavenVerification INNER JOIN HavenSeller ON havenverification.AccountUsername=havenseller.SellerUsername order by havenverification.VerificationID  desc;"; 
        }       
                               
        if(isset($_GET['search'])){
                  
                   $search = '%' . $_GET['search'] . '%';
                   $sql = "SELECT * FROM HavenVerification INNER JOIN HavenSeller ON havenverification.AccountUsername=havenseller.SellerUsername WHERE HavenSeller.SellerUsername like '%$search%' order by havenverification.VerificationID  desc;"; 
                
                 
              }                       
                               
                               
                $result = mysqli_query($conn, $sql);
		        $count = mysqli_num_rows($result);

		// if no records are found
		if(mysqli_num_rows($result) == 0) 
		{
            
		?>
            
			<div><p>No Records Found</p></div>
            
		<?php
            
		} 
			
		else{
			// if got records found use looping to display the results
			while($row = mysqli_fetch_assoc($result)) {
	
			
		?>
                              <tr>
                                 <td style="width:5%;"><?php echo $row['SellerID']; ?></td>
                                 <td style="width:5%;"><?php echo $row['SellerUsername']; ?></td>
                                  <td><?php echo $row['SellerName']; ?></td>
                                 <td><?php echo $row['VerificationSRating']; ?></td>
                                 <td><?php echo $row['VerificationTDelivered']; ?></td>
                                   <td><?php 
                                
                                if($row['SellerVerificationStatus'] =='Y'){
                                    echo" <div class='btn btn-success'>Approved</div>";
                                }
                                else{
                                    echo" <div class='btn btn-danger'>Rejected</div>";
                                }
                                
                                ?></td>
                                  <td>  <form action="verification-app-admin.php" name="apprVerification" method="post">
                                          <input type="hidden" name="edit" value="<?php echo $row['SellerUsername']; ?>" style="color:black;">
                                       <button name="submit" type="submit" class="btn btn-success"><i class="icon_check_alt2"></i></button>
                                      <button name="submit2" type="submit2" class="btn btn-danger"><i class="icon_close_alt2"></i></button>
                                      </form></td>
                              </tr>
                               <?php }}?>
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
