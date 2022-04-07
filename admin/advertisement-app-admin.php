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
              $BicycleID			= $_POST['edit'];       
              
            $sql3="select * from HavenBicycle INNER JOIN HavenSeller ON HavenBicycle.BicycleID='$BicycleID' WHERE HavenBicycle.AccountUsername = HavenSeller.SellerUsername;";
		    $resul=$conn->query($sql3);
                          
                      $queryu ="update HavenBicycle set BicycleApproval='Y' where BicycleID = '$BicycleID' ";
					$inuser = mysqli_query($conn,$queryu);   
                        
                         }
                                }
   
        if(isset($_POST['submit2'])) {
        
        
      
			
				 if(isset($_POST['edit'])){ 
              $BicycleID2			= $_POST['edit'];        
              
            $sql4="select * from HavenBicycle INNER JOIN HavenSeller ON HavenBicycle.BicycleID='$BicycleID2' WHERE HavenBicycle.AccountUsername = HavenSeller.SellerUsername;";
		    $resul2=$conn->query($sql4);
                          
                      $queryv ="update HavenBicycle set BicycleApproval='R' where BicycleID = '$BicycleID2' ";
					$inuser2 = mysqli_query($conn,$queryv);   
                        
                         }
                                }                             
                                    
    
    
    ?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-table"></i>Bicycle Advertisement Approval</h3>
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
                              All Bicycle To Be Approved Or Rejected
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
             <form action="advertisement-app-admin.php" method="get">
            <div  style="position:relative;"> <input value="<?=isset($_GET['search'])?$_GET['search']:'';?>" style="position:relative;width:520px;" name="search" class="form-control" placeholder="Search Bicycles Here..."> <button style=" position: absolute;background:blue;bottom:0px;left:530px;height:35px;" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button> </div> </form>
            <br/>
             <form action="advertisement-app-admin.php" style="color:black;" method="POST">    
                            
            <select name="category">
            <option value="all">All</option>      
            <option value="notapproved">Not Approved</option>
            <option value="approved">Approved</option>
            <option value="rejected">Rejected</option>   
            </select><br/><br/>
            <input type="submit" value="Sort" name="Submit" style="">
                            </form>
            <!--
            <form>
            
            <input type="checkbox" id="select-all" onclick="toggle(this);" /><b> Check all?</b><br />
              <button name="submit" type="submit" class="btn btn-success"><i class="icon_check_alt2"></i></button>
              <button name="submit2" type="submit2" class="btn btn-danger"><i class="icon_close_alt2"></i></button>
            </form>
             
                             <script>
                            function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
                            }</script>-->
        </div> 
                            
                    </div>
                        <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Bicycle Advertisement Approval Table
                          </header>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                  <!--<th>Select </th>-->
                                 <th> Bicycle ID</th>
                                  <th> Bicycle Image</th>
                                 <th> Bicycle Name</th>
                                 <th> Bicycle Price</th>
                                 <th> Bicycle Category</th>
                                 <th> Bicycle Color</th>
                                  <th> Uploaded By</th>
                                  <th> Bicycle Status</th>
                                 <th> Action </th>
                              </tr>
                               <?php 
                
                 
	        if(isset($_POST['category']) && $_POST['category'] == 'all') 
        {   
	       $sql = "SELECT * FROM HavenBicycle order by BicycleID desc"; 
        }    
         else if(isset($_POST['category']) && $_POST['category'] == 'approved') 
        {   
	       $sql = "SELECT * FROM HavenBicycle WHERE BicycleApproval = 'Y' order by BicycleID desc";  
        } 
         else if(isset($_POST['category']) && $_POST['category'] == 'rejected') 
        {   
	       $sql = "SELECT * FROM HavenBicycle WHERE BicycleApproval = 'R' order by BicycleID desc";  
        }  
         else if(isset($_POST['category']) && $_POST['category'] == 'notapproved') 
        {   
	      $sql = "select * from HavenBicycle  WHERE BicycleApproval = 'N' order by BicycleID desc";
        }                 
         else
        {
            $sql = "SELECT * FROM HavenBicycle order by BicycleID desc"; 
        }       
                               
        if(isset($_GET['search'])){
                  
                   $search = '%' . $_GET['search'] . '%';
                   $sql = "select * from HavenBicycle  WHERE BicycleApproval = 'N' AND BicycleName like '%$search%' order by BicycleID desc limit 9";
                
                  
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
                                 <!-- <td><input type="checkbox" name="check" value="<?php //echo $row['BicycleID']; ?>"/><br /></td>-->
                                 <td style="width:5%;"><?php echo $row['BicycleID']; ?></td>
                                 <td><img src="../<?php echo $row['BicycleImage']; ?>" alt="" style="width:60px;height:40px;"/></td>
                                  <td style="width:10%;"><?php echo $row['BicycleName']; ?></td>
                                 <td>RM <?php echo $row['BicyclePrice']; ?></td>
                                 <td><?php echo $row['BicycleCategory']; ?></td>
                                 <td><?php echo $row['BicycleColor']; ?></td>
                                  <td><?php echo $row['AccountUsername']; ?></td>
                                  <td > <?php 
                                
                                if($row['BicycleApproval'] =='Y'){
                                    echo" <br/><div class='btn btn-success'>Approved</div><br/><br/>";
                                }
                                else if($row['BicycleApproval'] =='R'){
                                    echo" <br/><div class='btn btn-danger'>Rejected</div><br/><br/>";
                                }
                                else{
                                    echo"<br/><div class='btn btn-warning'>Pending</div><br/><br/>";
                                }
                                
                                ?></td>
                                  <td> <div class="btn-group">
                                      <form action="advertisement-app-admin.php" name="apprBicycle" method="post">
                                          <input type="hidden" name="edit" value="<?php echo $row['BicycleID'] ?>" style="color:black;">
                                       <button name="submit" type="submit" class="btn btn-success"><i class="icon_check_alt2"></i></button>
                                      <button name="submit2" type="submit2" class="btn btn-danger"><i class="icon_close_alt2"></i></button>
                                      </form>
                                     <a class="btn btn-primary" href="product-details-admin.php?code=<?php echo $row['BicycleID'];?>" style="width:83px;"><i class="icon_cursor"></i> View</a>
                                  </div></td>
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
<script>
(function() {
  for (div=0; div < document.querySelectorAll('div').length; div++) {
    document.querySelectorAll('div')[div].style.overflow = "auto";
  };
})();
    
    
</script>