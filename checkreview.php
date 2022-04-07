                                   
   <? php  
    include ("checksession.php");
include ("dbconnect.php");

$session = $_SESSION['AccountUsername'];
    
                                         

    
       $result12 = mysql_query("SELECT EXISTS(SELECT *FROM HavenOrder WHERE OrderStatus='Order Is Delivered' AND AccountUsername='$_SESSION' AND BicycleID='$code');");
       $count = mysqli_num_rows($result12);
if(mysqli_num_rows($result12) == 0){
   // do the stuff
    
    include ("postreview.php");
                                   }


?>