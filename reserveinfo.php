<?php
include('conn/header.php');
include('conn/nav.php');
if(!isset($_SESSION['cust_login'])){
	header("Location: homepage.php");
}elseif(isset($_SESSION['cust_login'])){

}
$date="";
$room_type = $_GET['room_type'];
$result = $mysqli->query("SELECT * FROM rooms WHERE rooms_id = $room_type");
if ($result->num_rows > 0){
	while ($row = $result->fetch_object()){
?>

         <!-- Start margin -->
         <div class="margin-resume wow fadeIn" data-wow-delay="0.1s"">
			<h3 class="heading-inner">Room Reservation Infomation</h3>
			<div class="hr"></div>
			<form action="payment.php" method="">
             <!-- Start left column -->
             <div class="box-contact col-md-4 col-xs-offset-1">
                    <div id="contact-area">
			         <label for="Date">Check In Date:</label>
					 <?php      
					if($_GET['in']==""){
						header("Location: reserve.php");
					}else{
						$date= $_GET['in'];
						echo $date;
					?>
					<input type="hidden" name="in" value="<?php echo $date;?>" readonly>
					<?php	
					} 
					?>
					 <br><br><br>
				     <label for="Date">Check Out Date:</label>
					 <?php      
						 if($_GET['out']==""){
							header("Location: reserve.php");
						 }else{
							 $date= $_GET['out'];
							 echo $date;
						?>
						<input type="hidden" name="out" value="<?php echo $date;?>" readonly>
						<?php
						}	 
						?>
					 <br><br><br>
					 <label for="Name">Room Type:</label>					 
						<input type="hidden" name="room_id" value="<?php echo $row->rooms_id;?>" readonly>
						<?php echo $row->room_type;?>
					 <br><br><br>
					 <label for="Name">Total Room:</label>
					 <?php echo $_GET["total_room"];  ?>
					 <input type="hidden" name="total_room" value="<?php echo $_GET["total_room"];?>" readonly>
					 <br>

			        </div>
		            </div>
                   
             <!-- End left column -->
			 
            <!-- Start right column -->
             <div class="box-contact col-md-4 col-xs-offset-1">
			  <div id="contact-area">
				     <?php
				$rowCount = $_GET["total_room"];
                for($i=0;$i<$rowCount;$i++){
				?>
				<div class="form-group col-lg-3">
				    <h4>Room <?php echo $i+1; ?></h4>
				    <label>Adult:</label>
					<input type="number" min="2" max="5" value="2" name="adult<?php echo $i+1; ?>" class="form-control">
					<label>Child:</label>
					<input type="number" min="0" max="4" value="0" name="kids<?php echo $i+1; ?>" class="form-control">
				</div>
				<?php	
				}
				?>
			        
		      </div>
			  </div>
             <!-- End right column -->
			 <!-- Start left column -->
             <div class="box-contact col-md-4 col-xs-offset-1">
			  <div id="contact-area">
				<?php
				//Calculate table				
					$c_in=$_GET['in'];
					$c_out=$_GET['out'];

					$in= strtotime($_GET['in']);
					$out= strtotime($_GET['out']);
					$timeDiff = abs($out - $in);
					$numberDays = $timeDiff/86400;
					$numberDays = intval($numberDays);//number of days ?>			  
				 <table class="table">
				 <th>Room</th><th>Price(RM)</th><th>Day(s) Staying</th>
				 <?php
				 $rowCount=$_GET["total_room"];
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
				 $t_room=$_GET['total_room'];
				 $total=$t_room*$price*$numberDays;
				 $pay=number_format((float)$total, 2, '.', '');
				 ?>
				 <tr>
				 <th>Total (RM)</th>
				 <td><strong><?php echo $pay; ?></strong></td>
				 </tr>
				 </table>
				 <?php
				 	}
					}
				 ?>
		      </div>
			  </div>
             <!-- End left column -->
			 <!-- Start right column -->
             <div class="box-contact col-md-4 col-xs-offset-1">
			  <div id="contact-area">				     
				     <label for="Message">Message:</label><br>
				     <textarea name="message" rows="20" cols="20" id="Message"></textarea>
					 <br><br>
					 <label> Online Payment Option:</label>
						<table class="table">
							<th></th><th>Bank Type</th>
							<?php
							$sQuery =" SELECT * FROM bank";
							$result = mysqli_query($mysqli,$sQuery);
							while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)):
							?>
							<tr>
							<td><input type="radio" name="bank" value="<?php echo $row[0];?>" ></td>
							<td> <?php echo $row[1];?></td>
							</tr>
							<?php endwhile;	?>
						</table>
					 <br><br><br>
					 <label>Total Payment: </label>						
					 RM<?php echo $pay; ?>
					 <input type="hidden" value="<?php echo $pay; ?>" name="total_payment" readonly>
					 <br><br><br>					
				     <input type="submit" class="submit-button" value="Reserve">
		      </div>
			  </div>
             <!-- End right column -->
			 </form>
			 
			 
			 <!-- End margin -->
			</div>
<?php
include('conn/footer.php');
?>