<?php
include('conn/header.php');
include('conn/nav.php');
if(!isset($_SESSION['cust_login'])){
}elseif(isset($_SESSION['cust_login'])){
	header("Location: homepage.php");
}
$error = null;
if (isset($_POST['submit'])){
	// get the form data
	$username = htmlentities($_POST['username'], ENT_QUOTES);
	$password = htmlentities($_POST['password'], ENT_QUOTES);
	$name = htmlentities($_POST['name'], ENT_QUOTES);
	$email = htmlentities($_POST['email'], ENT_QUOTES);
	$tel = htmlentities($_POST['tel'], ENT_QUOTES);	
	
	// check username has been used
	$sql_query="SELECT username FROM customer WHERE username='$username'";
	$result=mysqli_query($mysqli,$sql_query);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$count=mysqli_num_rows($result);
	
	if($count==1){
		$error = "Username Has Been Used!";
	}elseif (!preg_match('/^\w{5,}$/',$username)) {
		// check if username field are is correct
		$error = "Only Letters And White Space Allowed For Username";
	}else{
		// insert the new record into the database
		if ($stmt = $mysqli->prepare("INSERT into customer (username, password, name, email, tel) VALUES (? , ? , ? , ? , ?)")){
			$stmt->bind_param("sssss", $username, $password, $name, $email, $tel);
			$stmt->execute();
			$stmt->close();
		}else{
			echo "ERROR: Could not prepare SQL statement.";
		}
		// redirect the login		
		$error = "Register Success!";
	}
}
?>
 <!-- Start margin -->
         <div class="margin-contact">
             <!-- Start left column -->
             <div class="box-contact col-md-4 col-xs-offset-1">
               <h3 class="heading-inner">Register</h3>
                  <div class="hr"></div>
                    <div id="contact-area">
			         <form method="post" action="#">
						 <label for="Name">Username:</label>
						 <input type="text" name="username" id="username" required/>
						 <label for="Password">Password:</label>
						 <input type="password" name="password" id="password" required/>
						 <label for="Name">Name:</label>
						 <input type="text" name="name" id="name" required/>
						 <label for="Email">Email:</label>
						 <input type="email" name="email" id="email" required/>
						 <label for="Tel">Tel Number:</label>
						 <input type="text" name="tel" id="tel" maxlength="12" pattern="[0-9]+" minlength="12" required/>
						 <?php
							if($error == null){
							
							}else{
								echo "<p>", $error   ,"</p>";
							} ?>
						 <input type="submit" name="submit" value="Register" class="submit-button">
			         </form>					 
		            </div>
					<br>
					<br>
					<p>Already Have Account? <a href="login.php" class="submit-button">Login Here!</a></p>
             </div>
             <!-- End left column -->
             
             <!-- Start right image -->
             <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
               <img src="img/Super_Luxury.jpg" alt="img" class="photo-contact"/> 
             </div>
             <!-- End right image -->

         </div>
         <!-- End margin -->
<?php
include('conn/footer.php');
?>


