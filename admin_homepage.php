<?php
include('conn/header.php');
include('conn/nav.php');

if(!isset($_SESSION['admin_login'])){
	header("Location: admin_login.php");
}elseif(isset($_SESSION['admin_login'])){
}

if(isset($_GET['cancel'])){
	
	$reservation_id= $_GET['cancel'];
	$reservation_status = "Canceled";
	
	if ($stmt = $mysqli->prepare("UPDATE reservation SET reservation_status=? WHERE reservation_id=?")){
	    $stmt->bind_param("si", $reservation_status, $reservation_id);
        $stmt->execute();
        $stmt->close();
		header("Location: admin_homepage.php");
    }else{
	echo "error";
    }
	
}elseif(isset($_GET['confirm'])){

	$reservation_id= $_GET['confirm'];
	$reservation_status = "Confirm";
	
	if ($stmt = $mysqli->prepare("UPDATE reservation SET reservation_status=? WHERE reservation_id=?")){
	    $stmt->bind_param("si", $reservation_status, $reservation_id);
        $stmt->execute();
        $stmt->close();
		header("Location: admin_homepage.php");
    }else{
	echo "error";
    }

}elseif(isset($_GET['complete'])){
	
	$reservation_id= $_GET['complete'];
	$reservation_status = "Complete";
	
	if ($stmt = $mysqli->prepare("UPDATE reservation SET reservation_status=? WHERE reservation_id=?")){
	    $stmt->bind_param("si", $reservation_status, $reservation_id);
        $stmt->execute();
        $stmt->close();
		header("Location: admin_homepage.php");
    }else{
	echo "error";
    }
}

?>
<!-- Start main image and the text below -->
<div class="col-md-12 wow fadeIn" data-wow-delay="0.1s">
	<h1>Welcome  <?php echo $_SESSION['admin_login'];?></h1>
	<h2>Today's Date : <?php echo date("Y-m-d"); ?></h2>
	<div class="hr"></div>
	<div class="text-center">
		<table class="table">
				<th>Booking ID</th><th>Customer</th><th>Room Type</th><th>Total Room</th><th>Check In</th><th>Check Out</th><th>Total Payment</th><th>Payment Status</th><th>Reservation Status</th><th>Option</th>    
				<?php 
				$date = date("Y-m-d");
				$result = $mysqli->query("SELECT * FROM reservation JOIN rooms ON reservation.room_type = rooms.rooms_id WHERE check_in like '".$date."%' OR check_out like '".$date."%' Order By check_in");
				if ($result->num_rows > 0){
					while ($row = $result->fetch_object()){
				?>
				 <tr>
				 <td><?php echo $row->reservation_id;?></td>
				 <td><?php echo $row->cust_id;?></td>
				 <td><?php echo $row->room_type;?></td>
				 <td><?php echo $row->total_room;?></td>
				 <td><?php echo $row->check_in;?></td>
				 <td><?php echo $row->check_out;?></td>
				 <td><?php echo $row->total_payment;?></td>
				 <td><?php echo $row->payment_status;?></td>
				 <td><?php echo $row->reservation_status;?></td>
				 <td>
					 <a href="admin_homepage.php?cancel=<?php echo  $row->reservation_id; ?>" onclick="return  confirm('Are you sure? Customer Will Not Get Their Refund Back')">Cancel Booking</a>
					 <br>
					 <a href="admin_homepage.php?confirm=<?php echo  $row->reservation_id; ?>" onclick="return  confirm('Are you sure?')">Confirm Booking</a>
					 <br>
					 <a href="admin_homepage.php?complete=<?php echo  $row->reservation_id; ?>" onclick="return  confirm('Are you sure?')">Complete Booking</a>
				 </td>
				 </tr>
				<?php }} ?>
			</table>		
	</div>  
</div>
<!-- End main image and the text below -->

<?php
include('conn/footer.php');
?>