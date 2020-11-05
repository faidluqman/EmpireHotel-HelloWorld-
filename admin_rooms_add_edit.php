<?php
include('conn/header.php');
include('conn/nav.php');

if (isset($_GET['add_room'])){
	// get the form data
	$room_type=$_GET['room_type'];	
	$room_price=$_GET['room_price'];
	$room_desc=$_GET['room_desc'];
	$room_info=$_GET['room_info'];
	$room_pic=$_GET['room_pic'];

		if ($stmt = $mysqli->prepare("INSERT into rooms (room_type, room_price, room_des, room_info, room_pic) VALUES (?,?,?,?,?)")){
			$stmt->bind_param("sssss", $room_type, $room_price, $room_desc, $room_info, $room_pic);
			$stmt->execute();
			$stmt->close();
		}else{
			echo "ERROR: Could not prepare SQL statement.";
		}			
		header("Location: admin_rooms.php");

}else if (isset($_GET['edit_room'])){
	
	$room_id=$_GET['room_id'];	
	$room_type=$_GET['room_type'];	
	$room_price=$_GET['room_price'];
	$room_desc=$_GET['room_desc'];
	$room_info=$_GET['room_info'];
	$room_pic=$_GET['room_pic'];
	
		if ($stmt = $mysqli->prepare("UPDATE rooms SET room_type=?, room_price=?,room_des=?,room_info=?,room_pic=?  WHERE rooms_id=?")){
	    $stmt->bind_param("sssssi", $room_type, $room_price, $room_desc,$room_info,$room_pic, $room_id);
        $stmt->execute();
        $stmt->close();
		header("Location: admin_rooms.php");
		}else{
			echo "error";
		}
	
	
}

?>
<div class="col-md-12 wow fadeIn" data-wow-delay="0.1s">
	<?php 
	if(isset($_GET['edit']) || isset($_GET['edit_room'])){  
		$id=$_GET['edit'];
		$result = $mysqli->query("SELECT * FROM rooms JOIN picture ON rooms.room_pic=picture.picture_id WHERE rooms.rooms_id='$id'");
		if ($result->num_rows > 0){
			while ($row = $result->fetch_object()){
				
				echo $row->rooms_id;
				echo $_GET['edit'];
						
	?>
	<div class="margin-contact">
	<!-- Start left column -->
	<div class="box-contact col-md-4 col-xs-offset-1">
		<h3 class="heading-inner">Edit Room</h3>
		<div class="hr"></div>
		<div id="contact-area">
			<form method="GET">
				<input type="hidden" name="room_id" value="<?php echo $_GET['edit'];?>"/>
				<input type="hidden" name="edit" value="<?php echo $_GET['edit'];?>"/>
				<label >Room Type :</label>
				<input type="text" name="room_type" value="<?php echo $row->room_type; ?>"/>
				<label>Room Price:</label>
				<input type="text" name="room_price" value="<?php echo $row->room_price; ?>"/>
				<label>Room Description:</label>
				<input type="text" name="room_desc" value="<?php echo $row->room_des; ?>"/>
				<br><br>
				<label>Room Information:</label>
				<textarea name="room_info" rows="20" cols="20"><?php echo $row->room_info; ?></textarea>
				<label>Room Picture:</label>
				
				
				<select name="room_pic" class="form-control">
					<option value="<?php echo $row->picture_id?>"><?php echo $row->picture?></option>
				<?php }} 
					if ($result = $mysqli->query("SELECT * FROM picture ORDER BY picture_id")){
						if ($result->num_rows > 0){
						while ($row = $result->fetch_object()){
				
				?>
					<option value="<?php echo $row->picture_id ?>"><?php echo $row->picture?></option>
				<?php }}} ?>
				</select>
				<br>
				<input type="submit" name="edit_room" value="Edit" class="submit-button"/>
			</form>
		</div>
	</div>
	<!-- End left column -->
</div>
<!-- End margin -->
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<?php
	}else if (isset($_GET['add'])|| isset($_GET['add_room'])){ 
	?>
<!-- Start margin -->
<div class="margin-contact">
	<!-- Start left column -->
	<div class="box-contact col-md-4 col-xs-offset-1">
		<h3 class="heading-inner">Add New Room</h3>
		<div class="hr"></div>
		<div id="contact-area">
			<form method="GET">
				<label >Room Type :</label>
				<input type="text" name="room_type" />
				<label>Room Price:</label>
				<input type="text" name="room_price"/>
				<label>Room Description:</label>
				<input type="text" name="room_desc"/>
				<br><br>
				<label>Room Information:</label>
				<textarea name="room_info" rows="20" cols="20"></textarea>
				<label>Room Picture:</label>
				<select name="room_pic" class="form-control">
					<?php
					if ($result = $mysqli->query("SELECT * FROM picture ORDER BY picture_id")){
						if ($result->num_rows > 0){
							while ($row = $result->fetch_object()){
					?>
					<option value="<?php echo $row->picture_id ?>"><?php echo $row->picture?></option>
					<?php }}} ?>
				</select>
				<br>
				<input type="submit" name="add_room" value="Add" class="submit-button"/>
			</form>
		</div>
	</div>
	<!-- End left column -->
</div>
<!-- End margin -->
		
	<?php 
	} 
	?>               
</div>

<?php
include('conn/footer.php');
?>