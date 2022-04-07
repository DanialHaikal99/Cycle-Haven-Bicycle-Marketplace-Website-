 <script>
                                    $(document).ready(function(){

                                    $("input[type='radio']").click(function(){
                                    var sim = $("input[type='radio']:checked").val();
                                    //alert(sim);
                                    if (sim<3) { $('.myratings').css('color','red'); $(".myratings").text(sim); }else{ $('.myratings').css('color','green'); $(".myratings").text(sim); } }); });
                                    </script>
                                
                                    <form name="reviewfrm" enctype="multipart/form-data" action="product-details-user.php" method="post">
                                        <input style="width:50px;" type='hidden' name='code' value="<?php echo $row["BicycleID"];?>">
                                    <input style="width:50px;" type='hidden' name='hidden_bicycle_id' value="<?php echo $row["BicycleID"];?>">	
                                    <input style="width:50px;" type='hidden' name='hidden_username' value="<?php echo $_SESSION["AccountUsername"];?>">    
                                                <div class="card">
                                                    <div class="card-body text-left" > <span class="myratings">0</span>
                                                        <h4 class="mt-1">Order Rating :</h4>
                                                        <fieldset class="rating" style="margin-right:205px;"> <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label> <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label> <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label> <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label> <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label> <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label> <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label> <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label> <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label> <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label> <input type="radio" class="reset-option" name="rating" value="reset" /> </fieldset>
                                                    </div>
                                                </div>
                                          
                                      
                                    
									<p><b>Write Your Review</b></p>
									
									
										<span>
											<input name="reviewtitle" type="text" placeholder="Your Title"/>
										
										<textarea name="reviewdesc" placeholder="Your Review"></textarea>
                                            </span>
										<button type="submit" name="submit" class="btn btn-default pull-right" >
											Submit
										</button>
                                        <script>
                                        function myFunction() {
                                            alert("Still working on the feature");
                                            }
                                        </script>
                                         <?php 
                                    
                                     include ('dbconnect.php');

                                        if(isset($_POST['submit'])) {

                                            // removing ID coz it will be auto-incremented anyway
                                            $ReviewTitle		= $_POST['reviewtitle'];
                                            $ReviewDesc		= $_POST['reviewdesc'];
                                            $ReviewStar		= $_POST['rating'];
                                            $AccountUsername	= $_POST['hidden_username'];
                                            $BicycleID	= $_POST['hidden_bicycle_id']; 
                                            $code = $_POST['code'];

                    
                    
                                                     if($ReviewTitle =="" || $ReviewDesc =="" || $ReviewStar =="" ){			
                                                    echo "<div class ='box container'>			
                                                        <p>One Or More Fields Are Missing</p>					
                                                        </div>";
                                                                          
                                                                                 } 
                                                else {
                                                     $query = "INSERT INTO HavenReview(ReviewTitle, ReviewDesc, ReviewStar, AccountUsername, BicycleID) 
                                                                                VALUES ('$ReviewTitle',' $ReviewDesc', '$ReviewStar', '$AccountUsername', '$BicycleID')";

                                                                    $inuser = mysqli_query($conn,$query);

                                                      
                                                    
                                                    if($inuser == false){			
                                                                echo"<p>ERROR : can't $sql".$conn->error."</p></div>";
                                                            }
                                                            else {			
                                                                 echo "<div class ='box container'>			
                                                                    <p>	<b style='color:#32CD32;'>Review Sent Successfully</b></p></div>";
                                                                
                                                                 echo "<script>
                                                               
                                                                  alert('Review Sent Successfully.');
                                                                
                                                                </script>";
                                                                
                                                                
                                                            }
                                                     }
                                              }
                                       ?>
									</form>
