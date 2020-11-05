<?php
include('conn/header.php');
include('conn/nav.php');

$error= null;
if(!isset($_SESSION['cust_login'])){
}else if(isset($_SESSION['cust_login'])){
	header("Location: homepage.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
	// username and password received from loginform 
	$username=mysqli_real_escape_string($mysqli,$_POST['username']);
	$password=mysqli_real_escape_string($mysqli,$_POST['password']);

	$sql_query="SELECT username FROM customer WHERE username='$username' and password='$password'";
	$result=mysqli_query($mysqli,$sql_query);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$count=mysqli_num_rows($result);

	// If result matched $username and $password, table row must be 1 row
	if($count==1){
		$_SESSION['cust_login']=$username;
		header("location: homepage.php");
	}else{
		$error="Username or Password is Invalid";
	}
}else{
}
?>
         <!-- Start margin -->
         <div class="margin-contact">
             <!-- Start left column -->
             <div class="box-contact col-md-4 col-xs-offset-1">
               <h3 class="heading-inner">Login</h3>
                  <div class="hr"></div>
                    <div id="contact-area">
			         <form method="post" action="#">
						 <label for="Name">Username:</label>
						 <input type="text" name="username" id="username" />
						 <label for="Password">Password:</label>
						 <input type="password" name="password" id="password" />
						 <?php
							if($error == null){
							
							}else{
								echo "<p>", $error   ,"</p>";
							} ?>
						 <input type="submit" name="submit" value="Login" class="submit-button" />
			         </form>
					 
		            </div>
					<br>
					<br>
					<p>New To This Hotel? <a href="register.php" class="submit-button">Register Here!</a></p>
             </div>
             <!-- End left column -->
             
             <!-- Start right image -->
             <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
               <img src="img/Luxury.jpg" alt="img" class="photo-contact"/> 
             </div>
             <!-- End right image -->

         </div>
         <!-- End margin -->




<?php
include('conn/footer.php');
?>