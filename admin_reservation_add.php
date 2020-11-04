<?php
include('conn/header.php');
include('conn/a_nav.php');
if(!isset($_SESSION['login_user']))
	{
	header("Location: index.php");
	}
if(isset($_SESSION['login_user']))
	{
	$login_session=$_SESSION['login_user'];
	}
?>
<div class="container">

        <div class="row">
            <div class="box">
			    
            </div>
        </div>
</div>


<?php
include('conn/a_footer.php');
 ?>