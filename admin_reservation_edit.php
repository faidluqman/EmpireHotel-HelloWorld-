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
			    <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Edit
                        <strong>Reservation</strong>
                    </h2>
                    <hr>
					<form action="update_r.php" method="post">
					<?php 
					$result = $mysqli->query("SELECT * FROM reservation a join rooms b join bank c where a.reservation_id=$_GET[id] and a.room_type=b.rooms_id and a.bank_type=c.bank_id");
					if ($result->num_rows > 0){
					while ($row = $result->fetch_object()){
					?>
					<div class="col-lg-4">
					<label>Reservation ID</label>
					<input type="text" name="id" value="<?php echo $row->reservation_id; ?>" class="form-control" readonly="readonly">
					</div>
					<div class="col-lg-4">
					<label>Name</label>
					<input type="text" name="name" value="<?php echo $row->name; ?>" class="form-control" readonly="readonly">
					</div>
					<div class="col-lg-4">
					<label>Email</label>
					<input type="text" name="email" value="<?php echo $row->email; ?>" class="form-control" readonly="readonly">
					</div>
					<div class="col-lg-4">
					<label>Tel No.</label>
					<input type="text" name="tel" value="<?php echo $row->tel; ?>" class="form-control" readonly="readonly">
					</div>
					<div class="col-lg-4">
					<label>Check In</label>
					<input type="text" name="check_in" value="<?php echo $row->check_in; ?>" class="form-control" readonly="readonly">
					</div>
					<div class="col-lg-4">
					<label>Check Out</label>
					<input type="text" name="check_out" value="<?php echo $row->check_out; ?>" class="form-control" readonly="readonly">
					</div>
					<div class="col-lg-4">
					<label>Total Room</label>
					<input type="text" name="t_room" value="<?php echo $row->total_room; ?>" class="form-control" readonly="readonly">
					</div>
					<div class="col-lg-4">
					<label>Room Type</label>
					<input type="text" name="room_t" value="<?php echo $row->room_type; ?>" class="form-control" readonly="readonly">
					</div>
					<div class="col-lg-4">
					<label>Total Payment</label>
					<input type="text" name="t_payment" value="<?php echo $row->total_payment; ?>" class="form-control" readonly="readonly">
					</div>
					<div class="col-lg-4">
					<label>Bank Type</label>
					<input type="text" name="bank" value="<?php echo $row->bank_name; ?>" class="form-control" readonly="readonly">
					</div>
					<div class="col-lg-4">
					<label>Reference</label>
					<input type="text" name="ref" value="<?php echo $row->refrence_no; ?>" class="form-control" readonly="readonly">
					</div>
					</div>
					<br>
					<div class="col-lg-12">
					<div class="col-lg-4">
					<label>Current Payment Status</label>
					<input type="text" name="ref" value="<?php echo $row->payment_status; ?>" class="form-control" readonly="readonly">
					</div>
					<div class="col-lg-4">
					<label>Current Reservation Status</label>
					<input type="text" name="r_status" value="<?php echo $row->reservation_status; ?>" class="form-control" readonly="readonly">
					</div>
					</div>
					<?php }} ?>
					<div class="col-lg-12">
					<br>
					<div class="col-lg-4">
					<label>New Payment Status</label>
					<select name="new_p" class="form-control">
					<option value="Checking">Checking</option>
					<option value="Invalid">Invalid</option>
					<option value="Complete">Complete</option>
					</select>
					</div>
					<?php ?>
					<div class="col-lg-4">
					<label>New Reservation Status</label>
					<select name="new_r" class="form-control">
					<option value="Pending">Pending</option>
					<option value="Reserve">Reserve</option>
					<option value="Canceled">Cancel</option>
					</select>
					</div>
					</div>
					<div class="col-lg-4">
					<br>
					<button type="submit" name="update" class="btn btn-default">Update</button>
					</div>
					</form>
			
		     </div>
        </div>
</div>


<?php
include('conn/a_footer.php');
 ?>