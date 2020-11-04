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
                    <h2 class="intro-text text-center">Today's
                        <strong>Reservation Record</strong>
                    </h2>
                    <hr>
                </div>
			<div class="col-lg-12 text-center">	
             <h3>Today's Date : <?php echo date("Y-m-d"); ?></h3>
			 <table class="table">
					<th>Reservation Id</th><th>Total Payment</th><th>Payment Status</th><th>Check-In Date</th><th>Check-Out Date</th><th>Option</th>
	          <?php
		        $date = date("Y-m-d");
				if ($result = $mysqli->query(" SELECT * FROM  reservation where check_in like '".$date."%' OR check_out like '".$date."%' Order By check_in"))
				{
				if ($result->num_rows > 0)
				{
				while ($row = $result->fetch_object())
                {
				?>
				<tr>
					<td><?php echo $row->reservation_id; ?></td>					
					<td><?php echo $row->total_payment; ?></td>
					<td><?php echo $row->payment_status; ?></td>
					<td><?php echo $row->check_in; ?></td>
					<td><?php echo $row->check_out; ?></td>
					<td><a href="admin_reservation_edit.php?id=<?php echo $row->reservation_id; ?>">Edit</a>
					<br>
					<a href="admin_reservation_delete.php?id=<?php echo $row->reservation_id; ?>">Delete</a></td>
				</tr>
					
				<?php	
				}}}
				?>
				 </table>
				</div>
		     </div>
        </div>
</div>


<?php
include('conn/a_footer.php');
 ?>