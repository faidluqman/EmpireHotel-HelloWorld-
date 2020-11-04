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
                    <h2 class="intro-text text-center">Hotel
                        <strong>Rooms</strong>
                    </h2>
                    <hr>
                    <table class="table">
					<th>Room Id</th><th>Room Type</th><th>Price(RM)</th><th>Description</th><th>Picture Name</th><th>Option</th>
					
			    <?php
				if ($result = $mysqli->query("SELECT * FROM rooms a join picture b where a.room_pic=b.picture_id ORDER BY a.rooms_id"))
                {
			    if ($result->num_rows > 0)
                {
				while ($row = $result->fetch_object())
                {
				?>
				    <tr>
					<td><?php echo $row->rooms_id; ?></td>					
					<td><?php echo $row->room_type; ?></td>
					<td><?php echo $row->room_price; ?></td>
					<td><?php echo $row->room_des; ?></td>
					<td><?php echo $row->picture; ?></td>
					<td><a href="admin_rooms_edit.php?rooms_id=<?php echo $row->rooms_id;?>">Edit</a><br> <a href="admin_rooms_delete.php?rooms_id=<?php echo $row->rooms_id;?>">Delete</a></td>
					</tr>
				<?php
				}}}
				?>
					</table>
					<a href="admin_rooms_add.php">Add New Room</a>
                </div>
            </div>
        </div>
</div>

<?php
include('conn/a_footer.php');
 ?>