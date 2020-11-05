<?php
include('conn/header.php');
include('conn/nav.php');
$cust=$_SESSION['cust_login'];

if(!isset($_SESSION['cust_login'])){
	header("Location: homepage.php");
}elseif(isset($_SESSION['cust_login'])){

}
?>
<div class="margin-resume wow fadeIn" data-wow-delay="0.1s"">
			<h3 class="heading-inner">Reservation History</h3>
			<div class="hr"></div>
			<table class="table">
				<th>Booking ID</th><th>Room Type</th><th>Total Room</th><th>Check In</th><th>Check Out</th><th>Total Payment</th><th>Payment Status</th><th>Reservation Status</th><th>Option</th>    
				<?php 
				$result = $mysqli->query("SELECT * FROM reservation JOIN rooms ON reservation.room_type = rooms.rooms_id  WHERE reservation.cust_id = '$cust'");
				if ($result->num_rows > 0){
					while ($row = $result->fetch_object()){
				?>
				 <tr>
				 <td><?php echo $row->reservation_id;?></td>
				 <td><?php echo $row->room_type;?></td>
				 <td><?php echo $row->total_room;?></td>
				 <td><?php echo $row->check_in;?></td>
				 <td><?php echo $row->check_out;?></td>
				 <td><?php echo $row->total_payment;?></td>
				 <td><?php echo $row->payment_status;?></td>
				 <td><?php echo $row->reservation_status;?></td>
				 <td><a href="reserve_history.php?cancel=<?php echo  $row->reservation_id; ?>" onclick="return  confirm('Are you sure? There will be no refund')">Cancel Booking</a></td>
				 </tr>
				<?php }} ?>
			</table>

 </div>
<?php
if(isset($_GET['cancel'])){
	
	$reservation_id= $_GET['cancel'];
	$reservation_status = "Canceled";
	
	if ($stmt = $mysqli->prepare("UPDATE reservation SET reservation_status=? WHERE reservation_id=?")){
	    $stmt->bind_param("si", $reservation_status, $reservation_id);
        $stmt->execute();
        $stmt->close();
		header("Location: reserve_history.php");
    }else{
	echo "error";
    }
	
}
include('conn/footer.php');
?>