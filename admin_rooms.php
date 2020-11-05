<?php
include('conn/header.php');
include('conn/nav.php');

if(!isset($_SESSION['admin_login'])){
	header("Location: admin_login.php");
}elseif(isset($_SESSION['admin_login'])){


if(isset($_GET['delete'])){
	
	$room_id= $_GET['delete'];
	if ($stmt = $mysqli->prepare("DELETE FROM rooms WHERE rooms_id = ?")){
		$stmt->bind_param("i",$room_id);
		$stmt->execute();
		$stmt->close();
	}else{
		echo "ERROR: could not prepare SQL statement.";
	}
	
	
}elseif(isset($_GET['edit'])){

	echo "edit";

}elseif(isset($_GET['add'])){

	echo "add";

}
}
?>
<!-- Start main image and the text below -->
<div class="col-md-12 wow fadeIn" data-wow-delay="0.1s">
	<h1>Rooms</h1>
	<div class="hr"></div>
	<a href="admin_rooms_add_edit.php?add=" class="btn btn-default">Add New Room</a>
	<br>
	<div class="text-center">
		<table class="table">
				<th>Room ID</th><th>Room Type</th><th>Room Price</th><th>Room Description</th><th>Room Info</th><th>Room Picture</th><th>Option</th>
				<?php 
				$result = $mysqli->query("SELECT * FROM rooms");
				if ($result->num_rows > 0){
					while ($row = $result->fetch_object()){
				?>
				 <tr>
				 <td><?php echo $row->rooms_id;?></td>
				 <td><?php echo $row->room_type;?></td>
				 <td><?php echo $row->room_price;?></td>
				 <td><?php echo $row->room_des;?></td>
				 <td><?php echo $row->room_info;?></td>
				 <td><?php echo $row->room_pic;?></td>
				 <td>
					 <a href="admin_rooms_add_edit.php?edit=<?php echo  $row->rooms_id; ?>">Edit </a>
					 <br>
					 <a href="admin_rooms.php?delete=<?php echo  $row->rooms_id; ?>" onclick="return  confirm('Are you sure?')">Delete</a>
				 </td>
				 </tr>
				<?php }} ?>
			</table>		
	</div>  
</div>

<?php
include('conn/footer.php');
?>