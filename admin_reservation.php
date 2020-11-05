<?php
include('conn/header.php');
include('conn/nav.php');

if(!isset($_SESSION['admin_login'])){
	header("Location: admin_login.php");
}elseif(isset($_SESSION['admin_login'])){
}
?>
<!-- Start main image and the text below -->
<div class="col-md-12 wow fadeIn" data-wow-delay="0.1s">
	<h1>Welcome  <?php echo $_SESSION['admin_login'];?></h1>
	<form method="GET">
		<h2>Search Booking Number : 
		<br>
		<input type="text" name="booking_no" /></h2>
		<div class="text-center">
			<input type="submit" name="submit" value="search" class="btn btn-default" />
		</div>
	</form>
	<br>
	<div class="hr"></div>
	<div class="text-center">
	
	<?php
	if(!isset($_GET['booking_no'])){  	
	?>
	
	<table class="table">
				<th>Booking ID</th><th>Customer</th><th>Room Type</th><th>Total Room</th><th>Check In</th><th>Check Out</th><th>Total Payment</th><th>Payment Status</th><th>Reservation Status</th><th>Option</th>    
				<?php
				$result = $mysqli->query("SELECT * FROM  reservation INNER JOIN rooms ON reservation.room_type = rooms.rooms_id");
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
	
	<?php
	}else if(isset($_GET['booking_no'])){
	$booking=$_GET['booking_no'];	
	?>
	
	<table class="table">
				<th>Booking ID</th><th>Customer</th><th>Room Type</th><th>Total Room</th><th>Check In</th><th>Check Out</th><th>Total Payment</th><th>Payment Status</th><th>Reservation Status</th><th>Option</th>    
				<?php
				$result = $mysqli->query("SELECT * FROM  reservation INNER JOIN rooms ON reservation.room_type = rooms.rooms_id WHERE reservation.reservation_id = '$booking'");
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
	
	
	<?php } ?>
	
	
	
	
	
	
	
	
	
				
	</div>  
</div>
<!-- End main image and the text below -->






<?php
include('conn/footer.php');
?>