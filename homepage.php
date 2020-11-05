<?php
include('conn/header.php');
include('conn/nav.php');
?>
 <!-- Start main image and the text below -->
         <div class="col-md-12 wow fadeIn" data-wow-delay="0.1s">
              <img src="img/1.jpg" alt="img" class="resp main-image"/>
                  <h1>Welcome</h1>
                  <div class="hr"></div>
                  <div class="text-center">
					<?php 
					if(!isset($_SESSION['cust_login'])){
					?>
						<h2>Empire Hotel</h2>
						<a href="login.php" class="home-btn btn">Reserve Room Now!</a>
					<?php
					}elseif(isset($_SESSION['cust_login'])){
					?>
						<h2><?php echo $_SESSION['cust_login']   ?></h2>
						<a href="reserve.php" class="home-btn btn">Reserve Room Now!</a>
					<?php }?>
                  </div>  
          </div>
          <!-- End main image and the text below -->

<?php
include('conn/footer.php');
?>