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
                    <h2 class="intro-text text-center">Add
                        <strong>New Room</strong>
                    </h2>
                    <hr>
                </div>
				<div class="col-lg-12">
			<form action="" method="post">
				 <div class="form-group col-lg-4">
                                <label>Room Name</label>
                                <input type="text" name="r_type" class="form-control">
                 </div>
				  <div class="form-group col-lg-4">
                                <label>Room Price</label>
                                <input type="text" name="r_price" class="form-control">
                 </div>
				  <div class="form-group col-lg-4">
                                <label>Room Discription</label>
                                <textarea class="form-control" name="r_des" rows="1"></textarea>
                 </div>
				  <div class="form-group col-lg-4">
                                <label>Room Info</label>
                                <textarea class="form-control" name="r_info" rows="6"></textarea>
                 </div>
				 <div class="form-group col-lg-4">
                                <label>Room Picture</label>
                                <select name="r_pic" class="form-control">
								<?php
				                 if ($result = $mysqli->query("SELECT * FROM picture ORDER BY picture_id"))
                                 {
			                     if ($result->num_rows > 0)
                                 {
				                 while ($row = $result->fetch_object())
                                 {
					
				                ?>
                                <option value="<?php echo $row->picture_id; ?>"><?php echo $row->picture; ?></option>
								<?php
				                }}}
			                    ?>
                                </select>
                 </div>
				</div>
				<div class="col-sm-12">
                    <button type="submit" name="add" class="btn btn-default">Add Room</button>
                </div>
			</form>
        
		
<?php

if (isset($_POST['add']))
{
// get the form data
$r_type = htmlentities($_POST['r_type'], ENT_QUOTES);
$r_price = htmlentities($_POST['r_price'], ENT_QUOTES);
$r_des = htmlentities($_POST['r_des'], ENT_QUOTES);
$r_info = htmlentities($_POST['r_info'], ENT_QUOTES);
$r_pic = htmlentities($_POST['r_pic'], ENT_QUOTES);

if ($r_type == '' || $r_price == '' || $r_des == '' || $r_info == '' || $r_pic == '')
{
?>
                 <div class="col-lg-12 text-center">
                    <h3>Error
                        <strong>Fill All The Field</strong>
                    </h3>
                 </div>
<?php
}
else
{
// insert the new record into the database
if ($stmt = $mysqli->prepare("INSERT into rooms (room_type,room_price,room_des,room_info,room_pic) VALUES (?, ?, ?, ?, ?)"))
{
$stmt->bind_param("sssss", $r_type, $r_price, $r_des,$r_info,$r_pic);
$stmt->execute();
$stmt->close();
}
// show an error if the query has an error
else
{
echo "ERROR: Could not prepare SQL statement.";
}

// redirec the user
header("Location: admin_rooms.php");
}

}

?>
		</div>
</div>


<?php
include('conn/a_footer.php');
 ?>