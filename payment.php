<?php include('conn/header.php');
include('conn/conn.php');
session_start();	
if(!isset($_SESSION['cust_login'])){
	header("Location: homepage.php");
}elseif(isset($_SESSION['cust_login'])){

}
	
	$cust=$_SESSION['cust_login'];
	$in=$_GET['in'];
	$out=$_GET['out'];
	$room_id=$_GET['room_id'];
	$total_room=$_GET['total_room'];
	$message=$_GET['message'];
	$bank=$_GET['bank'];
	$total_payment=$_GET['total_payment'];
	$payment_status="Complete";
	$reservation_status="Booked";
?>
<!-- Start News -->
	<div class="margin-news">
		<div class="col-md-10 col-xs-offset-1">
			<h4 class="heading-inner">Payment</h4>
			<div class="hr"></div>
			<div class="holder wow fadeIn" data-wow-delay="0.1s">
<?php
if(isset($_GET['bank_login'])){
?>
<div style="text-align: center">
	<form method="">
		<h5>Select Account: </h5>
		<p>
		<select name="room_type" id="room_type">
			<option value="">Creadit Card</option>
			<option value="">Debit Card</option>
		</select>
		<br><br>
		<input type="hidden" name= "in" value="<?php echo $in ?>" readonly>
		<input type="hidden" name= "out" value="<?php echo $out ?>" readonly>
		<input type="hidden" name= "room_id" value="<?php echo $room_id ?>" readonly>
		<input type="hidden" name= "total_room" value="<?php echo $total_room?>" readonly>		
		<input type="hidden" name= "message" value="<?php echo $message?>" readonly>
		<input type="hidden" name= "bank" value="<?php echo $bank?>" readonly>
		<input type="hidden" name= "total_payment" value="<?php echo $total_payment?>" readonly>
		TAC: 
		<br>
		<input type="text" value="" >
		<br><br>
		<input type="submit" name= "pay" class="submit-button" value="Pay">
		</p>
	</form>
</div>
<?php
}else if(isset($_GET['pay'])){
?>
	<h5>Payment Success!</h5>
	<div style="text-align: center">
	<form action="reciept.php" method="post">
	<p>
	<input type="hidden" name= "in" value="<?php echo $in ?>" readonly>
	<input type="hidden" name= "out" value="<?php echo $out ?>" readonly>
	<input type="hidden" name= "room_id" value="<?php echo $room_id ?>" readonly>
	<input type="hidden" name= "total_room" value="<?php echo $total_room?>" readonly>		
	<input type="hidden" name= "message" value="<?php echo $message?>" readonly>
	<input type="hidden" name= "bank" value="<?php echo $bank?>" readonly>
	<input type="hidden" name= "total_payment" value="<?php echo $total_payment?>" readonly>
	<input type="submit" name= "proceed" class="submit-button" value="Proceed">
	</p>
	</form>	
	</div>
	
<?php	
}else{
?>
			<?php   
			$result = $mysqli->query("SELECT * FROM bank WHERE bank_id = $bank");
			if ($result->num_rows > 0){
				while ($row = $result->fetch_object()){
			?>
				<h5><?php echo $row->bank_name;?></h5>
				<div style="text-align: center">
					<form method="">
					<p>
					Username: <input type="text" value="" >
					<br><br>
					Password: <input type="password" value="">
					<br><br>
					<input type="hidden" name= "in" value="<?php echo $in ?>" readonly>
					<input type="hidden" name= "out" value="<?php echo $out ?>" readonly>
					<input type="hidden" name= "room_id" value="<?php echo $room_id ?>" readonly>
					<input type="hidden" name= "total_room" value="<?php echo $total_room?>" readonly>		
					<input type="hidden" name= "message" value="<?php echo $message?>" readonly>
					<input type="hidden" name= "bank" value="<?php echo $bank?>" readonly>
					<input type="hidden" name= "total_payment" value="<?php echo $total_payment?>" readonly>
					<input type="submit" name= "bank_login" class="submit-button" value="Login">
					</p>
					</form>
				</div>
			<?php
			}}
			?>
			</div>
		</div>
	</div>
<!-- End news -->

<?php
}
include('conn/footer.php')
?>

