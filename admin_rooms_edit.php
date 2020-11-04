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
<?php 
$result = $mysqli->query("SELECT * FROM rooms a join picture b where a.rooms_id=$_GET[rooms_id] and a.room_pic=b.picture_id ORDER BY a.rooms_id");
if ($result->num_rows > 0){
	while ($row = $result->fetch_object()){
    ?>
<div class="container">
    <div class="row">
       <div class="box">
	      <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Edit 
                        <strong><?php echo $row->room_type;?></strong>
                    </h2>
                    <hr>
          </div>
		  <div class="col-lg-12">
		  <form action="update.php" method="post">
				 <div class="form-group col-lg-4">
				                <input type="hidden" name="r_id" value="<?php echo $row->rooms_id; ?>" class="form-control">
                                <label>Room Name</label>
                                <input type="text" name="r_type" value="<?php echo $row->room_type; ?>" class="form-control">
                 </div>
				  <div class="form-group col-lg-4">
                                <label>Room Price</label>
                                <input type="text" name="r_price" value="<?php echo $row->room_price; ?>" class="form-control">
                 </div>
				  <div class="form-group col-lg-4">
                                <label>Room Discription</label>
                                <textarea class="form-control" name="r_des" rows="1"><?php echo $row->room_des; ?></textarea>
                 </div>
				  <div class="form-group col-lg-4">
                                <label>Room Info</label>
                                <textarea class="form-control" name="r_info" rows="6"><?php echo $row->room_info; ?></textarea>
                 </div>
				 <div class="form-group col-lg-4">
                                <label>Current Room Picture</label>
                                <p>Picture Name : <?php echo $row->picture; ?></p>
                 </div>	
				  <div class="form-group col-lg-4">
                                <label>Room Picture</label>
                                <select name="r_pic" class="form-control" >
								<option value="<?php echo $row->picture_id?>"><?php echo $row->picture?></option>
								<?php
                                }}
								if ($result = $mysqli->query("SELECT * FROM picture ORDER BY picture_id"))
								{
								if ($result->num_rows > 0)
								{
								while ($row = $result->fetch_object())
                                {
							    ?>
                                <option value="<?php echo $row->picture_id ?>"><?php echo $row->picture?></option>
								<?php }}} ?>
                                </select>
                 </div>
			</div>
				<div class="col-sm-12">
                    <button type="submit" name="update" class="btn btn-default">Update</button>
                </div>
			</form>
 </div>   
	   </div>
    </div>		
<?php
include('conn/a_footer.php');
?>