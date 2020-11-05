<?php
include('conn/header.php');
include('conn/nav.php');
if(!isset($_SESSION['cust_login'])){
	header("Location: homepage.php");
}elseif(isset($_SESSION['cust_login'])){

}
	
	$cust=$_SESSION['cust_login'];	
	$in=htmlentities($_POST['in'], ENT_QUOTES);
	$out=htmlentities($_POST['out'], ENT_QUOTES);
	$room_id=htmlentities($_POST['room_id'], ENT_QUOTES);
	$total_room=htmlentities($_POST['total_room'], ENT_QUOTES);
	$message=htmlentities($_POST['message'], ENT_QUOTES);
	$bank=htmlentities($_POST['bank'], ENT_QUOTES);
	$total_payment=htmlentities($_POST['total_payment'], ENT_QUOTES);
	$payment_status="Complete";
	$reservation_status="Booked";
	
	
	
	
	if($stmt = $mysqli->prepare("INSERT into reservation (cust_id, check_in, check_out, total_room, room_type, total_payment, bank_type, payment_status, reservation_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)")){
		$stmt->bind_param("sssssssss", $cust, $in, $out, $total_room, $room_id, $total_payment, $bank, $payment_status, $reservation_status);
		$stmt->execute();
		$stmt->close();
	}else{}
	
    $id= mysqli_insert_id($mysqli);
	?>
	
	<h5>Your Booking ID Is <?php  echo $id; ?></h5>
	<h2> Empire Hotel</h2>
	<div style="text-align: center">
	<p>
	Username: <?php echo $cust;  ?>
	<br>
	Check In: <?php echo $in  ?>
	<br>
	Check Out: <?php echo $out  ?>
	<br>
	<?php 
	$result = $mysqli->query("SELECT * FROM rooms WHERE rooms_id = $room_id");
	if ($result->num_rows > 0){
		while ($row = $result->fetch_object()){
	?>
	Room Type: <?php echo $row->room_type; ?>
	<?php
	}}
	?>
	<br>
	Total Room: <?php echo $total_room  ?>
	<br>
	Total Payment: <?php echo $total_payment   ?>
	<br>
	<?php 
	$result = $mysqli->query("SELECT * FROM bank WHERE bank_id = $bank");
	if ($result->num_rows > 0){
		while ($row = $result->fetch_object()){
	?>
	Banking Type: <?php echo $row->bank_name; ?>
	<?php
	}}
	?>
	<br>
	Payment Status: <?php echo $payment_status  ?>
	<br>
	Reservation Status: <?php echo $reservation_status  ?>
	<br><br>
	
		Print Your Booking Details
		<br><br>
		<button class="submit-button" onclick="window.print()">Print</button>
	</p>
	</div>

<?php
include('conn/footer.php');
?>