<?php
include('conn/header.php');
include('conn/nav.php');
$result = $mysqli->query("SELECT * FROM rooms where rooms_id=$_GET[r_type]");
if ($result->num_rows > 0){
	while ($row = $result->fetch_object()){
 ?>
<div class="container">
  <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Reserve
                        <strong><?php echo $row->room_type; ?></strong>
                    </h2>
                    <hr>
                </div>
				 <div class="col-lg-12">
				 <div class="form-group col-lg-4">
				 <?php      
				 if($_GET['in']==""){
					 echo"<p>You Did Not Choose Your <strong>Date</strong></p>";
				 }else{
					 echo "<p>Check-in Date : <strong>".$_GET['in']."</strong></p>";
				 }
				 
				 ?>
				 </div>
				 <div class="form-group col-lg-4">
				 <?php      
				 if($_GET['out']==""){
					 echo"<p>You Did Not Choose Your <strong>Date</strong></p>";
				 }else{
					 echo "<p>Check-out Date : <strong>".$_GET['out']."</strong></p>";
				 }
				 
				 ?>
				 </div>
				 <div class="form-group col-lg-4">
				 <?php      
				 $c_in=$_GET['in'];
				 $c_out=$_GET['out'];
				 
				 $in= strtotime($_GET['in']);
                 $out= strtotime($_GET['out']);
                 $timeDiff = abs($out - $in);
                 $numberDays = $timeDiff/86400;
                 $numberDays = intval($numberDays);//number of days
				 ?>
				 </div>
				 </div>
				 <div class="form-group col-lg-6">
				<?php
				$rowCount=$_GET["t_room"];
                for($i=0;$i<$rowCount;$i++){
				?>
				<div class="form-group col-lg-3">
				<form action="process.php" method="post">
				    <h4>Room <?php echo $i+1; ?></h4>
				    <label>Adult:</label>
					<input type="number" min="2" max="5" value="2" name="adult" class="form-control">
					<label>Child:</label>
					<input type="number" min="0" max="4" value="0" name="kids" class="form-control">
				</div>
				<?php	
				}
				?>
				</div>
				<input type="hidden" name="check_in" value="<?php echo $_GET["in"]; ?>">
				 <input type="hidden" name="check_out" value="<?php echo $_GET["out"]; ?>">
				 <input type="hidden" name="t_room" value="<?php echo $_GET["t_room"]; ?>">
				<div class="form-group col-lg-6">
				 <table class="table">
				 <th>Room</th><th>Price(RM)</th><th>Day(s) Staying</th>
				 <?php
				 $rowCount=$_GET["t_room"];
                 for($i=0;$i<$rowCount;$i++){
				 ?>
				 <tr>
				 <td><?php echo $i+1; ?></td>
				 <td><?php echo number_format((float)$row->room_price, 2, '.', ''); ?></td>
				 <td><?php echo $numberDays; ?></td>
				 </tr>
				 <?php
				 }
				 $price=$row->room_price;
				 $t_room=$_GET['t_room'];
				 $total=$t_room*$price*$numberDays;
				 $pay=number_format((float)$total, 2, '.', '');
				 ?>
				 <tr>
				 <th>Total (RM)</th>
				 <td><strong><?php echo $pay; ?></strong></td>
				 </tr>
				 </table>
				</div>
				<?php }}else{
					header("Location: index.php");
				} ?>
				 <div class="form-group col-lg-12">
				 <input type="hidden" name="t" value="<?php echo $pay; ?>">
				 <div class="form-group col-lg-6">
				 <label>Your Name</label>
				 <input type="text" name="name" class="form-control" placeholder="Your Contact Name">
				 <br>
				 <label>Your Email</label>
				 <input type="email" name="email" class="form-control" placeholder="So We Can Sent Comfirmation Email">
				 <br>
				 <script>function validate(evt) {
				var theEvent = evt || window.event;
				var key = theEvent.keyCode || theEvent.which;
				key = String.fromCharCode( key );
				var regex = /[0-9]|\./;
				if( !regex.test(key) ) {
				theEvent.returnValue = false;
				if(theEvent.preventDefault) theEvent.preventDefault();
				}
				}
			     </script>
				 <label>Your Tel.no</label>
				 <input type="tel" name="tel" onkeypress="validate(event)" maxlength="11" class="form-control" placeholder="So We Can Contact You">
				 <input type="hidden" name="r_type" value="<?php echo $_GET["r_type"]; ?>">
				 </div>
				 <div class="form-group col-lg-6">
                 <p><strong>Payment</strong></p>
				 <table class="table">
				  <th></th><th>Bank Type</th>
				  <?php
					$sQuery =" SELECT * FROM bank";
					$result = mysqli_query($mysqli,$sQuery);
					while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)):
				  ?>
				 <tr><td><input type="radio" name="bank" value=" <?php echo $row[0];?>" ></td>
				 <td> <?php echo $row[1];?></td>
				 </tr>
				 <?php
					endwhile;
				?>
				 </table>
				<label>Enter Your Refrence No:</label><input type="text" name="ref" maxlength="11" class="form-control" placeholder="Refrence Number">
				</div>
				</div>
                <div class="clearfix"></div>
				<input type="submit" class="btn btn-default" name="reserve" value="Reserve">
				</form>
		        </div>
                </div>
</div>
 <?php
include('conn/footer.php');
?>