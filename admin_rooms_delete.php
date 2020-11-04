<?php

include('conn/conn.php');
session_start();
if(!isset($_SESSION['login_user']))
	{
	header("Location: index.php");
	}
if(isset($_SESSION['login_user']))
	{
	$login_session=$_SESSION['login_user'];
	}	

// confirm that the 'id' variable has been set
if (isset($_GET['rooms_id']) && is_numeric($_GET['rooms_id']))
{
// get the 'id' variable from the URL
$rooms_id = $_GET['rooms_id'];

// delete record from database
if ($stmt = $mysqli->prepare("DELETE FROM rooms WHERE rooms_id = ? LIMIT 1"))
{
$stmt->bind_param("i",$rooms_id);
$stmt->execute();
$stmt->close();
}
else
{
echo "ERROR: could not prepare SQL statement.";
}
$mysqli->close();

// redirect user after delete is successful
header("Location: admin_rooms.php");
}
else
// if the 'id' variable isn't set, redirect the user
{
header("Location: admin_rooms.php");
}
?>