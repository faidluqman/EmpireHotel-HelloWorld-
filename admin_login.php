<?php
include('conn/header.php');
include('conn/a_nav.php');

if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password received from loginform 
$username=mysqli_real_escape_string($mysqli,$_POST['username']);
$password=mysqli_real_escape_string($mysqli,$_POST['password']);

$sql_query="SELECT admin_id FROM admin WHERE admin_username='$username' and admin_password='$password'";
$result=mysqli_query($mysqli,$sql_query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$count=mysqli_num_rows($result);


// If result matched $username and $password, table row must be 1 row
if($count==1)
{
$_SESSION['login_user']=$username;

header("location: admin_index.php");
}
else
{
$err="Username or Password is invalid";
}
}
?>

 <div class="container">
     <div class="row">
	     <div class="box">
                <div class="col-lg-12 text-center">
				 <hr>
                    <h2 class="intro-text text-center">Admin
                        <strong>Login</strong>
                    </h2>
                 <hr>
					 <!-- Login Box -->
					                 <div class="col-sm-4">
									 </div>
                                    <div class="col-sm-4 text-left">
                                            <form method="post" action="" name="loginform">
										   <label>Username:</label>
                                           <input type="text" value="" name="username" placeholder="Username" class="form-control">
										   <br>
										   <label>Password:</label>
                                           <input type="password" value="" name="password" placeholder="Password" class="form-control">
										   <br>
										   <button type="submit" class="btn btn-default">Login</button>
								    </div>
					<!-- End Login Box -->
				</div>
		 </div>
	 </div>
 </div>
<?php
include('conn/footer.php');
?>