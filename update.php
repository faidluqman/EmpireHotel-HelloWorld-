<?php
include('conn/conn.php');
if(isset($_POST['update']))  
{
	$r_id= htmlentities($_POST['r_id'], ENT_QUOTES);
	$r_type = htmlentities($_POST['r_type'], ENT_QUOTES);
    $r_price = htmlentities($_POST['r_price'], ENT_QUOTES);
    $r_des = htmlentities($_POST['r_des'], ENT_QUOTES);
    $r_info = htmlentities($_POST['r_info'], ENT_QUOTES);
    $r_pic = htmlentities($_POST['r_pic'], ENT_QUOTES);
	
	if ($stmt = $mysqli->prepare("UPDATE rooms SET room_type=?, room_price=?,room_des=?,room_info=?,room_pic=?  WHERE rooms_id=?"))
    {
	    $stmt->bind_param("sssssi", $r_type, $r_price, $r_des,$r_info,$r_pic, $r_id);
        $stmt->execute();
        $stmt->close();
		header("Location: admin_rooms.php");
    }
    else
    {
	echo "error";
    }
}
?>