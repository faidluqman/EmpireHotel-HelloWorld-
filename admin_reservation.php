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
                    <h2 class="intro-text text-center">Hotel <strong>Reservation</strong>
                    </h2>
                    <hr>
					 <h4>Today's Date : <?php echo date("Y-m-d"); ?></h4>
					 <?php
					 
					 $per_page = 10;
					 if ($result = $mysqli->query("SELECT * FROM  reservation a join rooms b where a.room_type=b.rooms_id Order By a.check_in"))
					{
						if ($result->num_rows != 0)
						{
							$total_results = $result->num_rows;
							$total_pages = ceil($total_results / $per_page);
							if (isset($_GET['page']) && is_numeric($_GET['page']))
							{
								$show_page = $_GET['page'];
								if ($show_page > 0 && $show_page <= $total_pages)
								{
									$start = ($show_page -1) * $per_page;
									$end = $start + $per_page;
								}else
								{
									$start = 0;
									$end = $per_page;
								}
							}else{
								$start = 0;
								$end = $per_page;
							}
							?>
							 <p><b>Page :</b>
							<?php
							for ($i = 1; $i <= $total_pages; $i++)
							{
								if (isset($_GET['page']) && $_GET['page'] == $i)
								{
									echo $i . " ";
								}else{
									echo "<a href='admin_reservation.php?page=$i'>$i</a> ";
								}
							}
							echo "</p>";
								?>
								<table class="table">
					            <th>Reservation Id</th><th>Room Type</th><th>Total Room</th><th>Total Payment</th><th>Payment Status</th><th>Check-In Date</th><th>Check-Out Date</th><th>Option</th>
								<?php
								
								for ($i = $start; $i < $end; $i++)
								{
									if ($i == $total_results) { break; }
									$result->data_seek($i);
									$row = $result->fetch_row();
									?>
									<tr>
										<td><?php echo $row[0]; ?></td>					
										<td><?php echo $row[14]; ?></td>
										<td><?php echo $row[6];?></td>
										<td><?php echo $row[8]; ?></td>
										<td><?php echo $row[11]; ?></td>
										<td><?php echo $row[4]; ?></td>
										<td><?php echo $row[5]; ?></td>
										<td><a href="admin_reservation_edit.php?id=<?php echo $row[0]; ?>">Edit</a>
										<br>
										<a href="admin_reservation_delete.php?id=<?php echo $row[0]; ?>">Delete</a></td>
										</tr>
									<?php
								} ?></table><?php								
						}
						else
						{
							echo "No results to display!";
						}
					}else
					{
						echo "Error: " . $mysqli->error;
					}
					$mysqli->close();
					?>
                </div>
            </div>
        </div>
</div>


<?php
include('conn/a_footer.php');
 ?>