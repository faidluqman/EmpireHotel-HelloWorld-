<?php

include "conn/conn.php";

if(isset($_POST['update']))  
{
	$r_id= htmlentities($_POST['id'], ENT_QUOTES);
	$r_status= htmlentities($_POST['new_r'], ENT_QUOTES);
	$p_status = htmlentities($_POST['new_p'], ENT_QUOTES);
	
	if ($stmt = $mysqli->prepare("UPDATE reservation SET payment_status=?, reservation_status=? WHERE reservation_id=?"))
    {
	    $stmt->bind_param("ssi", $p_status, $r_status, $r_id);
        $stmt->execute();
        $stmt->close();
		header("Location: admin_reservation.php");
    }
    else
    {
	echo "error";
    }
}
?>