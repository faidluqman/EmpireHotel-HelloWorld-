<div class="brand">Empire Hotel</div>
<div class="address-bar">Taman PD Mewah,Port Dickson | Negeri Sembilan, Malaysia</div>

<?php
include('conn.php');
session_start();
if(!isset($_SESSION['login_user']))
	{
?>
	 <nav class="navbar navbar-default" role="navigation">
        <div class="container">           
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>	
<?php
	}
	if(isset($_SESSION['login_user']))
	{
	$login_session=$_SESSION['login_user'];
?>
	<nav class="navbar navbar-default" role="navigation">
        <div class="container">           
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
				    <li>
                        <a href="admin_index.php">Home</a>
                    </li>
				    <li>
                        <a href="admin_reservation.php">Reservation</a>
                    </li>
					<li>
                        <a href="admin_picture.php">Picture</a>
                    </li>
					<li>
                        <a href="admin_rooms.php">Rooms</a>
                    </li>				    
                    <li>
                        <a href="admin_logout.php">Logout</a>
                    </li>					
                </ul>
            </div>
        </div>
    </nav>
<?php
	}
?>