<?php
include('conn/header.php');
include('conn/nav.php');
?>
<div class="container">
  <div class="row">
            <div class="box">
<script>
    function printDiv() {
      var divToPrint = document.getElementById('complete');
      newWin = window.open("", "MsgWindow", "width=1000,height=500");
      newWin.document.write(divToPrint.outerHTML);
      newWin.print();
      newWin.close();
   }
</script>
			
			<div class="col-md-12">
					<div class="error-404-page text-center">
					<div id="complete">
						<h2>Payment Complete!</h2>
						<?php
						$result = $mysqli->query("SELECT * FROM reservation where reservation_id=$_GET[reservation_number] ORDER BY reservation_id");
						if ($result->num_rows > 0){
						while ($row = $result->fetch_object()){
						?>
						<h3>Your Reservation Code : <?php echo $row->reservation_id; ?></h3>
						<h3>Your Reference Number : <?php echo $row->refrence_no; ?></h3>
						<h3>Your Payment Status : <?php echo $row->payment_status; ?></h3>
						<h3>Check-In Date : <?php echo $row->check_in; ?></h3>
						<?php }}else{header("Location: index.php");} ?>
					</div>
					    <p>Your Payment is Now Checking.<br>Please Check Your Reservation status After 24 Hour.</p>
						<p><button class="btn btn-default" onclick="printDiv()">Print</button></p>
					</div>
				</div>	
			
			</div>
	</div>
</div>
			


<?php
include('conn/footer.php');
?>