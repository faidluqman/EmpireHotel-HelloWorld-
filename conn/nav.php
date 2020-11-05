<!-- Logo -->
         <div class="brand wow fadeIn" data-wow-delay="0.1s"> Empire Hotel
           <div class="title"> - Taman PD Mewah, Port Dickson -  </div>
         </div>
<?php include('conn/conn.php');?>

<?php 
session_start();
?>

<?php
if(isset($_SESSION['cust_login'])){
	//echo $_SESSION['cust_login'];
?>
<!-- Navigation -->
         <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <div class="navbar-brand"><a href="homepage.php">Empire Hotel</a>
                <div class="title"> Empire Hotel</div>
                </div>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   <li class="dropdown">
                        <a href="homepage.php">Home</a>
                    </li>
                    <li>
                       <a href="about.php">About</a>
                    </li>
                    <li>
                       <a href="gallery.php">Gallery</a>
                    </li>
                    <li>
                      <a href="roomandrates.php">Rooms & Rates</a>
                    </li>
					<li>
                      <a  href="reserve_history.php">Reserve History</a>
                    </li>
					<li>
                      <a  href="reserve.php">Reserve Room</a>
                    </li>
                    <li>
                      <a  href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /navbar-collapse -->
         </nav>
         <!-- End nav -->
<?php
}elseif(isset($_SESSION['admin_login'])){	
?>
 <!-- Navigation -->
         <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <div class="navbar-brand"><a href="homepage.php">Empire Hotel</a>
                <div class="title"> Empire Hotel</div>
                </div>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   <li class="dropdown">
                        <a href="admin_homepage.php">Home</a>
                    </li>
                    <li>
                       <a href="admin_reservation.php">Reservation</a>
                    </li>
                    <li>
                       <a href="admin_gallery.php">Gallery</a>
                    </li>
                    <li>
                      <a href="admin_rooms.php">Rooms</a>
                    </li>
					<li>
                      <a  href="admin_bank.php">Bank</a>
                    </li>
                    <li>
                      <a  href="admin_logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /navbar-collapse -->
         </nav>
         <!-- End nav -->
<?php
}else{
?>
 <!-- Navigation -->
         <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <div class="navbar-brand"><a href="homepage.php">Empire Hotel</a>
                <div class="title"> Empire Hotel</div>
                </div>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   <li class="dropdown">
                        <a href="homepage.php">Home</a>
                    </li>
                    <li>
                       <a href="about.php">About</a>
                    </li>
                    <li>
                       <a href="gallery.php">Gallery</a>
                    </li>
                    <li>
                      <a href="roomandrates.php">Rooms & Rates</a>
                    </li>
					<li>
                      <a  href="register.php">Register</a>
                    </li>
                    <li>
                      <a  href="login.php">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /navbar-collapse -->
         </nav>
         <!-- End nav -->
<?php
}
?>

	
	
	

	 
